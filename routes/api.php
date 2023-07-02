<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    SpecialtyController,
    DoctorController,
    AdminController,
    AuthController,
    PatientController,
    ExaminationController,
};


Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum', 'IsAdmin'])->group(function () {
    Route::controller(SpecialtyController::class)->prefix('specialties')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('/{specialty}', 'show');
        Route::put('/{specialty}', 'update');
        Route::delete('/{specialty}', 'destroy');
    });

    Route::controller(DoctorController::class)->prefix('doctors')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('/{doctor}', 'show');
        Route::put('/{doctor}', 'update');
        Route::delete('/{doctor}', 'destroy');
    });

    Route::controller(AdminController::class)->prefix('admins')->group(function () {
        Route::get('/', 'index');
        Route::get('/{user}', 'show');
        Route::post('/', 'store');
        Route::put('/{user}', 'update');
        Route::delete('/{user}', 'destroy');
    });
});

Route::middleware(['auth:sanctum', 'IsAdminOrDoctor'])->group(function () {
    Route::controller(PatientController::class)->prefix('patients')->group(function () {
        Route::get('/', 'index');
        Route::get('/{patient}', 'show');
        Route::post('/', 'store');
        Route::put('/{patient}', 'update');
        Route::delete('/{patient}', 'destroy');
    });

    Route::controller(ExaminationController::class)->prefix('examinations')->group(function () {
        Route::middleware(['IsDoctor'])->group(function () {
            Route::post('/', 'store');
            Route::put('/{examination}', 'update');
        });
        Route::get('/', 'getAllExaminations');
        Route::get('/patient/{patient}', 'index');
        Route::get('/{examination}', 'show');
        Route::delete('/{examination}', 'destroy');
        Route::get('/download/{examination}', 'download');
        Route::get('/downloadPDF/{examination}', 'downloadPDF');
    });
});
