<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [PatientProfileController::class, 'profile'])->name('profile');
Route::patch('/profile', [PatientProfileController::class, 'updateImage'])->name('update_image');
Route::put('/profile/update_info', [PatientProfileController::class, 'updateInfo'])->name('update_info');
Route::patch('/profile/update_password', [PatientProfileController::class, 'updatePassword'])->name('update_password');

require __DIR__ . '/auth.php';
