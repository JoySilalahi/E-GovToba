<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
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
        .site-nav {
            position: sticky;
            top: 0;
            z-index: 60;
            height: var(--nav-h);
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.95);
            border-bottom: 1px solid rgba(15, 23, 36, 0.06);
            backdrop-filter: blur(4px) saturate(120%);
            -webkit-backdrop-filter: blur(4px) saturate(120%);
            box-shadow: 0 2px 8px rgba(2, 6, 23, 0.02);
        }
        .site-nav .navbar-container{
            max-width:var(--max-w);
            margin:0 auto;
            display:flex;
            align-items:center;
            gap:12px;
            padding:10px 16px;
            width:100%;
            position:relative;
        }
        .site-nav .brand{display:flex;align-items:center;gap:10px;flex:0 0 auto}
        .site-nav .brand img{height:42px; width:auto; display:block}
        .site-nav .nav-menu { display:flex; gap:28px; list-style:none; margin:0; padding:0; align-items:center; justify-content:center; flex:1 1 auto; }
        .site-nav .nav-menu a{color:var(--muted); text-decoration:none; font-weight:600; padding:8px 10px; border-radius:10px; transition:all .12s}
        .site-nav .nav-menu a.active, .site-nav .nav-menu a:hover{color:var(--primary); background:rgba(11,121,184,0.04); box-shadow:0 2px 8px rgba(11,121,184,0.04) inset}

        /* optional right area for icons / controls */
        .site-nav .nav-right{margin-left:auto; display:flex; gap:10px; align-items:center}
        
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
    <nav class="site-nav" role="navigation" aria-label="Utama">
        <div class="navbar-container">
            <a class="brand" href="/" aria-label="Beranda Toba Hita">
                <img src="http://127.0.0.1:8000/images/logo.png" alt="logo Kabupaten Toba">
            </a>

            <ul class="nav-menu" role="menubar" aria-label="Utama">
                <li><a href="/" class="">Beranda</a></li>
                <li><a href="/profile" class="">Profil Kabupaten</a></li>
                <li><a href="/villages" class="active">Daftar Desa</a></li>
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
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h2 class="section-title" style="margin: 0;">Visi & Misi</h2>
                    @auth
                        @if(auth()->user()->isVillageAdmin() && auth()->user()->village_id == $village['id'])
                            <a href="{{ route('village-admin.kelola-informasi') }}" 
                               style="display: inline-flex; align-items: center; gap: 6px; background: #0b79b8; color: white; padding: 8px 16px; border-radius: 8px; text-decoration: none; font-size: 14px; font-weight: 600; transition: all 0.3s;">
                                <i class="fas fa-edit"></i> Edit Visi & Misi
                            </a>
                        @endif
                    @endauth
                </div>
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
    @include('components.footer')

    <!-- Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Auto-refresh untuk cek update visi misi setiap 10 detik
        let lastUpdated = '{{ $village["updated_at"] ?? "" }}';
        
        setInterval(function() {
            fetch('/api/village-check-update/{{ $village["id"] }}')
                .then(response => response.json())
                .then(data => {
                    if (data.updated_at !== lastUpdated && lastUpdated !== '') {
                        // Ada update! Reload halaman dengan smooth transition
                        console.log('Visi Misi updated! Reloading...');
                        location.reload();
                    }
                    lastUpdated = data.updated_at;
                })
                .catch(error => console.log('Check update error:', error));
        }, 10000); // Check setiap 10 detik
    </script>
</body>
</html>