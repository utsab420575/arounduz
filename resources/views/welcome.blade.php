@extends('layouts.theme_auth')

@section('title', 'Home - AroundUz Travel Portal')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-blue-50 via-cyan-50 to-indigo-100 py-16 lg:py-24">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="mb-6">
                    <span class="bg-skyblue bg-opacity-20 text-skyblue px-4 py-2 rounded-full text-sm font-semibold">
                        <i class="fa-solid fa-star mr-1"></i>Trusted by 50,000+ Travelers
                    </span>
                </div>

                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                    Discover Uzbekistan with
                    <span class="text-skyblue">Local Experts</span>
                </h1>

                <p class="text-lg md:text-xl text-gray-600 mb-8 leading-relaxed">
                    Connect with certified tour guides and travel agencies across Uzbekistan. From Samarkand's ancient wonders to Bukhara's historic charm.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    @auth
                        <a href="{{ route('dashboard') }}" class="w-full sm:w-auto bg-gradient-to-r from-skyblue via-blue-500 to-blue-600 text-white px-8 py-4 rounded-lg font-semibold text-lg hover:shadow-xl transition-all duration-300">
                            <i class="fa-solid fa-home mr-2"></i>Go to Dashboard
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="w-full sm:w-auto bg-gradient-to-r from-skyblue via-blue-500 to-blue-600 text-white px-8 py-4 rounded-lg font-semibold text-lg hover:shadow-xl transition-all duration-300">
                            <i class="fa-solid fa-user-plus mr-2"></i>Get Started
                        </a>
                        <a href="{{ route('login') }}" class="w-full sm:w-auto border-2 border-skyblue text-skyblue px-8 py-4 rounded-lg font-semibold text-lg hover:bg-skyblue hover:text-white transition-all duration-300">
                            <i class="fa-solid fa-sign-in-alt mr-2"></i>Sign In
                        </a>
                    @endauth
                </div>

                <!-- Trust Badges -->
                <div class="mt-12 flex flex-wrap items-center justify-center gap-8 text-sm text-gray-600">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-shield-check text-green-500 text-xl"></i>
                        <span>Verified Guides</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-lock text-gray-500 text-xl"></i>
                        <span>Secure Booking</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-star text-amber-400 text-xl"></i>
                        <span>4.9/5 Rating</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-headset text-skyblue text-xl"></i>
                        <span>24/7 Support</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 lg:py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Why Choose AroundUz?</h2>
                <p class="text-xl text-gray-600">Your gateway to authentic Uzbekistan experiences</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="text-center p-6 rounded-xl hover:shadow-xl transition-shadow">
                    <div class="w-16 h-16 bg-skyblue bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-user-check text-skyblue text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Verified Guides</h3>
                    <p class="text-gray-600">All our guides are verified for your safety and peace of mind</p>
                </div>

                <!-- Feature 2 -->
                <div class="text-center p-6 rounded-xl hover:shadow-xl transition-shadow">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-star text-green-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Trusted Reviews</h3>
                    <p class="text-gray-600">Read genuine reviews from travelers who've been there</p>
                </div>

                <!-- Feature 3 -->
                <div class="text-center p-6 rounded-xl hover:shadow-xl transition-shadow">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-calendar-check text-purple-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Easy Booking</h3>
                    <p class="text-gray-600">Book your guide or tour package with just a few clicks</p>
                </div>

                <!-- Feature 4 -->
                <div class="text-center p-6 rounded-xl hover:shadow-xl transition-shadow">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-globe text-orange-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Multilingual</h3>
                    <p class="text-gray-600">Find guides who speak your language</p>
                </div>

                <!-- Feature 5 -->
                <div class="text-center p-6 rounded-xl hover:shadow-xl transition-shadow">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-shield-alt text-red-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Secure Payments</h3>
                    <p class="text-gray-600">Your payments are secure with trusted partners</p>
                </div>

                <!-- Feature 6 -->
                <div class="text-center p-6 rounded-xl hover:shadow-xl transition-shadow">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-headset text-blue-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">24/7 Support</h3>
                    <p class="text-gray-600">Our support team is always here to help</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 lg:py-20 bg-gradient-to-r from-skyblue via-blue-500 to-blue-600">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl lg:text-4xl font-bold text-white mb-6">
                Ready to Explore Uzbekistan?
            </h2>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                Join thousands of travelers discovering the beauty of Uzbekistan with local experts
            </p>
            @auth
                <a href="{{ route('dashboard') }}" class="inline-block bg-white text-skyblue px-10 py-4 rounded-lg text-lg font-semibold hover:bg-gray-100 transition-all shadow-lg">
                    Go to Dashboard <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            @else
                <a href="{{ route('register') }}" class="inline-block bg-white text-skyblue px-10 py-4 rounded-lg text-lg font-semibold hover:bg-gray-100 transition-all shadow-lg">
                    Get Started Today <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            @endauth
        </div>
    </section>
@endsection
