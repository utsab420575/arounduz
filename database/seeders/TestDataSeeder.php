<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Guide;
use App\Models\Agency;
use App\Models\Booking;
use App\Models\Review;
use App\Models\Country;
use App\Models\Region;
use App\Models\City;
use App\Models\Language;
use App\Models\Specialization;

class TestDataSeeder extends Seeder
{
    public function run(): void
    {
        $uz = Country::where('code', 'UZ')->firstOrFail();

        $tashkentRegion  = Region::where('country_id', $uz->id)->where('name', 'Tashkent')->first();
        $samarkandRegion = Region::where('country_id', $uz->id)->where('name', 'Samarkand')->first();
        $bukharaRegion   = Region::where('country_id', $uz->id)->where('name', 'Bukhara')->first();

        $tashkentCity  = City::where('country_id', $uz->id)->where('name', 'Tashkent')->first();
        $samarkandCity = City::where('country_id', $uz->id)->where('name', 'Samarkand')->first();
        $bukharaCity   = City::where('country_id', $uz->id)->where('name', 'Bukhara')->first();

        $languageIds = Language::whereIn('code', ['en','ru','uz','tr'])->pluck('id');
        $specIds     = Specialization::pluck('id');

        // 1) 5 regular users
        $users = User::factory()->count(5)->create([
            'role' => 'user',
            'status' => 'active',
        ]);

        // 2) 3 guide users + guide profiles
        // If your UserFactory has ->guide(), keep it. Otherwise replace with ->state(['role'=>'guide'])
        $guideUsers = method_exists(User::factory(), 'guide')
            ? User::factory()->count(3)->guide()->create(['status' => 'active'])
            : User::factory()->count(3)->create(['role' => 'guide', 'status' => 'active']);

        $guides = collect();

        foreach ($guideUsers as $i => $u) {
            $city = [$tashkentCity, $samarkandCity, $bukharaCity][$i % 3] ?? $tashkentCity;
            $regionId = $city?->region_id ?? $tashkentRegion?->id ?? $samarkandRegion?->id ?? $bukharaRegion?->id;

            $guide = Guide::factory()->create([
                'user_id'    => $u->id,
                'country_id' => $uz->id,
                'region_id'  => $regionId,
                'city_id'    => $city?->id,
                'location'   => $city?->name ?? 'Uzbekistan',
            ]);

            // Attach languages (insert into guide_languages via GuideLanguage model)
            if ($languageIds->count() > 0) {
                $pickedLangs = $languageIds->random(min(2, $languageIds->count()))->unique()->values();
                foreach ($pickedLangs as $langId) {
                    $guide->languages()->firstOrCreate(['language_id' => $langId]);
                }
            }

            // Attach specializations (insert into guide_specializations via GuideSpecialization model)
            if ($specIds->count() > 0) {
                $pickedSpecs = $specIds->random(min(3, $specIds->count()))->unique()->values();
                foreach ($pickedSpecs as $specId) {
                    $guide->specializations()->firstOrCreate(['specialization_id' => $specId]);
                }
            }

            $guides->push($guide);
        }

        // 3) 2 agency users + agency profiles
        $agencyUsers = method_exists(User::factory(), 'agency')
            ? User::factory()->count(2)->agency()->create(['status' => 'active'])
            : User::factory()->count(2)->create(['role' => 'agency', 'status' => 'active']);

        $agencies = collect();

        foreach ($agencyUsers as $i => $u) {
            $city = [$tashkentCity, $samarkandCity][$i % 2] ?? $tashkentCity;
            $regionId = $city?->region_id ?? $tashkentRegion?->id;

            $agency = Agency::factory()->create([
                'user_id'    => $u->id,
                'country_id' => $uz->id,
                'region_id'  => $regionId,
                'city_id'    => $city?->id,
                'location'   => $city?->name ?? 'Uzbekistan',
            ]);

            // Attach languages (insert into agency_languages via AgencyLanguage model)
            if ($languageIds->count() > 0) {
                $pickedLangs = $languageIds->random(min(2, $languageIds->count()))->unique()->values();
                foreach ($pickedLangs as $langId) {
                    $agency->languages()->firstOrCreate(['language_id' => $langId]);
                }
            }

            // Attach specializations (insert into agency_specializations via AgencySpecialization model)
            if ($specIds->count() > 0) {
                $pickedSpecs = $specIds->random(min(3, $specIds->count()))->unique()->values();
                foreach ($pickedSpecs as $specId) {
                    $agency->specializations()->firstOrCreate(['specialization_id' => $specId]);
                }
            }

            $agencies->push($agency);
        }

        // 4) Sample bookings (mix guides + agencies)
        $bookings = collect();

        foreach ($users as $u) {
            if ($guides->count() === 0) break;

            $targetGuide = $guides->random();

            $bookings->push(
                Booking::factory()->create([
                    'user_id'       => $u->id,
                    'bookable_type' => Guide::class,
                    'bookable_id'   => $targetGuide->id,
                ])
            );
        }

        foreach ($users->take(2) as $u) {
            if ($agencies->count() === 0) break;

            $targetAgency = $agencies->random();

            $bookings->push(
                Booking::factory()->create([
                    'user_id'       => $u->id,
                    'bookable_type' => Agency::class,
                    'bookable_id'   => $targetAgency->id,
                ])
            );
        }

        // 5) Sample reviews for some completed bookings
        foreach ($bookings->take(5) as $booking) {
            $booking->update([
                'status' => 'completed',
                'payment_status' => 'paid',
            ]);

            Review::factory()->create([
                'user_id'         => $booking->user_id,
                'booking_id'      => $booking->id,
                'reviewable_type' => $booking->bookable_type,
                'reviewable_id'   => $booking->bookable_id,
                'status'          => 'approved',
            ]);
        }
    }
}
