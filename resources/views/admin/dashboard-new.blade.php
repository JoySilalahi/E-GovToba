<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Kabupaten</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: #f0f0f0;
        }
        
        /* Sidebar */
        .sidebar {
            min-height: 100vh;
            background: #3d5368;
            position: fixed;
            left: 0;
            top: 0;
            width: 200px;
            z-index: 100;
        }
        
        .sidebar-header {
            padding: 1.5rem 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar-header h4 {
            color: white;
            font-weight: 600;
            margin: 0;
            font-size: 1rem;
        }
        
        .sidebar-menu {
            padding: 0.5rem 0;
        }
        
        .sidebar-menu .nav-link {
            color: rgba(255,255,255,0.85);
            padding: 0.7rem 1rem;
            transition: all 0.2s;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
        }

        .sidebar-menu .nav-link i {
            margin-right: 0.5rem;
            font-size: 0.9rem;
        }
        
        .sidebar-menu .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
            color: white;
        }
        
        .sidebar-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 1rem;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-footer .nav-link {
            color: rgba(255,255,255,0.85);
            font-size: 0.875rem;
        }
        
        /* Main Content */
        .main-content {
            margin-left: 200px;
            padding: 2rem;
            background-color: #f0f0f0;
            min-height: 100vh;
        }
        
        /* Welcome Card */
        .welcome-card {
            background: white;
            border-radius: 6px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
            padding: 1.8rem;
            margin-bottom: 1.5rem;
        }
        
        .welcome-card h2 {
            font-weight: 600;
            color: #2d3e50;
            margin-bottom: 1.2rem;
            font-size: 1.4rem;
        }
        
        .vision-mission p {
            color: #555;
            line-height: 1.5;
            margin-bottom: 0.7rem;
            font-size: 0.9rem;
        }
        
        .vision-mission strong {
            color: #2d3e50;
            font-weight: 600;
        }

        .form-section {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e5e5e5;
        }

        .form-section h5 {
            font-weight: 600;
            color: #2d3e50;
            margin-bottom: 1rem;
            font-size: 1rem;
        }

        .form-label {
            font-weight: 500;
            color: #333;
            font-size: 0.875rem;
            margin-bottom: 0.4rem;
        }

        .form-control {
            border: 1px solid #d0d0d0;
            border-radius: 4px;
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.15);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 0.5rem 1.2rem;
            font-weight: 500;
            border-radius: 4px;
            font-size: 0.875rem;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
        
        /* Stat Cards */
        .stat-card {
            background: #fff;
            padding: 1.2rem;
            border-radius: 6px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
            margin-bottom: 1rem;
        }

        .stat-card .stat-icon {
            font-size: 1.3rem;
            color: #007bff;
            margin-bottom: 0.4rem;
        }

        .stat-card .stat-label {
            font-size: 0.8rem;
            color: #666;
            margin-bottom: 0.3rem;
        }

        .stat-card .stat-value {
            font-size: 1.6rem;
            font-weight: 700;
            color: #2d3e50;
        }
        
        /* Official Photo Cards */
        .official-photo-card {
            background: white;
            border-radius: 6px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
            overflow: hidden;
            height: 100%;
            position: relative;
        }
        
        .official-photo {
            background: linear-gradient(135deg, #5ba3d0 0%, #4a90bd 100%);
            height: 160px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        
        .official-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .official-photo i {
            font-size: 3rem;
            color: white;
            opacity: 0.3;
        }
        
        .btn-edit-photo {
            position: absolute;
            top: 6px;
            right: 6px;
            z-index: 10;
            background: white;
            border: none;
            padding: 5px 9px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 0.8rem;
        }

        .btn-edit-photo:hover {
            background: #f0f0f0;
        }
        
        .official-info {
            padding: 1rem;
            text-align: center;
        }
        
        .official-info h5 {
            color: #2d3e50;
            font-weight: 600;
            margin-bottom: 0.3rem;
            font-size: 0.9rem;
        }
        
        .official-info p {
            color: #666;
            margin-bottom: 0.15rem;
            font-size: 0.75rem;
        }
        
        /* Upload Card */
        .upload-card {
            background: white;
            border-radius: 6px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
            padding: 1.8rem;
        }
        
        .upload-card h4 {
            font-weight: 600;
            color: #2d3e50;
            margin-bottom: 1rem;
            font-size: 1rem;
        }
        
        .upload-area {
            border: 2px dashed #ccc;
            border-radius: 5px;
            padding: 2rem;
            text-align: center;
            cursor: pointer;
            background-color: #fafafa;
            transition: all 0.2s;
        }
        
        .upload-area:hover {
            border-color: #007bff;
            background-color: #f5f9ff;
        }
        
        .upload-area i {
            font-size: 2rem;
            color: #999;
            margin-bottom: 0.8rem;
        }
        
        .upload-area p {
            color: #666;
            margin: 0;
            font-size: 0.85rem;
        }

        .upload-area .choose-file-text {
            font-weight: 600;
            color: #333;
        }
        
        .btn-upload {
            background: #007bff;
            color: white;
            border: none;
            padding: 0.5rem 1.2rem;
            border-radius: 4px;
            font-weight: 500;
            font-size: 0.875rem;
            margin-top: 1rem;
        }
        
        .btn-upload:hover {
            background: #0056b3;
        }
        
        .file-chosen {
            color: #555;
            margin-top: 0.5rem;
            font-size: 0.8rem;
        }

        .alert {
            border-radius: 5px;
            padding: 0.75rem 1rem;
            margin-bottom: 1.2rem;
            border: none;
            font-size: 0.875rem;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h4>Admin<br>Kabupaten</h4>
        </div>
        
        <div class="sidebar-menu">
            <nav class="nav flex-column">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-home"></i> Beranda
                </a>
                <a class="nav-link" href="{{ route('admin.information.index') }}">
                    <i class="fas fa-info-circle"></i> Manajemen Informasi
                </a>
            </nav>
        </div>
        
        <div class="sidebar-footer">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <a class="nav-link text-white" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Keluar
                </a>
            </form>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- Alerts -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Welcome Card -->
            <div class="welcome-card">
                <h2>Selamat Datang, Admin Kabupaten</h2>
                
                <div class="vision-mission">
                    <p><strong>Visi</strong> : {{ $district->visi ?? 'Toba Unggul dan Bersinar' }}</p>
                    <p><strong>Misi</strong> : {{ $district->misi ?? 'Meningkatkan kualitas sumber daya manusia yang andal dan berbudaya, mempercepat pembangunan infrastruktur, serta mewujudkan reformasi birokrasi yang bersih dan melayani.' }}</p>
                </div>
                
                <div class="form-section">
                    <h5>Buat Visi dan Misi Baru :</h5>
                    <form action="{{ route('admin.information.update-visi-misi') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="visi" class="form-label">Visi</label>
                            <input type="text" class="form-control" id="visi" name="visi" value="{{ old('visi', $district->visi ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="misi" class="form-label">Misi</label>
                            <textarea class="form-control" id="misi" name="misi" rows="3" required>{{ old('misi', $district->misi ?? '') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Publish</button>
                    </form>
                </div>
            </div>
            
            <!-- Statistics and Officials -->
            <div class="row g-3 mb-3">
                <!-- Left Column: Statistics -->
                <div class="col-lg-4">
                    <div class="row g-3">
                        <!-- Total Penduduk -->
                        <div class="col-12">
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="stat-label">Total Penduduk</div>
                                <div class="stat-value">{{ number_format($district->total_penduduk ?? 7515) }}</div>
                            </div>
                        </div>

                        <!-- Total Desa -->
                        <div class="col-12">
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="fas fa-map-marked-alt"></i>
                                </div>
                                <div class="stat-label">Total Desa</div>
                                <div class="stat-value">{{ $district->villages->count() ?? 6 }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Official Photos -->
                <div class="col-lg-8">
                    <div class="row g-3">
                        <!-- Bupati -->
                        <div class="col-md-6">
                            <div class="official-photo-card">
                                <form action="{{ route('admin.information.upload-bupati-photo') }}" method="POST" enctype="multipart/form-data" id="bupatiForm">
                                    @csrf
                                    <input type="file" name="photo" id="bupatiPhoto" style="display: none;" accept="image/*" onchange="this.form.submit()">
                                    <button type="button" class="btn btn-edit-photo" onclick="document.getElementById('bupatiPhoto').click();">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </form>
                                <div class="official-photo">
                                    @if(file_exists(public_path('images/bupati.jpg')))
                                        <img src="{{ asset('images/bupati.jpg') }}?v={{ time() }}" alt="Bupati">
                                    @else
                                        <i class="fas fa-user"></i>
                                    @endif
                                </div>
                                <div class="official-info">
                                    <h5>{{ $district->bupati_name ?? 'Effendi Simbolon Panangian Napitupulu' }}</h5>
                                    <p>Bupati Toba</p>
                                    <p>{{ $district->periode ?? '2024-2025' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Wakil Bupati -->
                        <div class="col-md-6">
                            <div class="official-photo-card">
                                <form action="{{ route('admin.information.upload-wakil-photo') }}" method="POST" enctype="multipart/form-data" id="wakilForm">
                                    @csrf
                                    <input type="file" name="photo" id="wakilPhoto" style="display: none;" accept="image/*" onchange="this.form.submit()">
                                    <button type="button" class="btn btn-edit-photo" onclick="document.getElementById('wakilPhoto').click();">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </form>
                                <div class="official-photo">
                                    @if(file_exists(public_path('images/wakil-bupati.jpg')))
                                        <img src="{{ asset('images/wakil-bupati.jpg') }}?v={{ time() }}" alt="Wakil Bupati">
                                    @else
                                        <i class="fas fa-user"></i>
                                    @endif
                                </div>
                                <div class="official-info">
                                    <h5>{{ $district->wakil_bupati_name ?? 'Audi Murphy Sitorus' }}</h5>
                                    <p>Wakil Bupati Toba</p>
                                    <p>{{ $district->periode ?? '2024-2025' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Upload Documentation -->
            <div class="upload-card">
                <h4>Upload dokumentasi kegiatan</h4>
                
                <form action="{{ route('admin.information.upload-photo') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                    @csrf
                    <div class="upload-area" onclick="document.getElementById('fileInput').click();">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p class="choose-file-text">choose file</p>
                        <p class="file-chosen" id="fileName">no file chosen</p>
                    </div>
                    
                    <input type="file" name="photo" id="fileInput" style="display: none;" accept="image/*" onchange="updateFileName(this)" required>
                    
                    <button type="submit" class="btn-upload">
                        <i class="fas fa-upload me-1"></i> Unggah Foto Baru
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function updateFileName(input) {
            const fileName = document.getElementById('fileName');
            if (input.files && input.files[0]) {
                fileName.textContent = input.files[0].name;
            } else {
                fileName.textContent = 'no file chosen';
            }
        }
    </script>
</body>
</html>
