<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\App\Repositories\users\UserRepositoryInterface::class, \App\Repositories\users\UserRepository::class);
        $this->app->singleton(\App\Repositories\criteria\CriterionRepositoryInterface::class, \App\Repositories\criteria\CriterionRepository::class);
        $this->app->singleton(\App\Repositories\historical_criteria\HistoricalCriterionRepositoryInterface::class, \App\Repositories\historical_criteria\HistoricalCriterionRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
