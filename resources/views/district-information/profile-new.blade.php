<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Kabupaten Toba</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        /* Navbar */
        .navbar {
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            padding: 0;
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 20px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #1e293b;
        }

        .navbar-brand img {
            width: 50px;
            height: auto;
        }

        .navbar-menu {
            display: flex;
            list-style: none;
            gap: 35px;
            align-items: center;
        }

        .navbar-menu a {
            text-decoration: none;
            color: #64748b;
            font-weight: 500;
            font-size: 14px;
            transition: color 0.3s;
        }

        .navbar-menu a:hover,
        .navbar-menu a.active {
            color: #0077B6;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('{{ asset('images/danau-toba.jpg') }}');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 80px 0;
            text-align: center;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .hero-subtitle {
            font-size: 18px;
            font-weight: 400;
            margin-bottom: 40px;
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 80px;
            margin-top: 20px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-item i {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .stat-number {
            display: block;
            font-size: 36px;
            font-weight: 700;
        }

        .stat-label {
            font-size: 14px;
            font-weight: 400;
            opacity: 0.9;
        }

        /* Content Container */
        .content-container {
            max-width: 1200px;
            margin: -60px auto 60px;
            padding: 0 20px;
        }

        /* Two Column Layout */
        .two-column-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 40px;
        }

        .content-card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        }

        .content-card h2 {
            font-size: 24px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 20px;
        }

        .content-card p {
            font-size: 14px;
            line-height: 1.8;
            color: #475569;
            text-align: justify;
        }

        /* Bupati Cards */
        .bupati-section {
            margin-bottom: 30px;
        }

        .bupati-cards {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .bupati-card {
            text-align: center;
            padding: 20px;
        }

        .bupati-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 15px;
            border: 4px solid #0077B6;
        }

        .bupati-name {
            font-size: 16px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 5px;
        }

        .bupati-title {
            font-size: 13px;
            color: #64748b;
        }

        /* Visi Misi */
        .visi-misi-section h3 {
            font-size: 18px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 15px;
        }

        .visi-box,
        .misi-box {
            background: #f8fafc;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .visi-box h4,
        .misi-box h4 {
            font-size: 16px;
            font-weight: 600;
            color: #0077B6;
            margin-bottom: 10px;
        }

        .visi-box p {
            font-size: 14px;
            line-height: 1.6;
            color: #475569;
            margin: 0;
        }

        .misi-box ul {
            margin: 0;
            padding-left: 20px;
        }

        .misi-box li {
            font-size: 14px;
            line-height: 1.8;
            color: #475569;
            margin-bottom: 8px;
        }

        /* Documentation Section */
        .documentation-section {
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        }

        .documentation-section h2 {
            font-size: 24px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 30px;
            text-align: center;
        }

        /* Carousel */
        .carousel-container {
            position: relative;
            max-width: 900px;
            margin: 0 auto;
        }

        .carousel-inner img {
            border-radius: 12px;
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0.9;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            opacity: 1;
            background: white;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            filter: invert(1);
        }

        .carousel-indicators {
            bottom: -30px;
        }

        .carousel-indicators button {
            background-color: #cbd5e1;
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .carousel-indicators button.active {
            background-color: #0077B6;
        }

        /* Footer */
        footer {
            background: #2d3748;
            color: white;
            padding: 40px 20px 20px;
            margin-top: 60px;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 40px;
            margin-bottom: 30px;
        }

        .footer-about h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .footer-about p {
            font-size: 14px;
            line-height: 1.6;
            color: #cbd5e1;
        }

        .footer-links h4,
        .footer-contact h4 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .footer-links ul {
            list-style: none;
        }

        .footer-links a {
            color: #cbd5e1;
            text-decoration: none;
            font-size: 14px;
            line-height: 2;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: white;
        }

        .footer-contact p {
            font-size: 14px;
            color: #cbd5e1;
            margin-bottom: 10px;
        }

        .footer-contact i {
            margin-right: 8px;
            color: #0077B6;
        }

        .footer-social {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }

        .footer-social a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background: #475569;
            border-radius: 50%;
            color: white;
            text-decoration: none;
            transition: background 0.3s;
        }

        .footer-social a:hover {
            background: #0077B6;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #475569;
            color: #cbd5e1;
            font-size: 13px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar-menu {
                gap: 15px;
                font-size: 13px;
            }

            .hero h1 {
                font-size: 32px;
            }

            .hero-stats {
                gap: 40px;
            }

            .stat-number {
                font-size: 28px;
            }

            .two-column-layout {
                grid-template-columns: 1fr;
            }

            .bupati-cards {
                grid-template-columns: 1fr;
            }

            .footer-container {
                grid-template-columns: 1fr;
            }

            .carousel-inner img {
                height: 250px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="/" class="navbar-brand">
                <img src="{{ asset('images/logo-toba.png') }}" alt="Logo Kabupaten Toba">
                <span style="font-weight: 600; font-size: 16px;">Kabupaten</span>
            </a>
            <ul class="navbar-menu">
                <li><a href="/">Beranda</a></li>
                <li><a href="{{ route('district.profile') }}" class="active">Profil Kabupaten</a></li>
                <li><a href="{{ route('district.villages') }}">Daftar Desa</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div>
            <h1>Profil Kabupaten Toba</h1>
            <p class="hero-subtitle">Jantung Budaya Batak di Pesisir Danau Toba</p>
            <div class="hero-stats">
                <div class="stat-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span class="stat-number">6</span>
                    <span class="stat-label">Kecamatan</span>
                </div>
                <div class="stat-item">
                    <i class="fas fa-building"></i>
                    <span class="stat-number">7,515</span>
                    <span class="stat-label">Kelurahan</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <div class="content-container">
        <!-- Two Column Layout -->
        <div class="two-column-layout">
            <!-- Left Column: Sejarah Singkat -->
            <div class="content-card">
                <h2>Sejarah Singkat</h2>
                <p>
                    Kabupaten Toba Samosir dibentuk oleh pemerintah Kolonial Hindia-Belanda berdasarkan UU No. 12 Tahun 1998, 
                    dan merupakan pusat basis dari 6 Marga dari 1999 sebagai kawasan yang diklaim sebagai jantung Bupati Taput Nabundul 2000. 
                    Sehingga Tempahan yaitu 95 dengan Balige periode penjabat Bupati. Pada tahun 2000, Kabupaten Toba Samosir dimekarkan dari 
                    Kabupaten Tapanuli Utara. Amerika Indonesia memiliki 13 kecamatan pada masa otonomi saat awal 1966 yaitu 
                    1 kecamatan pemerintahan, Tarutung tahun 2001 yang sebelumnya menjadi UU kabupaten & kecamatan baru yaitu kecamatan, 
                    dimekarkan menjadi dua kecamatan. Harian dan Siborok, yang kemudian dibuat menjadi.
                </p>
                <p style="margin-top: 15px;">
                    Penentuan Daerah pada tahun 2003.
                </p>
            </div>

            <!-- Right Column: Bupati & Visi Misi -->
            <div class="content-card">
                <div class="bupati-section">
                    <h2>Bupati & Wakil Bupati Toba</h2>
                    <div class="bupati-cards">
                        <div class="bupati-card">
                            <img src="{{ asset('images/bupati.jpg') }}" alt="Bupati" class="bupati-photo">
                            <div class="bupati-name">Drs.Poltak Sitorus</div>
                            <div class="bupati-title">Bupati</div>
                        </div>
                        <div class="bupati-card">
                            <img src="{{ asset('images/wakil-bupati.jpg') }}" alt="Wakil Bupati" class="bupati-photo">
                            <div class="bupati-name">Andi Napitupulu Siahaan</div>
                            <div class="bupati-title">Wakil Bupati</div>
                        </div>
                    </div>
                </div>

                <div class="visi-misi-section">
                    <h3>Visi & Misi</h3>
                    <div class="visi-box">
                        <h4>Visi</h4>
                        <p>Toba Maju dan Sejahtera Berbasis Iman</p>
                    </div>
                    <div class="misi-box">
                        <h4>Misi</h4>
                        <ul>
                            <li>Meningkatkan kualitas sumber daya manusia yang unggul dan mandiri berakhlak mulia</li>
                            <li>Meningkatkan peran pemerintahan yang bersih, transparan, melayani serta berwawasan pembangunan berkelanjutan</li>
                            <li>Menciptakan iklim investasi yang sehat dan mendorong perkembangan ekonomi daerah berbasis pariwisata</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Documentation Section -->
        <div class="documentation-section">
            <h2>Dokumentasi Kegiatan</h2>
            <div class="carousel-container">
                <div id="documentationCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#documentationCarousel" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#documentationCarousel" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#documentationCarousel" data-bs-slide-to="2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/documentation-1.jpg') }}" alt="Dokumentasi 1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/documentation-2.jpg') }}" alt="Dokumentasi 2">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/documentation-3.jpg') }}" alt="Dokumentasi 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#documentationCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#documentationCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-about">
                <h3>Kabupaten Toba</h3>
                <p>
                    Sistem informasi desa terintegrasi dan berbasis website yang dapat diakses oleh warga
                    Kabupaten Toba di daerah manapun
                </p>
            </div>
            <div class="footer-links">
                <h4>Informasi Desa</h4>
                <ul>
                    <li><a href="#">+ 62 896 1992</a></li>
                    <li><a href="#">tobakab@mail.com</a></li>
                </ul>
            </div>
            <div class="footer-contact">
                <h4>Ikuti Kami</h4>
                <div class="footer-social">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            © 2025 Government of Kabupaten Toba - All rights reserved
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-advance carousel
        var myCarousel = document.getElementById('documentationCarousel');
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 3000,
            wrap: true
        });
    </script>
</body>
</html>
