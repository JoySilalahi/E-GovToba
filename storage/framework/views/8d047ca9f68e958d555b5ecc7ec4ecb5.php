<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Akun Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS (loaded before custom styles so custom rules override it) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-image: linear-gradient(135deg, rgba(25,80,122,0.6) 0%, rgba(129,167,211,0.35) 57%, rgba(255,255,255,0) 100%), url('<?php echo e(asset('images/pemandangan-sawah.jpg')); ?>');
            background-size: cover;
            /* show more of the lake by shifting the background downward */
            background-position: center 65%;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .register-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 420px;
            padding: 40px 35px;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 10px;
        }

        .logo-container img {
            width: 70px;
            height: auto;
        }

        .register-title {
            text-align: center;
            font-size: 22px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .register-subtitle {
            text-align: center;
            font-size: 13px;
            color: #64748b;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #334155;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        .form-input:focus {
            outline: none;
            border-color: #0077B6;
            background: white;
            box-shadow: 0 0 0 3px rgba(0, 119, 182, 0.1);
        }

        .error-message {
            color: #ef4444;
            font-size: 12px;
            margin-top: 6px;
        }

        .verification-note {
            font-size: 12px;
            color: #64748b;
            margin-top: 4px;
            font-style: italic;
        }

        .btn-register {
            width: 100%;
            padding: 13px;
            background: #0077B6;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            margin-top: 10px;
        }

        .btn-register:hover {
            background: #0077B6;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 119, 182, 0.3);
        }

        .footer-links {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
        }

        .footer-links a {
            color: #0077B6;
            text-decoration: none;
            font-weight: 500;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }

        .footer-links .separator {
            color: #cbd5e1;
            margin: 0 8px;
        }

        .back-home {
            text-align: center;
            margin-top: 15px;
        }

        .back-home a {
            color: #64748b;
            text-decoration: none;
            font-size: 13px;
        }

        .back-home a:hover {
            color: #0077B6;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="logo-container">
            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo Toba Hita">
        </div>
        
        <h1 class="register-title">Registrasi Akun</h1>
        <p class="register-subtitle">Buat akun untuk mengakses layanan publik</p>

        <form method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo csrf_field(); ?>

            <!-- Nama Lengkap -->
            <div class="form-group">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input 
                    id="name" 
                    class="form-input" 
                    type="text" 
                    name="name" 
                    value="<?php echo e(old('name')); ?>" 
                    required 
                    autofocus 
                    autocomplete="name"
                    placeholder="Masukkan nama lengkap"
                />
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error-message"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input 
                    id="email" 
                    class="form-input" 
                    type="email" 
                    name="email" 
                    value="<?php echo e(old('email')); ?>" 
                    required 
                    autocomplete="username"
                    placeholder="Masukkan email Anda"
                />
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error-message"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Kata Sandi -->
            <div class="form-group">
                <label for="password" class="form-label">Kata Sandi</label>
                <input 
                    id="password" 
                    class="form-input" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="new-password"
                    placeholder="Masukkan kata sandi"
                />
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error-message"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Konfirmasi Kata Sandi -->
            <div class="form-group">
                <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                <input 
                    id="password_confirmation" 
                    class="form-input" 
                    type="password" 
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password"
                    placeholder="Masukkan ulang kata sandi"
                />
                <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error-message"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-register">
                Daftar
            </button>
        </form>

        <!-- Footer Links -->
        <div class="footer-links">
            Sudah punya akun? 
            <a href="<?php echo e(route('login')); ?>">Masuk</a>
            <span class="separator">|</span>
            <a href="<?php echo e(route('home')); ?>">Kembali ke beranda</a>
        </div>
    </div>
</body>
</html>

<!-- Bootstrap JS bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<?php /**PATH C:\Users\ASUS\Documents\E-GovToba\resources\views/auth/register.blade.php ENDPATH**/ ?>