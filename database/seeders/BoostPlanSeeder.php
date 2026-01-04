<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BoostPlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'name' => 'VIP Boost',
                'type' => 'vip',
                'price' => 49.99,
                'duration_days' => 30,
                'position_priority' => 10,
                'order' => 1,
                'features' => json_encode([
                    'Priority in search results',
                    'VIP badge on profile',
                    '3x more visibility',
                    'Advanced analytics',
                    'Priority support'
                ])
            ],
            [
                'name' => 'Featured Boost',
                'type' => 'featured',
                'price' => 99.99,
                'duration_days' => 30,
                'position_priority' => 20,
                'order' => 2,
                'features' => json_encode([
                    'Featured badge',
                    'Top 10 placement',
                    '5x more visibility',
                    'Premium analytics',
                    'Featured in newsletter',
                    'Priority support'
                ])
            ],
            [
                'name' => 'Sponsor Boost',
                'type' => 'sponsor',
                'price' => 199.99,
                'duration_days' => 30,
                'position_priority' => 30,
                'order' => 3,
                'features' => json_encode([
                    'Sponsor badge',
                    'Top 5 placement',
                    '10x more visibility',
                    'Premium analytics dashboard',
                    'Featured in all marketing',
                    'VIP support',
                    'Dedicated account manager'
                ])
            ],
            [
                'name' => 'Top Search',
                'type' => 'top_search',
                'price' => 299.99,
                'duration_days' => 30,
                'position_priority' => 40,
                'order' => 4,
                'features' => json_encode([
                    'Premium badge',
                    '#1 search placement',
                    '15x more visibility',
                    'Real-time analytics',
                    'Homepage banner',
                    'All marketing channels',
                    'VIP support 24/7',
                    'Dedicated account manager',
                    'Custom promotion'
                ])
            ],
        ];

        foreach ($plans as $plan) {
            $planId = DB::table('boost_plans')->insertGetId([
                'name' => $plan['name'],
                'slug' => Str::slug($plan['name']),
                'type' => $plan['type'],
                'price' => $plan['price'],
                'currency' => 'USD',
                'duration_days' => $plan['duration_days'],
                'position_priority' => $plan['position_priority'],
                'features' => $plan['features'],
                'is_active' => 1,
                'order' => $plan['order'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Add features to boost_features table
            $features = json_decode($plan['features'], true);
            foreach ($features as $feature) {
                DB::table('boost_features')->insert([
                    'boost_plan_id' => $planId,
                    'feature' => $feature,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
