<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGAIN - แนะนำที่เที่ยว ที่พัก และร้านอาหาร</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        :root { --main-red: #e63946; --soft-bg: #f8f9fa; --dark-blue: #1d3557; }
        body { background-color: var(--soft-bg); font-family: 'Kanit', sans-serif; color: var(--dark-blue); }
        
        /* Navigation */
        .nav-main { background: white; border-bottom: 1px solid #eee; }
        .nav-link { font-weight: 500; color: var(--dark-blue) !important; margin: 0 10px; }
        .nav-link:hover { color: var(--main-red) !important; }

        /* Category Icons */
        .cat-item { text-align: center; padding: 20px; transition: 0.3s; cursor: pointer; border-radius: 15px; }
        .cat-item:hover { background: white; shadow: 0 4px 15px rgba(0,0,0,0.05); transform: translateY(-5px); }
        .cat-icon { font-size: 2rem; margin-bottom: 10px; display: block; }
        
        .btn-search { background: var(--main-red); color: white; border-radius: 50px; padding: 12px 35px; border: none; font-weight: bold; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg nav-main sticky-top py-3 shadow-sm">
    <div class="container">
        <a class="navbar-brand font-weight-bold text-danger" href="/">AGAIN.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="/">สำรวจ</a></li>
                <li class="nav-item"><a class="nav-link" href="#">บทความ</a></li>
                <li class="nav-item"><a class="nav-link text-muted" href="/admin">🔒 แอดมิน</a></li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>