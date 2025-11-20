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
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

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
            font-size: 16px;
            font-weight: 400;
            margin-bottom: 30px;
            opacity: 0.95;
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
   <nav class="site-nav" role="navigation" aria-label="Utama">
        <div class="navbar-container">
            <a class="brand" href="/" aria-label="Beranda Toba Hita">
                <img src="http://127.0.0.1:8000/images/logo.png" alt="logo Kabupaten Toba">
            </a>

            <ul class="nav-menu" role="menubar" aria-label="Utama">
                <li><a href="/" class="">Beranda</a></li>
                <li><a href="/profile" class="active">Profil Kabupaten</a></li>
                <li><a href="/villages" class="">Daftar Desa</a></li>
            </ul>
        </div>
    </nav>

        <!-- Hero Section -->
    <div class="hero" style="background-image: linear-gradient(to bottom, rgba(25,80,122,0.6) 0%, rgba(129,167,211,0.35) 57%, rgba(255,255,255,0) 100%), url('<?php echo e(asset('images/pemandangan-sawah.jpg')); ?>'); background-size: cover; background-position: center 65%;">
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
                                <img src="<?php echo e(asset('images/bupati.jpg')); ?>" alt="Bupati Toba" class="bupati-photo">
                            </div>
                            <div class="bupati-name">Effendi Sintong Panangian Napitupulu</div>
                            <div class="bupati-title-text">Bupati Toba</div>
                        </div>

                        <!-- Wakil Bupati Card -->
                        <div class="bupati-card">
                            <div class="bupati-photo-wrapper">
                                <img src="<?php echo e(asset('images/wakil-bupati.jpg')); ?>" alt="Wakil Bupati" class="bupati-photo">
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
                        <div class="visi-text"><?php echo e($district->visi ?? 'Toba Unggul dan Bersinar'); ?></div>
                    </div>

                    <div class="misi-box">
                        <div class="misi-label">Misi :</div>
                        <ul class="misi-list">
                            <li><?php echo e($district->misi ?? 'Meningkatkan kualitas sumber daya manusia yang andal dan berbudaya, mempercepat pembangunan infrastruktur, serta mewujudkan reformasi birokrasi yang bersih dan melayani.'); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dokumentasi Kegiatan -->
        <div class="section">
            <h2 class="section-title">Dokumentasi Kegiatan</h2>
            <div class="dokumentasi-grid">
                <div class="doc-card">
                    <img src="<?php echo e(asset('images/dokumentasi kegiatan.jpg')); ?>" alt="Kegiatan 1" class="doc-image">
                </div>
                <div class="doc-card">
                    <img src="<?php echo e(asset('images/dokumentasi kegiatan (2).jpg')); ?>" alt="Kegiatan 2" class="doc-image">
                </div>
                <div class="doc-card">
                    <img src="<?php echo e(asset('images/tarian.jpg')); ?>" alt="Kegiatan 3" class="doc-image">
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php echo $__env->make('components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\Users\ASUS\OneDrive\Documents\GitHub\E-GovToba\resources\views/district-information/profile.blade.php ENDPATH**/ ?>