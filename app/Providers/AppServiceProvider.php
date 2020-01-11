<?php

namespace App\Providers;

//use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Schema; //NEW: Import Schema

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    
     protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];
     
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
        //
         Schema::defaultStringLength(191); //NEW: Increase StringLength
         $this->registerPolicies();

        Passport::routes();
    }
    
}
