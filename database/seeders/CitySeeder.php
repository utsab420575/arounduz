<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $uzbekistanId = DB::table('countries')->where('code', 'UZ')->value('id');

        $cities = [
            // Tashkent Region
            [
                'region' => 'Tashkent Region',
                'name' => 'Tashkent',
                'code' => 'TAS-CITY'
            ],
            // Samarkand Region
            [
                'region' => 'Samarkand Region',
                'name' => 'Samarkand',
                'code' => 'SAM-CITY'
            ],
            // Bukhara Region
            [
                'region' => 'Bukhara Region',
                'name' => 'Bukhara',
                'code' => 'BUK-CITY'
            ],
            // Khorezm Region
            [
                'region' => 'Khorezm Region',
                'name' => 'Khiva',
                'code' => 'KHI-CITY'
            ],
            [
                'region' => 'Khorezm Region',
                'name' => 'Urgench',
                'code' => 'URG-CITY'
            ],
            // Kashkadarya Region
            [
                'region' => 'Kashkadarya Region',
                'name' => 'Shakhrisabz',
                'code' => 'SHA-CITY'
            ],
            // Surkhandarya Region
            [
                'region' => 'Surkhandarya Region',
                'name' => 'Termez',
                'code' => 'TER-CITY'
            ],
            // Fergana Valley
            [
                'region' => 'Fergana Valley',
                'name' => 'Kokand',
                'code' => 'KOK-CITY'
            ],
            [
                'region' => 'Fergana Valley',
                'name' => 'Margilan',
                'code' => 'MAR-CITY'
            ],
            [
                'region' => 'Fergana Valley',
                'name' => 'Fergana',
                'code' => 'FER-CITY'
            ],
            // Karakalpakstan
            [
                'region' => 'Karakalpakstan',
                'name' => 'Nukus',
                'code' => 'NUK-CITY'
            ],
        ];

        foreach ($cities as $cityData) {
            $regionId = DB::table('regions')
                ->where('name', $cityData['region'])
                ->value('id');

            DB::table('cities')->insert([
                'region_id' => $regionId,
                'country_id' => $uzbekistanId,
                'name' => $cityData['name'],
                'code' => $cityData['code'],
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
