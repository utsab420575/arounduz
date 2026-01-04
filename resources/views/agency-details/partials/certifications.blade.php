<!-- Certifications & Accreditations - Full Width -->
<div id="certifications" class="bg-white rounded-xl shadow-sm p-6 md:p-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
        <i class="fa-solid fa-certificate text-skyblue mr-3"></i>
        Certifications & Accreditations
    </h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Licensed Agency -->
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-6 text-white text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <div class="w-16 h-16 bg-white bg-opacity-20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fa-solid fa-shield-check text-4xl"></i>
            </div>
            <h3 class="font-bold text-lg mb-2">Licensed Agency</h3>
            <p class="text-sm opacity-90 mb-2">Official Tourism License</p>
            <p class="text-xs opacity-75">License: {{ $agency['license_number'] }}</p>
        </div>
        
        <!-- Years in Business -->
        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-6 text-white text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <div class="w-16 h-16 bg-white bg-opacity-20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fa-solid fa-calendar-check text-4xl"></i>
            </div>
            <h3 class="font-bold text-lg mb-2">{{ date('Y') - $agency['established'] }} Years</h3>
            <p class="text-sm opacity-90 mb-2">In Business</p>
            <p class="text-xs opacity-75">Since {{ $agency['established'] }}</p>
        </div>
        
        <!-- Rating -->
        <div class="bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl p-6 text-white text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <div class="w-16 h-16 bg-white bg-opacity-20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fa-solid fa-star text-4xl"></i>
            </div>
            <h3 class="font-bold text-lg mb-2">{{ $agency['rating'] }}/5.0</h3>
            <p class="text-sm opacity-90 mb-2">Top Rated</p>
            <p class="text-xs opacity-75">{{ $agency['reviews_count'] }} Reviews</p>
        </div>
        
        <!-- Tours Completed -->
        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl p-6 text-white text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <div class="w-16 h-16 bg-white bg-opacity-20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fa-solid fa-users text-4xl"></i>
            </div>
            <h3 class="font-bold text-lg mb-2">{{ number_format($agency['tours_completed']) }}+</h3>
            <p class="text-sm opacity-90 mb-2">Tours Completed</p>
            <p class="text-xs opacity-75">Happy Travelers</p>
        </div>
    </div>
    
    <!-- Professional Memberships -->
    <div class="mt-8">
        <h3 class="text-xl font-bold text-gray-900 mb-4">Professional Memberships</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @php
                $memberships = [
                    ['name' => 'Uzbekistan Tourism Association', 'icon' => 'building-columns', 'color' => 'blue'],
                    ['name' => 'International Air Transport Association (IATA)', 'icon' => 'plane', 'color' => 'indigo'],
                    ['name' => 'Silk Road Tourism Alliance', 'icon' => 'route', 'color' => 'purple'],
                    ['name' => 'Central Asia Travel Network', 'icon' => 'globe', 'color' => 'green'],
                ];
            @endphp
            
            @foreach($memberships as $membership)
                <div class="flex items-start gap-4 bg-{{ $membership['color'] }}-50 border-2 border-{{ $membership['color'] }}-100 rounded-lg p-4 hover:border-{{ $membership['color'] }}-300 transition-colors">
                    <div class="w-12 h-12 bg-{{ $membership['color'] }}-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-{{ $membership['icon'] }} text-{{ $membership['color'] }}-600 text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-1">{{ $membership['name'] }}</h4>
                        <p class="text-xs text-gray-600">Active Member</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    <!-- Awards & Recognition -->
    <div class="mt-8 bg-gradient-to-r from-amber-50 to-yellow-50 border-2 border-amber-200 rounded-xl p-6">
        <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
            <i class="fa-solid fa-trophy text-amber-500 text-2xl mr-3"></i>
            Awards & Recognition
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center">
                    <i class="fa-solid fa-medal text-amber-600"></i>
                </div>
                <div>
                    <p class="font-semibold text-gray-900 text-sm">Best Travel Agency</p>
                    <p class="text-xs text-gray-600">Uzbekistan 2023</p>
                </div>
            </div>
            
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center">
                    <i class="fa-solid fa-heart text-amber-600"></i>
                </div>
                <div>
                    <p class="font-semibold text-gray-900 text-sm">Traveler's Choice</p>
                    <p class="text-xs text-gray-600">2022 & 2023</p>
                </div>
            </div>
            
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center">
                    <i class="fa-solid fa-crown text-amber-600"></i>
                </div>
                <div>
                    <p class="font-semibold text-gray-900 text-sm">Excellence Award</p>
                    <p class="text-xs text-gray-600">Tourism Board</p>
                </div>
            </div>
        </div>
    </div>
</div>