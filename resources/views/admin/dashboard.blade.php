@extends('layouts.admin')

@section('content')
<div class="mb-5 text-center p-4 rounded bg-dark text-white shadow-sm">
    <h2 class="fw-bold display-5">Selamat Datang, Admin</h2>
    <p class="fs-5">
        Kelola produkmu dengan mudah. Total produk: 
        <strong>{{ count($produk) }}</strong>
    </p>
</div>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <h3 class="fw-bold mb-0">Daftar Produk</h3>
    <a href="{{ route('admin.produk.create') }}" class="btn btn-dark">
        <i class="fas fa-plus me-1"></i> Tambah Produk
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success text-center shadow-sm">{{ session('success') }}</div>
@endif

<hr>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
    @forelse($produk as $item)
        <div class="col">
            <div class="card border-0 h-100 shadow-sm">
                <a href="#" data-bs-toggle="modal" data-bs-target="#modalDeskripsi{{ $item->id }}">
                    @if($item->gambar)
                        <img src="{{ asset($item->gambar) }}" class="card-img-top" alt="{{ $item->nama }}" style="height: 200px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="No Image">
                    @endif
                </a>

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-semibold">{{ $item->nama }}</h5>
                    <p class="card-text mb-1">
                        Harga: <strong>Rp{{ number_format($item->harga) }}</strong>
                        @if($item->harga >= 1000000)
                            <span class="badge bg-warning text-dark ms-1">Mahal</span>
                        @endif
                    </p>
                    <p class="card-text">
                        Stok: {{ $item->stok }}
                        @if($item->stok <= 3)
                            <span class="badge bg-danger ms-2">Stok Rendah</span>
                        @endif
                    </p>

                    <div class="mt-auto d-flex flex-column gap-2">
                        <a href="{{ route('admin.produk.edit', $item->id) }}" class="btn btn-sm btn-dark w-100">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('admin.produk.delete', $item->id) }}" class="btn btn-sm btn-danger w-100" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Deskripsi -->
        <div class="modal fade" id="modalDeskripsi{{ $item->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title" id="modalLabel{{ $item->id }}">{{ $item->nama }}</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center mb-3">
                            @if($item->gambar)
                                <img src="{{ asset($item->gambar) }}" alt="{{ $item->nama }}" class="img-fluid rounded" style="max-height: 300px;">
                            @endif
                        </div>
                        <p><strong>Harga:</strong> Rp{{ number_format($item->harga) }}</p>
                        <p><strong>Stok:</strong> {{ $item->stok }}</p>
                        <p><strong>Deskripsi:</strong><br>{{ $item->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <p class="text-muted text-center">Belum ada produk yang ditambahkan.</p>
        </div>
    @endforelse
</div>
@endsection

