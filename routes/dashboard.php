<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    DashboardController,
    DoctorController,
    SpecialtyController,
};
use App\Http\Controllers\PatientController;

Route::middleware(['auth', 'IsAdminOrDoctor'])->prefix('dashboard')->name('dashboard.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::controller(SpecialtyController::class)->prefix('specialties')->name('specialty.')->group(function () {

        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{specialty}/edit', 'edit')->name('edit');
        Route::put('/{specialty}', 'update')->name('update');
        Route::delete('/{specialty}', 'destroy')->name('destroy');
    });

    Route::controller(DoctorController::class)->prefix('doctors')->name('doctors.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{doctor}/edit', 'edit')->name('edit');
        Route::put('/{doctor}', 'update')->name('update');
        Route::get('/{doctor}', 'show')->name('show');
        Route::delete('/{doctor}', 'destroy')->name('destroy');
    });

    Route::controller(PatientController::class)->prefix('patients')->name('patients.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{patient}/edit', 'edit')->name('edit');
        Route::put('/{patient}', 'update')->name('update');
        Route::get('/{patient}', 'show')->name('show');
        Route::delete('/{patient}', 'destroy')->name('destroy');
    });

});

require __DIR__ . '/auth.php';
