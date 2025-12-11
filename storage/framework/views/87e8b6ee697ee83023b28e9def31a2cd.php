<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title><?php echo e($village['name']); ?>- Toba Hita</title>
    
    <link rel="icon" type="image/png" href="http://127.0.0.1:8000/images/logo.png" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
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
        .mobile-menu{display:none; position:absolute; top:100%; left:0; right:0; background:rgba(255,255,255,0.98); border-bottom:1px solid rgba(15,23,36,0.06); padding:12px 16px;}
        .mobile-menu.open{display:block}
        .mobile-menu a{display:block;padding:10px 6px;border-radius:8px;color:var(--dark);text-decoration:none}
        .mobile-menu a + a{margin-top:4px}

        /* HERO - Full Width */
        .hero{
            width: 100%;
            max-width: 100%;
            margin: 0;
            border-radius: 0;
            padding: 80px 20px 100px;
            background-image:
                linear-gradient(180deg, rgba(8,40,66,0.6), rgba(8,40,66,0.4)),
                url('<?php echo e($village["image"]); ?>');
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

        /* Announcement Search & Filter */
        .announcement-controls {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .search-box {
            flex: 1;
            min-width: 200px;
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 12px 42px 12px 16px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.2s;
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(11, 121, 184, 0.1);
        }

        .search-box i {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
        }

        .filter-group {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .filter-select {
            padding: 10px 14px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            font-size: 14px;
            font-family: inherit;
            background: white;
            cursor: pointer;
            transition: all 0.2s;
        }

        .filter-select:hover {
            border-color: var(--primary);
        }

        .filter-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(11, 121, 184, 0.1);
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
            position: relative;
            transition: all 0.2s;
        }

        .announcement-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(11,121,184,0.15);
        }

        .announcement-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 12px;
            gap: 12px;
        }

        .announcement-badge {
            display: inline-block;
            padding: 4px 12px;
            background: var(--primary);
            color: white;
            font-size: 11px;
            font-weight: 600;
            border-radius: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .announcement-new {
            background: #ef4444;
            padding: 4px 10px;
            font-size: 10px;
            border-radius: 10px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
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
            margin-bottom: 12px;
        }

        .announcement-meta {
            display: flex;
            gap: 16px;
            font-size: 12px;
            color: #94a3b8;
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid #e2e8f0;
        }

        .announcement-meta i {
            margin-right: 4px;
        }

        .no-results {
            text-align: center;
            padding: 40px 20px;
            color: var(--muted);
        }

        .no-results i {
            font-size: 48px;
            margin-bottom: 16px;
            opacity: 0.3;
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

        .social-links a { color:#cbd5e1; font-size:20px; margin-right:12px }
        .social-links svg { width:20px; height:20px; fill:currentColor }
        .social-links{display:flex;gap:12px;margin-top:8px}
        .social-links a{color:#cbd5e1;font-size:20px;transition:color .2s}
        .social-links a:hover{color:#fff}

        /* Responsive */
        @media (max-width:980px){
            .nav-center{display:none}
            .nav-toggle{display:inline-flex}
            .hero h1{font-size:40px}
            .content-grid{grid-template-columns:1fr;}
            .sidebar{position:static;margin-top:24px;}
            .announcement-controls{flex-direction: column;}
            .search-box{min-width: 100%;}
        }
        @media (max-width:520px){
            .hero{padding-top:48px;padding-bottom:60px}
            .hero h1{font-size:32px}
            .hero-population{font-size:32px}
            .grid{flex-direction:column;align-items:center}
            .nav-actions .btn{padding:6px 10px;font-size:14px}
            .section{padding:24px}
        }
    </style>
</head>
<body>
    <header class="site-nav" role="banner">
        <div class="nav-inner">
            <a class="brand" href="/">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Toba Hita">
            </a>

            <nav class="nav-center" role="navigation" aria-label="Utama">
                <ul class="nav-menu" role="menubar" id="mainMenuDesktop">
                    <li role="none"><a role="menuitem" href="/">Beranda</a></li>
                    <li role="none"><a role="menuitem" href="/profile">Profil Kabupaten</a></li>
                    <li role="none"><a role="menuitem" href="/villages" class="active">Daftar Desa</a></li>
                </ul>
            </nav>

            <div class="nav-actions" role="group" aria-label="Aksi">
                <button class="nav-toggle" id="navToggle" aria-label="Buka menu" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i></button>
            </div>
        </div>

        <!-- mobile menu (shown when burger clicked) -->
        <div id="mobileMenu" class="mobile-menu" aria-hidden="true">
            <a href="/">Beranda</a>
            <a href="/profile">Profil Kabupaten</a>
            <a href="/villages" class="active">Daftar Desa</a>
            <div style="height:8px"></div>
        </div>
    </header>

    <!-- Hero Section -->
    <div class="hero">
        <div>
            <h1><?php echo e($village['name']); ?></h1>
            <div class="hero-population"><?php echo e($village['population'] ?? 0); ?></div>
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
                        <p><?php echo e($village['visi'] ?? 'Visi belum ditetapkan. Silakan hubungi admin desa untuk informasi lebih lanjut.'); ?></p>

                        <div class="misi-label">Misi:</div>
                        <p><?php echo e($village['misi'] ?? 'Misi belum ditetapkan. Silakan hubungi admin desa untuk informasi lebih lanjut.'); ?></p>
                    </div>
                </div>

                <!-- Pengumuman -->
                <div class="section">
                    <h2 class="section-title">Pengumuman Desa</h2>
                    
                    <!-- Search & Filter Controls -->
                    <div class="announcement-controls">
                        <div class="search-box">
                            <input 
                                type="text" 
                                id="searchInput" 
                                placeholder="Cari pengumuman..." 
                                onkeyup="filterAnnouncements()"
                            />
                            <i class="fas fa-search"></i>
                        </div>
                        
                        <div class="filter-group">
                            <select id="categoryFilter" class="filter-select" onchange="filterAnnouncements()">
                                <option value="">Semua Kategori</option>
                                <option value="administrasi">Administrasi & Layanan</option>
                                <option value="bantuan">Program & Bantuan Sosial</option>
                                <option value="kegiatan">Kegiatan Desa</option>
                                <option value="keuangan">Keuangan & Transparansi</option>
                                <option value="pembangunan">Pembangunan & Infrastruktur</option>
                                <option value="rekrutmen">Rekrutmen & Lowongan</option>
                                <option value="keamanan">Keamanan & Himbauan</option>
                                <option value="kesehatan">Kesehatan & Lingkungan</option>
                            </select>
                            
                            <select id="yearFilter" class="filter-select" onchange="filterAnnouncements()">
                                <option value="">Semua Tahun</option>
                                <option value="2025">2025</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                            </select>
                        </div>
                    </div>

                    <!-- Announcements Grid -->
                    <div class="announcements-grid" id="announcementsContainer">
                        <!-- Sample Announcements (akan diganti dengan data real dari backend) -->
                        <div class="announcement-card" data-category="kesehatan" data-year="2025" data-new="true">
                            <div class="announcement-header">
                                <span class="announcement-badge">Kesehatan & Lingkungan</span>
                                <span class="announcement-new">BARU</span>
                            </div>
                            <div class="announcement-title">Jadwal Vaksinasi COVID-19 Booster</div>
                            <div class="announcement-content">
                                Pelaksanaan vaksinasi booster COVID-19 akan dilaksanakan pada hari Minggu, 15 Desember 2025 di Balai Desa Meat. Mohon membawa KTP dan kartu vaksinasi sebelumnya.
                            </div>
                            <div class="announcement-meta">
                                <span><i class="far fa-calendar"></i>7 Des 2025</span>
                                <span><i class="far fa-clock"></i>08:00 - 14:00</span>
                            </div>
                        </div>

                        <div class="announcement-card" data-category="kegiatan" data-year="2025">
                            <div class="announcement-header">
                                <span class="announcement-badge">Kegiatan Desa</span>
                            </div>
                            <div class="announcement-title">Gotong Royong Bersih Desa</div>
                            <div class="announcement-content">
                                Mengajak seluruh warga untuk berpartisipasi dalam kegiatan gotong royong membersihkan lingkungan desa pada hari Sabtu, 14 Desember 2025 pukul 07:00 WIB.
                            </div>
                            <div class="announcement-meta">
                                <span><i class="far fa-calendar"></i>5 Des 2025</span>
                                <span><i class="far fa-user"></i>Karang Taruna</span>
                            </div>
                        </div>

                        <div class="announcement-card" data-category="administrasi" data-year="2025">
                            <div class="announcement-header">
                                <span class="announcement-badge">Administrasi & Layanan</span>
                            </div>
                            <div class="announcement-title">Libur Pelayanan Kantor Desa</div>
                            <div class="announcement-content">
                                Pelayanan administrasi di kantor desa akan libur pada tanggal 25 Desember 2025 dalam rangka Hari Natal. Pelayanan kembali normal pada tanggal 26 Desember 2025.
                            </div>
                            <div class="announcement-meta">
                                <span><i class="far fa-calendar"></i>3 Des 2025</span>
                                <span><i class="far fa-building"></i>Kantor Desa</span>
                            </div>
                        </div>

                        <div class="announcement-card" data-category="bantuan" data-year="2025">
                            <div class="announcement-header">
                                <span class="announcement-badge">Program & Bantuan Sosial</span>
                            </div>
                            <div class="announcement-title">Pendaftaran Penerima Bantuan Sosial 2025</div>
                            <div class="announcement-content">
                                Dibuka pendaftaran untuk penerima bantuan sosial tahun 2025. Persyaratan: KK, KTP, Surat Keterangan Tidak Mampu. Pendaftaran ditutup tanggal 20 Desember 2025.
                            </div>
                            <div class="announcement-meta">
                                <span><i class="far fa-calendar"></i>1 Des 2025</span>
                                <span><i class="far fa-file-alt"></i>Daftar sekarang</span>
                            </div>
                        </div>

                        <div class="announcement-card" data-category="keuangan" data-year="2024">
                            <div class="announcement-header">
                                <span class="announcement-badge">Keuangan & Transparansi</span>
                            </div>
                            <div class="announcement-title">Laporan Realisasi APBDes 2024</div>
                            <div class="announcement-content">
                                Laporan realisasi Anggaran Pendapatan dan Belanja Desa tahun 2024 telah tersedia untuk diunduh. Silakan akses melalui menu Transparansi Anggaran.
                            </div>
                            <div class="announcement-meta">
                                <span><i class="far fa-calendar"></i>28 Nov 2024</span>
                                <span><i class="far fa-file-pdf"></i>Unduh PDF</span>
                            </div>
                        </div>
                    </div>

                    <!-- No Results Message -->
                    <div class="no-results" id="noResults" style="display: none;">
                        <i class="fas fa-search"></i>
                        <p>Tidak ada pengumuman yang sesuai dengan pencarian Anda.</p>
                    </div>
                </div>

                <!-- Transparansi Anggaran -->
                <div class="section">
                    <h2 class="section-title">Transparansi Anggaran Desa</h2>
                    <p class="section-content" style="margin-bottom: 20px;">
                        Dokumen laporan realisasi anggaran <?php echo e($village['name']); ?> dapat diunduh untuk transparansi dan akuntabilitas pengelolaan keuangan desa.
                    </p>

                    <div class="budget-amount"><?php echo e($village['budget'] ?? 'APBD 2025'); ?></div>

                    <a href="<?php echo e($village['budget_file'] ?? url('documents/apbd-2025.pdf')); ?>" class="budget-download" download title="Unduh Anggaran">
                        <span class="budget-icon"><i class="fa fa-file-pdf"></i></span>
                        <div>
                            <div class="budget-text"><?php echo e($village['budget'] ?? 'APBD 2025'); ?></div>
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
                    <div class="leader-name"><?php echo e($village['leader']['name'] ?? 'Kepala Desa'); ?></div>
                    <div class="leader-title"><?php echo e($village['leader']['title'] ?? 'Kepala Desa'); ?></div>
                </div>

                <!-- Stats -->
                <div class="stats-list">
                    <?php if(!empty($village['stats']) && is_array($village['stats'])): ?>
                        <?php $__currentLoopData = $village['stats']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="stat-item">
                                <div class="stat-value"><?php echo e($stat['value']); ?></div>
                                <div class="stat-label"><?php echo e($stat['label']); ?></div>
                                <div class="stat-sublabel"><?php echo e($stat['sublabel']); ?></div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="stat-item">
                            <div class="stat-value">0</div>
                            <div class="stat-label">Agenda Mendatang</div>
                            <div class="stat-sublabel">Kegiatan</div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

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

        // Filter Announcements Function
        function filterAnnouncements() {
            const searchText = document.getElementById('searchInput').value.toLowerCase();
            const categoryFilter = document.getElementById('categoryFilter').value;
            const yearFilter = document.getElementById('yearFilter').value;
            
            const cards = document.querySelectorAll('.announcement-card');
            const container = document.getElementById('announcementsContainer');
            const noResults = document.getElementById('noResults');
            
            let visibleCount = 0;
            
            cards.forEach(card => {
                const title = card.querySelector('.announcement-title').textContent.toLowerCase();
                const content = card.querySelector('.announcement-content').textContent.toLowerCase();
                const category = card.dataset.category || '';
                const year = card.dataset.year || '';
                
                const matchesSearch = title.includes(searchText) || content.includes(searchText);
                const matchesCategory = !categoryFilter || category === categoryFilter;
                const matchesYear = !yearFilter || year === yearFilter;
                
                if (matchesSearch && matchesCategory && matchesYear) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });
            
            // Show/hide no results message
            if (visibleCount === 0) {
                noResults.style.display = 'block';
            } else {
                noResults.style.display = 'none';
            }
        }

        // Auto-refresh untuk cek update visi misi setiap 10 detik
        let lastUpdated = <?php echo e($village['updated_at'] ?? time()); ?>;

        setInterval(function() {
            fetch('/api/village-check-update/<?php echo e($village['id']); ?>')
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

        // Auto-hide "BARU" badge after 7 days
        document.addEventListener('DOMContentLoaded', function() {
            const newBadges = document.querySelectorAll('.announcement-new');
            const currentDate = new Date();
            
            newBadges.forEach(badge => {
                const card = badge.closest('.announcement-card');
                const dateText = card.querySelector('.announcement-meta span').textContent;
                // Implement date comparison logic here if needed
            });
        });
    </script>
</body>
</html><?php /**PATH C:\Users\ASUS\Documents\E-GovToba\resources\views/district-information/village-detail.blade.php ENDPATH**/ ?>