<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Portal Administrator</title>
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

        .login-container {
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

        .login-title {
            text-align: center;
            font-size: 22px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .login-subtitle {
            text-align: center;
            font-size: 14px;
            color: #64748b;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
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

        .btn-login {
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

        .btn-login:hover {
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
            margin-top: 20px;
        }

        .back-home a {
            color: #64748b;
            text-decoration: none;
            font-size: 13px;
        }

        .back-home a:hover {
            color: #0077B6;
        }

        .session-status {
            background: #d1fae5;
            color: #065f46;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            text-align: center;
        }

        .btn-google:hover {
            background: #f8fafc;
            border-color: #0077B6;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo-container">
            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo Toba Hita">
        </div>
        
        <h1 class="login-title">Masuk</h1>
        <p class="login-subtitle">Selamat datang kembali! Silakan masuk ke akun Anda</p>

        <!-- Session Status -->
        <?php if(session('status')): ?>
            <div class="session-status">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>

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
                    autofocus 
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
                    autocomplete="current-password"
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

            <!-- Submit Button -->
            <button type="submit" class="btn-login">
                Masuk
            </button>
        </form>

        <!-- Divider -->
        <div style="text-align: center; margin: 20px 0; position: relative;">
            <hr style="border: none; border-top: 1px solid #e2e8f0;">
            <span style="position: absolute; top: -12px; left: 50%; transform: translateX(-50%); background: white; padding: 0 15px; color: #64748b; font-size: 13px;">atau</span>
        </div>

        <!-- Google Login Button -->
        <a href="<?php echo e(route('auth.google')); ?>" class="btn-google" style="display: flex; align-items: center; justify-content: center; gap: 10px; width: 100%; padding: 12px; background: white; color: #1e293b; border: 1px solid #e2e8f0; border-radius: 8px; text-decoration: none; font-size: 14px; font-weight: 500; transition: all 0.3s ease; font-family: 'Poppins', sans-serif;">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.805 10.2303C19.805 9.55056 19.7502 8.86711 19.6336 8.19836H10.2V12.0492H15.6014C15.3773 13.2911 14.6571 14.3898 13.6025 15.0879V17.5866H16.8251C18.7174 15.8449 19.805 13.2728 19.805 10.2303Z" fill="#4285F4"/>
                <path d="M10.2 20.0006C12.8963 20.0006 15.1721 19.1151 16.8286 17.5865L13.606 15.0879C12.7096 15.6979 11.5521 16.0433 10.2034 16.0433C7.59474 16.0433 5.38272 14.2832 4.58904 11.9169H1.26367V14.4927C2.96127 17.8695 6.41892 20.0006 10.2 20.0006V20.0006Z" fill="#34A853"/>
                <path d="M4.58549 11.9169C4.16573 10.6749 4.16573 9.33008 4.58549 8.08811V5.51233H1.26368C-0.154712 8.33798 -0.154712 11.6671 1.26368 14.4927L4.58549 11.9169V11.9169Z" fill="#FBBC04"/>
                <path d="M10.2 3.95805C11.6256 3.936 13.0035 4.47247 14.036 5.45722L16.8911 2.60218C15.0833 0.904587 12.6838 -0.0287217 10.2 0.000673888C6.41892 0.000673888 2.96127 2.13185 1.26367 5.51234L4.58548 8.08813C5.37545 5.71811 7.59109 3.95805 10.2 3.95805V3.95805Z" fill="#EA4335"/>
            </svg>
            Masuk dengan Google
        </a>

        <!-- Footer Links -->
        <div class="footer-links">
            Belum punya akun? 
            <a href="<?php echo e(route('register')); ?>">Daftar</a>
            <span class="separator">|</span>
            <a href="<?php echo e(route('password.request')); ?>">Kembali ke beranda</a>
        </div>

        <!-- Back to Home -->
        <div class="back-home">
            <a href="<?php echo e(route('home')); ?>">← Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>

<!-- Bootstrap JS bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<?php /**PATH C:\Users\Joy Silalahi\Documents\GitHub\E-GovToba\resources\views/auth/login.blade.php ENDPATH**/ ?>