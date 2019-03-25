<?php

namespace App\Providers;

use App\Http\Models\Blogger;
use App\Http\Models\BloggerRating;
use App\Repository\BloggerRatingRepository;
use App\Repository\BloggerRepository;
use App\Repository\EloquentBloggerRatingRepository;
use App\Repository\EloquentBloggerRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BloggerRepository::class, function(){
            return new EloquentBloggerRepository(new Blogger());
        });

        $this->app->singleton(BloggerRatingRepository::class, function(){
            return new EloquentBloggerRatingRepository(new BloggerRating(), new Blogger());
        });
    }
}
