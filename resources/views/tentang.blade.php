@extends('layouts.app')

@section('content')
<style>
    .about-section {
        background: #f4f6f9;
        border-radius: 20px;
        padding: 40px 30px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .about-section h4 i {
        width: 24px;
        text-align: center;
    }

    @media (max-width: 576px) {
        .about-section {
            padding: 25px 20px;
        }
        .about-section h4 {
            font-size: 1.1rem;
        }
        .about-section p {
            font-size: 0.95rem;
        }
    }
</style>

<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold" data-aos="fade-down">Tentang Kami</h2>
        <p class="text-muted fs-5" data-aos="fade-up">Menghadirkan kenyamanan dan keindahan dalam setiap seprai yang kami buat.</p>
    </div>

    <div class="about-section" data-aos="zoom-in">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="{{ asset('images/gambar1.png') }}" alt="Tentang Kami" class="img-fluid rounded shadow-sm" style="max-height: 400px; object-fit: cover; width: 100%;">
            </div>
            <div class="col-md-6 ps-md-5">
                <h4 class="fw-semibold mb-3 text-dark">
                    <i class="fas fa-users text-primary me-2"></i> Siapa Kami?
                </h4>
                <p>Backcover adalah brand lokal yang berfokus pada produksi seprai berkualitas tinggi dengan desain eksklusif. Kami percaya kenyamanan tidur dimulai dari bahan terbaik dan desain elegan.</p>

                <h4 class="fw-semibold mt-4 mb-3 text-dark">
                    <i class="fas fa-lightbulb text-warning me-2"></i> Misi Kami
                </h4>
                <p>Menyediakan seprai dengan material premium yang nyaman, tahan lama, dan cocok untuk semua gaya interior rumah, serta mendukung produk lokal buatan tangan.</p>

                <h4 class="fw-semibold mt-4 mb-3 text-dark">
                    <i class="fas fa-globe text-success me-2"></i> Visi Kami
                </h4>
                <p>Menjadi pilihan utama masyarakat Indonesia dalam urusan kenyamanan tempat tidur dengan seprai backcover berkualitas dan bernilai estetika tinggi.</p>

                <a href="{{ route('katalog') }}" class="btn btn-dark mt-4">
                    Lihat Katalog Produk <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
