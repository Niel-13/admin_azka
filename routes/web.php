<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\GaleriController;
use App\Models\Kamar;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $totalKamar = Kamar::count();
    $kamarTerisi = Kamar::where('status', 'Terisi')->count();
    $kamarKosong = Kamar::where('status', 'Kosong')->count();
    $kamarPerbaikan = Kamar::where('status', 'Perbaikan')->count();
    $daftarKamarKosong = Kamar::where('status', 'Kosong')->orderBy('nomor_kamar', 'asc')->get();

    return view('dashboard', compact(
        'totalKamar',
        'kamarTerisi',
        'kamarKosong',
        'kamarPerbaikan',
        'daftarKamarKosong'
    ));

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('kamar', KamarController::class);
    Route::resource('galeri', GaleriController::class);
});

require __DIR__.'/auth.php';
