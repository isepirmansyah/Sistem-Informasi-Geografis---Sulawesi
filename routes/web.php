<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\ThematicMapController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/map', [MapController::class, 'index'])->name('map');
Route::get('/provinces', [MapController::class, 'provinces'])->name('provinces');


Route::get('/luas-wilayah', [ThematicMapController::class, 'area'])->name('thematic-maps.area');
Route::get('/populasi', [ThematicMapController::class, 'population'])->name('thematic-maps.population');
Route::get('/kepadatan-penduduk', [ThematicMapController::class, 'density'])->name('thematic-maps.density');
Route::get('/pengangguran', [ThematicMapController::class, 'unemployment'])->name('thematic-maps.unemployment');
Route::get('/ipm', [ThematicMapController::class, 'hdi'])->name('thematic-maps.hdi');
Route::get('/pendapatan', [ThematicMapController::class, 'income'])->name('thematic-maps.income');
Route::get('/kemiskinan', [ThematicMapController::class, 'poverty'])->name('thematic-maps.poverty');
Route::get('/pendidikan', [ThematicMapController::class, 'education'])->name('thematic-maps.education');
Route::get('/kesehatan', [ThematicMapController::class, 'health'])->name('thematic-maps.health');
Route::get('/data/{type}', [ThematicMapController::class, 'getProvinceData'])->name('thematic-maps.data');
