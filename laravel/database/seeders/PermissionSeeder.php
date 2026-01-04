<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Disable FK checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate pivot table FIRST
        DB::table('permission_role')->truncate();

        // Then truncate permissions
        DB::table('permissions')->truncate();

        // Enable FK checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Create permissions
        $permissions = [
            'users.manage',

            'products.create',
            'products.update',
            'products.delete',

            'category.create',
            'category.update',
            'category.delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Assign permissions to roles
        $admin   = Role::where('name', 'admin')->first();
        $manager = Role::where('name', 'manager')->first();
        $staff   = Role::where('name', 'staff')->first();

        // Admin → all permissions
        $admin->permissions()->sync(Permission::pluck('id'));

        // Manager → create & update only
        $manager->permissions()->sync(
            Permission::whereIn('name', [
                'products.create',
                'products.update',
                'category.create',
                'category.update',
            ])->pluck('id')
        );

        // Staff → create only
        $staff->permissions()->sync(
            Permission::whereIn('name', [
                'products.create',
                'category.create',
            ])->pluck('id')
        );
    }
}
