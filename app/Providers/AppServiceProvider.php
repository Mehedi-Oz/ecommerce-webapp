<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share $categories only with the header view
        View::composer('website.include.header', function ($view) {
            $categories = Category::where('is_active', true)->get();
            $view->with('categories', $categories);
        });
    }
}