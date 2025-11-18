<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Desa {{ $village->name }}</title>
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
            background-color: #f5f7fa;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background: linear-gradient(180deg, #1e3a8a 0%, #1e40af 100%);
            color: white;
            overflow-y: auto;
            z-index: 1000;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-header h5 {
            margin: 10px 0 0 0;
            font-size: 16px;
            font-weight: 600;
        }

        .sidebar-menu {
            list-style: none;
            padding: 20px 0;
        }

        .sidebar-menu li {
            margin: 5px 0;
        }

        .sidebar-menu a {
            display: block;
            padding: 12px 20px;
            color: rgba(255,255,255,0.9);
            text-decoration: none;
            transition: all 0.3s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: rgba(255,255,255,0.1);
            color: white;
            border-left: 4px solid #60a5fa;
        }

        .sidebar-menu i {
            width: 20px;
            margin-right: 10px;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            min-height: 100vh;
        }

        .header-welcome {
            background: white;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .header-welcome h4 {
            color: #1e3a8a;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .header-welcome p {
            color: #64748b;
            margin: 0;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            height: 100%;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .stat-card h6 {
            color: #64748b;
            font-size: 14px;
            margin: 15px 0 5px 0;
        }

        .stat-card h3 {
            color: #1e293b;
            font-weight: 700;
            margin: 0;
        }

        .content-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            height: 100%;
        }

        .content-card h5 {
            color: #1e293b;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f1f5f9;
        }

        .visi-misi-text {
            line-height: 1.8;
            color: #475569;
        }

        .visi-label {
            font-weight: 600;
            color: #1e3a8a;
            margin-bottom: 10px;
        }

        .misi-label {
            font-weight: 600;
            color: #059669;
            margin-bottom: 10px;
            margin-top: 20px;
        }

        .edit-btn {
            margin-top: 20px;
        }

        .agenda-item {
            padding: 15px;
            border-left: 4px solid #e5e7eb;
            margin-bottom: 15px;
            background: #f9fafb;
            border-radius: 0 8px 8px 0;
            transition: all 0.3s;
        }

        .agenda-item:hover {
            border-left-color: #3b82f6;
            background: #eff6ff;
        }

        .agenda-date {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #64748b;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .agenda-title {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 5px;
        }

        .agenda-status {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-progress {
            background: #dbeafe;
            color: #1e40af;
        }

        .status-done {
            background: #d1fae5;
            color: #065f46;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 0;
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
            <i class="fas fa-building fa-3x"></i>
            <h5>Admin Desa Beranda</h5>
        </div>
        <ul class="sidebar-menu">
            <li><a href="{{ route('village-admin.dashboard') }}" class="active"><i class="fas fa-home"></i> Admin Desa</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Beranda</a></li>
            <li><a href="#"><i class="fas fa-list"></i> Kirim Pengumuman</a></li>
            <li><a href="{{ route('village-admin.kelola-informasi') }}"><i class="fas fa-info-circle"></i> Kelola Informasi</a></li>
            <li><a href="{{ route('village-admin.anggaran') }}"><i class="fas fa-chart-bar"></i> Anggaran</a></li>
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
        <!-- Welcome Header -->
        <div class="header-welcome">
            <h4>Selamat Datang, Admin Desa {{ $village->name }} !</h4>
            <p><i class="fas fa-calendar-alt"></i> {{ now()->isoFormat('dddd, D MMMM YYYY') }}</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4 mb-4">
            <!-- Visi & Misi -->
            <div class="col-lg-8">
                <div class="content-card">
                    <h5><i class="fas fa-bullseye"></i> Visi & Misi</h5>
                    
                    <div class="visi-label">Visi</div>
                    <div class="visi-misi-text">
                        @if($village->visi)
                            {{ $village->visi }}
                        @else
                            <span style="color: #94a3b8; font-style: italic;">Belum ada visi yang ditetapkan</span>
                        @endif
                    </div>

                    <div class="misi-label">Misi</div>
                    <div class="visi-misi-text">
                        @if($village->misi)
                            {{ $village->misi }}
                        @else
                            <span style="color: #94a3b8; font-style: italic;">Belum ada misi yang ditetapkan</span>
                        @endif
                    </div>

                    <button type="button" class="btn btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#editVisiMisiModal">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                </div>

                <!-- Statistics Cards -->
                <div class="row g-3 mt-0">
                    <div class="col-md-4">
                        <div class="stat-card">
                            <div class="stat-icon" style="background: #dbeafe; color: #1e40af;">
                                <i class="fas fa-users"></i>
                            </div>
                            <h6>Total Penduduk</h6>
                            <h3>{{ number_format($village->population ?? 900) }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-card">
                            <div class="stat-icon" style="background: #d1fae5; color: #059669;">
                                <i class="fas fa-map"></i>
                            </div>
                            <h6>Luas Area</h6>
                            <h3>{{ $village->area ?? '15.2' }} <small style="font-size: 16px;">km²</small></h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-card">
                            <div class="stat-icon" style="background: #fef3c7; color: #92400e;">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            <h6>Permohonan</h6>
                            <h3>{{ $stats['pending_requests'] ?? 0 }}</h3>
                        </div>
                    </div>
                </div>

                <!-- Pengumuman Aktif Section -->
                <div class="content-card mt-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 style="margin: 0;"><i class="fas fa-bullhorn" style="color: #0ea5e9;"></i> Pengumuman Aktif</h5>
                        <a href="{{ route('village-admin.kelola-informasi') }}" class="text-primary text-decoration-none" style="font-size: 14px;">
                            Edit <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>

                    @forelse($announcements as $announcement)
                    <div style="background: white; border-radius: 8px; padding: 20px; margin-bottom: 15px; border-left: 4px solid #0ea5e9; position: relative;">
                        <div class="d-flex justify-content-between align-items-start" style="gap: 12px;">
                            <h6 style="color: #1e293b; font-weight: 600; margin-bottom: 8px;">
                                {{ $announcement->title }}
                            </h6>
                            <a href="#" class="text-primary btn-edit-announcement" style="font-size:13px;" data-announcement='@json($announcement)'>
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </div>
                        <p style="color: #64748b; font-size: 14px; margin-bottom: 10px; line-height: 1.6;">
                            {{ Str::limit($announcement->content, 150) }}
                        </p>
                        <div style="display: flex; gap: 15px; align-items: center;">
                            <span style="font-size: 13px; color: #94a3b8;">
                                <i class="far fa-calendar"></i> {{ $announcement->date->format('d M Y') }}
                            </span>
                            <span class="badge" style="background: 
                                @if($announcement->type == 'meeting') #3b82f6
                                @elseif($announcement->type == 'program') #10b981
                                @else #f59e0b
                                @endif; 
                                font-size: 11px; padding: 4px 10px;">
                                {{ ucfirst($announcement->type) }}
                            </span>
                        </div>
                    </div>
                    @empty
                    <div style="text-align: center; padding: 40px 20px; color: #94a3b8;">
                        <i class="fas fa-inbox fa-3x" style="opacity: 0.3; margin-bottom: 15px;"></i>
                        <p style="margin: 0; font-style: italic;">Belum ada pengumuman aktif</p>
                        <a href="{{ route('village-admin.kelola-informasi') }}" class="btn btn-sm btn-primary mt-3">
                            <i class="fas fa-plus"></i> Buat Pengumuman
                        </a>
                    </div>
                    @endforelse

                    @if($announcements->count() > 0)
                    <div class="text-center mt-3">
                        <a href="{{ route('village-admin.kelola-informasi') }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah Pengumuman Baru
                        </a>
                    </div>
                    @endif
                </div>
            </div>

                <!-- Edit Announcement Modal -->
                <div class="modal fade" id="editAnnouncementModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form id="editAnnouncementForm" method="POST" action="#">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Pengumuman</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id" id="edit-announcement-id">
                                    <div class="mb-3">
                                        <label class="form-label">Judul</label>
                                        <input type="text" name="title" id="edit-announcement-title" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal</label>
                                        <input type="date" name="date" id="edit-announcement-date" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jenis</label>
                                        <select name="type" id="edit-announcement-type" class="form-select">
                                            <option value="meeting">Meeting</option>
                                            <option value="program">Program</option>
                                            <option value="evaluasi">Evaluasi</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" id="edit-announcement-status" class="form-select">
                                            <option value="pending">Pending</option>
                                            <option value="progress">Progress</option>
                                            <option value="done">Done</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi</label>
                                        <textarea name="content" id="edit-announcement-content" class="form-control" rows="5" required></textarea>
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

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Initialize Bootstrap modal instance
                        var modalEl = document.getElementById('editAnnouncementModal');
                        if (!modalEl) return;
                        var bsModal = new bootstrap.Modal(modalEl);

                        document.querySelectorAll('.btn-edit-announcement').forEach(function(btn) {
                            btn.addEventListener('click', function(e) {
                                e.preventDefault();
                                var raw = btn.getAttribute('data-announcement');
                                if (!raw) return;
                                try {
                                    var data = JSON.parse(raw);
                                } catch (err) { return; }

                                document.getElementById('edit-announcement-id').value = data.id || '';
                                document.getElementById('edit-announcement-title').value = data.title || '';
                                document.getElementById('edit-announcement-content').value = data.content || '';
                                var d = (data.date) ? data.date.split('T')[0] : '';
                                document.getElementById('edit-announcement-date').value = d;
                                document.getElementById('edit-announcement-type').value = data.type || 'meeting';
                                document.getElementById('edit-announcement-status').value = data.status || 'pending';

                                var form = document.getElementById('editAnnouncementForm');
                                form.action = '/village-admin/announcements/' + (data.id || '');

                                bsModal.show();
                            });
                        });
                    });
                </script>

            <!-- Agenda Monitoring -->
            <div class="col-lg-4">
                <div class="content-card">
                    <h5><i class="far fa-calendar-check"></i> Agenda Monitoring</h5>

                    @forelse($announcements->take(3) as $announcement)
                    <div class="agenda-item">
                        <div class="agenda-date">
                            <i class="far fa-calendar"></i>
                            <span>{{ $announcement->title }}</span>
                        </div>
                        <div class="agenda-title">{{ $announcement->date->format('d F Y') }}</div>
                        <span class="agenda-status status-{{ $announcement->status }}">
                            {{ ucfirst($announcement->status) }}
                        </span>
                        <div class="mt-2">
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editAnnouncementModal{{ $announcement->id }}">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <form action="{{ route('village-admin.announcements.delete', $announcement->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <p style="color: #94a3b8; font-style: italic; text-align: center; padding: 20px;">
                        Belum ada pengumuman
                    </p>
                    @endforelse

                    <button type="button" class="btn btn-primary w-100 mt-3" data-bs-toggle="modal" data-bs-target="#createAnnouncementModal">
                        <i class="fas fa-plus"></i> Buat Pengumuman Baru
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Buat Pengumuman Baru -->
    <div class="modal fade" id="createAnnouncementModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('village-admin.announcements.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="fas fa-plus-circle"></i> Buat Pengumuman Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Judul</label>
                            <input type="text" name="title" class="form-control" placeholder="Masukkan judul pengumuman..." required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Isi Pengumuman</label>
                            <textarea name="content" class="form-control" rows="4" placeholder="Masukkan isi pengumuman..." required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tanggal</label>
                            <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="pending">Pending</option>
                                <option value="progress">Progress</option>
                                <option value="done">Done</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach($announcements as $announcement)
    <!-- Modal Edit Pengumuman -->
    <div class="modal fade" id="editAnnouncementModal{{ $announcement->id }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('village-admin.announcements.update', $announcement->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Pengumuman</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Judul</label>
                            <input type="text" name="title" class="form-control" value="{{ $announcement->title }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Isi Pengumuman</label>
                            <textarea name="content" class="form-control" rows="4" required>{{ $announcement->content }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tanggal</label>
                            <input type="date" name="date" class="form-control" value="{{ $announcement->date->format('Y-m-d') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="pending" {{ $announcement->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="progress" {{ $announcement->status == 'progress' ? 'selected' : '' }}>Progress</option>
                                <option value="done" {{ $announcement->status == 'done' ? 'selected' : '' }}>Done</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Modal Edit Visi & Misi -->
    <div class="modal fade" id="editVisiMisiModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('village-admin.visi-misi.update') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Visi & Misi Desa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Visi Desa</label>
                            <textarea name="visi" class="form-control" rows="4" placeholder="Masukkan visi desa..." required>{{ $village->visi }}</textarea>
                            <small class="text-muted">Contoh: Mewujudkan Desa yang Mandiri, Sejahtera dan Berbudaya</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Misi Desa</label>
                            <textarea name="misi" class="form-control" rows="6" placeholder="Masukkan misi desa..." required>{{ $village->misi }}</textarea>
                            <small class="text-muted">Pisahkan setiap misi dengan enter (baris baru)</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
