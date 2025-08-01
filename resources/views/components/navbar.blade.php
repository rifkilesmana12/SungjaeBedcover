<!-- Tambahkan di <head> kalau belum ada -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">

<nav class="navbar navbar-expand-lg px-4 py-3 shadow-sm border-bottom bg-white" style="font-family: 'Poppins', sans-serif;">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold text-dark fs-4" href="{{ route('beranda') }}">
      <img src="{{ asset('images/gambar1.png') }}" alt="Sungjae" height="32" class="me-2">
      Sungjae Bedcover
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav gap-2 align-items-center">
        <li class="nav-item">
          <a href="{{ route('beranda') }}"
             class="btn {{ request()->routeIs('beranda') ? 'btn-dark text-white' : 'btn-outline-dark' }}">
            Beranda
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('katalog') }}"
             class="btn {{ request()->routeIs('katalog') ? 'btn-dark text-white' : 'btn-outline-dark' }}">
            Katalog Produksi
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('tentang') }}"
             class="btn {{ request()->routeIs('tentang') ? 'btn-dark text-white' : 'btn-outline-dark' }}">
            Tentang Kami
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('pengaturan') }}"
             class="btn {{ request()->routeIs('pengaturan') ? 'btn-dark text-white' : 'btn-outline-dark' }}">
            Login
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
