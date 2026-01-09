<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{
    /**
     * Determine if the user can view the category.
     */
    public function view(User $user, Category $category): bool
    {
        if ($user->hasRole('admin')) {
            return true; // admin can view all
        }

        if ($user->hasRole('manager')) {
            // manager can view categories in projects they created
            return $category->product->created_by === $user->id;
        }

        if ($user->hasRole('staff')) {
            // staff can view only assigned categories
            return $category->assigned_to === $user->id;
        }

        return false; // default deny
    }

    /**
     * Determine if the user can update status of the category.
     */
    public function updateStatus(User $user, Category $category): bool
    {
        // only staff assigned to this category can update status
        return $user->hasRole('staff') && $category->assigned_to === $user->id;
    }

    /**
     * Other methods like create, update, delete can be added here...
     */
}