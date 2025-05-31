<?php

namespace App\Providers;

use App\Interface\AuthInterface;
use App\Interface\CategoryInterface;
use App\Interface\FaqInterface;
use App\Interface\TicketInterface;
use App\Repository\AuthRepository;
use App\Repository\CategoryRepository;
use App\Repository\FaqRepository;
use App\Repository\TicketRepository;
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
        $this->app->bind(TicketInterface::class, TicketRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
