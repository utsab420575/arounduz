<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\City;
use App\Models\Language;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileCompletionController extends Controller
{
    /**
     * Show profile completion form
     */
    public function show()
    {
        $user = Auth::user();

        // If already completed, redirect to dashboard
        if ($user->hasCompletedProfile()) {
            return redirect()->route('dashboard');
        }

        $countries = Country::where('is_active', true)->orderBy('name')->get();
        $cities = City::where('is_active', true)->orderBy('name')->get();
        $languages = Language::where('is_active', true)->orderBy('name')->get();
        $specializations = Specialization::where('is_active', true)->orderBy('name')->get();

        return view('auth.complete-profile', compact('user', 'countries', 'cities', 'languages', 'specializations'));
    }

    /**
     * Store profile completion
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        // Validation rules based on role
        $rules = [
            'phone' => ['required', 'string', 'max:20'],
            'country_id' => ['required', 'exists:countries,id'],
            'city_id' => ['required', 'exists:cities,id'],
        ];

        if ($user->hasRole('guide')) {
            $rules['experience_years'] = ['required', 'integer', 'min:0', 'max:50'];
            $rules['hourly_rate'] = ['required', 'numeric', 'min:0'];
            $rules['daily_rate'] = ['required', 'numeric', 'min:0'];
            $rules['languages'] = ['required', 'array', 'min:1'];
            $rules['languages.*'] = ['exists:languages,id'];
            $rules['specializations'] = ['required', 'array', 'min:1'];
            $rules['specializations.*'] = ['exists:specializations,id'];
        } elseif ($user->hasRole('agency')) {
            $rules['company_name'] = ['required', 'string', 'max:255'];
            $rules['license_number'] = ['required', 'string', 'max:100'];
            $rules['established'] = ['required', 'integer', 'min:1900', 'max:' . date('Y')];
            $rules['languages'] = ['required', 'array', 'min:1'];
            $rules['languages.*'] = ['exists:languages,id'];
            $rules['specializations'] = ['required', 'array', 'min:1'];
            $rules['specializations.*'] = ['exists:specializations,id'];
        }

        $validated = $request->validate($rules);

        // Update user phone
        $user->update([
            'phone' => $validated['phone'],
        ]);

        // Create role-specific profile
        if ($user->hasRole('guide')) {
            $guide = \App\Models\Guide::create([
                'user_id' => $user->id,
                'country_id' => $validated['country_id'],
                'city_id' => $validated['city_id'],
                'experience_years' => $validated['experience_years'],
                'hourly_rate' => $validated['hourly_rate'],
                'daily_rate' => $validated['daily_rate'],
                'status' => 'offline',
                'verified' => false,
            ]);

            $guide->languages()->attach($validated['languages']);
            $guide->specializations()->attach($validated['specializations']);
        } elseif ($user->hasRole('agency')) {
            $agency = \App\Models\Agency::create([
                'user_id' => $user->id,
                'name' => $validated['company_name'],
                'license_number' => $validated['license_number'],
                'country_id' => $validated['country_id'],
                'city_id' => $validated['city_id'],
                'established' => $validated['established'],
                'status' => 'offline',
                'verified' => false,
            ]);

            $agency->languages()->attach($validated['languages']);
            $agency->specializations()->attach($validated['specializations']);
        }

        return redirect()->route('dashboard')->with('success', 'Profile completed successfully! Welcome to AroundUz.');
    }
}
