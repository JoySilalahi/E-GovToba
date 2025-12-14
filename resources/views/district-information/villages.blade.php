<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Toba Hita</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <style>
    :root{
      --primary:#0b79b8;
      --muted:#64748b;
      --bg:#eef6fb;
      --card:#ffffff;

      /* ✅ lebih lebar biar area pink berkurang */
      --max-w:1400px; /* sebelumnya 1100px */

      --nav-h:64px;
      --dark:#0f1724;
    }

    *{box-sizing:border-box;margin:0;padding:0}
    html,body{height:100%}
    body{
      font-family:'Poppins',system-ui,-apple-system,"Segoe UI",Roboto,Arial;
      color:#102030;
      background:var(--bg);
      -webkit-font-smoothing:antialiased;
    }
    a{color:inherit;text-decoration:none}

    /* NAV */
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
      box-shadow: 0 2px 8px rgba(2, 6, 23, 0.02);
    }
    .nav-inner{
      max-width:min(var(--max-w), 96vw); /* ✅ ikut melebar */
      margin:0 auto;
      width:100%;
      display:flex;
      align-items:center;
      gap:12px;
      padding:10px 16px;
      position:relative;
    }
    .brand{display:flex;align-items:center;gap:10px;flex:0 0 auto}
    .brand img{height:42px;width:auto;display:block}

    .nav-center{flex:1 1 auto; display:flex; justify-content:center}
    .nav-menu{
      display:flex;
      gap:28px;
      list-style:none;
      align-items:center;
      justify-content:center;
    }
    .nav-menu a{
      color:var(--muted);
      font-weight:600;
      padding:8px 10px;
      border-radius:10px;
      transition:all .12s;
    }
    .nav-menu a.active, .nav-menu a:hover{
      color:var(--primary);
      background:rgba(11,121,184,0.04);
      box-shadow:0 2px 8px rgba(11,121,184,0.04) inset;
    }

    .nav-actions{margin-left:auto; display:flex; gap:10px; align-items:center}
    .nav-toggle{
      display:none;
      background:transparent;
      border:0;
      font-size:20px;
      color:var(--dark);
      cursor:pointer;
      padding:8px 10px;
      border-radius:10px;
    }
    .nav-toggle:hover{background:rgba(2,6,23,0.04)}
    .mobile-menu{
      display:none;
      position:absolute;
      top:calc(100% + 1px);
      left:0;
      right:0;
      background:rgba(255,255,255,0.98);
      border-bottom:1px solid rgba(15,23,36,0.06);
      padding:12px 16px;
    }
    .mobile-menu.open{display:block}
    .mobile-menu a{
      display:block;
      padding:10px 6px;
      border-radius:8px;
      color:var(--dark);
      font-weight:600;
    }
    .mobile-menu a.active{color:var(--primary); background:rgba(11,121,184,0.04)}
    .mobile-menu a + a{margin-top:4px}

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
      max-width:1100px;
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
    .search-box{
      background:#fff;border-radius:12px;padding:12px 16px;
      display:flex;align-items:center;gap:12px;
      box-shadow:0 8px 24px rgba(2,6,23,0.06)
    }
    .search-box input{flex:1;border:0;outline:none;font-size:15px;font-family:inherit;color:#102030}
    .search-box .fa-magnifying-glass{color:var(--muted);font-size:16px}
    .search-count{font-size:13px;color:var(--muted);padding-left:8px}

    /* ✅ CONTAINER & GRID (biar tidak ngumpul di tengah) */
    .container{
      max-width:min(var(--max-w), 96vw); /* ✅ ikut melebar sesuai layar */
      margin:0 auto;
      padding:0 16px 80px;
    }

    .grid{
      display:grid;
      grid-template-columns:repeat(3,1fr);
      gap:20px;
    }

    /* ✅ layar besar: 4 kolom → empty space kiri-kanan jauh berkurang */
    @media (min-width:1280px){
      .grid{ grid-template-columns:repeat(4,1fr); }
    }

    .card{
      background:var(--card);
      border-radius:12px;
      overflow:hidden;
      box-shadow:0 10px 30px rgba(2,6,23,0.06);
      display:flex;
      flex-direction:column;
      min-height:330px;
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
      0% { border-color:transparent; box-shadow:0 10px 30px rgba(2,6,23,0.06); }
      50% { border-color:#0b79b8; box-shadow:0 0 0 12px rgba(11,121,184,0.6), 0 25px 70px rgba(11,121,184,0.5); }
      100% { border-color:#0b79b8; box-shadow:0 0 0 8px rgba(11,121,184,0.4), 0 20px 60px rgba(11,121,184,0.4); }
    }

    .card .thumb{height:160px;background:#eee;overflow:hidden}
    .card .thumb img{width:100%;height:100%;object-fit:cover;display:block}
    .card .body{padding:16px;flex:1;display:flex;flex-direction:column}
    .card h3{margin:0 0 8px;font-size:16px;color:#0f1724}
    .card p{margin:0 0 10px;color:var(--muted);font-size:13px;line-height:1.55;flex:1}

    .meta{
      display:flex;gap:10px;align-items:center;
      font-size:13px;color:var(--muted);
      padding-top:10px;border-top:1px solid #f1f5f9
    }
    .btn-outline{
      display:inline-block;padding:7px 12px;border-radius:10px;
      border:1px solid rgba(11,121,184,0.18);
      color:var(--primary);font-weight:600;font-size:13px;
      text-align:center;margin-top:10px;background:white;
      transition:all 0.2s ease
    }
    .btn-outline:hover{background:var(--primary);color:white;border-color:var(--primary);box-shadow:0 4px 12px rgba(11,121,184,0.25);transform:translateY(-1px)}
    .btn-outline:active{background:#096598;border-color:#096598;transform:translateY(0);box-shadow:0 2px 8px rgba(11,121,184,0.3)}
    .card .small-meta{display:flex;gap:12px;margin-top:8px;font-size:13px;color:var(--muted)}

    /* Footer */
    footer { background:#2c3e50; color:white; padding:40px 20px 25px; }
    .footer-container{
      max-width:1200px;margin:0 auto;display:grid;
      grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
      gap:40px;margin-bottom:25px;
    }
    .footer-section h4{font-size:16px;font-weight:600;margin-bottom:15px}
    .footer-section p,.footer-section a{font-size:13px;color:#cbd5e1;text-decoration:none;line-height:1.8}
    .footer-section a:hover{color:white}

    /* Responsive */
    @media (max-width:1000px){
      .grid{grid-template-columns:repeat(2,1fr)}
      .hero h1{font-size:36px}
      .search-wrap{margin-top:-24px}
      .nav-menu{gap:16px}
    }
    @media (max-width:640px){
      .nav-center{display:none;}
      .nav-toggle{display:inline-flex;}
      .grid{grid-template-columns:1fr}
      .hero{padding:40px 0 30px}
      .hero h1{font-size:28px}
      .search-wrap{margin:-18px auto 24px}
      .card .thumb{height:160px}
    }
  </style>
</head>

<body>
  <header class="site-nav" role="banner">
    <div class="nav-inner">
      <a class="brand" href="/" aria-label="Beranda Toba Hita">
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
        <button class="nav-toggle" id="navToggle" aria-label="Buka menu" aria-expanded="false">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
      </div>
    </div>

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
        <div class="search-count" id="resultCount">0 Desa</div>
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
              <div style="margin-left:auto">
                <a class="btn-outline" href="/villages/{{ $v['id'] }}">Lihat Detail</a>
              </div>
            </div>
          </div>
        </article>
        @endforeach
      </div>
    </div>
  </main>

  <script>
    // SEARCH FILTER
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
          } else {
            it.style.display = 'none';
          }
        });
        updateCount(visible);
      });

      updateCount(items.length);
    })();

    // MOBILE MENU TOGGLE
    (function(){
      const toggle = document.getElementById('navToggle');
      const mobile = document.getElementById('mobileMenu');

      toggle && toggle.addEventListener('click', function(){
        const opened = mobile.classList.toggle('open');
        mobile.setAttribute('aria-hidden', String(!opened));
        this.setAttribute('aria-expanded', String(opened));
      });

      document.addEventListener('click', function(e){
        const inside = mobile.contains(e.target) || toggle.contains(e.target);
        if (!inside && mobile.classList.contains('open')) {
          mobile.classList.remove('open');
          mobile.setAttribute('aria-hidden','true');
          toggle.setAttribute('aria-expanded','false');
        }
      });
    })();

    // BLUE HIGHLIGHT EFFECT (hanya card yang diklik)
    (function(){
      const buttons = document.querySelectorAll('.btn-outline');
      buttons.forEach(btn => {
        btn.addEventListener('click', function(e){
          e.preventDefault();
          const url = this.getAttribute('href');

          const card = this.closest('.card');
          if (card) card.classList.add('clicked');

          setTimeout(() => {
            window.location.href = url;
          }, 500);
        });
      });
    })();
  </script>

  @include('components.footer')
</body>
</html>