<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VolsController;
use App\Http\Controllers\AeroportsController;
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


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [VolsController::class, 'show']);
Route::get('/tableau', [VolsController::class, 'index']);

Route::get('/aeroport/index', [AeroportsController::class, 'index'])->name('aeroports.index');
Route::get('/aeroport/create', [AeroportsController::class, 'create'])->name('aeroports.create');
Route::post('/aeroport', [AeroportsController::class, 'store'])->name('aeroports.store');
Route::get('/aeroport/{aeroports}/edit', [AeroportsController::class, 'edit'])->name('aeroports.edit');
Route::put('/aeroport/{aeroports}/update', [AeroportsController::class, 'update'])->name('aeroports.update');
Route::delete('/aeroport/{aeroports}/destroy', [AeroportsController::class, 'destroy'])->name('aeroports.destroy');

