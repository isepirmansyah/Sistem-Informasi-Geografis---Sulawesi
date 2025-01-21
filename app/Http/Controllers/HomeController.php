<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil data provinsi dengan thematic data
        $provinces = Province::with(['thematicData' => function ($query) {
            $query->where('year', 2024)->latest();
        }])->get();

        // Menghitung statistik agregat
        $statistics = $this->calculateStatistics($provinces);

        // Memformat data provinsi untuk ditampilkan
        $formattedProvinces = $provinces->map(function ($province) {
            $thematicData = $province->thematicData->first();
            return [
                'name' => $province->name,
                'image' => $province->image,
                'capital' => $this->getProvinceCapital($province->name),
                'population' => $this->formatPopulation($thematicData->population ?? 0),
                'latitude' => $province->latitude,
                'longitude' => $province->longitude,
                'area' => number_format($thematicData->area ?? 0, 0, ',', '.') . ' km²',
                'population_density' => number_format($thematicData->population_density ?? 0, 0, ',', '.') . ' jiwa/km²',
                'unemployment_rate' => number_format($thematicData->unemployment_rate ?? 0, 1) . '%',
                'human_development_index' => number_format($thematicData->human_development_index ?? 0, 2),
                'per_capita_income' => 'Rp ' . number_format($thematicData->per_capita_income ?? 0, 0, ',', '.'),
                'poor_population' => number_format($thematicData->poor_population ?? 0),
                'schools' => number_format($thematicData->schools ?? 0, 0, ',', '.'),
                'hospitals' => number_format($thematicData->hospitals ?? 0, 0, ',', '.'),
                'health_centers' => number_format($thematicData->health_centers ?? 0, 0, ',', '.')
            ];
        })->keyBy('name');

        return view('home', compact('formattedProvinces', 'statistics'));
    }

    private function calculateStatistics($provinces)
    {
        $totalPopulation = 0;
        $totalArea = 0;
        $totalSchools = 0;
        $totalHospitals = 0;
        $totalHealthCenters = 0;
        $totalPoorPopulation = 0;
        $totalPerCapitaIncome = 0;
        $avgUnemploymentRate = 0;
        $avgHDI = 0;
        $validProvinces = 0;

        foreach ($provinces as $province) {
            $thematicData = $province->thematicData->first();
            if ($thematicData) {
                $totalPopulation += $thematicData->population ?? 0;
                $totalArea += $thematicData->area ?? 0;
                $totalSchools += $thematicData->schools ?? 0;
                $totalHospitals += $thematicData->hospitals ?? 0;
                $totalHealthCenters += $thematicData->health_centers ?? 0;
                $totalPoorPopulation += $thematicData->poor_population ?? 0;
                $totalPerCapitaIncome += $thematicData->per_capita_income ?? 0;
                $avgUnemploymentRate += $thematicData->unemployment_rate ?? 0;
                $avgHDI += $thematicData->human_development_index ?? 0;
                $validProvinces++;
            }
        }

        return [
            'total_population' => $this->formatPopulation($totalPopulation),
            'total_area' => number_format($totalArea, 0, ',', '.') . ' km²',
            'population_growth' => '2.3%',
            'total_schools' => number_format($totalSchools, 0, ',', '.'),
            'total_hospitals' => number_format($totalHospitals, 0, ',', '.'),
            'total_health_centers' => number_format($totalHealthCenters, 0, ',', '.'),
            'avg_unemployment_rate' => number_format($avgUnemploymentRate / ($validProvinces ?: 1), 1) . '%',
            'avg_hdi' => number_format($avgHDI / ($validProvinces ?: 1), 2),
            'total_poor_population' => $totalPoorPopulation,
            'avg_per_capita_income' => 'Rp ' . number_format($totalPerCapitaIncome / ($validProvinces ?: 1), 0, ',', '.'),
            'province_count' => $validProvinces,
            'land_percentage' => '85%',
            'water_percentage' => '15%'
        ];
    }

    private function getProvinceCapital($provinceName)
    {
        $capitals = [
            'SULAWESI UTARA' => 'Manado',
            'SULAWESI TENGAH' => 'Palu',
            'SULAWESI SELATAN' => 'Makassar',
            'SULAWESI TENGGARA' => 'Kendari',
            'GORONTALO' => 'Gorontalo',
            'SULAWESI BARAT' => 'Mamuju'
        ];

        return $capitals[$provinceName] ?? '';
    }

    private function formatPopulation($population)
    {
        return number_format($population / 1000000, 1) . ' Juta';
    }
}
