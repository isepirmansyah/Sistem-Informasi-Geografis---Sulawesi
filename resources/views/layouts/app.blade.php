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
    </style>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">
    <!-- Floating Action Button untuk Quick Access -->
    <div class="fixed bottom-6 right-6 z-50">
        <div class="flex flex-col space-y-4">
            <button class="bg-green-500 text-white p-4 rounded-full shadow-lg hover:bg-green-600 transition-all"
                title="Quick Navigation">
                <i class="fas fa-compass text-xl"></i>
            </button>
            <button class="bg-blue-500 text-white p-4 rounded-full shadow-lg hover:bg-blue-600 transition-all"
                title="Download Data">
                <i class="fas fa-download text-xl"></i>
            </button>
        </div>
    </div>

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
                        <a href="{{ route('thematic-maps.area') }}" class="block px-4 py-2 hover:bg-green-50 hover:text-green-500">
                            <i class="fas fa-chart-area mr-2"></i>Peta Luas Wilayah
                        </a>
                        <a href="{{ route('thematic-maps.population') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-500">
                            <i class="fas fa-users mr-2"></i>Peta Populasi
                        </a>
                        <a href="{{ route('thematic-maps.density') }}" class="block px-4 py-2 hover:bg-purple-50 hover:text-purple-500">
                            <i class="fas fa-chart-pie mr-2"></i>Peta Kepadatan Penduduk
                        </a>
                        <a href="{{ route('thematic-maps.unemployment') }}" class="block px-4 py-2 hover:bg-red-50 hover:text-red-500">
                            <i class="fas fa-user-minus mr-2"></i>Peta Pengangguran
                        </a>
                        <a href="{{ route('thematic-maps.hdi') }}" class="block px-4 py-2 hover:bg-amber-50 hover:text-amber-500">
                            <i class="fas fa-chart-line mr-2"></i>Peta IPM
                        </a>
                        <a href="{{ route('thematic-maps.income') }}" class="block px-4 py-2 hover:bg-teal-50 hover:text-teal-500">
                            <i class="fas fa-money-bill-wave mr-2"></i>Peta Pendapatan
                        </a>
                        <a href="{{ route('thematic-maps.poverty') }}" class="block px-4 py-2 hover:bg-indigo-50 hover:text-indigo-500">
                            <i class="fas fa-hand-holding-usd mr-2"></i>Peta Kemiskinan
                        </a>
                        <a href="{{ route('thematic-maps.education') }}" class="block px-4 py-2 hover:bg-orange-50 hover:text-orange-500">
                            <i class="fas fa-school mr-2"></i>Peta Pendidikan
                        </a>
                        <a href="{{ route('thematic-maps.health') }}" class="block px-4 py-2 hover:bg-pink-50 hover:text-pink-500">
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
        <div id="menu-mobile" class="lg:hidden hidden bg-white shadow-lg absolute w-full">
            <div class="px-4 py-3 space-y-3">
                <a href="/" class="block hover:text-green-500">Beranda</a>
                <a href="#about" class="block hover:text-green-500">Tentang</a>
                <div class="relative">
                    <button class="w-full text-left hover:text-green-500 flex justify-between items-center"
                        onclick="toggleMobileDropdown()">
                        Peta Tematik
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div id="mobile-dropdown" class="hidden bg-gray-50 mt-2 py-2 px-4 rounded-lg">
                        <a href="/peta/demografi" class="block py-2 hover:text-green-500">Peta Demografi</a>
                        <a href="/peta/pendidikan" class="block py-2 hover:text-green-500">Peta Pendidikan</a>
                        <a href="/peta/kesehatan" class="block py-2 hover:text-green-500">Peta Kesehatan</a>
                        <a href="/peta/ekonomi" class="block py-2 hover:text-green-500">Peta Ekonomi</a>
                        <a href="/peta/infrastruktur" class="block py-2 hover:text-green-500">Peta Infrastruktur</a>
                    </div>
                </div>
                <a href="#statistics" class="block hover:text-green-500">Statistik</a>
                <a href="#contact" class="block hover:text-green-500">Kontak</a>
                <button class="w-full bg-green-500 text-white py-2 rounded-full hover:bg-green-600">
                    Login
                </button>
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
                <p>&copy; 2024 SIG Sulawesi. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/three@0.132.2/build/three.min.js"></script>
    <script src="https://unpkg.com/@turf/turf@6.5.0/turf.min.js"></script>

    @stack('scripts')

</body>

</html>
