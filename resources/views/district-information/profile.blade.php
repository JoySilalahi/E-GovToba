<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Kabupaten Toba</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS (loaded before custom styles so custom rules override it) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
        /* Header / Hero */
        .hero {
            background-size: cover;
            background-position: center;
            color: white;
            padding: 60px 0 40px;
            display: flex;
            align-items: center;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .hero-subtitle {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 30px;
            color: #ffffff;
            opacity: 1;
            text-shadow: 0 2px 8px rgba(0,0,0,0.6);
            display: inline-block;
            padding: 8px 14px;
            border-radius: 8px;
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        /* inner container for hero content to align with page content */
        .hero-inner {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            flex-direction: column;
            align-items: center; /* center hero content */
        }

        .hero-text {
            text-align: center;
            width: 100%;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 36px;
            font-weight: 700;
            display: block;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 13px;
            opacity: 0.9;
        }

        /* Main Content */
        /* use a distinct content container to avoid clashing with Bootstrap's .container */
        .content-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .section {
            background: white;
            border-radius: 12px;
            padding: 35px;
            margin-bottom: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }

        .section-title {
            font-size: 20px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid #e2e8f0;
        }

        .section-content {
            color: #475569;
            font-size: 14px;
            line-height: 1.8;
        }

        .section-content p {
            margin-bottom: 15px;
        }

        /* Bupati Section */
        .bupati-section {
            background: #f8fafc;
            border-radius: 12px;
            padding: 30px;
        }

        .bupati-title {
            text-align: center;
            font-size: 18px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 25px;
        }

        .bupati-container {
            display: flex;
            justify-content: center;
            gap: 50px;
            flex-wrap: wrap;
        }

        .bupati-card {
            text-align: center;
            max-width: 200px;
            position: relative;
            cursor: pointer;
        }

        .bupati-photo-wrapper {
            position: relative;
            width: 140px;
            margin: 0 auto 15px;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .bupati-card:hover .bupati-photo-wrapper {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 8px 24px rgba(0, 119, 182, 0.3);
        }

        .bupati-photo {
            width: 140px;
            height: 180px;
            object-fit: cover;
            display: block;
            transition: transform 0.4s ease;
        }

        .bupati-card:hover .bupati-photo {
            transform: scale(1.05);
        }

        /* Info overlay that appears on hover */
        .bupati-info-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            /* subtle top-to-bottom variant of the three-color palette */
            background: linear-gradient(to bottom, rgba(25,80,122,0.95) 0%, rgba(129,167,211,0.85) 60%);
            color: white;
            padding: 12px 10px;
            transform: translateY(100%);
            transition: transform 0.4s ease;
        }

        .bupati-card:hover .bupati-info-overlay {
            transform: translateY(0);
        }

        .info-row {
            font-size: 10px;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .info-row:last-child {
            margin-bottom: 0;
        }

        .info-icon {
            font-size: 11px;
            opacity: 0.9;
        }

        .info-text {
            font-size: 10px;
            line-height: 1.3;
        }

        .bupati-name {
            font-size: 14px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 4px;
            transition: color 0.3s ease;
        }

        .bupati-card:hover .bupati-name {
            color: #0077B6;
        }

        .bupati-title-text {
            font-size: 12px;
            color: #64748b;
            margin-bottom: 8px;
        }

        .bupati-period {
            font-size: 11px;
            color: #94a3b8;
        }

        /* Visi Misi */
        .visi-box {
            /* use the three-color gradient as a block background */
            background: linear-gradient(135deg, #19507A 0%, #81A7D3 57%, #FFFFFF 100%);
            color: white;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .visi-label {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .visi-text {
            font-size: 15px;
            line-height: 1.6;
        }

        .misi-list {
            list-style: none;
            padding: 0;
        }

        .misi-list li {
            padding: 15px 15px 15px 40px;
            margin-bottom: 12px;
            background: #f8fafc;
            border-radius: 8px;
            position: relative;
            font-size: 14px;
            color: #475569;
            line-height: 1.6;
        }

        .misi-list li:before {
            content: "✓";
            position: absolute;
            left: 15px;
            color: #0077B6;
            font-weight: bold;
            font-size: 18px;
        }

        /* Dokumentasi */
        .dokumentasi-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .doc-card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: transform 0.3s;
        }

        .doc-card:hover {
            transform: translateY(-5px);
        }

        .doc-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        /* Footer */
        footer {
            background: #2c3e50;
            color: white;
            padding: 40px 20px 25px;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 25px;
        }

        .footer-section h4 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .footer-section p,
        .footer-section a {
            font-size: 13px;
            color: #cbd5e1;
            text-decoration: none;
            line-height: 1.8;
        }

        .footer-section a:hover {
            color: white;
        }


    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Toba Hita">
                <span style="font-weight: 600; font-size: 18px;">Toba Hita</span>
            </a>
            <ul class="navbar-menu">
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li><a href="{{ route('district.profile') }}" class="active">Profil Kabupaten</a></li>
                <li><a href="{{ route('district.villages') }}">Daftar Desa</a></li>
            </ul>
        </div>
    </nav>

        <!-- Hero Section -->
    <div class="hero" style="background-image: linear-gradient(to bottom, rgba(25,80,122,0.6) 0%, rgba(129,167,211,0.35) 57%, rgba(255,255,255,0) 100%), url('{{ asset('images/pemandangan-sawah.jpg') }}'); background-size: cover; background-position: center 65%;">
        <div class="hero-inner">
            <div class="hero-text">
                <h1>Profil Kabupaten Toba</h1>
                <p class="hero-subtitle">Jantung Budaya Batak di Pesisir Danau Toba</p>
            </div>

            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">8</span>
                    <span class="stat-label">Kecamatan</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">7,515</span>
                    <span class="stat-label">Penduduk</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content-container">
        <!-- Sejarah Singkat -->
        <div class="section">
            <h2 class="section-title">Sejarah Singkat</h2>
            <div class="section-content">
                <p>
                    Kabupaten Toba Samosir dibentuk dari pemekaran Kabupaten Tapanuli Utara 
                    berdasarkan UU No. 12 Tahun 1998. Kabupaten ini resmi berdiri pada 8 Maret 1999 
                    dengan Drs. Sahala Tampubolon dilantik sebagai pejabat Bupati Pertama. 
                    Pada tahun 2000, Sahala Tampubolon terpilih sebagai Bupati definitif untuk periode 2000-2005.
                </p>
                <p>
                    Awalnya kabupaten ini memiliki 12 kecamatan dan 5 kecamatan tambahan dari Kabupaten 
                    Samosir (hasil dari 7 kecamatan dan 9 kecamatan asal). Pada tahun 2000, terdapat 
                    penambahan 5 kecamatan baru, dan kecamatan Ronggur Nihuta dipecah menjadi 3 kecamatan 
                    baru, sehingga total menjadi 16 kecamatan. Pada tahun 2020, nama resmi berubah dari 
                    Toba Samosir menjadi Kabupaten Toba, yang lebih dikenal dan lebih mudah disebut, 
                    dengan tujuan memperkuat identitas dan memudah promosi daerah.
                </p>
                <p>
                    Kabupaten Toba dikenal sebagai pusat kebudayaan Batak yang kaya akan tradisi, 
                    seni, dan warisan leluhur. Sistem kekerabatan Dalihan Natolu, musik Gondang Sabangunan, 
                    tari Tor-tor, dan arsitektur Rumah Bolon menjadi warisan budaya yang terus dilestarikan 
                    hingga kini. Danau Toba, yang terletak di Pulau Samosir, yang terletak disekitar wilayah 
                    Kabupaten, menjadi salah satu ikon utama pariwisata Sumatera Utara dan Indonesia.
                </p>
            </div>
        </div>

        <!-- Bupati & Wakil Bupati -->
        <div class="section">
            <div class="bupati-section">
                <h2 class="bupati-title">Bupati & Wakil Bupati Toba</h2>
                <div class="bupati-container">
                    <!-- Bupati Card -->
                    <div class="bupati-card">
                        <div class="bupati-photo-wrapper">
                            <img src="{{ asset('images/bupati.jpg') }}" alt="Bupati Toba" class="bupati-photo">
                            <div class="bupati-info-overlay">
                                <div class="info-row">
                                    <span class="info-icon">🎂</span>
                                    <span class="info-text">Lahir: 15 Agustus 1975</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-icon">🎓</span>
                                    <span class="info-text">S2 Manajemen Publik</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-icon">📍</span>
                                    <span class="info-text">Balige, Toba</span>
                                </div>
                            </div>
                        </div>
                        <div class="bupati-name">Effendi Sintong Panangian Napitupulu</div>
                        <div class="bupati-title-text">Bupati Toba</div>
                        <div class="bupati-period">Periode 2021-2024</div>
                    </div>

                    <!-- Wakil Bupati Card -->
                    <div class="bupati-card">
                        <div class="bupati-photo-wrapper">
                            <img src="{{ asset('images/wakil-bupati.jpg') }}" alt="Wakil Bupati" class="bupati-photo">
                            <div class="bupati-info-overlay">
                                <div class="info-row">
                                    <span class="info-icon">🎂</span>
                                    <span class="info-text">Lahir: 22 Maret 1978</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-icon">🎓</span>
                                    <span class="info-text">S2 Administrasi Negara</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-icon">📍</span>
                                    <span class="info-text">Laguboti, Toba</span>
                                </div>
                            </div>
                        </div>
                        <div class="bupati-name">Audi Murphy Sitorus</div>
                        <div class="bupati-title-text">Wakil Bupati Toba</div>
                        <div class="bupati-period">Periode 2021-2024</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visi & Misi -->
        <div class="section">
            <h2 class="section-title">Visi & Misi</h2>
            
            <div class="visi-box">
                <div class="visi-label">Visi:</div>
                <div class="visi-text">
                    Mewujudkan kabupaten yang maju, sejahtera dan berdaya saing tinggi berbasis 
                    pada potensi lokal dengan mendorong kemajuan infrastruktur, serta mempercepat 
                    pembangunan dengan berfokus pada peningkatan kualitas hidup dan pelayanan masyarakat.
                </div>
            </div>

            <div class="section-content">
                <strong style="display: block; margin-bottom: 15px; font-size: 15px;">Misi:</strong>
                <ul class="misi-list">
                    <li>Meningkatkan kualitas sumber daya manusia yang andal, sejahtera dan berdaya saing melalui pembangunan infrastruktur, serta mempercepat reformasi birokrasi yang bersih dan benar di setiap daerah.</li>
                    <li>Mewujudkan tata kelola pemerintahan yang bersih, transparan, akuntabel dan profesional.</li>
                    <li>Meningkatkan kesejahteraan masyarakat dan pembangunan ekonomi kreatif berbasis pariwisata dan pertanian.</li>
                </ul>
            </div>
        </div>

        <!-- Dokumentasi Kegiatan -->
        <div class="section">
            <h2 class="section-title">Dokumentasi Kegiatan</h2>
            <div class="dokumentasi-grid">
                <div class="doc-card">
                    <img src="{{ asset('images/dokumentasi kegiatan.jpg') }}" alt="Kegiatan 1" class="doc-image">
                </div>
                <div class="doc-card">
                    <img src="{{ asset('images/dokumentasi kegiatan (2).jpg') }}" alt="Kegiatan 2" class="doc-image">
                </div>
                <div class="doc-card">
                    <img src="{{ asset('images/tarian.jpg') }}" alt="Kegiatan 3" class="doc-image">
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('components.footer')

    <!-- Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>