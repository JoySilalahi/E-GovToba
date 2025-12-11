<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Toba Hita</title>
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/logo.png')); ?>" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root{
            --primary: #0b79b8;
            --primary-light: #0e8dd1;
            --muted: #64748b;
            --text: #0f172a;
            --bg: #f8fafc;
            --card: #ffffff;
            --border: rgba(15,23,42,0.08);
            --max-w: 1200px;
            --max-width: 1200px;
            --nav-h: 64px;
            --dark: #0f1724;
            --radius: 16px;
            --shadow: 0 1px 3px rgba(15,23,42,0.08), 0 1px 2px rgba(15,23,42,0.06);
            --shadow-lg: 0 10px 15px -3px rgba(15,23,42,0.08), 0 4px 6px -2px rgba(15,23,42,0.05);
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: "Poppins", system-ui, -apple-system, sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.6;
        }
        /* NAV */
        .site-nav{
            position:sticky; top:0; z-index:60;
            height:var(--nav-h);
            display:flex; align-items:center;
            background:rgba(255,255,255,0.95);
            border-bottom:1px solid rgba(15,23,36,0.06);
            backdrop-filter: blur(4px) saturate(120%);
        }
        .nav-inner{max-width:1200px; margin:0 auto; width:100%; display:flex; align-items:center; gap:12px; padding:0 16px;}
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
        .mobile-menu{display:none; position:absolute; top:100%; left:0; right:0; background:rgba(255,255,255,0.98); border-bottom:1px solid rgba(15,23,36,0.06); padding:12px 16px;}
        .mobile-menu.open{display:block}
        .mobile-menu a{display:block;padding:10px 6px;border-radius:8px;color:var(--dark);text-decoration:none}
        .mobile-menu a + a{margin-top:4px}
        
        /* CSS Variables untuk Navbar */
        :root {
            --nav-h: 64px;
        }
        .hero {
            background-image: linear-gradient(135deg, rgba(11,79,110,0.8), rgba(11,121,184,0.7)), url("<?php echo e(asset('images/danau-toba.jpg')); ?>");
            background-size: cover; background-position: center; color: #fff; padding: 80px 32px 120px;
            text-align: center; position: relative;
        }
        .hero::after { content:''; position:absolute; bottom:0; left:0; right:0; height:100px; background: linear-gradient(to bottom, transparent, var(--bg)); }
        .hero .wrap { max-width:900px; margin:0 auto; position:relative; z-index:1 }
        .hero h1 { font-size:48px; margin:0 0 16px; font-weight:800; letter-spacing:-0.5px }
        .hero p { margin:0 0 32px; opacity:.95; font-size:18px; font-weight:500 }
        .hero-stats { display:flex; gap:64px; justify-content:center; margin-top:32px }
        .stat-item div:first-child { font-size:40px; font-weight:800; margin-bottom:4px }
        .stat-label { font-weight:500; font-size:14px; color: rgba(255,255,255,0.9) }
        .container { max-width: var(--max-w); margin: 0 auto; padding: 0 32px; }
        .content { margin: -70px auto 48px; position: relative; z-index: 10; }
        .card { background: var(--card); border-radius: var(--radius); padding: 32px; box-shadow: var(--shadow-lg); border:1px solid var(--border); display:block }
        .two-column { display: grid; grid-template-columns: 1fr 400px; gap: 32px; align-items: stretch; }
        .two-column > article.card, .two-column > aside > .card { height: 100%; display: flex; flex-direction: column; }
        .sejarah-content { flex: 1 1 auto; min-height: 0; }
        h2 { font-size: 28px; font-weight:700; margin:0 0 20px }
        h3 { font-size:20px; font-weight:700; margin:0 0 16px }
        .muted { color: var(--muted); line-height:1.7 }
        .bupati-cards { display: grid; grid-template-columns: 1fr 1fr; gap:16px; margin-top:8px }
        .bupati-card { background: linear-gradient(135deg,#f8fafc 0%, #ffffff 100%); border-radius: 14px; padding: 24px 16px; text-align:center; box-shadow: var(--shadow); border:1px solid var(--border); }
        .bupati-photo { width:110px; height:110px; object-fit:cover; border-radius:50%; margin:0 auto 16px; border:4px solid #e0f2fe; box-shadow:0 4px 12px rgba(11,121,184,0.15) }
        .bupati-card > div:nth-child(2) { font-weight:700; margin-bottom:4px; font-size:15px }
        .bupati-card .muted { font-size:13px }
        .visi-misi-section { margin-top: 32px; }
        .visi-misi { display:grid; grid-template-columns: 1fr 1fr; gap:24px }
        .visi-misi .box { background: linear-gradient(135deg,#f0f9ff 0%, #ffffff 100%); padding:24px; border-radius:12px; border:1px solid rgba(11,121,184,0.1); height:100% }
        .visi-misi .box strong { display:block; margin-bottom:12px; color:var(--primary); font-size:16px }
        .visi-misi .box ul { margin:0; padding-left:20px; color:#475569 }
        .visi-misi .box li { margin-bottom:8px }
        .section-title { font-size:32px; font-weight:700; color:var(--text); text-align:center; margin:64px 0 32px }
        .news-area { display:grid; grid-template-columns: 1fr 480px; gap:32px; align-items:start }
        .news-column { display:flex; flex-direction:column; gap:24px }
        .tabs { display:flex; gap:12px; margin-bottom:24px }
        .tab { background:#f1f5f9; padding:12px 24px; border-radius:10px; border:none; cursor:pointer; color:var(--muted); font-weight:600; font-size:15px; transition:all .2s }
        .tab.active { background:var(--primary); color:#fff; box-shadow: 0 4px 12px rgba(11,121,184,0.3) }
        .news-list { display:flex; flex-direction:column; gap:16px }
        .news-item { background:#fff; border-radius:14px; padding:20px; border:1px solid var(--border); transition:all .2s }
        .news-item:hover { box-shadow: var(--shadow-lg); transform:translateY(-2px) }
        .news-meta { display:flex; gap:12px; align-items:center; font-size:13px; color:var(--muted); margin-bottom:12px }
        .tag { background: rgba(11,121,184,0.1); color:var(--primary); padding:6px 14px; border-radius:8px; font-weight:700; font-size:12px }
        .news-item h3 { font-size:17px; margin:0 0 8px; line-height:1.5 }
        .news-item p { margin:0; font-size:14px; line-height:1.6 }
        .calendar { background: linear-gradient(135deg,#f8fafc 0%, #ffffff 100%); border-radius:14px; padding:28px 20px 28px 20px; border:1px solid var(--border); position: relative; min-height: 230px; }
        .cal-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px; }
        .cal-header h4 { font-weight:700; font-size:18px; color:var(--text); margin: 0; }
        .cal-nav button { background: none; border: none; cursor: pointer; color: var(--primary); font-size: 16px; padding: 4px 8px; border-radius: 6px; transition: background .15s; }
        .cal-nav button:hover { background: rgba(11,121,184,0.1); }
        .day-labels { display:grid; grid-template-columns: repeat(7,1fr); gap:8px; margin-bottom: 8px; }
        .cal-grid { display:grid; grid-template-columns: repeat(7,1fr); gap:8px; font-size:14px }
        .cal-day { padding:8px; border-radius:8px; text-align:center; color:var(--text); background:transparent; border:1px solid transparent; cursor:pointer; font-weight:700; transition:all .15s; position: relative; z-index: 1; font-size:13px; line-height: 1.1; }
        .cal-day:not(.muted):hover { background: rgba(11,121,184,0.08); border-color: rgba(11,121,184,0.2) }
        .cal-day.muted { color:#94a3b8; cursor:default; font-weight:700 }
        .cal-day.today { background: linear-gradient(135deg, rgba(11,121,184,0.12), rgba(11,121,184,0.06)); color:var(--primary); font-weight:800 }
        .cal-day.selected { background: var(--primary); color: white; font-weight:800; box-shadow: 0 4px 8px rgba(11,121,184,0.14); z-index: 2; }
        .cal-day.has-event::after {
            content: '';
            position: absolute;
            bottom: 4px;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 4px;
            background: var(--primary);
            border-radius: 50%;
        }
        .events { display:flex; flex-direction:column; gap:16px; margin-top:20px; }
        .event-card { background:#fff; padding:20px; border-radius:14px; border:1px solid var(--border); position:relative; transition:all .2s }
        .event-card:hover { box-shadow: var(--shadow-lg); transform:translateY(-2px) }
        .event-date { font-size:13px; color:var(--muted); margin-bottom:8px; font-weight:600 }
        .event-title { font-weight:700; margin-bottom:8px; font-size:17px; line-height:1.5; padding-right:100px }
        .event-meta { font-size:13px; color:#64748b }
        .event-status { position:absolute; right:20px; top:20px; padding:6px 12px; border-radius:8px; font-size:11px; font-weight:700; color:#fff; text-transform:uppercase; letter-spacing:.5px }
        .status-upcoming { background:#06b6d4 }
        .status-ongoing { background:#f97316 }
        .status-past { background:#9ca3af }
        .no-events { text-align:center; padding:24px; border-radius:14px; background:#fff; border:2px dashed var(--border); color:var(--muted) }
        .attachment { display: flex; align-items: center; gap: 12px; padding: 16px; border: 1px solid var(--border); border-radius: 12px; text-decoration: none; color: var(--text); font-weight: 600; transition: background .2s; }
        .attachment:hover { background: #f8fafc; }
        .attachment svg { width: 20px; height: 20px; color: var(--primary); }
        .docs { margin:80px auto 80px }
        .docs h2 { text-align:center; margin:0 0 32px; font-size:32px }
        .docs-track { display:flex; gap:20px; justify-content:center; flex-wrap:wrap; padding:8px; max-width:1200px; margin:0 auto }
        .doc-item { flex:0 0 360px; border-radius:16px; overflow:hidden; background:#fff; box-shadow:var(--shadow-lg); transition:all .3s }
        .doc-item:hover { transform:translateY(-8px); box-shadow: 0 20px 25px -5px rgba(15,23,42,0.1), 0 10px 10px -5px rgba(15,23,42,0.04) }
        .doc-item img { width:100%; height:220px; object-fit:cover; display:block }
        .social-links a { color:#cbd5e1; font-size:24px; margin-right:12px }
        .social-links svg { width:20px; height:20px; fill:currentColor }
        @media (max-width:1100px) {
            .two-column { grid-template-columns: 1fr 360px }
            .news-area { grid-template-columns: 1fr 420px }
        }
        @media (max-width:900px) {
            .two-column, .news-area { grid-template-columns: 1fr }
            .visi-misi { grid-template-columns: 1fr }
            .hero { padding-bottom: 100px }
            .two-column > article.card, .two-column > aside > .card { height: auto; }
        }
        @media (max-width:640px) {
            .container { padding: 0 20px }
            .navbar-container { padding: 0 20px }
            .hero h1 { font-size:32px }
            .hero p { font-size:16px }
            .card { padding:24px }
            .bupati-cards { grid-template-columns:1fr }
            .visi-misi { grid-template-columns:1fr }
            .cal-day { padding:8px 6px; font-size:12px }
            .doc-item { flex: 0 0 100%; max-width: 320px }
            .docs-track { justify-content:center }
        }
    </style>
</head>
<body>
    <?php
    // Build agenda data from database
    $agenda_data = [];
    if(isset($agendas) && $agendas->count() > 0) {
        foreach($agendas as $agenda) {
            $date = $agenda->event_date->format('Y-m-d');
            if(!isset($agenda_data[$date])) {
                $agenda_data[$date] = [];
            }
            $agenda_data[$date][] = (object)[
                'title' => $agenda->title,
                'location' => $agenda->location ?? '-',
                'time_start' => $agenda->time_start ?? '00:00',
                'time_end' => $agenda->time_end ?? '23:59',
            ];
        }
    }
    ?>

    <header class="site-nav" role="banner">
        <div class="nav-inner">
            <a class="brand" href="/">
                <img src="images/logo.png" alt="Toba Hita">
            </a>

            <nav class="nav-center" role="navigation" aria-label="Utama">
                <ul class="nav-menu" role="menubar" id="mainMenuDesktop">
                    <li role="none"><a role="menuitem" href="/">Beranda</a></li>
                    <li role="none"><a role="menuitem" href="/profile" class="active">Profil Kabupaten</a></li>
                    <li role="none"><a role="menuitem" href="/villages">Daftar Desa</a></li>
                </ul>
            </nav>

            <div class="nav-actions" role="group" aria-label="Aksi">
                <button class="nav-toggle" id="navToggle" aria-label="Buka menu" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i></button>
            </div>
        </div>

        <!-- mobile menu (shown when burger clicked) -->
        <div id="mobileMenu" class="mobile-menu" aria-hidden="true">
            <a href="/">Beranda</a>
            <a href="/profile" class="active">Profil Kabupaten</a>
            <a href="/villages">Daftar Desa</a>
            <div style="height:8px"></div>
        </div>
    </header>

    <header class="hero" role="banner" aria-label="Hero">
        <div class="wrap">
            <h1>Profil Kabupaten Toba</h1>
            <p>Jantung Budaya Batak di Pesisir Danau Toba</p>
            <div class="hero-stats" aria-hidden="true">
                <div class="stat-item">
                    <div><?php echo e(isset($total_kecamatan) ? $total_kecamatan : 16); ?></div>
                    <div class="stat-label">Kecamatan</div>
                </div>
                <div class="stat-item">
                    <div><?php echo e(isset($total_penduduk) ? number_format($total_penduduk) : number_format(153831)); ?></div>
                    <div class="stat-label">Penduduk</div>
                </div>
            </div>
        </div>
    </header>

    <main class="container">
        <section class="content">
            <div class="two-column">
                <article class="card sejarah-card" aria-labelledby="sejarah-heading">
                    <div class="sejarah-content">
                        <h2 id="sejarah-heading">Sejarah Singkat</h2>
                        <p class="muted">Kabupaten Toba Samosir dibentuk berdasar UU No. 12 Tahun 1998. Kabupaten ini resmi berdiri pada 8 Maret 1999. Kawasan ini memiliki sejarah panjang dan kaya budaya Batak dengan perkembangan administratif sejak era reformasi.</p>
                        <p style="margin-top:18px" class="muted">
                            Sejak pembentukannya, Toba terus bertransformasi. Kini, fokus utama pemerintahan adalah pada pengembangan pariwisata super prioritas, infrastruktur digital, serta pemberdayaan masyarakat desa melalui program-program inovatif.
                        </p>
                        <p style="margin-top:18px" class="muted">
                            Latar belakang sejarah yang kuat menjadi modal dasar untuk pembangunan daerah yang berkelanjutan dan modern, dengan tetap menjaga kearifan lokal.
                        </p>
                    </div>
                </article>
                <aside>
                    <div class="card" aria-label="Bupati dan Wakil">
                        <h3>Bupati & Wakil Bupati</h3>
                        <div class="bupati-cards">
                            <div class="bupati-card">
                                <img class="bupati-photo" src="<?php echo e(asset('images/bupati.jpg')); ?>" alt="Bupati">
                                <div><?php echo e($district->bupati_name ?? 'Effendi Simbolon Panangian Napitupulu'); ?></div>
                                <div class="muted">Bupati Toba</div>
                                <div class="muted" style="font-size:12px"><?php echo e($district->periode ?? '2024-2025'); ?></div>
                            </div>
                            <div class="bupati-card">
                                <img class="bupati-photo" src="<?php echo e(asset('images/wakil-bupati.jpg')); ?>" alt="Wakil Bupati">
                                <div><?php echo e($district->wakil_bupati_name ?? 'Audi Murphy Sitorus'); ?></div>
                                <div class="muted">Wakil Bupati Toba</div>
                                <div class="muted" style="font-size:12px"><?php echo e($district->periode ?? '2024-2025'); ?></div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="card visi-misi-section">
                <h3>Visi & Misi</h3>
                <div class="visi-misi">
                    <div class="box">
                        <strong>Visi</strong>
                        <p class="muted"><?php echo e($district->visi ?? 'Toba Unggul dan Bersinar'); ?></p>
                    </div>
                    <div class="box">
                        <strong>Misi</strong>
                        <p class="muted"><?php echo e($district->misi ?? 'Meningkatkan kualitas sumber daya manusia yang andal dan berbudaya, mempercepat pembangunan infrastruktur, serta mewujudkan reformasi birokrasi yang bersih dan melayani.'); ?></p>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="section-title">Apa yang Baru di Kabupaten Toba?</div>
            <div class="news-area">
                <div class="news-column">
                    <div class="card">
                        <!-- Filter Info -->
                        <div id="dateFilterInfo" style="display: none; padding: 0.75rem 1rem; background: #e3f2fd; border-radius: 6px; margin-bottom: 1rem; font-size: 0.9rem;">
                            <i class="far fa-calendar me-2"></i>
                            <span id="selectedDateText"></span>
                            <button type="button" class="btn-close float-end" onclick="clearDateFilter()" style="font-size: 0.7rem;"></button>
                        </div>
                        
                        <div class="tabs" role="tablist" aria-label="Filter berita">
                            <button class="tab active" data-type="berita" role="tab" aria-selected="true" onclick="filterNews('berita')">Berita</button>
                            <button class="tab" data-type="pengumuman" role="tab" aria-selected="false" onclick="filterNews('pengumuman')">Pengumuman</button>
                        </div>
                        <div class="news-list" id="newsList">
                            <?php if(isset($beritaList) && $beritaList->count() > 0): ?>
                                <?php $__currentLoopData = $beritaList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <article class="news-item" data-type="berita" data-date="<?php echo e($item->published_at->format('Y-m-d')); ?>">
                                    <div class="news-meta">
                                        <?php if($item->type == 'agenda'): ?>
                                            <span class="tag" style="background:#10b981; color:white;"><?php echo e($item->category); ?></span>
                                        <?php else: ?>
                                            <span class="tag"><?php echo e($item->category); ?></span>
                                        <?php endif; ?>
                                        <time datetime="<?php echo e($item->published_at->format('Y-m-d')); ?>" style="margin-left:auto"><?php echo e($item->published_at->translatedFormat('d M Y')); ?></time>
                                    </div>
                                    <h3><?php echo e($item->title); ?></h3>
                                    <p class="muted">
                                        <?php if($item->type == 'agenda'): ?>
                                            <?php if(isset($item->time_start) && isset($item->time_end)): ?>
                                                <i class="far fa-clock"></i> <?php echo e($item->time_start); ?> - <?php echo e($item->time_end); ?> WIB
                                            <?php endif; ?>
                                            <?php if(isset($item->location) && $item->location): ?>
                                                <br><i class="fas fa-map-marker-alt"></i> <?php echo e($item->location); ?>

                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php echo e($item->content); ?>

                                        <?php endif; ?>
                                    </p>
                                </article>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            
                            <?php if(isset($pengumumanList) && $pengumumanList->count() > 0): ?>
                                <?php $__currentLoopData = $pengumumanList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <article class="news-item" data-type="pengumuman" data-date="<?php echo e($item->published_at->format('Y-m-d')); ?>" style="display:none">
                                    <div class="news-meta" style="color:#d97706;">
                                        <?php if($item->type == 'agenda'): ?>
                                            <span class="tag" style="background:#10b981; color:white;"><?php echo e($item->category); ?></span>
                                        <?php else: ?>
                                            <span class="tag" style="background:#fff7ed; color:#d97706;"><?php echo e($item->category); ?></span>
                                        <?php endif; ?>
                                        <time datetime="<?php echo e($item->published_at->format('Y-m-d')); ?>" style="margin-left:auto"><?php echo e($item->published_at->translatedFormat('d M Y')); ?></time>
                                    </div>
                                    <h3><?php echo e($item->title); ?></h3>
                                    <p class="muted">
                                        <?php if($item->type == 'agenda'): ?>
                                            <?php if(isset($item->time_start) && isset($item->time_end)): ?>
                                                <i class="far fa-clock"></i> <?php echo e($item->time_start); ?> - <?php echo e($item->time_end); ?> WIB
                                            <?php endif; ?>
                                            <?php if(isset($item->location) && $item->location): ?>
                                                <br><i class="fas fa-map-marker-alt"></i> <?php echo e($item->location); ?>

                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php echo e($item->content); ?>

                                        <?php endif; ?>
                                    </p>
                                </article>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            
                            <div id="noNewsMessage" class="alert alert-info" style="display: none; margin-top: 1rem;">
                                <i class="fas fa-info-circle me-2"></i> Tidak ada berita/pengumuman pada tanggal yang dipilih.
                            </div>
                        </div>
                        <div style="margin-top:20px; text-align:center">
                            <a href="#" style="color:var(--primary); font-weight:700; text-decoration:none">Lihat Semua Berita</a>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Transparansi Anggaran Kabupaten</h3>
                        <?php if($budgets->isEmpty()): ?>
                            <p style="color: var(--text-secondary); font-size: 0.9rem;">Belum ada dokumen anggaran tersedia.</p>
                        <?php else: ?>
                            <?php $__currentLoopData = $budgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $budget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="attachment" href="<?php echo e(\Storage::url($budget->file_path)); ?>" target="_blank" rel="noopener noreferrer">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M6 2h7l5 5v13a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zM13 3.5V9h5.5L13 3.5z"/></svg>
                                    <div><?php echo e($budget->title); ?> (<?php echo e(strtoupper($budget->file_type)); ?>)</div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <aside>
                    <div class="card">
                        <h3>Agenda Pemkot</h3>
                        <div class="calendar" aria-label="Kalender agenda">
                            <div class="cal-header">
                                <div class="cal-nav">
                                    <button id="prevMonth" aria-label="Bulan Sebelumnya"><i class="fas fa-chevron-left"></i></button>
                                </div>
                                <h4 id="currentMonthYear"></h4>
                                <div class="cal-nav">
                                    <button id="nextMonth" aria-label="Bulan Berikutnya"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                            <div class="day-labels">
                                <div class="cal-day muted" style="padding:0">Min</div><div class="cal-day muted" style="padding:0">Sen</div><div class="cal-day muted" style="padding:0">Sel</div>
                                <div class="cal-day muted" style="padding:0">Rab</div><div class="cal-day muted" style="padding:0">Kam</div><div class="cal-day muted" style="padding:0">Jum</div><div class="cal-day muted" style="padding:0">Sab</div>
                            </div>
                            <div id="calendarDates" class="cal-grid"></div>
                        </div>
                        <div class="events" id="eventsList" aria-live="polite">
                            <?php if(isset($upcoming_agendas)): ?>
                                <?php $__currentLoopData = $upcoming_agendas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agenda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="event-card" data-datetime="<?php echo e($agenda->date); ?>T<?php echo e($agenda->time_start); ?>">
                                        <div class="event-date">Akan Datang</div>
                                        <div class="event-title"><?php echo e($agenda->title); ?></div>
                                        <div class="event-meta"><i class="fas fa-map-marker-alt"></i> <?php echo e($agenda->location); ?></div>
                                        <span class="event-status status-upcoming" aria-hidden="true">Akan Datang</span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <div class="no-events" id="noEventsMessage" <?php if(isset($upcoming_agendas) && count($upcoming_agendas) > 0): ?> style="display:none;" <?php endif; ?>>Pilih tanggal di kalender untuk melihat agenda.</div>
                        </div>
                    </div>
                </aside>
            </div>
        </section>
        <section class="docs" aria-label="Dokumentasi Kegiatan">
            <h2>Dokumentasi Kegiatan</h2>
            <div class="docs-track">
                <?php if(isset($photos) && count($photos) > 0): ?>
                    <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="doc-item">
                            <img src="<?php echo e(asset('storage/' . $photo->photo_path)); ?>" alt="<?php echo e($photo->title ?? 'Dokumentasi Kegiatan'); ?>">
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="doc-item"><img src="<?php echo e(asset('images/dokumentasi kegiatan.jpg')); ?>" alt="Dokumentasi 1"></div>
                    <div class="doc-item"><img src="<?php echo e(asset('images/dokumentasi kegiatan (2).jpg')); ?>" alt="Dokumentasi 2"></div>
                    <div class="doc-item"><img src="<?php echo e(asset('images/tarian.jpg')); ?>" alt="Dokumentasi 3"></div>
                <?php endif; ?>
            </div>
        </section>
    </main>
<!-- Footer -->
    <?php echo $__env->make('components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

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

    <script>
        const AGENDA_DATA = <?php echo json_encode($simulated_events, 15, 512) ?>;
        
        let selectedDate = null;
        
        function filterNews(type) {
            const tabs = Array.from(document.querySelectorAll('.tab'));
            const newsList = document.getElementById('newsList');
            tabs.forEach(t=>{ 
                t.classList.remove('active'); 
                t.setAttribute('aria-selected','false'); 
                if (t.dataset.type === type) { t.classList.add('active'); t.setAttribute('aria-selected','true'); }
            });
            
            // Filter by type and date if selected
            const items = Array.from(newsList.querySelectorAll('[data-type]'));
            let visibleCount = 0;
            
            items.forEach(it => {
                const matchType = it.dataset.type === type;
                const matchDate = !selectedDate || it.dataset.date === selectedDate;
                
                if (matchType && matchDate) {
                    it.style.display = 'block';
                    visibleCount++;
                } else {
                    it.style.display = 'none';
                }
            });
            
            // Show/hide no news message
            const noNewsMsg = document.getElementById('noNewsMessage');
            if (selectedDate && visibleCount === 0) {
                noNewsMsg.style.display = 'block';
            } else {
                noNewsMsg.style.display = 'none';
            }
        }
        
        function filterByDate(dateStr) {
            selectedDate = dateStr;
            
            // Show date filter info
            const dateFilterInfo = document.getElementById('dateFilterInfo');
            const selectedDateText = document.getElementById('selectedDateText');
            const dateObj = new Date(dateStr);
            const formattedDate = dateObj.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
            
            selectedDateText.textContent = 'Menampilkan untuk: ' + formattedDate;
            dateFilterInfo.style.display = 'block';
            
            // Re-apply current tab filter with date filter
            const activeTab = document.querySelector('.tab.active');
            const currentType = activeTab ? activeTab.dataset.type : 'berita';
            filterNews(currentType);
        }
        
        function clearDateFilter() {
            selectedDate = null;
            
            // Hide date filter info
            document.getElementById('dateFilterInfo').style.display = 'none';
            
            // Show all items for current tab
            const activeTab = document.querySelector('.tab.active');
            const currentType = activeTab ? activeTab.dataset.type : 'berita';
            filterNews(currentType);
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            const yearEl = document.getElementById('year');
            if (yearEl) yearEl.textContent = new Date().getFullYear();
            const today = new Date();
            let currentDisplayDate = new Date(today.getFullYear(), today.getMonth(), 1); 
            const calendarDates = document.getElementById('calendarDates');
            const currentMonthYearEl = document.getElementById('currentMonthYear');
            const prevBtn = document.getElementById('prevMonth');
            const nextBtn = document.getElementById('nextMonth');
            const eventsList = document.getElementById('eventsList');
            const noEventsMessage = document.getElementById('noEventsMessage');
            const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            const pad = n => String(n).padStart(2,'0');
            const ymd = d => `${d.getFullYear()}-${pad(d.getMonth()+1)}-${pad(d.getDate())}`;
            function getStatus(eventDateStr, startTimeStr, endTimeStr) {
                const now = new Date();
                const startDateTime = new Date(`${eventDateStr}T${startTimeStr}`);
                const endDateTime = new Date(`${eventDateStr}T${endTimeStr}`);
                if (now >= startDateTime && now <= endDateTime) {
                    return { text: 'Sedang Berlangsung', class: 'status-ongoing' };
                } else if (now > endDateTime) {
                    return { text: 'Selesai', class: 'status-past' };
                } else {
                    return { text: 'Mendatang', class: 'status-upcoming' };
                }
            }
            function renderAgendas(dateStr, agendas) {
                eventsList.innerHTML = '';
                if (!agendas || agendas.length === 0) {
                    noEventsMessage.style.display = 'block';
                    return;
                }
                noEventsMessage.style.display = 'none';
                agendas.forEach(agenda => {
                    const status = getStatus(dateStr, agenda.time_start, agenda.time_end);
                    const html = `
                        <div class="event-card">
                            <div class="event-date">${new Date(dateStr).toLocaleDateString('id-ID', {day: 'numeric', month: 'long', year: 'numeric'})} • ${agenda.time_start} - ${agenda.time_end}</div>
                            <div class="event-title">${agenda.title}</div>
                            <div class="event-meta"><i class="fas fa-map-marker-alt"></i> ${agenda.location}</div>
                            <span class="event-status ${status.class}" aria-hidden="true">${status.text}</span>
                        </div>
                    `;
                    eventsList.insertAdjacentHTML('beforeend', html);
                });
            }
            function renderCalendar() {
                const year = currentDisplayDate.getFullYear();
                const month = currentDisplayDate.getMonth();
                const firstDayIndex = new Date(year, month, 1).getDay();
                const lastDay = new Date(year, month + 1, 0).getDate();
                const prevLastDay = new Date(year, month, 0).getDate();
                currentMonthYearEl.innerText = `${monthNames[month]} ${year}`;
                calendarDates.innerHTML = '';
                let daysHtml = "";
                for (let x = firstDayIndex; x > 0; x--) {
                    daysHtml += `<button class="cal-day muted" type="button">${prevLastDay - x + 1}</button>`;
                }
                for (let i = 1; i <= lastDay; i++) {
                    const monthStr = pad(month + 1);
                    const dayStr = pad(i);
                    const fullDate = `${year}-${monthStr}-${dayStr}`;
                    let classes = "";
                    if (fullDate === ymd(today)) classes += "today";
                    if (AGENDA_DATA[fullDate] && AGENDA_DATA[fullDate].length > 0) {
                        classes += " has-event";
                    }
                    daysHtml += `<button class="cal-day ${classes}" data-date="${fullDate}" type="button">${i}</button>`;
                }
                calendarDates.innerHTML = daysHtml;
                document.querySelectorAll('.cal-day:not(.muted)').forEach(el => {
                    el.addEventListener('click', function() {
                        document.querySelectorAll('.cal-day').forEach(d => d.classList.remove('selected'));
                        this.classList.add('selected');
                        const dateStr = this.dataset.date;
                        renderAgendas(dateStr, AGENDA_DATA[dateStr]);
                        
                        // Filter berita/pengumuman by selected date
                        filterByDate(dateStr);
                    });
                });
                const todayEl = document.querySelector('.cal-day.today');
                if (todayEl) {
                    todayEl.click();
                } else {
                    renderAgendas(null, null); 
                }
            }
            prevBtn.addEventListener('click', () => {
                currentDisplayDate.setMonth(currentDisplayDate.getMonth() - 1);
                renderCalendar();
            });
            nextBtn.addEventListener('click', () => {
                currentDisplayDate.setMonth(currentDisplayDate.getMonth() + 1);
                renderCalendar();
            });
            renderCalendar();
        });
    </script>
</body>
</html><?php /**PATH C:\Users\ASUS\Documents\E-GovToba\resources\views/district-information/profile.blade.php ENDPATH**/ ?>