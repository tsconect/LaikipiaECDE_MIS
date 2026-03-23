<?php

namespace App\Providers;

use App\Models\Settings;
use App\Models\User;
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
        view()->composer('*', function ($view) {
            static $settingsCache = null;
            static $usersCache = null;

            if ($settingsCache === null) {
                $settingsCache = Settings::query()->pluck('value', 'key')->toArray();
            }

            if ($usersCache === null) {
                $usersCache = User::latest()->get();
            }

            $view->with('settings', $settingsCache);
            $view->with('users', $usersCache);
        });
    }
}
