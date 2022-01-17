<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Region;
use App\Models\Company;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;


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
        $regions = Region::select('id','name_uz')->get();
        $this->regions = $regions;

        view()->composer('auth.register', function($view) {
            $view->with(['regions' => $this->regions]);
        });

        Paginator::useBootstrap();
    }
}
