@extends('layouts.app')

@section('content')

<!-- Produk Populer -->
<div class="container my-5">
    <h4 class="fw-bold text-center mb-4" data-aos="fade-down">Produk Populer</h4>
    <div class="d-flex overflow-auto gap-3 pb-2 px-1">
        @foreach ($produk->take(6) as $pop)
            <div class="card flex-shrink-0 shadow-sm border-0" style="width: 220px;" data-aos="zoom-in-up" data-aos-delay="100">
                <a href="#" data-bs-toggle="modal" data-bs-target="#modalDeskripsi{{ $pop->id }}">
                    @if ($pop->gambar)
                        <img src="{{ asset($pop->gambar) }}" class="card-img-top" alt="{{ $pop->nama }}" style="height: 180px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/220x180?text=No+Image" class="card-img-top" alt="No Image">
                    @endif
                </a>
                <div class="card-body d-flex flex-column">
                    <h6 class="card-title">{{ $pop->nama }}</h6>
                    <p class="card-text text-muted mb-1">Rp{{ number_format($pop->harga) }}</p>
                    <a href="https://wa.me/6285939116415?text={{ urlencode('Halo, saya ingin beli produk: ' . $pop->nama . ', harga: Rp' . number_format($pop->harga)) }}" 
                       class="btn btn-sm btn-dark mt-auto w-100" target="_blank">
                        <i class="fab fa-whatsapp"></i> Beli
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Produk Terbaru -->
<div class="py-5" style="background: url('{{ asset('images/bg-produk.jpg') }}') center center / cover no-repeat;">
    <div class="container bg-white bg-opacity-75 p-4 rounded shadow">
        <h3 class="fw-bold text-center mb-4 border-bottom pb-2" data-aos="fade-down">Produk Terbaru</h3>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 mt-3">
            @forelse ($produk as $item)
                <div class="col" data-aos="flip-left" data-aos-delay="150">
                    <div class="card h-100 shadow-sm border-0">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalDeskripsi{{ $item->id }}">
                            @if ($item->gambar)
                                <img src="{{ asset($item->gambar) }}" class="card-img-top" alt="{{ $item->nama }}" style="height: 200px; object-fit: cover;">
                            @else
                                <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="No Image">
                            @endif
                        </a>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-semibold">{{ $item->nama }}</h5>
                            <p class="card-text mb-1"><i class="fas fa-tag me-1 text-success"></i> Rp{{ number_format($item->harga) }}</p>
                            <p class="card-text"><i class="fas fa-box me-1 text-warning"></i> Stok: {{ $item->stok }}</p>

                            <a href="https://wa.me/6285939116415?text={{ urlencode('Halo, saya ingin beli produk: ' . $item->nama . ', harga: Rp' . number_format($item->harga)) }}" 
                               class="btn btn-dark mt-auto w-100" target="_blank">
                                <i class="fab fa-whatsapp"></i> Beli Sekarang
                            </a>
                        </div>
                    </div>
                </div>

                <!-- MODAL DESKRIPSI -->
                <div class="modal fade" id="modalDeskripsi{{ $item->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="modalLabel{{ $item->id }}">{{ $item->nama }}</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-3">
                                    @if ($item->gambar)
                                        <img src="{{ asset($item->gambar) }}" class="img-fluid rounded" style="max-height: 300px;" alt="{{ $item->nama }}">
                                    @endif
                                </div>
                                <p><strong>Harga:</strong> Rp{{ number_format($item->harga) }}</p>
                                <p><strong>Stok:</strong> {{ $item->stok }}</p>
                                <p><strong>Deskripsi:</strong><br> {{ $item->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                            </div>
                            <div class="modal-footer">
                                <a href="https://wa.me/6285939116415?text={{ urlencode('Halo, saya ingin beli produk: ' . $item->nama) }}" 
                                   class="btn btn-dark" target="_blank">
                                    <i class="fab fa-whatsapp"></i> Chat via WA
                                </a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <p class="text-muted text-center">Belum ada produk yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white pt-5 mt-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-4 g-4 pb-4">
            <div class="col">
                <h6 class="fw-bold mb-3">Dapatkan Promo</h6>
                <p>Dapatkan VOUCHER Rp 50.000 dan update info promo menarik di sini</p>
                <input type="email" class="form-control mb-2" placeholder="Email">
                <button class="btn btn-outline-light w-100">Dapatkan Disini</button>
                <div class="mt-3">
                    @foreach(['facebook', 'instagram', 'tiktok', 'twitter', 'youtube'] as $icon)
                        <a href="#" class="text-white me-2"><i class="fab fa-{{ $icon }}"></i></a>
                    @endforeach
                </div>
            </div>
            <div class="col">
                <h6 class="fw-bold mb-3">INFO</h6>
                <ul class="list-unstyled small">
                    <li><a href="#" class="text-white text-decoration-none">Artikel</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Lihat Katalog</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Panduan Ukuran</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Cara Belanja</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Reseller</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Lacak Pesanan</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Garansi Produk</a></li>
                </ul>
            </div>
            <div class="col">
                <h6 class="fw-bold mb-3">Sungjae Bedcover</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ route('tentang') }}" class="text-white text-decoration-none">Tentang Kami</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Karir</a></li>
                    <li><a href="#" class="text-white text-decoration-none">FAQ</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Syarat & Ketentuan</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Kebijakan Privasi</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Hubungi Kami</a></li>
                </ul>
            </div>
            <div class="col">
                <h6 class="fw-bold mb-3">Hubungi Kami</h6>
                <p class="small mb-1"><i class="fas fa-phone me-1"></i> 0859 3911 6415 (WA)</p>
                <p class="small mb-2"><i class="fas fa-envelope me-1"></i> info@Sungjae-bedcover.co.id</p>
                <p class="small"><i class="fas fa-map-marker-alt me-1"></i> Jl. Laswi No.100, Cipicung, Baleendah, Bandung</p>
            </div>
        </div>
    </div>
</footer>

@endsection
