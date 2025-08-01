@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 fw-bold text-center text-dark">Katalog Produk</h2>

    {{-- Search --}}
    <form action="{{ route('katalog') }}" method="GET" class="input-group mb-4">
        <input type="text" name="search" class="form-control border-dark" placeholder="Cari produk..." value="{{ request('search') }}">
        <button class="btn btn-dark" type="submit">
            <i class="fas fa-search"></i>
        </button>
    </form>

    {{-- Info hasil pencarian --}}
    @if(request('search'))
        <div class="alert alert-secondary text-center">
            Menampilkan hasil untuk: <strong>"{{ request('search') }}"</strong>
        </div>
    @endif

    {{-- Daftar Produk --}}
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        @forelse ($produk as $item)
            <div class="col" data-aos="zoom-in">
                <div class="card h-100 shadow-sm border border-light">
                    @if ($item->gambar)
                        <img src="{{ asset($item->gambar) }}" class="card-img-top" alt="{{ $item->nama }}" style="height: 200px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="No Image">
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-dark">{{ $item->nama }}</h5>
                        <p class="card-text fw-semibold text-success mb-1">Rp{{ number_format($item->harga) }}</p>

                        @if ($item->deskripsi)
                            <p class="card-text text-muted small flex-grow-1">{{ $item->deskripsi }}</p>
                        @endif

                        <a class="btn btn-outline-dark mt-auto w-100"
                           href="https://wa.me/6285939116415?text={{ urlencode('Halo, saya ingin beli produk: ' . $item->nama . ', harga: Rp' . number_format($item->harga)) }}"
                           target="_blank">
                            <i class="fab fa-whatsapp"></i> Beli Sekarang
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-circle me-1"></i> Produk tidak ditemukan.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
