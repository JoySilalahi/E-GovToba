<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Informasi - Admin Kabupaten</title>
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
        }

        .welcome-header h2 {
            font-size: 24px;
            font-weight: 600;
            color: #2c3e50;
            margin: 0;
        }

        /* Form Card */
        .form-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            font-size: 14px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 14px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .section-title {
            font-size: 16px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e0e0e0;
        }

        .submit-btn {
            background: #3498db;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .submit-btn:hover {
            background: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
        }

        .alert {
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 20px;
            border: none;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
        }

        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
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
            <h5>Admin Kabupaten</h5>
        </div>
        
        <ul class="sidebar-menu">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> Beranda</a></li>
            <li><a href="{{ route('admin.information.index') }}" class="active"><i class="fas fa-info-circle"></i> Manajemen Informasi</a></li>
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

        <!-- Visi & Misi Form -->
        <div class="form-card">
            <div class="section-title">Buat Visi dan Misi Baru :</div>
            
            <form action="{{ route('admin.information.update-visi-misi') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="visi">Visi</label>
                    <textarea 
                        name="visi" 
                        id="visi" 
                        class="form-control" 
                        placeholder="Masukkan visi kabupaten..."
                        required>{{ old('visi', $district->visi ?? 'Toba Unggul dan Bersinar') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="misi">Misi</label>
                    <textarea 
                        name="misi" 
                        id="misi" 
                        class="form-control" 
                        placeholder="Masukkan misi kabupaten..."
                        required>{{ old('misi', $district->misi ?? 'Meningkatkan kualitas sumber daya manusia yang andal dan berbudaya, mempercepat pembangunan infrastruktur, serta mewujudkan reformasi birokrasi yang bersih dan melayani.') }}</textarea>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-save me-2"></i>Perbarui
                </button>
            </form>
        </div>

        <!-- Upload Foto Section -->
        <div class="form-card" style="margin-top: 30px;">
            <div class="section-title">Upload Foto Dokumentasi Kegiatan</div>
            <p style="color: #64748b; font-size: 14px; margin-bottom: 20px;">
                Foto yang diupload akan langsung tampil di halaman <strong>Beranda</strong> dan <strong>Profil Kabupaten</strong>
            </p>
            
            <form action="{{ route('admin.information.upload-photo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="photo">Pilih Foto <span style="color: #e74c3c;">*</span></label>
                    <input 
                        type="file" 
                        name="photo" 
                        id="photo" 
                        class="form-control" 
                        accept="image/jpeg,image/jpg,image/png"
                        required>
                    <small style="color: #64748b; font-size: 12px;">Format: JPG, JPEG, PNG. Maksimal 5MB</small>
                </div>

                <div class="form-group">
                    <label for="title">Judul/Keterangan Foto (Opsional)</label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        class="form-control" 
                        placeholder="Contoh: Rapat Koordinasi Pembangunan Desa"
                        maxlength="255">
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-upload me-2"></i>Upload Foto
                </button>
            </form>
        </div>

        <!-- Daftar Foto yang Sudah Diupload -->
        @if($district && $district->photos && $district->photos->count() > 0)
        <div class="form-card" style="margin-top: 30px;">
            <div class="section-title">Foto yang Sudah Diupload ({{ $district->photos->count() }})</div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px;">
                @foreach($district->photos as $photo)
                    <div style="border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden; background: #fff;">
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
                                        style="background: #e74c3c; color: white; border: none; padding: 8px 16px; border-radius: 6px; font-size: 13px; cursor: pointer; width: 100%;">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
