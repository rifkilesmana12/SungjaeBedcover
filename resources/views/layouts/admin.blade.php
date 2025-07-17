<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Sungjae Bedcover</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            height: 100vh;
            background-color: #000;
            color: white;
            padding-top: 20px;
            min-width: 240px;
            position: sticky;
            top: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar h4 {
            font-weight: bold;
            text-transform: uppercase;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #1a1a1a;
        }

        .main-content {
            padding: 30px;
            background-color: #f8f9fa;
            flex-grow: 1;
        }

        footer {
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #999;
            background-color: #f1f1f1;
        }

        .offcanvas-body a {
            font-size: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 10px 0;
            display: block;
        }

        .offcanvas-body a:hover {
            background-color: #1a1a1a;
        }

        @media (max-width: 768px) {
            .table-responsive {
                overflow-x: auto;
            }

            .btn-sm-table {
                padding: 4px 8px;
                font-size: 0.8rem;
            }

            .mobile-header {
                padding: 12px 16px;
                gap: 10px;
            }

            .mobile-header .navbar-brand {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

<!-- Navbar Mobile -->
<nav class="navbar navbar-dark bg-black d-md-none">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h5">ADMIN</span>
        <button class="btn btn-outline-light btn-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMobile">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</nav>

<!-- Layout Container -->
<div class="d-flex">
    <!-- Sidebar Desktop -->
    <div class="sidebar d-none d-md-flex flex-column justify-content-between">
        <div>
            <h4 class="text-center mb-4">ADMIN</h4>
            <hr style="border-color: rgba(255,255,255,0.3);">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home me-2"></i> Beranda
            </a>
            <a href="{{ route('admin.produk.index') }}" class="{{ request()->routeIs('admin.produk.*') ? 'active' : '' }}">
                <i class="fas fa-box me-2"></i> Produk
            </a>
        </div>
        <div>
            <a href="#" onclick="confirmLogout(event)">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="d-flex flex-column flex-grow-1">
        <div class="main-content">
            @yield('content')
        </div>
        <footer>
            &copy; {{ date('Y') }} Sungjae Bedcover. All rights reserved.
        </footer>
    </div>
</div>

<!-- Offcanvas Sidebar Mobile -->
<div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="sidebarMobile">
    <div class="offcanvas-header bg-dark text-white">
        <h5 class="offcanvas-title">Menu Admin</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body bg-black text-white px-3">
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-home me-2"></i> Beranda
        </a>
        <a href="{{ route('admin.produk.index') }}" class="{{ request()->routeIs('admin.produk.*') ? 'active' : '' }}">
            <i class="fas fa-box me-2"></i> Produk
        </a>
        <a href="#" onclick="confirmLogout(event)">
            <i class="fas fa-sign-out-alt me-2"></i> Logout
        </a>
    </div>
</div>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Logout Confirmation -->
<script>
    function confirmLogout(event) {
        event.preventDefault();
        if (confirm('Apakah Anda yakin ingin keluar?')) {
            window.location.href = "{{ route('logout') }}";
        }
    }
</script>

</body>
</html>
