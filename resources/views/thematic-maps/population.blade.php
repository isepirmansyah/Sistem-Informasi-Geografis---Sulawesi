@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="p-6 bg-gradient-to-r from-blue-500 to-blue-600">
                <h1 class="text-2xl font-bold text-white">Peta Tematik Populasi Sulawesi</h1>
                <p class="text-blue-100 mt-2">Visualisasi persebaran penduduk di provinsi-provinsi Sulawesi</p>
            </div>

            <!-- Map Container -->
            <div class="p-6">
                <div id="map" class="w-full h-[600px] rounded-lg border border-gray-200"></div>
            </div>
        </div>
    </div>

    <style>
        .info {
            padding: 6px 8px;
            font: 14px/16px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        .info h4 {
            margin: 0 0 5px;
            color: #777;
        }

        .legend {
            line-height: 18px;
            color: #555;
        }

        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }
    </style>
@endsection

@push('scripts')
    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([-2.5489, 118.9213], 6);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Data provinsi dari controller
        var provinceData = @json($provinces);

        // Fungsi untuk mendapatkan warna berdasarkan populasi
        function getColor(d) {
            return d > 5000000 ? '#800026' :
                d > 2000000 ? '#BD0026' :
                d > 1000000 ? '#E31A1C' :
                d > 500000 ? '#FC4E2A' :
                d > 200000 ? '#FD8D3C' :
                d > 100000 ? '#FEB24C' :
                d > 50000 ? '#FED976' :
                '#FFEDA0';
        }

        // Fungsi style untuk polygon
        function style(feature) {
            var province = provinceData.find(function(p) {
                return feature.properties.Propinsi &&
                    p.name.toLowerCase().trim() === feature.properties.Propinsi.toLowerCase().trim();
            });

            if (!province) {
                console.warn('Provinsi tidak ditemukan:', feature.properties.Propinsi);
            }

            var population = province && province.thematic_data.length > 0 &&
                province.thematic_data[0].population ?
                province.thematic_data[0].population :
                0;

            if (population === 0) {
                console.warn('Populasi tidak ditemukan untuk:', feature.properties.Propinsi);
            }

            return {
                fillColor: getColor(population),
                weight: 2,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.7
            };
        }

        var geojson;

        function highlightFeature(e) {
            var layer = e.target;

            layer.setStyle({
                weight: 5,
                color: '#666',
                dashArray: '',
                fillOpacity: 0.7
            });

            layer.bringToFront();
            info.update(layer.feature.properties);
        }

        function resetHighlight(e) {
            geojson.resetStyle(e.target);
            info.update();
        }

        function zoomToFeature(e) {
            map.fitBounds(e.target.getBounds());
        }

        function onEachFeature(feature, layer) {
            layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight,
                click: zoomToFeature
            });
        }

        // Control untuk informasi
        var info = L.control();

        info.onAdd = function(map) {
            this._div = L.DomUtil.create('div', 'info');
            this.update();
            return this._div;
        };

        info.update = function(props) {
            if (!props) {
                this._div.innerHTML = '<h4>Informasi Provinsi</h4>Arahkan kursor ke provinsi';
                return;
            }

            var province = provinceData.find(function(p) {
                return props.Propinsi &&
                    p.name.toLowerCase().trim() === props.Propinsi.toLowerCase().trim();
            });

            var population = province && province.thematic_data.length > 0 &&
                province.thematic_data[0].population ?
                province.thematic_data[0].population :
                0;

            this._div.innerHTML = '<h4>Informasi Provinsi</h4>' +
                '<b>' + (props.Propinsi || 'Unknown') + '</b><br />' +
                population.toLocaleString('id-ID') + ' jiwa';
        };

        info.addTo(map);

        // Control untuk legend
        var legend = L.control({
            position: 'bottomright'
        });

        legend.onAdd = function(map) {
            var div = L.DomUtil.create('div', 'info legend');
            var grades = [0, 50000, 100000, 200000, 500000, 1000000, 2000000, 5000000];
            var labels = [];

            div.innerHTML = '<h4>Populasi (Jiwa)</h4>';

            for (var i = 0; i < grades.length; i++) {
                div.innerHTML +=
                    '<i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
                    grades[i].toLocaleString('id-ID') + (grades[i + 1] ? '&ndash;' + grades[i + 1].toLocaleString(
                        'id-ID') + '<br>' : '+');
            }

            return div;
        };

        legend.addTo(map);

        // Load file GeoJSON
        const provinceFiles = [{
                code: '71',
                file: '/geojson/SULAWESI UTARA.geojson'
            },
            {
                code: '72',
                file: '/geojson/SULAWESI TENGAH.geojson'
            },
            {
                code: '73',
                file: '/geojson/SULAWESI SELATAN.geojson'
            },
            {
                code: '74',
                file: '/geojson/SULAWESI TENGGARA.geojson'
            },
            {
                code: '75',
                file: '/geojson/GORONTALO.geojson'
            },
            {
                code: '76',
                file: '/geojson/SULAWESI BARAT.geojson'
            }
        ];

        provinceFiles.forEach(function(province) {
            fetch(province.file)
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    console.log('GeoJSON Properties:', data.features[0].properties);

                    var layer = L.geoJson(data, {
                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);

                    if (!geojson) {
                        geojson = layer;
                    }
                });
        });
    </script>
@endpush
