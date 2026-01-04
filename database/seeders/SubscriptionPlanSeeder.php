<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubscriptionPlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'name' => '5 Views Pack',
                'type' => 'contact_views',
                'price' => 9.99,
                'views_limit' => 5,
                'duration_days' => 30,
                'order' => 1,
                'features' => json_encode([
                    'Contact information access',
                    'Direct messaging',
                    'View history',
                    'Email support'
                ])
            ],
            [
                'name' => '15 Views Pack',
                'type' => 'contact_views',
                'price' => 24.99,
                'views_limit' => 15,
                'duration_days' => 30,
                'order' => 2,
                'features' => json_encode([
                    'Contact information access',
                    'Direct messaging',
                    'View history',
                    'Priority email support',
                    'Save 17%'
                ])
            ],
            [
                'name' => 'Weekly Unlimited',
                'type' => 'weekly',
                'price' => 19.99,
                'views_limit' => null,
                'duration_days' => 7,
                'order' => 3,
                'features' => json_encode([
                    'Unlimited contact views',
                    'Direct messaging',
                    'View history',
                    'Priority support',
                    '7 days access'
                ])
            ],
            [
                'name' => 'Monthly Unlimited',
                'type' => 'monthly',
                'price' => 29.99,
                'views_limit' => null,
                'duration_days' => 30,
                'order' => 4,
                'features' => json_encode([
                    'Unlimited contact views',
                    'Direct messaging',
                    'View history',
                    'Priority support',
                    '30 days access',
                    'Best value'
                ])
            ],
        ];

        foreach ($plans as $plan) {
            $planId = DB::table('subscription_plans')->insertGetId([
                'name' => $plan['name'],
                'slug' => Str::slug($plan['name']),
                'type' => $plan['type'],
                'price' => $plan['price'],
                'currency' => 'USD',
                'views_limit' => $plan['views_limit'],
                'duration_days' => $plan['duration_days'],
                'features' => $plan['features'],
                'is_active' => 1,
                'order' => $plan['order'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Add features to subscription_features table
            $features = json_decode($plan['features'], true);
            foreach ($features as $feature) {
                DB::table('subscription_features')->insert([
                    'subscription_plan_id' => $planId,
                    'feature' => $feature,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
