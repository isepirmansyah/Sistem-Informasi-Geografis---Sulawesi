@extends('layouts.app')

@section('content')
    <!-- Hero Section yang Ditingkatkan -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <video autoplay loop muted playsinline class="absolute w-full h-full object-cover">
            <source src="/video/vid.mp4" type="video/mp4">
        </video>
        <div class="hero-gradient absolute inset-0"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <h1 class="text-5xl md:text-6xl font-bold text-white mb-8 leading-tight">
                        Eksplorasi Data<br>
                        <span class="text-green-400">Sulawesi</span> Modern
                    </h1>
                    <p class="text-xl text-gray-200 mb-12">
                        Platform SIG terdepan untuk analisis dan visualisasi data geografis
                        Pulau Sulawesi dengan teknologi modern.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#map"
                            class="group bg-green-500 text-white py-4 px-8 rounded-full text-lg font-semibold
                           hover:bg-green-600 transition flex items-center space-x-2">
                            <span>Jelajahi Peta</span>
                            <i class="fas fa-arrow-right transition-transform group-hover:translate-x-2"></i>
                        </a>
                        <a href="#features"
                            class="bg-white/10 backdrop-blur-md text-white py-4 px-8 rounded-full
                           text-lg font-semibold hover:bg-white/20 transition border border-white/30">
                            Pelajari Fitur
                        </a>
                    </div>
                </div>
                <div class="hidden md:block" data-aos="fade-left">
                    <img src="/images/3d.svg" alt="3D Map"
                        class="w-full max-w-lg mx-auto
                         transform hover:scale-105 transition duration-500">
                </div>
            </div>
        </div>
        <div class="custom-shape-divider">
            <svg viewBox="0 0 1440 100" preserveAspectRatio="none">
                <path
                    d="M0,32L48,37.3C96,43,192,53,288,58.7C384,64,480,64,576,58.7C672,53,768,43,864,42.7C960,43,1056,53,1152,58.7C1248,64,1344,64,1392,64L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg>
        </div>
    </section>

    <!-- Highlight Features Section yang Dilengkapi -->
    <section id="about" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold mb-4 gradient-text">Fitur Unggulan</h2>
                <p class="text-xl text-gray-600">Teknologi modern untuk analisis data geografis yang lebih baik</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Fitur 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-map-marked-alt text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Peta Interaktif 3D</h3>
                    <p class="text-gray-600 mb-4">Visualisasi data geografis dengan tampilan 3D yang interaktif dan
                        detail.</p>
                    <ul class="text-gray-600 space-y-2">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Rotasi 360
                            derajat</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Zoom detail
                            wilayah</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Layer interaktif
                        </li>
                    </ul>
                </div>

                <!-- Fitur 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-chart-pie text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Analisis Data Real-time</h3>
                    <p class="text-gray-600 mb-4">Analisis data statistik secara real-time dengan visualisasi
                        interaktif.</p>
                    <ul class="text-gray-600 space-y-2">
                        <li class="flex items-center"><i class="fas fa-check text-blue-500 mr-2"></i>Update data
                            otomatis</li>
                        <li class="flex items-center"><i class="fas fa-check text-blue-500 mr-2"></i>Grafik interaktif
                        </li>
                        <li class="flex items-center"><i class="fas fa-check text-blue-500 mr-2"></i>Export data</li>
                    </ul>
                </div>

                <!-- Fitur 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all" data-aos="fade-up"
                    data-aos-delay="300">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-layer-group text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Multi-Layer Analysis</h3>
                    <p class="text-gray-600 mb-4">Analisis multi-layer untuk pemahaman data yang lebih komprehensif.
                    </p>
                    <ul class="text-gray-600 space-y-2">
                        <li class="flex items-center"><i class="fas fa-check text-purple-500 mr-2"></i>Layer
                            comparison</li>
                        <li class="flex items-center"><i class="fas fa-check text-purple-500 mr-2"></i>Custom overlay
                        </li>
                        <li class="flex items-center"><i class="fas fa-check text-purple-500 mr-2"></i>Filter layer
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Provinsi Quick Access yang Ditingkatkan -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold mb-4 gradient-text">Provinsi Sulawesi</h2>
                <p class="text-xl text-gray-600">Jelajahi data spesifik untuk setiap provinsi</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                @php
                    $provinceData = [
                        'Sulawesi Utara' => [
                            'image' => 'sulut.jpg',
                            'capital' => 'Manado',
                            'population' => '2.6 Juta',
                        ],
                        'Sulawesi Tengah' => [
                            'image' => 'sulteng.jpg',
                            'capital' => 'Palu',
                            'population' => '3.1 Juta',
                        ],
                        'Sulawesi Selatan' => [
                            'image' => 'sulsel.jpg',
                            'capital' => 'Makassar',
                            'population' => '9.1 Juta',
                        ],
                        'Sulawesi Tenggara' => [
                            'image' => 'sultra.jpg',
                            'capital' => 'Kendari',
                            'population' => '2.7 Juta',
                        ],
                        'Gorontalo' => [
                            'image' => 'gorontalo.jpg',
                            'capital' => 'Gorontalo',
                            'population' => '1.2 Juta',
                        ],
                        'Sulawesi Barat' => [
                            'image' => 'sulbar.jpg',
                            'capital' => 'Mamuju',
                            'population' => '1.4 Juta',
                        ],
                    ];
                @endphp

                @foreach ($provinceData as $name => $data)
                    <div class="province-card p-6 rounded-xl" data-aos="fade-up" data-aos-delay="100">
                        <div class="province-image-container mb-6">
                            <img src="{{ asset('images/provinces/' . $data['image']) }}" alt="{{ $name }}"
                                class="province-image"
                                onerror="this.onerror=null; this.parentElement.innerHTML='<i class=\'fas fa-map-marked-alt text-4xl text-green-500 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2\'></i>'">
                        </div>
                        <h3 class="font-bold text-lg mb-2">{{ $name }}</h3>
                        <p class="text-sm text-gray-500 mb-2">{{ $data['capital'] }}</p>
                        <p class="text-xs text-gray-400">{{ $data['population'] }} penduduk</p>
                        <button onclick="showProvinceDetails('{{ $name }}')"
                            class="mt-4 w-full bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600
                                   transition-all custom-button">
                            Detail
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Statistics Section yang Dilengkapi -->
    <section id="statistics" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold mb-4 gradient-text">Statistik Wilayah</h2>
                <p class="text-xl text-gray-600">Data statistik terkini dari seluruh wilayah Sulawesi</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Statistik Penduduk -->
                <div class="stat-card bg-white rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="inline-flex p-4 rounded-full bg-green-100 mb-6">
                        <i class="fas fa-users text-3xl text-green-500"></i>
                    </div>
                    <h3 class="text-3xl font-bold mb-2">19.5 Juta</h3>
                    <p class="text-gray-600">Total Penduduk</p>
                    <div class="mt-4">
                        <span class="text-green-500 text-sm">
                            <i class="fas fa-arrow-up"></i> 2.3% dari tahun lalu
                        </span>
                    </div>
                    <div class="mt-4 pt-4 border-t">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Pria</span>
                            <span class="font-semibold">52%</span>
                        </div>
                        <div class="flex justify-between text-sm mt-2">
                            <span class="text-gray-500">Wanita</span>
                            <span class="font-semibold">48%</span>
                        </div>
                    </div>
                </div>

                <!-- Statistik Wilayah -->
                <div class="stat-card bg-white rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="inline-flex p-4 rounded-full bg-blue-100 mb-6">
                        <i class="fas fa-map-marked text-3xl text-blue-500"></i>
                    </div>
                    <h3 class="text-3xl font-bold mb-2">174,600 km²</h3>
                    <p class="text-gray-600">Luas Wilayah</p>
                    <div class="mt-4">
                        <span class="text-blue-500 text-sm">
                            6 Provinsi
                        </span>
                    </div>
                    <div class="mt-4 pt-4 border-t">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Daratan</span>
                            <span class="font-semibold">85%</span>
                        </div>
                        <div class="flex justify-between text-sm mt-2">
                            <span class="text-gray-500">Perairan</span>
                            <span class="font-semibold">15%</span>
                        </div>
                    </div>
                </div>

                <!-- Statistik Ekonomi -->
                <div class="stat-card bg-white rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="inline-flex p-4 rounded-full bg-yellow-100 mb-6">
                        <i class="fas fa-chart-line text-3xl text-yellow-500"></i>
                    </div>
                    <h3 class="text-3xl font-bold mb-2">Rp 892 T</h3>
                    <p class="text-gray-600">PDRB</p>
                    <div class="mt-4">
                        <span class="text-yellow-500 text-sm">
                            <i class="fas fa-arrow-up"></i> 5.2% pertumbuhan
                        </span>
                    </div>
                    <div class="mt-4 pt-4 border-t">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Industri</span>
                            <span class="font-semibold">45%</span>
                        </div>
                        <div class="flex justify-between text-sm mt-2">
                            <span class="text-gray-500">Pertanian</span>
                            <span class="font-semibold">35%</span>
                        </div>
                    </div>
                </div>

                <!-- Statistik Pendidikan -->
                <div class="stat-card bg-white rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="400">
                    <div class="inline-flex p-4 rounded-full bg-purple-100 mb-6">
                        <i class="fas fa-graduation-cap text-3xl text-purple-500"></i>
                    </div>
                    <h3 class="text-3xl font-bold mb-2">98.5%</h3>
                    <p class="text-gray-600">Angka Melek Huruf</p>
                    <div class="mt-4">
                        <span class="text-purple-500 text-sm">
                            <i class="fas fa-arrow-up"></i> 1.5% peningkatan
                        </span>
                    </div>
                    <div class="mt-4 pt-4 border-t">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">SD-SMP</span>
                            <span class="font-semibold">99%</span>
                        </div>
                        <div class="flex justify-between text-sm mt-2">
                            <span class="text-gray-500">SMA-PT</span>
                            <span class="font-semibold">78%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Inisialisasi AOS
        AOS.init({
            duration: 1000,
            once: true
        });


        // Fungsi untuk menampilkan detail provinsi
        function showProvinceDetails(provinceName) {
            // Buat modal untuk menampilkan detail
            const modalHtml = `
                <div id="provinceModal" class="fixed inset-0 z-50 flex items-center justify-center p-4">
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                    <div class="relative bg-white rounded-xl shadow-2xl max-w-2xl w-full mx-4 overflow-hidden">
                        <div class="p-6">
                            <h2 class="text-2xl font-bold mb-4">${provinceName}</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <img src="/images/provinces/${provinceName.toLowerCase().replace(/ /g, '-')}.jpg"
                                         class="w-full h-48 object-cover rounded-lg"
                                         alt="${provinceName}">
                                </div>
                                <div>
                                    <h3 class="font-bold mb-2">Statistik</h3>
                                    <ul class="space-y-2">
                                        <li class="flex justify-between">
                                            <span class="text-gray-600">Populasi:</span>
                                            <span class="font-semibold">${getProvinceData(provinceName).population}</span>
                                        </li>
                                        <li class="flex justify-between">
                                            <span class="text-gray-600">Ibu Kota:</span>
                                            <span class="font-semibold">${getProvinceData(provinceName).capital}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-6 flex justify-end">
                                <button onclick="closeProvinceModal()"
                                        class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition-all">
                                    Tutup
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            document.body.insertAdjacentHTML('beforeend', modalHtml);
        }

        function closeProvinceModal() {
            document.getElementById('provinceModal').remove();
        }

        function getProvinceData(provinceName) {
            const provinceData = {
                'Sulawesi Utara': {
                    population: '2.6 Juta',
                    capital: 'Manado'
                },
                'Sulawesi Tengah': {
                    population: '3.1 Juta',
                    capital: 'Palu'
                },
                'Sulawesi Selatan': {
                    population: '9.1 Juta',
                    capital: 'Makassar'
                },
                'Sulawesi Tenggara': {
                    population: '2.7 Juta',
                    capital: 'Kendari'
                },
                'Gorontalo': {
                    population: '1.2 Juta',
                    capital: 'Gorontalo'
                },
                'Sulawesi Barat': {
                    population: '1.4 Juta',
                    capital: 'Mamuju'
                }
            };
            return provinceData[provinceName];
        }
    </script>
@endpush
