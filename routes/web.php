<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RekapController;
use App\Http\Controllers\Admin\DeviceController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\AdministrationController;
use App\Http\Controllers\Admin\HelpController;
use App\Http\Controllers\Petugas\DashboardController as PetugasDashboardController;
use App\Http\Controllers\Petugas\RekapController as PetugasRekapController;
use App\Http\Controllers\Admin\LogBookController;




Route::get('/', function () {
    return view('welcome');
})->middleware('redirect.if.auth')->name('home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::get('/dashboard', function () {
    if (auth()->user()->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    } elseif (auth()->user()->hasRole('petugas')) {
        return redirect()->route('petugas.dashboard');
    }
    abort(403);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

// 🔐 Role-based dashboard access
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/rekap', [RekapController::class, 'index'])->name('rekap');    
    Route::resource('/devices', DeviceController::class)->names('devices');
    Route::resource('/locations', LocationController::class)->names('locations');
    Route::delete('/devices/access/{deviceAccess}', [DeviceController::class, 'destroyAccess'])->name('devices.access.destroy');
    Route::resource('/logbook', LogBookController::class)->names('logbook'); // <--- ini penting!
    Route::get('/administration', [AdministrationController::class, 'index'])->name('administration');
    Route::post('/administration/logbook/{logBook}/status', [AdministrationController::class, 'updateStatus'])->name('administration.status.update');
    Route::get('/help', [HelpController::class, 'index'])->name('help');
});

Route::middleware(['auth', 'role:petugas'])->prefix('petugas')->name('petugas.')->group(function () {
    Route::get('/dashboard', [PetugasDashboardController::class, 'index'])->name('dashboard');
    Route::get('/rekap', [PetugasRekapController::class, 'index'])->name('rekap');
    Route::resource('/logbook', LogBookController::class)->names('logbook'); // <--- ini juga penting!
});

Route::middleware(['auth', 'role:admin,petugas'])
    ->prefix('{role}')
    ->name('{role}.')
    ->group(function () {
        Route::resource('/logbook', LogBookController::class)->names('logbook');
    });

require __DIR__.'/auth.php';
