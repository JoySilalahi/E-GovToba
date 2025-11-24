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
            <a href="/login" class="btn btn-outline">Masuk</a>
            <a href="/register" class="btn btn-primary">Daftar</a>
            <button class="nav-toggle" id="navToggle" aria-label="Buka menu" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i></button>
        </div>
    </div>

    <!-- mobile menu (shown when burger clicked) -->
    <div id="mobileMenu" class="mobile-menu" aria-hidden="true">
        <a href="/" aria-current="page">Beranda</a>
        <a href="/profile">Profil Kabupaten</a>
        <a href="/villages">Daftar Desa</a>
        <div style="height:8px"></div>
        <a href="/login" class="btn btn-outline" style="display:inline-block">Masuk</a>
        <a href="/register" class="btn btn-primary" style="display:inline-block; margin-left:8px">Daftar</a>
    </div>
</header>

<main>
    <section class="hero" role="region" aria-label="Hero utama">
        <div class="wrap">
            <h1>Membangun Toba,<br>Digitalisasi Jantung<br>Budaya Batak</h1>
            <p>Selamat datang di portal e‑Government Kabupaten Toba. Temukan informasi desa, transparansi anggaran, dan layanan publik dalam satu platform terintegrasi.</p>
            <a class="cta" href="/villages">Jelajahi Desa Sekarang <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        </div>
    </section>

    <section class="features" aria-labelledby="fitur-heading">
        <div class="container">
            <h2 id="fitur-heading">Fitur Unggulan Toba Hita</h2>
            <div class="grid">
                <div class="card-feature">
                    <div class="feature-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
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
                    <h3>Layanan Digital</h3>
                    <p>Pelayanan publik lebih modern & cepat melalui formulir digital dan notifikasi.</p>
                </div>
            </div>
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
    <?php echo $__env->make('components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</body>
</html><?php /**PATH C:\Users\ASUS\Documents\E-GovToba\resources\views/district-information/index.blade.php ENDPATH**/ ?>