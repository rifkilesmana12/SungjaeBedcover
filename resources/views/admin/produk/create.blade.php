@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold text-center mb-4">Tambah Produk</h2>

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

    <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data" class="row justify-content-center">
        @csrf
        <div class="col-12 col-md-8 col-lg-6">
            <div class="mb-3">
                <label for="nama" class="form-label fw-semibold">Nama Produk</label>
                <input type="text" name="nama" class="form-control" placeholder=>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label fw-semibold">Harga (Rp)</label>
                <input type="number" name="harga" class="form-control" placeholder=>
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label fw-semibold">Stok Produk</label>
                <input type="number" name="stok" class="form-control" placeholder=>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label fw-semibold">Deskripsi Produk (opsional)</label>
                <textarea name="deskripsi" class="form-control" placeholder=>{{ old('deskripsi') }}</textarea>
            </div>


            <div class="mb-3">
                <label for="gambar" class="form-label fw-semibold">Gambar Produk</label>
                <input type="file" name="gambar" id="gambarInput" class="form-control" accept="image/png, image/jpeg">
                <div class="mt-3">
                    <img id="previewGambar" src="#" alt="Preview Gambar" class="img-fluid rounded d-none border" style="max-height: 220px;">
                </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-between mt-4">
                <button type="submit" class="btn btn-dark w-100 w-md-auto">
                    <i class="fas fa-save me-1"></i> Simpan Produk
                </button>
                <a href="{{ route('admin.produk.index') }}" class="btn btn-outline-secondary w-100 w-md-auto">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </form>
</div>

{{-- JS Preview Gambar --}}
<script>
    document.getElementById('gambarInput').addEventListener('change', function(event) {
        const imgPreview = document.getElementById('previewGambar');
        const file = event.target.files[0];
        if (file && file.type.startsWith('image/')) {
            imgPreview.src = URL.createObjectURL(file);
            imgPreview.classList.remove('d-none');
        } else {
            imgPreview.classList.add('d-none');
            imgPreview.src = '';
        }
    });
</script>
@endsection
