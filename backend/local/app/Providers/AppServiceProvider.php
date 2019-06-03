<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('abcstore.layout.header', function ($view) {
            $list_cate = Category::all();
            $view->with('list_cate',$list_cate);
        });
        
        view()->composer('abcstore.layout.main-page-banner', function ($view) {
            $list_cate = Category::all();
            $view->with('catelist',$list_cate);
        });
    }
}