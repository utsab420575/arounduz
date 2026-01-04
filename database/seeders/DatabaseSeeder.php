<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CurrencySeeder::class,
            CountrySeeder::class,
            RegionSeeder::class,
            CitySeeder::class,
            LanguageSeeder::class,
            SpecializationSeeder::class,
            SocialTypeSeeder::class,
            AchievementSeeder::class,
            AdminUserSeeder::class,
            TestDataSeeder::class,
        ]);
    }
}
