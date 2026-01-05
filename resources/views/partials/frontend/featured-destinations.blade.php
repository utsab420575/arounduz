<!-- Popular Destinations Section -->
<section id="featured-destinations" class="py-12 md:py-16 bg-gradient-to-br from-gray-50 via-blue-50 to-cyan-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-8 md:mb-12">
            <h3 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Popular Destinations in Uzbekistan</h3>
            <p class="text-base md:text-lg text-gray-600">Discover the most sought-after places with our expert guides</p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
            @php
                $destinations = [
                    [
                        'name' => 'Samarkand',
                        'subtitle' => 'The Pearl of the East',
                        'guides' => 125,
                        'agents' => 35,
                        'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800'
                    ],
                    [
                        'name' => 'Bukhara',
                        'subtitle' => 'Living Museum City',
                        'guides' => 98,
                        'agents' => 28,
                        'image' => 'https://images.unsplash.com/photo-1512632578888-169bbbc64f33?w=800'
                    ],
                    [
                        'name' => 'Khiva',
                        'subtitle' => 'Desert Oasis City',
                        'guides' => 87,
                        'agents' => 22,
                        'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800'
                    ],
                    [
                        'name' => 'Tashkent',
                        'subtitle' => 'Modern Capital City',
                        'guides' => 156,
                        'agents' => 45,
                        'image' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=800'
                    ]
                ];
            @endphp
            
            @foreach($destinations as $destination)
                <div class="group cursor-pointer" onclick="searchDestination('{{ $destination['name'] }}')">
                    <div class="relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300">
                        <img class="w-full h-56 md:h-64 object-cover group-hover:scale-110 transition-transform duration-500" 
                             src="{{ $destination['image'] }}" 
                             alt="{{ $destination['name'] }}">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
                        
                        <div class="absolute bottom-4 left-4 right-4 text-white">
                            <h4 class="text-xl md:text-2xl font-bold mb-1">{{ $destination['name'] }}</h4>
                            <p class="text-sm opacity-90 mb-3">{{ $destination['subtitle'] }}</p>
                            <div class="flex items-center">
                                <span class="bg-white bg-opacity-20 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-medium">
                                    {{ $destination['guides'] }} Guides • {{ $destination['agents'] }} Agents
                                </span>
                            </div>
                        </div>
                        
                        <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="bg-white bg-opacity-90 backdrop-blur-sm rounded-full p-2">
                                <i class="fa-solid fa-arrow-right text-skyblue"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- View All Destinations Button -->
        <div class="text-center mt-8 md:mt-12">
            <button onclick="viewAllDestinations()" class="bg-white border border-gray-200 text-gray-700 px-6 md:px-8 py-3 rounded-lg hover:border-skyblue hover:text-skyblue transition-colors font-medium shadow-sm">
                <i class="fa-solid fa-globe mr-2"></i>
                View All Destinations
            </button>
        </div>
    </div>
</section>

@push('scripts')
<script>
    function searchDestination(city) {
        document.getElementById('citySelect').value = city.toLowerCase();
        handleSearch();
        document.getElementById('local-guides-section').scrollIntoView({ behavior: 'smooth' });
    }
    
    function viewAllDestinations() {
        Swal.fire({
            title: 'All Destinations in Uzbekistan',
            html: `
                <div class="text-left space-y-3 max-h-96 overflow-y-auto">
                    <div class="grid grid-cols-2 gap-3">
                        <div class="p-3 border border-gray-200 rounded-lg hover:border-skyblue cursor-pointer transition-colors">
                            <h4 class="font-semibold text-gray-800">Samarkand</h4>
                            <p class="text-xs text-gray-600">125 Guides • 35 Agents</p>
                        </div>
                        <div class="p-3 border border-gray-200 rounded-lg hover:border-skyblue cursor-pointer transition-colors">
                            <h4 class="font-semibold text-gray-800">Tashkent</h4>
                            <p class="text-xs text-gray-600">156 Guides • 45 Agents</p>
                        </div>
                        <div class="p-3 border border-gray-200 rounded-lg hover:border-skyblue cursor-pointer transition-colors">
                            <h4 class="font-semibold text-gray-800">Bukhara</h4>
                            <p class="text-xs text-gray-600">98 Guides • 28 Agents</p>
                        </div>
                        <div class="p-3 border border-gray-200 rounded-lg hover:border-skyblue cursor-pointer transition-colors">
                            <h4 class="font-semibold text-gray-800">Khiva</h4>
                            <p class="text-xs text-gray-600">87 Guides • 22 Agents</p>
                        </div>
                        <div class="p-3 border border-gray-200 rounded-lg hover:border-skyblue cursor-pointer transition-colors">
                            <h4 class="font-semibold text-gray-800">Fergana Valley</h4>
                            <p class="text-xs text-gray-600">64 Guides • 18 Agents</p>
                        </div>
                        <div class="p-3 border border-gray-200 rounded-lg hover:border-skyblue cursor-pointer transition-colors">
                            <h4 class="font-semibold text-gray-800">Nukus</h4>
                            <p class="text-xs text-gray-600">32 Guides • 12 Agents</p>
                        </div>
                        <div class="p-3 border border-gray-200 rounded-lg hover:border-skyblue cursor-pointer transition-colors">
                            <h4 class="font-semibold text-gray-800">Termez</h4>
                            <p class="text-xs text-gray-600">28 Guides • 8 Agents</p>
                        </div>
                        <div class="p-3 border border-gray-200 rounded-lg hover:border-skyblue cursor-pointer transition-colors">
                            <h4 class="font-semibold text-gray-800">Shakhrisabz</h4>
                            <p class="text-xs text-gray-600">41 Guides • 15 Agents</p>
                        </div>
                    </div>
                </div>
            `,
            confirmButtonText: 'Close',
            confirmButtonColor: '#87CEEB',
            width: '600px'
        });
    }
</script>
@endpush