<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        :root { --bg-color: #f9f6f5; --primary-color: #F0A202; --highlight-color: #522B29; }
        body { background-color: var(--bg-color); color: var(--highlight-color); font-family: sans-serif; }

        /* Navbar Admin */
        .navbar-admin { background-color: var(--highlight-color); }
        .navbar-admin .navbar-brand, .navbar-admin .nav-link { color: white !important; }
        .navbar-admin .nav-link:hover { color: var(--primary-color) !important; }

        /* ตกแต่งการ์ด */
        .card-custom { border: none; border-left: 5px solid var(--primary-color); box-shadow: 0 4px 6px rgba(0,0,0,0.1); }

        /* Customize the menu on your mobile phone. */
        @media (max-width: 767.98px) {
            .navbar-collapse {
                background-color: #40201f;
                padding: 1rem;
                border-radius: 8px;
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-admin navbar-dark sticky-top shadow-sm">
  <div class="container">
    <a class="navbar-brand font-weight-bold" href="{{ route('admin.dashboard') }}">⚙️ Admin Panel</a>

    <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.categories') }}">🏷️ จัดการหมวดหมู่</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.restaurants') }}">🍽️ จัดการร้านอาหาร</a></li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}" target="_blank">↗️ ดูหน้าเว็บ (Frontend)</a></li>
        </ul>
    </div>
  </div>
</nav>

<div class="container mt-5 mb-5">
    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        // alert-auto-hide: Wait 3 seconds (2000ms). 
        setTimeout(function() {
            $(".alert-auto-hide").fadeOut(1000, function() {
                $(this).remove();
            });
        }, 2000);
    });
</script>
</body>
</html>