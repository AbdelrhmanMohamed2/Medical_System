<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PatientProfileController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [PatientProfileController::class, 'profile'])->name('profile');
Route::patch('/profile', [PatientProfileController::class, 'updateImage'])->name('update_image');
Route::put('/profile/update_info', [PatientProfileController::class, 'updateInfo'])->name('update_info');
Route::patch('/profile/update_password', [PatientProfileController::class, 'updatePassword'])->name('update_password');

Route::post('/send-message', [MessageController::class, 'store'])->name('send_message');
require __DIR__ . '/auth.php';
