<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('admin', fn(User $user) => $user->role == 'admin');
        Gate::define('user', fn(User $user) => $user->role == 'user');
        Gate::define('self', fn(User $user) => $user->id == auth()->id());
    }
}
