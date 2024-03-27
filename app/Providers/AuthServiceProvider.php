<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as AccessGate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate as FacadesGate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        //Gate=>permission | simple Role

        //Role
        Gate::define('admin', function (User $user): bool {
            return (bool) $user->is_admin;
        });

        //permission
        Gate::define('idea.delete', function (User $user, Idea $idea): bool {
            return ((bool) $user->is_admin || $user->id === $idea->user_id);
        });

        Gate::define('idea.edit', function (User $user, Idea $idea): bool {
            return ((bool) $user->is_admin || $user->id === $idea->user_id);
        });
    }
}
