<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Beranda - Toba Hita</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root{
            --primary:#0b79b8;
            --nav-h:64px;
            --muted:#6b7280;
            --bg-light:#edf7fe;
            --dark:#0f1724;
            --max-width:1200px;
        }
        *{box-sizing:border-box;margin:0;padding:0}
        html,body{height:100%}
        body{font-family:'Poppins',system-ui,-apple-system,"Segoe UI",Roboto,Arial; color:var(--dark); background:#fff;-webkit-font-smoothing:antialiased}

        /* NAV */
        .site-nav{
            position:sticky; top:0; z-index:60;
            height:var(--nav-h);
            display:flex; align-items:center;
            background:rgba(255,255,255,0.95);
            border-bottom:1px solid rgba(15,23,36,0.06);
            backdrop-filter: blur(4px) saturate(120%);
        }
        .nav-inner{max-width:var(--max-width); margin:0 auto; width:100%; display:flex; align-items:center; gap:12px; padding:0 16px;}
        .brand{flex:0 0 auto; display:flex; align-items:center}
        .brand img{height:42px; width:auto; display:block}
        .nav-center{flex:1 1 auto; display:flex; justify-content:center}
        .nav-menu{display:flex; gap:26px; list-style:none; align-items:center}
        .nav-menu a{display:inline-block; text-decoration:none; color:rgba(15,23,36,0.88); font-weight:600; padding:8px 8px; border-radius:6px}
        .nav-menu a.active, .nav-menu a:hover{color:var(--primary); background:rgba(11,121,184,0.04)}
        .nav-actions{flex:0 0 auto; display:flex; gap:10px; align-items:center}
        .btn{border:none; cursor:pointer; border-radius:999px; padding:8px 14px; font-weight:600}
        .btn-outline{background:transparent; border:1px solid rgba(15,23,36,0.06); color:var(--dark)}
        .btn-primary{background:var(--primary); color:#fff; box-shadow:0 6px 18px rgba(11,121,184,0.12)}
        .nav-toggle{display:none; background:transparent; border:0; font-size:20px; color:var(--dark)}

        /* HERO */
        .hero{
            min-height:560px;
            display:flex; align-items:center; justify-content:center; text-align:center;
            padding:72px 24px 96px;
            background-image:
                linear-gradient(to bottom, rgba(7,48,71,0.55), rgba(7,48,71,0.18) 55%, rgba(255,255,255,0)),
                url('images/pemandangan-sawah.jpg');
            background-position:center 40%;
            background-size:cover;
            color:#fff;
        }
        .hero .wrap{max-width:980px}
        .hero h1{font-size:56px;line-height:1.02;font-weight:800;margin:0 0 18px;text-shadow:0 6px 30px rgba(2,6,23,0.28)}
        .hero p{font-size:16px;color:rgba(255,255,255,0.95);margin:0 0 26px;opacity:0.95}
        .cta{display:inline-flex;align-items:center;gap:12px;background:var(--primary);color:#fff;padding:12px 22px;border-radius:999px;font-weight:700;text-decoration:none;box-shadow:0 8px 26px rgba(11,121,184,0.14)}

        /* FEATURES */
        .features{background:var(--bg-light);padding:54px 18px 84px;margin-top:-48px;border-top-left-radius:12px;border-top-right-radius:12px;position:relative;z-index:10}
        .features .container{max-width:1100px;margin:0 auto}
        .features h2{text-align:center;font-size:28px;margin-bottom:36px;color:var(--dark)}
        .grid{display:flex;gap:32px;justify-content:space-between;align-items:stretch;flex-wrap:wrap}
        .card-feature{flex:1 1 280px;background:transparent;text-align:center;padding:18px;border-radius:12px}
        .feature-icon{width:64px;height:64px;border-radius:12px;margin:0 auto 12px;display:flex;align-items:center;justify-content:center;background:#e6f7ff;color:var(--primary);font-size:26px;box-shadow:0 6px 20px rgba(11,121,184,0.06)}
        .card-feature h3{margin-bottom:8px;font-size:16px}
        .card-feature p{color:var(--muted);font-size:14px;line-height:1.6}

        /* News & Announcements Section */
        .news-section{
            padding:64px 18px;
            background:#fff;
        }
        .news-section .container{
            max-width:1100px;
            margin:0 auto;
        }
        .section-header{
            text-align:center;
            margin-bottom:42px;
        }
        .section-header h2{
            font-size:32px;
            margin-bottom:8px;
            color:var(--dark);
        }
        .section-header p{
            color:var(--muted);
            font-size:16px;
        }
        .news-grid{
            display:grid;
            grid-template-columns:repeat(auto-fill, minmax(320px, 1fr));
            gap:24px;
            margin-bottom:48px;
        }
        .news-card{
            background:#fff;
            border-radius:12px;
            overflow:hidden;
            box-shadow:0 2px 12px rgba(0,0,0,0.08);
            transition:transform 0.3s, box-shadow 0.3s;
            cursor:pointer;
        }
        .news-card:hover{
            transform:translateY(-4px);
            box-shadow:0 8px 24px rgba(0,0,0,0.12);
        }
        .news-image{
            width:100%;
            height:180px;
            object-fit:cover;
            background:linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display:flex;
            align-items:center;
            justify-content:center;
            color:#fff;
            font-size:48px;
        }
        .news-content{
            padding:20px;
        }
        .news-category{
            display:inline-block;
            background:var(--bg-light);
            color:var(--primary);
            padding:4px 12px;
            border-radius:999px;
            font-size:12px;
            font-weight:600;
            margin-bottom:8px;
        }
        .news-title{
            font-size:18px;
            font-weight:600;
            margin-bottom:8px;
            color:var(--dark);
            line-height:1.4;
        }
        .news-excerpt{
            color:var(--muted);
            font-size:14px;
            line-height:1.6;
            margin-bottom:12px;
            display:-webkit-box;
            -webkit-line-clamp:2;
            -webkit-box-orient:vertical;
            overflow:hidden;
        }
        .news-meta{
            display:flex;
            gap:16px;
            font-size:13px;
            color:var(--muted);
        }
        .announcements-box{
            background:linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius:12px;
            padding:32px;
            color:#fff;
            margin-top:32px;
        }
        .announcements-box h3{
            font-size:24px;
            margin-bottom:20px;
            display:flex;
            align-items:center;
            gap:12px;
        }
        .announcement-item{
            background:rgba(255,255,255,0.15);
            backdrop-filter:blur(10px);
            padding:16px;
            border-radius:8px;
            margin-bottom:12px;
            border-left:4px solid rgba(255,255,255,0.5);
        }
        .announcement-item:last-child{
            margin-bottom:0;
        }
        .announcement-title{
            font-size:16px;
            font-weight:600;
            margin-bottom:6px;
        }
        .announcement-date{
            font-size:13px;
            opacity:0.9;
        }

        /* Documentation Section */
        .documentation-section{
            padding:64px 18px 84px;
            background:#f8fafc;
        }
        .documentation-section .container{
            max-width:1100px;
            margin:0 auto;
        }
        .documentation-section h2{
            text-align:center;
            font-size:28px;
            margin-bottom:12px;
            color:var(--dark);
        }
        .doc-card{
            background:#fff;
            border-radius:12px;
            padding:24px;
            display:flex;
            align-items:center;
            gap:20px;
            box-shadow:0 2px 8px rgba(0,0,0,0.06);
            max-width:700px;
            margin:0 auto;
        }
        .doc-icon{
            width:60px;
            height:60px;
            border-radius:12px;
            background:linear-gradient(135deg, var(--primary), #0a5c8a);
            display:flex;
            align-items:center;
            justify-content:center;
            color:#fff;
            font-size:28px;
            flex-shrink:0;
        }
        .doc-info{
            flex:1;
        }
        .doc-info h3{
            margin:0 0 4px 0;
            font-size:16px;
            font-weight:600;
            color:var(--dark);
        }
        .doc-download-btn{
            background:var(--primary);
            color:#fff;
            padding:10px 20px;
            border-radius:8px;
            text-decoration:none;
            font-weight:600;
            font-size:14px;
            display:inline-flex;
            align-items:center;
            gap:8px;
            transition:all 0.3s;
        }
        .doc-download-btn:hover{
            background:#0a5c8a;
            transform:translateY(-2px);
            box-shadow:0 4px 12px rgba(11,121,184,0.3);
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

        /* Responsive */
        @media (max-width:980px){
            .nav-center{display:none}
            .nav-toggle{display:inline-flex}
            .hero h1{font-size:40px}
        }
        @media (max-width:520px){
            .hero{padding-top:48px;padding-bottom:60px}
            .hero h1{font-size:32px}
            .grid{flex-direction:column;align-items:center}
            .nav-actions .btn{padding:6px 10px;font-size:14px}
            .doc-card{
                flex-direction:column;
                text-align:center;
            }
            .doc-info h3{
                font-size:15px;
            }
        }

        /* Mobile expanded menu (simple) */
        .mobile-menu{
            display:none;
            position:absolute;
            left:0; right:0;
            top:var(--nav-h);
            background:#fff;
            border-bottom:1px solid rgba(15,23,36,0.06);
            box-shadow:0 10px 30px rgba(0,0,0,0.06);
            padding:12px 16px;
        }
        .mobile-menu.open{display:block}
        .mobile-menu a{display:block;padding:10px 6px;border-radius:8px;color:var(--dark);text-decoration:none}
        .mobile-menu a + a{margin-top:4px}
    </style>
</head>
<body>

<header class="site-nav" role="banner">
    <div class="nav-inner">
        <a class="brand" href="/">
            <img src="images/logo.png" alt="Toba Hita">
        </a>

        <nav class="nav-center" role="navigation" aria-label="Utama">
            <ul class="nav-menu" role="menubar" id="mainMenuDesktop">
                <li role="none"><a role="menuitem" href="/" class="active">Beranda</a></li>
                <li role="none"><a role="menuitem" href="/profile">Profil Kabupaten</a></li>
                <li role="none"><a role="menuitem" href="/villages">Daftar Desa</a></li>
            </ul>
        </nav>

        <div class="nav-actions" role="group" aria-label="Aksi">
            <button class="nav-toggle" id="navToggle" aria-label="Buka menu" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i></button>
        </div>
    </div>

    <!-- mobile menu (shown when burger clicked) -->
    <div id="mobileMenu" class="mobile-menu" aria-hidden="true">
        <a href="/" aria-current="page">Beranda</a>
        <a href="/profile">Profil Kabupaten</a>
        <a href="/villages">Daftar Desa</a>
        <div style="height:8px"></div>
    </div>
</header>

<main>
    <section class="hero" role="region" aria-label="Hero utama">
        <div class="wrap">
            <h1>Membangun Toba,<br>Digitalisasi Jantung<br>Budaya Batak</h1>
            <p>Selamat datang di portal e‑Government Kabupaten Toba. Temukan informasi desa, transparansi anggaran, dan layanan publik dalam satu platform terintegrasi.</p>
            <a class="cta" href="/villages">Jelajahi Desa Sekarang</a>
        </div>
    </section>

    <section class="features" aria-labelledby="fitur-heading">
        <div class="container">
            <h2 id="fitur-heading">Fitur Unggulan Toba Hita</h2>
            <div class="grid">
                <div class="card-feature">
                        <div class="feature-icon"><i class="fa fa-headset" aria-hidden="true"></i></div>
                    <h3>Data Desa</h3>
                    <p>Kelola data penduduk lebih aman & efisien dengan antarmuka yang jelas dan export data.</p>
                </div>

                <div class="card-feature">
                        <div class="feature-icon"><i class="fa fa-chart-bar" aria-hidden="true"></i></div>
                    <h3>Transparansi Anggaran</h3>
                    <p>Lihat dan unduh laporan Anggaran Pendapatan dan Belanja Desa (APBDes) secara transparan.</p>
                </div>

                <div class="card-feature">
                        <div class="feature-icon"><i class="fa fa-shield-alt" aria-hidden="true"></i></div>
                    <h3>Layanan Informasi</h3>
                    <p>Pelayanan publik lebih modern & cepat melalui formulir digital dan notifikasi.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita & Pengumuman Section -->
    <section class="news-section" aria-labelledby="news-heading">
        <div class="container">
            <div class="section-header">
                <h2 id="news-heading">Berita Terkini</h2>
                <p>Ikuti perkembangan terbaru dari Kabupaten Toba</p>
            </div>

            @if($news && $news->count() > 0)
            <div class="news-grid">
                @foreach($news->take(3) as $item)
                <div class="news-card">
                    <div class="news-image">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="news-content">
                        <span class="news-category">{{ $item->category }}</span>
                        <h3 class="news-title">{{ $item->title }}</h3>
                        <p class="news-excerpt">{{ $item->excerpt ?? Str::limit($item->content, 100) }}</p>
                        <div class="news-meta">
                            <span><i class="far fa-calendar"></i> {{ $item->published_at->format('d M Y') }}</span>
                            <span><i class="far fa-clock"></i> {{ $item->published_at->format('H:i') }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div style="text-align:center;padding:40px;color:var(--muted)">
                <i class="fas fa-newspaper" style="font-size:48px;margin-bottom:16px;opacity:0.3"></i>
                <p>Belum ada berita terbaru</p>
            </div>
            @endif

            <!-- Pengumuman -->
            @if($announcements && $announcements->count() > 0)
            <div class="announcements-box">
                <h3>
                    <i class="fas fa-bullhorn"></i>
                    Pengumuman Penting
                </h3>
                @foreach($announcements->take(3) as $item)
                <div class="announcement-item">
                    <div class="announcement-title">{{ $item->title }}</div>
                    <div class="announcement-date">
                        <i class="far fa-calendar"></i> {{ $item->published_at->format('d M Y, H:i') }} WIB
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>


</main>



<script>

    // mobile menu toggle
    (function(){
        const toggle = document.getElementById('navToggle');
        const mobile = document.getElementById('mobileMenu');
        toggle && toggle.addEventListener('click', function(e){
            const opened = mobile.classList.toggle('open');
            mobile.setAttribute('aria-hidden', String(!opened));
            this.setAttribute('aria-expanded', String(opened));
        });

        // close mobile menu when clicking outside
        document.addEventListener('click', function(e){
            const inside = mobile.contains(e.target) || toggle.contains(e.target);
            if (!inside && mobile.classList.contains('open')) {
                mobile.classList.remove('open');
                mobile.setAttribute('aria-hidden','true');
                toggle.setAttribute('aria-expanded','false');
            }
        });
    })();
</script>
<!-- Footer -->
    @include('components.footer')

</body>
</html>