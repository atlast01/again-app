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
        /* ตกแต่ง Navbar ของ Admin ให้เป็นสีเข้ม */
        .navbar-admin { background-color: var(--highlight-color); }
        .navbar-admin .navbar-brand, .navbar-admin .nav-link { color: white !important; }
        .navbar-admin .nav-link:hover { color: var(--primary-color) !important; }
        /* ตกแต่งการ์ด */
        .card-custom { border: none; border-left: 5px solid var(--primary-color); box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

<nav class=".col .col-sm .col-md .col-lg .col-xl navbar navbar-expand-lg navbar-admin sticky-top ">
  <div class="container">
    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">⚙️ Admin Panel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
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
        // เมื่อเจอคลาส alert-auto-hide ให้รอ 3 วินาที (3000ms) แล้วค่อยๆ จางหายไป
        setTimeout(function() {
            $(".alert-auto-hide").fadeOut(1000, function() {
                $(this).remove(); // ลบออกจากหน้าเว็บไปเลย
            });
        }, 2000);
    });
</script>
</body>
</html>