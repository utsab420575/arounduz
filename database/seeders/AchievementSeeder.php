<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AchievementSeeder extends Seeder
{
    public function run(): void
    {
        $achievements = [
            [
                'name' => 'First Tour Completed',
                'description' => 'Successfully completed your first tour',
                'badge_icon' => '🎉',
                'type' => 'tours_completed',
                'requirement_value' => 1
            ],
            [
                'name' => '10 Tours Milestone',
                'description' => 'Completed 10 tours as a guide',
                'badge_icon' => '🏆',
                'type' => 'tours_completed',
                'requirement_value' => 10
            ],
            [
                'name' => '50 Tours Expert',
                'description' => 'Expert guide with 50 completed tours',
                'badge_icon' => '⭐',
                'type' => 'tours_completed',
                'requirement_value' => 50
            ],
            [
                'name' => '100 Tours Master',
                'description' => 'Master guide with 100 completed tours',
                'badge_icon' => '👑',
                'type' => 'tours_completed',
                'requirement_value' => 100
            ],
            [
                'name' => '5-Star Rating',
                'description' => 'Achieved a perfect 5-star rating',
                'badge_icon' => '🌟',
                'type' => 'rating_milestone',
                'requirement_value' => 5
            ],
            [
                'name' => 'First Certification',
                'description' => 'Earned your first professional certification',
                'badge_icon' => '📜',
                'type' => 'certification_earned',
                'requirement_value' => 1
            ],
            [
                'name' => 'Training Graduate',
                'description' => 'Completed your first training course',
                'badge_icon' => '🎓',
                'type' => 'training_completed',
                'requirement_value' => 1
            ],
            [
                'name' => 'Verified Guide',
                'description' => 'Successfully verified by AroundUz',
                'badge_icon' => '✅',
                'type' => 'certification_earned',
                'requirement_value' => 1
            ],
            [
                'name' => 'Customer Favorite',
                'description' => 'Received 100+ positive reviews',
                'badge_icon' => '💖',
                'type' => 'rating_milestone',
                'requirement_value' => 100
            ],
        ];

        foreach ($achievements as $achievement) {
            DB::table('achievements')->insert([
                'name' => $achievement['name'],
                'slug' => Str::slug($achievement['name']),
                'description' => $achievement['description'],
                'badge_icon' => $achievement['badge_icon'],
                'type' => $achievement['type'],
                'requirement_value' => $achievement['requirement_value'],
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
