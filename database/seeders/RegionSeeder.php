<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        // Get Uzbekistan country ID
        $uzbekistanId = DB::table('countries')->where('code', 'UZ')->value('id');

        $regions = [
            ['country_id' => $uzbekistanId, 'name' => 'Tashkent Region', 'code' => 'TAS', 'is_active' => 1],
            ['country_id' => $uzbekistanId, 'name' => 'Samarkand Region', 'code' => 'SAM', 'is_active' => 1],
            ['country_id' => $uzbekistanId, 'name' => 'Bukhara Region', 'code' => 'BUK', 'is_active' => 1],
            ['country_id' => $uzbekistanId, 'name' => 'Khorezm Region', 'code' => 'KHO', 'is_active' => 1],
            ['country_id' => $uzbekistanId, 'name' => 'Fergana Valley', 'code' => 'FER', 'is_active' => 1],
            ['country_id' => $uzbekistanId, 'name' => 'Kashkadarya Region', 'code' => 'KAS', 'is_active' => 1],
            ['country_id' => $uzbekistanId, 'name' => 'Surkhandarya Region', 'code' => 'SUR', 'is_active' => 1],
            ['country_id' => $uzbekistanId, 'name' => 'Karakalpakstan', 'code' => 'KAR', 'is_active' => 1],
        ];

        foreach ($regions as $region) {
            DB::table('regions')->insert(array_merge($region, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
