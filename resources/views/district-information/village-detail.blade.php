<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $village['name'] }} - Kabupaten Toba</title>
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

        /* Hero Section */
        .hero {
            /* use three-color translucent overlay to tint the hero */
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 80px 20px 40px;
            position: relative;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(25,80,122,0.6) 0%, rgba(129,167,211,0.35) 57%, rgba(255,255,255,0) 100%);
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .hero-population {
            font-size: 36px;
            font-weight: 700;
            margin-top: 15px;
        }

        .hero-label {
            font-size: 14px;
            opacity: 0.9;
        }

        /* Main Content */
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .section {
            background: white;
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 15px;
        }

        .section-content {
            color: #475569;
            font-size: 14px;
            line-height: 1.8;
        }

        .visi-label {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .misi-label {
            font-weight: 600;
            color: #1e293b;
            margin-top: 15px;
            margin-bottom: 8px;
        }

        /* Programs */
        .programs-grid {
            display: grid;
            gap: 15px;
        }

        .program-card {
            background: #f0f7ff;
            border-left: 4px solid #0077B6;
            padding: 20px;
            border-radius: 8px;
        }

        .program-title {
            font-size: 15px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .program-description {
            font-size: 13px;
            color: #64748b;
            line-height: 1.6;
        }

        /* Budget */
        .budget-section {
            margin-top: 25px;
        }

        .budget-title {
            font-size: 16px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 15px;
        }

        .budget-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .budget-icon {
            font-size: 20px;
        }

        .budget-text {
            font-size: 14px;
            color: #475569;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            right: 20px;
            top: 120px;
            width: 280px;
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .leader-card {
            text-align: center;
            padding: 20px;
            background: #f8fafc;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .leader-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: #cbd5e1;
            margin: 0 auto 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
        }

        .leader-name {
            font-size: 15px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 4px;
        }

        .leader-title {
            font-size: 12px;
            color: #64748b;
        }

        .stats-list {
            display: grid;
            gap: 15px;
        }

        .stat-item {
            background: #f8fafc;
            padding: 15px;
            border-radius: 8px;
            border-left: 3px solid #0077B6;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 700;
            color: #0077B6;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 12px;
            color: #475569;
            line-height: 1.4;
        }

        .stat-sublabel {
            font-size: 11px;
            color: #94a3b8;
        }

        /* Footer */
        footer {
            background: #2c3e50;
            color: white;
            padding: 40px 20px 25px;
            margin-top: 50px;
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

        .footer-logo {
            width: 55px;
            margin-bottom: 15px;
        }

        .social-links {
            display: flex;
            gap: 12px;
            margin-top: 15px;
        }

        .social-links a {
            width: 35px;
            height: 35px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s;
        }

        .social-links a:hover {
            background: #0077B6;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
            font-size: 12px;
            color: #94a3b8;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                position: static;
                width: 100%;
                margin-top: 25px;
            }
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 32px;
            }

            .navbar-menu {
                gap: 20px;
                font-size: 13px;
            }
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
                <li><a href="{{ route('district.profile') }}">Profil Kabupaten</a></li>
                <li><a href="{{ route('district.villages') }}" class="active">Daftar Desa</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero" style="background-image: url('{{ asset('images/' . $village['image']) }}');">
        <div class="hero-content">
            <h1>{{ $village['name'] }}</h1>
            <div class="hero-population">{{ number_format($village['population']) }}</div>
            <div class="hero-label">Penduduk</div>
        </div>
    </div>

    <!-- Main Content -->
    <div style="max-width: 1200px; margin: 0 auto; padding: 40px 20px; display: grid; grid-template-columns: 1fr 300px; gap: 30px;">
        <div>
            <!-- Visi & Misi -->
            <div class="section">
                <h2 class="section-title">Visi & Misi</h2>
                <div class="section-content">
                    <div class="visi-label">Visi:</div>
                    <p>{{ $village['visi'] }}</p>
                    
                    <div class="misi-label">Misi:</div>
                    <p>{{ $village['misi'] }}</p>
                </div>
            </div>

            <!-- Pengumuman / Programs -->
            <div class="section">
                <h2 class="section-title">Pengumuman</h2>
                <div class="programs-grid">
                    @foreach($village['programs'] as $program)
                    <div class="program-card">
                        <div class="program-title">{{ $program['title'] }}</div>
                        <div class="program-description">{{ $program['description'] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Transparansi Anggaran -->
            <div class="section">
                <h2 class="section-title">Transparansi Anggaran Desa</h2>
                <p class="section-content" style="margin-bottom: 15px;">
                    Dokumen laporan realisasi anggaran Desa {{ $village['name'] }} tersedia untuk diunduh.
                </p>
                
                <div class="budget-title">{{ $village['budget'] }}</div>
                <div class="budget-title" style="font-size: 14px; font-weight: 500; margin-bottom: 10px;">Lampiran</div>

                <!-- Download link: place the APBD PDF at public/documents/apbd-2025.pdf -->
                <a href="{{ asset('documents/apbd-2025.pdf') }}" class="budget-box" download title="Unduh {{ $village['budget'] }}">
                    <span class="budget-icon">📄</span>
                    <span class="budget-text">{{ $village['budget'] }} — Klik untuk unduh</span>
                </a>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="sidebar" style="position: sticky; top: 20px; height: fit-content;">
            <!-- Leader Card -->
            <div class="leader-card">
                <div class="leader-avatar">👤</div>
                <div class="leader-name">{{ $village['leader']['name'] }}</div>
                <div class="leader-title">{{ $village['leader']['title'] }}</div>
            </div>

            <!-- Stats -->
            <div class="stats-list">
                @foreach($village['stats'] as $stat)
                <div class="stat-item">
                    <div class="stat-value">{{ $stat['value'] }}</div>
                    <div class="stat-label">{{ $stat['label'] }}</div>
                    <div class="stat-sublabel">{{ $stat['sublabel'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="footer-logo">
                <p>
                    Portal informasi terintegrasi untuk mengelola dan 
                    pelayanan administrasi desa di Kabupaten Toba. 
                    Melayani dengan hati untuk masyarakat yang lebih sejahtera.
                </p>
            </div>
            
            <div class="footer-section">
                <h4>Hubungi Kami</h4>
                <p>📍 Jl. Sisingamangaraja No. 1<br>
                   Balige, Kabupaten Toba<br>
                   Sumatera Utara 22381</p>
                <p>📞 +12 3456 7890<br>
                   📧 tobainf@email.com</p>
            </div>
            
            <div class="footer-section">
                <h4>Ikuti Kami</h4>
                <div class="social-links">
                    <a href="#" title="Facebook">f</a>
                    <a href="#" title="Twitter">𝕏</a>
                    <a href="#" title="Instagram">📷</a>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            © 2025 Pemerintah Kabupaten Toba Hita. Hak Cipta Dilindungi
        </div>
    </footer>
</body>
</html>

<!-- Bootstrap JS bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
