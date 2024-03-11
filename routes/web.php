<?php

use App\Http\Controllers\Admin\ChauffeurController;
use App\Http\Controllers\Admin\ContratController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\RoleUserController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VehiculeController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\ProfileController;
use App\Services\OpenWeatherMapService;
use Illuminate\Support\Facades\Route;

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

Route::get('/coordonne', [\App\Http\Controllers\CityController::class, 'testWeather']);

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get("/profile", [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin') -> name("admin.")
    -> middleware('auth')
    -> group( function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            -> name('dashboard')  ;
        Route::resource('role', RoleUserController::class)->except('show');
        Route::resource('vehicule', VehiculeController::class);
        Route::resource('user', UserController::class);
        Route::resource('chauffeur', ChauffeurController::class);
        Route::resource('contrat', ContratController::class);
        Route::resource('location', LocationController::class);
        Route::resource('client', ClientController::class);
});

require __DIR__.'/auth.php';
