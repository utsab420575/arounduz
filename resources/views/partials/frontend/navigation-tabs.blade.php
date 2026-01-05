<!-- Navigation Tabs -->
<section id="navigation-tabs" class="bg-white border-b border-gray-200  top-[73px] lg:top-[97px] z-40">
    <div class="container mx-auto px-4">
        <div class="flex justify-center overflow-x-auto">
            <div class="flex bg-gray-100 rounded-md p-1 my-4 min-w-max">
                <button id="guides-tab" onclick="switchTab('guides')" class="px-6 lg:px-8 py-2 lg:py-3 rounded-md font-medium transition-all duration-200 bg-skyblue text-white whitespace-nowrap">
                    <i class="fa-solid fa-user-tie mr-2"></i>Local Guides
                </button>
                <button id="agents-tab" onclick="switchTab('agents')" class="px-6 lg:px-8 py-2 lg:py-3 rounded-md font-medium transition-all duration-200 text-gray-600 hover:text-gray-900 whitespace-nowrap">
                    <i class="fa-solid fa-briefcase mr-2"></i>Travel Agents
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Filters Section -->
<section id="filters-section" class="bg-white py-4 lg:py-6 border-b border-gray-200">
    <div class="container mx-auto px-4">
        <!-- Mobile Filter Button -->
        <div class="lg:hidden mb-4">
            <button id="mobileFilterBtn" onclick="toggleMobileFilters()" class="w-full bg-skyblue text-white py-3 rounded-md font-medium flex items-center justify-center">
                <i class="fa-solid fa-filter mr-2"></i>
                Show Filters
            </button>
        </div>
        
        <!-- Filters Container -->
        <div id="filtersContainer" class="hidden lg:flex flex-col lg:flex-row items-start lg:items-center justify-between gap-4">
            <!-- Left Filters -->
            <div class="flex flex-col lg:flex-row items-start lg:items-center gap-3 lg:gap-6 w-full lg:w-auto">
                <div class="flex items-center gap-2 w-full lg:w-auto">
                    <i class="fa-solid fa-filter text-gray-500"></i>
                    <span class="font-medium text-gray-700">Filters:</span>
                </div>
                
                <select id="locationFilter" class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-skyblue w-full lg:w-auto">
                    <option value="">All Locations</option>
                    <option value="tashkent">Tashkent</option>
                    <option value="samarkand">Samarkand</option>
                    <option value="bukhara">Bukhara</option>
                    <option value="khiva">Khiva</option>
                </select>
                
                <select id="languageFilter" class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-skyblue w-full lg:w-auto">
                    <option value="">All Languages</option>
                    <option value="english">English</option>
                    <option value="russian">Russian</option>
                    <option value="uzbek">Uzbek</option>
                    <option value="french">French</option>
                </select>
                
                <select id="priceFilter" class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-skyblue w-full lg:w-auto">
                    <option value="">Price Range</option>
                    <option value="0-500">0 - 500k UZS</option>
                    <option value="500-1000">500k - 1M UZS</option>
                    <option value="1000-2000">1M - 2M UZS</option>
                    <option value="2000+">2M+ UZS</option>
                </select>
                
                <select id="ratingFilter" class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-skyblue w-full lg:w-auto">
                    <option value="">Rating</option>
                    <option value="5">5 Stars</option>
                    <option value="4">4+ Stars</option>
                    <option value="3">3+ Stars</option>
                </select>
            </div>
            
            <!-- Right Side - Sort & View -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3 lg:gap-4 w-full lg:w-auto">
                <div class="flex items-center gap-2 w-full sm:w-auto">
                    <span class="text-gray-600 whitespace-nowrap">Sort by:</span>
                    <select id="sortFilter" class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-skyblue flex-1 sm:flex-none">
                        <option value="popular">Most Popular</option>
                        <option value="rating">Highest Rated</option>
                        <option value="price-low">Price: Low to High</option>
                        <option value="price-high">Price: High to Low</option>
                        <option value="newest">Newest</option>
                    </select>
                </div>
                
                <div class="hidden sm:flex border border-gray-300 rounded-md">
                    <button id="gridViewBtn" onclick="changeView('grid')" class="p-2 hover:bg-gray-100 border-r border-gray-300 rounded-l-md">
                        <i class="fa-solid fa-th-large text-gray-600"></i>
                    </button>
                    <button id="listViewBtn" onclick="changeView('list')" class="p-2 hover:bg-gray-100 bg-skyblue text-white rounded-r-md">
                        <i class="fa-solid fa-list"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    let currentView = 'grid';
    
    function switchTab(tab) {
        const guidesTab = document.getElementById('guides-tab');
        const agentsTab = document.getElementById('agents-tab');
        const guidesSection = document.getElementById('local-guides-section');
        const agentsSection = document.getElementById('travel-agents-section');
        
        if (tab === 'guides') {
            guidesTab.classList.add('bg-skyblue', 'text-white');
            guidesTab.classList.remove('text-gray-600', 'hover:text-gray-900');
            agentsTab.classList.remove('bg-skyblue', 'text-white');
            agentsTab.classList.add('text-gray-600', 'hover:text-gray-900');
            
            guidesSection.classList.remove('hidden');
            agentsSection.classList.add('hidden');
        } else {
            agentsTab.classList.add('bg-skyblue', 'text-white');
            agentsTab.classList.remove('text-gray-600', 'hover:text-gray-900');
            guidesTab.classList.remove('bg-skyblue', 'text-white');
            guidesTab.classList.add('text-gray-600', 'hover:text-gray-900');
            
            guidesSection.classList.add('hidden');
            agentsSection.classList.remove('hidden');
        }
    }
    
    function toggleMobileFilters() {
        const filtersContainer = document.getElementById('filtersContainer');
        filtersContainer.classList.toggle('hidden');
        filtersContainer.classList.toggle('flex');
    }
    
    function changeView(view) {
        currentView = view;
        const gridViewBtn = document.getElementById('gridViewBtn');
        const listViewBtn = document.getElementById('listViewBtn');
        
        if (view === 'grid') {
            gridViewBtn.classList.add('bg-skyblue', 'text-white');
            gridViewBtn.classList.remove('text-gray-600');
            listViewBtn.classList.remove('bg-skyblue', 'text-white');
            listViewBtn.classList.add('text-gray-600');
        } else {
            listViewBtn.classList.add('bg-skyblue', 'text-white');
            listViewBtn.classList.remove('text-gray-600');
            gridViewBtn.classList.remove('bg-skyblue', 'text-white');
            gridViewBtn.classList.add('text-gray-600');
        }
        
        // You can add logic here to change the layout
        showSuccessAlert(`Switched to ${view} view`);
    }
    
    // Filter change handlers
    document.addEventListener('DOMContentLoaded', function() {
        const filters = ['locationFilter', 'languageFilter', 'priceFilter', 'ratingFilter', 'sortFilter'];
        
        filters.forEach(filterId => {
            document.getElementById(filterId)?.addEventListener('change', function() {
                applyFilters();
            });
        });
    });
    
    function applyFilters() {
        const location = document.getElementById('locationFilter').value;
        const language = document.getElementById('languageFilter').value;
        const price = document.getElementById('priceFilter').value;
        const rating = document.getElementById('ratingFilter').value;
        const sort = document.getElementById('sortFilter').value;
        
        // Show loading
        Swal.fire({
            title: 'Applying Filters...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
        
        // Simulate filter application (replace with actual Laravel AJAX call)
        setTimeout(() => {
            Swal.close();
            showSuccessAlert('Filters applied successfully!');
        }, 800);
    }
</script>
@endpush