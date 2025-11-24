<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Kabupaten</title>
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
        }

        .bupati-card p {
            font-size: 12px;
            color: #7f8c8d;
            margin: 0;
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
            <li><a href="<?php echo e(route('admin.dashboard')); ?>" class="active"><i class="fas fa-home"></i> Beranda</a></li>
            <li><a href="<?php echo e(route('admin.information.index')); ?>"><i class="fas fa-info-circle"></i> Manajemen Informasi</a></li>
        </ul>

        <div class="sidebar-footer">
            <ul class="sidebar-menu">
                <li>
                    <form action="<?php echo e(route('logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
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

        <!-- Visi & Misi -->
        <div class="visi-misi-card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h3 style="margin: 0; font-size: 18px; font-weight: 600; color: #2c3e50;">Visi & Misi</h3>
                <a href="<?php echo e(route('admin.information.index')); ?>" class="edit-btn" style="text-decoration: none;">
                    <i class="fas fa-edit"></i> Edit
                </a>
            </div>

            <div class="visi-section">
                <h4>Visi :</h4>
                <p><?php echo e($district->visi ?? 'Toba Unggul dan Bersinar'); ?></p>
            </div>

            <div class="misi-section">
                <h4>Misi :</h4>
                <p><?php echo e($district->misi ?? 'Meningkatkan kualitas sumber daya manusia yang andal dan berbudaya, mempercepat pembangunan infrastruktur, serta mewujudkan reformasi birokrasi yang bersih dan melayani.'); ?></p>
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
                    
                    <?php if($district && $district->documentation_file): ?>
                        <div class="alert alert-info" style="background: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb; border-radius: 8px; padding: 12px; margin-bottom: 15px; font-size: 14px;">
                            <i class="fas fa-file-alt me-2"></i>
                            File saat ini: <strong><?php echo e(basename($district->documentation_file)); ?></strong>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('admin.information.upload-documentation')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
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
                    
                    <form action="<?php echo e(route('admin.information.upload-photo')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
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

                    <?php if($district && $district->photos && $district->photos->count() > 0): ?>
                        <div style="margin-top: 30px;">
                            <h6 style="font-size: 15px; font-weight: 600; color: #2c3e50; margin-bottom: 15px;">Foto yang Sudah Diupload (<?php echo e($district->photos->count()); ?>)</h6>
                            
                            <div style="position: relative;">
                                <!-- Scroll Container -->
                                <div id="photoGallery" style="display: flex; gap: 15px; overflow-x: auto; scroll-behavior: smooth; padding: 10px 0; scrollbar-width: thin;">
                                    <?php $__currentLoopData = $district->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div style="min-width: 200px; flex-shrink: 0; background: #f8f9fa; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                            <img src="<?php echo e(asset('storage/' . $photo->photo_path)); ?>" alt="<?php echo e($photo->title ?? 'Dokumentasi'); ?>" style="width: 100%; height: 150px; object-fit: cover;">
                                            <div style="padding: 10px;">
                                                <?php if($photo->title): ?>
                                                    <p style="font-size: 12px; font-weight: 500; color: #2c3e50; margin: 0 0 8px 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo e($photo->title); ?></p>
                                                <?php endif; ?>
                                                <form action="<?php echo e(route('admin.information.delete-photo', $photo->id)); ?>" method="POST" onsubmit="return confirm('Yakin ingin menghapus foto ini?');">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" style="background: #e74c3c; color: white; border: none; padding: 6px 12px; border-radius: 4px; font-size: 11px; cursor: pointer; width: 100%; transition: all 0.3s;" onmouseover="this.style.background='#c0392b'" onmouseout="this.style.background='#e74c3c'">
                                                        <i class="fas fa-trash-alt me-1"></i>Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <!-- Navigation Arrows -->
                                <?php if($district->photos->count() > 2): ?>
                                    <button onclick="scrollGallery('left')" style="position: absolute; left: -15px; top: 50%; transform: translateY(-50%); background: rgba(52, 152, 219, 0.9); color: white; border: none; width: 40px; height: 40px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,0.2); transition: all 0.3s;" onmouseover="this.style.background='rgba(41, 128, 185, 1)'" onmouseout="this.style.background='rgba(52, 152, 219, 0.9)'">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button onclick="scrollGallery('right')" style="position: absolute; right: -15px; top: 50%; transform: translateY(-50%); background: rgba(52, 152, 219, 0.9); color: white; border: none; width: 40px; height: 40px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,0.2); transition: all 0.3s;" onmouseover="this.style.background='rgba(41, 128, 185, 1)'" onmouseout="this.style.background='rgba(52, 152, 219, 0.9)'">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                <?php endif; ?>
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
                    <?php endif; ?>
                </div>
            </div>

            <!-- Right: Bupati Photos -->
            <div class="bupati-section">
                <div class="bupati-grid">
                    <div class="bupati-card">
                        <div class="bupati-photo">
                            <img src="<?php echo e(asset('images/bupati.jpg')); ?>" alt="Bupati" onerror="this.style.display='none'; this.parentElement.innerHTML='<div style=\'display:flex;align-items:center;justify-content:center;height:100%;background:#e8eaed;color:#bdc3c7;font-size:60px;\'><i class=\'fas fa-user\'></i></div>'">
                        </div>
                        <h6>Effeindi Simbolon Panangian Napitupulu</h6>
                        <p>Bupati Toba</p>
                    </div>

                    <div class="bupati-card">
                        <div class="bupati-photo">
                            <img src="<?php echo e(asset('images/wakil-bupati.jpg')); ?>" alt="Wakil Bupati" onerror="this.style.display='none'; this.parentElement.innerHTML='<div style=\'display:flex;align-items:center;justify-content:center;height:100%;background:#e8eaed;color:#bdc3c7;font-size:60px;\'><i class=\'fas fa-user\'></i></div>'">
                        </div>
                        <h6>Andi Murphy Sitorus</h6>
                        <p>Wakil Bupati Toba</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $__env->startPush('styles'); ?>
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
<?php $__env->stopPush(); ?><?php /**PATH C:\Users\ASUS\Documents\E-GovToba\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>