<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Import the View facade
use App\Models\ProductType;

class ProductTypeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Share product types with all views
        View::composer('*', function ($view) {
            $productTypes = ProductType::all();
            $view->with('productTypes', $productTypes);
        });
    }
}
