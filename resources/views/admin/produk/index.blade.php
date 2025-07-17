@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold text-center mb-4">Daftar Produk</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="row justify-content-between align-items-center mb-3 g-2">
        <div class="col-12 col-md-auto d-flex flex-wrap gap-2">
            <a href="{{ route('admin.produk.create') }}" class="btn btn-dark">
                <i class="fas fa-plus me-1"></i> Tambah Produk
            </a>

            @if($produk->count())
                <form action="{{ route('admin.produk.destroyAll') }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus SEMUA produk?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash-alt me-1"></i> Hapus Semua
                    </button>
                </form>
            @endif
        </div>

        <div class="col-12 col-md-auto">
            <form action="{{ route('admin.produk.index') }}" method="GET" class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari produk..." value="{{ request('search') }}">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th style="width: 100px;">Gambar</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                    <th style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produk as $item)
                    <tr>
                        <td class="text-center">
                            @if($item->gambar)
                                <img src="{{ asset($item->gambar) }}" alt="{{ $item->nama }}" class="img-thumbnail" style="max-width: 80px;">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $item->nama }}</td>
                        <td>
                            Rp{{ number_format($item->harga) }}
                            @if($item->harga >= 1000000)
                                <span class="badge bg-warning text-dark ms-1">Mahal</span>
                            @endif
                        </td>
                        <td>
                            {{ $item->stok }}
                            @if ($item->stok <= 3)
                                <span class="badge bg-danger ms-1">Stok Rendah</span>
                            @endif
                        </td>
                        <td>
                            {{ \Illuminate\Support\Str::limit($item->deskripsi, 50, '...') }}
                        </td>
                        <td class="text-center">
                            <div class="d-grid gap-1">
                                <a href="{{ route('admin.produk.edit', $item->id) }}" class="btn btn-sm btn-dark w-100">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="{{ route('admin.produk.delete', $item->id) }}" class="btn btn-sm btn-danger w-100" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada produk tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
