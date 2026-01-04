<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SpecializationSeeder extends Seeder
{
    public function run(): void
    {
        $specializations = [
            [
                'name' => 'Historical Tours',
                'description' => 'Expert guides for historical sites and monuments',
                'icon' => 'landmark'
            ],
            [
                'name' => 'Photography Tours',
                'description' => 'Perfect spots for photography enthusiasts',
                'icon' => 'camera'
            ],
            [
                'name' => 'Food & Culinary Tours',
                'description' => 'Explore local cuisine and culinary traditions',
                'icon' => 'utensils'
            ],
            [
                'name' => 'Adventure & Trekking',
                'description' => 'Outdoor adventures and mountain trekking',
                'icon' => 'hiking'
            ],
            [
                'name' => 'Cultural & Traditional',
                'description' => 'Experience authentic local culture and traditions',
                'icon' => 'theater-masks'
            ],
            [
                'name' => 'Religious & Spiritual',
                'description' => 'Visit mosques, madrasas and spiritual sites',
                'icon' => 'mosque'
            ],
            [
                'name' => 'Nature & Wildlife',
                'description' => 'Explore natural parks and wildlife',
                'icon' => 'tree'
            ],
            [
                'name' => 'Shopping & Markets',
                'description' => 'Discover local bazaars and shopping experiences',
                'icon' => 'shopping-bag'
            ],
            [
                'name' => 'Family-Friendly',
                'description' => 'Perfect tours for families with children',
                'icon' => 'users'
            ],
            [
                'name' => 'Luxury & VIP',
                'description' => 'Premium and exclusive tour experiences',
                'icon' => 'crown'
            ],
            [
                'name' => 'Silk Road Heritage',
                'description' => 'Ancient Silk Road routes and caravanserais',
                'icon' => 'road'
            ],
            [
                'name' => 'Architecture Tours',
                'description' => 'Islamic architecture and ancient buildings',
                'icon' => 'building'
            ],
        ];

        foreach ($specializations as $spec) {
            DB::table('specializations')->insert([
                'name' => $spec['name'],
                'slug' => Str::slug($spec['name']),
                'description' => $spec['description'],
                'icon' => $spec['icon'],
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
