<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\Category;
use App\Policies\CategoryPolicy;

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
        // 1️⃣ Admin bypass: admin can do everything
        Gate::before(function ($user, $ability) {
            return $user->hasRole('admin') ? true : null;
        });

        // 2️⃣ User management
        Gate::define('users.manage', function ($user) {
            return $user->hasPermission('users.manage');
        });

        // 3️⃣ Product permissions
        Gate::define('products.create', function ($user) {
            return $user->hasPermission('products.create');
        });

        Gate::define('products.update', function ($user) {
            return $user->hasPermission('products.update');
        });

        Gate::define('products.delete', function ($user) {
            return $user->hasPermission('products.delete');
        });

        // 4️⃣ Category permissions
        Gate::define('category.create', function ($user) {
            return $user->hasPermission('category.create');
        });

        Gate::define('category.update', function ($user) {
            return $user->hasPermission('category.update');
        });

        Gate::define('category.delete', function ($user) {
            return $user->hasPermission('category.delete');
        });

        // 5️⃣ Object-level authorization using CategoryPolicy
        Gate::define('category.view', function ($user, Category $category) {
            return (new CategoryPolicy())->view($user, $category);
        });

        Gate::define('category.updateStatus', function ($user, Category $category) {
            return (new CategoryPolicy())->updateStatus($user, $category);
        });
    }
}
