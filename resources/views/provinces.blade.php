@extends('layouts.app')

@section('content')
<div class="py-6 bg-gray-50">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Data Provinsi Indonesia</h1>
            <p class="mt-2 text-sm text-gray-600">Statistik dan data tematik provinsi-provinsi di Sulawesi</p>
        </div>

        <!-- Search and Filter Section -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="relative flex-1 max-w-md">
                    <input type="text" id="search" 
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Cari provinsi...">
                    <div class="absolute left-3 top-2.5">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2">
                    <select id="yearFilter" class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Semua Tahun</option>
                        @foreach($provinces->pluck('thematicData.*.year')->flatten()->unique()->sort() as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                    <button id="toggleColumns" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-200 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                        </svg>
                        Atur Kolom
                    </button>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-500">
                <div class="flex items-center">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-600">Total Provinsi</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $provinces->count() }}</p>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-full">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500">
                <div class="flex items-center">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-600">Total Penduduk</p>
                        <p class="text-2xl font-bold text-gray-900">
                            {{ number_format($provinces->sum(function($province) {
                                return $province->thematicData->first()?->population ?? 0;
                            }), 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-full">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-purple-500">
                <div class="flex items-center">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-600">Total Luas Wilayah</p>
                        <p class="text-2xl font-bold text-gray-900">
                            {{ number_format($provinces->sum(function($province) {
                                return $province->thematicData->first()?->area ?? 0;
                            }), 0, ',', '.') }} km²
                        </p>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-full">
                        <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-yellow-500">
                <div class="flex items-center">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-600">Rata-rata IPM</p>
                        <p class="text-2xl font-bold text-gray-900">
                            {{ number_format($provinces->avg(function($province) {
                                return $province->thematicData->first()?->human_development_index ?? 0;
                            }), 2, ',', '.') }}
                        </p>
                    </div>
                    <div class="p-3 bg-yellow-100 rounded-full">
                        <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Section dengan padding yang lebih baik -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="p-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Data Detail Provinsi</h3>
                <p class="text-sm text-gray-600">Scroll horizontal untuk melihat data lengkap</p>
            </div>
            <div class="p-6">
                <div class="overflow-x-auto rounded-lg border border-gray-200">
                    <div class="min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="sticky left-0 z-10 bg-gray-50 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-gray-200">
                                            <div class="flex items-center gap-2">
                                                No
                                                <button class="sort-btn" data-col="0">
                                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </th>
                                        <th scope="col" class="sticky left-16 z-10 bg-gray-50 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-gray-200">
                                            <div class="flex items-center gap-2">
                                                Provinsi
                                                <button class="sort-btn" data-col="1">
                                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penduduk</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Luas (km²)</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kepadatan</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengangguran (%)</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">IPM</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pendapatan per Kapita</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penduduk Miskin</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sekolah</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rumah Sakit</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Puskesmas</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200" id="provinceTableBody">
                                    @forelse($provinces as $index => $province)
                                        <tr class="hover:bg-blue-50 transition-colors duration-150">
                                            <td class="sticky left-0 z-10 bg-white px-6 py-4 whitespace-nowrap text-sm text-gray-500 border-r border-gray-200">
                                                <div class="font-medium">{{ $index + 1 }}</div>
                                            </td>
                                            <td class="sticky left-16 z-10 bg-white px-6 py-4 whitespace-nowrap border-r border-gray-200">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">{{ $province->name }}</div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <span class="font-medium">{{ $province->thematicData->first()?->year ?? '-' }}</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ $province->thematicData->first()?->population ? number_format($province->thematicData->first()->population, 0, ',', '.') : '-' }}
                                                </div>
                                                <div class="text-xs text-gray-500">Jiwa</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ $province->thematicData->first()?->area ? number_format($province->thematicData->first()->area, 2, ',', '.') : '-' }}
                                                </div>
                                                <div class="text-xs text-gray-500">km²</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ $province->thematicData->first()?->population_density ? number_format($province->thematicData->first()->population_density, 2, ',', '.') : '-' }}
                                                </div>
                                                <div class="text-xs text-gray-500">Jiwa/km²</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @php
                                                    $unemploymentRate = $province->thematicData->first()?->unemployment_rate ?? 0;
                                                    $colorClass = $unemploymentRate > 5 ? 'text-red-600' : 'text-green-600';
                                                @endphp
                                                <div class="text-sm {{ $colorClass }} font-medium">
                                                    {{ $unemploymentRate ? number_format($unemploymentRate, 2, ',', '.') . '%' : '-' }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @php
                                                    $ipm = $province->thematicData->first()?->human_development_index ?? 0;
                                                    $ipmColor = $ipm >= 70 ? 'text-green-600' : ($ipm >= 60 ? 'text-yellow-600' : 'text-red-600');
                                                @endphp
                                                <div class="text-sm {{ $ipmColor }} font-medium">
                                                    {{ $ipm ? number_format($ipm, 2, ',', '.') : '-' }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ $province->thematicData->first()?->per_capita_income ? 'Rp ' . number_format($province->thematicData->first()->per_capita_income, 0, ',', '.') : '-' }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ $province->thematicData->first()?->poor_population ? number_format($province->thematicData->first()->poor_population, 0, ',', '.') : '-' }}
                                                </div>
                                                <div class="text-xs text-gray-500">Jiwa</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ $province->thematicData->first()?->schools ?? '-' }}
                                                </div>
                                                <div class="text-xs text-gray-500">Unit</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ $province->thematicData->first()?->hospitals ?? '-' }}
                                                </div>
                                                <div class="text-xs text-gray-500">Unit</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ $province->thematicData->first()?->health_centers ?? '-' }}
                                                </div>
                                                <div class="text-xs text-gray-500">Unit</div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="14" class="px-6 py-4 text-center text-sm text-gray-500">
                                                Tidak ada data provinsi yang tersedia
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Fungsi pencarian yang ditingkatkan
document.getElementById('search').addEventListener('keyup', function() {
    let searchText = this.value.toLowerCase();
    let tableRows = document.querySelectorAll('#provinceTableBody tr');
    
    tableRows.forEach(row => {
        let searchableText = Array.from(row.querySelectorAll('td')).map(cell => cell.textContent.toLowerCase()).join(' ');
        if (searchableText.includes(searchText)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

// Fungsi filter tahun yang ditingkatkan
document.getElementById('yearFilter').addEventListener('change', function() {
    let yearValue = this.value;
    let tableRows = document.querySelectorAll('#provinceTableBody tr');
    
    tableRows.forEach(row => {
        let yearCell = row.querySelector('td:nth-child(4)').textContent.trim();
        if (yearValue === '' || yearCell === yearValue) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

// Fungsi pengurutan tabel
document.querySelectorAll('.sort-btn').forEach(button => {
    button.addEventListener('click', function() {
        const column = parseInt(this.dataset.col);
        const tbody = document.querySelector('#provinceTableBody');
        const rows = Array.from(tbody.querySelectorAll('tr'));
        
        // Toggle sort direction
        const isAscending = this.classList.toggle('sort-asc');
        
        // Sort rows
        rows.sort((a, b) => {
            let aValue = a.querySelectorAll('td')[column].textContent.trim();
            let bValue = b.querySelectorAll('td')[column].textContent.trim();
            
            // Handle numeric values
            if (!isNaN(aValue.replace(/[,.]/g, ''))) {
                aValue = parseFloat(aValue.replace(/[,.]/g, ''));
                bValue = parseFloat(bValue.replace(/[,.]/g, ''));
            }
            
            if (aValue === bValue) return 0;
            if (isAscending) {
                return aValue > bValue ? 1 : -1;
            } else {
                return aValue < bValue ? 1 : -1;
            }
        });
        
        // Reorder rows in the table
        rows.forEach(row => tbody.appendChild(row));
    });
});

// Toggle kolom visibility
document.getElementById('toggleColumns').addEventListener('click', function() {
    // Implementasi toggle kolom bisa ditambahkan di sini
    alert('Fitur pengaturan kolom akan segera hadir!');
});
</script>

<style>
/* Animasi hover untuk baris tabel */
#provinceTableBody tr {
    transition: all 0.2s ease-in-out;
}

#provinceTableBody tr:hover {
    transform: translateX(4px);
    box-shadow: -4px 0 0 0 #3b82f6;
}

/* Styling untuk tombol sort */
.sort-btn {
    opacity: 0.5;
    transition: all 0.2s ease-in-out;
}

.sort-btn:hover {
    opacity: 1;
}

.sort-btn.sort-asc svg {
    transform: rotate(180deg);
}

/* Custom scrollbar */
.overflow-x-auto {
    scrollbar-width: thin;
    scrollbar-color: #e5e7eb transparent;
}

.overflow-x-auto::-webkit-scrollbar {
    height: 8px;
}

.overflow-x-auto::-webkit-scrollbar-track {
    background: transparent;
}

.overflow-x-auto::-webkit-scrollbar-thumb {
    background-color: #e5e7eb;
    border-radius: 4px;
}

.overflow-x-auto::-webkit-scrollbar-thumb:hover {
    background-color: #d1d5db;
}

/* Tambahan styling untuk container tabel */
.overflow-x-auto {
    margin: 0 auto;
    scrollbar-width: thin;
    scrollbar-color: #e5e7eb transparent;
    border-radius: 0.5rem;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
}

/* Memperbaiki sticky columns saat scroll */
.sticky {
    position: sticky;
    background-color: inherit;
    z-index: 10;
}

/* Memperhalus transisi hover */
#provinceTableBody tr {
    transition: all 0.2s ease-in-out;
}

#provinceTableBody tr:hover {
    transform: translateX(4px);
    box-shadow: -4px 0 0 0 #3b82f6;
    background-color: #f8fafc;
}

/* Memperbaiki tampilan header */
thead th {
    background-color: #f9fafb;
    position: sticky;
    top: 0;
    z-index: 11;
}

/* Memperbaiki tampilan cell */
td, th {
    padding: 1rem;
    white-space: nowrap;
}

/* Styling untuk alternate rows */
#provinceTableBody tr:nth-child(even) {
    background-color: #f9fafb;
}

/* Hover effect untuk sort buttons */
.sort-btn {
    opacity: 0.5;
    transition: all 0.2s ease-in-out;
    padding: 0.25rem;
    border-radius: 0.25rem;
}

.sort-btn:hover {
    opacity: 1;
    background-color: #e5e7eb;
}

/* Memperbaiki tampilan scrollbar */
.overflow-x-auto::-webkit-scrollbar {
    height: 8px;
}

.overflow-x-auto::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

.overflow-x-auto::-webkit-scrollbar-thumb {
    background-color: #d1d5db;
    border-radius: 4px;
    border: 2px solid #f1f1f1;
}

.overflow-x-auto::-webkit-scrollbar-thumb:hover {
    background-color: #9ca3af;
}

/* Container styling */
.table-container {
    margin: 0 auto;
    max-width: 100%;
    overflow: hidden;
    border-radius: 0.5rem;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
}
</style>
@endsection
