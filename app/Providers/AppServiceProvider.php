<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Kategori;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // View::share('kategori', Kategori::all());
        // view()->share('siteTitle', 'HDTuto.com');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
