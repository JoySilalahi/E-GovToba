<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Kabupaten - Dashboard</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: #f8f9fa;
            overflow-x: hidden;
        }
        
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%);
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            z-index: 100;
        }
        
        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar-header h4 {
            color: white;
            font-weight: 600;
            margin: 0;
        }
        
        .sidebar-menu {
            padding: 1rem 0;
        }
        
        .sidebar-menu .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 0.75rem 1.5rem;
            transition: all 0.3s;
            border-radius: 0;
        }
        
        .sidebar-menu .nav-link:hover,
        .sidebar-menu .nav-link.active {
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
        
        .main-content {
            margin-left: 250px;
            padding: 2rem;
        }
        
        .welcome-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 2rem;
            margin-bottom: 2rem;
        }
        
        .welcome-card h2 {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1.5rem;
        }
        
        .vision-mission p {
            color: #6c757d;
            line-height: 1.8;
            margin-bottom: 1rem;
        }
        
        .vision-mission strong {
            color: #2c3e50;
        }
        
        .stat-card2 {
            display: flex;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            position: relative;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            align-items: center;
        }

        .left-border {
            width: 6px;
            background-color: #007bff;
            height: 80%;
            border-radius: 10px;
            margin-right: 15px;
        }

        .stat-icon2 i {
            font-size: 22px;
            color: #007bff;
        }

        .stat-label2 {
            font-size: 14px;
            color: #6c757d;
            margin-top: 4px;
        }

        .stat-value2 {
            font-size: 24px;
            font-weight: bold;
            margin-top: 8px;
        }
        
        .official-photo-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            overflow: hidden;
            height: 100%;
            position: relative;
        }
        
        .official-photo {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            height: 200px;
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
            font-size: 4rem;
            color: white;
            opacity: 0.5;
        }
        
        .btn-edit-photo {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 10;
            opacity: 0.9;
            background: white;
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-edit-photo:hover {
            opacity: 1;
            transform: scale(1.05);
        }
        
        .official-info {
            padding: 1.25rem;
            text-align: center;
        }
        
        .official-info h5 {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 0.25rem;
            font-size: 1rem;
        }
        
        .official-info p {
            color: #6c757d;
            margin-bottom: 0;
            font-size: 0.875rem;
        
        .upload-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            padding: 2rem;
            margin-top: 2rem;
        }
        
        .upload-card h4 {
            font-weight: 600;
            color: #2d3e50;
            margin-bottom: 1.2rem;
            font-size: 1.1rem;
        }
        
        .upload-area {
            border: 2px dashed #ccc;
            border-radius: 6px;
            padding: 2.5rem;
            text-align: center;
            transition: all 0.3s;
            cursor: pointer;
            background-color: #fafafa;
        }
        
        .upload-area:hover {
            border-color: #007bff;
            background-color: #f0f8ff;
        }
        
        .upload-area i {
            font-size: 2.5rem;
            color: #999;
            margin-bottom: 1rem;
        }
        
        .upload-area p {
            color: #666;
            margin-bottom: 0.3rem;
            font-size: 0.9rem;
        }

        .upload-area .choose-file-text {
            font-weight: 600;
            color: #333;
        }
        
        .btn-upload {
            background: #007bff;
            color: white;
            border: none;
            padding: 0.6rem 1.5rem;
            border-radius: 4px;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s;
            margin-top: 1rem;
        }
        
        .btn-upload:hover {
            background: #0056b3;
        }
        
        .file-chosen {
            color: #555;
            margin-top: 0.5rem;
            font-size: 0.85rem;
        }

        .alert {
            border-radius: 6px;
            padding: 12px 16px;
            margin-bottom: 1.5rem;
            border: none;
            font-size: 0.9rem;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                margin-left: -200px;
            }
            
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h4>Admin Kabupaten</h4>
        </div>
        
        <div class="sidebar-menu">
            <nav class="nav flex-column">
                <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-home me-2"></i> Beranda
                </a>
                <a class="nav-link" href="{{ route('admin.information.index') }}">
                    <i class="fas fa-info-circle me-2"></i> Manajemen Informasi
                </a>
            </nav>
        </div>
        
        <div class="sidebar-footer">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <a class="nav-link text-white" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="fas fa-sign-out-alt me-2"></i> Keluar
                </a>
            </form>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Welcome Card -->
            <div class="welcome-card">
                <h2>Selamat Datang, Admin Kabupaten</h2>
                
                <div class="vision-mission">
                    <p><strong>Visi</strong> : {{ $district->visi ?? 'Toba Unggul dan Bersinar' }}</p>
                    <p><strong>Misi</strong> : {{ $district->misi ?? 'Meningkatkan kualitas sumber daya manusia yang andal dan berbudaya, mempercepat pembangunan infrastruktur, serta mewujudkan reformasi birokrasi yang bersih dan melayani.' }}</p>
                </div>
                
                <form action="{{ route('admin.information.update-visi-misi') }}" method="POST">
                    @csrf
                    <div class="mt-4">
                        <h5 style="font-weight: 600; color: #2c3e50; margin-bottom: 1rem;">Buat Visi dan Misi Baru :</h5>
                        <div class="mb-3">
                            <label for="visi" class="form-label" style="font-weight: 500;">Visi</label>
                            <input type="text" class="form-control" id="visi" name="visi" placeholder="Masukkan visi kabupaten..." value="{{ old('visi', $district->visi ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="misi" class="form-label" style="font-weight: 500;">Misi</label>
                            <textarea class="form-control" id="misi" name="misi" rows="3" placeholder="Masukkan misi kabupaten..." required>{{ old('misi', $district->misi ?? '') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Publish
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Statistics and Officials -->
            <div class="row g-4 mb-4">
                <!-- Left Column: Statistics -->
                <div class="col-lg-4">
                    <div class="row g-3">
                        <!-- Card: Total Penduduk -->
                        <div class="col-12">
                            <div class="stat-card2">
                                <div class="left-border"></div>
                                <div class="content">
                                    <div class="stat-icon2">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="stat-label2">Total Penduduk</div>
                                    <div class="stat-value2">{{ number_format($district->total_penduduk ?? 7515) }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Card: Total Desa -->
                        <div class="col-12">
                            <div class="stat-card2">
                                <div class="left-border"></div>
                                <div class="content">
                                    <div class="stat-icon2">
                                        <i class="fas fa-map-marked-alt"></i>
                                    </div>
                                    <div class="stat-label2">Total Kecamatan</div>
                                    <div class="stat-value2">{{ $district->total_kecamatan ?? 16 }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Official Photos -->
                <div class="col-lg-8">
                    <div class="row g-3">
                        <!-- Official Card 1: Bupati -->
                        <div class="col-md-6">
                            <div class="official-photo-card">
                                <form action="{{ route('admin.information.upload-bupati-photo') }}" method="POST" enctype="multipart/form-data" id="bupatiForm">
                                    @csrf
                                    <input type="file" name="photo" id="bupatiPhoto" style="display: none;" accept="image/*" onchange="this.form.submit()">
                                    <button type="button" class="btn btn-sm btn-primary btn-edit-photo" onclick="document.getElementById('bupatiPhoto').click();" title="Edit Foto Bupati">
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
                                    <h5>Drs. Poltak Sitorus</h5>
                                    <p>Bupati Toba</p>
                                    <p>2024-2029</p>
                                </div>
                            </div>
                        </div>

                        <!-- Official Card 2: Wakil Bupati -->
                        <div class="col-md-6">
                            <div class="official-photo-card">
                                <form action="{{ route('admin.information.upload-wakil-photo') }}" method="POST" enctype="multipart/form-data" id="wakilForm">
                                    @csrf
                                    <input type="file" name="photo" id="wakilPhoto" style="display: none;" accept="image/*" onchange="this.form.submit()">
                                    <button type="button" class="btn btn-sm btn-primary btn-edit-photo" onclick="document.getElementById('wakilPhoto').click();" title="Edit Foto Wakil Bupati">
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
                                    <h5>Andi Napitupulu Siahaan</h5>
                                    <p>Wakil Bupati Toba</p>
                                    <p>2024-2029</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Upload Documentation Section -->
            <div class="upload-card">
                <h4>Upload dokumentasi kegiatan</h4>
                <p style="color: #6c757d; font-size: 14px; margin-bottom: 20px;">
                    Foto yang diupload akan langsung tampil di halaman <strong>Beranda</strong> dan <strong>Profil Kabupaten</strong>
                </p>
                
                <form action="{{ route('admin.information.upload-photo') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                    @csrf
                    <div class="upload-area" onclick="document.getElementById('fileInput').click();">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p class="mb-2"><strong>choose file</strong></p>
                        <p class="file-chosen" id="fileName">no file chosen</p>
                    </div>
                    
                    <input type="file" name="photo" id="fileInput" style="display: none;" accept="image/jpeg,image/jpg,image/png" onchange="updateFileName(this)" required>
                    
                    <div class="mt-3 mb-3">
                        <label for="title" class="form-label" style="font-weight: 500;">Judul/Keterangan Foto (Opsional)</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Contoh: Rapat Koordinasi Pembangunan Desa" maxlength="255">
                    </div>
                    
                    <button type="submit" class="btn-upload">
                        <i class="fas fa-upload me-2"></i> Unggah Foto Baru
                    </button>
                </form>
            </div>

            <!-- Daftar Foto yang Sudah Diupload -->
            @if($district && $district->photos && $district->photos->count() > 0)
            <div class="upload-card" style="margin-top: 2rem;">
                <h4>Foto yang Sudah Diupload ({{ $district->photos->count() }})</h4>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; margin-top: 20px;">
                    @foreach($district->photos as $photo)
                        <div style="border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden; background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                            <img src="{{ asset('storage/' . $photo->photo_path) }}" 
                                 alt="{{ $photo->title }}" 
                                 style="width: 100%; height: 180px; object-fit: cover; display: block;">
                            <div style="padding: 12px;">
                                <p style="margin: 0 0 8px 0; font-weight: 600; font-size: 14px; color: #2c3e50;">
                                    {{ $photo->title ?? 'Tanpa Judul' }}
                                </p>
                                <p style="margin: 0 0 12px 0; font-size: 12px; color: #64748b;">
                                    <i class="far fa-calendar"></i> {{ $photo->created_at->locale('id')->isoFormat('D MMMM YYYY') }}
                                </p>
                                <form action="{{ route('admin.information.delete-photo', $photo->id) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Yakin ingin menghapus foto ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            style="background: #e74c3c; color: white; border: none; padding: 8px 16px; border-radius: 6px; font-size: 13px; cursor: pointer; width: 100%; transition: all 0.3s;">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
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