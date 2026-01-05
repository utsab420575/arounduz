<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Show appropriate dashboard based on role
        if ($user->hasRole('admin')) {
            return $this->adminDashboard();
        } elseif ($user->hasRole('guide')) {
            return $this->guideDashboard();
        } elseif ($user->hasRole('agency')) {
            return $this->agencyDashboard();
        } else {
            return $this->touristDashboard();
        }
    }

    private function adminDashboard()
    {
        $stats = [
            'total_users' => \App\Models\User::count(),
            'total_guides' => \App\Models\User::role('guide')->count(),
            'total_agencies' => \App\Models\User::role('agency')->count(),
            'total_tourists' => \App\Models\User::role('tourist')->count(),
            'total_bookings' => 0, // Will implement later
            'pending_verifications' => 0, // Will implement later
        ];

        return view('pages.backend.dashboard.admin', compact('stats'));
    }

    private function touristDashboard()
    {
        $stats = [
            'total_bookings' => 0,
            'favorite_guides' => 0,
            'favorite_agencies' => 0,
            'reviews_given' => 0,
        ];

        return view('pages.backend.dashboard.tourist', compact('stats'));
    }

    private function guideDashboard()
    {
        $stats = [
            'total_bookings' => 0,
            'total_earnings' => 0,
            'average_rating' => 0,
            'total_reviews' => 0,
            'profile_views' => 0,
            'upcoming_tours' => 0,
        ];

        return view('pages.backend.dashboard.guide', compact('stats'));
    }

    private function agencyDashboard()
    {
        $stats = [
            'total_packages' => 0,
            'total_bookings' => 0,
            'total_earnings' => 0,
            'average_rating' => 0,
            'team_members' => 0,
            'active_packages' => 0,
        ];

        return view('pages.backend.dashboard.agency', compact('stats'));
    }
}
