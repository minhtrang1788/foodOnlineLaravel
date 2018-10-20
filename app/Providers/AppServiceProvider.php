<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191); //Solved by increasing StringLength

        view()->composer('inc.content',function($view){
          $view->with('posts', \App\Post::getNewPost());
          $view->with('products', \App\Product::getHomeLastestFood());
        });

        view()->composer('inc.sitebar',function($view){
          $view->with('categories', \App\Categories::getAllCategories());
          $view->with('products', \App\Product::getLastestFood());
          $view->with('tags', \App\Tag::getTags());
        });

        view()->composer('inc.content',function($view){
          $view->with('sliders', \App\slider::getSliders());
          $view->with('partners', \App\listPartner::getPartners());
          $view->with('tags', \App\Tag::getTags());
        });
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
