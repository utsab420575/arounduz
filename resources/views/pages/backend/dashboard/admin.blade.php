@extends('layouts.backend.master')

@section('title', 'Admin Dashboard')

@section('breadcrumbs')
    <a href="{{ route('home') }}" class="hover:text-skyblue">
        <i class="fas fa-home"></i> Home
    </a>
    <i class="fas fa-chevron-right mx-2 text-xs"></i>
    <span class="text-gray-900">Admin Dashboard</span>
@endsection

@section('content')
    <div class="max-w-7xl mx-auto">

        <!-- Welcome Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold bg-gradient-to-r from-skyblue to-blue-600 bg-clip-text text-transparent">
                <i class="fas fa-gauge"></i> Admin Dashboard
            </h1>
            <p class="text-gray-600 mt-1">Overview of all platform activities and management</p>
        </div>

        <!-- Profile Completion Alert -->
        @if(!Auth::user()->hasCompletedProfile())
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-lg mb-6">
                <div class="flex items-center">
                    <i class="fa-solid fa-exclamation-triangle text-yellow-600 text-xl mr-3"></i>
                    <div class="flex-1">
                        <h3 class="font-semibold text-yellow-800">Complete Your Profile</h3>
                        <p class="text-sm text-yellow-700 mt-1">Add your phone number and other details to complete your profile.</p>
                    </div>
                    <a href="{{ route('profile.complete') }}" class="bg-yellow-400 text-yellow-900 px-4 py-2 rounded-lg font-medium hover:bg-yellow-500 transition-colors">
                        Complete Now
                    </a>
                </div>
            </div>
        @endif

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

            <!-- Total Users -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 hover:shadow-2xl transition-all">
                <div class="flex items-center">
                    <div class="w-14 h-14 bg-skyblue bg-opacity-20 text-skyblue rounded-xl flex items-center justify-center">
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm uppercase text-gray-500 font-semibold">Total Users</p>
                        <h2 class="text-2xl font-bold text-gray-900 mt-1">
                            {{ $stats['total_users'] ?? 0 }}
                        </h2>
                    </div>
                </div>
            </div>

            <!-- Total Guides -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 hover:shadow-2xl transition-all">
                <div class="flex items-center">
                    <div class="w-14 h-14 bg-coral bg-opacity-20 text-coral rounded-xl flex items-center justify-center">
                        <i class="fas fa-user-tie text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm uppercase text-gray-500 font-semibold">Total Guides</p>
                        <h2 class="text-2xl font-bold text-gray-900 mt-1">
                            {{ $stats['total_guides'] ?? 0 }}
                        </h2>
                    </div>
                </div>
            </div>

            <!-- Total Agencies -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 hover:shadow-2xl transition-all">
                <div class="flex items-center">
                    <div class="w-14 h-14 bg-green-100 text-green-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-building text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm uppercase text-gray-500 font-semibold">Total Agencies</p>
                        <h2 class="text-2xl font-bold text-gray-900 mt-1">
                            {{ $stats['total_agencies'] ?? 0 }}
                        </h2>
                    </div>
                </div>
            </div>

            <!-- Total Tourists -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 hover:shadow-2xl transition-all">
                <div class="flex items-center">
                    <div class="w-14 h-14 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-user text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm uppercase text-gray-500 font-semibold">Total Tourists</p>
                        <h2 class="text-2xl font-bold text-gray-900 mt-1">
                            {{ $stats['total_tourists'] ?? 0 }}
                        </h2>
                    </div>
                </div>
            </div>

            <!-- Total Bookings -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 hover:shadow-2xl transition-all">
                <div class="flex items-center">
                    <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-calendar-check text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm uppercase text-gray-500 font-semibold">Total Bookings</p>
                        <h2 class="text-2xl font-bold text-gray-900 mt-1">
                            {{ $stats['total_bookings'] ?? 0 }}
                        </h2>
                    </div>
                </div>
            </div>

            <!-- Pending Verifications -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 hover:shadow-2xl transition-all">
                <div class="flex items-center">
                    <div class="w-14 h-14 bg-amber-100 text-amber-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-shield-check text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm uppercase text-gray-500 font-semibold">Pending Verifications</p>
                        <h2 class="text-2xl font-bold text-gray-900 mt-1">
                            {{ $stats['pending_verifications'] ?? 8 }}
                        </h2>
                    </div>
                </div>
            </div>

        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-bolt text-yellow-500 mr-2"></i> Quick Actions
            </h2>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                <a href="{{ route('admin.users.index') }}" class="group bg-skyblue bg-opacity-10 hover:bg-skyblue hover:bg-opacity-20 p-4 rounded-xl flex flex-col items-center border border-skyblue border-opacity-20 transition-all">
                    <i class="fas fa-users text-skyblue text-2xl mb-2"></i>
                    <span class="text-sm font-semibold text-skyblue">Manage Users</span>
                </a>

                <a href="{{ route('admin.verifications.guides') }}" class="group bg-coral bg-opacity-10 hover:bg-coral hover:bg-opacity-20 p-4 rounded-xl flex flex-col items-center border border-coral border-opacity-20 transition-all">
                    <i class="fas fa-shield-check text-coral text-2xl mb-2"></i>
                    <span class="text-sm font-semibold text-coral">Verify Guides</span>
                </a>

                <a href="{{ route('admin.verifications.agencies') }}" class="group bg-green-100 hover:bg-green-200 p-4 rounded-xl flex flex-col items-center border border-green-200 transition-all">
                    <i class="fas fa-certificate text-green-600 text-2xl mb-2"></i>
                    <span class="text-sm font-semibold text-green-700">Verify Agencies</span>
                </a>

                <a href="{{ route('admin.bookings.index') }}" class="group bg-purple-100 hover:bg-purple-200 p-4 rounded-xl flex flex-col items-center border border-purple-200 transition-all">
                    <i class="fas fa-calendar-check text-purple-600 text-2xl mb-2"></i>
                    <span class="text-sm font-semibold text-purple-700">All Bookings</span>
                </a>

                <a href="{{ route('admin.reviews.index') }}" class="group bg-amber-100 hover:bg-amber-200 p-4 rounded-xl flex flex-col items-center border border-amber-200 transition-all">
                    <i class="fas fa-star text-amber-600 text-2xl mb-2"></i>
                    <span class="text-sm font-semibold text-amber-700">All Reviews</span>
                </a>

                <a href="{{ route('admin.settings') }}" class="group bg-gray-100 hover:bg-gray-200 p-4 rounded-xl flex flex-col items-center border border-gray-200 transition-all">
                    <i class="fas fa-cog text-gray-600 text-2xl mb-2"></i>
                    <span class="text-sm font-semibold text-gray-700">Settings</span>
                </a>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-clock text-blue-500 mr-2"></i> Recent Activity
            </h2>

            <div class="space-y-4">
                <div class="flex items-start p-4 bg-gray-50 rounded-lg">
                    <div class="w-10 h-10 bg-skyblue bg-opacity-20 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-user-plus text-skyblue"></i>
                    </div>
                    <div class="ml-4 flex-1">
                        <p class="text-sm font-medium text-gray-900">New user registered</p>
                        <p class="text-xs text-gray-600 mt-1">John Doe joined as a tourist • 2 hours ago</p>
                    </div>
                </div>

                <div class="flex items-start p-4 bg-gray-50 rounded-lg">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-shield-check text-green-600"></i>
                    </div>
                    <div class="ml-4 flex-1">
                        <p class="text-sm font-medium text-gray-900">Guide verification approved</p>
                        <p class="text-xs text-gray-600 mt-1">Nodira Karimova's profile verified • 5 hours ago</p>
                    </div>
                </div>

                <div class="flex items-start p-4 bg-gray-50 rounded-lg">
                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-calendar-check text-purple-600"></i>
                    </div>
                    <div class="ml-4 flex-1">
                        <p class="text-sm font-medium text-gray-900">New booking created</p>
                        <p class="text-xs text-gray-600 mt-1">Tour to Samarkand booked • 1 day ago</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
