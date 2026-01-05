@extends('layouts.backend.master')

@section('title', 'Guide Dashboard')

@section('breadcrumbs')
    <a href="{{ route('home') }}" class="hover:text-skyblue">
        <i class="fas fa-home"></i> Home
    </a>
    <i class="fas fa-chevron-right mx-2 text-xs"></i>
    <span class="text-gray-900">Guide Dashboard</span>
@endsection

@section('content')
    <div class="max-w-7xl mx-auto">

        <!-- Welcome Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold bg-gradient-to-r from-skyblue to-blue-600 bg-clip-text text-transparent">
                <i class="fas fa-user-tie"></i> Welcome, {{ Auth::user()->name }}!
            </h1>
            <p class="text-gray-600 mt-1">Your guide performance dashboard</p>
        </div>

        <!-- Profile Completion Alert -->
        @if(!Auth::user()->hasCompletedProfile())
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-lg mb-6">
                <div class="flex items-center">
                    <i class="fa-solid fa-exclamation-triangle text-yellow-600 text-xl mr-3"></i>
                    <div class="flex-1">
                        <h3 class="font-semibold text-yellow-800">Complete Your Guide Profile</h3>
                        <p class="text-sm text-yellow-700 mt-1">Add your experience, rates, languages, and specializations to start receiving bookings!</p>
                    </div>
                    <a href="{{ route('profile.complete') }}" class="bg-yellow-400 text-yellow-900 px-4 py-2 rounded-lg font-medium hover:bg-yellow-500 transition-colors">
                        Complete Now
                    </a>
                </div>
            </div>
        @endif

        <!-- Verification Status -->
        @if(Auth::user()->guide && !Auth::user()->guide->verified)
            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-lg mb-6">
                <div class="flex items-center">
                    <i class="fa-solid fa-shield-check text-blue-600 text-xl mr-3"></i>
                    <div class="flex-1">
                        <h3 class="font-semibold text-blue-800">Verification Pending</h3>
                        <p class="text-sm text-blue-700 mt-1">Your profile is under review. Verified guides get 3x more bookings!</p>
                    </div>
                    <span class="bg-blue-400 text-white px-4 py-2 rounded-lg font-medium">
                    <i class="fa-solid fa-clock mr-1"></i>Pending
                </span>
                </div>
            </div>
        @endif

        <!-- Stats Cards -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">

            <!-- Total Bookings -->
            <div class="bg-gradient-to-br from-skyblue to-blue-500 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-center">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fa-solid fa-calendar-check text-2xl"></i>
                    </div>
                    <span class="text-3xl font-bold block">{{ $stats['total_bookings'] ?? 0 }}</span>
                    <p class="text-sm font-medium opacity-90 mt-1">Bookings</p>
                </div>
            </div>

            <!-- Total Earnings -->
            <div class="bg-gradient-to-br from-green-400 to-green-600 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-center">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fa-solid fa-coins text-2xl"></i>
                    </div>
                    <span class="text-3xl font-bold block">${{ $stats['total_earnings'] ?? 0 }}</span>
                    <p class="text-sm font-medium opacity-90 mt-1">Earnings</p>
                </div>
            </div>

            <!-- Average Rating -->
            <div class="bg-gradient-to-br from-amber-400 to-amber-600 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-center">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fa-solid fa-star text-2xl"></i>
                    </div>
                    <span class="text-3xl font-bold block">{{ $stats['average_rating'] ?? '0.0' }}</span>
                    <p class="text-sm font-medium opacity-90 mt-1">Rating</p>
                </div>
            </div>

            <!-- Total Reviews -->
            <div class="bg-gradient-to-br from-purple-400 to-purple-600 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-center">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fa-solid fa-comment text-2xl"></i>
                    </div>
                    <span class="text-3xl font-bold block">{{ $stats['total_reviews'] ?? 0 }}</span>
                    <p class="text-sm font-medium opacity-90 mt-1">Reviews</p>
                </div>
            </div>

            <!-- Profile Views -->
            <div class="bg-gradient-to-br from-coral to-orange-500 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-center">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fa-solid fa-eye text-2xl"></i>
                    </div>
                    <span class="text-3xl font-bold block">{{ $stats['profile_views'] ?? 0 }}</span>
                    <p class="text-sm font-medium opacity-90 mt-1">Views</p>
                </div>
            </div>

            <!-- Upcoming Tours -->
            <div class="bg-gradient-to-br from-blue-400 to-indigo-600 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-center">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fa-solid fa-calendar-days text-2xl"></i>
                    </div>
                    <span class="text-3xl font-bold block">{{ $stats['upcoming_tours'] ?? 0 }}</span>
                    <p class="text-sm font-medium opacity-90 mt-1">Upcoming</p>
                </div>
            </div>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content (2/3) -->
            <div class="lg:col-span-2 space-y-6">

                <!-- Quick Actions -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-bolt text-yellow-500 mr-2"></i> Quick Actions
                    </h2>

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        <a href="{{ route('guide.profile.index') }}" class="group bg-skyblue bg-opacity-10 hover:bg-skyblue hover:bg-opacity-20 p-4 rounded-xl flex flex-col items-center border border-skyblue border-opacity-20 transition-all">
                            <i class="fas fa-user-edit text-skyblue text-2xl mb-2"></i>
                            <span class="text-sm font-semibold text-skyblue text-center">Edit Profile</span>
                        </a>

                        <a href="{{ route('guide.availability.index') }}" class="group bg-green-100 hover:bg-green-200 p-4 rounded-xl flex flex-col items-center border border-green-200 transition-all">
                            <i class="fas fa-calendar-alt text-green-600 text-2xl mb-2"></i>
                            <span class="text-sm font-semibold text-green-700 text-center">Availability</span>
                        </a>

                        <a href="{{ route('guide.bookings.index') }}" class="group bg-purple-100 hover:bg-purple-200 p-4 rounded-xl flex flex-col items-center border border-purple-200 transition-all">
                            <i class="fas fa-calendar-check text-purple-600 text-2xl mb-2"></i>
                            <span class="text-sm font-semibold text-purple-700 text-center">My Bookings</span>
                        </a>

                        <a href="{{ route('guide.reviews.index') }}" class="group bg-amber-100 hover:bg-amber-200 p-4 rounded-xl flex flex-col items-center border border-amber-200 transition-all">
                            <i class="fas fa-star text-amber-600 text-2xl mb-2"></i>
                            <span class="text-sm font-semibold text-amber-700 text-center">My Reviews</span>
                        </a>

                        <a href="{{ route('guide.earnings.index') }}" class="group bg-coral bg-opacity-10 hover:bg-coral hover:bg-opacity-20 p-4 rounded-xl flex flex-col items-center border border-coral border-opacity-20 transition-all">
                            <i class="fas fa-coins text-coral text-2xl mb-2"></i>
                            <span class="text-sm font-semibold text-coral text-center">Earnings</span>
                        </a>

                        <a href="{{ route('profile.edit') }}" class="group bg-gray-100 hover:bg-gray-200 p-4 rounded-xl flex flex-col items-center border border-gray-200 transition-all">
                            <i class="fas fa-cog text-gray-600 text-2xl mb-2"></i>
                            <span class="text-sm font-semibold text-gray-700 text-center">Settings</span>
                        </a>
                    </div>
                </div>

                <!-- Upcoming Tours -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-calendar-days text-skyblue mr-2"></i> Upcoming Tours
                    </h2>

                    <div class="text-center py-12">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fa-solid fa-calendar-xmark text-gray-300 text-4xl"></i>
                        </div>
                        <p class="text-gray-500 font-medium">No upcoming tours</p>
                        <p class="text-sm text-gray-400 mt-2">Your upcoming bookings will appear here</p>
                    </div>
                </div>

                <!-- Recent Reviews -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-star text-amber-500 mr-2"></i> Recent Reviews
                    </h2>

                    <div class="text-center py-12">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fa-solid fa-star text-gray-300 text-4xl"></i>
                        </div>
                        <p class="text-gray-500 font-medium">No reviews yet</p>
                        <p class="text-sm text-gray-400 mt-2">Complete your first tour to receive reviews!</p>
                    </div>
                </div>

            </div>

            <!-- Sidebar (1/3) -->
            <div class="space-y-6">

                <!-- Profile Summary -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Profile Summary</h3>

                    <div class="text-center">
                        @if(Auth::user()->avatar)
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="w-20 h-20 rounded-full mx-auto mb-3">
                        @else
                            <div class="w-20 h-20 rounded-full bg-gradient-to-br from-skyblue to-blue-600 flex items-center justify-center mx-auto mb-3">
                                <span class="text-3xl font-bold text-white">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                        @endif

                        <h4 class="font-semibold text-gray-900">{{ Auth::user()->name }}</h4>
                        <p class="text-sm text-gray-600">Tour Guide</p>

                        @if(Auth::user()->guide)
                            @if(Auth::user()->guide->verified)
                                <span class="inline-flex items-center mt-2 bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">
                                <i class="fa-solid fa-shield-check mr-1"></i>Verified Guide
                            </span>
                            @else
                                <span class="inline-flex items-center mt-2 bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-medium">
                                <i class="fa-solid fa-clock mr-1"></i>Pending Verification
                            </span>
                            @endif
                        @endif

                        <a href="{{ route('guide.profile.index') }}" class="inline-block mt-4 text-skyblue hover:underline text-sm font-medium">
                            View Public Profile <i class="fa-solid fa-arrow-right ml-1"></i>
                        </a>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-200 space-y-3">
                        @if(Auth::user()->guide)
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-600">Experience:</span>
                                <span class="font-semibold text-gray-900">{{ Auth::user()->guide->experience_years ?? 0 }} years</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-600">Hourly Rate:</span>
                                <span class="font-semibold text-gray-900">${{ Auth::user()->guide->hourly_rate ?? 0 }}</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-600">Daily Rate:</span>
                                <span class="font-semibold text-gray-900">${{ Auth::user()->guide->daily_rate ?? 0 }}</span>
                            </div>
                        @else
                            <p class="text-sm text-gray-600 text-center">Complete your profile to show details</p>
                        @endif
                    </div>
                </div>

                <!-- Performance Tips -->
                <div class="bg-gradient-to-br from-skyblue to-blue-500 rounded-2xl p-6 text-white shadow-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center mr-3">
                            <i class="fa-solid fa-lightbulb text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold">Pro Tips</h3>
                    </div>
                    <ul class="space-y-3 text-sm opacity-90">
                        <li class="flex items-start">
                            <i class="fa-solid fa-check-circle mr-2 mt-0.5 flex-shrink-0"></i>
                            <span>Keep your availability calendar updated</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa-solid fa-check-circle mr-2 mt-0.5 flex-shrink-0"></i>
                            <span>Respond to messages within 2 hours</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa-solid fa-check-circle mr-2 mt-0.5 flex-shrink-0"></i>
                            <span>Add photos to your profile</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa-solid fa-check-circle mr-2 mt-0.5 flex-shrink-0"></i>
                            <span>Complete verification for 3x more bookings</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

    </div>
@endsection
