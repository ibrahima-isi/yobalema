<?php

use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin') -> name("admin.")
    -> middleware('auth')
    -> group( function () {

        Route::resource('role', RoleUserController::class);
        Route::resource('vehicule', \App\Http\Controllers\VehiculeController::class);
        Route::resource('user', UserController::class);
        Route::resource('chauffeur', ChauffeurController::class);
        Route::resource('contrat', \App\Http\Controllers\ContratController::class);
        Route::resource('location', \App\Http\Controllers\LocationController::class);
        Route::resource('client', UserController::class);
});


require __DIR__.'/auth.php';
