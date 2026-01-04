<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate pivot table FIRST
        DB::table('permission_role')->truncate();
        DB::table('role_user')->truncate();

        // Then truncate roles
        DB::table('roles')->truncate();

        // Re-enable FK checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Role::insert([
            ['name' => 'admin'],
            ['name' => 'manager'],
            ['name' => 'staff'],
        ]);
    }
}
