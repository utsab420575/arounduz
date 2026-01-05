@extends('layouts.frontend')

@section('title', 'Reset Password - AroundUz')

@section('content')
    <section class="py-12 md:py-20 bg-gradient-to-br from-blue-50 via-cyan-50 to-indigo-100">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto">

                <!-- Reset Password Card -->
                <div class="bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden">
                    <!-- Header -->
                    <div class="bg-gradient-to-r from-skyblue to-blue-500 px-6 py-8 text-center">
                        <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fa-solid fa-lock-open text-3xl text-white"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-white">Reset Password</h2>
                        <p class="text-blue-100 mt-2">Create a new password for your account</p>
                    </div>

                    <!-- Form -->
                    <form method="POST" action="{{ route('password.store') }}" class="p-6 space-y-6">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fa-solid fa-envelope text-skyblue mr-2"></i>Email Address
                            </label>
                            <input type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skyblue @error('email') border-red-500 @enderror">
                            @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fa-solid fa-lock text-skyblue mr-2"></i>New Password
                            </label>
                            <input type="password" name="password" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skyblue @error('password') border-red-500 @enderror">
                            @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Confirmation -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fa-solid fa-lock text-skyblue mr-2"></i>Confirm Password
                            </label>
                            <input type="password" name="password_confirmation" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skyblue">
                            @error('password_confirmation')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full bg-gradient-to-r from-skyblue to-blue-500 text-white py-3 rounded-lg font-semibold hover:shadow-lg transition-all duration-300">
                            <i class="fa-solid fa-check mr-2"></i>Reset Password
                        </button>

                    </form>

                    <!-- Back to Login -->
                    <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 text-center">
                        <a href="{{ route('login') }}" class="text-sm text-skyblue hover:underline">
                            <i class="fa-solid fa-arrow-left mr-1"></i>Back to Login
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
