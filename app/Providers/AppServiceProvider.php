<?php

namespace App\Providers;

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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.nav', function ($view) {
            // Get the authenticated user
            $user = auth()->user();

            // Get the user role (adjust the field name based on your database schema)
            $roles = $user ? $user->roles()->get() : null;

            // Pass the user and role data to the view
            $view->with(compact('user', 'roles'));
        });
    }
}
