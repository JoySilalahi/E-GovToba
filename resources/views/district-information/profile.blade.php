<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil Kabupaten Toba</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root{
            --primary:#0b79b8;
            --muted:#64748b;
            --bg:#f1f6fb;
            --card-bg:#ffffff;
            --max-w:1100px;
            --nav-h:64px;
        }
        *{box-sizing:border-box}
        body{font-family:'Poppins',system-ui,-apple-system,"Segoe UI",Roboto,Arial; background:var(--bg); color:#1f2937; margin:0}

        /* NAV (site-nav header) */
        .site-nav{
            position: sticky;
            top: 0;
            z-index: 60;
            height: var(--nav-h);
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.95);
            border-bottom: 1px solid rgba(15, 23, 36, 0.06);
            backdrop-filter: blur(4px) saturate(120%);
            -webkit-backdrop-filter: blur(4px) saturate(120%);
            box-shadow: 0 2px 8px rgba(2,6,23,0.02);
        }
        .site-nav .navbar-container{
            max-width:var(--max-w);
            margin:0 auto;
            display:flex;
            align-items:center;
            gap:12px;
            padding:10px 16px;
            width:100%;
            position:relative;
        }
        .site-nav .brand{display:flex;align-items:center;gap:10px;flex:0 0 auto}
        .site-nav .brand img{height:42px; width:auto; display:block}
        .site-nav .nav-menu { display:flex; gap:28px; list-style:none; margin:0; padding:0; align-items:center; justify-content:center; flex:1 1 auto; }
        .site-nav .nav-menu a{color:var(--muted); text-decoration:none; font-weight:600; padding:8px 10px; border-radius:10px; transition:all .12s}
        .site-nav .nav-menu a.active, .site-nav .nav-menu a:hover{color:var(--primary); background:rgba(11,121,184,0.04); box-shadow:0 2px 8px rgba(11,121,184,0.04) inset}

        /* optional right area for icons / controls */
        .site-nav .nav-right{margin-left:auto; display:flex; gap:10px; align-items:center}

        /* hero */
        .hero {
            background-image: linear-gradient(to bottom, rgba(6,40,60,0.56), rgba(6,40,60,0.18)), url('http://127.0.0.1:8000/images/danau-toba.jpg');
            background-size:cover;
            background-position:center;
            color:#fff;
            padding:72px 16px 120px;
            text-align:center;
        }
        .hero .wrap{max-width:980px;margin:0 auto}
        .hero h1{font-size:40px; font-weight:800; margin-bottom:8px}
        .hero p{opacity:0.95; margin-bottom:18px}
        .hero-stats{display:flex;gap:48px;justify-content:center;margin-top:18px}
        .stat-item{text-align:center}
        .stat-number{font-size:28px;font-weight:800;display:block}
        .stat-label{font-size:13px;opacity:0.9}

        /* content overlap */
        .content-container{max-width:var(--max-w); margin:-80px auto 40px; padding:0 16px}

        /* cards */
        .two-column-layout{display:grid; grid-template-columns:1fr 420px; gap:28px}
        .card-panel{background:var(--card-bg); border-radius:12px; padding:22px; box-shadow:0 6px 20px rgba(2,6,23,0.06)}
        .card-panel h2{font-size:20px; margin-bottom:12px}
        .card-panel p{color:#475569; line-height:1.7; font-size:14px}

        /* bupati */
        .bupati-cards{display:flex;gap:12px;flex-direction:row;align-items:stretch}
        .bupati-card{background:#fff;border-radius:8px;padding:14px;text-align:center;flex:1;box-shadow:0 6px 18px rgba(2,6,23,0.04)}
        .bupati-photo{width:110px;height:110px;border-radius:10px;object-fit:cover;border:3px solid #e6f7ff; margin:0 auto 10px}

        .visi-misi .box{background:#f8fafc;padding:14px;border-radius:8px;margin-bottom:12px}
        .visi-misi h3{margin-bottom:10px}

        /* documentation carousel */
        .docs-section{max-width:var(--max-w); margin:28px auto 56px; padding:0 16px}
        .docs-header{text-align:center;margin-bottom:18px}
        .docs-header h2{color:#16213a;margin:0;font-weight:700}
        .docs-wrap{position:relative;background:transparent;padding:20px 0}
        .docs-track{display:flex; gap:18px; overflow:hidden; scroll-behavior:smooth;}
        .doc-item{flex:0 0 calc((100% - 36px) / 3); max-width: calc((100% - 36px) / 3); border-radius:12px; background:#fff; box-shadow:0 6px 18px rgba(2,6,23,0.04); overflow:hidden;}
        .doc-item img{width:100%;height:260px;object-fit:cover;display:block;border-radius:12px}
        .docs-prev, .docs-next{position:absolute; top:50%; transform:translateY(-50%); width:36px;height:36px;border-radius:50%; background:rgba(255,255,255,0.95); border:1px solid rgba(2,6,23,0.06); display:flex;align-items:center;justify-content:center;cursor:pointer;box-shadow:0 6px 16px rgba(2,6,23,0.06)}
        .docs-prev{left:8px}
        .docs-next{right:8px}
        .docs-prev i, .docs-next i{color:#6b7280}

        /* responsive */
        @media (max-width:1000px){
            .two-column-layout{grid-template-columns:1fr}
            .doc-item{flex:0 0 48%; max-width:48%}
            .docs-track{gap:14px}
        }
        @media (max-width:520px){
            .hero{padding:40px 12px 80px}
            .hero h1{font-size:26px}
            .doc-item{flex:0 0 100%; max-width:100%}
            .doc-item img{height:180px}
            .docs-prev, .docs-next{width:32px;height:32px}
            .site-nav .nav-menu{gap:12px}
        }

        /* footer */
        footer{background:#21323b;color:#cbd5df;padding:48px 16px 24px}
        .footer-inner{max-width:var(--max-w);margin:0 auto;display:flex;gap:20px;flex-wrap:wrap;justify-content:space-between}
        .footer-logo{display:flex;gap:12px;align-items:center}
        .footer-logo img{height:42px}
        .footer-small{color:rgba(255,255,255,0.85); font-size:13px}
    </style>
</head>
<body>

    <!-- NAV -->
    <nav class="site-nav" role="navigation" aria-label="Utama">
        <div class="navbar-container">
            <a class="brand" href="/">
                <img src="images/logo.png" alt="logo Kabupaten Toba">
            </a>

            <ul class="nav-menu" role="menubar" aria-label="Utama">
                <li><a href="/" class="">Beranda</a></li>
                <li><a href="http://127.0.0.1:8000/profile" class="active">Profil Kabupaten</a></li>
                <li><a href="http://127.0.0.1:8000/villages">Daftar Desa</a></li>
            </ul>

            <div class="nav-right" aria-hidden="true">
                <a href="#" title="Cari" style="color:var(--muted);font-size:15px"><i class="fa fa-magnifying-glass"></i></a>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero" role="region" aria-label="Hero">
        <div class="wrap">
            <h1>Profil Kabupaten Toba</h1>
            <p class="lead">Jantung Budaya Batak di Pesisir Danau Toba</p>

            <div class="hero-stats" role="list">
                <div class="stat-item" role="listitem">
                    <span class="stat-number">6</span>
                    <span class="stat-label">Desa</span>
                </div>
                <div class="stat-item" role="listitem">
                    <span class="stat-number">7.515</span>
                    <span class="stat-label">Penduduk</span>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <div class="content-container">
        <div class="two-column-layout">
            <section class="card-panel">
                <h2>Sejarah Singkat</h2>
                <p>
                    Kabupaten Toba Samosir dibentuk berdasar UU dan merupakan bagian penting dari wilayah Danau Toba.
                    Kawasan ini memiliki sejarah panjang dan kaya budaya Batak dengan perkembangan administratif sejak era reformasi.
                    Informasi ringkas ini menampilkan latar sejarah yang menjadi dasar pembangunan daerah.
                    Kabupaten Toba bermula dari pemekaran wilayah Kabupaten Tapanuli Utara. 
                    Wilayah ini secara resmi dibentuk berdasarkan Undang-Undang Nomor 12 Tahun 1998 sebagai Kabupaten Daerah Tingkat II Toba Samosir
                    dan diresmikan pada tanggal 9 Maret 1999, 
                    dengan Balige ditetapkan sebagai ibu kotanya.
                    Namun, beberapa tahun kemudian, terjadi pemisahan wilayah yang signifikan.
                    Pada tahun 2004, sebagian wilayahnya dimekarkan untuk membentuk kabupaten baru bernama Kabupaten Samosir, 
                    yang kini meliputi Pulau Samosir dan sekitarnya. Setelah pemekaran tersebut, 
                    nama "Toba Samosir" menjadi kurang relevan. 
                    Oleh karena itu, melalui Peraturan Pemerintah Nomor 14 Tahun 2020 yang diterbitkan pada awal tahun 2020, 
                    nama resmi kabupaten ini disederhanakan dan diubah menjadi Kabupaten Toba. 
                    Perubahan nama ini memperkuat fokus Toba sebagai salah satu wilayah inti peradaban 
                    Batak Toba sekaligus menjadi pusat pengembangan Kawasan Pariwisata Super Prioritas Danau Toba.
                </p>
            </section>

            <aside>
                <div class="card-panel">
                    <h2>Bupati & Wakil Bupati Toba</h2>
                    <div class="bupati-cards">
                        <div class="bupati-card">
                            <img src="http://127.0.0.1:8000/images/bupati.jpg" alt="Bupati" class="bupati-photo">
                            <div style="font-weight:700;color:#0f1724">Drs. Poltak Sitorus</div>
                            <div style="font-size:13px;color:var(--muted)">Bupati</div>
                        </div>
                        <div class="bupati-card">
                            <img src="http://127.0.0.1:8000/images/wakil-bupati.jpg" alt="Wakil Bupati" class="bupati-photo">
                            <div style="font-weight:700;color:#0f1724">Andi Napitupulu Siahaan</div>
                            <div style="font-size:13px;color:var(--muted)">Wakil Bupati</div>
                        </div>
                    </div>

                    <div class="visi-misi" style="margin-top:16px">
                        <h3>Visi & Misi</h3>
                        <div class="box visi-box">
                            <strong>Visi</strong>
                            <p style="margin:6px 0 0">Toba Unggul dan Bersinar</p>
                        </div>
                        <div class="box misi-box">
                            <strong>Misi</strong>
                            <ul style="margin:8px 0 0;padding-left:18px;color:#475569">
                                <li>Meningkatkan kualitas sumber daya manusia yang unggul dan mandiri.</li>
                                <li>Mendorong pemerintahan yang bersih, transparan, dan melayani.</li>
                                <li>Memperkuat ekonomi berbasis pariwisata dan kearifan lokal.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <!-- DOCUMENTATION -->
    <section class="docs-section" aria-label="Dokumentasi Kegiatan">
        <div class="docs-header">
            <h2>Dokumentasi Kegiatan</h2>
        </div>

        <div class="docs-wrap">
            <button class="docs-prev" id="docsPrev" aria-label="Sebelumnya"><i class="fa fa-chevron-left"></i></button>
            <div class="docs-track" id="docsTrack">
                <div class="doc-item"><img src="images/dokumentasi kegiatan.jpg" alt="doc 1"></div>
                <div class="doc-item"><img src="images/dokumentasi kegiatan (2).jpg" alt="doc 2"></div>
                <div class="doc-item"><img src="images/tarian.jpg" alt="doc 3"></div>
                <div class="doc-item"><img src="http://127.0.0.1:8000/images/documentation-4.jpg" alt="doc 4"></div>
                <div class="doc-item"><img src="http://127.0.0.1:8000/images/documentation-5.jpg" alt="doc 5"></div>
            </div>
            <button class="docs-next" id="docsNext" aria-label="Berikutnya"><i class="fa fa-chevron-right"></i></button>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="footer-inner">
            <div class="footer-about" style="max-width:560px">
                <div class="footer-logo">
                    <img src="images/logo.png" alt="logo">
                    <div class="footer-small">Portal informasi terintegrasi untuk transparansi dan pelayanan publik di Kabupaten Toba.</div>
                </div>
            </div>

            <div class="footer-contact">
                <h4 style="color:#fff;margin-bottom:10px">Hubungi Kami</h4>
                <div class="footer-small">+62 3456 7890<br>tobahita@mail.com</div>
            </div>

            <div class="footer-links">
                <h4 style="color:#fff;margin-bottom:10px">Ikuti Kami</h4>
                <div style="display:flex;gap:10px">
                    <a href="#" style="color:#cbd5e1"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" style="color:#cbd5e1"><i class="fab fa-twitter"></i></a>
                    <a href="#" style="color:#cbd5e1"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>

        <div style="max-width:var(--max-w);margin:18px auto 0;text-align:center;color:rgba(255,255,255,0.7);font-size:13px">
            © <span id="year"></span> Pemerintah Kabupaten Toba. Hak Cipta Dilindungi.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('year').textContent = new Date().getFullYear();

        (function(){
            const track = document.getElementById('docsTrack');
            const prev = document.getElementById('docsPrev');
            const next = document.getElementById('docsNext');

            function slide(direction){
                if (!track) return;
                const gap = parseInt(getComputedStyle(track).gap) || 18;
                const containerWidth = track.clientWidth;
                const firstItem = track.querySelector('.doc-item');
                if (!firstItem) return;
                const itemRect = firstItem.getBoundingClientRect();
                const itemWidth = itemRect.width + gap;
                const visibleCount = Math.max(1, Math.floor(containerWidth / itemWidth));
                const move = Math.round(itemWidth * visibleCount);
                track.scrollBy({ left: direction * move, behavior: 'smooth' });
            }

            prev && prev.addEventListener('click', () => slide(-1));
            next && next.addEventListener('click', () => slide(1));
            document.addEventListener('keydown', function(e){
                if (e.key === 'ArrowLeft') slide(-1);
                if (e.key === 'ArrowRight') slide(1);
            });
        })();
    </script>
</body>
</html>