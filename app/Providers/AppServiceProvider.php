<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrapFive();


        view()->composer('layouts.sidebar', function ($view){

            //Store sidebar categories info in cache for 30 secs
            if (Cache::has('categories_side')){
                Cache::get('categories_side');
            } else {
                $categories_side = Category::withCount('posts')->orderBy('posts_count', 'desc')->get();
                Cache::put('categories_side', $categories_side, 30);
            }

            $view->with('popular_posts', Post::orderBy('views', 'desc')->limit('3')->get());
            $view->with('recent_posts', Post::orderBy('id', 'desc')->limit('3')->get());
            $view->with('categories_side', Category::withCount('posts')->orderBy('posts_count', 'desc')->get());
        });

        view()->composer('layouts.footer', function ($view){
            $view->with('popular_posts', Post::orderBy('views', 'desc')->limit('3')->get());
            $view->with('recent_posts', Post::orderBy('id', 'desc')->limit('3')->get());
            $view->with('categories_side', Category::withCount('posts')->orderBy('posts_count', 'desc')->get());
        });

        view()->composer('layouts.header', function ($view){
            $view->with('categories', Category::withCount('posts')->orderBy('id', 'asc')->get());
        });
    }
}
