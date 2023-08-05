<?php

namespace App\Providers;

use App\Interfaces\SchedulerRepositoryInterface;
use App\SqlRepositories\SchedulerRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SchedulerRepositoryInterface::class, SchedulerRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
