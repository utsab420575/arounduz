<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Guide;
use App\Models\Agency;

class TestUserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin1@arounduz.com',
            'password' => Hash::make('11111111'),
            'phone' => '+998901234567',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);
        $admin->assignRole('admin');

        // Tourist User
        $tourist = User::create([
            'name' => 'John Doe',
            'email' => 'tourist1@arounduz.com',
            'password' => Hash::make('11111111'),
            'phone' => '+998901234568',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);
        $tourist->assignRole('tourist');

        // Guide User
        $guideUser = User::create([
            'name' => 'Nodira Karimova',
            'email' => 'guide1@arounduz.com',
            'password' => Hash::make('11111111'),
            'phone' => '+998901234569',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);
        $guideUser->assignRole('guide');

        // Create Guide Profile
        $guide = Guide::create([
            'user_id' => $guideUser->id,
            'country_id' => 1,
            'city_id' => 1,
            'experience_years' => 5,
            'hourly_rate' => 25.00,
            'daily_rate' => 150.00,
            'status' => 'offline',
            'verified' => false,
        ]);

        $guide->languages()->attach([1, 2]);
        $guide->specializations()->attach([1, 2]);

        // Agency User
        $agencyUser = User::create([
            'name' => 'Silk Road Adventures',
            'email' => 'agency1@arounduz.com',
            'password' => Hash::make('11111111'),
            'phone' => '+998901234570',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);
        $agencyUser->assignRole('agency');

        // Create Agency Profile
        $agency = Agency::create([
            'user_id' => $agencyUser->id,
            'name' => 'Silk Road Adventures',
            'license_number' => 'LIC-2024-001',
            'country_id' => 1,
            'city_id' => 1,
            'established' => 2015,
            'status' => 'offline',
            'verified' => false,
        ]);

        $agency->languages()->attach([1, 2, 3]);
        $agency->specializations()->attach([1, 2, 3]);

        $this->command->info('Test users created successfully!');
        $this->command->info('Admin: admin1@arounduz.com / 11111111');
        $this->command->info('Tourist: tourist1@arounduz.com / 11111111');
        $this->command->info('Guide: guide1@arounduz.com / 11111111');
        $this->command->info('Agency: agency1@arounduz.com / 11111111');
    }
}
