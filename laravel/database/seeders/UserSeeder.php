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
        // Disable FK checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate pivot table FIRST
        DB::table('role_user')->truncate();

        // Then truncate users
        DB::table('users')->truncate();

        // Enable FK checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Fetch roles
        $adminRole   = Role::where('name', 'admin')->first();
        $managerRole = Role::where('name', 'manager')->first();
        $staffRole   = Role::where('name', 'staff')->first();

        // Admin user
        $admin = User::create([
            'name'     => 'Admin User',
            'email'    => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $admin->roles()->attach($adminRole->id);

        // Manager user
        $manager = User::create([
            'name'     => 'Manager User',
            'email'    => 'manager@example.com',
            'password' => Hash::make('password'),
        ]);
        $manager->roles()->attach($managerRole->id);

        // Staff user 1
        $staff1 = User::create([
            'name'     => 'Staff One',
            'email'    => 'staff1@example.com',
            'password' => Hash::make('password'),
        ]);
        $staff1->roles()->attach($staffRole->id);

        // Staff user 2
        $staff2 = User::create([
            'name'     => 'Staff Two',
            'email'    => 'staff2@example.com',
            'password' => Hash::make('password'),
        ]);
        $staff2->roles()->attach($staffRole->id);
    }
}
