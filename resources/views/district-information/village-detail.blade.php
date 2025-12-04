<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>{{ $village['name'] }} - Kabupaten Toba</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root{
            --primary:#0b79b8;
            --muted:#64748b;
            --bg:#eef6fb;
            --card:#ffffff;
            --max-w:1100px;
            --nav-h:64px;
        }
        *{box-sizing:border-box; margin:0; padding:0;}
        html,body{height:100%;font-family:'Poppins',system-ui,Arial;color:#102030;background:var(--bg);-webkit-font-smoothing:antialiased}
        a{color:inherit;text-decoration:none}

        /* NAV */
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
        .site-nav .nav-right{margin-left:auto; display:flex; gap:10px; align-items:center}

        /* HERO - Full Width */
        .hero{
            width: 100%;
            max-width: 100%;
            margin: 0;
            border-radius: 0;
            padding: 80px 20px 100px;
            background-image:
                linear-gradient(180deg, rgba(8,40,66,0.6), rgba(8,40,66,0.4)),
                url('{{ asset('images/' . $village['image']) }}');
            background-size:cover;
            background-position:center center;
            color:#fff;
            box-shadow:0 10px 30px rgba(2,6,23,0.08);
            min-height:420px;
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            text-align:center;
            position: relative;
        }
        .hero h1{font-size:48px; margin:0 0 16px; font-weight:700; text-shadow: 0 2px 10px rgba(0,0,0,0.3);}
        .hero-population{font-size:42px; font-weight:800; margin-top:20px; text-shadow: 0 2px 10px rgba(0,0,0,0.3);}
        .hero-label{font-size:16px; color:rgba(255,255,255,0.95); margin-top:8px;}

        /* Main Container */
        .main-container{
            max-width:1200px;
            margin:-80px auto 60px;
            padding:0 20px;
            position:relative;
            z-index:10;
        }

        .content-grid{
            display:grid;
            grid-template-columns:1fr 340px;
            gap:32px;
            align-items:start;
        }

        /* Section Card */
        .section {
            background: white;
            border-radius: 16px;
            padding: 32px;
            margin-bottom: 24px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.06);
            border:1px solid rgba(2,6,23,0.04);
        }

        .section-title {
            font-size: 22px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 20px;
        }

        .section-content {
            color: #475569;
            font-size: 15px;
            line-height: 1.8;
        }

        .visi-label, .misi-label {
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 12px;
            font-size:16px;
        }

        .misi-label {
            margin-top: 24px;
        }

        /* Announcements */
        .announcements-grid {
            display: flex;
            flex-direction:column;
            gap: 16px;
        }

        .announcement-card {
            background: linear-gradient(135deg, #f0f9ff 0%, #ffffff 100%);
            border-left: 4px solid var(--primary);
            padding: 20px;
            border-radius: 12px;
            box-shadow:0 2px 8px rgba(11,121,184,0.08);
        }

        .announcement-title {
            font-size: 16px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 10px;
        }

        .announcement-content {
            font-size: 14px;
            color: #64748b;
            line-height: 1.7;
        }

        /* Budget */
        .budget-amount {
            font-size: 18px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 20px;
        }

        .budget-download {
            display: flex;
            align-items: center;
            gap: 14px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 18px 20px;
            transition:all .2s;
            cursor:pointer;
        }

        .budget-download:hover {
            background: #f1f5f9;
            box-shadow:0 4px 12px rgba(11,121,184,0.1);
        }

        .budget-icon {
            font-size: 24px;
            color:var(--primary);
        }

        .budget-text {
            font-size: 15px;
            color: #475569;
            font-weight:600;
        }

        /* Sidebar */
        .sidebar {
            position: sticky;
            top: 80px;
            height: fit-content;
        }

        .leader-card {
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
            border-radius: 16px;
            padding: 28px;
            margin-bottom: 24px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.06);
            text-align: center;
            border:1px solid rgba(2,6,23,0.04);
        }

        .leader-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, #cbd5e1, #e2e8f0);
            margin: 0 auto 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            box-shadow:0 4px 12px rgba(0,0,0,0.08);
        }

        .leader-name {
            font-size: 17px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 6px;
        }

        .leader-title {
            font-size: 13px;
            color: var(--muted);
            font-weight:500;
        }

        .stats-list {
            display: flex;
            flex-direction:column;
            gap: 16px;
        }

        .stat-item {
            background: white;
            padding: 20px;
            border-radius: 12px;
            border-left: 4px solid var(--primary);
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }

        .stat-value {
            font-size: 28px;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 6px;
        }

        .stat-label {
            font-size: 13px;
            color: #475569;
            line-height: 1.5;
            font-weight:600;
        }

        .stat-sublabel {
            font-size: 12px;
            color: #94a3b8;
            margin-top:4px;
        }

        /* Footer */
        footer{background:linear-gradient(135deg,#1e293b 0%, #0f172a 100%);color:#cbd5e1;padding:60px 20px 32px}
        .footer-inner{max-width:var(--max-w);margin:0 auto;display:flex;gap:48px;flex-wrap:wrap;align-items:flex-start}
        .footer-left{flex:1;min-width:240px}
        .footer-left strong{color:#fff;font-size:18px}
        .footer-small{color:#94a3b8;font-size:14px;line-height:1.8;margin-top:12px}
        .footer-right{display:flex;gap:40px;align-items:flex-start}
        .footer-col h4{color:#fff;margin-bottom:12px;font-size:16px;font-weight:700}
        .footer-col{font-size:14px}
        .social-links{display:flex;gap:12px;margin-top:8px}
        .social-links a{color:#cbd5e1;font-size:20px;transition:color .2s}
        .social-links a:hover{color:#fff}

        /* Responsive */
        @media (max-width:1000px){
            .content-grid{grid-template-columns:1fr;}
            .sidebar{position:static;margin-top:24px;}
            .hero h1{font-size:36px}
        }
        @media (max-width:640px){
            .hero h1{font-size:28px}
            .hero-population{font-size:32px}
            .site-nav .nav-menu{display:none}
            .section{padding:24px}
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="site-nav" role="navigation" aria-label="Utama">
        <div class="navbar-container">
            <a class="brand" href="/" aria-label="Beranda Toba Hita">
                <img src="{{ asset('images/logo.png') }}" alt="logo Kabupaten Toba">
            </a>
            <ul class="nav-menu" role="menubar" aria-label="Utama">
                <li><a href="/">Beranda</a></li>
                <li><a href="/profile">Profil Kabupaten</a></li>
                <li><a href="/villages" class="active">Daftar Desa</a></li>
            </ul>
            <div class="nav-right" aria-hidden="true">
                <a href="/villages" title="Kembali ke Daftar Desa" style="color:var(--muted);font-size:15px"><i class="fa fa-arrow-left"></i></a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <div>
            <h1>{{ $village['name'] }}</h1>
            <div class="hero-population">{{ number_format($village['population']) }}</div>
            <div class="hero-label">Penduduk</div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-container">
        <div class="content-grid">
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

                <!-- Pengumuman -->
                <div class="section">
                    <h2 class="section-title">Pengumuman Desa</h2>
                    <div class="announcements-grid">
                        @if(!empty($village['announcements']))
                            @foreach($village['announcements'] as $announcement)
                                <div class="announcement-card">
                                    <div class="announcement-title">{{ $announcement['title'] }}</div>
                                    <div class="announcement-content">{{ $announcement['content'] }}</div>
                                </div>
                            @endforeach
                        @else
                            <div class="announcement-card">
                                <div class="announcement-title">Belum ada pengumuman terbaru.</div>
                                <div class="announcement-content">Pantau terus halaman ini untuk informasi terkini dari desa.</div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Transparansi Anggaran -->
                <div class="section">
                    <h2 class="section-title">Transparansi Anggaran Desa</h2>
                    <p class="section-content" style="margin-bottom: 20px;">
                        Dokumen laporan realisasi anggaran {{ $village['name'] }} dapat diunduh untuk transparansi dan akuntabilitas pengelolaan keuangan desa.
                    </p>
                    
                    <div class="budget-amount">{{ $village['budget'] }}</div>
                    
                    <a href="{{ asset('documents/apbd-2025.pdf') }}" class="budget-download" download title="Unduh {{ $village['budget'] }}">
                        <span class="budget-icon"><i class="fa fa-file-pdf"></i></span>
                        <div>
                            <div class="budget-text">{{ $village['budget'] }}</div>
                            <div style="font-size:12px;color:var(--muted);margin-top:4px">Klik untuk mengunduh dokumen</div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
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
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-inner">
            <div class="footer-left" style="display:flex; align-items:center; gap:16px;">
                <img src="{{ asset('images/logo.png') }}" alt="logo" style="height:42px;">
                <div>
                    <strong>Toba Hita</strong>
                    <div class="footer-small">Portal informasi terintegrasi untuk transparansi dan pelayanan publik di Kabupaten Toba.</div>
                </div>
            </div>
            
            <div class="footer-right">
                <div class="footer-col">
                    <h4>Hubungi Kami</h4>
                    <div>+62 3456 7890<br>tobahita@mail.com</div>
                </div>

                <div class="footer-col">
                    <h4>Ikuti Kami</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Auto-refresh untuk cek update visi misi setiap 10 detik
        let lastUpdated = '{{ $village["updated_at"] ?? "" }}';
        
        setInterval(function() {
            fetch('/api/village-check-update/{{ $village["id"] }}')
                .then(response => response.json())
                .then(data => {
                    if (data.updated_at !== lastUpdated && lastUpdated !== '') {
                        console.log('Visi Misi updated! Reloading...');
                        location.reload();
                    }
                    lastUpdated = data.updated_at;
                })
                .catch(error => console.log('Check update error:', error));
        }, 10000);
    </script>
</body>
</html>