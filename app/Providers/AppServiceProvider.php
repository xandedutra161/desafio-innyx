<?php

namespace App\Providers;

use App\Http\Factories\CategoryFactory\CategoryFactory;
use App\Http\Factories\CategoryFactory\ICategoryFactory;
use App\Http\Factories\ProductFactory\IProductFactory;
use App\Http\Factories\ProductFactory\ProductFactory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(ICategoryFactory::class, CategoryFactory::class);
        $this->app->bind(IProductFactory::class, ProductFactory::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
