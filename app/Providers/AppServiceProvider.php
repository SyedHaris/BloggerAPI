<?php

namespace App\Providers;

use App\Http\Models\Blogger;
use App\Repository\BloggerRepository;
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
    }
}
