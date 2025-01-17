<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        URL::forceScheme('https');
        // Gate check for GHQ test
        Gate::define('can-ghq', function ($user) {
            return $user->hasUnfinishedHasil() == false; // allow if user has no unfinished test
        });

        // Gate check for DASS-21 test
        Gate::define('can-dass21', function ($user) {
            return $user->hasUnfinishedHasil() && $user->latestHasil->last_test == 'ghq12'; // allow if user has unfinished test and the last test is DASS-21
        });

        // Gate check for HSCL-25 test
        Gate::define('can-hscl25', function ($user) {
            return $user->hasUnfinishedHasil() && $user->latestHasil->last_test == 'dass-21'; // allow if user has unfinished test and the last test is HSCL-25
        });

        // Gate check for HTQ test
        Gate::define('can-htq', function ($user) {
            return $user->hasUnfinishedHasil() && $user->latestHasil->last_test == 'hscl-25'; // allow if user has unfinished test and the last test is HTQ
        });

        // Gate check for users management
        Gate::define('manage-users', function ($user) {
            return $user->level == 1; // allow if user is admin
        });

        // Gate check for rekap management
        Gate::define('manage-rekap', function ($user) {
            return $user->level == 1; // allow if user is admin
        });

        // Gate check for materials management
        Gate::define('manage-materials', function ($user) {
            return $user->level == 1; // allow if user is admin
        });
    }
}
