<?php

namespace App\Providers;

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
        $this->app->bind(
            'App\Services\Interfaces\BookmarkServiceInterface',
            'App\Services\Implementations\BookmarkService',
        );
         $this->app->bind(
             'App\Repositories\Interfaces\BookmarkRepositoryInterface',
             'App\Repositories\Implementations\BookmarkRepository',
         );
    }
}
