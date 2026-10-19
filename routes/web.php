<?php

use App\Models\Karyawan;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Page.home', ['title' => 'Home']);
});

Route::get('/about', function () {
    return view('Page.about', ['title' => 'About Us']);
});

Route::get('/profile', function () {
    return view('Page.profile', ['title' => 'Profile']);
});

Route::get('/terms', function () {
    return view('page.terms', ['title' => 'Peraturan']);
});

// Mahasiswa CRUD Routes
Route::get('/daftar', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/mahasiswa/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('/mahasiswa/edit/{nim}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::put('/mahasiswa/update/{nim}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('/mahasiswa/destroy/{nim}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

// Keep the karyawan route if still needed, or redirect it
Route::get('/karyawan', function () {
    $karyawans = Karyawan::orderBy('nama')->get();
    return view('Page.daftar', [
        'title' => 'Data Karyawan',
        'karyawans' => $karyawans,
    ]);
});
