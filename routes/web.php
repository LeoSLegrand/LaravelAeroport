<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VolsController;
use App\Http\Controllers\AeroportsController;
use App\Http\Controllers\CompagniesController;
use App\Http\Controllers\LanguageController;



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

//Page avec le login
 Route::get('/welcome', function () {
     return view('welcome');
 });

 Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

//Pages authentification
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Page Principal
    Route::get('/', [VolsController::class, 'show'])->name('aeroports.main');

    //Pages gestion aeroports
    Route::get('/aeroport/index', [AeroportsController::class, 'index'])->name('aeroports.index');
    Route::get('/aeroport/create', [AeroportsController::class, 'create'])->name('aeroports.create');
    Route::post('/aeroport', [AeroportsController::class, 'store'])->name('aeroports.store');
    Route::get('/aeroport/{aeroports}/edit', [AeroportsController::class, 'edit'])->name('aeroports.edit');
    Route::put('/aeroport/{aeroports}/update', [AeroportsController::class, 'update'])->name('aeroports.update');
    Route::delete('/aeroport/{aeroports}/destroy', [AeroportsController::class, 'destroy'])->name('aeroports.destroy');
        
    //Pages gestion company
    Route::get('/company/index', [CompagniesController::class, 'index'])->name('compagnies.index');
    Route::get('/company/create', [CompagniesController::class, 'create'])->name('compagnies.create');
    Route::post('/company', [CompagniesController::class, 'store'])->name('compagnies.store');
    Route::get('/company/{compagnies}/edit', [CompagniesController::class, 'edit'])->name('compagnies.edit');
    Route::put('/company/{compagnies}/update', [CompagniesController::class, 'update'])->name('compagnies.update');
    Route::delete('/company/{compagnies}/destroy', [CompagniesController::class, 'destroy'])->name('compagnies.destroy');

    //Pages gestion vol
    Route::get('/vol/index', [VolsController::class, 'index'])->name('vols.index');
    Route::get('/vol/create', [VolsController::class, 'create'])->name('vols.create');
    Route::post('/vol', [VolsController::class, 'store'])->name('vols.store');
    Route::get('/vol/{vols}/edit', [VolsController::class, 'edit'])->name('vols.edit');
    Route::put('/vol/{vols}/update', [VolsController::class, 'update'])->name('vols.update');
    Route::delete('/vol/{vols}/destroy', [VolsController::class, 'destroy'])->name('vols.destroy');
});

require __DIR__.'/auth.php';

Route::get('language/{code_iso}', [LanguageController::class, 'change'])->name('language.change');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
