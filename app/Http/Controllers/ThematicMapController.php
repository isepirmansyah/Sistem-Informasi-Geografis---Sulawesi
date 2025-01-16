<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class ThematicMapController extends Controller
{
    public function index()
    {
        return view('thematic-maps.index');
    }

    public function population()
    {
        $provinces = Province::with(['thematicData' => function ($query) {
            $query->where('year', 2024)->latest();
        }])->get();

        return view('thematic-maps.population', compact('provinces'));
    }

    public function density()
    {
        $provinces = Province::with(['thematicData' => function ($query) {
            $query->where('year', 2024)->latest();
        }])->get();

        return view('thematic-maps.density', compact('provinces'));
    }

    public function unemployment()
    {
        $provinces = Province::with(['thematicData' => function ($query) {
            $query->where('year', 2024)->latest();
        }])->get();

        return view('thematic-maps.unemployment', compact('provinces'));
    }

    public function hdi()
    {
        $provinces = Province::with(['thematicData' => function ($query) {
            $query->where('year', 2024)->latest();
        }])->get();

        return view('thematic-maps.hdi', compact('provinces'));
    }

    public function income()
    {
        $provinces = Province::with(['thematicData' => function ($query) {
            $query->where('year', 2024)->latest();
        }])->get();

        return view('thematic-maps.income', compact('provinces'));
    }

    public function poverty()
    {
        $provinces = Province::with(['thematicData' => function ($query) {
            $query->where('year', 2024)->latest();
        }])->get();

        return view('thematic-maps.poverty', compact('provinces'));
    }

    public function education()
    {
        $provinces = Province::with(['thematicData' => function ($query) {
            $query->where('year', 2024)->latest();
        }])->get();

        return view('thematic-maps.education', compact('provinces'));
    }

    public function health()
    {
        $provinces = Province::with(['thematicData' => function ($query) {
            $query->where('year', 2024)->latest();
        }])->get();

        return view('thematic-maps.health', compact('provinces'));
    }

    public function getProvinceData($type)
    {
        $provinces = Province::with(['thematicData' => function ($query) {
            $query->where('year', 2024)->latest();
        }])->get();

        $data = [];
        foreach ($provinces as $province) {
            $thematicData = $province->thematicData->first();
            if ($thematicData) {
                $value = match($type) {
                    'population' => $thematicData->population,
                    'density' => $thematicData->population_density,
                    'unemployment' => $thematicData->unemployment_rate,
                    'hdi' => $thematicData->human_development_index,
                    'income' => $thematicData->per_capita_income,
                    'poverty' => $thematicData->poor_population,
                    'education' => $thematicData->schools,
                    'health' => $thematicData->hospitals + $thematicData->health_centers,
                    default => null
                };

                if ($value !== null) {
                    $data[] = [
                        'province_id' => $province->id,
                        'name' => $province->name,
                        'value' => $value
                    ];
                }
            }
        }

        return response()->json($data);
    }
} 