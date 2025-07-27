<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RekapController;
use App\Http\Controllers\Admin\DeviceController;
use App\Http\Controllers\Admin\AdministrationController;
use App\Http\Controllers\Admin\HelpController;
use App\Http\Controllers\Petugas\DashboardController as PetugasDashboardController;
use App\Http\Controllers\Petugas\RekapController as PetugasRekapController;



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
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/rekap', [RekapController::class, 'index'])->name('rekap');    
    Route::resource('/devices', DeviceController::class)->names('devices');
    Route::get('/administration', [AdministrationController::class, 'index'])->name('administration');
    Route::get('/help', [HelpController::class, 'index'])->name('help');
});

Route::middleware(['auth', 'role:petugas'])->prefix('petugas')->name('petugas.')->group(function () {
    Route::get('/dashboard', [PetugasDashboardController::class, 'index'])->name('dashboard');
    Route::get('/rekap', [PetugasRekapController::class, 'index'])->name('rekap');
});


require __DIR__.'/auth.php';
