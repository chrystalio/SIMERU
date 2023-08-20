<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProyekController;
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

Route::middleware('auth')->group(function () {
    Route::get('/', fn () => redirect()->route('dashboard'));
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::prefix('/dashboard')->group(function () {
        // Karyawan routes
        Route::prefix('/karyawan')->group(function () {
            Route::get('/', [KaryawanController::class, 'index'])->name('karyawan.index');
            Route::get('/create', [KaryawanController::class, 'create'])->name('karyawan.create');
            Route::post('/create', [KaryawanController::class, 'store'])->name('karyawan.store');
            Route::get('/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
            Route::get('/update/{karyawan}', [KaryawanController::class, 'edit'])->name('karyawan.edit');
            Route::put('/update/{karyawan}', [KaryawanController::class, 'update'])->name('karyawan.update');
            Route::delete('/{karyawan}', [KaryawanController::class, 'delete'])->name('karyawan.delete');
        });

        // Department routes
        Route::prefix('/department')->group(function () {
            Route::get('/', [DepartmentController::class, 'index'])->name('department.index');
            Route::get('/create', [DepartmentController::class, 'create'])->name('department.create');
            Route::post('/create', [DepartmentController::class, 'store'])->name('department.store');
            Route::get('/edit', [DepartmentController::class, 'edit'])->name('department.edit');
            Route::get('/update/{department}', [DepartmentController::class, 'edit'])->name('department.edit');
            Route::put('/update/{department}', [DepartmentController::class, 'update'])->name('department.update');
            Route::delete('/{department}', [DepartmentController::class, 'destroy'])->name('department.delete');
        });

        // Proyek routes
        Route::prefix('/proyek')->group(function () {
            Route::get('/', [ProyekController::class, 'index'])->name('proyek.index');
            Route::get('/create', [ProyekController::class, 'create'])->name('proyek.create');
            Route::post('/', [ProyekController::class, 'store'])->name('proyek.store');
            Route::get('/{proyek}/edit', [ProyekController::class, 'edit'])->name('proyek.edit');
            Route::put('/{proyek}', [ProyekController::class, 'update'])->name('proyek.update');
            Route::delete('/{proyek}', [ProyekController::class, 'delete'])->name('proyek.delete');
        });

        // Laporan routes
        Route::prefix('/laporan')->group(function () {
            Route::get('/', [LaporanController::class, 'index'])->name('laporan.index');
            Route::get('/create', [LaporanController::class, 'create'])->name('laporan.create');
            Route::post('/', [LaporanController::class, 'store'])->name('laporan.store');
            Route::get('/{laporan}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');
            Route::put('/{laporan}', [LaporanController::class, 'update'])->name('laporan.update');
            Route::delete('/delete/{laporan}', [LaporanController::class, 'delete'])->name('laporan.delete');
        });

        // Klien routes
        Route::prefix('/klien')->group(function () {
            Route::get('/', [KlienController::class, 'index'])->name('klien.index');
            Route::get('/create', [KlienController::class, 'create'])->name('klien.create');
            Route::post('/', [KlienController::class, 'store'])->name('klien.store');
            Route::get('/{klien}/edit', [KlienController::class, 'edit'])->name('klien.edit');
            Route::put('/{klien}', [KlienController::class, 'update'])->name('klien.update');
            Route::delete('/{klien}', [KlienController::class, 'delete'])->name('klien.delete');
        });

        // User routes
        Route::middleware('isAdmin')->prefix('/user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('user.index');
            Route::get('/reset-password/{id}', [UserController::class, 'forceResetPassword'])->name('user.reset-password');
        });
    });
});

require __DIR__.'/auth.php';
