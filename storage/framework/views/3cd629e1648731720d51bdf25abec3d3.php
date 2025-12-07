<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toba Hita</title>
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/logo.png')); ?>" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root{
            --primary:#0b79b8;
            --muted:#64748b;
            --bg:#eef6fb;
            --card:#ffffff;
            --max-w:1100px;
            --nav-h:64px;
        }
        *{box-sizing:border-box}
        html,body{height:100%;margin:0;font-family:'Poppins',system-ui,Arial;color:#102030;background:var(--bg);-webkit-font-smoothing:antialiased}
        a{color:inherit;text-decoration:none}

        /* NAV */
        .site-nav {
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
            box-shadow: 0 2px 8px rgba(2, 6, 23, 0.02);
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
        .site-nav .nav-right{margin-left:auto; display:flex; gap:10px; align-items:center}

        /* HERO */
        .hero{
            background-size:cover;
            background-position:center;
            background-image:
                linear-gradient(180deg, rgba(8,40,66,0.5), rgba(8,40,66,0.3)),
                url('<?php echo e(asset("images/pemandangan-sawah.jpg")); ?>');
            color:#fff;
            padding:60px 0 40px;
            display:flex;
            align-items:center;
        }
        .hero-inner{
            width:100%;
            max-width:1000px;
            margin:0 auto;
            padding:0 20px;
            display:flex;
            flex-direction:column;
            align-items:center;
            text-align:center;
        }
        .hero h1{font-size:48px;margin:0 0 8px;font-weight:700}
        .hero p{font-size:16px;margin:0 0 30px;opacity:0.95;font-weight:400}
        .hero-stats{display:flex;justify-content:center;gap:40px;flex-wrap:wrap;margin-top:30px}
        .stat-item{text-align:center}
        .stat-number{font-size:32px;font-weight:800;display:block}
        .stat-label{font-size:14px;color:rgba(255,255,255,0.9)}

        /* SEARCH */
        .search-wrap{max-width:720px;margin:-28px auto 36px;position:relative;padding:0 16px;z-index:20}
        .search-box{background:#fff;border-radius:12px;padding:12px 16px;display:flex;align-items:center;gap:12px;box-shadow:0 8px 24px rgba(2,6,23,0.06)}
        .search-box input{flex:1;border:0;outline:none;font-size:15px;font-family:inherit;color:#102030}
        .search-box .fa-magnifying-glass{color:var(--muted);font-size:16px}
        .search-count{font-size:13px;color:var(--muted);padding-left:8px}

        /* GRID CARDS */
        .container{max-width:var(--max-w);margin:0 auto;padding:0 16px 80px}
        .grid{display:grid;grid-template-columns:repeat(3,1fr);gap:26px}
        .card{
            background:var(--card);
            border-radius:12px;
            overflow:hidden;
            box-shadow:0 10px 30px rgba(2,6,23,0.06);
            display:flex;
            flex-direction:column;
            min-height:360px;
            border:3px solid transparent;
            transition:all 0.3s ease;
        }
        .card.clicked{
            border-color:#0b79b8 !important;
            background:linear-gradient(to bottom, rgba(11,121,184,0.15), rgba(11,121,184,0.05)) !important;
            box-shadow:0 0 0 8px rgba(11,121,184,0.4), 0 20px 60px rgba(11,121,184,0.4) !important;
            transform:scale(1.08) !important;
            animation:blueFlash 0.4s ease !important;
        }
        @keyframes blueFlash {
            0% { 
                border-color:transparent;
                box-shadow:0 10px 30px rgba(2,6,23,0.06);
            }
            50% {
                border-color:#0b79b8;
                box-shadow:0 0 0 12px rgba(11,121,184,0.6), 0 25px 70px rgba(11,121,184,0.5);
            }
            100% {
                border-color:#0b79b8;
                box-shadow:0 0 0 8px rgba(11,121,184,0.4), 0 20px 60px rgba(11,121,184,0.4);
            }
        }
        .card .thumb{height:170px;background:#eee;overflow:hidden}
        .card .thumb img{width:100%;height:100%;object-fit:cover;display:block;border-bottom-left-radius:0;border-bottom-right-radius:0}
        .card .body{padding:18px;flex:1;display:flex;flex-direction:column}
        .card h3{margin:0 0 8px;font-size:16px;color:#0f1724}
        .card p{margin:0 0 12px;color:var(--muted);font-size:13px;line-height:1.6;flex:1}
        .meta{display:flex;gap:12px;align-items:center;font-size:13px;color:var(--muted);padding-top:12px;border-top:1px solid #f1f5f9}
        .btn-outline{display:inline-block;padding:8px 14px;border-radius:10px;border:1px solid rgba(11,121,184,0.18);color:var(--primary);font-weight:600;font-size:13px;text-align:center;margin-top:12px;background:white;transition:all 0.2s ease}
        .btn-outline:hover{background:var(--primary);color:white;border-color:var(--primary);box-shadow:0 4px 12px rgba(11,121,184,0.25);transform:translateY(-1px)}
        .btn-outline:active{background:#096598;border-color:#096598;transform:translateY(0);box-shadow:0 2px 8px rgba(11,121,184,0.3)}
        .card .small-meta{display:flex;gap:12px;margin-top:8px;font-size:13px;color:var(--muted)}

        /* Footer */
       footer {
            background: #2c3e50;
            color: white;
            padding: 40px 20px 25px;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 25px;
        }

        .footer-section h4 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .footer-section p,
        .footer-section a {
            font-size: 13px;
            color: #cbd5e1;
            text-decoration: none;
            line-height: 1.8;
        }

        .footer-section a:hover {
            color: white;
        }

        /* Responsive */
        @media (max-width:1000px){
            .grid{grid-template-columns:repeat(2,1fr)}
            .hero h1{font-size:36px}
            .search-wrap{margin-top:-24px}
            .site-nav .nav-menu{gap:16px}
        }
        @media (max-width:640px){
            .site-nav .nav-menu{display:none}
            .nav-right{display:flex}
            .grid{grid-template-columns:1fr}
            .hero{padding:40px 0 30px}
            .hero h1{font-size:28px}
            .search-wrap{margin:-18px auto 24px}
            .card .thumb{height:160px}
        }
    </style>
</head>
<body>

    <nav class="site-nav" role="navigation" aria-label="Utama">
        <div class="navbar-container">
            <a class="brand" href="/" aria-label="Beranda Toba Hita">
                <img src="http://127.0.0.1:8000/images/logo.png" alt="logo Kabupaten Toba">
            </a>

            <ul class="nav-menu" role="menubar" aria-label="Utama">
                <li><a href="/" class="">Beranda</a></li>
                <li><a href="/profile" class="">Profil Kabupaten</a></li>
                <li><a href="/villages" class="active">Daftar Desa</a></li>
            </ul>
        </div>
    </nav>

    <main>
        <section class="hero" aria-label="Hero">
            <div class="hero-inner">
                <h1>Jelajahi Desa di Kabupaten Toba</h1>
                <p class="hero-subtitle">Sistem informasi terintegrasi kawasan Toba</p>

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

        <div class="search-wrap" aria-hidden="false">
            <div class="search-box" role="search">
                <i class="fa fa-magnifying-glass" aria-hidden="true"></i>
                <input id="searchInput" type="text" placeholder="Cari Desa" aria-label="Cari Desa">
                <div class="search-count" id="resultCount">6 Desa</div>
            </div>
        </div>

        <div class="container">
            <div class="grid" id="villagesGrid">
                <article class="card" data-name="desa mea6t">
                    <div class="thumb"><img src="http://127.0.0.1:8000/images/desa meat.jpg" alt="Desa Meat"></div>
                    <div class="body">
                        <h3>Desa Meat</h3>
                        <div class="small-meta">Desa pertanian • Pemandangan sawah</div>
                        <p>Desa dengan sawah terasering dan pemandangan Danau Toba. Komoditas pertanian utama dan adat lokal kuat.</p>
                        <div class="meta">
                            <div class="mitem"><i class="fa fa-users" style="color:var(--primary)"></i> 900</div>
                            <div class="mitem"><i class="fa fa-ruler-combined" style="color:var(--primary)"></i> 15.2 km²</div>
                            <div style="margin-left:auto"><a class="btn-outline" href="/villages/1">Lihat Detail</a></div>
                        </div>
                    </div>
                </article>

                <article class="card" data-name="desa aek bolon julu">
                    <div class="thumb"><img src="http://127.0.0.1:8000/images/desa aek bolon julu.jpg" alt="Desa Aek Bolon Julu"></div>
                    <div class="body">
                        <h3>Desa Aek Bolon Julu</h3>
                        <div class="small-meta">Rumah adat • Wisata budaya</div>
                        <p>Desa berarsitektur tradisional Batak, memiliki rumah adat dan potensi wisata budaya.</p>
                        <div class="meta">
                            <div class="mitem"><i class="fa fa-users" style="color:var(--primary)"></i> 258</div>
                            <div class="mitem"><i class="fa fa-ruler-combined" style="color:var(--primary)"></i> 9.7 km²</div>
                            <div style="margin-left:auto"><a class="btn-outline" href="/villages/2">Lihat Detail</a></div>
                        </div>
                    </div>
                </article>

                <article class="card" data-name="desa pangombusan">
                    <div class="thumb"><img src="http://127.0.0.1:8000/images/desa pangombusan.jpg" alt="Desa Pangombusan"></div>
                    <div class="body">
                        <h3>Desa Pangombusan</h3>
                        <div class="small-meta">Pesisir • Perikanan</div>
                        <p>Desa pertanian dengan daerah pesisir dan akses ke perikanan lokal serta ulos tradisional.</p>
                        <div class="meta">
                            <div class="mitem"><i class="fa fa-users" style="color:var(--primary)"></i> 3.354</div>
                            <div class="mitem"><i class="fa fa-ruler-combined" style="color:var(--primary)"></i> 25.1 km²</div>
                            <div style="margin-left:auto"><a class="btn-outline" href="/villages/3">Lihat Detail</a></div>
                        </div>
                    </div>
                </article>

                <article class="card" data-name="desa pareparean">
                    <div class="thumb"><img src="http://127.0.0.1:8000/images/desa pareparean.jpg" alt="Desa Pareparean"></div>
                    <div class="body">
                        <h3>Desa Pareparean</h3>
                        <div class="small-meta">Kerajinan • Wisata</div>
                        <p>Pusat kerajinan ulos tradisional, dikelilingi bukit dan jalur wisata budaya.</p>
                        <div class="meta">
                            <div class="mitem"><i class="fa fa-users" style="color:var(--primary)"></i> 900</div>
                            <div class="mitem"><i class="fa fa-ruler-combined" style="color:var(--primary)"></i> 15.2 km²</div>
                            <div style="margin-left:auto"><a class="btn-outline" href="/villages/4">Lihat Detail</a></div>
                        </div>
                    </div>
                </article>

                <article class="card" data-name="desa pintu bosi">
                    <div class="thumb"><img src="http://127.0.0.1:8000/images/desa pintu bosi.jpg" alt="Desa Pintu Bosi"></div>
                    <div class="body">
                        <h3>Desa Pintu Bosi</h3>
                        <div class="small-meta">Pasar lokal • Koperasi</div>
                        <p>Desa yang dikenal dengan pasar lokal dan kegiatan koperasi pertanian.</p>
                        <div class="meta">
                            <div class="mitem"><i class="fa fa-users" style="color:var(--primary)"></i> 258</div>
                            <div class="mitem"><i class="fa fa-ruler-combined" style="color:var(--primary)"></i> 9.7 km²</div>
                            <div style="margin-left:auto"><a class="btn-outline" href="/villages/5">Lihat Detail</a></div>
                        </div>
                    </div>
                </article>

                <article class="card" data-name="desa sigumpar toba">
                    <div class="thumb"><img src="images/desa sigumpar.jpeg" alt="Desa Sigumpar Toba"></div>
                    <div class="body">
                        <h3>Desa Sigumpar Toba</h3>
                        <div class="small-meta">Ekowisata • Kebun buah</div>
                        <p>Desa dengan ekowisata dan kebun buah lokal, cocok untuk kunjungan keluarga.</p>
                        <div class="meta">
                            <div class="mitem"><i class="fa fa-users" style="color:var(--primary)"></i> 3.354</div>
                            <div class="mitem"><i class="fa fa-ruler-combined" style="color:var(--primary)"></i> 25.1 km²</div>
                            <div style="margin-left:auto"><a class="btn-outline" href="/villages/6">Lihat Detail</a></div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('year').textContent = new Date().getFullYear();

        (function(){
            const input = document.getElementById('searchInput');
            const grid = document.getElementById('villagesGrid');
            const items = Array.from(grid.querySelectorAll('.card'));
            const countEl = document.getElementById('resultCount');

            function updateCount(visible){
                countEl.textContent = visible + ' Desa';
            }

            input.addEventListener('input', function(){
                const q = this.value.trim().toLowerCase();
                let visible = 0;
                items.forEach(it => {
                    const name = (it.getAttribute('data-name') || '').toLowerCase();
                    const title = (it.querySelector('h3')?.textContent || '').toLowerCase();
                    if (!q || name.includes(q) || title.includes(q)) {
                        it.style.display = '';
                        visible++;
                    } else it.style.display = 'none';
                });
                updateCount(visible);
            });

            updateCount(items.length);
        })();

        // BLUE HIGHLIGHT EFFECT - Add click effect to ALL cards
        console.log('Setting up click handlers...');
        const allButtons = document.querySelectorAll('.btn-outline');
        console.log('Found buttons:', allButtons.length);
        
        allButtons.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Button clicked!');
                const url = this.getAttribute('href');
                
                // Add clicked class to ALL cards
                const allCards = document.querySelectorAll('.card');
                console.log('Adding clicked class to', allCards.length, 'cards');
                allCards.forEach(card => {
                    card.classList.add('clicked');
                    card.style.borderColor = '#0b79b8';
                    card.style.background = 'linear-gradient(to bottom, rgba(11,121,184,0.15), rgba(11,121,184,0.05))';
                });
                
                // Navigate after animation
                setTimeout(() => {
                    console.log('Navigating to:', url);
                    window.location.href = url;
                }, 500);
            });
        });
    </script>
    <!-- Footer -->
    <?php echo $__env->make('components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
</html>
<?php /**PATH C:\Users\LENOVO\Documents\GitHub\E-GovToba\resources\views/district-information/villages.blade.php ENDPATH**/ ?>