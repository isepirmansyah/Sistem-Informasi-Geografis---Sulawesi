@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="p-6 bg-gradient-to-r from-orange-500 to-orange-600">
                <h1 class="text-2xl font-bold text-white">Peta Tematik Pendidikan Sulawesi</h1>
                <p class="text-orange-100 mt-2">Visualisasi jumlah sekolah di provinsi-provinsi Sulawesi</p>
            </div>

            <!-- Map Container -->
            <div id="map-container" class="p-6">
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
        var map = L.map('map').setView([-2.5489, 118.9213], 6);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var provinceData = @json($provinces);

        function sanitizeName(name) {
            if (!name) return '';
            return name.toLowerCase().trim().replace(/[^a-z0-9]/g, '');
        }

        function getColor(d) {
            const grades = [3000, 4000, 6000, 8000, 12000];
            const colors = ['#ffb74d', '#ffa726', '#ff9800', '#fb8c00', '#f57c00'];

            for (let i = 0; i < grades.length; i++) {
                if (d <= grades[i]) {
                    return colors[i];
                }
            }
            return '#e65100';
        }

        function style(feature) {
            var province = provinceData.find(function(p) {
                return feature.properties.name && sanitizeName(p.name) === sanitizeName(feature.properties.name);
            });

            let schools = 0;
            if (province && province.thematic_data && province.thematic_data.length > 0 && province.thematic_data[0] &&
                province.thematic_data[0].schools) {
                schools = parseFloat(province.thematic_data[0].schools);
            }

            return {
                fillColor: getColor(schools),
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
                return props.name && sanitizeName(p.name) === sanitizeName(props.name);
            });

            let schools = 0;
            if (province && province.thematic_data && province.thematic_data.length > 0 && province.thematic_data[0] &&
                province.thematic_data[0].schools) {
                schools = parseFloat(province.thematic_data[0].schools);
            }

            this._div.innerHTML = '<h4>Informasi Provinsi</h4>' +
                '<b>' + (props.name || 'Unknown') + '</b><br />' +
                schools.toLocaleString('id-ID') + ' sekolah';
        };

        info.addTo(map);

        var legend = L.control({
            position: 'bottomright'
        });

        legend.onAdd = function(map) {
            var div = L.DomUtil.create('div', 'info legend');
            const grades = [3000, 4000, 6000, 8000, 12000];
            const colors = ['#ffb74d', '#ffa726', '#ff9800', '#fb8c00', '#f57c00'];
            div.innerHTML = '<h4>Jumlah Sekolah</h4>';
            for (let i = 0; i < grades.length; i++) {
                div.innerHTML +=
                    `<i style="background:${colors[i]}"></i>` +
                    (grades[i - 1] ? grades[i - 1].toLocaleString('id-ID') + ' - ' : '') +
                    grades[i].toLocaleString('id-ID') + '<br>';
            }
            div.innerHTML += `<i style="background:#e65100"></i>` + grades[grades.length - 1].toLocaleString('id-ID') +
                '+';
            return div;
        };

        legend.addTo(map);

        const provinceFiles = [{
            code: '71',
            file: '/geojson/SULAWESI UTARA.geojson'
        }, {
            code: '72',
            file: '/geojson/SULAWESI TENGAH.geojson'
        }, {
            code: '73',
            file: '/geojson/SULAWESI SELATAN.geojson'
        }, {
            code: '74',
            file: '/geojson/SULAWESI TENGGARA.geojson'
        }, {
            code: '75',
            file: '/geojson/GORONTALO.geojson'
        }, {
            code: '76',
            file: '/geojson/SULAWESI BARAT.geojson'
        }];

        provinceFiles.forEach(function(province) {
            fetch(province.file)
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
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