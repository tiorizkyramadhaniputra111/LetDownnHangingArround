<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // Baris ini jangan sampai ketinggalan!

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
        /**
         * Memaksa Laravel menggunakan protokol HTTPS untuk semua link aset (CSS/JS)
         * jika aplikasi tidak berjalan di lingkungan lokal (localhost/laragon).
         * Ini memperbaiki error "Blocked: Mixed-Content" di Railway/Vercel.
         */
        if (!app()->isLocal()) {
            URL::forceScheme('https');
        }
    }
}