<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('owners', OwnerController::class);
use App\Http\Controllers\CarController;

Route::resource('cars', CarController::class);
