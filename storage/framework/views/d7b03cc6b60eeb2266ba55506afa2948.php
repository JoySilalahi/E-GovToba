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
                <a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>">
                    <i class="fas fa-home"></i> Beranda
                </a>
                <a class="nav-link" href="<?php echo e(route('admin.information.index')); ?>">
                    <i class="fas fa-info-circle"></i> Manajemen Informasi
                </a>
            </nav>
        </div>
        
        <div class="sidebar-footer">
            <form action="<?php echo e(route('logout')); ?>" method="POST">
                <?php echo csrf_field(); ?>
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
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i><?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0 mt-2">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

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
                </ul>

                <!-- Tab Content -->
                <div class="tab-content">
                    <!-- Berita Tab -->
                    <div class="tab-pane fade show active" id="berita">
                        <?php $__empty_1 = true; $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="news-item">
                            <span class="news-category"><?php echo e($item->category); ?></span>
                            <div class="news-title"><?php echo e($item->title); ?></div>
                            <div class="news-description">
                                <?php echo e($item->excerpt); ?>

                            </div>
                            <div class="news-meta">
                                <span><i class="far fa-calendar me-1"></i> <?php echo e($item->published_at->translatedFormat('d M Y')); ?></span>
                                <span><i class="far fa-clock me-1"></i> <?php echo e($item->published_at->format('H:i')); ?> WIB</span>
                            </div>
                            <div class="news-actions">
                                <button class="btn-icon" onclick="editNews(<?php echo e($item->id); ?>, '<?php echo e($item->category); ?>', '<?php echo e(addslashes($item->title)); ?>', '<?php echo e(addslashes($item->excerpt)); ?>', `<?php echo e(addslashes($item->content)); ?>`, '<?php echo e($item->published_at->format('Y-m-d\TH:i')); ?>')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="<?php echo e(route('admin.information.news.delete', $item->id)); ?>" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn-icon"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-muted">Belum ada berita.</p>
                        <?php endif; ?>
                    </div>

                    <!-- Pengumuman Tab -->
                    <div class="tab-pane fade" id="pengumuman">
                        <?php $__empty_1 = true; $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="news-item">
                            <div class="news-title"><?php echo e($item->title); ?></div>
                            <div class="news-description">
                                <?php echo e(Str::limit($item->content, 150)); ?>

                            </div>
                            <div class="news-meta">
                                <span><i class="far fa-calendar me-1"></i> <?php echo e($item->published_at->translatedFormat('d M Y')); ?></span>
                                <span><i class="far fa-clock me-1"></i> <?php echo e($item->published_at->format('H:i')); ?> WIB</span>
                            </div>
                            <div class="news-actions">
                                <button class="btn-icon" onclick="editAnnouncement(<?php echo e($item->id); ?>, '<?php echo e(addslashes($item->title)); ?>', `<?php echo e(addslashes($item->content)); ?>`, '<?php echo e($item->published_at->format('Y-m-d\TH:i')); ?>')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="<?php echo e(route('admin.information.announcements.delete', $item->id)); ?>" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn-icon"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-muted">Belum ada pengumuman.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Agenda Pemkot Section -->
            <div class="section-card">
                <div class="section-header">
                    <div>
                        <h2>Agenda Pemkot</h2>
                        <p class="section-subtitle">Transparansi kegiatan pemerintahan untuk membangun kepercayaan publik</p>
                    </div>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAgendaModal" onclick="console.log('Button clicked'); console.log('Modal element:', document.getElementById('addAgendaModal'));">
                        <i class="fas fa-plus me-2"></i> Tambah Agenda
                    </button>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <!-- Calendar -->
                        <div class="calendar">
                            <?php
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
                            ?>
                            
                            <div class="calendar-header"><?php echo e($monthName); ?></div>
                            <div class="calendar-grid">
                                <div class="calendar-day-header">Min</div>
                                <div class="calendar-day-header">Sen</div>
                                <div class="calendar-day-header">Sel</div>
                                <div class="calendar-day-header">Rab</div>
                                <div class="calendar-day-header">Kam</div>
                                <div class="calendar-day-header">Jum</div>
                                <div class="calendar-day-header">Sab</div>
                                
                                <?php for($i = 0; $i < $startDayOfWeek; $i++): ?>
                                    <div class="calendar-day"></div>
                                <?php endfor; ?>
                                
                                <?php for($day = 1; $day <= $daysInMonth; $day++): ?>
                                    <?php
                                        $dateStr = sprintf('%04d-%02d-%02d', $year, $month, $day);
                                        $isToday = $dateStr == $currentDate->format('Y-m-d');
                                        $hasEvent = in_array($dateStr, $agendaDates);
                                        $classes = 'calendar-day';
                                        if($isToday) $classes .= ' today';
                                        if($hasEvent) $classes .= ' has-event';
                                    ?>
                                    <div class="<?php echo e($classes); ?>" data-date="<?php echo e($dateStr); ?>" style="cursor: pointer;">
                                        <span class="day-number"><?php echo e($day); ?></span>
                                        <?php if($hasEvent): ?>
                                            <div class="event-dot"></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endfor; ?>
                            </div>
                            <div class="mt-3 d-flex gap-3 justify-content-center" style="font-size: 0.8rem;">
                                <span><span class="event-dot"></span> Hari Ini</span>
                                <span style="color: #999;">Ada agenda</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <!-- Agenda List -->
                        <?php if($agendas && $agendas->count() > 0): ?>
                            <?php $__currentLoopData = $agendas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agenda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="agenda-item">
                                <span class="agenda-category"><?php echo e($agenda->category ?? 'Umum'); ?></span>
                                <div class="agenda-title"><?php echo e($agenda->title); ?></div>
                                <div class="agenda-detail">
                                    <i class="far fa-calendar"></i>
                                    <span><?php echo e(\Carbon\Carbon::parse($agenda->event_date)->translatedFormat('d F Y')); ?></span>
                                </div>
                                <?php if($agenda->time_start && $agenda->time_end): ?>
                                <div class="agenda-detail">
                                    <i class="far fa-clock"></i>
                                    <span><?php echo e($agenda->time_start); ?> - <?php echo e($agenda->time_end); ?> WIB</span>
                                </div>
                                <?php endif; ?>
                                <?php if($agenda->location): ?>
                                <div class="agenda-detail">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span><?php echo e($agenda->location); ?></span>
                                </div>
                                <?php endif; ?>
                                <?php if($agenda->participants): ?>
                                <div class="agenda-detail">
                                    <i class="fas fa-users"></i>
                                    <span><?php echo e($agenda->participants); ?></span>
                                </div>
                                <?php endif; ?>
                                <div class="news-actions">
                                    <button type="button" class="btn-icon" onclick="editAgenda(<?php echo e($agenda->id); ?>, '<?php echo e(addslashes($agenda->title)); ?>', '<?php echo e(addslashes($agenda->description ?? '')); ?>', '<?php echo e($agenda->event_date->format('Y-m-d')); ?>', '<?php echo e($agenda->time_start); ?>', '<?php echo e($agenda->time_end); ?>', '<?php echo e(addslashes($agenda->location ?? '')); ?>', '<?php echo e(addslashes($agenda->category ?? '')); ?>', '<?php echo e(addslashes($agenda->participants ?? '')); ?>')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="<?php echo e(route('admin.information.agendas.delete', $agenda->id)); ?>" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus agenda ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn-icon"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i> Belum ada agenda. Klik "Tambah Agenda" untuk menambahkan agenda baru.
                            </div>
                        <?php endif; ?>
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

                <?php if($budgets->isEmpty()): ?>
                    <div class="alert alert-info">
                        Belum ada file anggaran yang diupload.
                    </div>
                <?php else: ?>
                    <?php
                        $groupedBudgets = $budgets->groupBy('year');
                    ?>
                    <?php $__currentLoopData = $groupedBudgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year => $yearBudgets): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="budget-year">APBD <?php echo e($year); ?></div>
                        
                        <?php $__currentLoopData = $yearBudgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $budget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="document-item">
                                <div class="document-info">
                                    <i class="fas fa-file-pdf document-icon"></i>
                                    <div>
                                        <div class="document-title"><?php echo e($budget->title); ?></div>
                                        <div class="document-subtitle"><?php echo e($budget->file_name); ?> • <?php echo e(number_format($budget->file_size / 1024, 2)); ?> KB</div>
                                    </div>
                                </div>
                                <div class="document-actions">
                                    <a href="<?php echo e(Storage::url($budget->file_path)); ?>" class="btn btn-outline" download target="_blank">
                                        <i class="fas fa-download me-2"></i> Download
                                    </a>
                                    <form action="<?php echo e(route('admin.information.budgets.delete', $budget->id)); ?>" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus file ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn-icon"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
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
                <form action="<?php echo e(route('admin.information.news.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <input type="text" class="form-control" name="category" placeholder="Contoh: Pendidikan, Teknologi, Kesehatan" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Publikasi</label>
                            <input type="datetime-local" class="form-control" name="published_at" value="<?php echo e(date('Y-m-d\TH:i')); ?>" required>
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
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
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
                <form action="<?php echo e(route('admin.information.announcements.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Tanggal Publikasi</label>
                            <input type="datetime-local" class="form-control" name="published_at" value="<?php echo e(date('Y-m-d\TH:i')); ?>" required>
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
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
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
                            <textarea class="form-control" name="content" id="edit_announcement_content" rows="5" required>
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
                <form action="<?php echo e(route('admin.information.agendas.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
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
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
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
                <form action="<?php echo e(route('admin.information.budgets.upload')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
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

        function editAgenda(id, title, description, eventDate, timeStart, timeEnd, location, category, participants) {
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
            new bootstrap.Modal(document.getElementById('editAgendaModal')).show();
        }

        // Calendar click handler - untuk klik tanggal di kalender
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded, setting up event listeners');
            
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
                        new bootstrap.Modal(document.getElementById('addAgendaModal')).show();
                    }
                });
            });

            // Tambah event listener untuk form submit debugging
            const addAgendaForm = document.querySelector('#addAgendaModal form');
            if (addAgendaForm) {
                addAgendaForm.addEventListener('submit', function(e) {
                    console.log('Form tambah agenda submitted');
                    console.log('Form data:', new FormData(this));
                });
            }
        });
    </script>
</body>
</html>
<?php /**PATH C:\Users\ASUS\Documents\E-GovToba\resources\views/admin/information/index.blade.php ENDPATH**/ ?>