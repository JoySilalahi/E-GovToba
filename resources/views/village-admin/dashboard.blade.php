<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Desa {{ $village->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #ecf0f1;
            color: #2c3e50;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 240px;
            background: linear-gradient(180deg, #34495e 0%, #2c3e50 100%);
            color: white;
            overflow-y: auto;
            z-index: 1000;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }

        .sidebar-header {
            padding: 30px 20px;
            background: rgba(0,0,0,0.1);
            border-bottom: 1px solid rgba(255,255,255,0.1);
            text-align: center;
        }

        .sidebar-header h5 {
            font-size: 16px;
            font-weight: 700;
            color: white;
            margin: 0;
            letter-spacing: 0.5px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 20px 0;
        }

        .sidebar-menu li {
            margin: 5px 0;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 14px 25px;
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }

        .sidebar-menu a:hover {
            background: rgba(255,255,255,0.08);
            color: white;
            border-left-color: #3498db;
        }

        .sidebar-menu a.active {
            background: rgba(52, 152, 219, 0.2);
            color: white;
            border-left-color: #3498db;
        }

        .sidebar-menu i {
            width: 22px;
            margin-right: 15px;
            font-size: 15px;
            text-align: center;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-footer a {
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            font-size: 13px;
            display: flex;
            align-items: center;
            padding: 10px 0;
            transition: color 0.3s;
        }

        .sidebar-footer a:hover {
            color: white;
        }

        .sidebar-footer i {
            margin-right: 10px;
        }

        /* Main Content */
        .main-content {
            margin-left: 240px;
            padding: 40px;
            min-height: 100vh;
        }

        .welcome-header {
            background: white;
            padding: 35px 40px;
            border-radius: 12px;
            margin-bottom: 35px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }

        .welcome-header h2 {
            font-size: 26px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 8px;
        }

        .welcome-subtitle {
            color: #7f8c8d;
            font-size: 14px;
        }

        .welcome-header h2 {
            font-size: 24px;
            font-weight: 600;
            color: #1a1a1a;
            margin: 0;
        }

        /* Visi Misi Section */
        .visi-misi-card {
            background: white;
            padding: 35px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }

        .visi-misi-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 2px solid #ecf0f1;
        }

        .visi-misi-header h3 {
            font-size: 20px;
            font-weight: 700;
            color: #2c3e50;
            margin: 0;
        }

        .edit-btn {
            background: none;
            border: 1px solid #3498db;
            color: #3498db;
            font-size: 13px;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s;
            font-weight: 500;
        }

        .edit-btn:hover {
            background: #3498db;
            color: white;
        }

        .visi-section, .misi-section {
            margin-bottom: 25px;
        }

        .visi-section:last-child, .misi-section:last-child {
            margin-bottom: 0;
        }

        .visi-section h4, .misi-section h4 {
            font-size: 15px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 12px;
        }

        .visi-section p, .misi-section p {
            font-size: 14px;
            line-height: 1.8;
            color: #7f8c8d;
        }

        /* Info Cards */
        .info-cards-wrapper {
            display: grid;
            grid-template-columns: 1fr 280px;
            gap: 30px;
            margin-bottom: 30px;
        }

        .info-cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .info-card {
            background: white;
            padding: 30px 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            border-left: 4px solid #3498db;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .info-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .info-card-content h6 {
            font-size: 13px;
            color: #7f8c8d;
            margin-bottom: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-card-content h3 {
            font-size: 28px;
            font-weight: 700;
            color: #2c3e50;
            margin: 0;
        }

        .info-card h4 {
            font-size: 13px;
            color: #95a5a6;
            margin-bottom: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-card .value {
            font-size: 32px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .info-card .label {
            font-size: 13px;
            color: #95a5a6;
            font-weight: 500;
        }

        /* Agenda List */
        .agenda-list {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            margin-bottom: 20px;
        }

        .agenda-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 20px;
            border: 1px solid #e8eaed;
            border-radius: 8px;
            margin-bottom: 15px;
            transition: all 0.3s;
        }

        .agenda-item:last-child {
            margin-bottom: 0;
        }

        .agenda-item:hover {
            border-color: #3498db;
            background: #f8f9fa;
        }

        .agenda-icon {
            width: 40px;
            height: 40px;
            background: #e3f2fd;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .agenda-icon i {
            color: #3498db;
            font-size: 18px;
        }

        .agenda-content {
            flex: 1;
        }

        .agenda-title {
            font-size: 14px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
        }

        .agenda-date {
            font-size: 13px;
            color: #7f8c8d;
            margin-bottom: 8px;
        }

        .agenda-status {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .agenda-status.mendatang {
            background: #fff3cd;
            color: #856404;
        }

        .agenda-status.menunggu {
            background: #f8d7da;
            color: #721c24;
        }

        /* Bottom Info Cards */
        .bottom-info-cards {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .bottom-info-cards .info-card {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 25px;
        }

        .bottom-info-cards .info-card-icon {
            font-size: 36px;
            color: #3498db;
        }

        .agenda-header {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 15px;
        }

        .agenda-header i {
            color: #3b82f6;
        }

        .agenda-header h4 {
            font-size: 14px;
            font-weight: 600;
            color: #1a1a1a;
            margin: 0;
        }

        .agenda-item {
            padding: 12px;
            background: #f8f9fa;
            border-radius: 6px;
            margin-bottom: 10px;
            border-left: 3px solid #3b82f6;
        }

        .agenda-item:last-child {
            margin-bottom: 0;
        }

        .agenda-title {
            font-size: 13px;
            font-weight: 500;
            color: #1a1a1a;
            margin-bottom: 4px;
        }

        .agenda-date {
            font-size: 11px;
            color: #666;
        }

        .agenda-status {
            display: inline-block;
            padding: 2px 8px;
            background: #fef3c7;
            color: #92400e;
            border-radius: 12px;
            font-size: 10px;
            margin-top: 4px;
        }

        /* Stat Cards */
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            background: #eff6ff;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #3b82f6;
            font-size: 24px;
        }

        .stat-content h4 {
            font-size: 13px;
            color: #666;
            margin: 0 0 5px 0;
            font-weight: 500;
        }

        .stat-content .stat-value {
            font-size: 28px;
            font-weight: 700;
            color: #1a1a1a;
            margin: 0;
        }

        /* Kepala Desa Card */
        .kepala-desa-card {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            text-align: center;
        }

        .kepala-desa-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: #e2e8f0;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .kepala-desa-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .kepala-desa-photo i {
            font-size: 60px;
            color: #cbd5e1;
        }

        /* Visi Misi with Photo Layout */
        .visi-misi-container {
            display: block;
        }

        .visi-misi-content {
            margin-bottom: 0;
        }

        .kepala-desa-photo-section {
            background: white;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            height: fit-content;
        }

        .kepala-desa-photo {
            width: 200px;
            height: 240px;
            object-fit: cover;
            border-radius: 8px;
            margin: 0 auto 20px;
            background: #e0e0e0;
            display: block;
        }

        .kepala-desa-name {
            font-size: 16px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 8px;
        }

        .kepala-desa-title {
            font-size: 14px;
            color: #7f8c8d;
            font-weight: 500;
        }

        @media (max-width: 1200px) {
            .info-cards-wrapper {
                grid-template-columns: 1fr;
            }

            .kepala-desa-photo-section {
                max-width: 300px;
                margin: 0 auto;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .main-content {
                margin-left: 0;
                padding: 20px;
            }

            .hero-section h1 {
                font-size: 24px;
            }

            .info-cards {
                grid-template-columns: 1fr;
            }

            .bottom-info-cards {
                grid-template-columns: 1fr;
            }

            .kepala-desa-photo-large {
                width: 160px;
                height: 200px;
            }
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
            <li><a href="{{ route('village-admin.dashboard') }}" class="active"><i class="fas fa-home"></i> Beranda</a></li>
            <li><a href="#"><i class="fas fa-bullhorn"></i> Kelola Pengumuman</a></li>
            <li><a href="#"><i class="fas fa-info-circle"></i> Kelola Informasi</a></li>
            <li><a href="#"><i class="fas fa-money-bill-wave"></i> Anggaran</a></li>
        </ul>

        <div class="sidebar-footer">
            <ul class="sidebar-menu">
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Keluar
                        </a>
                    </form>
                </li>
            </ul>
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

        <!-- Header Welcome with Village Image Background -->
        <div class="welcome-header" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ $village->image ? asset('images/' . $village->image) : asset('images/default-village.jpg') }}') center/cover; padding: 60px 30px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.15); margin-bottom: 30px; position: relative; overflow: hidden;">
            <div style="position: relative; z-index: 2;">
                <h2 style="font-size: 32px; font-weight: 700; color: white; margin: 0 0 10px 0; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">Selamat Datang di Desa {{ $village->name }}</h2>
                <p style="font-size: 16px; color: rgba(255,255,255,0.95); margin: 0; font-weight: 400;">Admin Dashboard - Kelola informasi dan layanan desa Anda</p>
            </div>
        </div>

        <!-- Visi & Misi -->
        <div class="visi-misi-card">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                <div style="flex: 1;">
                    <div class="visi-section" style="margin-bottom: 20px;">
                        <h4 style="font-size: 14px; font-weight: 700; color: #2c3e50; margin-bottom: 8px;">Visi :</h4>
                        <p style="font-size: 13px; line-height: 1.6; color: #7f8c8d; margin: 0;">{{ $village->visi ?? 'Mewujudkan Desa ' . $village->name . ' yang Mandiri, Sejahtera, dan Berbudaya berdasarkan gotong royong.' }}</p>
                    </div>

                    <div class="misi-section">
                        <h4 style="font-size: 14px; font-weight: 700; color: #2c3e50; margin-bottom: 8px;">Misi :</h4>
                        <p style="font-size: 13px; line-height: 1.6; color: #7f8c8d; margin: 0;">{{ $village->misi ?? 'Meningkatkan kualitas sumber daya manusia yang andal dan berbudaya, mempercepat pembangunan infrastruktur, serta mewujudkan reformasi birokrasi yang bersih dan melayani.' }}</p>
                    </div>
                </div>
                <button class="edit-btn" data-bs-toggle="modal" data-bs-target="#editVisiMisiModal" style="margin-left: 20px; background: transparent; border: 1px solid #3498db; color: #3498db; padding: 8px 20px; border-radius: 6px; cursor: pointer; font-size: 14px; white-space: nowrap;">
                    <i class="fas fa-edit"></i> Edit
                </button>
            </div>
        </div>

        <!-- Upload Dokumen Anggaran Desa -->
        <div class="pengumuman-section" style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); margin-bottom: 30px;">
            <h3 style="font-size: 16px; font-weight: 600; color: #2c3e50; margin-bottom: 20px;">
                <i class="fas fa-file-upload" style="color: #3498db;"></i> Unggah Dokumen Anggaran
            </h3>

            @if($village->budget_file)
                <div class="alert alert-info" style="background: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb; border-radius: 8px; padding: 12px; margin-bottom: 15px; font-size: 14px; display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-file-pdf" style="font-size: 20px;"></i>
                    <div style="flex: 1;">
                        <strong>Anggaran Desa</strong><br>
                        <small>File saat ini: {{ basename($village->budget_file) }}</small>
                    </div>
                    <a href="{{ asset('storage/' . $village->budget_file) }}" target="_blank" style="background: #3498db; color: white; padding: 6px 15px; border-radius: 6px; text-decoration: none; font-size: 13px; white-space: nowrap;">
                        <i class="fas fa-download"></i> Download
                    </a>
                </div>
            @endif

            <form action="{{ route('village-admin.budget.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label style="font-size: 14px; font-weight: 500; color: #2c3e50; margin-bottom: 8px; display: block;">Pilih file baru untuk menggantikan (format PDF)</label>
                    <input type="file" class="form-control" name="budget_file" accept=".pdf" required style="border: 1px solid #e0e0e0; border-radius: 8px; padding: 10px; font-size: 14px;">
                    <small style="color: #7f8c8d; font-size: 12px; margin-top: 5px; display: block;">Format: PDF (Max: 10MB)</small>
                </div>

                <button type="submit" style="background: #3498db; color: white; border: none; padding: 10px 25px; border-radius: 6px; font-size: 14px; font-weight: 500; cursor: pointer; transition: all 0.3s;" onmouseover="this.style.background='#2980b9'" onmouseout="this.style.background='#3498db'">
                    <i class="fas fa-upload"></i> Unggah File Baru
                </button>
            </form>
        </div>

        <!-- Buat Pengumuman Baru Section -->
        <div class="pengumuman-section" style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); margin-bottom: 30px;">
            <h3 style="font-size: 16px; font-weight: 600; color: #2c3e50; margin-bottom: 20px;">Buat Pengumuman Baru :</h3>
            
            <form action="{{ route('village-admin.announcements.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label style="font-size: 14px; font-weight: 600; color: #2c3e50; margin-bottom: 8px; display: block;">Visi</label>
                    <input type="text" class="form-control" name="title" placeholder="Judul pengumuman" style="border: 1px solid #e0e0e0; border-radius: 8px; padding: 12px 15px; font-size: 14px;">
                </div>

                <div class="mb-3">
                    <label style="font-size: 14px; font-weight: 600; color: #2c3e50; margin-bottom: 8px; display: block;">Misi</label>
                    <textarea class="form-control" name="content" rows="3" placeholder="Isi pengumuman" style="border: 1px solid #e0e0e0; border-radius: 8px; padding: 12px 15px; font-size: 14px;"></textarea>
                </div>

                <input type="hidden" name="date" value="{{ date('Y-m-d') }}">
                <input type="hidden" name="status" value="pending">

                <button type="submit" style="background: #3498db; color: white; border: none; padding: 10px 25px; border-radius: 6px; font-size: 14px; font-weight: 500; cursor: pointer;">
                    Perbarui
                </button>
            </form>
        </div>

        <!-- Agenda Mendatang & Stats Section -->
        <div style="display: grid; grid-template-columns: 1fr 300px; gap: 30px; margin-bottom: 30px;">
            <!-- Left: Agenda List -->
            <div>
                <!-- Agenda Mendatang -->
                <div class="agenda-list" style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); margin-bottom: 20px;">
                    <h5 style="font-weight: 600; color: #2c3e50; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
                        <i class="fas fa-calendar-check" style="color: #3498db;"></i> Agenda Mendatang
                    </h5>
                    
                    @forelse($announcements ?? [] as $announcement)
                    <div style="padding: 15px; background: #f8f9fa; border-radius: 8px; margin-bottom: 12px; border-left: 3px solid #3498db;">
                        <div style="font-size: 14px; font-weight: 600; color: #2c3e50; margin-bottom: 5px;">{{ $announcement->title }}</div>
                        <div style="font-size: 12px; color: #7f8c8d; margin-bottom: 5px;">
                            <i class="far fa-clock"></i> {{ \Carbon\Carbon::parse($announcement->date)->format('d F Y') }}
                        </div>
                        <span style="display: inline-block; padding: 3px 10px; background: #fff3cd; color: #856404; border-radius: 12px; font-size: 11px; font-weight: 600;">
                            {{ ucfirst($announcement->status) }}
                        </span>
                    </div>
                    @empty
                    <div style="padding: 15px; background: #f8f9fa; border-radius: 8px; margin-bottom: 12px; border-left: 3px solid #3498db;">
                        <div style="font-size: 14px; font-weight: 600; color: #2c3e50; margin-bottom: 5px;">Rapat Koordinasi Antar Kabupaten</div>
                        <div style="font-size: 12px; color: #7f8c8d; margin-bottom: 5px;"><i class="far fa-clock"></i> Edit</div>
                        <span style="display: inline-block; padding: 3px 10px; background: #fff3cd; color: #856404; border-radius: 12px; font-size: 11px; font-weight: 600;">Edit</span>
                    </div>
                    <div style="padding: 15px; background: #f8f9fa; border-radius: 8px; margin-bottom: 12px; border-left: 3px solid #3498db;">
                        <div style="font-size: 14px; font-weight: 600; color: #2c3e50; margin-bottom: 5px;">Forum Pengembangan Wisata Toba</div>
                        <div style="font-size: 12px; color: #7f8c8d; margin-bottom: 5px;"><i class="far fa-clock"></i> Edit</div>
                        <span style="display: inline-block; padding: 3px 10px; background: #fff3cd; color: #856404; border-radius: 12px; font-size: 11px; font-weight: 600;">Edit</span>
                    </div>
                    <div style="padding: 15px; background: #f8f9fa; border-radius: 8px; margin-bottom: 12px; border-left: 3px solid #f8d7da;">
                        <div style="font-size: 14px; font-weight: 600; color: #2c3e50; margin-bottom: 5px;">Evaluasi Program Kawasan Q1</div>
                        <div style="font-size: 12px; color: #7f8c8d; margin-bottom: 5px;"><i class="far fa-clock"></i> Edit</div>
                        <span style="display: inline-block; padding: 3px 10px; background: #f8d7da; color: #721c24; border-radius: 12px; font-size: 11px; font-weight: 600;">Edit</span>
                    </div>
                    @endforelse
                </div>

                <!-- Stats Cards -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); border-left: 4px solid #3498db;">
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <i class="fas fa-users" style="font-size: 32px; color: #3498db;"></i>
                            <div>
                                <div style="font-size: 12px; color: #7f8c8d; margin-bottom: 5px;">Total Penduduk</div>
                                <div style="font-size: 28px; font-weight: 700; color: #2c3e50;">{{ number_format($village->population ?? 900) }}</div>
                            </div>
                        </div>
                    </div>

                    <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); border-left: 4px solid #3498db;">
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <i class="fas fa-map-marked-alt" style="font-size: 32px; color: #3498db;"></i>
                            <div>
                                <div style="font-size: 12px; color: #7f8c8d; margin-bottom: 5px;">Luas Area</div>
                                <div style="font-size: 28px; font-weight: 700; color: #2c3e50;">{{ $village->area ?? '15.2' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Kepala Desa Photo -->
            <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); text-align: center; height: fit-content;">
                <div style="width: 180px; height: 220px; border-radius: 12px; background: #e8eaed; margin: 0 auto 15px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-user" style="font-size: 80px; color: #cbd5e1;"></i>
                </div>
                <h5 style="font-size: 16px; font-weight: 600; color: #2c3e50; margin-bottom: 5px;">{{ $village->village_head ?? 'Jasri M. Simanjuntak' }}</h5>
                <p style="font-size: 13px; color: #7f8c8d; margin: 0;">Kepala Desa</p>
            </div>
        </div>
        </div>

        <!-- Content Grid -->
        <div class="content-grid">
            <!-- Agenda Mendatang -->
            <div class="agenda-card">
                <div class="agenda-header">
                    <i class="far fa-calendar-alt"></i>
                    <h4>Agenda Mendatang</h4>
                </div>

                <div class="agenda-item">
                    <div class="agenda-title">Rapat Koordinasi Antar Kabupaten</div>
                    <div class="agenda-date">23 Agustus 2025 - 09:00</div>
                    <span class="agenda-status">Mendatang</span>
                </div>

                <div class="agenda-item">
                    <div class="agenda-title">Forum Pengembangan Wisata Toba</div>
                    <div class="agenda-date">27 Agustus 2025 - 14:00</div>
                    <span class="agenda-status">Mendatang</span>
                </div>

                <div class="agenda-item">
                    <div class="agenda-title">Evaluasi Program Kawasan Q1</div>
                    <div class="agenda-date">19 Oktober 2025 - 10:00</div>
                    <span class="agenda-status">Mendatang</span>
                </div>
            </div>

            <!-- Total Penduduk -->
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-content">
                    <h4>Total Penduduk</h4>
                    <div class="stat-value">{{ number_format($village->population ?? 900) }}</div>
                </div>
            </div>

            <!-- Luas Area -->
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <div class="stat-content">
                    <h4>Luas Area</h4>
                    <div class="stat-value">{{ $village->area ?? '15,2' }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Visi Misi -->
    <div class="modal fade" id="editVisiMisiModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Visi & Misi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="formVisiMisi" action="{{ route('village-admin.visi-misi.update') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Visi</label>
                            <textarea class="form-control" name="visi" rows="3" required>{{ $village->visi }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Misi</label>
                            <textarea class="form-control" name="misi" rows="5" required>{{ $village->misi }}</textarea>
                            <small class="text-muted">Pisahkan setiap misi dengan tanda "|" (pipe)</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
