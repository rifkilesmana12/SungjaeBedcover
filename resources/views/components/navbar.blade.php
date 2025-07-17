<nav class="navbar navbar-expand-lg px-4 py-3 shadow-sm" style="background: linear-gradient(to right, #ffc0cb, #f06292);">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold text-white fs-4" href="{{ route('beranda') }}" style="font-family: 'Georgia', cursive;">
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
             class="btn {{ request()->routeIs('beranda') ? 'btn-light text-pink' : 'btn-outline-light text-white border-white' }}">
            Beranda
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('katalog') }}"
             class="btn {{ request()->routeIs('katalog') ? 'btn-light text-pink' : 'btn-outline-light text-white border-white' }}">
            Katalog Produksi
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('tentang') }}"
             class="btn {{ request()->routeIs('tentang') ? 'btn-light text-pink' : 'btn-outline-light text-white border-white' }}">
            Tentang Kami
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('pengaturan') }}"
             class="btn {{ request()->routeIs('pengaturan') ? 'btn-light text-pink' : 'btn-outline-light text-white border-white' }}">
            Login
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
