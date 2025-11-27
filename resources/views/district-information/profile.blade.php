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
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        /* Two Column Layout */
        .two-column-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 40px;
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
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            margin-bottom: 20px;
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
            gap: 30px;
            flex-wrap: wrap;
        }

        .bupati-card {
            text-align: center;
            max-width: 160px;
            position: relative;
        }

        .bupati-photo-wrapper {
            position: relative;
            width: 140px;
            margin: 0 auto 12px;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .bupati-photo {
            width: 140px;
            height: 160px;
            object-fit: cover;
            display: block;
        }

        .bupati-name {
            font-size: 13px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 3px;
            line-height: 1.3;
        }

        .bupati-title-text {
            font-size: 11px;
            color: #64748b;
        }

        /* Visi Misi */
        .visi-misi-section {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }

        .visi-misi-title {
            font-size: 18px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 20px;
        }

        .visi-box {
            margin-bottom: 20px;
        }

        .visi-label {
            font-size: 14px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .visi-text {
            font-size: 13px;
            line-height: 1.7;
            color: #475569;
        }

        .misi-box {
            margin-top: 20px;
        }

        .misi-label {
            font-size: 14px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .misi-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .misi-list li {
            padding-left: 20px;
            margin-bottom: 8px;
            position: relative;
            font-size: 13px;
            color: #475569;
            line-height: 1.7;
        }

        .misi-list li:before {
            content: "•";
            position: absolute;
            left: 5px;
            color: #0077B6;
            font-weight: bold;
            font-size: 16px;
        }

        /* Dokumentasi */
        .dokumentasi-grid {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding: 10px 0;
            scrollbar-width: thin;
        }

        .dokumentasi-grid::-webkit-scrollbar {
            height: 8px;
        }

        .dokumentasi-grid::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .dokumentasi-grid::-webkit-scrollbar-thumb {
            background: #3498db;
            border-radius: 10px;
        }

        .dokumentasi-grid::-webkit-scrollbar-thumb:hover {
            background: #2980b9;
        }

        .doc-card {
            position: relative;
            min-width: 300px;
            flex-shrink: 0;
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
        <!-- Two Column Layout -->
        <div class="two-column-layout">
            <!-- Left Column: Sejarah Singkat -->
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
                        baru, sehingga total menjadi 16 kecamatan.
                    </p>
                </div>
            </div>

            <!-- Right Column: Bupati & Visi Misi -->
            <div>
                <!-- Bupati & Wakil Bupati -->
                <div class="bupati-section">
                    <h2 class="bupati-title">Bupati & Wakil Bupati Toba</h2>
                    <div class="bupati-container">
                        <!-- Bupati Card -->
                        <div class="bupati-card">
                            <div class="bupati-photo-wrapper">
                                <img src="{{ asset('images/bupati.jpg') }}" alt="Bupati Toba" class="bupati-photo">
                            </div>
                            <div class="bupati-name">Effendi Sintong Panangian Napitupulu</div>
                            <div class="bupati-title-text">Bupati Toba</div>
                        </div>

                        <!-- Wakil Bupati Card -->
                        <div class="bupati-card">
                            <div class="bupati-photo-wrapper">
                                <img src="{{ asset('images/wakil-bupati.jpg') }}" alt="Wakil Bupati" class="bupati-photo">
                            </div>
                            <div class="bupati-name">Audi Murphy Sitorus</div>
                            <div class="bupati-title-text">Wakil Bupati Toba</div>
                        </div>
                    </div>
                </div>

                <!-- Visi & Misi -->
                <div class="visi-misi-section">
                    <h2 class="visi-misi-title">Visi & Misi</h2>
                    
                    <div class="visi-box">
                        <div class="visi-label">Visi :</div>
                        <div class="visi-text">{{ $district->visi ?? 'Toba Unggul dan Bersinar' }}</div>
                    </div>

                    <div class="misi-box">
                        <div class="misi-label">Misi :</div>
                        <ul class="misi-list">
                            <li>{{ $district->misi ?? 'Meningkatkan kualitas sumber daya manusia yang andal dan berbudaya, mempercepat pembangunan infrastruktur, serta mewujudkan reformasi birokrasi yang bersih dan melayani.' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dokumentasi Kegiatan -->
        <div class="section">
            <h2 class="section-title">Dokumentasi Kegiatan</h2>
            
            @if($district && $district->documentation_file)
                <div style="background: #f8f9fa; padding: 15px 20px; border-radius: 8px; margin-bottom: 25px; display: flex; align-items: center; justify-content: space-between; border-left: 4px solid #3498db;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <i class="fas fa-file-pdf" style="font-size: 24px; color: #e74c3c;"></i>
                        <div>
                            <h6 style="margin: 0; font-size: 14px; font-weight: 600; color: #2c3e50;">Dokumentasi Kegiatan Kabupaten Toba</h6>
                            <p style="margin: 0; font-size: 12px; color: #7f8c8d;">File APBD tersedia untuk diunduh</p>
                        </div>
                    </div>
                    <a href="{{ asset('storage/' . $district->documentation_file) }}" target="_blank" style="background: #3498db; color: white; padding: 8px 20px; border-radius: 6px; text-decoration: none; font-size: 13px; font-weight: 600; white-space: nowrap;">
                        <i class="fas fa-download me-1"></i>Download
                    </a>
                </div>
            @endif

            <div style="position: relative; padding: 0 50px;">
                <!-- Navigation Arrows -->
                <button onclick="scrollDocs('left')" style="position: absolute; left: 0; top: 50%; transform: translateY(-50%); background: rgba(52, 152, 219, 0.9); color: white; border: none; width: 45px; height: 45px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,0.2); transition: all 0.3s; z-index: 10;" onmouseover="this.style.background='rgba(41, 128, 185, 1)'" onmouseout="this.style.background='rgba(52, 152, 219, 0.9)'">
                    <i class="fas fa-chevron-left" style="font-size: 18px;"></i>
                </button>
                <button onclick="scrollDocs('right')" style="position: absolute; right: 0; top: 50%; transform: translateY(-50%); background: rgba(52, 152, 219, 0.9); color: white; border: none; width: 45px; height: 45px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,0.2); transition: all 0.3s; z-index: 10;" onmouseover="this.style.background='rgba(41, 128, 185, 1)'" onmouseout="this.style.background='rgba(52, 152, 219, 0.9)'">
                    <i class="fas fa-chevron-right" style="font-size: 18px;"></i>
                </button>

                <div id="dokumentasiGrid" class="dokumentasi-grid">
                <div class="doc-card">
                    <img src="{{ asset('images/dokumentasi kegiatan.jpg') }}" alt="Kegiatan 1" class="doc-image">
                </div>
                <div class="doc-card">
                    <img src="{{ asset('images/dokumentasi kegiatan (2).jpg') }}" alt="Kegiatan 2" class="doc-image">
                </div>
                <div class="doc-card">
                    <img src="{{ asset('images/tarian.jpg') }}" alt="Kegiatan 3" class="doc-image">
                </div>

                @if($district && $district->photos && $district->photos->count() > 0)
                    @foreach($district->photos as $photo)
                        <div class="doc-card">
                            <img src="{{ asset('storage/' . $photo->photo_path) }}" alt="{{ $photo->title ?? 'Dokumentasi Kegiatan' }}" class="doc-image">
                            @if($photo->title)
                                <div style="padding: 10px; background: rgba(0,0,0,0.7); color: white; position: absolute; bottom: 0; left: 0; right: 0;">
                                    <p style="margin: 0; font-size: 13px; font-weight: 500;">{{ $photo->title }}</p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
            </div>

            <script>
                function scrollDocs(direction) {
                    const grid = document.getElementById('dokumentasiGrid');
                    const scrollAmount = 320; // width of card + gap
                    
                    if (direction === 'left') {
                        grid.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
                    } else {
                        grid.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                    }
                }
            </script>
        </div>
    </div>

    <!-- Footer -->
    @include('components.footer')

    <!-- Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
