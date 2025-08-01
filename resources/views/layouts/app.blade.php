<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sungjae Bedcover</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa; /* abu muda */
        color: #212529; /* hitam */
    }

    :root {
        --primary-color: #212529; /* hitam */
        --secondary-color: #6c757d; /* abu-abu */
        --light-color: #f8f9fa; /* abu muda */
        --dark-color: #000000;
    }

    .carousel-item {
        height: 300px;
        transition: transform 0.5s ease-in-out;
    }

    .carousel-item:hover {
        transform: scale(1.01);
    }

    .carousel-item > .overlay {
        background-color: rgba(0, 0, 0, 0.5);
        height: 100%;
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
    }

    .carousel-caption {
        z-index: 10;
        text-shadow: 0 2px 5px rgba(0, 0, 0, 0.8);
    }

    .carousel-caption h1,
    .carousel-caption p {
        color: #ffffff;
    }

    .card-img-top {
        object-fit: cover;
        height: 200px;
    }

    .alert {
        background-color: var(--light-color);
        border-left: 5px solid var(--primary-color);
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        color: var(--dark-color);
    }

    footer {
        margin-top: 40px;
        padding: 20px;
        text-align: center;
        background-color: var(--secondary-color);
        color: #fff;
        font-size: 14px;
    }

    .btn-dark {
        background-color: var(--primary-color);
        border: none;
        color: #fff;
    }

    .btn-dark:hover {
        background-color: #000000;
        color: #fff;
    }

    .btn-outline-dark {
        border-color: var(--primary-color);
        color: var(--primary-color);
    }

    .btn-outline-dark:hover {
        background-color: var(--primary-color);
        color: #fff;
    }

 @media (max-width: 576px) {
    .carousel-item {
        height: 200px !important;
    }

    .carousel-caption h1 {
        font-size: 1.2rem;
    }

    .carousel-caption p {
        font-size: 0.85rem;
    }
}

</style>

</head>
<body>

@include('components.navbar')

@if (Request::routeIs('beranda'))
<div id="heroCarousel" class="carousel slide mb-5" data-bs-ride="carousel" data-bs-interval="3500" data-bs-pause="hover">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active position-relative">
            <img src="{{ asset('images/gambar2.png') }}" class="d-block w-100 h-100 object-fit-cover" alt="Slide 1">
            <div class="overlay"></div>
            <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                <h1 class="display-5 fw-bold text-white">Selamat Datang</h1>
                <p class="lead text-white">Temukan seprai & bedcover terbaik untuk kenyamanan Anda.</p>
            </div>
        </div>

        <div class="carousel-item position-relative">
            <img src="{{ asset('images/gambar3.png') }}" class="d-block w-100 h-100 object-fit-cover" alt="Slide 2">
            <div class="overlay"></div>
        </div>

        <div class="carousel-item position-relative">
            <img src="{{ asset('images/gambar4.png') }}" class="d-block w-100 h-100 object-fit-cover" alt="Slide 3">
            <div class="overlay"></div>
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
@endif

<main class="container-fluid px-4 py-4">
    @if (session('success'))
        <div class="alert alert-success text-center bg-light text-dark border-dark">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</main>

<footer class="bg-secondary text-white">
    &copy; {{ date('Y') }} <strong>Sungjae Bedcover</strong>. Semua hak dilindungi.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
