<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toba Hita</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root{
            --primary:#0b79b8;
            --nav-h:64px;
            --muted:#6b7280;
            --bg-light:#edf7fe;
            --dark:#0f1724;
            --max-width:1200px;
        }
        *{box-sizing:border-box;margin:0;padding:0}
        html,body{height:100%}
        body{font-family:'Poppins',system-ui,-apple-system,"Segoe UI",Roboto,Arial; color:var(--dark); background:#fff;-webkit-font-smoothing:antialiased}

        /* NAV */
        .site-nav{
            position:sticky; top:0; z-index:60;
            height:var(--nav-h);
            display:flex; align-items:center;
            background:rgba(255,255,255,0.95);
            border-bottom:1px solid rgba(15,23,36,0.06);
            backdrop-filter: blur(4px) saturate(120%);
        }
        .nav-inner{max-width:var(--max-width); margin:0 auto; width:100%; display:flex; align-items:center; gap:12px; padding:0 16px;}
        .brand{flex:0 0 auto; display:flex; align-items:center}
        .brand img{height:42px; width:auto; display:block}
        .nav-center{flex:1 1 auto; display:flex; justify-content:center}
        .nav-menu{display:flex; gap:26px; list-style:none; align-items:center}
        .nav-menu a{display:inline-block; text-decoration:none; color:rgba(15,23,36,0.88); font-weight:600; padding:8px 8px; border-radius:6px}
        .nav-menu a.active, .nav-menu a:hover{color:var(--primary); background:rgba(11,121,184,0.04)}
        .nav-actions{flex:0 0 auto; display:flex; gap:10px; align-items:center}
        .btn{border:none; cursor:pointer; border-radius:999px; padding:8px 14px; font-weight:600}
        .btn-outline{background:transparent; border:1px solid rgba(15,23,36,0.06); color:var(--dark)}
        .btn-primary{background:var(--primary); color:#fff; box-shadow:0 6px 18px rgba(11,121,184,0.12)}
        .nav-toggle{display:none; background:transparent; border:0; font-size:20px; color:var(--dark)}
        .mobile-menu{display:none; position:absolute; top:100%; left:0; right:0; background:rgba(255,255,255,0.98); border-bottom:1px solid rgba(15,23,36,0.06); padding:12px 16px;}
        .mobile-menu.open{display:block}
        .mobile-menu a{display:block;padding:10px 6px;border-radius:8px;color:var(--dark);text-decoration:none}
        .mobile-menu a + a{margin-top:4px}
        .site-nav .nav-right{margin-left:auto; display:flex; gap:10px; align-items:center}

        /* HERO */
        .hero{
            background-size:cover;
            background-position:center;
            background-image:
                linear-gradient(180deg, rgba(8,40,66,0.5), rgba(8,40,66,0.3)),
                url('{{ asset("images/pemandangan-sawah.jpg") }}');
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
        .grid{display:grid;grid-template-columns:repeat(auto-fit, minmax(280px, 1fr));gap:20px}
        .card{
            background:var(--card);
            border-radius:12px;
            overflow:hidden;
            box-shadow:0 10px 30px rgba(2,6,23,0.06);
            display:flex;
            flex-direction:column;
            min-height:auto;
            border:3px solid transparent;
            transition:all 0.3s ease;
        }
        .card .thumb{height:140px;background:#eee;overflow:hidden}
        .card .thumb img{width:100%;height:100%;object-fit:cover;display:block;border-bottom-left-radius:0;border-bottom-right-radius:0}
        .card .body{padding:14px;flex:1;display:flex;flex-direction:column}
        .card h3{margin:0 0 6px;font-size:15px;color:#0f1724}
        .card p{margin:0 0 10px;color:var(--muted);font-size:12px;line-height:1.5;flex:1}
        .meta{display:flex;gap:12px;align-items:center;font-size:12px;color:var(--muted);padding-top:10px;border-top:1px solid #f1f5f9}
        .btn-outline{display:inline-block;padding:6px 12px;border-radius:8px;border:1px solid rgba(11,121,184,0.18);color:var(--primary);font-weight:600;font-size:12px;text-align:center;margin-top:10px;background:white;transition:all 0.2s ease}
        .btn-outline:hover{background:var(--primary);color:white;border-color:var(--primary);box-shadow:0 4px 12px rgba(11,121,184,0.25);transform:translateY(-1px)}
        .btn-outline:active{background:#096598;border-color:#096598;transform:translateY(0);box-shadow:0 2px 8px rgba(11,121,184,0.3)}
        .card .small-meta{display:flex;gap:12px;margin-top:6px;font-size:12px;color:var(--muted)}

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
        @media (max-width:980px){
            .nav-center{display:none}
            .nav-toggle{display:inline-flex}
            .hero h1{font-size:40px}
        }
        @media (max-width:520px){
            .hero{padding-top:48px;padding-bottom:60px}
            .hero h1{font-size:32px}
            .grid{flex-direction:column;align-items:center}
            .nav-actions .btn{padding:6px 10px;font-size:14px}
        }
    </style>
</head>
<body>

<header class="site-nav" role="banner">
    <div class="nav-inner">
        <a class="brand" href="/">
            <img src="{{ asset('images/logo.png') }}" alt="Toba Hita">
        </a>

        <nav class="nav-center" role="navigation" aria-label="Utama">
            <ul class="nav-menu" role="menubar" id="mainMenuDesktop">
                <li role="none"><a role="menuitem" href="/">Beranda</a></li>
                <li role="none"><a role="menuitem" href="/profile">Profil Kabupaten</a></li>
                <li role="none"><a role="menuitem" href="/villages" class="active">Daftar Desa</a></li>
            </ul>
        </nav>

        <div class="nav-actions" role="group" aria-label="Aksi">
            <button class="nav-toggle" id="navToggle" aria-label="Buka menu" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i></button>
        </div>
    </div>

    <!-- mobile menu (shown when burger clicked) -->
    <div id="mobileMenu" class="mobile-menu" aria-hidden="true">
        <a href="/">Beranda</a>
        <a href="/profile">Profil Kabupaten</a>
        <a href="/villages" class="active">Daftar Desa</a>
        <div style="height:8px"></div>
    </div>
</header>

    <main>
        <section class="hero" aria-label="Hero">
            <div class="hero-inner">
                <h1>Jelajahi Desa di Kabupaten Toba</h1>
                <p class="hero-subtitle">Sistem informasi terintegrasi kawasan Toba</p>

                <div class="hero-stats" role="list">
                    <div class="stat-item" role="listitem">
                        <span class="stat-number">{{ $totalVillages ?? 0 }}</span>
                        <span class="stat-label">Desa</span>
                    </div>
                    <div class="stat-item" role="listitem">
                        <span class="stat-number">{{ $totalPopulation ?? 0 }}</span>
                        <span class="stat-label">Penduduk</span>
                    </div>
                </div>
            </div>
        </section>

        <div class="search-wrap" aria-hidden="false">
            <div class="search-box" role="search">
                <i class="fa fa-magnifying-glass" aria-hidden="true"></i>
                <input id="searchInput" type="text" placeholder="Cari Desa" aria-label="Cari Desa">
            </div>
        </div>

        <div class="container">
            <div class="grid" id="villagesGrid">
                @foreach($villages as $v)
                <article class="card" data-name="{{ strtolower($v['name']) }}">
                    <div class="thumb"><img src="{{ $v['image'] }}" alt="Desa {{ $v['name'] }}"></div>
                    <div class="body">
                        <h3>{{ $v['name'] }}</h3>
                        <div class="small-meta">Desa • Informasi Umum</div>
                        <p>{{ $v['description'] }}</p>
                        <div class="meta">
                            <div class="mitem"><i class="fa fa-users" style="color:var(--primary)"></i> {{ $v['population'] ?? 0 }}</div>
                            <div class="mitem"><i class="fa fa-ruler-combined" style="color:var(--primary)"></i> {{ $v['area'] }}</div>
                            <div style="margin-left:auto"><a class="btn-outline" href="/villages/{{ $v['id'] }}">Lihat Detail</a></div>
                        </div>
                    </div>
                </article>
                @endforeach
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

        // mobile menu toggle
        (function(){
            const toggle = document.getElementById('navToggle');
            const mobile = document.getElementById('mobileMenu');
            toggle && toggle.addEventListener('click', function(e){
                const opened = mobile.classList.toggle('open');
                mobile.setAttribute('aria-hidden', String(!opened));
                this.setAttribute('aria-expanded', String(opened));
            });

            // close mobile menu when clicking outside
            document.addEventListener('click', function(e){
                const inside = mobile.contains(e.target) || toggle.contains(e.target);
                if (!inside && mobile.classList.contains('open')) {
                    mobile.classList.remove('open');
                    mobile.setAttribute('aria-hidden','true');
                    toggle.setAttribute('aria-expanded','false');
                }
            });
        })();
    </script>
    <!-- Footer -->
    @include('components.footer')
</body>
</html>
