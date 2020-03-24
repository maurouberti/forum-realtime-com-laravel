<?php

namespace App\Providers;

use App\Observers\PhotoUserObserver;
use App\Observers\RespostaObserver;
use App\Resposta;
use App\User;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(PhotoUserObserver::class);
        Resposta::observe(RespostaObserver::class);
    }
}
