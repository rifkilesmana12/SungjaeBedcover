@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold text-center mb-4">Edit Produk</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data" class="row justify-content-center">
        @csrf
        @method('PUT')

        <div class="col-12 col-md-8 col-lg-6">
            <div class="mb-3">
                <label for="nama" class="form-label fw-semibold">Nama Produk</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $produk->nama) }}" required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label fw-semibold">Harga (Rp)</label>
                <input type="number" name="harga" class="form-control" value="{{ old('harga', $produk->harga) }}" required>
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label fw-semibold">Stok</label>
                <input type="number" name="stok" class="form-control" value="{{ old('stok', $produk->stok) }}" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label fw-semibold">Deskripsi Produk</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label fw-semibold">Gambar Baru (opsional)</label>
                <input type="file" name="gambar" id="gambarInput" class="form-control" accept="image/*">

                @if ($produk->gambar)
                    <div class="mt-3">
                        <label class="form-label">Gambar Saat Ini:</label><br>
                        <img src="{{ asset($produk->gambar) }}" class="img-thumbnail" style="max-height: 150px;">
                    </div>
                @endif

                <div id="previewContainer" class="mt-3 d-none">
                    <label class="form-label">Preview Gambar Baru:</label><br>
                    <img id="previewGambar" class="img-thumbnail" style="max-height: 150px;">
                </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-4">
                <button type="submit" class="btn btn-dark w-100 w-md-auto">
                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                </button>
                <a href="{{ route('admin.produk.index') }}" class="btn btn-outline-secondary w-100 w-md-auto">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </form>
</div>

{{-- Preview Gambar Baru --}}
<script>
    document.getElementById('gambarInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('previewGambar');
        const container = document.getElementById('previewContainer');

        if (file && file.type.startsWith('image/')) {
            preview.src = URL.createObjectURL(file);
            container.classList.remove('d-none');
        } else {
            container.classList.add('d-none');
            preview.src = '';
        }
    });
</script>
@endsection
