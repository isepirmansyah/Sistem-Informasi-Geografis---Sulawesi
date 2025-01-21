<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIG Provinsi Sulawesi</title>
    <!-- CSS Dependencies -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        ::-webkit-scrollbar {
            width: 15px;
            border-radius: 25px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 30px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #bbb;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .map-container {
            height: 80vh;
            min-height: 600px;
            position: relative;
        }

        #map {
            z-index: 1;
        }


        .hero-gradient {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.7));
        }

        .stat-card {
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .province-card {
            background: linear-gradient(145deg, #ffffff, #f3f4f6);
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .province-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transform: translateX(-100%);
            transition: 0.5s;
        }

        .province-card:hover::after {
            transform: translateX(100%);
        }

        .province-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.1);
        }

        .province-image-container {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto;
            border-radius: 50%;
            overflow: hidden;
            background: linear-gradient(145deg, #f3f4f6, #ffffff);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .province-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .province-card:hover .province-image {
            transform: scale(1.1);
        }

        .custom-button {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            z-index: 1;
        }

        .custom-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            transition: width 0.3s ease;
            z-index: -1;
        }

        .custom-button:hover::before {
            width: 100%;
        }

        .gradient-text {
            background: linear-gradient(45deg, #10B981, #3B82F6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .leaflet-popup-content-wrapper {
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .leaflet-popup-content {
            margin: 0;
            padding: 1rem;
        }

        .leaflet-container {
            font: inherit;
        }

        .text-blk {
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
            line-height: 25px;
        }

        .responsive-cell-block {
            min-height: 75px;
        }

        .responsive-container-block {
            min-height: 75px;
            height: fit-content;
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            margin-top: 0px;
            margin-right: auto;
            margin-bottom: 0px;
            margin-left: auto;
            justify-content: space-evenly;
        }

        .outer-container {
            padding-top: 10px;
            padding-right: 50px;
            padding-bottom: 10px;
            padding-left: 50px;
            background-color: rgb(244, 252, 255);
        }

        .inner-container {
            max-width: 1320px;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
            margin-right: auto;
            margin-bottom: 50px;
            margin-left: auto;
        }

        .section-head-text {
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 5px;
            margin-left: 0px;
            font-size: 35px;
            font-weight: 700;
            line-height: 48px;
            color: rgb(0, 135, 177);
            margin: 0 0 10px 0;
        }

        .section-subhead-text {
            font-size: 25px;
            color: rgb(153, 153, 153);
            line-height: 35px;
            max-width: 470px;
            text-align: center;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 60px;
            margin-left: 0px;
        }

        .img-wrapper {
            text-align: center;
            margin: 20px;
        }

        .team-card {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .social-media-links {
            width: 125px;
            display: flex;
            justify-content: space-between;
        }

        .name {
            font-size: 22px;
            font-weight: 700;
            color: rgb(102, 102, 102);
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 5px;
            margin-left: 0px;
            text-align: center;
        }

        .position {
            font-size: 20px;
            font-weight: 700;
            color: rgb(0, 135, 177);
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 50px;
            margin-left: 0px;
        }

        .role-badge {
            font-size: 15px;
            color: rgb(102, 102, 102);
            margin-left: 8px;
            display: inline-block;
            vertical-align: middle;
        }

        .team-img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
        }

        .team-card-container {
            width: 280px;
            margin: 0 0 40px 0;
        }

        .social-media-links a {
            color: #666;
            font-size: 1.5rem;
            margin: 0 10px;
            transition: all 0.3s ease;
        }

        .social-media-links a:hover {
            transform: translateY(-3px);
        }

        .social-media-links a:hover .fa-twitter {
            color: #1DA1F2;
        }

        .social-media-links a:hover .fa-facebook {
            color: #4267B2;
        }

        .social-media-links a:hover .fa-instagram {
            color: #E1306C;
        }

        .social-media-links a:hover .fa-github {
            color: #333;
        }

        @media (max-width: 500px) {
            .outer-container {
                padding: 10px 20px 10px 20px;
            }

            .section-head-text {
                text-align: center;
            }
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- Navigation Menu yang Ditingkatkan -->
    <nav class="bg-white/90 backdrop-blur-md shadow-lg fixed w-full z-50 top-0">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <a href="/" class="text-2xl font-bold text-green-600 flex items-center space-x-2">
                <i class="fas fa-globe-asia text-yellow-500"></i>
                <span>SIG Sulawesi</span>
            </a>
            <div class="hidden lg:flex space-x-8">
                <a href="/" class="hover:text-green-500 transition duration-300">Beranda</a>
                <a href="#about" class="hover:text-green-500 transition duration-300">Tentang</a>

                <!-- Dropdown Menu Peta Tematik -->
                <div class="dropdown relative group">
                    <button class="hover:text-green-500 transition duration-300 flex items-center">
                        Peta Tematik
                        <i class="fas fa-chevron-down ml-1 text-sm"></i>
                    </button>
                    <div class="dropdown-menu absolute hidden bg-white mt-2 py-2 w-56 rounded-lg shadow-xl">
                        <a href="{{ route('thematic-maps.area') }}"
                            class="block px-4 py-2 hover:bg-green-50 hover:text-green-500">
                            <i class="fas fa-chart-area mr-2"></i>Peta Luas Wilayah
                        </a>
                        <a href="{{ route('thematic-maps.population') }}"
                            class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-500">
                            <i class="fas fa-users mr-2"></i>Peta Populasi
                        </a>
                        <a href="{{ route('thematic-maps.density') }}"
                            class="block px-4 py-2 hover:bg-purple-50 hover:text-purple-500">
                            <i class="fas fa-chart-pie mr-2"></i>Peta Kepadatan
                        </a>
                        <a href="{{ route('thematic-maps.unemployment') }}"
                            class="block px-4 py-2 hover:bg-red-50 hover:text-red-500">
                            <i class="fas fa-user-minus mr-2"></i>Peta Pengangguran
                        </a>
                        <a href="{{ route('thematic-maps.hdi') }}"
                            class="block px-4 py-2 hover:bg-amber-50 hover:text-amber-500">
                            <i class="fas fa-chart-line mr-2"></i>Peta IPM
                        </a>
                        <a href="{{ route('thematic-maps.income') }}"
                            class="block px-4 py-2 hover:bg-teal-50 hover:text-teal-500">
                            <i class="fas fa-money-bill-wave mr-2"></i>Peta Pendapatan
                        </a>
                        <a href="{{ route('thematic-maps.poverty') }}"
                            class="block px-4 py-2 hover:bg-indigo-50 hover:text-indigo-500">
                            <i class="fas fa-hand-holding-usd mr-2"></i>Peta Kemiskinan
                        </a>
                        <a href="{{ route('thematic-maps.education') }}"
                            class="block px-4 py-2 hover:bg-orange-50 hover:text-orange-500">
                            <i class="fas fa-school mr-2"></i>Peta Pendidikan
                        </a>
                        <a href="{{ route('thematic-maps.health') }}"
                            class="block px-4 py-2 hover:bg-pink-50 hover:text-pink-500">
                            <i class="fas fa-hospital mr-2"></i>Peta Kesehatan
                        </a>
                    </div>
                </div>

                <div class="dropdown relative group">
                    <button class="hover:text-green-500 transition duration-300 flex items-center">
                        Data Sulawesi
                        <i class="fas fa-chevron-down ml-1 text-sm"></i>
                    </button>
                    <div class="dropdown-menu absolute hidden bg-white mt-2 py-2 w-56 rounded-lg shadow-xl">
                        <a href="{{ route('map') }}" class="block px-4 py-2 hover:bg-green-50 hover:text-green-500">
                            <i class="fas fa-map-location-dot mr-2"></i>Peta Sulawesi
                        </a>
                        <a href="{{ route('provinces') }}"
                            class="block px-4 py-2 hover:bg-green-50 hover:text-green-500">
                            <i class="fas fa-map-signs mr-2"></i>Data Provinsi
                        </a>
                    </div>
                </div>

                <a href="#statistics" class="hover:text-green-500 transition duration-300">Statistik</a>
                <a href="#contact" class="hover:text-green-500 transition duration-300">Kontak</a>
                <a href="{{ route('team') }}" class="block hover:text-green-500">About</a>
            </div>

            <a href="/admin/login"
                class="bg-green-500 text-white px-6 py-2 rounded-full hover:bg-green-600 transition duration-300 hidden lg:block">
                Login
            </a>

            <button class="text-gray-600 lg:hidden" id="menu-toggle">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="lg:hidden hidden bg-white shadow-lg absolute w-full">
            <div class="px-4 py-3 space-y-3">
                <a href="/" class="block hover:text-green-500">Beranda</a>
                <a href="#about" class="block hover:text-green-500">Tentang</a>
                
                <!-- Dropdown Peta Tematik -->
                <div class="relative">
                    <button class="w-full text-left hover:text-green-500 flex justify-between items-center mobile-dropdown-toggle">
                        Peta Tematik
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="mobile-dropdown-menu hidden bg-gray-50 mt-2 py-2 px-4 rounded-lg">
                        <a href="{{ route('thematic-maps.area') }}" class="block py-2 hover:text-green-500">
                            <i class="fas fa-chart-area mr-2"></i>Peta Luas Wilayah
                        </a>
                        <a href="{{ route('thematic-maps.population') }}" class="block py-2 hover:text-green-500">
                            <i class="fas fa-users mr-2"></i>Peta Populasi
                        </a>
                        <a href="{{ route('thematic-maps.density') }}" class="block py-2 hover:text-green-500">
                            <i class="fas fa-chart-pie mr-2"></i>Peta Kepadatan
                        </a>
                        <a href="{{ route('thematic-maps.unemployment') }}" class="block py-2 hover:text-green-500">
                            <i class="fas fa-user-minus mr-2"></i>Peta Pengangguran
                        </a>
                        <a href="{{ route('thematic-maps.hdi') }}" class="block py-2 hover:text-green-500">
                            <i class="fas fa-chart-line mr-2"></i>Peta IPM
                        </a>
                        <a href="{{ route('thematic-maps.income') }}" class="block py-2 hover:text-green-500">
                            <i class="fas fa-money-bill-wave mr-2"></i>Peta Pendapatan
                        </a>
                        <a href="{{ route('thematic-maps.poverty') }}" class="block py-2 hover:text-green-500">
                            <i class="fas fa-hand-holding-usd mr-2"></i>Peta Kemiskinan
                        </a>
                        <a href="{{ route('thematic-maps.education') }}" class="block py-2 hover:text-green-500">
                            <i class="fas fa-school mr-2"></i>Peta Pendidikan
                        </a>
                        <a href="{{ route('thematic-maps.health') }}" class="block py-2 hover:text-green-500">
                            <i class="fas fa-hospital mr-2"></i>Peta Kesehatan
                        </a>
                    </div>
                </div>

                <!-- Dropdown Data Sulawesi -->
                <div class="relative">
                    <button class="w-full text-left hover:text-green-500 flex justify-between items-center mobile-dropdown-toggle">
                        Data Sulawesi
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="mobile-dropdown-menu hidden bg-gray-50 mt-2 py-2 px-4 rounded-lg">
                        <a href="{{ route('map') }}" class="block py-2 hover:text-green-500">
                            <i class="fas fa-map-location-dot mr-2"></i>Peta Sulawesi
                        </a>
                        <a href="{{ route('provinces') }}" class="block py-2 hover:text-green-500">
                            <i class="fas fa-map-signs mr-2"></i>Data Provinsi
                        </a>
                    </div>
                </div>

                <a href="#statistics" class="block hover:text-green-500">Statistik</a>
                <a href="#contact" class="block hover:text-green-500">Kontak</a>
                <a href="{{ route('team') }}" class="block hover:text-green-500">About</a>
                <a href="/admin/login" class="block w-full bg-green-500 text-white py-2 rounded-full hover:bg-green-600 text-center mt-4">
                    Login
                </a>
            </div>
        </div>
    </nav>

    <main class="pt-16">
        @yield('content')
    </main>

    <!-- Footer yang Ditingkatkan -->
    <footer id="contact" class="bg-gray-900 text-white py-16">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">SIG Sulawesi</h3>
                    <p class="text-gray-400">Sistem informasi geografis untuk analisis dan visualisasi data wilayah
                        Sulawesi.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Tautan</h3>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-gray-400 hover:text-white">Beranda</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-white">Tentang</a></li>
                        <li><a href="#map" class="text-gray-400 hover:text-white">Peta</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Kontak</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><i class="fas fa-envelope mr-2"></i> info@sigsulawesi.id</li>
                        <li><i class="fas fa-phone mr-2"></i> (021) 1234-5678</li>
                        <li><i class="fas fa-map-marker-alt mr-2"></i> Makassar, Sulawesi Selatan</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Media Sosial</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i
                                class="fab fa-facebook text-2xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i
                                class="fab fa-twitter text-2xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i
                                class="fab fa-instagram text-2xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i
                                class="fab fa-youtube text-2xl"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p class="mb-2">Dibuat dengan <i class="fas fa-heart text-red-500"></i> dan <i
                        class="fas fa-mug-hot text-brown-500"></i> oleh IsepWebTim</p>
                <p>&copy; 2024 SIG Sulawesi. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/three@0.132.2/build/three.min.js"></script>
    <script src="https://unpkg.com/@turf/turf@6.5.0/turf.min.js"></script>

    <!-- Mobile Menu Script -->
    <script>
        // Toggle Mobile Menu
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Toggle Mobile Dropdowns
        const mobileDropdownToggles = document.querySelectorAll('.mobile-dropdown-toggle');
        
        mobileDropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', (e) => {
                const dropdownMenu = e.currentTarget.nextElementSibling;
                const icon = e.currentTarget.querySelector('.fa-chevron-down');
                
                // Close other dropdowns
                mobileDropdownToggles.forEach(otherToggle => {
                    if (otherToggle !== toggle) {
                        const otherMenu = otherToggle.nextElementSibling;
                        const otherIcon = otherToggle.querySelector('.fa-chevron-down');
                        otherMenu.classList.add('hidden');
                        otherIcon.style.transform = 'rotate(0deg)';
                    }
                });

                // Toggle current dropdown
                dropdownMenu.classList.toggle('hidden');
                if (dropdownMenu.classList.contains('hidden')) {
                    icon.style.transform = 'rotate(0deg)';
                } else {
                    icon.style.transform = 'rotate(180deg)';
                }
            });
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!mobileMenu.contains(e.target) && !menuToggle.contains(e.target)) {
                mobileMenu.classList.add('hidden');
            }
        });

        // Close mobile menu when window is resized to desktop view
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) { // lg breakpoint
                mobileMenu.classList.add('hidden');
            }
        });
    </script>

    @stack('scripts')

</body>

</html>
