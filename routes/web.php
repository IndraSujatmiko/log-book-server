<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Http\Controllers\Admin\DashboardController;


Route::get('/', function () {
    return view('welcome');
})->middleware('redirect.if.auth')->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

// 🔐 Role-based dashboard access
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::view('/admin/rekap', 'admin.rekap')->name('admin.rekap');
    Route::view('/devices', 'admin.devices')->name('devices');
    Route::view('/settings', 'admin.settings')->name('settings');
    Route::view('/help', 'admin.help')->name('help');
});

Route::middleware(['auth', 'role:petugas'])->group(function () {
    Route::get('/petugas/dashboard', function () {
        return 'Halaman Petugas';
    });
});

Route::middleware(['auth', 'role:verifikator'])->group(function () {
    Route::get('/verifikator/dashboard', function () {
        return 'Halaman Verifikator';
    });
});

require __DIR__.'/auth.php';
