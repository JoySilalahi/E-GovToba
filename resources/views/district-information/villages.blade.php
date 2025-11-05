<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Desa - Kabupaten Toba</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        /* Navbar */
        .navbar {
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            padding: 0;
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 20px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #1e293b;
        }

        .navbar-brand img {
            width: 50px;
            height: auto;
        }

        .navbar-menu {
            display: flex;
            list-style: none;
            gap: 35px;
            align-items: center;
        }

        .navbar-menu a {
            text-decoration: none;
            color: #64748b;
            font-weight: 500;
            font-size: 14px;
            transition: color 0.3s;
        }

        .navbar-menu a:hover,
        .navbar-menu a.active {
            color: #0077B6;
        }

        /* Hero Section */
        .hero {
            /* Danau Toba view background with three-color overlay */
            background: linear-gradient(135deg, rgba(25,80,122,0.6) 0%, rgba(129,167,211,0.35) 57%, rgba(255,255,255,0) 100%), url('{{ asset('images/danau-toba.jpg') }}');
            background-size: cover;
            /* shift focus further downward so the lake is more visible */
            background-position: center 65%;
            color: white;
            text-align: center;
            padding: 80px 20px 60px;
        }

        .hero h1 {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .hero-subtitle {
            font-size: 16px;
            font-weight: 400;
            margin-bottom: 30px;
            opacity: 0.95;
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 80px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 36px;
            font-weight: 700;
            display: block;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 13px;
            opacity: 0.9;
        }

        /* Main Content */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        /* Main Content */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .village-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }

        /* Search Box */
        .search-container {
            max-width: 600px;
            margin: 0 auto 40px;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 14px 20px 14px 50px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }

        .search-input:focus {
            outline: none;
            border-color: #0077B6;
            box-shadow: 0 0 0 3px rgba(0, 119, 182, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 16px;
        }

        .clear-search {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            font-size: 18px;
            padding: 5px;
            display: none;
            transition: color 0.2s;
        }

        .clear-search:hover {
            color: #64748b;
        }

        /* Autocomplete Dropdown */
        .autocomplete-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid #e2e8f0;
            border-top: none;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            max-height: 350px;
            overflow-y: auto;
            display: none;
            z-index: 1000;
            margin-top: -10px;
        }

        .autocomplete-dropdown.show {
            display: block;
        }

        .autocomplete-section {
            padding: 8px 0;
        }

        .autocomplete-section:not(:last-child) {
            border-bottom: 1px solid #e2e8f0;
        }

        .autocomplete-header {
            padding: 8px 20px;
            font-size: 11px;
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .clear-history {
            background: none;
            border: none;
            color: #ef4444;
            cursor: pointer;
            font-size: 10px;
            padding: 2px 6px;
            border-radius: 4px;
            transition: background 0.2s;
        }

        .clear-history:hover {
            background: #fee2e2;
        }

        .autocomplete-item {
            padding: 12px 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: background 0.2s;
            border-left: 3px solid transparent;
        }

        .autocomplete-item:hover {
            background: #f8fafc;
            border-left-color: #0077B6;
        }

        .autocomplete-item.active {
            background: #eff6ff;
            border-left-color: #0077B6;
        }

        .autocomplete-icon {
            font-size: 16px;
            color: #94a3b8;
        }

        .autocomplete-item.history .autocomplete-icon {
            color: #8b5cf6;
        }

        .autocomplete-text {
            flex: 1;
        }

        .autocomplete-name {
            font-size: 14px;
            color: #1e293b;
            font-weight: 500;
        }

        .autocomplete-meta {
            font-size: 11px;
            color: #94a3b8;
            margin-top: 2px;
        }

        .autocomplete-match {
            background: #fef3c7;
            font-weight: 600;
        }

        .no-results {
            padding: 20px;
            text-align: center;
            color: #94a3b8;
            font-size: 13px;
        }

        /* Scrollbar styling */
        .autocomplete-dropdown::-webkit-scrollbar {
            width: 6px;
        }

        .autocomplete-dropdown::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        .autocomplete-dropdown::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        .autocomplete-dropdown::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Village Grid */
        .villages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .village-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }

        .village-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }

        .village-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .village-content {
            padding: 20px;
        }

        .village-name {
            font-size: 18px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 10px;
        }

        .village-description {
            font-size: 13px;
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .village-stats {
            display: flex;
            gap: 20px;
            padding-top: 15px;
            border-top: 1px solid #e2e8f0;
        }

        .stat {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            color: #475569;
        }

        .stat-icon {
            color: #0077B6;
            font-size: 14px;
        }

        .btn-detail {
            display: block;
            width: 100%;
            padding: 10px;
            background: white;
            color: #0077B6;
            border: 1px solid #0077B6;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s;
            font-family: 'Poppins', sans-serif;
            margin-top: 15px;
        }

        .btn-detail:hover {
            background: #0077B6;
            color: white;
        }

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

        .footer-logo {
            width: 55px;
            margin-bottom: 15px;
        }

        .social-links {
            display: flex;
            gap: 12px;
            margin-top: 15px;
        }

        .social-links a {
            width: 35px;
            height: 35px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s;
        }

        .social-links a:hover {
            background: #0077B6;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
            font-size: 12px;
            color: #94a3b8;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 32px;
            }

            .villages-grid {
                grid-template-columns: 1fr;
            }

            .navbar-menu {
                gap: 20px;
                font-size: 13px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Toba Hita">
                <span style="font-weight: 600; font-size: 18px;">Toba Hita</span>
            </a>
            <ul class="navbar-menu">
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li><a href="{{ route('district.profile') }}">Profil Kabupaten</a></li>
                <li><a href="{{ route('district.villages') }}" class="active">Daftar Desa</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Jelajahi Desa di Kabupaten Toba</h1>
        <p class="hero-subtitle">Sistem Informasi Terintegrasi Kawasan Toba</p>
        
        <div class="hero-stats">
            <div class="stat-item">
                <span class="stat-number">{{ number_format($totalVillages) }}</span>
                <span class="stat-label">Desa</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">{{ number_format($totalPopulation) }}</span>
                <span class="stat-label">Penduduk</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Search Box -->
        <div class="search-container">
            <svg class="search-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            <input type="text" class="search-input" placeholder="Cari Desa" id="searchInput" autocomplete="off">
            <button class="clear-search" id="clearSearch">&times;</button>
            
            <!-- Autocomplete Dropdown -->
            <div class="autocomplete-dropdown" id="autocompleteDropdown">
                <!-- Will be populated by JavaScript -->
            </div>
        </div>

        <!-- Villages Grid -->
        <div class="villages-grid" id="villagesGrid">
            @foreach($villages as $village)
            <div class="village-card" data-name="{{ strtolower($village['name']) }}">
                <img src="{{ asset('images/' . $village['image']) }}" alt="{{ $village['name'] }}" class="village-image">
                <div class="village-content">
                    <h3 class="village-name">{{ $village['name'] }}</h3>
                    <p class="village-description">{{ $village['description'] }}</p>
                    
                    <div class="village-stats">
                        <div class="stat">
                            <span class="stat-icon">👥</span>
                            <span>Penduduk: {{ number_format($village['population']) }}</span>
                        </div>
                        <div class="stat">
                            <span class="stat-icon">📏</span>
                            <span>Luas: {{ $village['area'] }}</span>
                        </div>
                    </div>
                    
                    <a href="{{ route('district.village.detail', $village['id']) }}" class="btn-detail">Lihat Detail</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="footer-logo">
                <p>
                    Portal Informasi terintegrasi untuk mengelola dan 
                    pelayanan administrasi desa di Kabupaten Toba. 
                    Melayani dengan hati untuk masyarakat yang lebih sejahtera.
                </p>
            </div>
            
            <div class="footer-section">
                <h4>Hubungi Kami</h4>
                <p>📍 Jl. Sisingamangaraja No. 1<br>
                   Balige, Kabupaten Toba<br>
                   Sumatera Utara 22381</p>
                <p>📞 +12 3456 7890<br>
                   📧 tobainf@email.com</p>
            </div>
            
            <div class="footer-section">
                <h4>Ikuti Kami</h4>
                <div class="social-links">
                    <a href="#" title="Facebook">f</a>
                    <a href="#" title="Twitter">𝕏</a>
                    <a href="#" title="Instagram">📷</a>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            © 2025 Pemerintah Kabupaten Toba Hita. Hak Cipta Dilindungi
        </div>
    </footer>

    <script>
        // Village data for autocomplete
        const villages = [
            @foreach($villages as $village)
            {
                id: {{ $village['id'] }},
                name: '{{ $village['name'] }}',
                description: '{{ $village['description'] }}',
                population: '{{ number_format($village['population']) }}',
                area: '{{ $village['area'] }}',
                url: '{{ route('district.village.detail', $village['id']) }}'
            },
            @endforeach
        ];

        // Search history management
        class SearchHistory {
            constructor() {
                this.storageKey = 'villageSearchHistory';
                this.maxItems = 5;
            }

            get() {
                const history = localStorage.getItem(this.storageKey);
                return history ? JSON.parse(history) : [];
            }

            add(village) {
                let history = this.get();
                
                // Remove if already exists
                history = history.filter(item => item.id !== village.id);
                
                // Add to beginning
                history.unshift({
                    id: village.id,
                    name: village.name,
                    timestamp: new Date().getTime()
                });
                
                // Keep only max items
                history = history.slice(0, this.maxItems);
                
                localStorage.setItem(this.storageKey, JSON.stringify(history));
            }

            clear() {
                localStorage.removeItem(this.storageKey);
            }
        }

        const searchHistory = new SearchHistory();
        const searchInput = document.getElementById('searchInput');
        const clearSearchBtn = document.getElementById('clearSearch');
        const dropdown = document.getElementById('autocompleteDropdown');
        let activeIndex = -1;
        let currentMatches = [];

        // Highlight matching text
        function highlightMatch(text, query) {
            if (!query) return text;
            const regex = new RegExp(`(${query})`, 'gi');
            return text.replace(regex, '<span class="autocomplete-match">$1</span>');
        }

        // Filter villages based on search
        function filterVillages(query) {
            if (!query) return [];
            
            const lowerQuery = query.toLowerCase();
            return villages.filter(village => 
                village.name.toLowerCase().includes(lowerQuery)
            );
        }

        // Render autocomplete dropdown
        function renderAutocomplete(query) {
            const matches = filterVillages(query);
            const history = searchHistory.get();
            
            currentMatches = matches;
            activeIndex = -1;

            let html = '';

            // Show history if no query
            if (!query && history.length > 0) {
                html += '<div class="autocomplete-section">';
                html += '<div class="autocomplete-header">';
                html += '<span>Pencarian Terakhir</span>';
                html += '<button class="clear-history" onclick="clearHistory()">Hapus</button>';
                html += '</div>';
                
                history.forEach(item => {
                    const village = villages.find(v => v.id === item.id);
                    if (village) {
                        html += `
                            <div class="autocomplete-item history" data-id="${village.id}">
                                <span class="autocomplete-icon">🕐</span>
                                <div class="autocomplete-text">
                                    <div class="autocomplete-name">${village.name}</div>
                                    <div class="autocomplete-meta">${village.population} penduduk • ${village.area}</div>
                                </div>
                            </div>
                        `;
                    }
                });
                html += '</div>';
            }

            // Show matching results
            if (query) {
                if (matches.length > 0) {
                    html += '<div class="autocomplete-section">';
                    html += '<div class="autocomplete-header">Hasil Pencarian</div>';
                    
                    matches.forEach(village => {
                        html += `
                            <div class="autocomplete-item" data-id="${village.id}">
                                <span class="autocomplete-icon">📍</span>
                                <div class="autocomplete-text">
                                    <div class="autocomplete-name">${highlightMatch(village.name, query)}</div>
                                    <div class="autocomplete-meta">${village.population} penduduk • ${village.area}</div>
                                </div>
                            </div>
                        `;
                    });
                    html += '</div>';
                } else {
                    html = '<div class="no-results">Tidak ada desa yang ditemukan</div>';
                }
            }

            dropdown.innerHTML = html;

            // Add click handlers to items
            dropdown.querySelectorAll('.autocomplete-item').forEach(item => {
                item.addEventListener('click', () => {
                    const villageId = parseInt(item.dataset.id);
                    selectVillage(villageId);
                });
            });

            // Show or hide dropdown
            if (html) {
                dropdown.classList.add('show');
            } else {
                dropdown.classList.remove('show');
            }
        }

        // Select a village
        function selectVillage(villageId) {
            const village = villages.find(v => v.id === villageId);
            if (village) {
                searchHistory.add(village);
                window.location.href = village.url;
            }
        }

        // Clear search history
        function clearHistory() {
            searchHistory.clear();
            renderAutocomplete('');
        }

        // Navigate with keyboard
        function navigateDropdown(direction) {
            const items = dropdown.querySelectorAll('.autocomplete-item');
            if (items.length === 0) return;

            // Remove current active
            if (activeIndex >= 0 && activeIndex < items.length) {
                items[activeIndex].classList.remove('active');
            }

            // Update index
            if (direction === 'down') {
                activeIndex = (activeIndex + 1) % items.length;
            } else if (direction === 'up') {
                activeIndex = activeIndex <= 0 ? items.length - 1 : activeIndex - 1;
            }

            // Add new active
            items[activeIndex].classList.add('active');
            items[activeIndex].scrollIntoView({ block: 'nearest' });
        }

        // Filter visible village cards
        function filterVisibleCards(query) {
            const villageCards = document.querySelectorAll('.village-card');
            const lowerQuery = query.toLowerCase();
            
            villageCards.forEach(card => {
                const villageName = card.getAttribute('data-name');
                if (villageName.includes(lowerQuery)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Event listeners
        searchInput.addEventListener('input', (e) => {
            const query = e.target.value;
            
            // Show/hide clear button
            clearSearchBtn.style.display = query ? 'block' : 'none';
            
            // Update autocomplete
            renderAutocomplete(query);
            
            // Filter cards
            filterVisibleCards(query);
        });

        searchInput.addEventListener('focus', () => {
            renderAutocomplete(searchInput.value);
        });

        searchInput.addEventListener('keydown', (e) => {
            if (!dropdown.classList.contains('show')) return;

            if (e.key === 'ArrowDown') {
                e.preventDefault();
                navigateDropdown('down');
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                navigateDropdown('up');
            } else if (e.key === 'Enter') {
                e.preventDefault();
                const items = dropdown.querySelectorAll('.autocomplete-item');
                if (activeIndex >= 0 && activeIndex < items.length) {
                    const villageId = parseInt(items[activeIndex].dataset.id);
                    selectVillage(villageId);
                }
            } else if (e.key === 'Escape') {
                dropdown.classList.remove('show');
            }
        });

        clearSearchBtn.addEventListener('click', () => {
            searchInput.value = '';
            clearSearchBtn.style.display = 'none';
            dropdown.classList.remove('show');
            filterVisibleCards('');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.search-container')) {
                dropdown.classList.remove('show');
            }
        });
    </script>
</body>
</html>
