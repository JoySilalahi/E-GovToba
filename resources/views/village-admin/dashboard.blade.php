<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Desa {{ $village->name ?? 'Dashboard' }}</title>
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
            display: flex; flex-direction: column;
        }
        .sidebar-header { padding: 24px 20px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.06); flex-shrink: 0; }
        .sidebar-header h5 { font-size: 18px; font-weight:700; margin:0; }
        .sidebar-menu { list-style:none; padding:20px 0; flex-grow: 1; }
        .sidebar-menu li { margin: 0; }
        .sidebar-menu a { display:flex; align-items:center; padding:12px 20px; color:rgba(255,255,255,0.85); text-decoration:none; font-weight:500; border-left:4px solid transparent; transition:all .2s; }
        .sidebar-menu a.active, .sidebar-menu a:hover { background: rgba(255,255,255,0.06); color:#fff; border-left-color:#5280b9; }
        .sidebar-menu i { width:20px; margin-right:12px; font-size:16px; }
        .sidebar-footer { padding: 20px; border-top: 1px solid rgba(255,255,255,0.1); flex-shrink: 0; }
        .sidebar-footer a { color:rgba(255,255,255,0.85); text-decoration:none; display:flex; align-items:center; padding:12px 0; font-size:14px; font-weight:500; }

        /* Main Content */
        .main-content { margin-left:260px; padding:32px; min-height:100vh; transition:margin-left .3s; }

        /* Welcome header */
        .welcome-header { background: transparent; padding: 0 0 18px 0; margin-bottom: 8px; }
        .welcome-header h1 { font-size:28px; font-weight:800; color:#0f1724; margin:0 0 8px 0; }

        /* Visi Misi Card */
        .visi-misi-card { background:#fff; padding:26px; border-radius:12px; margin-bottom:20px; box-shadow:0 6px 18px rgba(14,30,60,0.04); border:1px solid #eef6fb; }
        .visi-section h4, .misi-section h4 { font-size:14px; font-weight:600; color:#475569; margin-bottom:8px; }
        .visi-section p, .misi-section p { color:#64748b; line-height:1.6; }

        /* Pengumuman Form - Enhanced */
        .pengumuman-section { 
            background:#fff; 
            padding:28px; 
            border-radius:12px; 
            margin-bottom:20px; 
            box-shadow:0 6px 18px rgba(14,30,60,0.04); 
            border:1px solid #eef6fb;
        }
        .pengumuman-section h3 { 
            font-size:18px; 
            font-weight:700; 
            color:#0f1724; 
            margin-bottom:20px;
            display:flex;
            align-items:center;
            gap:10px;
        }

        .form-group-wrapper {
            margin-bottom:18px;
        }

        .form-label { 
            font-size:14px; 
            font-weight:600; 
            color:#475569; 
            margin-bottom:8px; 
            display:block;
        }

        .form-control, .form-select, textarea { 
            border:1px solid #e2e8f0; 
            border-radius:8px; 
            padding:10px 12px; 
            font-size:14px;
            font-family: inherit;
            background:#fff;
            transition:all .2s;
            width:100%;
        }

        .form-control:focus, .form-select:focus, textarea:focus { 
            border-color:#0b79b8; 
            box-shadow:0 0 0 .15rem rgba(11,121,184,0.12);
            outline:none;
        }

        textarea {
            resize:vertical;
            min-height:100px;
        }

        .form-row-2col {
            display:grid;
            grid-template-columns: 1fr 1fr;
            gap:16px;
        }

        .form-row-3col {
            display:grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap:16px;
        }

        .category-grid {
            display:grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap:12px;
            margin-top:10px;
        }

        .category-option {
            position:relative;
            display:none;
        }

        .category-option input[type="radio"] {
            position:absolute;
            opacity:0;
            cursor:pointer;
        }

        .category-label {
            display:block;
            padding:12px 14px;
            border:2px solid #e2e8f0;
            border-radius:8px;
            cursor:pointer;
            transition:all .2s;
            background:#fff;
            font-weight:500;
            color:#475569;
        }

        .category-option input[type="radio"]:checked + .category-label {
            border-color:#0b79b8;
            background:#eff6ff;
            color:#0b79b8;
        }

        .category-option.show {
            display:block;
        }

        .hint-text {
            font-size:12px;
            color:#94a3b8;
            margin-top:6px;
            font-weight:400;
        }

        .form-actions {
            display:flex;
            gap:12px;
            margin-top:24px;
        }

        .btn-publis {
            background:#0b79b8; 
            color:#fff; 
            border:none;
            padding:10px 24px; 
            border-radius:8px; 
            font-size:14px; 
            font-weight:600;
            cursor:pointer; 
            transition:background .15s, transform .06s;
            display:inline-flex;
            align-items:center;
            gap:8px;
        }

        .btn-publis:hover { 
            background:#096598; 
            transform:translateY(-1px);
        }

        .btn-reset {
            background:#f1f5f9;
            color:#475569;
            border:1px solid #e2e8f0;
            padding:10px 24px;
            border-radius:8px;
            font-size:14px;
            font-weight:600;
            cursor:pointer;
            transition:all .15s;
        }

        .btn-reset:hover {
            background:#e2e8f0;
            border-color:#cbd5e1;
        }

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

        /* Right panel */
        .right-panel { display:flex; gap:36px; align-items:flex-start; width:100%; justify-content:space-between; }
        .stats-column { display:flex; flex-direction:column; gap:28px; flex:0 0 620px; min-width:0; align-self:flex-start; }

        /* Stat card */
        .stat-card {
            position:relative;
            background:#fff;
            border-radius:14px;
            padding:28px 22px 28px 96px;
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

        /* Kepala Desa Card */
        .kepala-desa-card {
            flex:0 0 260px;
            background:#fff; 
            padding:18px; 
            border-radius:12px; 
            box-shadow:0 6px 18px rgba(14,30,60,0.04); 
            text-align:center;
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
            .form-row-2col, .form-row-3col { grid-template-columns:1fr; }
            .stat-card { padding-left:64px; min-height:110px; }
            .stat-card::before { left:12px; width:14px; border-radius:10px; }
            .stat-card::after { left:48px; width:64px; }
            .stat-icon { left:44px; top:18px; }
        }
        @media (max-width:768px) {
            .sidebar { transform:translateX(-100%); }
            .main-content { margin-left:0; padding:16px; }
            .category-grid { grid-template-columns: 1fr; }
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
            <li><a href="{{ route('village-admin.dashboard') }}" class="{{ request()->routeIs('village-admin.dashboard') ? 'active' : '' }}"><i class="fas fa-home"></i> Beranda</a></li>
            <li><a href="{{ route('village-admin.kelola-informasi') }}" class="{{ request()->routeIs('village-admin.kelola-informasi') ? 'active' : '' }}"><i class="fas fa-bullhorn"></i> Kelola Pengumuman</a></li>
            <li><a href="{{ route('village-admin.visi-misi') }}" class="{{ request()->routeIs('village-admin.visi-misi') ? 'active' : '' }}"><i class="fas fa-lightbulb"></i> Visi & Misi</a></li>
            <li><a href="{{ route('village-admin.anggaran') }}" class="{{ request()->routeIs('village-admin.anggaran') ? 'active' : '' }}"><i class="fas fa-coins"></i> Anggaran</a></li>
        </ul>
        <div class="sidebar-footer">
            <a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
               style="cursor: pointer;">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="background: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 8px; padding: 15px 20px; margin-bottom: 20px;">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 8px; padding: 15px 20px; margin-bottom: 20px;">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 8px; padding: 15px 20px; margin-bottom: 20px;">
                <i class="fas fa-exclamation-circle me-2"></i>
                <ul class="mb-0" style="padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Welcome Header -->
        <div class="welcome-header">
            <h1>Selamat Datang, Admin Desa {{ $village->name ?? 'Meat' }}!</h1>
        </div>

        <!-- Visi & Misi -->
        <div class="visi-misi-card" style="position:relative;">
            <div style="display:flex; justify-content:space-between; align-items:flex-start; gap:12px;">
                <div style="flex:1;">
                    <div class="visi-section">
                        <h4>Visi:</h4>
                        <p>{{ $village->visi ?? 'Mewujudkan Desa ' . ($village->name ?? 'Anda') . ' yang mandiri, sejahtera, dan berdaya berlandaskan gotong royong.' }}</p>
                    </div>
                    <div class="misi-section" style="margin-top:16px;">
                        <h4>Misi:</h4>
                        <p>{{ $village->misi ?? 'Meningkatkan kualitas sumber daya manusia, mengoptimalkan potensi desa di bidang pertanian dan pariwisata, serta melestarikan adat dan budaya lokal.' }}</p>
                    </div>
                </div>
                <a href="{{ route('village-admin.visi-misi') }}" style="flex-shrink:0; display:inline-flex; align-items:center; justify-content:center; width:40px; height:40px; border-radius:8px; background:#eff6ff; color:#0b79b8; border:1px solid #dbeafe; text-decoration:none; transition:all .2s; cursor:pointer;" title="Edit Visi & Misi" onmouseover="this.style.background='#bfdbfe'; this.style.color='#0853a6';" onmouseout="this.style.background='#eff6ff'; this.style.color='#0b79b8';">
                    <i class="fas fa-edit"></i>
                </a>
            </div>
        </div>

        <!-- Pengumuman Terkini (ringkas) -->
        <div class="pengumuman-section">
            <div style="display:flex; justify-content:space-between; align-items:center; gap:12px; margin-bottom:10px;">
                <h3 style="margin:0; display:flex; align-items:center; gap:10px; font-size:18px; font-weight:700; color:#0f1724;">
                    <i class="fas fa-bullhorn"></i> Pengumuman Desa
                </h3>
                <a href="{{ route('village-admin.kelola-informasi') }}" style="display:inline-flex; align-items:center; gap:8px; padding:10px 14px; border-radius:8px; border:1px solid #0b79b8; color:#0b79b8; text-decoration:none; font-weight:600;">
                    <i class="fas fa-pen"></i> Kelola Pengumuman
                </a>
            </div>

            @if($announcements->count())
                <div style="display:flex; flex-direction:column; gap:12px;">
                    @foreach($announcements as $announcement)
                        <div style="border:1px solid #e2e8f0; border-radius:10px; padding:16px; background:#fff; box-shadow:0 6px 18px rgba(14,30,60,0.04);">
                            <div style="display:flex; justify-content:space-between; align-items:flex-start; gap:12px;">
                                <div>
                                    <div style="display:flex; align-items:center; gap:10px;">
                                        <h4 style="margin:0; font-size:16px; font-weight:700; color:#0f1724;">{{ $announcement->title }}</h4>
                                        @if($announcement->category)
                                            <span style="font-size:12px; padding:4px 8px; border-radius:6px; background:#eff6ff; color:#0b79b8; border:1px solid #dbeafe;">{{ $announcement->category }}</span>
                                        @endif
                                    </div>
                                    <div style="margin-top:6px; font-size:12px; color:#64748b; display:flex; gap:12px; flex-wrap:wrap;">
                                        <span><i class="fas fa-calendar-check"></i> Terbit: {{ optional($announcement->date)->locale('id')->isoFormat('D MMM YYYY') }}</span>
                                        @if($announcement->effective_date)
                                            <span><i class="fas fa-calendar-plus"></i> Berlaku: {{ 
                                                \Carbon\Carbon::parse($announcement->effective_date)->locale('id')->isoFormat('D MMM YYYY') }}</span>
                                        @endif
                                        @if($announcement->end_date)
                                            <span><i class="fas fa-calendar-times"></i> Berakhir: {{ 
                                                \Carbon\Carbon::parse($announcement->end_date)->locale('id')->isoFormat('D MMM YYYY') }}</span>
                                        @endif
                                        @if($announcement->location)
                                            <span><i class="fas fa-map-marker-alt"></i> {{ $announcement->location }}</span>
                                        @endif
                                        @if($announcement->contact)
                                            <span><i class="fas fa-phone"></i> {{ $announcement->contact }}</span>
                                        @endif
                                    </div>
                                    <p style="margin-top:10px; color:#475569; font-size:14px; line-height:1.5;">{{ \Illuminate\Support\Str::limit($announcement->content, 200) }}</p>
                                </div>
                                <div style="text-align:right;">
                                    <span style="display:inline-block; padding:6px 10px; border-radius:999px; font-size:12px; font-weight:700; color:#0b79b8; background:#e0f2fe; border:1px solid #bfdbfe;">
                                        {{ $announcement->status ?? 'published' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p style="margin:0; color:#64748b;">Belum ada pengumuman. Klik "Kelola Pengumuman" untuk menambahkan.</p>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
