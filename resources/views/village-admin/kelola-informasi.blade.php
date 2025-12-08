<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengumuman - Admin Desa {{ $village->name }}</title>
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
        .main-content { margin-left:260px; padding:32px; min-height:100vh; transition:margin-left .3s; }

        .form-container { background:#fff; border-radius:12px; padding:24px 24px 32px; box-shadow:0 6px 18px rgba(14,30,60,0.04); border:1px solid #eef6fb; }
        .form-container h3 { font-size:18px; font-weight:700; color:#0f1724; margin-bottom:18px; display:flex; align-items:center; gap:10px; }
        .form-label { font-size:14px; font-weight:700; color:#334155; margin-bottom:6px; display:block; }
        .form-control { border:1px solid #cbd5e1; border-radius:10px; padding:10px 12px; font-size:14px; }
        .form-control:focus { border-color:#0b79b8; box-shadow:0 0 0 .15rem rgba(11,121,184,0.12); }
        textarea.form-control { min-height:120px; }
        .category-grid { display:grid; grid-template-columns: repeat(auto-fit, minmax(220px,1fr)); gap:10px; }
        .category-item { border:1px solid #dbe3ec; border-radius:10px; padding:10px 12px; display:flex; align-items:center; gap:10px; cursor:pointer; transition:all .15s; }
        .category-item input { display:none; }
        .category-item span { font-weight:600; color:#334155; font-size:14px; }
        .category-item:hover { border-color:#0b79b8; background:#f1f7ff; }
        .category-item input:checked + span { color:#0b79b8; }
        .hint { font-size:12px; color:#94a3b8; margin-top:4px; }
        .btn-primary-custom { background:#0b79b8; border:none; padding:10px 18px; border-radius:8px; font-weight:700; font-size:14px; }
        .btn-primary-custom:hover { background:#096598; }
        .btn-secondary-custom { background:#e2e8f0; border:1px solid #cbd5e1; color:#475569; padding:10px 18px; border-radius:8px; font-weight:600; font-size:14px; }
        .btn-secondary-custom:hover { background:#cbd5e1; }
        .two-col { display:grid; grid-template-columns: repeat(auto-fit, minmax(240px,1fr)); gap:14px; }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <i class="fas fa-building fa-3x"></i>
            <h5>Admin Desa</h5>
        </div>
        <ul class="sidebar-menu">
            <li><a href="{{ route('village-admin.dashboard') }}" class="{{ request()->routeIs('village-admin.dashboard') ? 'active' : '' }}"><i class="fas fa-home"></i> Beranda</a></li>
            <li><a href="{{ route('village-admin.kelola-informasi') }}" class="{{ request()->routeIs('village-admin.kelola-informasi') ? 'active' : '' }}"><i class="fas fa-bullhorn"></i> Kelola Pengumuman</a></li>
            <li><a href="{{ route('village-admin.visi-misi') }}" class="{{ request()->routeIs('village-admin.visi-misi') ? 'active' : '' }}"><i class="fas fa-lightbulb"></i> Visi & Misi</a></li>
            <li><a href="{{ route('village-admin.anggaran') }}" class="{{ request()->routeIs('village-admin.anggaran') ? 'active' : '' }}"><i class="fas fa-coins"></i> Anggaran</a></li>
        </ul>
        <div class="sidebar-footer">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="font-size: 14px;">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div style="margin-bottom:20px;">
            <h3 style="font-size:22px; font-weight:800; color:#0f1724; margin:0;">Kelola Pengumuman</h3>
            <p style="margin:6px 0 0 0; color:#64748b;">Tambah atau perbarui pengumuman untuk Desa {{ $village->name }}.</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="form-container">
            <h3><i class="fas fa-pen-fancy"></i> Buat Pengumuman Baru</h3>

            <form action="{{ route('village-admin.announcements.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Judul Pengumuman *</label>
                    <input type="text" name="title" class="form-control" placeholder="Contoh: Jadwal Vaksinasi COVID-19 Booster" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori Pengumuman *</label>
                    <div class="category-grid">
                        @php
                            $categories = [
                                'administrasi' => '📋 Administrasi & Layanan',
                                'bantuan' => '💰 Program & Bantuan Sosial',
                                'kegiatan' => '🎪 Kegiatan Desa',
                                'keuangan' => '💼 Keuangan & Transparansi',
                                'pembangunan' => '🏗️ Pembangunan & Infrastruktur',
                                'rekrutmen' => '👥 Rekrutmen & Lowongan',
                                'keamanan' => '🚨 Keamanan & Himbauan',
                                'kesehatan' => '🏥 Kesehatan & Kebersihan',
                            ];
                        @endphp
                        @foreach($categories as $value => $label)
                            <label class="category-item">
                                <input type="radio" name="category" value="{{ $value }}" required>
                                <span>{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                    <div class="hint">Pilih kategori yang sesuai untuk pengumuman ini</div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Isi Pengumuman / Deskripsi Lengkap *</label>
                    <textarea name="content" class="form-control" placeholder="Tulis konten pengumuman dengan jelas dan detail..." required></textarea>
                    <div class="hint">Jelaskan secara detail agar masyarakat dapat memahami dengan baik</div>
                </div>

                <div class="two-col">
                    <div class="mb-3">
                        <label class="form-label">Tanggal Diterbitkan *</label>
                        <input type="date" name="published_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Berlaku *</label>
                        <input type="date" name="effective_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Berakhir *</label>
                        <input type="date" name="end_date" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Lokasi / Tempat (Opsional)</label>
                    <input type="text" name="location" class="form-control" placeholder="Contoh: Balai Desa Meat, Kantor Kecamatan, dll">
                </div>

                <div class="mb-4">
                    <label class="form-label">Kontak / Informasi Lebih Lanjut (Opsional)</label>
                    <input type="text" name="contact" class="form-control" placeholder="Contoh: +62 812 3456 7890 atau email@desa.id">
                </div>

                <div style="display:flex; gap:10px;">
                    <button type="submit" class="btn btn-primary-custom">
                        <i class="fas fa-paper-plane me-1"></i> Publikasikan Pengumuman
                    </button>
                    <button type="reset" class="btn btn-secondary-custom">
                        <i class="fas fa-undo me-1"></i> Reset
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function selectType(button, type) {
            // Remove active class from all buttons
            document.querySelectorAll('.btn-custom').forEach(btn => {
                btn.classList.remove('active');
            });
            
            // Add active class to clicked button
            button.classList.add('active');
            
            // Set hidden input value
            document.getElementById('agendaType').value = type;
        }
    </script>
</body>
</html>
