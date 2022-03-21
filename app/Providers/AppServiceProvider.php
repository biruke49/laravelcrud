<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\IAdminRepository;
use App\Repository\AdminRepository;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IAdminRepository::class, AdminRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
