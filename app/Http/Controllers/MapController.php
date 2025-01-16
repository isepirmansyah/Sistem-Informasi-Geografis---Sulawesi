<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $provinces = Province::with(['thematicData' => function ($query) {
            $query->where('year', 2024)->latest();
        }])->get();

        return view('map', compact('provinces'));
    }

    public function provinces()
    {
        $provinces = Province::with(['thematicData' => function ($query) {
            $query->where('year', 2024)->latest();
        }])->get();

        return view('provinces', compact('provinces'));
    }
}
