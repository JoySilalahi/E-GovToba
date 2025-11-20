

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
    :root {
        --primary-color: #0077B6;
        --dark-blue: #222a35;
        --text-light: #f1f1f1;
        --text-secondary: #6c757d;
    }

    /* === Footer === */
    .footer {
        background: #2c3e50;
        color: var(--text-light);
        padding: 60px 0 25px 0;
        margin-top: auto;
    }

    .footer .container {
        max-width: 1140px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .footer-grid {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 50px;
        margin-bottom: 40px;
    }

    .footer-col {
        flex: 1;
        min-width: 250px;
    }

    .footer-col.col-1 {
        flex-basis: 40%;
    }

    .footer-logo {
        font-weight: 700;
        font-size: 22px;
        color: #fff;
        margin-bottom: 18px;
        display: flex;
        align-items: center;
    }

    .footer-logo img {
        height: 55px;
        width: auto;
        margin-right: 12px;
        filter: brightness(0) invert(1);
    }

    .footer-col p {
        color: #bdc3c7;
        font-size: 14px;
        max-width: 350px;
        line-height: 1.8;
    }

    .footer-col h4 {
        font-size: 17px;
        font-weight: 600;
        margin-bottom: 20px;
        color: #fff;
    }

    .footer-contact {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-contact li {
        margin-bottom: 14px;
        color: #bdc3c7;
        display: flex;
        align-items: center;
        font-size: 14px;
    }

    .footer-contact i {
        margin-right: 12px;
        width: 18px;
        text-align: center;
        color: var(--primary-color);
    }

    .footer-social a {
        color: #fff;
        text-decoration: none;
        font-size: 20px;
        margin-right: 16px;
        transition: color 0.3s ease;
    }

    .footer-social a:hover {
        color: var(--primary-color);
    }

    .footer-bottom {
        text-align: center;
        border-top: 1px solid #34495e;
        padding-top: 25px;
        font-size: 13px;
        color: #95a5a6;
    }
</style>

<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col col-1">
                <div class="footer-logo">
                    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Toba Hita Logo">
                    <span>Toba Hita</span>
                </div>
                <p>Portal informasi terintegrasi untuk transparansi dan pelayanan publik yang lebih baik di seluruh wilayah Kabupaten Toba.</p>
            </div>

            <div class="footer-col">
                <h4>Hubungi kami</h4>
                <ul class="footer-contact">
                    <li><i class="fas fa-phone"></i> +12 3456 7890</li>
                    <li><i class="fas fa-envelope"></i> tobahita@gmail.com</li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Ikuti Kami</h4>
                <div class="footer-social">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo e(date('Y')); ?> Pemerintah Kabupaten Toba. Hak Cipta Dilindungi.</p>
        </div>
    </div>
</footer>
<?php /**PATH C:\Users\Joy Silalahi\Documents\GitHub\E-GovToba\resources\views/components/footer.blade.php ENDPATH**/ ?>