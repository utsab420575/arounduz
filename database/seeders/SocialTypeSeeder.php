<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SocialTypeSeeder extends Seeder
{
    public function run(): void
    {
        $socialTypes = [
            ['name' => 'Facebook', 'icon' => 'facebook-f', 'base_url' => 'https://facebook.com/'],
            ['name' => 'Instagram', 'icon' => 'instagram', 'base_url' => 'https://instagram.com/'],
            ['name' => 'Twitter', 'icon' => 'twitter', 'base_url' => 'https://twitter.com/'],
            ['name' => 'LinkedIn', 'icon' => 'linkedin-in', 'base_url' => 'https://linkedin.com/in/'],
            ['name' => 'Telegram', 'icon' => 'telegram', 'base_url' => 'https://t.me/'],
            ['name' => 'WhatsApp', 'icon' => 'whatsapp', 'base_url' => 'https://wa.me/'],
            ['name' => 'YouTube', 'icon' => 'youtube', 'base_url' => 'https://youtube.com/'],
            ['name' => 'TikTok', 'icon' => 'tiktok', 'base_url' => 'https://tiktok.com/@'],
            ['name' => 'Website', 'icon' => 'globe', 'base_url' => 'https://'],
        ];

        foreach ($socialTypes as $social) {
            DB::table('social_types')->insert([
                'name' => $social['name'],
                'slug' => Str::slug($social['name']),
                'icon' => $social['icon'],
                'base_url' => $social['base_url'],
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
