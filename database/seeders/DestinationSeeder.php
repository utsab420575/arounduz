<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DestinationSeeder extends Seeder
{
    public function run(): void
    {
        $destinations = [
            [
                'name' => 'Samarkand',
                'tagline' => 'Pearl of the East',
                'description' => 'Ancient Silk Road city with stunning Islamic architecture and rich history.',
                'guides_count' => 0,
                'tours_count' => 0,
                'featured' => 1,
                'order' => 1,
                'highlights' => ['Registan Square', 'Shah-i-Zinda', 'Gur-e-Amir Mausoleum']
            ],
            [
                'name' => 'Bukhara',
                'tagline' => 'Living Museum',
                'description' => 'UNESCO World Heritage site with over 140 architectural monuments.',
                'guides_count' => 0,
                'tours_count' => 0,
                'featured' => 1,
                'order' => 2,
                'highlights' => ['Kalyan Minaret', 'Ark Fortress', 'Poi-Kalyan Complex']
            ],
            [
                'name' => 'Khiva',
                'tagline' => 'Open-Air Museum',
                'description' => 'Perfectly preserved ancient city within its city walls.',
                'guides_count' => 0,
                'tours_count' => 0,
                'featured' => 1,
                'order' => 3,
                'highlights' => ['Itchan Kala', 'Kalta Minor Minaret', 'Juma Mosque']
            ],
            [
                'name' => 'Tashkent',
                'tagline' => 'Modern Capital',
                'description' => 'Vibrant capital city blending Soviet heritage with modern development.',
                'guides_count' => 0,
                'tours_count' => 0,
                'featured' => 1,
                'order' => 4,
                'highlights' => ['Chorsu Bazaar', 'Amir Timur Square', 'Tashkent Metro']
            ],
        ];

        foreach ($destinations as $dest) {
            $highlights = $dest['highlights'];
            unset($dest['highlights']);

            $destId = DB::table('destinations')->insertGetId([
                'name' => $dest['name'],
                'slug' => Str::slug($dest['name']),
                'tagline' => $dest['tagline'],
                'description' => $dest['description'],
                'guides_count' => $dest['guides_count'],
                'tours_count' => $dest['tours_count'],
                'featured' => $dest['featured'],
                'order' => $dest['order'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Add highlights
            foreach ($highlights as $highlight) {
                DB::table('destination_highlights')->insert([
                    'destination_id' => $destId,
                    'highlight' => $highlight,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
