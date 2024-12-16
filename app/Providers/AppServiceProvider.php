<?php

namespace App\Providers;

use App\Models\Permission;
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
        try {
            foreach (Permission::pluck('title') as $permission) {
                Gate::define($permission, function ($user) use ($permission) {
                    return $user->role()->whereHas('permissions', function ($q) use ($permission) {
                        $q->where('title', $permission);
                    })->count() > 0;
                });
            }
        } catch (\Exception $e) {
            info('registerUserAccessToGates: Database not found or not yet migrated. Ignoring user permissions while booting app.');
        }
    }
}
