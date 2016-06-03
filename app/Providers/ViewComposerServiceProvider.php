<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeFrontendNavigation();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function composeFrontendNavigation()
    {
        view()->composer('layouts.frontend.header', function ($view) {
            return $view->with('rootCategories', Category::where('parent_category_id', 0)->orderBy('name')->get());
        });
    }
}
