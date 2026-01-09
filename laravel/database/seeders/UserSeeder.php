<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Disable foreign key checks to safely truncate
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate pivot table first
        DB::table('role_user')->truncate();

        // Then truncate users
        DB::table('users')->truncate();

        // Enable foreign key checks again
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Make sure roles exist
        $adminRole   = Role::firstOrCreate(['name' => 'admin']);
        $managerRole = Role::firstOrCreate(['name' => 'manager']);
        $staffRole   = Role::firstOrCreate(['name' => 'staff']);

        // Admin user
        $admin = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name'     => 'Admin User',
                'password' => Hash::make('password'),
            ]
        );
        $admin->roles()->sync([$adminRole->id]);

        // Manager user
        $manager = User::updateOrCreate(
            ['email' => 'manager@example.com'],
            [
                'name'     => 'Manager User',
                'password' => Hash::make('password'),
            ]
        );
        $manager->roles()->sync([$managerRole->id]);

        // Staff user 1
        $staff1 = User::updateOrCreate(
            ['email' => 'staff1@example.com'],
            [
                'name'     => 'Staff One',
                'password' => Hash::make('password'),
            ]
        );
        $staff1->roles()->sync([$staffRole->id]);

        // Staff user 2
        $staff2 = User::updateOrCreate(
            ['email' => 'staff2@example.com'],
            [
                'name'     => 'Staff Two',
                'password' => Hash::make('password'),
            ]
        );
        $staff2->roles()->sync([$staffRole->id]);
    }
}
