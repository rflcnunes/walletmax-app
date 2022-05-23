<?php

namespace App\Providers;

use App\Models\Debit;
use App\Observers\DebitObserver;
use App\Repositories\Contracts\DebitRepositoryInterface;
use App\Repositories\Eloquent\DebitRepository;
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
        $this->app->bind(
            DebitRepositoryInterface::class,
            DebitRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Debit::observe(DebitObserver::class);
    }
}
