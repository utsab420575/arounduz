<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles
        $admin = Role::create(['name' => 'admin']);
        $tourist = Role::create(['name' => 'tourist']);
        $guide = Role::create(['name' => 'guide']);
        $agency = Role::create(['name' => 'agency']);

        // Future permissions (not used yet, but structure ready)
        // Permission::create(['name' => 'manage users']);
        // Permission::create(['name' => 'verify guides']);
        // Permission::create(['name' => 'view bookings']);
        // etc...

        $this->command->info('Roles created successfully!');
        $this->command->info('✅ admin');
        $this->command->info('✅ tourist');
        $this->command->info('✅ guide');
        $this->command->info('✅ agency');
    }
}
