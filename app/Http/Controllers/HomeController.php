<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\ThematicData;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $provinces = Province::with(['thematicData' => function($query) {
            $query->where('year', 2024)->latest();
        }])->get();

        return view('home', compact('provinces'));
    }

    private function getProvinceData()
    {
        return [
            'Sulawesi Utara' => [
                'image' => 'sulut.jpg',
                'capital' => 'Manado',
                'population' => '2.6 Juta'
            ],
            'Sulawesi Tengah' => [
                'image' => 'sulteng.jpg',
                'capital' => 'Palu',
                'population' => '3.1 Juta'
            ],
            'Sulawesi Selatan' => [
                'image' => 'sulsel.jpg',
                'capital' => 'Makassar',
                'population' => '9.1 Juta'
            ],
            'Sulawesi Tenggara' => [
                'image' => 'sultra.jpg',
                'capital' => 'Kendari',
                'population' => '2.7 Juta'
            ],
            'Gorontalo' => [
                'image' => 'gorontalo.jpg',
                'capital' => 'Gorontalo',
                'population' => '1.2 Juta'
            ],
            'Sulawesi Barat' => [
                'image' => 'sulbar.jpg',
                'capital' => 'Mamuju',
                'population' => '1.4 Juta'
            ]
        ];
    }

    private function getDefaultProvinces()
    {
        return [
            [
                'id' => 1,
                'name' => 'Sulawesi Utara',
                'latitude' => 0.6274,
                'longitude' => 123.9750,
                'thematic_data' => [[
                    'population' => 2615126,
                    'area' => 13892,
                    'year' => 2024,
                    'schools' => 2156,
                    'hospitals' => 45,
                    'health_centers' => 233
                ]]
            ],
            [
                'id' => 2,
                'name' => 'Sulawesi Tengah',
                'latitude' => -1.4300,
                'longitude' => 121.4456,
                'thematic_data' => [[
                    'population' => 3107707,
                    'area' => 61841,
                    'year' => 2024,
                    'schools' => 2890,
                    'hospitals' => 38,
                    'health_centers' => 198
                ]]
            ],
            [
                'id' => 3,
                'name' => 'Sulawesi Selatan',
                'latitude' => -3.6687,
                'longitude' => 119.9740,
                'thematic_data' => [[
                    'population' => 9073509,
                    'area' => 46717,
                    'year' => 2024,
                    'schools' => 6789,
                    'hospitals' => 89,
                    'health_centers' => 445
                ]]
            ],
            [
                'id' => 4,
                'name' => 'Sulawesi Tenggara',
                'latitude' => -4.1449,
                'longitude' => 122.1746,
                'thematic_data' => [[
                    'population' => 2624875,
                    'area' => 38067,
                    'year' => 2024,
                    'schools' => 2345,
                    'hospitals' => 34,
                    'health_centers' => 189
                ]]
            ],
            [
                'id' => 5,
                'name' => 'Gorontalo',
                'latitude' => 0.5435,
                'longitude' => 123.0568,
                'thematic_data' => [[
                    'population' => 1171681,
                    'area' => 11257,
                    'year' => 2024,
                    'schools' => 987,
                    'hospitals' => 15,
                    'health_centers' => 98
                ]]
            ],
            [
                'id' => 6,
                'name' => 'Sulawesi Barat',
                'latitude' => -2.8441,
                'longitude' => 119.2321,
                'thematic_data' => [[
                    'population' => 1419229,
                    'area' => 16787,
                    'year' => 2024,
                    'schools' => 1234,
                    'hospitals' => 21,
                    'health_centers' => 156
                ]]
            ]
        ];
    }
} 