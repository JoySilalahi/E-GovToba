<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Kabupaten</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background: #2c3e50;
            color: white;
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 30px 20px;
            background: #34495e;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-header h5 {
            margin: 0;
            font-size: 16px;
            font-weight: 600;
        }

        .sidebar-menu {
            list-style: none;
            padding: 20px 0;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu li a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #ecf0f1;
            text-decoration: none;
            transition: all 0.3s;
            font-size: 14px;
        }

        .sidebar-menu li a:hover,
        .sidebar-menu li a.active {
            background: #34495e;
            color: white;
            border-left: 4px solid #3498db;
        }

        .sidebar-menu li a i {
            width: 20px;
            margin-right: 12px;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 30px;
            min-height: 100vh;
        }

        /* Welcome Header */
        .welcome-header {
            background: white;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .welcome-header h2 {
            font-size: 24px;
            font-weight: 600;
            color: #2c3e50;
            margin: 0;
        }

        .edit-btn {
            background: transparent;
            border: 1px solid #3498db;
            color: #3498db;
            padding: 8px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s;
        }

        .edit-btn:hover {
            background: #3498db;
            color: white;
        }

        /* Visi Misi Card */
        .visi-misi-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            margin-bottom: 30px;
        }

        .visi-section, .misi-section {
            margin-bottom: 20px;
        }

        .visi-section:last-child, .misi-section:last-child {
            margin-bottom: 0;
        }

        .visi-section h4, .misi-section h4 {
            font-size: 15px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .visi-section p, .misi-section p {
            font-size: 14px;
            line-height: 1.8;
            color: #7f8c8d;
        }

        /* Content Layout */
        .content-layout {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 30px;
            margin-bottom: 30px;
        }

        /* Stats Section */
        .stats-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            border-left: 4px solid #3498db;
        }

        .stat-card h6 {
            font-size: 13px;
            color: #7f8c8d;
            margin-bottom: 10px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .stat-card h3 {
            font-size: 32px;
            font-weight: 700;
            color: #2c3e50;
            margin: 0;
        }

        /* Bupati Section */
        .bupati-section {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }

        .bupati-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .bupati-card {
            text-align: center;
        }

        .bupati-photo {
            width: 100%;
            height: 180px;
            background: #e8eaed;
            border-radius: 8px;
            margin-bottom: 15px;
            overflow: hidden;
        }

        .bupati-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .bupati-card h6 {
            font-size: 14px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .bupati-card p {
            font-size: 12px;
            color: #7f8c8d;
            margin: 0;
        }

        /* Upload Section */
        .upload-section {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }

        .upload-section h5 {
            font-size: 16px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .upload-btn {
            background: #3498db;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .upload-btn:hover {
            background: #2980b9;
        }

        @media (max-width: 992px) {
            .content-layout {
                grid-template-columns: 1fr;
            }

            .sidebar {
                transform: translateX(-100%);
            }

            .main-content {
                margin-left: 0;
            }
        }

        @media (max-width: 768px) {
            .stats-section {
                grid-template-columns: 1fr;
            }

            .bupati-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h5>Admin Kabupaten</h5>
        </div>
        
        <ul class="sidebar-menu">
            <li><a href="{{ route('admin.dashboard') }}" class="active"><i class="fas fa-home"></i> Beranda</a></li>
            <li><a href="{{ route('admin.information.index') }}"><i class="fas fa-info-circle"></i> Manajemen Informasi</a></li>
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
            <h2>Selamat Datang, Admin Kabupaten</h2>
        </div>

        <!-- Visi & Misi -->
        <div class="visi-misi-card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h3 style="margin: 0; font-size: 18px; font-weight: 600; color: #2c3e50;">Visi & Misi</h3>
                <a href="{{ route('admin.information.index') }}" class="edit-btn" style="text-decoration: none;">
                    <i class="fas fa-edit"></i> Edit
                </a>
            </div>

            <div class="visi-section">
                <h4>Visi :</h4>
                <p>{{ $district->visi ?? 'Toba Unggul dan Bersinar' }}</p>
            </div>

            <div class="misi-section">
                <h4>Misi :</h4>
                <p>{{ $district->misi ?? 'Meningkatkan kualitas sumber daya manusia yang andal dan berbudaya, mempercepat pembangunan infrastruktur, serta mewujudkan reformasi birokrasi yang bersih dan melayani.' }}</p>
            </div>
        </div>

        <!-- Content Layout -->
        <div class="content-layout">
            <!-- Left: Stats -->
            <div>
                <div class="stats-section">
                    <div class="stat-card">
                        <h6><i class="fas fa-users"></i> Total Penduduk</h6>
                        <h3>7,515</h3>
                    </div>

                    <div class="stat-card">
                        <h6><i class="fas fa-map-marker-alt"></i> Total Desa</h6>
                        <h3>6</h3>
                    </div>
                </div>

                <!-- Upload Section -->
                <div class="upload-section">
                    <h5>Upload dokumentasi kegiatan</h5>
                    <div class="mb-3">
                        <input type="file" class="form-control" id="fileUpload">
                    </div>
                    <button class="upload-btn">Unggah File Baru</button>
                </div>
            </div>

            <!-- Right: Bupati Photos -->
            <div class="bupati-section">
                <div class="bupati-grid">
                    <div class="bupati-card">
                        <div class="bupati-photo">
                            <img src="{{ asset('images/bupati.jpg') }}" alt="Bupati" onerror="this.style.display='none'; this.parentElement.innerHTML='<div style=\'display:flex;align-items:center;justify-content:center;height:100%;background:#e8eaed;color:#bdc3c7;font-size:60px;\'><i class=\'fas fa-user\'></i></div>'">
                        </div>
                        <h6>Effeindi Simbolon Panangian Napitupulu</h6>
                        <p>Bupati Toba</p>
                    </div>

                    <div class="bupati-card">
                        <div class="bupati-photo">
                            <img src="{{ asset('images/wakil-bupati.jpg') }}" alt="Wakil Bupati" onerror="this.style.display='none'; this.parentElement.innerHTML='<div style=\'display:flex;align-items:center;justify-content:center;height:100%;background:#e8eaed;color:#bdc3c7;font-size:60px;\'><i class=\'fas fa-user\'></i></div>'">
                        </div>
                        <h6>Andi Murphy Sitorus</h6>
                        <p>Wakil Bupati Toba</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@push('styles')
<style>
    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100;
        padding: 48px 0 0;
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }

    .sidebar .nav-link {
        font-weight: 500;
        color: #333;
    }

    .sidebar .nav-link.active {
        color: #2470dc;
    }

    .navbar-brand {
        padding-top: .75rem;
        padding-bottom: .75rem;
    }

    .navbar .navbar-toggler {
        top: .25rem;
        right: 1rem;
    }
</style>
@endpush