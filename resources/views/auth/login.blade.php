@extends('layouts.frontend')

@section('title', 'Sign In - AroundUz')

@section('content')
    <section class="py-12 md:py-20 bg-gradient-to-br from-blue-50 via-cyan-50 to-indigo-100">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto">

                <!-- Login Card -->
                <div class="bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden">
                    <!-- Header -->
                    <div class="bg-gradient-to-r from-skyblue to-blue-500 px-6 py-8 text-center">
                        <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fa-solid fa-user text-3xl text-white"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-white">Welcome Back!</h2>
                        <p class="text-blue-100 mt-2">Sign in to your AroundUz account</p>
                    </div>

                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="bg-green-50 border-l-4 border-green-500 p-4 mx-6 mt-6 rounded">
                            <p class="text-sm text-green-700">{{ session('status') }}</p>
                        </div>
                    @endif

                    <!-- Form -->
                    <form method="POST" action="{{ route('login') }}" class="p-6 space-y-6">
                        @csrf

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fa-solid fa-envelope text-skyblue mr-2"></i>Email Address
                            </label>
                            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skyblue focus:border-transparent @error('email') border-red-500 @enderror">
                            @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fa-solid fa-lock text-skyblue mr-2"></i>Password
                            </label>
                            <input type="password" name="password" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skyblue focus:border-transparent @error('password') border-red-500 @enderror">
                            @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center justify-between">
                            <label class="flex items-center">
                                <input type="checkbox" name="remember" class="w-4 h-4 text-skyblue border-gray-300 rounded focus:ring-skyblue">
                                <span class="ml-2 text-sm text-gray-700">Remember me</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm text-skyblue hover:underline">
                                    Forgot password?
                                </a>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full bg-gradient-to-r from-skyblue to-blue-500 text-white py-3 rounded-lg font-semibold hover:shadow-lg transition-all duration-300">
                            <i class="fa-solid fa-sign-in-alt mr-2"></i>Sign In
                        </button>

                        <!-- Divider -->
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-white text-gray-500">Or continue with</span>
                            </div>
                        </div>

                        <!-- Social Login (Placeholder) -->
                        <div class="grid grid-cols-2 gap-3">
                            <button type="button" onclick="showErrorAlert('Google login coming soon!')" class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                <i class="fa-brands fa-google text-red-500 mr-2"></i>
                                <span class="text-sm font-medium text-gray-700">Google</span>
                            </button>
                            <button type="button" onclick="showErrorAlert('Facebook login coming soon!')" class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                <i class="fa-brands fa-facebook text-blue-600 mr-2"></i>
                                <span class="text-sm font-medium text-gray-700">Facebook</span>
                            </button>
                        </div>

                    </form>

                    <!-- Register Link -->
                    <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 text-center">
                        <p class="text-sm text-gray-600">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="text-skyblue font-semibold hover:underline">Sign up now</a>
                        </p>
                    </div>
                </div>

                <!-- Security Badges -->
                <div class="mt-8 flex justify-center space-x-8 text-xs text-gray-500">
                    <div class="flex items-center">
                        <i class="fa-solid fa-shield-check text-green-500 mr-2"></i>
                        <span>Secure Login</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fa-solid fa-lock text-green-500 mr-2"></i>
                        <span>SSL Encrypted</span>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
