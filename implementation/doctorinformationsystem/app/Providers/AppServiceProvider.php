<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::composer('welcome', function($x) {
            $doctors = \App\User::whereHas('role', function($role) {
                $role->where('name', 'doctor');
            })->distinct()->get();
            $x->with('doctors', $doctors);
        });
    }
}
