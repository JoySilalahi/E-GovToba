{{-- Universal Footer Component - Toba Hita Design --}}

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
    .footer-universal {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        color: #ffffff;
        padding: 3.5rem 0 1.5rem;
        margin-top: auto;
    }
    
    .footer-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1.5rem;
    }
    
    .footer-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 3rem;
        margin-bottom: 3rem;
    }
    
    @media (min-width: 768px) {
        .footer-grid {
            grid-template-columns: 2fr 1.2fr 1fr;
        }
    }
    
    .footer-section h5 {
        font-size: 1.125rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        color: #ffffff;
        letter-spacing: 0.5px;
    }
    
    .footer-section p {
        font-size: 0.9rem;
        line-height: 1.8;
        color: #bdc3c7;
        margin-bottom: 0.75rem;
    }
    
    .footer-logo {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1.5rem;
    }
    
    .footer-logo-img {
        width: 50px;
        height: 50px;
        background: #ffffff;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        flex-shrink: 0;
    }
    
    .footer-logo-img i {
        font-size: 1.75rem;
        color: #2c3e50;
    }
    
    .footer-logo-text h5 {
        margin-bottom: 0;
        font-size: 1.5rem;
        font-weight: 700;
    }
    
    .footer-description {
        max-width: 400px;
    }
    
    .footer-contact-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1.25rem;
        font-size: 0.9rem;
    }
    
    .footer-contact-item i {
        margin-right: 1rem;
        margin-top: 0.15rem;
        width: 1.25rem;
        color: #3498db;
        flex-shrink: 0;
    }
    
    .footer-contact-item span,
    .footer-contact-item a {
        color: #bdc3c7;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    
    .footer-contact-item a:hover {
        color: #3498db;
    }
    
    .footer-social {
        display: flex;
        gap: 1rem;
        margin-top: 1.5rem;
    }
    
    .footer-social a {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(52, 152, 219, 0.1);
        border-radius: 8px;
        color: #ffffff;
        font-size: 1.25rem;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    
    .footer-social a:hover {
        background: #3498db;
        transform: translateY(-3px);
    }
    
    .footer-divider {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        margin-top: 3rem;
        padding-top: 1.5rem;
        text-align: center;
    }
    
    .footer-copyright {
        font-size: 0.875rem;
        color: #95a5a6;
        margin: 0;
    }
</style>

<footer class="footer-universal">
    <div class="footer-container">
        <div class="footer-grid">
            <!-- Kolom 1: Logo dan Deskripsi -->
            <div class="footer-section">
                <div class="footer-logo">
                    <div class="footer-logo-img">
                        <i class="fas fa-mountain"></i>
                    </div>
                    <div class="footer-logo-text">
                        <h5>Toba Hita</h5>
                    </div>
                </div>
                <div class="footer-description">
                    <p>
                        Portal informasi terintegrasi untuk transparansi dan pelayanan publik yang lebih baik di seluruh wilayah Kabupaten Toba.
                    </p>
                </div>
            </div>

            <!-- Kolom 2: Hubungi Kami -->
            <div class="footer-section">
                <h5>Hubungi kami</h5>
                <div class="footer-contact-item">
                    <i class="fas fa-phone"></i>
                    <a href="tel:+1234567890">+12 3456 7890</a>
                </div>
                <div class="footer-contact-item">
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:tobahita@gmail.com">tobahita@gmail.com</a>
                </div>
            </div>

            <!-- Kolom 3: Ikuti Kami -->
            <div class="footer-section">
                <h5>Ikuti Kami</h5>
                <div class="footer-social">
                    <a href="#" aria-label="Facebook" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" aria-label="Twitter" title="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" aria-label="Instagram" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="footer-divider">
            <p class="footer-copyright">
                &copy; {{ date('Y') }} Pemerintah Kabupaten Toba. Hak Cipta Dilindungi.
            </p>
        </div>
    </div>
</footer>
