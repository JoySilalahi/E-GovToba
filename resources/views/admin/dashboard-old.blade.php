<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Kabupaten</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css">
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
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            flex-wrap: wrap;
        }

        .edit-name-btn {
            background: none;
            border: none;
            color: #3498db;
            cursor: pointer;
            font-size: 12px;
            padding: 2px 5px;
            border-radius: 3px;
            transition: all 0.3s;
        }

        .edit-name-btn:hover {
            background: #ecf0f1;
            color: #2980b9;
        }

        .name-edit-form {
            display: none;
            width: 100%;
            margin-top: 5px;
        }

        .name-edit-form.active {
            display: block;
        }

        .name-input {
            width: 100%;
            padding: 6px 10px;
            border: 1px solid #bdc3c7;
            border-radius: 5px;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .name-edit-actions {
            display: flex;
            gap: 5px;
            justify-content: center;
        }

        .name-save-btn, .name-cancel-btn {
            padding: 5px 15px;
            border: none;
            border-radius: 4px;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .name-save-btn {
            background: #27ae60;
            color: white;
        }

        .name-save-btn:hover {
            background: #229954;
        }

        .name-cancel-btn {
            background: #95a5a6;
            color: white;
        }

        .name-cancel-btn:hover {
            background: #7f8c8d;
        }

        .bupati-card p {
            font-size: 12px;
            color: #7f8c8d;
            margin: 0;
        }

        .bupati-period {
            font-size: 11px;
            color: #3498db;
            font-weight: 500;
            margin-top: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .edit-period-btn {
            background: none;
            border: none;
            color: #3498db;
            cursor: pointer;
            font-size: 10px;
            padding: 2px 4px;
            border-radius: 3px;
            transition: all 0.3s;
        }

        .edit-period-btn:hover {
            background: #ecf0f1;
            color: #2980b9;
        }

        .period-edit-form {
            display: none;
            width: 100%;
            margin-top: 5px;
        }

        .period-edit-form.active {
            display: block;
        }

        .period-input {
            width: 100%;
            padding: 6px 10px;
            border: 1px solid #bdc3c7;
            border-radius: 5px;
            font-size: 11px;
            margin-bottom: 8px;
        }

        .period-edit-actions {
            display: flex;
            gap: 5px;
            justify-content: center;
        }

        .period-save-btn, .period-cancel-btn {
            padding: 4px 12px;
            border: none;
            border-radius: 4px;
            font-size: 11px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .period-save-btn {
            background: #27ae60;
            color: white;
        }

        .period-save-btn:hover {
            background: #229954;
        }

        .period-cancel-btn {
            background: #95a5a6;
            color: white;
        }

        .period-cancel-btn:hover {
            background: #7f8c8d;
        }

        .edit-photo-btn {
            background: #3498db;
            color: white;
            border: none;
            padding: 6px 15px;
            border-radius: 5px;
            font-size: 11px;
            cursor: pointer;
            margin-top: 8px;
            transition: all 0.3s;
        }

        .edit-photo-btn:hover {
            background: #2980b9;
        }

        /* Modal Crop */
        .crop-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.8);
            overflow: auto;
        }

        .crop-modal-content {
            background-color: #fefefe;
            margin: 2% auto;
            padding: 0;
            border-radius: 12px;
            width: 90%;
            max-width: 800px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }

        .crop-modal-header {
            padding: 20px 25px;
            background: #2c3e50;
            color: white;
            border-radius: 12px 12px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .crop-modal-header h5 {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
        }

        .crop-close {
            color: white;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            background: none;
            border: none;
            line-height: 1;
        }

        .crop-close:hover {
            color: #e74c3c;
        }

        .crop-modal-body {
            padding: 25px;
        }

        .crop-container {
            max-height: 500px;
            background: #f5f7fa;
            border-radius: 8px;
            overflow: hidden;
        }

        #cropImage {
            max-width: 100%;
            display: block;
        }

        .crop-modal-footer {
            padding: 20px 25px;
            border-top: 1px solid #e0e0e0;
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }

        .crop-btn {
            padding: 10px 25px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }

        .crop-btn-cancel {
            background: #95a5a6;
            color: white;
        }

        .crop-btn-cancel:hover {
            background: #7f8c8d;
        }

        .crop-btn-save {
            background: #3498db;
            color: white;
        }

        .crop-btn-save:hover {
            background: #2980b9;
        }

        .bupati-section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .bupati-section-header h5 {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
            color: #2c3e50;
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
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" style="background: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 8px; padding: 15px; margin-bottom: 20px; display: flex; align-items: center; justify-content: space-between;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-check-circle" style="font-size: 20px;"></i>
                    <span>{{ session('success') }}</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" style="background: none; border: none; font-size: 20px; cursor: pointer; color: #155724;">&times;</button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" style="background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 8px; padding: 15px; margin-bottom: 20px; display: flex; align-items: center; justify-content: space-between;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-exclamation-circle" style="font-size: 20px;"></i>
                    <span>{{ session('error') }}</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" style="background: none; border: none; font-size: 20px; cursor: pointer; color: #721c24;">&times;</button>
            </div>
        @endif

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
                    
                    @if($district && $district->documentation_file)
                        <div class="alert alert-info" style="background: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb; border-radius: 8px; padding: 12px; margin-bottom: 15px; font-size: 14px;">
                            <i class="fas fa-file-alt me-2"></i>
                            File saat ini: <strong>{{ basename($district->documentation_file) }}</strong>
                        </div>
                    @endif

                    <form action="{{ route('admin.information.upload-documentation') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input type="file" class="form-control" name="documentation_file" id="fileUpload" accept=".pdf,.doc,.docx" required>
                            <small class="text-muted">Format: PDF, DOC, DOCX (Max: 10MB)</small>
                        </div>
                        <button type="submit" class="upload-btn">Unggah File Baru</button>
                    </form>
                </div>

                <!-- Upload Photo Section -->
                <div class="upload-section" style="margin-top: 20px;">
                    <h5>Upload Foto Kegiatan</h5>
                    
                    <form action="{{ route('admin.information.upload-photo') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="photoTitle" class="form-label" style="font-size: 14px; font-weight: 500; color: #2c3e50;">Judul Foto (Opsional)</label>
                            <input type="text" class="form-control" name="title" id="photoTitle" placeholder="Contoh: Rapat Koordinasi">
                        </div>
                        <div class="mb-3">
                            <label for="photoUpload" class="form-label" style="font-size: 14px; font-weight: 500; color: #2c3e50;">Pilih Foto</label>
                            <input type="file" class="form-control" name="photo" id="photoUpload" accept="image/jpeg,image/jpg,image/png" required>
                            <small class="text-muted">Format: JPEG, JPG, PNG (Max: 5MB)</small>
                        </div>
                        <button type="submit" class="upload-btn"><i class="fas fa-upload me-2"></i>Unggah Foto</button>
                    </form>

                    @if($district && $district->photos && $district->photos->count() > 0)
                        <div style="margin-top: 30px;">
                            <h6 style="font-size: 15px; font-weight: 600; color: #2c3e50; margin-bottom: 15px;">Foto yang Sudah Diupload ({{ $district->photos->count() }})</h6>
                            
                            <div style="position: relative;">
                                <!-- Scroll Container -->
                                <div id="photoGallery" style="display: flex; gap: 15px; overflow-x: auto; scroll-behavior: smooth; padding: 10px 0; scrollbar-width: thin;">
                                    @foreach($district->photos as $photo)
                                        <div style="min-width: 200px; flex-shrink: 0; background: #f8f9fa; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                            <img src="{{ asset('storage/' . $photo->photo_path) }}" alt="{{ $photo->title ?? 'Dokumentasi' }}" style="width: 100%; height: 150px; object-fit: cover;">
                                            <div style="padding: 10px;">
                                                @if($photo->title)
                                                    <p style="font-size: 12px; font-weight: 500; color: #2c3e50; margin: 0 0 8px 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $photo->title }}</p>
                                                @endif
                                                <form action="{{ route('admin.information.delete-photo', $photo->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus foto ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="background: #e74c3c; color: white; border: none; padding: 6px 12px; border-radius: 4px; font-size: 11px; cursor: pointer; width: 100%; transition: all 0.3s;" onmouseover="this.style.background='#c0392b'" onmouseout="this.style.background='#e74c3c'">
                                                        <i class="fas fa-trash-alt me-1"></i>Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Navigation Arrows -->
                                @if($district->photos->count() > 2)
                                    <button onclick="scrollGallery('left')" style="position: absolute; left: -15px; top: 50%; transform: translateY(-50%); background: rgba(52, 152, 219, 0.9); color: white; border: none; width: 40px; height: 40px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,0.2); transition: all 0.3s;" onmouseover="this.style.background='rgba(41, 128, 185, 1)'" onmouseout="this.style.background='rgba(52, 152, 219, 0.9)'">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button onclick="scrollGallery('right')" style="position: absolute; right: -15px; top: 50%; transform: translateY(-50%); background: rgba(52, 152, 219, 0.9); color: white; border: none; width: 40px; height: 40px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,0.2); transition: all 0.3s;" onmouseover="this.style.background='rgba(41, 128, 185, 1)'" onmouseout="this.style.background='rgba(52, 152, 219, 0.9)'">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                @endif
                            </div>

                            <style>
                                #photoGallery::-webkit-scrollbar {
                                    height: 6px;
                                }
                                #photoGallery::-webkit-scrollbar-track {
                                    background: #f1f1f1;
                                    border-radius: 10px;
                                }
                                #photoGallery::-webkit-scrollbar-thumb {
                                    background: #3498db;
                                    border-radius: 10px;
                                }
                                #photoGallery::-webkit-scrollbar-thumb:hover {
                                    background: #2980b9;
                                }
                            </style>

                            <script>
                                function scrollGallery(direction) {
                                    const gallery = document.getElementById('photoGallery');
                                    const scrollAmount = 230; // width of card + gap
                                    
                                    if (direction === 'left') {
                                        gallery.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
                                    } else {
                                        gallery.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                                    }
                                }
                            </script>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right: Bupati Photos -->
            <div class="bupati-section">
                <div class="bupati-section-header">
                    <h5>Pimpinan Daerah</h5>
                </div>

                <div class="bupati-grid">
                    <div class="bupati-card">
                        <div class="bupati-photo">
                            <img src="{{ asset('images/bupati.jpg') }}" alt="Bupati" onerror="this.style.display='none'; this.parentElement.innerHTML='<div style=\'display:flex;align-items:center;justify-content:center;height:100%;background:#e8eaed;color:#bdc3c7;font-size:60px;\'><i class=\'fas fa-user\'></i></div>'">
                        </div>
                        <h6>
                            <span id="bupatiNameDisplay">{{ $district->bupati_name ?? 'Effendi Sintong Panangian Napitupulu' }}</span>
                            <button class="edit-name-btn" onclick="editName('bupati')" title="Edit Nama">
                                <i class="fas fa-edit"></i>
                            </button>
                        </h6>
                        <div id="bupatiNameForm" class="name-edit-form">
                            <input type="text" id="bupatiNameInput" class="name-input" value="{{ $district->bupati_name ?? 'Effendi Sintong Panangian Napitupulu' }}">
                            <div class="name-edit-actions">
                                <button class="name-save-btn" onclick="saveName('bupati')">
                                    <i class="fas fa-check"></i> Simpan
                                </button>
                                <button class="name-cancel-btn" onclick="cancelEditName('bupati')">
                                    <i class="fas fa-times"></i> Batal
                                </button>
                            </div>
                        </div>
                        <p>Bupati Toba</p>
                        <div class="bupati-period">
                            <span id="periodeDisplay">{{ $district->periode ?? 'Periode 2021-2026' }}</span>
                            <button class="edit-period-btn" onclick="editPeriod()" title="Edit Periode">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                        <div id="periodeForm" class="period-edit-form">
                            <input type="text" id="periodeInput" class="period-input" value="{{ $district->periode ?? 'Periode 2021-2026' }}" placeholder="Contoh: Periode 2021-2026">
                            <div class="period-edit-actions">
                                <button class="period-save-btn" onclick="savePeriod()">
                                    <i class="fas fa-check"></i> Simpan
                                </button>
                                <button class="period-cancel-btn" onclick="cancelEditPeriod()">
                                    <i class="fas fa-times"></i> Batal
                                </button>
                            </div>
                        </div>
                        <button class="edit-photo-btn" onclick="openCropModal('bupati')">
                            <i class="fas fa-camera"></i> Ganti Foto
                        </button>
                        <input type="file" id="uploadBupati" accept="image/*" style="display: none;" onchange="handleImageSelect(event, 'bupati')">
                    </div>

                    <div class="bupati-card">
                        <div class="bupati-photo">
                            <img src="{{ asset('images/wakil-bupati.jpg') }}" alt="Wakil Bupati" onerror="this.style.display='none'; this.parentElement.innerHTML='<div style=\'display:flex;align-items:center;justify-content:center;height:100%;background:#e8eaed;color:#bdc3c7;font-size:60px;\'><i class=\'fas fa-user\'></i></div>'">
                        </div>
                        <h6>
                            <span id="wakilNameDisplay">{{ $district->wakil_bupati_name ?? 'Audi Murphy Sitorus' }}</span>
                            <button class="edit-name-btn" onclick="editName('wakil')" title="Edit Nama">
                                <i class="fas fa-edit"></i>
                            </button>
                        </h6>
                        <div id="wakilNameForm" class="name-edit-form">
                            <input type="text" id="wakilNameInput" class="name-input" value="{{ $district->wakil_bupati_name ?? 'Audi Murphy Sitorus' }}">
                            <div class="name-edit-actions">
                                <button class="name-save-btn" onclick="saveName('wakil')">
                                    <i class="fas fa-check"></i> Simpan
                                </button>
                                <button class="name-cancel-btn" onclick="cancelEditName('wakil')">
                                    <i class="fas fa-times"></i> Batal
                                </button>
                            </div>
                        </div>
                        <p>Wakil Bupati Toba</p>
                        <div class="bupati-period">{{ $district->periode ?? 'Periode 2021-2026' }}</div>
                        <button class="edit-photo-btn" onclick="openCropModal('wakil')">
                            <i class="fas fa-camera"></i> Ganti Foto
                        </button>
                        <input type="file" id="uploadWakilBupati" accept="image/*" style="display: none;" onchange="handleImageSelect(event, 'wakil')">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Crop Foto -->
    <div id="cropModal" class="crop-modal">
        <div class="crop-modal-content">
            <div class="crop-modal-header">
                <h5 id="cropModalTitle">Crop Foto</h5>
                <button class="crop-close" onclick="closeCropModal()">&times;</button>
            </div>
            <div class="crop-modal-body">
                <div class="crop-container">
                    <img id="cropImage" src="" alt="Image for cropping">
                </div>
            </div>
            <div class="crop-modal-footer">
                <button class="crop-btn crop-btn-cancel" onclick="closeCropModal()">
                    <i class="fas fa-times me-2"></i>Batal
                </button>
                <button class="crop-btn crop-btn-save" onclick="saveCroppedImage()">
                    <i class="fas fa-check me-2"></i>Simpan & Upload
                </button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
    <script>
        let cropper = null;
        let currentPhotoType = '';

        function openCropModal(type) {
            currentPhotoType = type;
            const input = type === 'bupati' ? document.getElementById('uploadBupati') : document.getElementById('uploadWakilBupati');
            const title = type === 'bupati' ? 'Crop Foto Bupati' : 'Crop Foto Wakil Bupati';
            
            document.getElementById('cropModalTitle').textContent = title;
            input.click();
        }

        function handleImageSelect(event, type) {
            const file = event.target.files[0];
            
            if (!file) return;
            
            if (!file.type.match('image.*')) {
                alert('Harap pilih file gambar!');
                return;
            }

            const reader = new FileReader();
            
            reader.onload = function(e) {
                const image = document.getElementById('cropImage');
                image.src = e.target.result;
                
                // Show modal
                document.getElementById('cropModal').style.display = 'block';
                
                // Destroy previous cropper if exists
                if (cropper) {
                    cropper.destroy();
                }
                
                // Initialize cropper with portrait aspect ratio
                cropper = new Cropper(image, {
                    aspectRatio: 7 / 8, // Portrait ratio for official photos
                    viewMode: 2,
                    dragMode: 'move',
                    autoCropArea: 0.8,
                    restore: false,
                    guides: true,
                    center: true,
                    highlight: false,
                    cropBoxMovable: true,
                    cropBoxResizable: true,
                    toggleDragModeOnDblclick: false,
                    background: true,
                    modal: true,
                    minContainerWidth: 200,
                    minContainerHeight: 200
                });
            };
            
            reader.readAsDataURL(file);
        }

        function closeCropModal() {
            document.getElementById('cropModal').style.display = 'none';
            
            // Reset file inputs
            document.getElementById('uploadBupati').value = '';
            document.getElementById('uploadWakilBupati').value = '';
            
            if (cropper) {
                cropper.destroy();
                cropper = null;
            }
        }

        function saveCroppedImage() {
            if (!cropper) return;
            
            // Get cropped canvas with higher resolution
            const canvas = cropper.getCroppedCanvas({
                width: 800,
                height: 914, // 7:8 ratio (double resolution for better quality)
                imageSmoothingEnabled: true,
                imageSmoothingQuality: 'high',
            });
            
            // Convert to blob
            canvas.toBlob(function(blob) {
                // Create form data
                const formData = new FormData();
                const fileName = currentPhotoType === 'bupati' ? 'bupati.jpg' : 'wakil-bupati.jpg';
                const fieldName = currentPhotoType === 'bupati' ? 'bupati_photo' : 'wakil_bupati_photo';
                
                formData.append(fieldName, blob, fileName);
                formData.append('_token', '{{ csrf_token() }}');
                
                // Upload URL
                const uploadUrl = currentPhotoType === 'bupati' 
                    ? '{{ route("admin.information.upload-bupati-photo") }}'
                    : '{{ route("admin.information.upload-wakil-bupati-photo") }}';
                
                // Show loading
                const saveBtn = document.querySelector('.crop-btn-save');
                const originalText = saveBtn.innerHTML;
                saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengupload...';
                saveBtn.disabled = true;
                
                // Send AJAX request
                fetch(uploadUrl, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Close modal
                        closeCropModal();
                        
                        // Show success message and reload
                        alert('Foto berhasil diupload!');
                        location.reload();
                    } else {
                        alert('Gagal mengupload foto: ' + (data.message || 'Error tidak diketahui'));
                        saveBtn.innerHTML = originalText;
                        saveBtn.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengupload foto.');
                    saveBtn.innerHTML = originalText;
                    saveBtn.disabled = false;
                });
                
            }, 'image/jpeg', 0.98); // Increase quality to 98%
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('cropModal');
            if (event.target === modal) {
                closeCropModal();
            }
        }

        function scrollGallery(direction) {
            const gallery = document.getElementById('photoGallery');
            const scrollAmount = 230;
            
            if (direction === 'left') {
                gallery.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
            } else {
                gallery.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            }
        }

        // Edit Name Functions
        function editName(type) {
            const formId = type === 'bupati' ? 'bupatiNameForm' : 'wakilNameForm';
            const displayId = type === 'bupati' ? 'bupatiNameDisplay' : 'wakilNameDisplay';
            
            document.getElementById(formId).classList.add('active');
            document.getElementById(displayId).style.display = 'none';
            document.querySelector(`#${formId} .name-input`).focus();
        }

        function cancelEditName(type) {
            const formId = type === 'bupati' ? 'bupatiNameForm' : 'wakilNameForm';
            const displayId = type === 'bupati' ? 'bupatiNameDisplay' : 'wakilNameDisplay';
            const inputId = type === 'bupati' ? 'bupatiNameInput' : 'wakilNameInput';
            const displayElement = document.getElementById(displayId);
            
            // Reset input to original value
            document.getElementById(inputId).value = displayElement.textContent;
            
            document.getElementById(formId).classList.remove('active');
            displayElement.style.display = 'inline';
        }

        function saveName(type) {
            const inputId = type === 'bupati' ? 'bupatiNameInput' : 'wakilNameInput';
            const newName = document.getElementById(inputId).value.trim();
            
            if (!newName) {
                alert('Nama tidak boleh kosong!');
                return;
            }

            const fieldName = type === 'bupati' ? 'bupati_name' : 'wakil_bupati_name';
            const formData = new FormData();
            formData.append(fieldName, newName);
            formData.append('_token', '{{ csrf_token() }}');

            // Show loading
            const saveBtn = event.target;
            const originalHTML = saveBtn.innerHTML;
            saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            saveBtn.disabled = true;

            fetch('{{ route("admin.information.update-names") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update display
                    const displayId = type === 'bupati' ? 'bupatiNameDisplay' : 'wakilNameDisplay';
                    document.getElementById(displayId).textContent = newName;
                    
                    // Hide form
                    cancelEditName(type);
                    
                    // Show success message
                    alert('Nama berhasil diperbarui!');
                } else {
                    alert('Gagal memperbarui nama: ' + (data.message || 'Error tidak diketahui'));
                    saveBtn.innerHTML = originalHTML;
                    saveBtn.disabled = false;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memperbarui nama.');
                saveBtn.innerHTML = originalHTML;
                saveBtn.disabled = false;
            });
        }

        // Edit Period Functions
        function editPeriod() {
            document.getElementById('periodeForm').classList.add('active');
            document.getElementById('periodeDisplay').style.display = 'none';
            document.getElementById('periodeInput').focus();
        }

        function cancelEditPeriod() {
            const displayElement = document.getElementById('periodeDisplay');
            
            // Reset input to original value
            document.getElementById('periodeInput').value = displayElement.textContent;
            
            document.getElementById('periodeForm').classList.remove('active');
            displayElement.style.display = 'inline';
        }

        function savePeriod() {
            const newPeriode = document.getElementById('periodeInput').value.trim();
            
            if (!newPeriode) {
                alert('Periode tidak boleh kosong!');
                return;
            }

            const formData = new FormData();
            formData.append('periode', newPeriode);
            formData.append('_token', '{{ csrf_token() }}');

            // Show loading
            const saveBtn = event.target;
            const originalHTML = saveBtn.innerHTML;
            saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            saveBtn.disabled = true;

            fetch('{{ route("admin.information.update-periode") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update display
                    document.getElementById('periodeDisplay').textContent = newPeriode;
                    
                    // Hide form
                    cancelEditPeriod();
                    
                    // Show success message
                    alert('Periode berhasil diperbarui!');
                    
                    // Reload to update both cards
                    location.reload();
                } else {
                    alert('Gagal memperbarui periode: ' + (data.message || 'Error tidak diketahui'));
                    saveBtn.innerHTML = originalHTML;
                    saveBtn.disabled = false;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memperbarui periode.');
                saveBtn.innerHTML = originalHTML;
                saveBtn.disabled = false;
            });
        }
    </script>

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