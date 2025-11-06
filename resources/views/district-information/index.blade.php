<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Toba Hita</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Bootstrap CSS (loaded before custom styles so custom rules override it) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* === Resets & Global === */
        :root {
            --primary-color: #0077B6; /* Biru utama disesuaikan */
            --dark-blue: #222a35;     /* Warna footer */
            --light-gray-bg: #f8f9fa; /* Background fitur */
            --text-color: #333;
            --text-light: #f1f1f1;
            --text-secondary: #6c757d;
            --border-color: #dee2e6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            line-height: 1.6;
            background-color: #fff;
        }

        .container {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* === Navbar === */
        .navbar {
            background: #fff;
            padding: 10px 0;
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-logo {
            font-weight: 700;
            font-size: 24px;
            color: var(--dark-blue);
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .nav-logo img {
            height: 50px;
            width: auto;
        }

        .nav-menu {
            list-style: none;
            display: flex;
            gap: 32px;
            position: absolute; /* center the menu between logo and auth */
            left: 50%;
            transform: translateX(-50%);
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .nav-menu li {
            margin-left: 40px;
        }

        .nav-menu a {
            text-decoration: none;
            color: var(--text-color);
            font-weight: 500;
            font-size: 15px;
            transition: color 0.3s ease;
        }

        .nav-menu a.active,
        .nav-menu a:hover {
            color: var(--primary-color);
        }

        .nav-auth .btn {
            text-decoration: none;
            padding: 8px 18px;
            border-radius: 6px;
            margin-left: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .nav-auth .btn-secondary {
            color: var(--text-color);
        }
        .nav-auth .btn-secondary:hover {
            background: var(--light-gray-bg);
        }

        .nav-auth .btn-primary {
            background: var(--primary-color);
            color: #fff;
        }
        .nav-auth .btn-primary:hover {
            background: #0077B6;
        }

        /* === Hero Section === */
        .hero {
            /* three-color overlay tuned to your screenshot: #19507A -> #81A7D3 -> #FFFFFF */
            background-image: linear-gradient(to bottom, rgba(25,80,122,0.6) 0%, rgba(129,167,211,0.35) 57%, rgba(255,255,255,0) 100%), url('{{ asset('images/pemandangan-sawah.jpg') }}');
            background-size: cover;
            /* shift focus further downward so the lake is more visible */
            background-position: center 65%;
            min-height: 560px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
        }

        .hero-content h1 {
            font-size: 64px;
            font-weight: 700;
            max-width: 900px;
            margin: 0 auto 24px auto;
            line-height: 1.05;
        }

        .hero-content p {
            font-size: 18px;
            max-width: 760px;
            margin: 0 auto 36px auto;
            color: var(--text-light);
            line-height: 1.6;
        }

        .hero-content .btn-hero {
            background: var(--primary-color);
            color: #fff;
            padding: 14px 44px;
            text-decoration: none;
            border-radius: 999px; /* pill */
            font-weight: 700;
            transition: all 0.25s ease;
            font-size: 18px;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 10px 28px rgba(0, 119, 182, 0.18);
            border: none;
            line-height: 1;
        }

        .hero-content .btn-hero i {
            font-size: 16px;
            color: #fff;
            margin-left: 6px;
        }

        .hero-content .btn-hero:hover {
            background: #0077B6;
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0, 119, 182, 0.25);
        }

        /* === Features Section === */
        .features {
            background: #EDF7FE;
            padding: 70px 0;
            margin-top: -50px;
            border-radius: 12px 12px 0 0;
            position: relative;
            z-index: 10;
            box-shadow: 0 -8px 20px rgba(0,0,0,0.06);
        }

        .features-header {
            text-align: center;
            font-size: 30px;
            font-weight: 600;
            margin-bottom: 50px;
            color: var(--dark-blue);
        }

        .features-grid {
            display: flex;
            justify-content: space-around;
            gap: 40px;
            text-align: center;
            flex-wrap: wrap;
        }

        .feature-item {
            flex: 1;
            padding: 20px;
            min-width: 280px;
        }

        .feature-item i {
            font-size: 28px;
            color: var(--primary-color);
            margin-bottom: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 76px;
            height: 76px;
            border-radius: 50%;
            background: rgba(0,119,182,0.08);
            box-shadow: 0 6px 18px rgba(3,37,65,0.04);
            margin: 0 auto 20px auto;
        }

        .feature-item h3 {
            font-size: 19px;
            font-weight: 600;
            margin-bottom: 12px;
            color: var(--dark-blue);
        }

        .feature-item p {
            color: var(--text-secondary);
            font-size: 14px;
            max-width: 280px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Dropdown styles */
        .nav-item {
            position: relative;
        }

        .dropdown-menu-custom {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            min-width: 180px;
            margin-top: 10px;
            z-index: 1000;
        }

        .nav-item:hover .dropdown-menu-custom {
            display: block;
        }

        .dropdown-menu-custom a,
        .dropdown-menu-custom button {
            display: block;
            padding: 10px 20px;
            color: var(--text-color);
            text-decoration: none;
            transition: background 0.2s;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            cursor: pointer;
        }

        .dropdown-menu-custom a:hover,
        .dropdown-menu-custom button:hover {
            background: var(--light-gray-bg);
        }

        .dropdown-menu-custom .text-danger {
            color: #dc3545;
        }

        .dropdown-menu-custom hr {
            margin: 5px 0;
            border: none;
            border-top: 1px solid var(--border-color);
        }

    </style>
</head>
<body>

    <nav class="navbar">
        <div class="container navbar-container">
            <a href="{{ route('home') }}" class="nav-logo">
                <img src="{{ asset('images/logo.png') }}" alt="Toba Hita Logo">
            </a>
            <ul class="nav-menu">
                <li><a href="{{ route('home') }}" class="active">Beranda</a></li>
                <li><a href="{{ route('district.profile') }}">Profil Kabupaten</a></li>
                <li><a href="{{ route('district.villages') }}">Daftar Desa</a></li>
            </ul>
            <div class="nav-auth">
                @auth
                    <div class="nav-item" style="display: inline-block; position: relative;">
                        <a href="#" class="btn btn-secondary">
                            <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu-custom">
                            <a href="{{ route('dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                            <hr>
                            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                                @csrf
                                <button type="submit" class="text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-secondary">Masuk</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Membangun Toba,<br>Digitalisasi Jantung<br>Budaya Batak</h1>
                <p>Selamat datang di portal e-Government Kabupaten Toba. Temukan informasi desa, transparansi anggaran, dan layanan publik dalam satu platform terintegrasi.</p>
                <a href="{{ route('district.villages') }}" class="btn-hero">
                    Jelajahi Desa Sekarang <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </section>

        <section class="features">
            <div class="container">
                <h2 class="features-header">Fitur Unggulan Toba Hita</h2>
                <div class="features-grid">
                    <div class="feature-item">
                        <i class="fas fa-users"></i>
                        <h3>Data Desa</h3>
                        <p>Kelola data penduduk lebih aman & efisien</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-chart-bar"></i>
                        <h3>Transparansi Anggaran</h3>
                        <p>Lihat dan unduh laporan Anggaran Pendapatan dan Belanja Desa (APBDes) secara transparan.</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-triangle-exclamation"></i>
                        <h3>Layanan Digital</h3>
                        <p>Pelayanan publik lebih modern & cepat</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('components.footer')

</body>
</html>