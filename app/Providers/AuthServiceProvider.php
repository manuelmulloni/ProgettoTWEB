<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        $this->registerPolicies(); // Qui è corretto

        Gate::define('isUser', fn(User $user) => $user->isCliente());
        Gate::define('isStaff', fn(User $user) => $user->isStaff());
        Gate::define('isAdmin', fn(User $user) => $user->isAdmin());
    }
}
