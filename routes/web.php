<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/profil', [FrontendController::class, 'profil'])->name('profil');
Route::get('/informasi', [FrontendController::class, 'informasi'])->name('informasi');
Route::get('/informasi/{id}', [FrontendController::class, 'showInformasi'])->name('informasi.show');
Route::get('/galeri', [FrontendController::class, 'galeri'])->name('galeri');
Route::get('/kontak', [FrontendController::class, 'kontak'])->name('kontak');
Route::post('/kontak', [FrontendController::class, 'storeKontak'])->name('kontak.store');

// Admin Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('informasi', App\Http\Controllers\Admin\InformasiController::class);
    Route::resource('galeri', App\Http\Controllers\Admin\GaleriController::class);
    Route::get('pengaturan', [App\Http\Controllers\Admin\PengaturanController::class, 'index'])->name('pengaturan');
    Route::post('pengaturan', [App\Http\Controllers\Admin\PengaturanController::class, 'update'])->name('pengaturan.update');
    
    // Kontak Routes (integrated with pengaturan)
    Route::get('pengaturan/kontak/{id}', [App\Http\Controllers\Admin\PengaturanController::class, 'showKontak'])->name('pengaturan.kontak.show');
    Route::patch('pengaturan/kontak/{id}/read', [App\Http\Controllers\Admin\PengaturanController::class, 'markAsRead'])->name('pengaturan.kontak.read');
    Route::delete('pengaturan/kontak/{id}', [App\Http\Controllers\Admin\PengaturanController::class, 'destroyKontak'])->name('pengaturan.kontak.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
