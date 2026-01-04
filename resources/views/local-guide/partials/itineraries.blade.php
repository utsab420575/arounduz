<!-- Sample Itineraries -->
<div id="itineraries" class="bg-white rounded-xl shadow-sm p-6 md:p-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
        <i class="fa-solid fa-route text-skyblue mr-3"></i>
        Sample Itineraries
    </h2>
    
    @php
        $itineraries = [
            [
                'title' => 'Half-Day Samarkand Highlights',
                'duration' => '4 hours',
                'price' => 100,
                'group_size' => 'Max 6 people',
                'stops' => [
                    'Registan Square - 1.5 hours',
                    'Bibi-Khanym Mosque - 45 minutes',
                    'Siyob Bazaar - 45 minutes',
                    'Shah-i-Zinda Necropolis - 45 minutes'
                ],
                'includes' => ['Professional guide', 'Entrance fees', 'Bottled water'],
                'recommended_for' => 'First-time visitors'
            ],
            [
                'title' => 'Full-Day Cultural Immersion',
                'duration' => '8 hours',
                'price' => 150,
                'group_size' => 'Max 8 people',
                'stops' => [
                    'Morning: Historical sites tour - 3 hours',
                    'Traditional lunch with local family - 1.5 hours',
                    'Afternoon: Artisan workshops visit - 2 hours',
                    'Sunset at Registan - 1 hour'
                ],
                'includes' => ['Professional guide', 'All entrance fees', 'Traditional lunch', 'Transportation'],
                'recommended_for' => 'Culture enthusiasts'
            ],
            [
                'title' => 'Photography Golden Hour Tour',
                'duration' => '3 hours',
                'price' => 90,
                'group_size' => 'Max 4 people',
                'stops' => [
                    'Pre-sunset preparation and location scouting',
                    'Registan Square at golden hour',
                    'Shah-i-Zinda with evening light',
                    'Bibi-Khanym silhouette shots'
                ],
                'includes' => ['Photography guide', 'Best spot access', 'Tips and techniques'],
                'recommended_for' => 'Photographers'
            ]
        ];
    @endphp
    
    <div class="space-y-6">
        @foreach($itineraries as $itinerary)
            <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow">
                <div class="flex flex-col md:flex-row md:items-start md:justify-between mb-4">
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $itinerary['title'] }}</h3>
                        <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 mb-4">
                            <span><i class="fa-solid fa-clock mr-1 text-skyblue"></i>{{ $itinerary['duration'] }}</span>
                            <span><i class="fa-solid fa-users mr-1 text-skyblue"></i>{{ $itinerary['group_size'] }}</span>
                            <span class="bg-blue-50 text-skyblue px-3 py-1 rounded-full text-xs font-medium">{{ $itinerary['recommended_for'] }}</span>
                        </div>
                    </div>
                    <div class="text-left md:text-right">
                        <div class="text-3xl font-bold text-skyblue">${{ $itinerary['price'] }}</div>
                        <p class="text-sm text-gray-500">per person</p>
                    </div>
                </div>
                
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fa-solid fa-map-marked-alt text-skyblue mr-2"></i>
                            Itinerary
                        </h4>
                        <ul class="space-y-2">
                            @foreach($itinerary['stops'] as $stop)
                                <li class="flex items-start gap-2 text-sm text-gray-700">
                                    <i class="fa-solid fa-circle text-skyblue text-xs mt-1"></i>
                                    <span>{{ $stop }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fa-solid fa-check-circle text-skyblue mr-2"></i>
                            What's Included
                        </h4>
                        <ul class="space-y-2">
                            @foreach($itinerary['includes'] as $include)
                                <li class="flex items-start gap-2 text-sm text-gray-700">
                                    <i class="fa-solid fa-check text-green-500 mt-1"></i>
                                    <span>{{ $include }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
                <div class="mt-6 flex gap-3">
                    <button onclick="bookItinerary('{{ $itinerary['title'] }}', {{ $itinerary['price'] }})" class="flex-1 bg-skyblue text-white py-2 rounded-lg font-medium hover:bg-blue-400 transition-colors">
                        Book This Tour
                    </button>
                    <button onclick="customizeItinerary('{{ $itinerary['title'] }}')" class="flex-1 border border-gray-300 text-gray-700 py-2 rounded-lg font-medium hover:bg-gray-50 transition-colors">
                        Customize
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>

@push('scripts')
<script>
    function bookItinerary(title, price) {
        scrollToBooking();
        showSuccessAlert(`Selected: ${title}`);
    }
    
    function customizeItinerary(title) {
        Swal.fire({
            title: 'Customize Your Tour',
            html: `
                <div class="text-left space-y-4">
                    <p class="text-gray-600">Tell me about your preferences and I'll create a custom itinerary for you.</p>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Your Interests</label>
                        <textarea id="customInterests" rows="3" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="E.g., photography, history, local food..."></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Preferred Duration</label>
                        <select id="customDuration" class="w-full border border-gray-300 rounded-md px-3 py-2">
                            <option>Half Day (4 hours)</option>
                            <option>Full Day (8 hours)</option>
                            <option>Multi-day</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Group Size</label>
                        <input type="number" id="customGroupSize" min="1" max="20" value="2" class="w-full border border-gray-300 rounded-md px-3 py-2">
                    </div>
                </div>
            `,
            confirmButtonText: 'Request Custom Quote',
            confirmButtonColor: '#87CEEB',
            showCancelButton: true,
            width: '600px'
        }).then((result) => {
            if (result.isConfirmed) {
                showSuccessAlert('Custom quote request sent! I\'ll contact you shortly.');
            }
        });
    }
</script>
@endpush