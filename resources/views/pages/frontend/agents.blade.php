@extends('layouts.frontend')

@section('title', 'Agencies - AroundUz')

@section('content')
    <section class="py-12 md:py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    <i class="fa-solid fa-building text-skyblue"></i> Travel Agencies
                </h1>
                <p class="text-lg text-gray-600">Professional travel agencies in Uzbekistan</p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-12 text-center">
                <div class="w-24 h-24 bg-skyblue bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fa-solid fa-building text-skyblue text-5xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-3">Agency Listing Coming Soon</h2>
                <p class="text-gray-600 mb-6">We're preparing a comprehensive agency directory for you!</p>
                <a href="{{ route('home') }}" class="inline-block bg-skyblue text-white px-6 py-3 rounded-lg hover:bg-blue-400 transition-colors">
                    <i class="fa-solid fa-arrow-left mr-2"></i>Back to Home
                </a>
            </div>
        </div>
    </section>
@endsection
