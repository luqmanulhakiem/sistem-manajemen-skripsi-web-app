<?php

use App\Http\Controllers\AdminFakultasController;
use App\Http\Controllers\AngkatanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    } else {
        return redirect()->route('login');
    }
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');
    Route::group(['prefix' => 'data'], function () {
        Route::controller(AdminFakultasController::class)->group(function (){
            Route::get('admin-fakultas', 'index')->name('admin-fakultas');
            Route::get('admin-fakultas/create', 'create')->name('admin-fakultas.create');
            Route::get('admin-fakultas/edit/{id}', 'edit')->name('admin-fakultas.edit');
        });
        Route::controller(FakultasController::class)->group(function (){
            Route::get('fakultas', 'index')->name('fakultas');
            Route::get('fakultas/create', 'create')->name('fakultas.create');
            Route::post('fakultas/store', 'store')->name('fakultas.store');
            Route::get('fakultas/edit/{id}', 'edit')->name('fakultas.edit');
            Route::post('fakultas/update/{id}', 'update')->name('fakultas.update');
            Route::get('fakultas/destroy/{id}', 'destroy')->name('fakultas.destroy');
        });
        Route::controller(AngkatanController::class)->group(function (){
            Route::get('angkatan', 'index')->name('angkatan');
            Route::get('angkatan/create', 'create')->name('angkatan.create');
            Route::post('angkatan/store', 'store')->name('angkatan.store');
            Route::get('angkatan/edit/{id}', 'edit')->name('angkatan.edit');
            Route::post('angkatan/update/{id}', 'update')->name('angkatan.update');
            Route::get('angkatan/destroy/{id}', 'destroy')->name('angkatan.destroy');
        });
        Route::controller(ProdiController::class)->group(function (){
            Route::get('prodi', 'index')->name('prodi');
            Route::get('prodi/create', 'create')->name('prodi.create');
            Route::post('prodi/store', 'store')->name('prodi.store');
            Route::get('prodi/edit/{id}', 'edit')->name('prodi.edit');
            Route::post('prodi/update/{id}', 'update')->name('prodi.update');
            Route::get('prodi/destroy/{id}', 'destroy')->name('prodi.destroy');
        });
        Route::controller(MahasiswaController::class)->group(function (){
            Route::get('mahasiswa', 'index')->name('mahasiswa');
            Route::get('mahasiswa/create', 'create')->name('mahasiswa.create');
            Route::post('mahasiswa/store', 'store')->name('mahasiswa.store');
            Route::get('mahasiswa/edit/{id}', 'edit')->name('mahasiswa.edit');
            Route::post('mahasiswa/update/{id}', 'update')->name('mahasiswa.update');
            Route::get('mahasiswa/destroy/{id}', 'destroy')->name('mahasiswa.destroy');
        });
    });
    Route::controller(DosenController::class)->group(function () {
        Route::post('dosen-post', 'createDosen')->name('dosen.create'); 
        Route::post('dosen-update/{id}', 'update')->name('dosen.update'); 
        Route::get('dosen-delete/{id}', 'deleteDosen')->name('dosen.delete'); 
    });
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login-try', [AuthController::class, 'login'])->name('login.try');
