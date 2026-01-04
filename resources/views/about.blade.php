@extends('layouts.theme')

@section('title', 'About Us - AroundUz')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-skyblue to-blue-500 text-white py-16 md:py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('back.png') }}');"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">About AroundUz</h1>
            <p class="text-lg md:text-xl opacity-90">Connecting travelers with authentic Uzbekistan experiences since 2020</p>
        </div>
    </div>
</section>

<!-- Our Story -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Story</h2>
                <div class="w-24 h-1 bg-skyblue mx-auto mb-6"></div>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8 items-center mb-12">
                <div>
                    <img src="https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800" alt="Uzbekistan" class="rounded-xl shadow-lg">
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Born from Passion for Travel</h3>
                    <p class="text-gray-700 mb-4 leading-relaxed">
                        AroundUz was founded in 2020 with a simple mission: to make authentic Uzbekistan travel experiences accessible to everyone. We noticed that travelers often struggled to find trustworthy local guides and reliable travel agencies.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        Our platform bridges this gap by connecting curious travelers with verified local experts who are passionate about sharing their culture, history, and hidden gems of Uzbekistan.
                    </p>
                </div>
            </div>
            
            <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-8 border-2 border-blue-100">
                <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Our Mission</h3>
                <p class="text-gray-700 text-lg text-center leading-relaxed">
                    "To empower travelers with authentic local experiences while supporting local communities and preserving the rich cultural heritage of Uzbekistan."
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Values -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Core Values</h2>
                <div class="w-24 h-1 bg-skyblue mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">The principles that guide everything we do</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 bg-skyblue bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-shield text-skyblue text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 text-center">Trust & Safety</h3>
                    <p class="text-gray-600 text-center text-sm">All guides and agencies are thoroughly verified to ensure your safety and peace of mind.</p>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-heart text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 text-center">Authenticity</h3>
                    <p class="text-gray-600 text-center text-sm">Real local experiences, not tourist traps. Connect with genuine culture and traditions.</p>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-users text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 text-center">Community</h3>
                    <p class="text-gray-600 text-center text-sm">Supporting local guides and agencies while empowering communities.</p>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-star text-yellow-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 text-center">Excellence</h3>
                    <p class="text-gray-600 text-center text-sm">Committed to providing exceptional service and unforgettable experiences.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics -->
<section class="py-16 bg-gradient-to-r from-skyblue to-blue-500 text-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold mb-2">500+</div>
                    <p class="text-sm md:text-base opacity-90">Verified Guides</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold mb-2">200+</div>
                    <p class="text-sm md:text-base opacity-90">Travel Agencies</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold mb-2">10K+</div>
                    <p class="text-sm md:text-base opacity-90">Happy Travelers</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold mb-2">4.9</div>
                    <p class="text-sm md:text-base opacity-90">Average Rating</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Meet Our Team</h2>
                <div class="w-24 h-1 bg-skyblue mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">Passionate individuals dedicated to revolutionizing travel in Uzbekistan</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                @php
                    $team = [
                        ['name' => 'Sardor Karimov', 'role' => 'Founder & CEO', 'image' => 'https://ui-avatars.com/api/?name=Sardor+Karimov&background=0ea5e9&color=fff&size=400'],
                        ['name' => 'Dilnoza Rashidova', 'role' => 'Head of Operations', 'image' => 'https://ui-avatars.com/api/?name=Dilnoza+Rashidova&background=10b981&color=fff&size=400'],
                        ['name' => 'Jamshid Alimov', 'role' => 'Customer Success', 'image' => 'https://ui-avatars.com/api/?name=Jamshid+Alimov&background=8b5cf6&color=fff&size=400'],
                    ];
                @endphp
                
                @foreach($team as $member)
                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-shadow">
                    <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="w-full h-64 object-cover">
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $member['name'] }}</h3>
                        <p class="text-skyblue font-medium mb-4">{{ $member['role'] }}</p>
                        <div class="flex justify-center gap-3">
                            <a href="#" class="w-10 h-10 bg-gray-100 hover:bg-skyblue hover:text-white rounded-full flex items-center justify-center transition-colors">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gray-100 hover:bg-skyblue hover:text-white rounded-full flex items-center justify-center transition-colors">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-16 bg-gradient-to-r from-skyblue to-blue-500 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Explore Uzbekistan?</h2>
        <p class="text-lg md:text-xl opacity-90 mb-8 max-w-2xl mx-auto">Join thousands of travelers who have discovered authentic experiences through AroundUz</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('guides') }}" class="bg-white text-skyblue px-8 py-3 rounded-lg font-bold hover:bg-gray-100 transition-colors">
                Find a Guide
            </a>
            <a href="{{ route('agents') }}" class="bg-white bg-opacity-20 backdrop-blur-sm border-2 border-white text-white px-8 py-3 rounded-lg font-bold hover:bg-white hover:text-skyblue transition-colors">
                Browse Agencies
            </a>
        </div>
    </div>
</section>
@endsection