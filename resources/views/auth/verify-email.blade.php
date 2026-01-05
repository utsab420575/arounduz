@extends('layouts.frontend')

@section('title', 'Verify Email - AroundUz')

@section('content')
    <section class="py-12 md:py-20 bg-gradient-to-br from-blue-50 via-cyan-50 to-indigo-100">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto">

                <!-- Verify Email Card -->
                <div class="bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden">
                    <!-- Header -->
                    <div class="bg-gradient-to-r from-skyblue to-blue-500 px-6 py-8 text-center">
                        <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fa-solid fa-envelope-circle-check text-4xl text-white"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-white">Verify Your Email</h2>
                        <p class="text-blue-100 mt-2">We've sent you a verification link</p>
                    </div>

                    <div class="p-6 text-center">
                        <p class="text-gray-700 mb-6">
                            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you?
                        </p>

                        @if (session('status') == 'verification-link-sent')
                            <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded mb-6">
                                <p class="text-sm text-green-700">
                                    <i class="fa-solid fa-check-circle mr-2"></i>
                                    A new verification link has been sent to your email address.
                                </p>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="w-full bg-gradient-to-r from-skyblue to-blue-500 text-white py-3 rounded-lg font-semibold hover:shadow-lg transition-all duration-300 mb-4">
                                <i class="fa-solid fa-paper-plane mr-2"></i>Resend Verification Email
                            </button>
                        </form>

                        <p class="text-sm text-gray-500 mb-4">
                            <i class="fa-solid fa-info-circle mr-1"></i>
                            Didn't receive the email? Check your spam folder or click resend.
                        </p>
                    </div>

                    <!-- Logout Link -->
                    <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 text-center">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm text-gray-600 hover:text-skyblue transition-colors">
                                <i class="fa-solid fa-sign-out-alt mr-1"></i>Log Out
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Help Text -->
                <div class="mt-6 text-center text-sm text-gray-600">
                    <p>Need help? <a href="{{ route('contact') }}" class="text-skyblue hover:underline">Contact Support</a></p>
                </div>

            </div>
        </div>
    </section>
@endsection
