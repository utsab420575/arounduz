<!-- Top Travel Agencies Section -->
<section id="top-travel-agencies" class="py-8 lg:py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="mb-6 lg:mb-8">
            <h3 class="text-xl lg:text-2xl font-bold text-gray-800 mb-2">🏢 Top Travel Agencies</h3>
            <p class="text-gray-600">Professional travel agencies offering comprehensive Uzbekistan tours</p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
            @foreach($topAgents ?? [] as $agent)
                @include('partials.agent-card-horizontal', ['agent' => $agent])
            @endforeach
            
            <!-- Static Demo Cards for Top Agencies -->
            @include('partials.agent-card-horizontal', [
                'agent' => [
                    'id' => 1,
                    'name' => 'Silk Road Adventures',
                    'established' => '2015',
                    'location' => 'Tashkent, Uzbekistan',
                    'image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=600',
                    'logo' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff&size=48',
                    'rating' => 4.7,
                    'reviews' => 234,
                    'verified' => true,
                    'description' => 'Specialized in authentic cultural tours across Uzbekistan. Licensed tour operator with expert local guides and premium services.',
                    'tags' => ['Cultural Tours', 'Adventure', 'Photography'],
                    'features' => [
                        ['icon' => 'users', 'text' => '15+ Guides'],
                        ['icon' => 'car', 'text' => 'Transport Included'],
                        ['icon' => 'language', 'text' => '8 Languages'],
                        ['icon' => 'calendar', 'text' => 'Custom Tours']
                    ],
                    'price_from' => '89',
                    'favorite' => false
                ]
            ])
            
            @include('partials.agent-card-horizontal', [
                'agent' => [
                    'id' => 2,
                    'name' => 'Orient Express Travel',
                    'established' => '2012',
                    'location' => 'Tashkent, Uzbekistan',
                    'image' => 'https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=600',
                    'logo' => 'https://ui-avatars.com/api/?name=Orient+Express&background=0ea5e9&color=fff&size=48',
                    'rating' => 4.9,
                    'reviews' => 156,
                    'verified' => true,
                    'description' => 'Premium travel experiences with luxury accommodations and personalized service. Specialists in high-end cultural and historical tours.',
                    'tags' => ['Luxury Tours', 'VIP Service', 'Private Tours'],
                    'features' => [
                        ['icon' => 'crown', 'text' => 'Luxury Service'],
                        ['icon' => 'hotel', 'text' => '5★ Hotels'],
                        ['icon' => 'utensils', 'text' => 'Fine Dining'],
                        ['icon' => 'concierge-bell', 'text' => '24/7 Support']
                    ],
                    'price_from' => '199',
                    'favorite' => true
                ]
            ])
            
            @include('partials.agent-card-horizontal', [
                'agent' => [
                    'id' => 3,
                    'name' => 'Uzbekistan Discovery',
                    'established' => '2018',
                    'location' => 'Samarkand, Uzbekistan',
                    'image' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=600',
                    'logo' => 'https://ui-avatars.com/api/?name=Uzbekistan+Discovery&background=0ea5e9&color=fff&size=48',
                    'rating' => 4.8,
                    'reviews' => 189,
                    'verified' => true,
                    'description' => 'Family-friendly tours and educational experiences. Experts in group travel and school excursions across Silk Road cities.',
                    'tags' => ['Family Tours', 'Educational', 'Group Travel'],
                    'features' => [
                        ['icon' => 'child', 'text' => 'Family Friendly'],
                        ['icon' => 'bus', 'text' => 'Group Transport'],
                        ['icon' => 'graduation-cap', 'text' => 'Educational'],
                        ['icon' => 'shield-check', 'text' => 'Insured Tours']
                    ],
                    'price_from' => '75',
                    'favorite' => false
                ]
            ])
            
            @include('partials.agent-card-horizontal', [
                'agent' => [
                    'id' => 4,
                    'name' => 'Central Asia Explorers',
                    'established' => '2010',
                    'location' => 'Bukhara, Uzbekistan',
                    'image' => 'https://images.unsplash.com/photo-1497366858526-0766cadbe8fa?w=600',
                    'logo' => 'https://ui-avatars.com/api/?name=Central+Asia&background=0ea5e9&color=fff&size=48',
                    'rating' => 4.6,
                    'reviews' => 298,
                    'verified' => true,
                    'description' => 'Multi-country tours specializing in Central Asian routes. Budget-friendly options with flexible itineraries.',
                    'tags' => ['Budget Travel', 'Multi-Country', 'Backpacking'],
                    'features' => [
                        ['icon' => 'map', 'text' => 'Multi-Country'],
                        ['icon' => 'coins', 'text' => 'Budget Options'],
                        ['icon' => 'backpack', 'text' => 'Backpacker Tours'],
                        ['icon' => 'route', 'text' => 'Flexible Routes']
                    ],
                    'price_from' => '55',
                    'favorite' => false
                ]
            ])
        </div>
        
        <!-- View All Agencies Button -->
        <div class="text-center mt-8">
            <button onclick="viewAllAgencies()" class="bg-white border border-gray-200 text-gray-700 px-6 md:px-8 py-3 rounded-lg hover:border-skyblue hover:text-skyblue transition-colors font-medium shadow-sm">
                <i class="fa-solid fa-building mr-2"></i>
                View All Travel Agencies
            </button>
        </div>
    </div>
</section>

@push('scripts')
<script>
    function viewAllAgencies() {
        Swal.fire({
            title: 'All Travel Agencies',
            html: `
                <div class="text-left space-y-3 max-h-96 overflow-y-auto">
                    <p class="text-gray-600 mb-4">Browse our complete list of verified travel agencies.</p>
                    <div class="space-y-3">
                        <div class="p-4 border border-gray-200 rounded-lg hover:border-skyblue cursor-pointer transition-colors">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="font-semibold text-gray-800">Silk Road Adventures</h4>
                                    <p class="text-sm text-gray-600">4.7 ★ • 234 reviews • Cultural Tours</p>
                                </div>
                                <span class="text-skyblue font-bold">$89+</span>
                            </div>
                        </div>
                        <div class="p-4 border border-gray-200 rounded-lg hover:border-skyblue cursor-pointer transition-colors">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="font-semibold text-gray-800">Orient Express Travel</h4>
                                    <p class="text-sm text-gray-600">4.9 ★ • 156 reviews • Luxury Tours</p>
                                </div>
                                <span class="text-skyblue font-bold">$199+</span>
                            </div>
                        </div>
                        <div class="p-4 border border-gray-200 rounded-lg hover:border-skyblue cursor-pointer transition-colors">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="font-semibold text-gray-800">Uzbekistan Discovery</h4>
                                    <p class="text-sm text-gray-600">4.8 ★ • 189 reviews • Family Tours</p>
                                </div>
                                <span class="text-skyblue font-bold">$75+</span>
                            </div>
                        </div>
                        <div class="p-4 border border-gray-200 rounded-lg hover:border-skyblue cursor-pointer transition-colors">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="font-semibold text-gray-800">Central Asia Explorers</h4>
                                    <p class="text-sm text-gray-600">4.6 ★ • 298 reviews • Budget Travel</p>
                                </div>
                                <span class="text-skyblue font-bold">$55+</span>
                            </div>
                        </div>
                        <div class="p-4 border border-gray-200 rounded-lg hover:border-skyblue cursor-pointer transition-colors">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="font-semibold text-gray-800">Samarkand Tours & Travel</h4>
                                    <p class="text-sm text-gray-600">4.7 ★ • 178 reviews • Historical Tours</p>
                                </div>
                                <span class="text-skyblue font-bold">$95+</span>
                            </div>
                        </div>
                    </div>
                </div>
            `,
            confirmButtonText: 'Close',
            confirmButtonColor: '#87CEEB',
            width: '650px'
        });
    }
</script>
@endpush