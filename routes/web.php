<?php

use App\Http\Controllers\AdminFakultasController;
use App\Http\Controllers\AllDosenController;
use App\Http\Controllers\AngkatanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\BidangDosenController;
use App\Http\Controllers\BimbinganController;
use App\Http\Controllers\BimbinganItemController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\DosenPembimbingController;
use App\Http\Controllers\DosenPembimbingScreenController;
use App\Http\Controllers\DospemMahasiswaController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JumlahDospemController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengajuanDospemController;
use App\Http\Controllers\PengajuanJudulController;
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
        Route::controller(JadwalController::class)->group(function (){
            Route::get('jadwal', 'index')->name('jadwal');
            Route::get('jadwal/create', 'create')->name('jadwal.create');
            Route::post('jadwal/store', 'store')->name('jadwal.store');
            Route::get('jadwal/edit/{id}', 'edit')->name('jadwal.edit');
            Route::post('jadwal/update/{id}', 'update')->name('jadwal.update');
            Route::get('jadwal/destroy/{id}', 'destroy')->name('jadwal.destroy');
        });
        Route::controller(BidangController::class)->group(function (){
            Route::get('bidang', 'index')->name('bidang');
            Route::get('bidang/create', 'create')->name('bidang.create');
            Route::post('bidang/store', 'store')->name('bidang.store');
            Route::get('bidang/edit/{id}', 'edit')->name('bidang.edit');
            Route::post('bidang/update/{id}', 'update')->name('bidang.update');
            Route::get('bidang/destroy/{id}', 'destroy')->name('bidang.destroy');
        });
        Route::controller(BidangDosenController::class)->group(function (){
            Route::get('bidang-dosen', 'index')->name('bidang-dosen');
            Route::get('bidang-dosen/create', 'create')->name('bidang-dosen.create');
            Route::post('bidang-dosen/store', 'store')->name('bidang-dosen.store');
            Route::get('bidang-dosen/edit/{id}', 'edit')->name('bidang-dosen.edit');
            Route::post('bidang-dosen/update/{id}', 'update')->name('bidang-dosen.update');
            Route::get('bidang-dosen/destroy/{id}', 'destroy')->name('bidang-dosen.destroy');
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
            Route::get('mahasiswa-export', 'export')->name('mahasiswa.export');
            Route::get('mahasiswa-import', 'import')->name('mahasiswa.import');
            Route::post('mahasiswa-import-store', 'importMahasiswa')->name('mahasiswa.import-store');
            Route::get('mahasiswa/create', 'create')->name('mahasiswa.create');
            Route::post('mahasiswa/store', 'store')->name('mahasiswa.store');
            Route::get('mahasiswa/edit/{id}', 'edit')->name('mahasiswa.edit');
            Route::post('mahasiswa/update/{id}', 'update')->name('mahasiswa.update');
            Route::get('mahasiswa/destroy/{id}', 'destroy')->name('mahasiswa.destroy');
        });
        Route::controller(DospemMahasiswaController::class)->group(function (){
            Route::get('dospem-mahasiswa', 'index')->name('dospem-mahasiswa');
            // Route::get('dospem-mahasiswa/create', 'create')->name('dospem-mahasiswa.create');
            // Route::post('dospem-mahasiswa/store', 'store')->name('dospem-mahasiswa.store');
            Route::get('dospem-mahasiswa/{id}', 'edit')->name('dospem-mahasiswa.edit');
            Route::post('dospem-mahasiswa/{id}', 'update')->name('dospem-mahasiswa.update');
        });
        Route::get('dosen', [AllDosenController::class, 'index'])->name('dosen.index');
        Route::controller(KaprodiController::class)->group(function (){
            Route::get('kaprodi', 'index')->name('kaprodi');
            Route::get('kaprodi/create', 'create')->name('kaprodi.create');
            Route::get('kaprodi/edit/{id}', 'edit')->name('kaprodi.edit');
        });
        Route::controller(JumlahDospemController::class)->group(function (){
            Route::get('jumlah-dospem', 'index')->name('jumlah-dospem');
            Route::post('jumlah-dospem/update', 'update')->name('jumlah-dospem.update');
        });
        Route::controller(DosenPembimbingController::class)->group(function (){
            Route::get('dospem', 'index')->name('dospem');
            Route::get('dospem/create', 'create')->name('dospem.create');
            Route::get('dospem/edit/{id}', 'edit')->name('dospem.edit');
        });
    });
    // Mahasiswa
    Route::controller(PengajuanJudulController::class)->group(function (){
        Route::get('pengajuan-judul', 'index')->name('pengajuan-judul');
        Route::get('pengajuan-judul/create', 'create')->name('pengajuan-judul.create');
        Route::post('pengajuan-judul/store', 'store')->name('pengajuan-judul.store');
        Route::get('pengajuan-judul/edit', 'edit')->name('pengajuan-judul.edit');
        Route::post('pengajuan-judul/update', 'update')->name('pengajuan-judul.update');


    });
    Route::controller(PengajuanDospemController::class)->group(function (){
        Route::get('pengajuan-dospem', 'index')->name('pengajuan-dospem');
        Route::post('pengajuan-dospem', 'store')->name('pengajuan-dospem.store');
        Route::post('pengajuan-dospem-update', 'update')->name('pengajuan-dospem.update');
        

    });
    // 
    Route::controller(DosenController::class)->group(function () {
        Route::post('dosen-post', 'createDosen')->name('dosen.create'); 
        Route::post('dosen-update/{id}', 'update')->name('dosen.update'); 
        Route::get('dosen-delete/{id}', 'deleteDosen')->name('dosen.delete'); 
    });
    // DOSEN PEMBIMBING
    Route::controller(DosenPembimbingScreenController::class)->group(function () {
        Route::get('dosen/pengajuan-bimbingan', 'pbIndex')->name('pengajuan-bimbingan.dosen.index');
        Route::get('dosen/pengajuan-bimbingan/{id}/{status}', 'pbStore')->name('pengajuan-bimbingan.dosen.store');
        // Route::get('dosen/pengajuan-bimbingan/{id}/{status}/{idMhs}', 'pbStore2')->name('pengajuan-bimbingan.dosen.store2');
        // Bimbingan Diterima
        Route::get('dosen/daftar-bimbingan', 'bdIndex')->name('daftar-bimbingan.dosen.index');
        Route::get('dosen/daftar-bimbingan/{id}/{status}', 'bdStore')->name('daftar-bimbingan.dosen.store');
        Route::get('dosen/daftar-bimbingan/{id}/{status}/{idMhs}', 'bdStore2')->name('daftar-bimbingan.dosen.store2');
        Route::get('dosen/revisi-judul-mahasiswa/{id}', 'bdEdit')->name('daftar-bimbingan.dosen.edit');
        Route::post('dosen/revisi-judul-mahasiswa/{id}', 'bdUpdate')->name('daftar-bimbingan.dosen.update');
    });
    Route::controller(BimbinganController::class)->group(function () {
        Route::get('dosen/bimbingan-mahasiswa/{id}', 'indexDosen')->name('bimbingan-mahasiswa.dosen.index');
        Route::get('dosen/bimbingan-mahasiswa-mhs/{id}', 'indexMhs')->name('bimbingan-mahasiswa.dosen.indexMhs');
    });
    Route::controller(BimbinganItemController::class)->group(function () {
        Route::get('dosen/bimbingan-mahasiswa-item/{idMhs}', 'create')->name('bimbingan-mahasiswa-item.dosen.create');
        Route::post('dosen/bimbingan-mahasiswa-item/{idBimbingan}/{idMhs}', 'store')->name('bimbingan-mahasiswa-item.dosen.store');
        Route::get('dosen/bimbingan-mahasiswa-item/{id}', 'edit')->name('bimbingan-mahasiswa-item.dosen.edit');
    });
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login-try', [AuthController::class, 'login'])->name('login.try');
