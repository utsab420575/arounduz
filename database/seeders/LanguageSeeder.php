<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    public function run(): void
    {
        $languages = [
            ['name' => 'English', 'code' => 'en', 'is_active' => 1],
            ['name' => 'Russian', 'code' => 'ru', 'is_active' => 1],
            ['name' => 'Uzbek', 'code' => 'uz', 'is_active' => 1],
            ['name' => 'Turkish', 'code' => 'tr', 'is_active' => 1],
            ['name' => 'German', 'code' => 'de', 'is_active' => 1],
            ['name' => 'French', 'code' => 'fr', 'is_active' => 1],
            ['name' => 'Spanish', 'code' => 'es', 'is_active' => 1],
            ['name' => 'Arabic', 'code' => 'ar', 'is_active' => 1],
            ['name' => 'Chinese', 'code' => 'zh', 'is_active' => 1],
            ['name' => 'Japanese', 'code' => 'ja', 'is_active' => 1],
            ['name' => 'Korean', 'code' => 'ko', 'is_active' => 1],
            ['name' => 'Italian', 'code' => 'it', 'is_active' => 1],
            ['name' => 'Portuguese', 'code' => 'pt', 'is_active' => 1],
        ];

        foreach ($languages as $language) {
            DB::table('languages')->insert(array_merge($language, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
