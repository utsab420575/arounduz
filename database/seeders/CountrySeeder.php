<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countries = [
            ['name' => 'Uzbekistan', 'code' => 'UZ', 'flag' => '🇺🇿', 'is_active' => 1],
            ['name' => 'United States', 'code' => 'US', 'flag' => '🇺🇸', 'is_active' => 1],
            ['name' => 'United Kingdom', 'code' => 'GB', 'flag' => '🇬🇧', 'is_active' => 1],
            ['name' => 'China', 'code' => 'CN', 'flag' => '🇨🇳', 'is_active' => 1],
            ['name' => 'Russia', 'code' => 'RU', 'flag' => '🇷🇺', 'is_active' => 1],
            ['name' => 'Turkey', 'code' => 'TR', 'flag' => '🇹🇷', 'is_active' => 1],
            ['name' => 'Germany', 'code' => 'DE', 'flag' => '🇩🇪', 'is_active' => 1],
            ['name' => 'France', 'code' => 'FR', 'flag' => '🇫🇷', 'is_active' => 1],
            ['name' => 'Japan', 'code' => 'JP', 'flag' => '🇯🇵', 'is_active' => 1],
            ['name' => 'South Korea', 'code' => 'KR', 'flag' => '🇰🇷', 'is_active' => 1],
        ];

        foreach ($countries as $country) {
            DB::table('countries')->insert(array_merge($country, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
