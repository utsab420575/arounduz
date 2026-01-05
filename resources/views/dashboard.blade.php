@extends('layouts.theme_auth')

@section('title', 'Dashboard - AroundUz')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-blue-50 via-cyan-50 to-indigo-100 py-12 lg:py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-8">
                <div class="flex-1">
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-3">
                        Welcome back, {{ Auth::user()->name }}! 👋
                    </h1>
                    <p class="text-lg text-gray-600 mb-4">
                        @if(Auth::user()->isGuide())
                            You're logged in as a <span class="font-semibold text-skyblue">Tour Guide</span>
                        @elseif(Auth::user()->isAgency())
                            You're logged in as a <span class="font-semibold text-skyblue">Travel Agency</span>
                        @elseif(Auth::user()->isAdmin())
                            You're logged in as an <span class="font-semibold text-skyblue">Administrator</span>
                        @else
                            You're logged in as a <span class="font-semibold text-skyblue">Traveler</span>
                        @endif
                    </p>

                    <!-- Status Badges -->
                    <div class="flex flex-wrap gap-3">
                        @if(Auth::user()->email_verified_at)
                            <div class="flex items-center bg-green-100 text-green-700 px-4 py-2 rounded-lg">
                                <i class="fa-solid fa-check-circle mr-2"></i>
                                <span class="text-sm font-medium">Email Verified</span>
                            </div>
                        @endif
                        @if(Auth::user()->hasCompletedProfile())
                            <div class="flex items-center bg-blue-100 text-blue-700 px-4 py-2 rounded-lg">
                                <i class="fa-solid fa-user-check mr-2"></i>
                                <span class="text-sm font-medium">Profile Complete</span>
                            </div>
                        @endif
                        <div class="flex items-center bg-skyblue bg-opacity-20 text-skyblue px-4 py-2 rounded-lg">
                            <i class="fa-solid fa-circle mr-2"></i>
                            <span class="text-sm font-medium">{{ ucfirst(Auth::user()->status) }}</span>
                        </div>
                    </div>
                </div>

                <!-- Profile Card -->
                <div class="bg-white rounded-2xl shadow-lg p-6 w-full lg:w-auto lg:min-w-[300px]">
                    <div class="flex items-center space-x-4">
                        @if(Auth::user()->avatar)
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="w-20 h-20 rounded-full object-cover border-4 border-skyblue">
                        @else
                            <div class="w-20 h-20 rounded-full bg-gradient-to-br from-skyblue to-blue-600 flex items-center justify-center border-4 border-white shadow-lg">
                                <span class="text-3xl font-bold text-white">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                        @endif
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-gray-900">{{ Auth::user()->name }}</h3>
                            <p class="text-sm text-gray-600">{{ Auth::user()->email }}</p>
                            @if(Auth::user()->phone)
                                <p class="text-sm text-gray-600">{{ Auth::user()->phone }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <a href="{{ route('profile.edit') }}" class="text-sm font-medium text-skyblue hover:text-blue-600 transition-colors">
                            Edit Profile <i class="fa-solid fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-8 bg-white border-b border-gray-100">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 lg:gap-6">
                <!-- Stat 1: Bookings -->
                <div class="bg-gradient-to-br from-skyblue to-blue-500 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition-shadow">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                            <i class="fa-solid fa-calendar-check text-2xl"></i>
                        </div>
                        <span class="text-3xl font-bold">0</span>
                    </div>
                    <p class="text-sm font-medium opacity-90">Total Bookings</p>
                </div>

                <!-- Stat 2: Reviews -->
                <div class="bg-gradient-to-br from-green-400 to-green-600 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition-shadow">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                            <i class="fa-solid fa-star text-2xl"></i>
                        </div>
                        <span class="text-3xl font-bold">0</span>
                    </div>
                    <p class="text-sm font-medium opacity-90">Reviews</p>
                </div>

                <!-- Stat 3: Favorites -->
                <div class="bg-gradient-to-br from-purple-400 to-purple-600 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition-shadow">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                            <i class="fa-solid fa-heart text-2xl"></i>
                        </div>
                        <span class="text-3xl font-bold">0</span>
                    </div>
                    <p class="text-sm font-medium opacity-90">Favorites</p>
                </div>

                <!-- Stat 4: Subscriptions -->
                <div class="bg-gradient-to-br from-orange-400 to-orange-600 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition-shadow">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                            <i class="fa-solid fa-crown text-2xl"></i>
                        </div>
                        <span class="text-3xl font-bold">0</span>
                    </div>
                    <p class="text-sm font-medium opacity-90">Active Plans</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-8 lg:py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
                <!-- Left Column (2/3 width) -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Quick Actions -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                            <i class="fa-solid fa-bolt text-skyblue mr-2"></i>
                            Quick Actions
                        </h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @if(Auth::user()->isUser())
                                <a href="#" class="flex flex-col items-center justify-center p-4 border-2 border-gray-200 rounded-xl hover:border-skyblue hover:bg-skyblue hover:bg-opacity-5 transition-all group">
                                    <div class="w-12 h-12 bg-skyblue bg-opacity-10 rounded-full flex items-center justify-center mb-3 group-hover:bg-skyblue group-hover:bg-opacity-20">
                                        <i class="fa-solid fa-search text-skyblue text-xl"></i>
                                    </div>
                                    <span class="font-medium text-gray-700 text-center">Find Guides</span>
                                </a>
                                <a href="#" class="flex flex-col items-center justify-center p-4 border-2 border-gray-200 rounded-xl hover:border-skyblue hover:bg-skyblue hover:bg-opacity-5 transition-all group">
                                    <div class="w-12 h-12 bg-skyblue bg-opacity-10 rounded-full flex items-center justify-center mb-3 group-hover:bg-skyblue group-hover:bg-opacity-20">
                                        <i class="fa-solid fa-building text-skyblue text-xl"></i>
                                    </div>
                                    <span class="font-medium text-gray-700 text-center">Find Agencies</span>
                                </a>
                            @elseif(Auth::user()->isGuide())
                                <a href="#" class="flex flex-col items-center justify-center p-4 border-2 border-gray-200 rounded-xl hover:border-skyblue hover:bg-skyblue hover:bg-opacity-5 transition-all group">
                                    <div class="w-12 h-12 bg-skyblue bg-opacity-10 rounded-full flex items-center justify-center mb-3 group-hover:bg-skyblue group-hover:bg-opacity-20">
                                        <i class="fa-solid fa-user-edit text-skyblue text-xl"></i>
                                    </div>
                                    <span class="font-medium text-gray-700 text-center">Edit Profile</span>
                                </a>
                                <a href="#" class="flex flex-col items-center justify-center p-4 border-2 border-gray-200 rounded-xl hover:border-skyblue hover:bg-skyblue hover:bg-opacity-5 transition-all group">
                                    <div class="w-12 h-12 bg-skyblue bg-opacity-10 rounded-full flex items-center justify-center mb-3 group-hover:bg-skyblue group-hover:bg-opacity-20">
                                        <i class="fa-solid fa-calendar-alt text-skyblue text-xl"></i>
                                    </div>
                                    <span class="font-medium text-gray-700 text-center">Availability</span>
                                </a>
                            @elseif(Auth::user()->isAgency())
                                <a href="#" class="flex flex-col items-center justify-center p-4 border-2 border-gray-200 rounded-xl hover:border-skyblue hover:bg-skyblue hover:bg-opacity-5 transition-all group">
                                    <div class="w-12 h-12 bg-skyblue bg-opacity-10 rounded-full flex items-center justify-center mb-3 group-hover:bg-skyblue group-hover:bg-opacity-20">
                                        <i class="fa-solid fa-building text-skyblue text-xl"></i>
                                    </div>
                                    <span class="font-medium text-gray-700 text-center">Edit Profile</span>
                                </a>
                                <a href="#" class="flex flex-col items-center justify-center p-4 border-2 border-gray-200 rounded-xl hover:border-skyblue hover:bg-skyblue hover:bg-opacity-5 transition-all group">
                                    <div class="w-12 h-12 bg-skyblue bg-opacity-10 rounded-full flex items-center justify-center mb-3 group-hover:bg-skyblue group-hover:bg-opacity-20">
                                        <i class="fa-solid fa-suitcase text-skyblue text-xl"></i>
                                    </div>
                                    <span class="font-medium text-gray-700 text-center">Packages</span>
                                </a>
                            @endif
                            <a href="#" class="flex flex-col items-center justify-center p-4 border-2 border-gray-200 rounded-xl hover:border-skyblue hover:bg-skyblue hover:bg-opacity-5 transition-all group">
                                <div class="w-12 h-12 bg-skyblue bg-opacity-10 rounded-full flex items-center justify-center mb-3 group-hover:bg-skyblue group-hover:bg-opacity-20">
                                    <i class="fa-solid fa-heart text-skyblue text-xl"></i>
                                </div>
                                <span class="font-medium text-gray-700 text-center">Favorites</span>
                            </a>
                            <a href="#" class="flex flex-col items-center justify-center p-4 border-2 border-gray-200 rounded-xl hover:border-skyblue hover:bg-skyblue hover:bg-opacity-5 transition-all group">
                                <div class="w-12 h-12 bg-skyblue bg-opacity-10 rounded-full flex items-center justify-center mb-3 group-hover:bg-skyblue group-hover:bg-opacity-20">
                                    <i class="fa-solid fa-message text-skyblue text-xl"></i>
                                </div>
                                <span class="font-medium text-gray-700 text-center">Messages</span>
                            </a>
                            <a href="{{ route('profile.edit') }}" class="flex flex-col items-center justify-center p-4 border-2 border-gray-200 rounded-xl hover:border-skyblue hover:bg-skyblue hover:bg-opacity-5 transition-all group">
                                <div class="w-12 h-12 bg-skyblue bg-opacity-10 rounded-full flex items-center justify-center mb-3 group-hover:bg-skyblue group-hover:bg-opacity-20">
                                    <i class="fa-solid fa-cog text-skyblue text-xl"></i>
                                </div>
                                <span class="font-medium text-gray-700 text-center">Settings</span>
                            </a>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                            <i class="fa-solid fa-clock-rotate-left text-skyblue mr-2"></i>
                            Recent Activity
                        </h3>
                        <div class="text-center py-12">
                            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fa-solid fa-inbox text-gray-300 text-4xl"></i>
                            </div>
                            <p class="text-gray-500 font-medium">No recent activity</p>
                            <p class="text-sm text-gray-400 mt-2">Start exploring to see your activity here</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column (1/3 width) -->
                <div class="space-y-6">
                    <!-- Getting Started -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                            <i class="fa-solid fa-rocket text-skyblue mr-2"></i>
                            Getting Started
                        </h3>
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <i class="fa-solid fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Account Created</p>
                                    <p class="text-xs text-gray-500">Welcome to AroundUz!</p>
                                </div>
                            </div>
                            @if(Auth::user()->email_verified_at)
                                <div class="flex items-start">
                                    <i class="fa-solid fa-check-circle text-green-500 mt-1 mr-3"></i>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Email Verified</p>
                                        <p class="text-xs text-gray-500">Your email is confirmed</p>
                                    </div>
                                </div>
                            @else
                                <div class="flex items-start">
                                    <i class="fa-solid fa-circle text-gray-300 mt-1 mr-3"></i>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Verify Email</p>
                                        <p class="text-xs text-gray-500">Check your inbox</p>
                                    </div>
                                </div>
                            @endif
                            @if(Auth::user()->hasCompletedProfile())
                                <div class="flex items-start">
                                    <i class="fa-solid fa-check-circle text-green-500 mt-1 mr-3"></i>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Profile Complete</p>
                                        <p class="text-xs text-gray-500">All set to go!</p>
                                    </div>
                                </div>
                            @else
                                <div class="flex items-start">
                                    <i class="fa-solid fa-circle text-gray-300 mt-1 mr-3"></i>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Complete Profile</p>
                                        <p class="text-xs text-gray-500">Add more details</p>
                                    </div>
                                </div>
                            @endif
                            <div class="flex items-start">
                                <i class="fa-solid fa-circle text-gray-300 mt-1 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">
                                        @if(Auth::user()->isGuide() || Auth::user()->isAgency())
                                            Get Verified
                                        @else
                                            Make Your First Booking
                                        @endif
                                    </p>
                                    <p class="text-xs text-gray-500">
                                        @if(Auth::user()->isGuide() || Auth::user()->isAgency())
                                            Submit verification documents
                                        @else
                                            Find your perfect guide
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Help & Support -->
                    <div class="bg-gradient-to-br from-skyblue to-blue-500 rounded-xl p-6 text-white shadow-lg">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center mr-3">
                                <i class="fa-solid fa-question-circle text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-bold">Need Help?</h3>
                        </div>
                        <p class="text-sm mb-4 opacity-90">Our support team is here to help you get started.</p>
                        <a href="#" class="inline-flex items-center px-4 py-2 bg-white text-skyblue rounded-lg font-medium hover:bg-gray-100 transition-colors">
                            <i class="fa-solid fa-headset mr-2"></i>
                            Contact Support
                        </a>
                    </div>

                    <!-- Tips -->
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 rounded-lg p-4">
                        <div class="flex items-start">
                            <i class="fa-solid fa-lightbulb text-yellow-600 text-xl mr-3 mt-1"></i>
                            <div>
                                <h4 class="font-semibold text-yellow-800 mb-1">Pro Tip</h4>
                                <p class="text-sm text-yellow-700">
                                    @if(Auth::user()->isGuide() || Auth::user()->isAgency())
                                        Complete your profile with photos and detailed descriptions to attract more customers!
                                    @else
                                        Read reviews and check guide ratings before booking to ensure the best experience!
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
