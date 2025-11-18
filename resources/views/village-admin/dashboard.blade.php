<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Desa Meat</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; color: #1b232f; }

        /* Sidebar */
        .sidebar {
            position: fixed; top: 0; left: 0; height: 100vh; width: 260px;
            background: linear-gradient(180deg,#34495e 0%,#2c3e50 100%);
            color: #fff; overflow-y: auto; z-index: 1000; box-shadow: 4px 0 12px rgba(0,0,0,0.1);
        }
        .sidebar-header { padding: 24px 20px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.06); }
        .sidebar-header h5 { font-size: 18px; font-weight:700; margin:0; }
        .sidebar-menu { list-style:none; padding:20px 0; }
        .sidebar-menu a { display:flex; align-items:center; padding:12px 20px; color:rgba(255,255,255,0.85); text-decoration:none; font-weight:500; border-left:4px solid transparent; transition:all .2s; }
        .sidebar-menu a.active, .sidebar-menu a:hover { background: rgba(255,255,255,0.06); color:#fff; border-left-color:#5280b9; }
        .sidebar-menu i { width:20px; margin-right:12px; font-size:16px; }
        .sidebar-footer { position:absolute; bottom:20px; width:100%; padding:0 20px; }
        .sidebar-footer a { color:rgba(255,255,255,0.85); text-decoration:none; display:flex; align-items:center; padding:12px 0; }

        /* Main Content */
        .main-content { margin-left:260px; padding:32px; min-height:100vh; transition:margin-left .3s; }

        /* Welcome header */
        .welcome-header { background: transparent; padding: 0 0 18px 0; margin-bottom: 8px; }
        .welcome-header h1 { font-size:28px; font-weight:800; color:#0f1724; margin:0 0 8px 0; }

        /* Visi Misi Card */
        .visi-misi-card { background:#fff; padding:26px; border-radius:12px; margin-bottom:20px; box-shadow:0 6px 18px rgba(14,30,60,0.04); border:1px solid #eef6fb; }
        .visi-section h4, .misi-section h4 { font-size:14px; font-weight:600; color:#475569; margin-bottom:8px; }
        .visi-section p, .misi-section p { color:#64748b; line-height:1.6; }

        /* Pengumuman Form */
        .pengumuman-section { background:#fff; padding:20px; border-radius:12px; margin-bottom:20px; box-shadow:0 6px 18px rgba(14,30,60,0.04); border:1px solid #eef6fb; }
        .pengumuman-section h3 { font-size:18px; font-weight:700; color:#0f1724; margin-bottom:14px; }
        .form-label { font-size:14px; font-weight:600; color:#475569; margin-bottom:8px; display:block; }
        .form-control { border:1px solid #e2e8f0; border-radius:8px; padding:10px 12px; font-size:14px; }
        .form-control:focus { border-color:#0077B6; box-shadow:0 0 0 .15rem rgba(59,130,246,0.12); }
        .btn-publis {
            background:#0b79b8; color:#fff; border:none;
            padding:6px 12px; border-radius:10px; font-size:13px; font-weight:600;
            cursor:pointer; transition:background .15s, transform .06s; display:inline-block; margin-top:8px;
            box-shadow:none; min-width:0; height:auto; line-height:normal;
        }
        .btn-publis:hover { background:#096598; transform:translateY(-1px); }

        /* Content Grid */
        .content-grid { display:grid; grid-template-columns: 320px 1fr; gap:24px; margin-top:10px; align-items:start; }

        /* Agenda Card (compact) */
        .agenda-card { background:#fff; padding:14px; border-radius:12px; box-shadow:0 6px 18px rgba(14,30,60,0.04); border:1px solid #eef6fb; }
        .agenda-header { display:flex; align-items:center; gap:10px; margin-bottom:12px; }
        .agenda-header i { color:#0b79b8; font-size:18px; }
        .agenda-header h4 { font-size:16px; font-weight:700; color:#0f1724; margin:0; }
        .agenda-item { display:flex; gap:12px; align-items:flex-start; padding:12px; border:1px solid #eef6fb; border-radius:10px; margin-bottom:12px; background:#fff; }
        .agenda-icon { width:40px; height:40px; background:#eff6ff; border-radius:8px; display:flex; align-items:center; justify-content:center; color:#0b79b8; }
        .agenda-title { font-size:14px; font-weight:700; color:#0f1724; margin-bottom:6px; }
        .agenda-date { font-size:12px; color:#64748b; margin-bottom:8px; }
        .agenda-status { display:inline-block; padding:4px 10px; border-radius:999px; font-size:11px; font-weight:700; }
        .agenda-status.mendatang { background:#fef3c7; color:#92400e; }
        .agenda-status.menunggu { background:#fee2e2; color:#dc2626; }
        .edit-agenda { margin-left:auto; background:none; border:none; color:#64748b; font-size:13px; cursor:pointer; padding:6px; }

        /* Right panel: stats stacked center, profile right */
        .right-panel { display:flex; gap:36px; align-items:flex-start; width:100%; justify-content:space-between; }
        .stats-column { display:flex; flex-direction:column; gap:28px; flex:0 0 620px; min-width:0; align-self:flex-start; }

        /* Stat card styling - stacked with decorative bracket and top line */
        .stat-card {
            position:relative;
            background:#fff;
            border-radius:14px;
            padding:28px 22px 28px 96px; /* left space for bracket + icon */
            box-shadow:0 12px 36px rgba(18,38,63,0.04);
            min-height:120px;
            overflow:visible;
            display:block;
        }
        .stat-card + .stat-card { margin-top: 8px; }

        .stat-card::before{
            content:"";
            position:absolute;
            left:18px;
            top:14px;
            bottom:14px;
            width:22px;
            background:linear-gradient(180deg,#0b79b8,#05607f);
            border-radius:18px;
        }
        .stat-card::after{
            content:"";
            position:absolute;
            left:72px;
            top:14px;
            width:84px;
            height:3px;
            background:linear-gradient(90deg,#9ecfe6,#eaf6ff);
            border-radius:2px;
        }
        .stat-icon{
            position:absolute;
            left:68px;
            top:18px;
            width:36px;
            height:36px;
            border-radius:10px;
            background:rgba(11,121,184,0.06);
            display:flex;
            align-items:center;
            justify-content:center;
            color:#0b79b8;
            font-size:16px;
        }
        .stat-content { margin-left:6px; padding-top:2px; }
        .stat-content h5 { margin:0; color:#6a7b8b; font-size:16px; font-weight:700; }
        .stat-content .stat-value { font-size:32px; font-weight:800; color:#08122a; margin-top:14px; }

        /* Kepala Desa Card - fixed width portrait on right */
        .kepala-desa-card {
            flex:0 0 260px;
            background:#fff; padding:18px; border-radius:12px; box-shadow:0 6px 18px rgba(14,30,60,0.04); text-align:center;
        }
        .kepala-desa-photo {
            width:260px;
            height:320px;
            border-radius:14px;
            background:#f1f5f9;
            margin:0 auto 12px;
            display:flex;
            align-items:center;
            justify-content:center;
            overflow:hidden;
        }
        .kepala-desa-photo img, .kepala-desa-photo i {
            max-width:90%;
            max-height:90%;
            color:#94a3b8;
            font-size:110px;
        }
        .kepala-desa-name { font-size:16px; font-weight:700; color:#0f1724; margin-bottom:6px; }
        .kepala-desa-title { font-size:13px; color:#64748b; margin:0; font-weight:600; }

        /* Input-with-button (edit inside input/textarea) */
        .input-with-btn { position:relative; }
        .input-with-btn .form-control { padding-right:110px; box-sizing:border-box; }
        .input-with-btn.textarea .form-control { padding-right:90px; }
        .input-btn {
            position:absolute;
            right:12px;
            top:50%;
            transform:translateY(-50%);
            border:0;
            background:#eaf6ff;
            color:#0b79b8;
            padding:8px 10px;
            border-radius:8px;
            cursor:pointer;
            font-weight:700;
            display:flex;
            align-items:center;
            gap:8px;
        }
        .input-with-btn.textarea .input-btn { top:12px; transform:none; }
        .input-btn:focus { outline:2px solid rgba(11,121,184,0.18); }
        .input-btn i { font-size:14px; }

        /* Responsive */
        @media (max-width: 1200px) {
            .content-grid { grid-template-columns: 300px 1fr; gap:24px; }
            .stats-column { flex:0 0 520px; }
            .kepala-desa-card { flex:0 0 220px; }
            .kepala-desa-photo { width:200px; height:260px; }
        }
        @media (max-width: 1024px) {
            .content-grid { grid-template-columns:1fr; }
            .right-panel { flex-direction:column; }
            .kepala-desa-card { flex: 0 0 auto; width:100%; }
            .stat-card { padding-left:64px; min-height:110px; }
            .stat-card::before { left:12px; width:14px; border-radius:10px; }
            .stat-card::after { left:48px; width:64px; }
            .stat-icon { left:44px; top:18px; }
            .input-with-btn .form-control { padding-right:38px; }
            .input-btn { right:8px; top:18px; transform:none; }
        }
        @media (max-width:768px) {
            .sidebar { transform:translateX(-100%); }
            .main-content { margin-left:0; padding:16px; }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h5>Admin Desa</h5>
        </div>
        <ul class="sidebar-menu">
            <li><a href="#" class="active"><i class="fas fa-home"></i> Beranda</a></li>
            <li><a href="#"><i class="fas fa-bullhorn"></i> Kelola Pengumuman</a></li>
            <li><a href="#"><i class="fas fa-info-circle"></i> Kelola Informasi</a></li>
            <li><a href="#"><i class="fas fa-coins"></i> Anggaran</a></li>
        </ul>
        <div class="sidebar-footer">
            <a href="#"><i class="fas fa-sign-out-alt"></i> Keluar</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Welcome Header -->
        <div class="welcome-header">
            <h1>Selamat Datang, Admin Desa Meat!</h1>
        </div>

        <!-- Visi & Misi -->
        <div class="visi-misi-card">
            <div class="visi-section">
                <h4>Visi:</h4>
                <p>Mewujudkan Desa Meat yang mandiri, sejahtera, dan berdaya berlandaskan gotong royong.</p>
            </div>
            <div class="misi-section" style="margin-top:16px;">
                <h4>Misi:</h4>
                <p>Meningkatkan kualitas sumber daya manusia, mengoptimalkan potensi desa di bidang pertanian dan pariwisata, serta melestarikan adat dan budaya lokal.</p>
            </div>
        </div>

        <!-- Buat Pengumuman Baru -->
        <div class="pengumuman-section">
            <h3>Buat Pengumuman Baru:</h3>
            <form action="#" method="POST">
                <div style="margin-bottom:12px;">
                    <label class="form-label" for="visi">Visi</label>
                    <div class="input-with-btn">
                        <input id="visi" type="text" class="form-control" placeholder="Judul visi" required>
                        <button type="button" class="input-btn edit-field" data-target="#visi" aria-label="Edit visi">
                            <i class="fas fa-edit" aria-hidden="true"></i> Edit
                        </button>
                    </div>
                </div>
                <div style="margin-bottom:12px;">
                    <label class="form-label" for="misi">Misi</label>
                    <div class="input-with-btn textarea">
                        <textarea id="misi" class="form-control" rows="4" placeholder="Isi misi" required></textarea>
                        <button type="button" class="input-btn edit-field" data-target="#misi" aria-label="Edit misi">
                            <i class="fas fa-edit" aria-hidden="true"></i> Edit
                        </button>
                    </div>
                </div>
                <button type="submit" class="btn-publis">Publis</button>
            </form>
        </div>

        <!-- Content Grid: Agenda & Stats/Foto -->
        <div class="content-grid">
            <!-- Agenda Mendatang (kiri sempit) -->
            <div class="agenda-card">
                <div class="agenda-header">
                    <i class="fas fa-calendar-alt"></i>
                    <h4>Agenda Mendatang</h4>
                </div>

                <div class="agenda-item">
                    <div class="agenda-icon"><i class="fas fa-calendar-check"></i></div>
                    <div class="agenda-content">
                        <div class="agenda-title">Rapat Koordinasi Antar Kabupaten</div>
                        <div class="agenda-date">25 Agustus 2025 &nbsp; <span style="color:#94a3b8;">09:00</span></div>
                        <div style="display:flex; align-items:center; gap:8px;">
                            <span class="agenda-status mendatang">Meeting</span>
                            <button class="edit-agenda">Edit</button>
                        </div>
                    </div>
                </div>

                <div class="agenda-item">
                    <div class="agenda-icon"><i class="fas fa-calendar-check"></i></div>
                    <div class="agenda-content">
                        <div class="agenda-title">Forum Pengembangan Wisata Toba</div>
                        <div class="agenda-date">27 Agustus 2025 &nbsp; <span style="color:#94a3b8;">14:00</span></div>
                        <div style="display:flex; align-items:center; gap:8px;">
                            <span class="agenda-status mendatang" style="background:#fce7f3;color:#be185d;">Program</span>
                            <button class="edit-agenda">Edit</button>
                        </div>
                    </div>
                </div>

                <div class="agenda-item">
                    <div class="agenda-icon"><i class="fas fa-clock"></i></div>
                    <div class="agenda-content">
                        <div class="agenda-title">Evaluasi Program Kawasan Q1</div>
                        <div class="agenda-date">30 Agustus 2025 &nbsp; <span style="color:#94a3b8;">10:00</span></div>
                        <div style="display:flex; align-items:center; gap:8px;">
                            <span class="agenda-status menunggu">Meeting</span>
                            <button class="edit-agenda">Edit</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right panel: stacked stats and kepala desa on right -->
            <div class="right-panel">
                <div class="stats-column">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-users" aria-hidden="true"></i></div>
                        <div class="stat-content">
                            <h5>Total Penduduk</h5>
                            <div class="stat-value">900</div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-map-marked-alt" aria-hidden="true"></i></div>
                        <div class="stat-content">
                            <h5>Luas Area</h5>
                            <div class="stat-value">15,2</div>
                        </div>
                    </div>
                </div>

                <div class="kepala-desa-card">
                    <div class="kepala-desa-photo">
                        <!-- ganti dengan <img src="path/to/photo.jpg" alt="Kepala Desa"> bila ada -->
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="kepala-desa-name">Janri M. Simanjuntak</div>
                    <div class="kepala-desa-title">Kepala Desa</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // fokus ke field saat tombol Edit diklik
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.edit-field');
            if (!btn) return;
            const target = btn.getAttribute('data-target');
            if (!target) return;
            const el = document.querySelector(target);
            if (!el) return;
            el.focus();
            // select content for quick edit
            if (typeof el.select === 'function') {
                try { el.select(); } catch(e) {}
            }
            el.scrollIntoView({ behavior: 'smooth', block: 'center' });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>