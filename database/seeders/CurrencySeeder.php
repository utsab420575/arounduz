<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    public function run(): void
    {
        $currencies = [
            ['name' => 'US Dollar', 'code' => 'USD', 'symbol' => '$', 'exchange_rate' => 1.0000, 'is_active' => 1],
            ['name' => 'Euro', 'code' => 'EUR', 'symbol' => '€', 'exchange_rate' => 0.92, 'is_active' => 1],
            ['name' => 'Uzbekistani Som', 'code' => 'UZS', 'symbol' => 'soʻm', 'exchange_rate' => 12500.0000, 'is_active' => 1],
            ['name' => 'British Pound', 'code' => 'GBP', 'symbol' => '£', 'exchange_rate' => 0.79, 'is_active' => 1],
            ['name' => 'Japanese Yen', 'code' => 'JPY', 'symbol' => '¥', 'exchange_rate' => 149.50, 'is_active' => 1],
            ['name' => 'Chinese Yuan', 'code' => 'CNY', 'symbol' => '¥', 'exchange_rate' => 7.24, 'is_active' => 1],
            ['name' => 'Russian Ruble', 'code' => 'RUB', 'symbol' => '₽', 'exchange_rate' => 92.50, 'is_active' => 1],
            ['name' => 'Turkish Lira', 'code' => 'TRY', 'symbol' => '₺', 'exchange_rate' => 32.25, 'is_active' => 1],
        ];

        foreach ($currencies as $currency) {
            DB::table('currencies')->insert(array_merge($currency, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
