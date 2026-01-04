<!-- Badges & Certifications - Full Width -->
<div id="badges" class="bg-white rounded-xl shadow-sm p-6 md:p-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
        <i class="fa-solid fa-award text-skyblue mr-3"></i>
        Certifications & Achievements
    </h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Verified Badge -->
        @if($guide['verified'])
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-6 text-white text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                <div class="w-16 h-16 bg-white bg-opacity-20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fa-solid fa-shield-check text-4xl"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Verified Guide</h3>
                <p class="text-sm opacity-90">Identity & credentials verified by AroundUz</p>
            </div>
        @endif
        
        <!-- Experience Badge -->
        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-6 text-white text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <div class="w-16 h-16 bg-white bg-opacity-20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fa-solid fa-calendar-check text-4xl"></i>
            </div>
            <h3 class="font-bold text-lg mb-2">{{ $guide['experience_years'] }} Years</h3>
            <p class="text-sm opacity-90">Professional guiding experience</p>
        </div>
        
        <!-- Rating Badge -->
        <div class="bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl p-6 text-white text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <div class="w-16 h-16 bg-white bg-opacity-20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fa-solid fa-star text-4xl"></i>
            </div>
            <h3 class="font-bold text-lg mb-2">{{ $guide['rating'] }}/5.0 Rating</h3>
            <p class="text-sm opacity-90">Based on {{ $guide['reviews_count'] }} reviews</p>
        </div>
        
        <!-- Tours Completed Badge -->
        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl p-6 text-white text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <div class="w-16 h-16 bg-white bg-opacity-20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fa-solid fa-users text-4xl"></i>
            </div>
            <h3 class="font-bold text-lg mb-2">{{ $guide['tours_completed'] }}+ Tours</h3>
            <p class="text-sm opacity-90">Successfully completed</p>
        </div>
    </div>
    
    <!-- Certifications Grid -->
    <div class="mt-8">
        <h3 class="text-xl font-bold text-gray-900 mb-4">Professional Certifications</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($guide['certifications'] as $index => $cert)
                @php
                    $colors = ['blue', 'green', 'purple', 'orange'];
                    $color = $colors[$index % count($colors)];
                @endphp
                <div class="flex items-start gap-4 bg-{{ $color }}-50 border-2 border-{{ $color }}-100 rounded-lg p-4 hover:border-{{ $color }}-300 transition-colors">
                    <div class="w-12 h-12 bg-{{ $color }}-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-certificate text-{{ $color }}-600 text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-1">{{ $cert }}</h4>
                        <p class="text-xs text-gray-600">Verified & Up-to-date</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    <!-- Special Achievements -->
    <div class="mt-8 bg-gradient-to-r from-amber-50 to-yellow-50 border-2 border-amber-200 rounded-xl p-6">
        <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
            <i class="fa-solid fa-trophy text-amber-500 text-2xl mr-3"></i>
            Special Achievements
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center">
                    <i class="fa-solid fa-medal text-amber-600"></i>
                </div>
                <div>
                    <p class="font-semibold text-gray-900 text-sm">Top Rated Guide</p>
                    <p class="text-xs text-gray-600">2023 & 2024</p>
                </div>
            </div>
            
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center">
                    <i class="fa-solid fa-heart text-amber-600"></i>
                </div>
                <div>
                    <p class="font-semibold text-gray-900 text-sm">Traveler's Choice</p>
                    <p class="text-xs text-gray-600">Most Recommended</p>
                </div>
            </div>
            
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center">
                    <i class="fa-solid fa-crown text-amber-600"></i>
                </div>
                <div>
                    <p class="font-semibold text-gray-900 text-sm">Elite Guide</p>
                    <p class="text-xs text-gray-600">Premium Service</p>
                </div>
            </div>
        </div>
    </div>
</div>