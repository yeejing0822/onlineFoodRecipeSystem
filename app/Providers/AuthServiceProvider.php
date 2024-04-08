<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Recipe;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // check user has role admin
        Gate::define('isAdmin', function(User $user) {
            return $user->role == 'admin';
        });

        // check user has role user
        Gate::define('isUser', function(User $user) {
            return $user->role == 'user';
        });

        Gate::define('isOwner', function(User $user, $id) {
            $recipe = Recipe::find($id);
            if ($recipe) {
                return $user->id == $recipe->user_id;
            }
            return false;
        });
    }
}
