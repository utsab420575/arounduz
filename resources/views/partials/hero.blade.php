<!-- Hero Section -->
<section id="hero-section" class="relative bg-gradient-to-br from-skyblue to-blue-400 text-white py-12 md:py-16 lg:py-20 ">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img class="w-full h-full object-cover opacity-30" src="{{asset('back.png')}}" alt="Uzbekistan Travel">
        <div class="absolute inset-0 bg-gradient-to-br from-skyblue/60 to-blue-400/60"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-6xl mx-auto text-center">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 lg:mb-6">Explore the Heart of the Silk Road</h1>
            <p class="text-base md:text-lg lg:text-xl mb-6 lg:mb-8 opacity-90">Discover the wonders of Uzbekistan with our verified local guides and professional travel agents</p>
            
            <!-- Modern Search Bar -->
            <div class="bg-white/40 rounded-2xl p-3 md:p-4 mb-6 lg:mb-8 max-w-6xl mx-auto shadow-2xl">
                <div class="flex flex-col md:flex-row gap-2">
                    <!-- Search Input -->
                    <div class="flex-1 relative">
                        <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="text" id="searchInput" placeholder="Search destinations, guides, or experiences..." class="w-full pl-12 pr-4 py-3 text-gray-700 rounded-xl focus:outline-none focus:ring-2 focus:ring-skyblue border border-gray-200">
                    </div>
                    
                    <!-- Modern City Dropdown -->
                    <div class="relative" id="cityDropdown">
                        <button type="button" onclick="toggleCityDropdown()" class="w-full md:min-w-72 px-4 py-3 text-left text-gray-700 rounded-xl focus:outline-none focus:ring-2 focus:ring-skyblue border border-gray-200 bg-white hover:bg-gray-50 transition-colors flex items-center justify-between">
                            <div class="flex items-center">
                                <i class="fa-solid fa-location-dot text-skyblue mr-3"></i>
                                <span id="selectedCity">All Cities</span>
                            </div>
                            <i class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300" id="cityChevron"></i>
                        </button>
                        
                        <!-- City Dropdown Menu -->
                        <div id="cityDropdownMenu" class="hidden absolute top-full left-0 right-0 mt-2 bg-white rounded-xl shadow-2xl border border-gray-100  z-50 max-h-96 overflow-y-auto">
                            @php
                                $cities = [
                                    ['name' => 'All Cities', 'value' => '', 'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=400', 'description' => 'Browse all destinations'],
                                    ['name' => 'Tashkent', 'value' => 'tashkent', 'image' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=400', 'description' => 'Modern capital city'],
                                    ['name' => 'Samarkand', 'value' => 'samarkand', 'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=400', 'description' => 'Pearl of the East'],
                                    ['name' => 'Bukhara', 'value' => 'bukhara', 'image' => 'https://images.unsplash.com/photo-1590523741831-ab7e8b8f9c7f?w=400', 'description' => 'Living museum city'],
                                    ['name' => 'Khiva', 'value' => 'khiva', 'image' => 'https://images.unsplash.com/photo-1512632578888-169bbbc64f33?w=400', 'description' => 'Ancient walled city'],
                                    ['name' => 'Fergana', 'value' => 'fergana', 'image' => 'https://images.unsplash.com/photo-1564507592333-c60657eea523?w=400', 'description' => 'Silk Road valley'],
                                    ['name' => 'Nukus', 'value' => 'nukus', 'image' => 'https://images.unsplash.com/photo-1590523741831-ab7e8b8f9c7f?w=400', 'description' => 'Desert gateway'],
                                ];
                            @endphp
                            
                            @foreach($cities as $city)
                            <button type="button" onclick="selectCity('{{ $city['value'] }}', '{{ $city['name'] }}')" class="w-full flex items-center gap-3 p-3 hover:bg-blue-50 transition-colors group">
                                <img src="{{ $city['image'] }}" alt="{{ $city['name'] }}" class="w-16 h-12 object-cover rounded-lg">
                                <div class="flex-1 text-left">
                                    <div class="font-semibold text-gray-900 group-hover:text-skyblue transition-colors">{{ $city['name'] }}</div>
                                    <div class="text-xs text-gray-500">{{ $city['description'] }}</div>
                                </div>
                                @if($city['value'] === '')
                                <i class="fa-solid fa-globe text-skyblue"></i>
                                @endif
                            </button>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Modern Service Type Dropdown -->
                    <div class="relative" id="serviceDropdown">
                        <button type="button" onclick="toggleServiceDropdown()" class="w-full md:min-w-60 px-4 py-3 text-left text-gray-700 rounded-xl focus:outline-none focus:ring-2 focus:ring-skyblue border border-gray-200 bg-white hover:bg-gray-50 transition-colors flex items-center justify-between">
                            <div class="flex items-center">
                                <i class="fa-solid fa-briefcase text-purple-600 mr-3"></i>
                                <span id="selectedService">All Services</span>
                            </div>
                            <i class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300" id="serviceChevron"></i>
                        </button>
                        
                        <!-- Service Dropdown Menu -->
                        <div id="serviceDropdownMenu" class="hidden absolute top-full left-0 right-0 mt-2 bg-white rounded-xl shadow-2xl border border-gray-100  z-50">
                            @php
                                $services = [
                                    ['name' => 'All Services', 'value' => '', 'icon' => 'fa-globe', 'color' => 'text-gray-600', 'bg' => 'bg-gray-50', 'description' => 'Browse everything'],
                                    ['name' => 'Local Guides', 'value' => 'guides', 'icon' => 'fa-user-tie', 'color' => 'text-skyblue', 'bg' => 'bg-blue-50', 'description' => 'Personal tour guides'],
                                    ['name' => 'Travel Agencies', 'value' => 'agents', 'icon' => 'fa-building', 'color' => 'text-purple-600', 'bg' => 'bg-purple-50', 'description' => 'Full service packages'],
                                ];
                            @endphp
                            
                            @foreach($services as $service)
                            <button type="button" onclick="selectService('{{ $service['value'] }}', '{{ $service['name'] }}')" class="w-full flex items-center gap-4 p-4 hover:bg-blue-50 transition-colors group">
                                <div class="w-12 h-12 {{ $service['bg'] }} rounded-lg flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                    <i class="fa-solid {{ $service['icon'] }} {{ $service['color'] }} text-xl"></i>
                                </div>
                                <div class="flex-1 text-left">
                                    <div class="font-semibold text-gray-900 group-hover:text-skyblue transition-colors">{{ $service['name'] }}</div>
                                    <div class="text-xs text-gray-500">{{ $service['description'] }}</div>
                                </div>
                            </button>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Search Button -->
                    <button onclick="handleSearch()" class="bg-gradient-to-r from-coral to-orange-500 hover:from-orange-500 hover:to-coral text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 flex items-center justify-center shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <i class="fa-solid fa-search mr-2"></i>
                        <span class="hidden md:inline">Search</span>
                        <span class="md:hidden">Go</span>
                    </button>
                </div>
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row justify-center gap-3 sm:gap-4 mb-8 lg:mb-12">
                <button onclick="showGuides()" class="bg-white text-skyblue px-6 lg:px-8 py-3 rounded-xl font-semibold hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    <i class="fa-solid fa-user-tie mr-2"></i>Find Local Guides
                </button>
                <button onclick="showAgents()" class="border-2 border-white text-white px-6 lg:px-8 py-3 rounded-xl font-semibold hover:bg-white hover:text-skyblue transition-all duration-300 backdrop-blur-sm">
                    <i class="fa-solid fa-briefcase mr-2"></i>Browse Travel Agencies
                </button>
            </div>
            
            <!-- Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8 max-w-3xl mx-auto">
                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold">1,200+</div>
                    <div class="text-xs md:text-sm opacity-80">Verified Guides</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold">300+</div>
                    <div class="text-xs md:text-sm opacity-80">Travel Agencies</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold">10+</div>
                    <div class="text-xs md:text-sm opacity-80">Ancient Cities</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold">4.9/5</div>
                    <div class="text-xs md:text-sm opacity-80">Average Rating</div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    let selectedCityValue = '';
    let selectedServiceValue = '';
    
    // Toggle City Dropdown
    function toggleCityDropdown() {
        const menu = document.getElementById('cityDropdownMenu');
        const chevron = document.getElementById('cityChevron');
        const serviceMenu = document.getElementById('serviceDropdownMenu');
        
        // Close service dropdown if open
        serviceMenu.classList.add('hidden');
        document.getElementById('serviceChevron').style.transform = 'rotate(0deg)';
        
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
            chevron.style.transform = 'rotate(180deg)';
        } else {
            menu.classList.add('hidden');
            chevron.style.transform = 'rotate(0deg)';
        }
    }
    
    // Toggle Service Dropdown
    function toggleServiceDropdown() {
        const menu = document.getElementById('serviceDropdownMenu');
        const chevron = document.getElementById('serviceChevron');
        const cityMenu = document.getElementById('cityDropdownMenu');
        
        // Close city dropdown if open
        cityMenu.classList.add('hidden');
        document.getElementById('cityChevron').style.transform = 'rotate(0deg)';
        
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
            chevron.style.transform = 'rotate(180deg)';
        } else {
            menu.classList.add('hidden');
            chevron.style.transform = 'rotate(0deg)';
        }
    }
    
    // Select City
    function selectCity(value, name) {
        selectedCityValue = value;
        document.getElementById('selectedCity').textContent = name;
        document.getElementById('cityDropdownMenu').classList.add('hidden');
        document.getElementById('cityChevron').style.transform = 'rotate(0deg)';
    }
    
    // Select Service
    function selectService(value, name) {
        selectedServiceValue = value;
        document.getElementById('selectedService').textContent = name;
        document.getElementById('serviceDropdownMenu').classList.add('hidden');
        document.getElementById('serviceChevron').style.transform = 'rotate(0deg)';
    }
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', function(event) {
        const cityDropdown = document.getElementById('cityDropdown');
        const serviceDropdown = document.getElementById('serviceDropdown');
        
        if (!cityDropdown.contains(event.target)) {
            document.getElementById('cityDropdownMenu').classList.add('hidden');
            document.getElementById('cityChevron').style.transform = 'rotate(0deg)';
        }
        
        if (!serviceDropdown.contains(event.target)) {
            document.getElementById('serviceDropdownMenu').classList.add('hidden');
            document.getElementById('serviceChevron').style.transform = 'rotate(0deg)';
        }
    });
    
    // Handle Search
    function handleSearch() {
        const searchTerm = document.getElementById('searchInput').value;
        const city = selectedCityValue;
        const service = selectedServiceValue;
        
        if (!searchTerm && !city && !service) {
            Swal.fire({
                icon: 'info',
                title: 'Search',
                text: 'Please enter a search term or select filters',
                confirmButtonColor: '#87CEEB'
            });
            return;
        }
        
        // Build query parameters
        let queryParams = [];
        if (searchTerm) queryParams.push(`search=${encodeURIComponent(searchTerm)}`);
        if (city) queryParams.push(`city=${city}`);
        
        // Determine route based on service type
        let route = '';
        if (service === 'guides') {
            route = '{{ route("guides") }}';
        } else if (service === 'agents') {
            route = '{{ route("agents") }}';
        } else {
            // If no specific service, default to guides
            route = '{{ route("guides") }}';
        }
        
        // Add query parameters
        if (queryParams.length > 0) {
            route += '?' + queryParams.join('&');
        }
        
        // Show loading
        Swal.fire({
            title: 'Searching...',
            html: 'Finding the best matches for you',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
        
        // Redirect to search results
        setTimeout(() => {
            window.location.href = route;
        }, 500);
    }
    
    function showGuides() {
        window.location.href = '{{ route("guides") }}';
    }
    
    function showAgents() {
        window.location.href = '{{ route("agents") }}';
    }
    
    // Handle Enter key in search input
    document.getElementById('searchInput').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            handleSearch();
        }
    });
</script>
@endpush