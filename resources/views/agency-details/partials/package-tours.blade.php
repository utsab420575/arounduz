<!-- Package Tours Section -->
<div id="tours" class="bg-white rounded-xl shadow-sm p-6 md:p-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-900 flex items-center">
            <i class="fa-solid fa-route text-skyblue mr-3"></i>
            Package Tours
        </h2>
        <button onclick="viewAllTours()" class="text-skyblue hover:underline text-sm font-medium">
            View All →
        </button>
    </div>
    
    <div class="space-y-6">
        @php
            $tours = [
                [
                    'id' => 1,
                    'name' => 'Golden Samarkand Heritage Tour',
                    'duration' => '3 Days • 2 Nights',
                    'category' => 'Cultural & Historical',
                    'description' => 'Explore the magnificent Registan Square, Shah-i-Zinda necropolis, and Bibi-Khanym Mosque. Includes guided tours, traditional lunch, and local craftsman visits.',
                    'price' => 299,
                    'features' => [
                        ['icon' => 'plane', 'text' => 'Airport Transfer', 'color' => 'green'],
                        ['icon' => 'bed', 'text' => 'Hotel Accommodation', 'color' => 'blue'],
                        ['icon' => 'utensils', 'text' => 'Meals Included', 'color' => 'purple']
                    ],
                    'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=400'
                ],
                [
                    'id' => 2,
                    'name' => 'Silk Road Adventure',
                    'duration' => '5 Days • 4 Nights',
                    'category' => 'Adventure & Culture',
                    'description' => 'Journey through Samarkand, Bukhara, and Khiva. Experience ancient trading routes, traditional bazaars, and stunning Islamic architecture.',
                    'price' => 599,
                    'features' => [
                        ['icon' => 'plane', 'text' => 'Airport Transfer', 'color' => 'green'],
                        ['icon' => 'car', 'text' => 'Private Transportation', 'color' => 'blue'],
                        ['icon' => 'camera', 'text' => 'Photography Tour', 'color' => 'orange']
                    ],
                    'image' => 'https://images.unsplash.com/photo-1512632578888-169bbbc64f33?w=400'
                ],
                [
                    'id' => 3,
                    'name' => 'Tashkent City Explorer',
                    'duration' => '2 Days • 1 Night',
                    'category' => 'City & Modern Culture',
                    'description' => 'Discover the capital\'s blend of Soviet architecture and modern developments. Visit Chorsu Bazaar, Independence Square, and local museums.',
                    'price' => 199,
                    'features' => [
                        ['icon' => 'plane', 'text' => 'Airport Transfer', 'color' => 'green'],
                        ['icon' => 'subway', 'text' => 'Metro Tour', 'color' => 'blue'],
                        ['icon' => 'shopping-bag', 'text' => 'Shopping Experience', 'color' => 'red']
                    ],
                    'image' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=400'
                ]
            ];
        @endphp
        
        @foreach($tours as $tour)
            <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition-all duration-300 group">
                <div class="flex flex-col md:flex-row">
                    <!-- Tour Image -->
                    <div class="md:w-1/3 relative overflow-hidden">
                        <img src="{{ $tour['image'] }}" alt="{{ $tour['name'] }}" class="w-full h-48 md:h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-3 left-3">
                            <span class="bg-skyblue text-white px-3 py-1 rounded-full text-xs font-medium">
                                {{ $tour['category'] }}
                            </span>
                        </div>
                    </div>
                    
                    <!-- Tour Details -->
                    <div class="flex-1 p-6">
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex-1">
                                <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-2 group-hover:text-skyblue transition-colors">
                                    {{ $tour['name'] }}
                                </h3>
                                <p class="text-gray-600 text-sm mb-3">{{ $tour['duration'] }}</p>
                                <p class="text-gray-700 text-sm leading-relaxed mb-4">
                                    {{ $tour['description'] }}
                                </p>
                                
                                <!-- Features -->
                                <div class="flex flex-wrap gap-3 mb-4">
                                    @foreach($tour['features'] as $feature)
                                        <div class="flex items-center text-{{ $feature['color'] }}-600">
                                            <i class="fa-solid fa-{{ $feature['icon'] }} mr-2 text-sm"></i>
                                            <span class="text-xs md:text-sm">{{ $feature['text'] }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            
                            <!-- Price & CTA -->
                            <div class="text-right ml-4 flex-shrink-0">
                                <div class="text-2xl md:text-3xl font-bold text-gray-900">${{ $tour['price'] }}</div>
                                <p class="text-gray-500 text-xs md:text-sm mb-3">per person</p>
                                <button onclick="bookTour({{ $tour['id'] }}, '{{ $tour['name'] }}', {{ $tour['price'] }})" class="bg-skyblue text-white px-4 md:px-6 py-2 rounded-lg text-sm font-medium hover:bg-blue-400 transition-colors whitespace-nowrap">
                                    Book Now
                                </button>
                                <button onclick="viewTourDetails({{ $tour['id'] }})" class="mt-2 w-full border border-gray-300 text-gray-700 px-4 md:px-6 py-2 rounded-lg text-sm hover:bg-gray-50 transition-colors whitespace-nowrap">
                                    View Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@push('scripts')
<script>
    function bookTour(tourId, tourName, price) {
        // Update booking form with selected tour
        const tourSelect = document.querySelector('select[name="tour_package"]');
        if (tourSelect) {
            tourSelect.value = `${tourName} - $${price}`;
        }
        
        // Scroll to booking form
        document.getElementById('booking-form').scrollIntoView({ behavior: 'smooth' });
        
        showSuccessAlert(`Selected: ${tourName}`);
    }
    
    function viewTourDetails(tourId) {
        // In production, this would navigate to tour detail page
        Swal.fire({
            title: 'Tour Details',
            html: '<p class="text-gray-600">Full tour details would be displayed here.</p>',
            confirmButtonColor: '#87CEEB'
        });
    }
    
    function viewAllTours() {
        // Navigate to all tours page
        window.location.href = '/tours';
    }
</script>
@endpush