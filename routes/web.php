<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileCompletionController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend Routes (Public)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('pages.frontend.home');
})->name('home');

// Placeholder routes for frontend navigation
Route::get('/destinations', function () {
    return view('pages.frontend.destinations');
})->name('destinations');

Route::get('/guides', function () {
    return view('pages.frontend.guides');
})->name('guides');

Route::get('/agents', function () {
    return view('pages.frontend.agents');
})->name('agents');

Route::get('/about', function () {
    return view('pages.frontend.about');
})->name('about');

Route::get('/contact', function () {
    return view('pages.frontend.contact');
})->name('contact');

/*
|--------------------------------------------------------------------------
| Profile Completion Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile/complete', [ProfileCompletionController::class, 'show'])->name('profile.complete');
    Route::post('/profile/complete', [ProfileCompletionController::class, 'store'])->name('profile.complete.store');
});

/*
|--------------------------------------------------------------------------
| Backend Dashboard Routes (Authenticated + Verified + Active Status)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified', 'status.active'])->group(function () {

    // Main Dashboard (role-based)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        // User Management
        Route::get('/users', function () {
            return 'Admin: User Management';
        })->name('users.index');

        Route::get('/users/tourists', function () {
            return 'Admin: Tourist Management';
        })->name('users.tourists');

        Route::get('/users/guides', function () {
            return 'Admin: Guide Management';
        })->name('users.guides');

        Route::get('/users/agencies', function () {
            return 'Admin: Agency Management';
        })->name('users.agencies');

        // Verification Requests
        Route::get('/verifications/guides', function () {
            return 'Admin: Pending Guide Verifications';
        })->name('verifications.guides');

        Route::get('/verifications/agencies', function () {
            return 'Admin: Pending Agency Verifications';
        })->name('verifications.agencies');

        // Bookings Management
        Route::get('/bookings', function () {
            return 'Admin: All Bookings';
        })->name('bookings.index');

        // Reviews Management
        Route::get('/reviews', function () {
            return 'Admin: All Reviews';
        })->name('reviews.index');

        // Subscription Plans
        Route::get('/subscriptions', function () {
            return 'Admin: Subscription Plans';
        })->name('subscriptions.index');

        // Settings
        Route::get('/settings', function () {
            return 'Admin: Settings';
        })->name('settings');
    });

    /*
    |--------------------------------------------------------------------------
    | Tourist Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:tourist'])->prefix('tourist')->name('tourist.')->group(function () {
        // Bookings
        Route::get('/bookings', function () {
            return 'Tourist: My Bookings';
        })->name('bookings.index');

        // Favorites
        Route::get('/favorites/guides', function () {
            return 'Tourist: Favorite Guides';
        })->name('favorites.guides');

        Route::get('/favorites/agencies', function () {
            return 'Tourist: Favorite Agencies';
        })->name('favorites.agencies');

        // Messages
        Route::get('/messages', function () {
            return 'Tourist: Messages';
        })->name('messages.index');

        // Reviews
        Route::get('/reviews', function () {
            return 'Tourist: My Reviews';
        })->name('reviews.index');
    });

    /*
    |--------------------------------------------------------------------------
    | Guide Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:guide'])->prefix('guide')->name('guide.')->group(function () {
        // Profile Management
        Route::get('/profile', function () {
            return 'Guide: My Profile';
        })->name('profile.index');

        // Bookings
        Route::get('/bookings', function () {
            return 'Guide: My Bookings';
        })->name('bookings.index');

        // Reviews
        Route::get('/reviews', function () {
            return 'Guide: My Reviews';
        })->name('reviews.index');

        // Availability Calendar
        Route::get('/availability', function () {
            return 'Guide: Availability Calendar';
        })->name('availability.index');

        // Earnings
        Route::get('/earnings', function () {
            return 'Guide: Earnings & Payments';
        })->name('earnings.index');
    });

    /*
    |--------------------------------------------------------------------------
    | Agency Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:agency'])->prefix('agency')->name('agency.')->group(function () {
        // Company Profile
        Route::get('/profile', function () {
            return 'Agency: Company Profile';
        })->name('profile.index');

        // Tour Packages
        Route::get('/packages', function () {
            return 'Agency: Tour Packages';
        })->name('packages.index');

        // Team Members
        Route::get('/team', function () {
            return 'Agency: Team Members';
        })->name('team.index');

        // Bookings
        Route::get('/bookings', function () {
            return 'Agency: My Bookings';
        })->name('bookings.index');

        // Reviews
        Route::get('/reviews', function () {
            return 'Agency: My Reviews';
        })->name('reviews.index');

        // Earnings
        Route::get('/earnings', function () {
            return 'Agency: Earnings & Payments';
        })->name('earnings.index');
    });
});

/*
|--------------------------------------------------------------------------
| Helper Route for Dynamic Cities (for dropdowns)
|--------------------------------------------------------------------------
*/
Route::get('/get-cities/{region_id}', function ($region_id) {
    $cities = \App\Models\City::where('region_id', $region_id)
        ->where('is_active', true)
        ->orderBy('name')
        ->get(['id', 'name']);
    return response()->json($cities);
});

// Auth routes (provided by Breeze)
require __DIR__.'/auth.php';
