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
            background-color: #f8f9fa;
            color: #333;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 220px;
            background: #2c3e50;
            color: white;
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 25px 20px;
            background: #34495e;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-header h5 {
            font-size: 15px;
            font-weight: 600;
            color: white;
            margin: 0;
        }

        .sidebar-menu {
            list-style: none;
            padding: 15px 0;
        }

        .sidebar-menu li {
            margin: 3px 0;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            font-size: 14px;
            transition: all 0.2s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: rgba(255,255,255,0.1);
            color: white;
        }

        .sidebar-menu i {
            width: 20px;
            margin-right: 12px;
            font-size: 14px;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 15px 0;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        /* Main Content */
        .main-content {
            margin-left: 220px;
            padding: 30px;
            min-height: 100vh;
        }

        .welcome-header {
            background: white;
            padding: 25px 30px;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
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
            padding: 25px;
            border-radius: 8px;
            margin-bottom: 25px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .visi-misi-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .visi-misi-header h3 {
            font-size: 18px;
            font-weight: 600;
            color: #1a1a1a;
            margin: 0;
        }

        .edit-btn {
            background: none;
            border: none;
            color: #3b82f6;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .edit-btn:hover {
            color: #2563eb;
        }

        .visi-section, .misi-section {
            margin-bottom: 20px;
        }

        .visi-section h4, .misi-section h4 {
            font-size: 14px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 8px;
        }

        .visi-section p, .misi-section p {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
            margin: 0;
        }

        /* Content Grid */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
        }

        /* Agenda Card */
        .agenda-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
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

        .kepala-desa-name {
            font-size: 15px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 4px;
        }

        .kepala-desa-title {
            font-size: 13px;
            color: #666;
        }

        @media (max-width: 1200px) {
            .content-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .main-content {
                margin-left: 0;
            }

            .content-grid {
                grid-template-columns: 1fr;
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
        <!-- Welcome Header -->
        <div class="welcome-header">
            <h2>Selamat Datang, Admin Desa {{ $village->name }} !</h2>
        </div>

        <!-- Visi & Misi -->
        <div class="visi-misi-card">
            <div class="visi-misi-header">
                <h3>Visi & Misi</h3>
                <button class="edit-btn" data-bs-toggle="modal" data-bs-target="#editVisiMisiModal">
                    Edit <i class="fas fa-edit"></i>
                </button>
            </div>

            <div class="visi-section">
                <h4>Visi:</h4>
                <p id="visi-text">{{ $village->visi ?? 'Visi belum ditetapkan' }}</p>
            </div>

            <div class="misi-section">
                <h4>Misi:</h4>
                <p id="misi-text">{{ $village->misi ?? 'Misi belum ditetapkan' }}</p>
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

        <!-- Kepala Desa Card (below stats) -->
        <div style="margin-top: 20px;">
            <div class="content-grid" style="grid-template-columns: 1fr 1fr;">
                <!-- Gambar Desa -->
                <div class="card" style="padding: 0; overflow: hidden;">
                    <div style="position: relative; width: 100%; padding-bottom: 66.67%; overflow: hidden;">
                        <img src="{{ asset('images/' . $village->image) }}" 
                             alt="Desa {{ $village->name }}" 
                             style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div style="padding: 20px; text-align: center;">
                        <h5 style="margin: 0; color: #2c3e50; font-weight: 600;">Desa {{ $village->name }}</h5>
                        <p style="margin: 8px 0 0 0; color: #7f8c8d; font-size: 14px;">Kabupaten Toba</p>
                    </div>
                </div>
                
                <!-- Kepala Desa -->
                <div class="kepala-desa-card">
                    <div class="kepala-desa-photo">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="kepala-desa-name">{{ $village->village_head ?? 'Jonni M. Simanjuntak' }}</div>
                    <div class="kepala-desa-title">Kepala Desa</div>
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
                <form id="formVisiMisi" action="{{ route('village-admin.update-visi-misi') }}" method="POST">
                    @csrf
                    @method('PUT')
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
