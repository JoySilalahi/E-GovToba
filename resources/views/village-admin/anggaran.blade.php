<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toba Hita</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 250px;
            background: #2c3e50;
            color: white;
            padding: 20px;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 20px 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
        }

        .sidebar-header h5 {
            font-size: 18px;
            font-weight: 600;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            display: block;
            padding: 12px 15px;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: rgba(255,255,255,0.1);
            color: white;
            padding-left: 20px;
        }

        .sidebar-menu i {
            width: 20px;
            margin-right: 10px;
        }

        .main-content {
            margin-left: 270px;
            padding: 20px;
        }

        .content-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .header-welcome {
            margin-bottom: 30px;
        }

        .header-welcome h2 {
            font-size: 28px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 5px;
        }

        .upload-section {
            background: #f8fafc;
            border-radius: 12px;
            padding: 30px;
            margin-top: 20px;
        }

        .upload-section h5 {
            color: #1e293b;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .file-info {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .custom-file-input {
            width: 100%;
            padding: 12px;
            border: 2px dashed #cbd5e1;
            border-radius: 8px;
            background: white;
            cursor: pointer;
            transition: all 0.3s;
        }

        .custom-file-input:hover {
            border-color: #0ea5e9;
            background: #f0f9ff;
        }

        .btn-upload {
            background: #0ea5e9;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            margin-top: 20px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-upload:hover {
            background: #0284c7;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(14, 165, 233, 0.3);
        }

        .budget-list {
            margin-top: 40px;
        }

        .budget-item {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            border-left: 4px solid #0ea5e9;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .budget-item-info h6 {
            color: #1e293b;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .budget-item-info p {
            color: #64748b;
            font-size: 14px;
            margin: 0;
        }

        .btn-download {
            background: #10b981;
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s;
        }

        .btn-download:hover {
            background: #059669;
            color: white;
        }

        .btn-delete {
            background: #ef4444;
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            margin-left: 10px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-delete:hover {
            background: #dc2626;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: relative;
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
            <h5>Admin Desa</h5>
        </div>
        <ul class="sidebar-menu">
            <li><a href="{{ route('village-admin.dashboard') }}"><i class="fas fa-home"></i> Beranda</a></li>
            <li><a href="{{ route('village-admin.kelola-informasi') }}"><i class="fas fa-info-circle"></i> Kelola Informasi</a></li>
            <li><a href="{{ route('village-admin.anggaran') }}" class="active"><i class="fas fa-coins"></i> Anggaran</a></li>
        </ul>
        <div style="position: absolute; bottom: 20px; left: 20px; right: 20px;">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
               style="display: block; padding: 12px; background: rgba(220,38,38,0.2); color: white; text-align: center; border-radius: 8px; text-decoration: none;">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="content-card">
            <div class="header-welcome">
                <h2>Selamat Datang, Admin Desa {{ $village->name }} !</h2>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Upload Section -->
            <div class="upload-section">
                <h5>Unggah dokumen anggaran</h5>

                <div style="background: white; padding: 25px; border-radius: 8px;">
                    <h6 style="color: #1e293b; font-weight: 600; margin-bottom: 10px;">Anggaran Desa</h6>
                    
                    @if($latestBudget)
                        <p class="file-info">
                            File saat ini: <strong>{{ $latestBudget->file_name }}</strong><br>
                            Pilih file baru untuk menggantikan (format PDF).
                        </p>
                    @else
                        <p class="file-info">
                            Pilih file baru untuk menggantikan (format PDF).
                        </p>
                    @endif

                    <form action="{{ route('village-admin.anggaran.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="budget_file" class="form-control custom-file-input" accept=".pdf" required>
                        
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="form-label">Tahun</label>
                                <select name="year" class="form-select" required>
                                    @for($y = date('Y'); $y >= 2020; $y--)
                                        <option value="{{ $y }}">{{ $y }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Kuartal (Opsional)</label>
                                <select name="quarter" class="form-select">
                                    <option value="">-- Pilih Kuartal --</option>
                                    <option value="1">Q1</option>
                                    <option value="2">Q2</option>
                                    <option value="3">Q3</option>
                                    <option value="4">Q4</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn-upload">
                            <i class="fas fa-upload"></i> Unggah File Baru
                        </button>
                    </form>
                </div>
            </div>

            <!-- Budget List -->
            @if($budgets->count() > 0)
            <div class="budget-list">
                <h5 style="color: #1e293b; font-weight: 600; margin-bottom: 20px;">
                    <i class="fas fa-file-pdf" style="color: #0ea5e9;"></i> Dokumen Anggaran
                </h5>

                @foreach($budgets as $budget)
                <div class="budget-item">
                    <div class="budget-item-info">
                        <h6>{{ $budget->file_name }}</h6>
                        <p>
                            <i class="far fa-calendar"></i> Tahun {{ $budget->year }}
                            @if($budget->quarter)
                                - Kuartal {{ $budget->quarter }}
                            @endif
                            | Diunggah {{ $budget->created_at->format('d M Y') }}
                        </p>
                    </div>
                    <div>
                        <a href="{{ Storage::url($budget->file_path) }}" target="_blank" class="btn-download">
                            <i class="fas fa-download"></i> Unduh
                        </a>
                        <form action="{{ route('village-admin.anggaran.delete', $budget->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Yakin ingin menghapus dokumen ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
