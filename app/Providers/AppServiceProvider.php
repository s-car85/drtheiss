<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         \View::composer('admin.categories.layout', 'App\Composers\CategoriesProvider' );
         \View::composer(['front.partials.*', 'front.pages.index' ], 'App\Composers\MasterProvider');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
