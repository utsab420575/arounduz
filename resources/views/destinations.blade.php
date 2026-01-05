@extends('layouts.frontend')

@section('title', 'Popular Destinations - AroundUz')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-skyblue to-blue-500 text-white py-16 md:py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-cover bg-center"
                 style="background-image: url('{{ asset('back.png') }}');"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">Discover Uzbekistan</h1>
                <p class="text-lg md:text-xl opacity-90">Explore ancient cities, stunning architecture, and rich culture
                    along the Silk Road</p>
            </div>
        </div>
    </section>

    <!-- Featured Destinations -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Must-Visit Cities</h2>
                    <div class="w-24 h-1 bg-skyblue mx-auto mb-6"></div>
                    <p class="text-gray-600 max-w-2xl mx-auto">Experience the magic of Uzbekistan's most iconic
                        destinations</p>
                </div>

                @php
                    $destinations = [
                        [
                            'name' => 'Samarkand',
                            'tagline' => 'Pearl of the East',
                            'description' => 'Home to the magnificent Registan Square and stunning Islamic architecture. A UNESCO World Heritage site.',
                            'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                            'highlights' => ['Registan Square', 'Shah-i-Zinda', 'Gur-e-Amir Mausoleum'],
                            'guides' => 45,
                            'tours' => 120
                        ],
                        [
                            'name' => 'Bukhara',
                            'tagline' => 'Living Museum',
                            'description' => 'An ancient city with over 140 architectural monuments. Experience authentic Silk Road culture.',
                            'image' => 'https://images.unsplash.com/photo-1590523741831-ab7e8b8f9c7f?w=800',
                            'highlights' => ['Ark Fortress', 'Poi Kalyan Complex', 'Old Town Bazaar'],
                            'guides' => 38,
                            'tours' => 95
                        ],
                        [
                            'name' => 'Khiva',
                            'tagline' => 'Open-Air Museum',
                            'description' => 'A perfectly preserved medieval city enclosed by ancient walls. Step back in time.',
                            'image' => 'https://images.unsplash.com/photo-1512632578888-169bbbc64f33?w=800',
                            'highlights' => ['Itchan Kala', 'Kalta Minor Minaret', 'Juma Mosque'],
                            'guides' => 28,
                            'tours' => 67
                        ],
                        [
                            'name' => 'Tashkent',
                            'tagline' => 'Modern Capital',
                            'description' => 'Blend of Soviet architecture and modern development. The gateway to Uzbekistan.',
                            'image' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=800',
                            'highlights' => ['Chorsu Bazaar', 'Tashkent Metro', 'Hazrati Imam Complex'],
                            'guides' => 62,
                            'tours' => 145
                        ],
                        [
                            'name' => 'Fergana Valley',
                            'tagline' => 'Silk Road Heart',
                            'description' => 'Lush valley known for silk production and traditional crafts. Experience rural beauty.',
                            'image' => 'https://images.unsplash.com/photo-1564507592333-c60657eea523?w=800',
                            'highlights' => ['Kokand Palace', 'Margilan Silk Factory', 'Rishtan Ceramics'],
                            'guides' => 22,
                            'tours' => 54
                        ],
                        [
                            'name' => 'Nukus',
                            'tagline' => 'Desert Treasure',
                            'description' => 'Gateway to the Aral Sea and home to the remarkable Savitsky Museum.',
                            'image' => 'https://images.unsplash.com/photo-1590523741831-ab7e8b8f9c7f?w=800',
                            'highlights' => ['Savitsky Museum', 'Mizdakhan Necropolis', 'Aral Sea'],
                            'guides' => 15,
                            'tours' => 38
                        ],
                    ];
                @endphp

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($destinations as $destination)
                        <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ $destination['image'] }}" alt="{{ $destination['name'] }}"
                                     class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                <div class="absolute bottom-4 left-4 right-4">
                                    <h3 class="text-2xl font-bold text-white mb-1">{{ $destination['name'] }}</h3>
                                    <p class="text-sm text-white opacity-90">{{ $destination['tagline'] }}</p>
                                </div>
                            </div>

                            <div class="p-6">
                                <p class="text-gray-600 text-sm mb-4 leading-relaxed">{{ $destination['description'] }}</p>

                                <div class="mb-4">
                                    <h4 class="font-semibold text-gray-900 mb-2 text-sm">Top Attractions:</h4>
                                    <div class="space-y-1">
                                        @foreach($destination['highlights'] as $highlight)
                                            <div class="flex items-center text-xs text-gray-600">
                                                <i class="fa-solid fa-circle-check text-green-500 mr-2"></i>
                                                {{ $highlight }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                    <div class="flex gap-4 text-xs text-gray-500">
                                        <span><i class="fa-solid fa-user-tie mr-1 text-skyblue"></i>{{ $destination['guides'] }} guides</span>
                                        <span><i class="fa-solid fa-route mr-1 text-skyblue"></i>{{ $destination['tours'] }} tours</span>
                                    </div>
                                </div>

                                <a href="{{ route('guides') }}?location={{ $destination['name'] }}"
                                   class="mt-4 w-full bg-skyblue text-white py-2 rounded-lg font-semibold hover:bg-blue-600 transition-colors block text-center">
                                    Explore {{ $destination['name'] }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Why Visit Uzbekistan -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Visit Uzbekistan?</h2>
                    <div class="w-24 h-1 bg-skyblue mx-auto"></div>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white rounded-xl p-6 text-center hover:shadow-lg transition-shadow">
                        <div class="w-16 h-16 bg-skyblue bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fa-solid fa-landmark text-skyblue text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Rich History</h3>
                        <p class="text-gray-600 text-sm">2,500+ years of history along the ancient Silk Road</p>
                    </div>

                    <div class="bg-white rounded-xl p-6 text-center hover:shadow-lg transition-shadow">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fa-solid fa-mosque text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Architecture</h3>
                        <p class="text-gray-600 text-sm">Stunning Islamic architecture and ancient monuments</p>
                    </div>

                    <div class="bg-white rounded-xl p-6 text-center hover:shadow-lg transition-shadow">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fa-solid fa-utensils text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Cuisine</h3>
                        <p class="text-gray-600 text-sm">Delicious traditional food and warm hospitality</p>
                    </div>

                    <div class="bg-white rounded-xl p-6 text-center hover:shadow-lg transition-shadow">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fa-solid fa-hand-holding-dollar text-yellow-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Affordable</h3>
                        <p class="text-gray-600 text-sm">Great value for money compared to other destinations</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Travel Tips -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Travel Tips</h2>
                    <div class="w-24 h-1 bg-skyblue mx-auto mb-6"></div>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-blue-50 border-l-4 border-skyblue p-6 rounded-r-lg">
                        <h3 class="font-bold text-gray-900 mb-2 flex items-center">
                            <i class="fa-solid fa-calendar text-skyblue mr-2"></i>
                            Best Time to Visit
                        </h3>
                        <p class="text-gray-700 text-sm">Spring (April-May) and Autumn (September-October) offer
                            pleasant weather perfect for exploring.</p>
                    </div>

                    <div class="bg-green-50 border-l-4 border-green-500 p-6 rounded-r-lg">
                        <h3 class="font-bold text-gray-900 mb-2 flex items-center">
                            <i class="fa-solid fa-passport text-green-500 mr-2"></i>
                            Visa Requirements
                        </h3>
                        <p class="text-gray-700 text-sm">Many nationalities can get visa-on-arrival or visa-free entry.
                            Check requirements for your country.</p>
                    </div>

                    <div class="bg-purple-50 border-l-4 border-purple-500 p-6 rounded-r-lg">
                        <h3 class="font-bold text-gray-900 mb-2 flex items-center">
                            <i class="fa-solid fa-money-bill text-purple-500 mr-2"></i>
                            Currency
                        </h3>
                        <p class="text-gray-700 text-sm">Uzbekistani Som (UZS). Cash is king, but cards are increasingly
                            accepted in major cities.</p>
                    </div>

                    <div class="bg-yellow-50 border-l-4 border-yellow-500 p-6 rounded-r-lg">
                        <h3 class="font-bold text-gray-900 mb-2 flex items-center">
                            <i class="fa-solid fa-language text-yellow-600 mr-2"></i>
                            Language
                        </h3>
                        <p class="text-gray-700 text-sm">Uzbek is official, Russian widely spoken. English in tourist
                            areas. Local guides help bridge the gap!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 bg-gradient-to-r from-skyblue to-blue-500 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Start Your Journey?</h2>
            <p class="text-lg md:text-xl opacity-90 mb-8 max-w-2xl mx-auto">Connect with local guides who know these
                destinations inside out</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('guides') }}"
                   class="bg-white text-skyblue px-8 py-3 rounded-lg font-bold hover:bg-gray-100 transition-colors">
                    Find a Local Guide
                </a>
                <a href="{{ route('agents') }}"
                   class="bg-white bg-opacity-20 backdrop-blur-sm border-2 border-white text-white px-8 py-3 rounded-lg font-bold hover:bg-white hover:text-skyblue transition-colors">
                    Browse Tour Packages
                </a>
            </div>
        </div>
    </section>
@endsection
