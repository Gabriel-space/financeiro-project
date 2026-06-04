<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Categoria;
use App\Observers\CategoriaObserver;

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
        Categoria::observe(CategoriaObserver::class);
    }
}
