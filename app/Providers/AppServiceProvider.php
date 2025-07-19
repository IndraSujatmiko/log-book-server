<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191); // untuk MySQL versi lama

        if (DB::getDriverName() === 'sqlite') {
            // Cek apakah file database.sqlite sudah ada
            if (File::exists(database_path('database.sqlite'))) {
                DB::statement('PRAGMA foreign_keys=ON;');
            }
        }
    }
}
