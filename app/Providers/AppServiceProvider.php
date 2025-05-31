<?php

namespace App\Providers;

use App\Interface\AuthInterface;
use App\Interface\CategoryInterface;
use App\Interface\FaqInterface;
use App\Repository\AuthRepository;
use App\Repository\CategoryRepository;
use App\Repository\FaqRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthInterface::class, AuthRepository::class);
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(FaqInterface::class, FaqRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
