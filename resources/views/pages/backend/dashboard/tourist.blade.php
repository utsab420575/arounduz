@extends('layouts.backend.master')

@section('title', 'Tourist Dashboard')

@section('breadcrumbs')
    <a href="{{ route('home') }}" class="hover:text-skyblue">
        <i class="fas fa-home"></i> Home
    </a>
    <i class="fas fa-chevron-right mx-2 text-xs"></i>
    <span class="text-gray-900">Dashboard</span>
@endsection

@section('content')
    <div class="max-w-7xl mx-auto">

        <!-- Welcome Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold bg-gradient-to-r from-skyblue to-blue-600 bg-clip-text text-transparent">
                <i class="fas fa-user"></i> Welcome, {{ Auth::user()->name }}!
            </h1>
            <p class="text-gray-600 mt-1">Your personal travel dashboard</p>
        </div>

        <!-- Profile Completion Alert -->
        @if(!Auth::user()->hasCompletedProfile())
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-lg mb-6">
                <div class="flex items-center">
                    <i class="fa-solid fa-exclamation-triangle text-yellow-600 text-xl mr-3"></i>
                    <div class="flex-1">
                        <h3 class="font-semibold text-yellow-800">Complete Your Profile</h3>
                        <p class="text-sm text-yellow-700 mt-1">Add your phone number to unlock all features and start booking tours!</p>
                    </div>
                    <a href="{{ route('profile.complete') }}" class="bg-yellow-400 text-yellow-900 px-4 py-2 rounded-lg font-medium hover:bg-yellow-500 transition-colors">
                        Complete Now
                    </a>
                </div>
            </div>
        @endif

        <!-- Stats Cards -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 mb-8">

            <!-- Total Bookings -->
            <div class="bg-gradient-to-br from-skyblue to-blue-500 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-calendar-check text-2xl"></i>
                    </div>
                    <span class="text-3xl font-bold">{{ $stats['total_bookings'] ?? 0 }}</span>
                </div>
                <p class="text-sm font-medium opacity-90">Total Bookings</p>
            </div>

            <!-- Favorite Guides -->
            <div class="bg-gradient-to-br from-coral to-orange-500 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-heart text-2xl"></i>
                    </div>
                    <span class="text-3xl font-bold">{{ $stats['favorite_guides'] ?? 0 }}</span>
                </div>
                <p class="text-sm font-medium opacity-90">Favorite Guides</p>
            </div>

            <!-- Favorite Agencies -->
            <div class="bg-gradient-to-br from-green-400 to-green-600 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-building text-2xl"></i>
                    </div>
                    <span class="text-3xl font-bold">{{ $stats['favorite_agencies'] ?? 0 }}</span>
                </div>
                <p class="text-sm font-medium opacity-90">Favorite Agencies</p>
            </div>

            <!-- Reviews Given -->
            <div class="bg-gradient-to-br from-purple-400 to-purple-600 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-star text-2xl"></i>
                    </div>
                    <span class="text-3xl font-bold">{{ $stats['reviews_given'] ?? 0 }}</span>
                </div>
                <p class="text-sm font-medium opacity-90">Reviews Given</p>
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
                        <a href="{{ route('guides') }}" class="group bg-skyblue bg-opacity-10 hover:bg-skyblue hover:bg-opacity-20 p-4 rounded-xl flex flex-col items-center border border-skyblue border-opacity-20 transition-all">
                            <i class="fas fa-search text-skyblue text-2xl mb-2"></i>
                            <span class="text-sm font-semibold text-skyblue text-center">Find Guides</span>
                        </a>

                        <a href="{{ route('agents') }}" class="group bg-coral bg-opacity-10 hover:bg-coral hover:bg-opacity-20 p-4 rounded-xl flex flex-col items-center border border-coral border-opacity-20 transition-all">
                            <i class="fas fa-building text-coral text-2xl mb-2"></i>
                            <span class="text-sm font-semibold text-coral text-center">Find Agencies</span>
                        </a>

                        <a href="{{ route('tourist.bookings.index') }}" class="group bg-purple-100 hover:bg-purple-200 p-4 rounded-xl flex flex-col items-center border border-purple-200 transition-all">
                            <i class="fas fa-calendar text-purple-600 text-2xl mb-2"></i>
                            <span class="text-sm font-semibold text-purple-700 text-center">My Bookings</span>
                        </a>

                        <a href="{{ route('tourist.favorites.guides') }}" class="group bg-red-100 hover:bg-red-200 p-4 rounded-xl flex flex-col items-center border border-red-200 transition-all">
                            <i class="fas fa-heart text-red-600 text-2xl mb-2"></i>
                            <span class="text-sm font-semibold text-red-700 text-center">Favorites</span>
                        </a>

                        <a href="{{ route('tourist.messages.index') }}" class="group bg-blue-100 hover:bg-blue-200 p-4 rounded-xl flex flex-col items-center border border-blue-200 transition-all">
                            <i class="fas fa-message text-blue-600 text-2xl mb-2"></i>
                            <span class="text-sm font-semibold text-blue-700 text-center">Messages</span>
                        </a>

                        <a href="{{ route('profile.edit') }}" class="group bg-gray-100 hover:bg-gray-200 p-4 rounded-xl flex flex-col items-center border border-gray-200 transition-all">
                            <i class="fas fa-cog text-gray-600 text-2xl mb-2"></i>
                            <span class="text-sm font-semibold text-gray-700 text-center">Settings</span>
                        </a>
                    </div>
                </div>

                <!-- Recent Bookings -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-calendar-check text-skyblue mr-2"></i> Recent Bookings
                    </h2>

                    <div class="text-center py-12">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fa-solid fa-calendar-xmark text-gray-300 text-4xl"></i>
                        </div>
                        <p class="text-gray-500 font-medium">No bookings yet</p>
                        <p class="text-sm text-gray-400 mt-2">Start exploring and book your first tour!</p>
                        <a href="{{ route('guides') }}" class="inline-block mt-4 bg-skyblue text-white px-6 py-2 rounded-lg hover:bg-blue-400 transition-colors">
                            Browse Guides
                        </a>
                    </div>
                </div>

            </div>

            <!-- Sidebar (1/3) -->
            <div class="space-y-6">

                <!-- Profile Card -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">My Profile</h3>

                    <div class="text-center">
                        @if(Auth::user()->avatar)
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="w-20 h-20 rounded-full mx-auto mb-3">
                        @else
                            <div class="w-20 h-20 rounded-full bg-gradient-to-br from-skyblue to-blue-600 flex items-center justify-center mx-auto mb-3">
                                <span class="text-3xl font-bold text-white">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                        @endif

                        <h4 class="font-semibold text-gray-900">{{ Auth::user()->name }}</h4>
                        <p class="text-sm text-gray-600">{{ Auth::user()->email }}</p>
                        @if(Auth::user()->phone)
                            <p class="text-sm text-gray-600">{{ Auth::user()->phone }}</p>
                        @endif

                        <a href="{{ route('profile.edit') }}" class="inline-block mt-4 text-skyblue hover:underline text-sm font-medium">
                            Edit Profile <i class="fa-solid fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Help Card -->
                <div class="bg-gradient-to-br from-skyblue to-blue-500 rounded-2xl p-6 text-white shadow-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center mr-3">
                            <i class="fa-solid fa-question-circle text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold">Need Help?</h3>
                    </div>
                    <p class="text-sm mb-4 opacity-90">Our support team is here 24/7 to assist you.</p>
                    <button class="bg-white text-skyblue px-4 py-2 rounded-lg font-medium hover:bg-gray-100 transition-colors w-full">
                        <i class="fa-solid fa-headset mr-2"></i>Contact Support
                    </button>
                </div>

            </div>
        </div>

    </div>
@endsection
