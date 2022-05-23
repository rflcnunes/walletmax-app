<?php

namespace App\Providers;

use App\Models\Credit;
use App\Models\Debit;
use App\Observers\CreditObserver;
use App\Observers\DebitObserver;
use App\Repositories\Contracts\BalanceRepositoryInterface;
use App\Repositories\Contracts\CreditRepositoryInterface;
use App\Repositories\Contracts\DebitRepositoryInterface;
use App\Repositories\Eloquent\BalanceRepository;
use App\Repositories\Eloquent\CreditRepository;
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

        $this->app->bind(
          CreditRepositoryInterface::class,
          CreditRepository::class
        );

        $this->app->bind(
            BalanceRepositoryInterface::class,
            BalanceRepository::class
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
        Credit::observe(CreditObserver::class);
    }
}
