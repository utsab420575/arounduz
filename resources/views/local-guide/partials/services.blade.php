<!-- Services Offered -->
<div id="services" class="bg-white rounded-xl shadow-sm p-6 md:p-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
        <i class="fa-solid fa-briefcase text-skyblue mr-3"></i>
        Services I Offer
    </h2>
    
    @php
        $services = [
            [
                'icon' => 'landmark',
                'title' => 'Historical Tours',
                'description' => 'Deep dive into ancient Silk Road history, architecture, and archaeological sites',
                'duration' => '2-8 hours',
                'price' => '$25/hour'
            ],
            [
                'icon' => 'camera',
                'title' => 'Photography Tours',
                'description' => 'Perfect angles and golden hour shots at iconic locations',
                'duration' => '3-6 hours',
                'price' => '$30/hour'
            ],
            [
                'icon' => 'utensils',
                'title' => 'Food & Culture Tours',
                'description' => 'Explore local markets, traditional restaurants, and authentic Uzbek cuisine',
                'duration' => '3-5 hours',
                'price' => '$35/hour'
            ],
            [
                'icon' => 'walking',
                'title' => 'Walking Tours',
                'description' => 'Leisurely walks through old city streets and hidden neighborhoods',
                'duration' => '2-4 hours',
                'price' => '$20/hour'
            ],
            [
                'icon' => 'users',
                'title' => 'Custom Group Tours',
                'description' => 'Tailored experiences for families, groups, or special occasions',
                'duration' => 'Flexible',
                'price' => '$150/day'
            ],
            [
                'icon' => 'certificate',
                'title' => 'Educational Tours',
                'description' => 'In-depth learning experiences for students and researchers',
                'duration' => 'Full day',
                'price' => '$120/day'
            ]
        ];
    @endphp
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($services as $service)
            <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-all duration-300 group">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-skyblue bg-opacity-10 rounded-lg flex items-center justify-center flex-shrink-0 group-hover:bg-skyblue group-hover:bg-opacity-20 transition-colors">
                        <i class="fa-solid fa-{{ $service['icon'] }} text-skyblue text-xl"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-gray-900 mb-2 group-hover:text-skyblue transition-colors">
                            {{ $service['title'] }}
                        </h3>
                        <p class="text-gray-600 text-sm mb-3">{{ $service['description'] }}</p>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500">
                                <i class="fa-solid fa-clock mr-1"></i>{{ $service['duration'] }}
                            </span>
                            <span class="font-bold text-skyblue">{{ $service['price'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="mt-6 bg-blue-50 border border-blue-100 rounded-lg p-4">
        <div class="flex items-start gap-3">
            <i class="fa-solid fa-info-circle text-skyblue text-xl mt-1"></i>
            <div>
                <h4 class="font-semibold text-gray-900 mb-1">Custom Packages Available</h4>
                <p class="text-sm text-gray-600">Need something specific? I can create a personalized itinerary based on your interests, budget, and schedule. Contact me to discuss your requirements.</p>
            </div>
        </div>
    </div>
</div>