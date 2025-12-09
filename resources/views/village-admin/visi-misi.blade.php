<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Visi & Misi - Admin Desa {{ $village->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; color: #1b232f; }

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
        .sidebar-footer a { color:rgba(255,255,255,0.85); text-decoration:none; display:flex; align-items:center; padding:12px 0; font-size: 14px; font-weight:500; }
        .main-content { margin-left:260px; padding:32px; min-height:100vh; transition:margin-left .3s; }

        .form-container { background:#fff; border-radius:12px; padding:32px; box-shadow:0 6px 18px rgba(14,30,60,0.04); border:1px solid #eef6fb; }
        .form-container h2 { font-size:22px; font-weight:700; color:#0f1724; margin-bottom:24px; display:flex; align-items:center; gap:12px; }
        .form-label { font-size:14px; font-weight:700; color:#334155; margin-bottom:8px; display:block; }
        .form-control { border:1px solid #cbd5e1; border-radius:10px; padding:12px 14px; font-size:14px; font-family: inherit; }
        .form-control:focus { border-color:#0b79b8; box-shadow:0 0 0 .15rem rgba(11,121,184,0.12); outline:none; }
        textarea.form-control { min-height:150px; resize:vertical; }
        .form-group { margin-bottom:24px; }
        .hint { font-size:12px; color:#94a3b8; margin-top:6px; }
        .btn-submit { background:#0b79b8; border:none; color:#fff; padding:12px 28px; border-radius:8px; font-weight:700; font-size:14px; cursor:pointer; transition:all .2s; display:inline-flex; align-items:center; gap:8px; }
        .btn-submit:hover { background:#096598; transform:translateY(-1px); }
        .btn-reset { background:#f1f5f9; border:1px solid #cbd5e1; color:#475569; padding:12px 28px; border-radius:8px; font-weight:600; font-size:14px; cursor:pointer; transition:all .2s; }
        .btn-reset:hover { background:#e2e8f0; border-color:#a0aec0; }
        .form-actions { display:flex; gap:12px; margin-top:28px; }
        .info-box { background:#eff6ff; border-left:4px solid #0b79b8; padding:16px 20px; border-radius:8px; margin-bottom:24px; }
        .info-box p { margin:0; color:#334155; font-size:14px; line-height:1.6; }
        .success-message { background:#d4edda; border:1px solid #c3e6cb; color:#155724; padding:16px; border-radius:8px; margin-bottom:20px; display:flex; align-items:center; gap:10px; }
        .success-message i { font-size:18px; }

        @media (max-width:768px) {
            .sidebar { transform:translateX(-100%); }
            .main-content { margin-left:0; padding:16px; }
            .form-container { padding:20px; }
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
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Page Header -->
        <div style="margin-bottom:28px;">
            <h1 style="font-size:26px; font-weight:800; color:#0f1724; margin:0 0 8px 0;">Kelola Visi & Misi Desa</h1>
            <p style="color:#64748b; margin:0;">Perbarui visi dan misi desa {{ $village->name }} untuk ditampilkan di halaman publik</p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="success-message">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- Error Messages -->
        @if($errors->any())
            <div style="background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 16px; border-radius: 8px; margin-bottom: 20px;">
                <i class="fas fa-exclamation-circle" style="margin-right: 10px;"></i>
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Info Box -->
        <div class="info-box">
            <p>
                <i class="fas fa-info-circle" style="margin-right: 8px; color: #0b79b8;"></i>
                <strong>Tips:</strong> Visi dan misi yang Anda masukkan di sini akan langsung ditampilkan di halaman publik desa, termasuk di beranda admin desa ini.
            </p>
        </div>

        <!-- Form Container -->
        <div class="form-container">
            <h2><i class="fas fa-lightbulb"></i> Perbarui Visi & Misi</h2>

            <form action="{{ route('village-admin.visi-misi.update') }}" method="POST">
                @csrf

                <!-- Visi Field -->
                <div class="form-group">
                    <label for="visi" class="form-label">Visi Desa *</label>
                    <textarea 
                        id="visi" 
                        name="visi" 
                        class="form-control @error('visi') is-invalid @enderror" 
                        placeholder="Contoh: Mewujudkan Desa ... yang mandiri, sejahtera, dan berdaya berlandaskan gotong royong."
                        required
                    >{{ old('visi', $village->visi ?? '') }}</textarea>
                    <div class="hint">Jelaskan visi atau cita-cita jangka panjang desa Anda (maksimal 500 karakter)</div>
                    @error('visi')
                        <div style="color: #dc2626; font-size: 13px; margin-top: 6px;">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Misi Field -->
                <div class="form-group">
                    <label for="misi" class="form-label">Misi Desa *</label>
                    <textarea 
                        id="misi" 
                        name="misi" 
                        class="form-control @error('misi') is-invalid @enderror" 
                        placeholder="Contoh: Meningkatkan kualitas sumber daya manusia, mengoptimalkan potensi desa di bidang pertanian dan pariwisata, serta melestarikan adat dan budaya lokal."
                        required
                    >{{ old('misi', $village->misi ?? '') }}</textarea>
                    <div class="hint">Jelaskan misi atau cara pencapaian visi desa Anda (maksimal 1000 karakter)</div>
                    @error('misi')
                        <div style="color: #dc2626; font-size: 13px; margin-top: 6px;">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <button type="reset" class="btn-reset">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
