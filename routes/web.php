<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Only logged in users can view
Route::middleware(['auth'])->group(function () {
    Route::get('owners', [OwnerController::class, 'index'])->name('owners.index');
    Route::get('cars', [CarController::class, 'index'])->name('cars.index');
});

// Only editors can create, edit, delete
Route::middleware(['auth', 'role:editor'])->group(function () {
    Route::get('cars/create', [CarController::class, 'create'])->name('cars.create');
    Route::post('cars', [CarController::class, 'store'])->name('cars.store');
    Route::get('cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
    Route::put('cars/{car}', [CarController::class, 'update'])->name('cars.update');
    Route::delete('cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');

    Route::get('owners/create', [OwnerController::class, 'create'])->name('owners.create');
    Route::post('owners', [OwnerController::class, 'store'])->name('owners.store');
    Route::get('owners/{owner}/edit', [OwnerController::class, 'edit'])->name('owners.edit');
    Route::put('owners/{owner}', [OwnerController::class, 'update'])->name('owners.update');
    Route::delete('owners/{owner}', [OwnerController::class, 'destroy'])->name('owners.destroy');
});
