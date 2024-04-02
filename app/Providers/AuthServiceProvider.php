<?php

namespace App\Providers;

 use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Product;
use App\Policies\ProductPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Product::class => ProductPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('categoryList', function($user){
            return $user->role == 'admin';
        });

        gate::define('createUser', function($user){
            return $user->role == 'admin';
        });

        gate::define('home_pages', function($user){
            return $user->role == 'admin';
        });

        gate::define('about', function($user){
            return $user->role == 'admin';
        });

        gate::define('menu_contact', function($user){
            return $user->role == 'admin';
        });
    }
}
