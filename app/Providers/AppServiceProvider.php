<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Cms_logo;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $logo = Cms_logo::orderBy('created_at','desc')->take(1)->get();
    /*dd($logo);*/
        view()->share('logo', $logo);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
