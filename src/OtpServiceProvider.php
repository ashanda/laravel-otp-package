<?php

namespace Geek\Otp;

use Illuminate\Support\ServiceProvider;

class OtpServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish migration
            $this->publishes([
                __DIR__.'/../database/migrations/2025_05_25_000000_create_otps_table.php' =>
                    database_path('migrations/' . date('Y_m_d_His') . '_create_otps_table.php'),
            ], 'geekmac-otp-migrations');

            // Load routes
            $this->loadRoutesFrom(__DIR__.'/../routes.php');
    }

    public function register()
    {
        $this->app->singleton('otp', function () {
            return new OtpService();
        });
    }
}
