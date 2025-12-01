<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Informasi - Admin Desa <?php echo e($village->name); ?></title>
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
            background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%);
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
            border-left: 4px solid #3498db;
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
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .form-card {
            background: #e8f4f8;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .form-card h5 {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
        }

        .form-control, .form-select {
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 10px 15px;
        }

        .form-control:focus, .form-select:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .btn-group-custom {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .btn-custom {
            border: 2px solid #cbd5e1;
            background: white;
            color: #64748b;
            padding: 8px 20px;
            border-radius: 25px;
            font-size: 14px;
            transition: all 0.3s;
            cursor: pointer;
        }

        .btn-custom:hover {
            border-color: #3498db;
            color: #3498db;
        }

        .btn-custom.active {
            background: #3498db;
            border-color: #3498db;
            color: white;
        }

        .btn-publish {
            background: #0ea5e9;
            color: white;
            padding: 12px 40px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
            float: right;
        }

        .btn-publish:hover {
            background: #0284c7;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(14, 165, 233, 0.3);
        }
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
            <li><a href="<?php echo e(route('village-admin.dashboard')); ?>"><i class="fas fa-home"></i> Beranda</a></li>
            <li><a href="<?php echo e(route('village-admin.kelola-informasi')); ?>" class="active"><i class="fas fa-info-circle"></i> Kelola Informasi</a></li>
            <li><a href="<?php echo e(route('village-admin.anggaran')); ?>"><i class="fas fa-coins"></i> Anggaran</a></li>
        </ul>
        <div style="position: absolute; bottom: 20px; left: 20px; right: 20px;">
            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
               style="display: block; padding: 12px; background: rgba(220,38,38,0.2); color: white; text-align: center; border-radius: 8px; text-decoration: none;">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Welcome Header -->
        <div class="header-welcome">
            <h4>Selamat Datang, Admin Desa <?php echo e($village->name); ?> !</h4>
        </div>

        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Form Edit Visi & Misi Desa -->
        <div class="form-card" style="margin-bottom: 24px;">
            <h5>Edit Visi & Misi Desa <?php echo e($village->name); ?></h5>
            <p style="color: #64748b; font-size: 14px; margin-bottom: 20px;">
                Perubahan akan langsung terlihat di halaman <strong>Detail Desa</strong> untuk pengunjung
            </p>
            
            <form action="<?php echo e(route('village-admin.visi-misi.update')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                
                <div class="mb-4">
                    <label class="form-label">Visi Desa</label>
                    <textarea 
                        name="visi" 
                        class="form-control" 
                        rows="3" 
                        placeholder="Masukkan visi desa..."
                        required><?php echo e(old('visi', $village->visi ?? '')); ?></textarea>
                    <small style="color: #64748b; font-size: 12px;">Visi adalah gambaran masa depan yang ingin dicapai oleh desa</small>
                </div>

                <div class="mb-4">
                    <label class="form-label">Misi Desa</label>
                    <textarea 
                        name="misi" 
                        class="form-control" 
                        rows="5" 
                        placeholder="Masukkan misi desa..."
                        required><?php echo e(old('misi', $village->misi ?? '')); ?></textarea>
                    <small style="color: #64748b; font-size: 12px;">Misi adalah langkah-langkah strategis untuk mewujudkan visi</small>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn-publish">
                        <i class="fas fa-save"></i> Simpan Visi & Misi
                    </button>
                </div>
            </form>
        </div>

        <!-- Form Buat Agenda -->
        <div class="form-card">
            <h5>Buat Agenda Baru :</h5>
            
            <form action="<?php echo e(route('village-admin.announcements.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                
                <div class="mb-4">
                    <label class="form-label">Judul</label>
                    <input type="text" name="title" class="form-control" placeholder="Masukkan judul agenda..." required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="date" class="form-control" value="<?php echo e(date('Y-m-d')); ?>" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Jenis Agenda</label>
                    <div class="btn-group-custom">
                        <button type="button" class="btn-custom active" onclick="selectType(this, 'meeting')">
                            Meeting
                        </button>
                        <button type="button" class="btn-custom" onclick="selectType(this, 'program')">
                            Program
                        </button>
                        <button type="button" class="btn-custom" onclick="selectType(this, 'evaluasi')">
                            Evaluasi
                        </button>
                    </div>
                    <input type="hidden" name="type" id="agendaType" value="meeting">
                </div>

                <div class="mb-4">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="content" class="form-control" rows="4" placeholder="Masukkan deskripsi agenda..." required></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="pending">Pending</option>
                        <option value="progress">Progress</option>
                        <option value="done">Done</option>
                    </select>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn-publish">
                        <i class="fas fa-paper-plane"></i> Publikasikan
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
<?php /**PATH C:\Users\ASUS\Documents\E-GovToba\resources\views/village-admin/kelola-informasi.blade.php ENDPATH**/ ?>