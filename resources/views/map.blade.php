@extends('layouts.app')

@section('content')
    <div class="py-12 mt-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative">
                    <div id="map" style="height: 600px;"></div>
                    <div id="province-info" class="absolute top-4 right-4 bg-white p-4 rounded-lg shadow-lg">
                        Arahkan kursor ke provinsi
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const map = L.map('map').setView([-2.5489, 118.0149], 6);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        const provinces = @json($provinces);

        provinces.forEach(province => {
            const marker = L.marker([province.latitude, province.longitude])
                .bindPopup(createPopupContent(province))
                .addTo(map);
        });

        function createPopupContent(province) {
            const thematicData = province.thematic_data[0] || {};
            return `
                    <div>
                        <h3 class="font-bold text-lg">${province.name}</h3>
                        <div class="mt-2">
                            <div class="text-sm">
                                <span class="text-gray-600">Populasi:</span>
                                <span class="font-semibold">${thematicData.population?.toLocaleString() || 'N/A'}</span>
                            </div>
                            <div class="text-sm">
                                <span class="text-gray-600">Luas:</span>
                                <span class="font-semibold">${thematicData.area || 'N/A'} km²</span>
                            </div>
                        </div>
                    </div>
                `;
        }
    </script>
@endpush
