<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Informasi - Admin Kabupaten</title>
    
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
        
        .page-header {
            margin-bottom: 1.5rem;
        }

        .page-header h1 {
            font-size: 1.75rem;
            font-weight: 600;
            color: #2d3e50;
            margin: 0;
        }

        /* Section Card */
        .section-card {
            background: white;
            border-radius: 6px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .section-header h2 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #2d3e50;
            margin: 0;
        }

        .section-subtitle {
            color: #666;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
        }

        /* Tabs */
        .custom-tabs {
            border-bottom: 1px solid #e0e0e0;
            margin-bottom: 1.5rem;
        }

        .custom-tabs .nav-link {
            color: #666;
            border: none;
            border-bottom: 2px solid transparent;
            padding: 0.75rem 1.5rem;
            font-size: 0.9rem;
            background: none;
        }

        .custom-tabs .nav-link.active {
            color: #2196F3;
            border-bottom-color: #2196F3;
            background: none;
        }

        /* News Item */
        .news-item {
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            padding: 1.25rem;
            margin-bottom: 1rem;
            background: white;
        }

        .news-category {
            display: inline-block;
            background: #f0f0f0;
            color: #666;
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.75rem;
            margin-bottom: 0.5rem;
        }

        .news-title {
            font-size: 1rem;
            font-weight: 600;
            color: #2d3e50;
            margin-bottom: 0.5rem;
        }

        .news-description {
            color: #666;
            font-size: 0.85rem;
            margin-bottom: 0.75rem;
        }

        .news-meta {
            display: flex;
            gap: 1rem;
            color: #999;
            font-size: 0.8rem;
        }

        .news-actions {
            margin-top: 0.75rem;
            display: flex;
            gap: 0.5rem;
        }

        .btn-icon {
            padding: 0.4rem 0.6rem;
            font-size: 0.85rem;
            border: 1px solid #ddd;
            background: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-icon:hover {
            background: #f5f5f5;
        }

        /* Calendar */
        .calendar {
            background: white;
        }

        .calendar-header {
            text-align: center;
            font-weight: 600;
            padding: 1rem;
            background: #f5f5f5;
            border-radius: 6px 6px 0 0;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 1px;
            background: #e0e0e0;
            border: 1px solid #e0e0e0;
        }

        .calendar-day-header {
            background: #f9f9f9;
            padding: 0.5rem;
            text-align: center;
            font-size: 0.8rem;
            font-weight: 600;
            color: #666;
        }

        .calendar-day {
            background: white;
            padding: 0.75rem;
            min-height: 60px;
            font-size: 0.85rem;
            position: relative;
        }

        .calendar-day.today {
            background: #e3f2fd;
        }

        .calendar-day.has-event {
            background: #f0f8ff;
        }

        .calendar-day .day-number {
            font-weight: 600;
            color: #333;
        }

        .event-dot {
            width: 6px;
            height: 6px;
            background: #10b981;
            border-radius: 50%;
            display: inline-block;
            margin-top: 4px;
        }

        /* Agenda Item */
        .agenda-item {
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        .agenda-category {
            display: inline-block;
            background: #e3f2fd;
            color: #1976d2;
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.75rem;
            margin-bottom: 0.5rem;
        }

        .agenda-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: #2d3e50;
            margin-bottom: 0.5rem;
        }

        .agenda-detail {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #666;
            font-size: 0.8rem;
            margin-bottom: 0.3rem;
        }

        .agenda-detail i {
            width: 16px;
            color: #999;
        }

        /* Budget Document */
        .budget-year {
            background: #f5f5f5;
            padding: 0.75rem 1rem;
            border-radius: 4px;
            font-weight: 600;
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .document-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            background: white;
        }

        .document-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .document-icon {
            font-size: 1.5rem;
            color: #2196F3;
        }

        .document-title {
            font-weight: 600;
            color: #2d3e50;
            font-size: 0.9rem;
        }

        .document-subtitle {
            color: #999;
            font-size: 0.8rem;
        }

        .document-actions {
            display: flex;
            gap: 0.5rem;
        }

        /* Buttons */
        .btn-primary {
            background-color: #2196F3;
            border: none;
            padding: 0.5rem 1.2rem;
            font-weight: 500;
            border-radius: 4px;
            font-size: 0.875rem;
        }

        .btn-primary:hover {
            background-color: #1976d2;
        }

        .btn-outline {
            background: white;
            border: 1px solid #2196F3;
            color: #2196F3;
            padding: 0.5rem 1.2rem;
            font-weight: 500;
            border-radius: 4px;
            font-size: 0.875rem;
        }

        .btn-outline:hover {
            background: #e3f2fd;
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
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Page Header -->
            <div class="page-header">
                <h1>Manajemen Informasi</h1>
            </div>

            <!-- Berita & Pengumuman Section -->
            <div class="section-card">
                <div class="section-header">
                    <div>
                        <h2>Apa yang Baru di Kabupaten Toba?</h2>
                        <p class="section-subtitle">Tetap update dengan berita terbaru dan pengumuman penting dari Pemerintah Kabupaten Toba</p>
                    </div>
                    <div style="display: flex; gap: 0.5rem;">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewsModal">
                            <i class="fas fa-plus me-2"></i> Tambah Berita
                        </button>
                        <button class="btn btn-outline" data-bs-toggle="modal" data-bs-target="#addAnnouncementModal">
                            <i class="fas fa-plus me-2"></i> Tambah Pengumuman
                        </button>
                    </div>
                </div>

                <!-- Tabs -->
                <ul class="nav custom-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#berita">
                            <i class="fas fa-newspaper me-2"></i> Berita
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#pengumuman">
                            <i class="fas fa-bullhorn me-2"></i> Pengumuman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#desa">
                            <i class="fas fa-map-marked-alt me-2"></i> Daftar Desa
                        </a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content">
                    <!-- Berita Tab -->
                    <div class="tab-pane fade show active" id="berita">
                        @forelse($news as $item)
                        <div class="news-item">
                            <span class="news-category">{{ $item->category }}</span>
                            <div class="news-title">{{ $item->title }}</div>
                            <div class="news-description">
                                {{ $item->excerpt }}
                            </div>
                            <div class="news-meta">
                                <span><i class="far fa-calendar me-1"></i> {{ $item->published_at->translatedFormat('d M Y') }}</span>
                                <span><i class="far fa-clock me-1"></i> {{ $item->published_at->format('H:i') }} WIB</span>
                            </div>
                            <div class="news-actions">
                                <button class="btn-icon" onclick="editNews({{ $item->id }}, '{{ $item->category }}', '{{ addslashes($item->title) }}', '{{ addslashes($item->excerpt) }}', `{{ addslashes($item->content) }}`, '{{ $item->published_at->format('Y-m-d\TH:i') }}')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('admin.information.news.delete', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-icon"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                        @empty
                        <p class="text-muted">Belum ada berita.</p>
                        @endforelse
                    </div>

                    <!-- Pengumuman Tab -->
                    <div class="tab-pane fade" id="pengumuman">
                        @forelse($announcements as $item)
                        <div class="news-item">
                            <div class="news-title">{{ $item->title }}</div>
                            <div class="news-description">
                                {{ Str::limit($item->content, 150) }}
                            </div>
                            <div class="news-meta">
                                <span><i class="far fa-calendar me-1"></i> {{ $item->published_at->translatedFormat('d M Y') }}</span>
                                <span><i class="far fa-clock me-1"></i> {{ $item->published_at->format('H:i') }} WIB</span>
                            </div>
                            <div class="news-actions">
                                <button class="btn-icon" onclick="editAnnouncement({{ $item->id }}, '{{ addslashes($item->title) }}', `{{ addslashes($item->content) }}`, '{{ $item->published_at->format('Y-m-d\TH:i') }}')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('admin.information.announcements.delete', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-icon"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                        @empty
                        <p class="text-muted">Belum ada pengumuman.</p>
                        @endforelse
                    </div>

                    <!-- Daftar Desa Tab -->
                    <div class="tab-pane fade" id="desa">
                        <div style="margin-bottom: 1rem; display: flex; justify-content: space-between; align-items: center;">
                            <h5 style="margin: 0;">Daftar Desa di Kabupaten Toba</h5>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVillageModal">
                                <i class="fas fa-plus me-2"></i> Tambah Desa
                            </button>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead style="background: #f8fafc;">
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th style="width: 10%">Gambar</th>
                                        <th style="width: 18%">Nama Desa</th>
                                        <th style="width: 12%">Populasi</th>
                                        <th style="width: 10%">Luas Area</th>
                                        <th style="width: 25%">Deskripsi</th>
                                        <th style="width: 20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($villages as $index => $village)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            @if($village->image)
                                                <img src="{{ asset('storage/' . $village->image) }}" alt="{{ $village->name }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;">
                                            @else
                                                <div style="width: 60px; height: 60px; background: #e9ecef; border-radius: 4px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fas fa-image text-muted"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td><strong>{{ $village->name }}</strong></td>
                                        <td>{{ number_format($village->population) }} jiwa</td>
                                        <td>{{ $village->area }} km²</td>
                                        <td>{{ Str::limit($village->description ?? '-', 50) }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" onclick="editVillage({{ $village->id }}, '{{ $village->name }}', {{ $village->population }}, {{ $village->area }}, '{{ addslashes($village->description ?? '') }}', '{{ $village->image ?? '' }}')">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <form action="{{ route('admin.villages.destroy', $village->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus desa {{ $village->name }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">Belum ada data desa</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Agenda Pemkot Section -->
            <div class="section-card">
                <div class="section-header">
                    <div>
                        <h2>Agenda Pemkab</h2>
                        <p class="section-subtitle">Transparansi kegiatan pemerintahan untuk membangun kepercayaan publik</p>
                    </div>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAgendaModal">
                        <i class="fas fa-plus me-2"></i> Tambah Agenda
                    </button>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <!-- Calendar -->
                        <div class="calendar">
                            @php
                                $currentDate = \Carbon\Carbon::now();
                                $year = $currentDate->year;
                                $month = $currentDate->month;
                                $monthName = $currentDate->translatedFormat('F Y');
                                
                                $firstDay = \Carbon\Carbon::create($year, $month, 1);
                                $daysInMonth = $firstDay->daysInMonth;
                                $startDayOfWeek = $firstDay->dayOfWeek;
                                
                                // Get agendas for this month
                                $agendaDates = isset($agendas) ? $agendas->pluck('event_date')->map(function($date) {
                                    return \Carbon\Carbon::parse($date)->format('Y-m-d');
                                })->toArray() : [];
                            @endphp
                            
                            <div class="calendar-header">{{ $monthName }}</div>
                            <div class="calendar-grid">
                                <div class="calendar-day-header">Min</div>
                                <div class="calendar-day-header">Sen</div>
                                <div class="calendar-day-header">Sel</div>
                                <div class="calendar-day-header">Rab</div>
                                <div class="calendar-day-header">Kam</div>
                                <div class="calendar-day-header">Jum</div>
                                <div class="calendar-day-header">Sab</div>
                                
                                @for($i = 0; $i < $startDayOfWeek; $i++)
                                    <div class="calendar-day"></div>
                                @endfor
                                
                                @for($day = 1; $day <= $daysInMonth; $day++)
                                    @php
                                        $dateStr = sprintf('%04d-%02d-%02d', $year, $month, $day);
                                        $isToday = $dateStr == $currentDate->format('Y-m-d');
                                        $hasEvent = in_array($dateStr, $agendaDates);
                                        $classes = 'calendar-day';
                                        if($isToday) $classes .= ' today';
                                        if($hasEvent) $classes .= ' has-event';
                                    @endphp
                                    <div class="{{ $classes }}" data-date="{{ $dateStr }}" style="cursor: pointer;">
                                        <span class="day-number">{{ $day }}</span>
                                        @if($hasEvent)
                                            <div class="event-dot"></div>
                                        @endif
                                    </div>
                                @endfor
                            </div>
                            <div class="mt-3 d-flex gap-3 justify-content-center" style="font-size: 0.8rem;">
                                <span><span class="event-dot"></span> Hari Ini</span>
                                <span style="color: #999;">Ada agenda</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <!-- Agenda List -->
                        @if($agendas && $agendas->count() > 0)
                            @foreach($agendas as $agenda)
                            <div class="agenda-item">
                                <span class="agenda-category">{{ $agenda->category ?? 'Umum' }}</span>
                                <div class="agenda-title">{{ $agenda->title }}</div>
                                <div class="agenda-detail">
                                    <i class="far fa-calendar"></i>
                                    <span>{{ \Carbon\Carbon::parse($agenda->event_date)->translatedFormat('d F Y') }}</span>
                                </div>
                                @if($agenda->time_start && $agenda->time_end)
                                <div class="agenda-detail">
                                    <i class="far fa-clock"></i>
                                    <span>{{ $agenda->time_start }} - {{ $agenda->time_end }} WIB</span>
                                </div>
                                @endif
                                @if($agenda->location)
                                <div class="agenda-detail">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>{{ $agenda->location }}</span>
                                </div>
                                @endif
                                @if($agenda->participants)
                                <div class="agenda-detail">
                                    <i class="fas fa-users"></i>
                                    <span>{{ $agenda->participants }}</span>
                                </div>
                                @endif
                                @if($agenda->status)
                                <div class="agenda-detail">
                                    <i class="fas fa-{{ $agenda->status == 'selesai' ? 'check-circle' : 'clock' }}"></i>
                                    <span style="color: {{ $agenda->status == 'selesai' ? '#28a745' : '#ffc107' }}; font-weight: 600;">
                                        {{ ucfirst($agenda->status) }}
                                    </span>
                                </div>
                                @endif
                                <div class="news-actions">
                                    <button type="button" class="btn-icon" onclick="editAgenda({{ $agenda->id }}, '{{ addslashes($agenda->title) }}', '{{ addslashes($agenda->description ?? '') }}', '{{ $agenda->event_date->format('Y-m-d') }}', '{{ $agenda->time_start }}', '{{ $agenda->time_end }}', '{{ addslashes($agenda->location ?? '') }}', '{{ addslashes($agenda->category ?? '') }}', '{{ addslashes($agenda->participants ?? '') }}', '{{ $agenda->status ?? 'mendatang' }}')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('admin.information.agendas.delete', $agenda->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus agenda ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-icon"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i> Belum ada agenda. Klik "Tambah Agenda" untuk menambahkan agenda baru.
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Anggaran Kabupaten Section -->
            <div class="section-card">
                <div class="section-header">
                    <div>
                        <h2>Anggaran Kabupaten</h2>
                        <p class="section-subtitle">Dokumen laporan realisasi anggaran Kabupaten tersedia untuk diunduh.</p>
                    </div>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadBudgetModal">
                        <i class="fas fa-upload me-2"></i> Upload File
                    </button>
                </div>

                @if($budgets->isEmpty())
                    <div class="alert alert-info">
                        Belum ada file anggaran yang diupload.
                    </div>
                @else
                    @php
                        $groupedBudgets = $budgets->groupBy('year');
                    @endphp
                    @foreach($groupedBudgets as $year => $yearBudgets)
                        <div class="budget-year">APBD {{ $year }}</div>
                        
                        @foreach($yearBudgets as $budget)
                            <div class="document-item">
                                <div class="document-info">
                                    <i class="fas fa-file-pdf document-icon"></i>
                                    <div>
                                        <div class="document-title">{{ $budget->title }}</div>
                                        <div class="document-subtitle">{{ $budget->file_name }} • {{ number_format($budget->file_size / 1024, 2) }} KB</div>
                                    </div>
                                </div>
                                <div class="document-actions">
                                    <a href="{{ Storage::url($budget->file_path) }}" class="btn btn-outline" download target="_blank">
                                        <i class="fas fa-download me-2"></i> Download
                                    </a>
                                    <form action="{{ route('admin.information.budgets.delete', $budget->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus file ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-icon"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <!-- Modal Tambah Berita -->
    <div class="modal fade" id="addNewsModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Berita Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.information.news.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <input type="text" class="form-control" name="category" placeholder="Contoh: Pendidikan, Teknologi, Kesehatan" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Publikasi</label>
                            <input type="datetime-local" class="form-control" name="published_at" value="{{ date('Y-m-d\TH:i') }}" required>
                            <small class="text-muted">Tanggal dan waktu publikasi berita</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Judul Berita</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ringkasan (Opsional)</label>
                            <textarea class="form-control" name="excerpt" rows="2" placeholder="Ringkasan singkat berita"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Konten Berita</label>
                            <textarea class="form-control" name="content" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Berita</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Berita -->
    <div class="modal fade" id="editNewsModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editNewsForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <input type="text" class="form-control" name="category" id="edit_news_category" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Publikasi</label>
                            <input type="datetime-local" class="form-control" name="published_at" id="edit_news_published_at" required>
                            <small class="text-muted">Tanggal dan waktu publikasi berita</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Judul Berita</label>
                            <input type="text" class="form-control" name="title" id="edit_news_title" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ringkasan</label>
                            <textarea class="form-control" name="excerpt" id="edit_news_excerpt" rows="2"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Konten Berita</label>
                            <textarea class="form-control" name="content" id="edit_news_content" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Update Berita</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Pengumuman -->
    <div class="modal fade" id="addAnnouncementModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pengumuman Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.information.announcements.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Tanggal Publikasi</label>
                            <input type="datetime-local" class="form-control" name="published_at" value="{{ date('Y-m-d\TH:i') }}" required>
                            <small class="text-muted">Tanggal dan waktu publikasi pengumuman</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Judul Pengumuman</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Isi Pengumuman</label>
                            <textarea class="form-control" name="content" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Pengumuman</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Pengumuman -->
    <div class="modal fade" id="editAnnouncementModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Pengumuman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editAnnouncementForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Tanggal Publikasi</label>
                            <input type="datetime-local" class="form-control" name="published_at" id="edit_announcement_published_at" required>
                            <small class="text-muted">Tanggal dan waktu publikasi pengumuman</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Judul Pengumuman</label>
                            <input type="text" class="form-control" name="title" id="edit_announcement_title" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Isi Pengumuman</label>
                            <textarea class="form-control" name="content" id="edit_announcement_content" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Update Pengumuman</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Agenda -->
    <div class="modal fade" id="addAgendaModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Agenda Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.information.agendas.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Judul Agenda *</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Agenda *</label>
                                <input type="date" class="form-control" name="event_date" id="add_event_date" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kategori</label>
                                <input type="text" class="form-control" name="category" placeholder="Rapat, Dialog Publik, dll">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Waktu Mulai</label>
                                <input type="time" class="form-control" name="time_start">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Waktu Selesai</label>
                                <input type="time" class="form-control" name="time_end">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lokasi</label>
                            <input type="text" class="form-control" name="location" placeholder="Balai Kabupaten, dll">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Peserta/Undangan</label>
                            <input type="text" class="form-control" name="participants" placeholder="Kepala Dinas, Masyarakat, dll">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status Agenda</label>
                            <select class="form-control" name="status">
                                <option value="mendatang">Mendatang</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Agenda</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Agenda -->
    <div class="modal fade" id="editAgendaModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Agenda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editAgendaForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Judul Agenda *</label>
                            <input type="text" class="form-control" name="title" id="edit_agenda_title" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="description" id="edit_agenda_description" rows="3"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Agenda *</label>
                                <input type="date" class="form-control" name="event_date" id="edit_event_date" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kategori</label>
                                <input type="text" class="form-control" name="category" id="edit_agenda_category">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Waktu Mulai</label>
                                <input type="time" class="form-control" name="time_start" id="edit_time_start">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Waktu Selesai</label>
                                <input type="time" class="form-control" name="time_end" id="edit_time_end">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lokasi</label>
                            <input type="text" class="form-control" name="location" id="edit_agenda_location">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Peserta/Undangan</label>
                            <input type="text" class="form-control" name="participants" id="edit_agenda_participants">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status Agenda</label>
                            <select class="form-control" name="status" id="edit_agenda_status">
                                <option value="mendatang">Mendatang</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Update Agenda</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Upload Budget -->
    <div class="modal fade" id="uploadBudgetModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload File Anggaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.information.budgets.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Judul Dokumen</label>
                            <input type="text" class="form-control" name="title" placeholder="Contoh: Lampiran APBD 2025" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun Anggaran</label>
                            <input type="text" class="form-control" name="year" placeholder="Contoh: 2025" required maxlength="4">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">File PDF</label>
                            <input type="file" class="form-control" name="budget_file" accept=".pdf" required>
                            <div class="form-text">Maksimal 10MB, format PDF</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi (Opsional)</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Deskripsi dokumen..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Desa -->
    <div class="modal fade" id="addVillageModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Desa Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.villages.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Desa</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Populasi (jiwa)</label>
                            <input type="number" class="form-control" name="population" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Luas Area (km²)</label>
                            <input type="number" step="0.01" class="form-control" name="area" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar Desa (opsional)</label>
                            <input type="file" class="form-control" name="image" accept="image/*">
                            <small class="text-muted">Format: JPG, PNG, GIF. Maksimal 2MB</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Desa -->
    <div class="modal fade" id="editVillageModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Desa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editVillageForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Desa</label>
                            <input type="text" class="form-control" name="name" id="edit_village_name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Populasi (jiwa)</label>
                            <input type="number" class="form-control" name="population" id="edit_village_population" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Luas Area (km²)</label>
                            <input type="number" step="0.01" class="form-control" name="area" id="edit_village_area" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="description" id="edit_village_description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar Desa Baru (opsional)</label>
                            <input type="file" class="form-control" name="image" id="edit_village_image" accept="image/*">
                            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar. Format: JPG, PNG, GIF. Maksimal 2MB</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function editNews(id, category, title, excerpt, content, publishedAt) {
            document.getElementById('editNewsForm').action = `/admin/information/news/${id}`;
            document.getElementById('edit_news_category').value = category;
            document.getElementById('edit_news_published_at').value = publishedAt;
            document.getElementById('edit_news_title').value = title;
            document.getElementById('edit_news_excerpt').value = excerpt || '';
            document.getElementById('edit_news_content').value = content;
            new bootstrap.Modal(document.getElementById('editNewsModal')).show();
        }

        function editAnnouncement(id, title, content, publishedAt) {
            document.getElementById('editAnnouncementForm').action = `/admin/information/announcements/${id}`;
            document.getElementById('edit_announcement_published_at').value = publishedAt;
            document.getElementById('edit_announcement_title').value = title;
            document.getElementById('edit_announcement_content').value = content;
            new bootstrap.Modal(document.getElementById('editAnnouncementModal')).show();
        }

        function editAgenda(id, title, description, eventDate, timeStart, timeEnd, location, category, participants, status) {
            console.log('Edit agenda called with:', {id, title, eventDate});
            document.getElementById('editAgendaForm').action = `/admin/information/agendas/${id}`;
            document.getElementById('edit_agenda_title').value = title;
            document.getElementById('edit_agenda_description').value = description || '';
            document.getElementById('edit_event_date').value = eventDate;
            document.getElementById('edit_time_start').value = timeStart || '';
            document.getElementById('edit_time_end').value = timeEnd || '';
            document.getElementById('edit_agenda_location').value = location || '';
            document.getElementById('edit_agenda_category').value = category || '';
            document.getElementById('edit_agenda_participants').value = participants || '';
            document.getElementById('edit_agenda_status').value = status || 'mendatang';
            new bootstrap.Modal(document.getElementById('editAgendaModal')).show();
        }

        function editVillage(id, name, population, area, description, image) {
            document.getElementById('editVillageForm').action = `/admin/villages/${id}`;
            document.getElementById('edit_village_name').value = name;
            document.getElementById('edit_village_population').value = population;
            document.getElementById('edit_village_area').value = area;
            document.getElementById('edit_village_description').value = description || '';
            // Clear file input - user needs to select new file if they want to change it
            document.getElementById('edit_village_image').value = '';
            new bootstrap.Modal(document.getElementById('editVillageModal')).show();
        }

        // Calendar click handler - untuk klik tanggal di kalender
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded');
            
            const calendarDays = document.querySelectorAll('.calendar-day');
            console.log('Found calendar days:', calendarDays.length);
            
            calendarDays.forEach(day => {
                day.addEventListener('click', function() {
                    const dateStr = this.dataset.date;
                    console.log('Calendar day clicked, date:', dateStr);
                    if (dateStr) {
                        // Set tanggal di form tambah agenda
                        document.getElementById('add_event_date').value = dateStr;
                        // Buka modal
                        const modal = document.getElementById('addAgendaModal');
                        if (modal) {
                            new bootstrap.Modal(modal).show();
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>