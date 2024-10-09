<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ManagePekerjaanController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {

    // Route untuk autentikasi
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AuthController::class, 'login'])->name('login.submit');
    });

    // Route yang hanya bisa diakses jika admin sudah login
    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); // Tidak butuh controller terpisah
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        // Route untuk pengelolaan pekerjaan
        Route::get('pekerjaan', [ManagePekerjaanController::class, 'index'])->name('pekerjaan.index');
        Route::get('pekerjaan/create', [ManagePekerjaanController::class, 'create'])->name('pekerjaan.create');
        Route::post('pekerjaan', [ManagePekerjaanController::class, 'store'])->name('pekerjaan.store');
        Route::get('pekerjaan/{pekerjaan}/edit', [ManagePekerjaanController::class, 'edit'])->name('pekerjaan.edit');
        Route::put('pekerjaan/{pekerjaan}', [ManagePekerjaanController::class, 'update'])->name('pekerjaan.update');
        Route::delete('pekerjaan/{pekerjaan}', [ManagePekerjaanController::class, 'destroy'])->name('pekerjaan.destroy');
    });

});
