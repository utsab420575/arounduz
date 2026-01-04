<!-- Alternative Hero Section (Two Column Layout) -->
<section id="hero-alternative" class="bg-gradient-to-br from-blue-50 via-cyan-50 to-indigo-100 py-12 md:py-16 lg:py-20">
    <div class="container mx-auto px-4 lg:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            <!-- Left Column - Content -->
            <div class="order-2 lg:order-1">
                <div class="mb-4">
                    <span class="bg-skyblue bg-opacity-20 text-skyblue px-4 py-2 rounded-full text-sm font-semibold">
                        <i class="fa-solid fa-star mr-1"></i>Trusted by 50,000+ Travelers
                    </span>
                </div>
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4 md:mb-6 leading-tight">
                    Discover Uzbekistan with 
                    <span class="text-skyblue">Local Experts</span>
                </h1>
                
                <p class="text-lg md:text-xl text-gray-600 mb-6 md:mb-8 leading-relaxed">
                    Connect with certified tour guides and travel agencies across Uzbekistan. From Samarkand's ancient wonders to Bukhara's historic charm.
                </p>
                
                <!-- Key Features -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6 md:mb-8">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-skyblue bg-opacity-20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-certificate text-skyblue"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm">Verified Guides</p>
                            <p class="text-xs text-gray-600">1200+ certified experts</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-coral bg-opacity-20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-shield-check text-coral"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm">Secure Booking</p>
                            <p class="text-xs text-gray-600">100% protected payments</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-star text-green-600"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm">Best Rated</p>
                            <p class="text-xs text-gray-600">4.9/5 average rating</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-headset text-purple-600"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm">24/7 Support</p>
                            <p class="text-xs text-gray-600">Always here to help</p>
                        </div>
                    </div>
                </div>
                
                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                    <button onclick="showGuides()" class="w-full sm:w-auto bg-skyblue text-white px-6 md:px-8 py-3 md:py-4 rounded-lg font-semibold text-base md:text-lg hover:bg-blue-400 transition-all duration-300 shadow-lg hover:shadow-xl">
                        <i class="fa-solid fa-user-tie mr-2"></i>Find Tour Guides
                    </button>
                    <button onclick="showAgents()" class="w-full sm:w-auto border-2 border-skyblue text-skyblue px-6 md:px-8 py-3 md:py-4 rounded-lg font-semibold text-base md:text-lg hover:bg-skyblue hover:text-white transition-all duration-300">
                        <i class="fa-solid fa-briefcase mr-2"></i>Browse Agencies
                    </button>
                </div>
                
                <!-- Trust Badges -->
                <div class="mt-8 flex flex-wrap items-center gap-6 text-sm text-gray-600">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-check-circle text-green-500"></i>
                        <span>No booking fees</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-check-circle text-green-500"></i>
                        <span>Free cancellation</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-check-circle text-green-500"></i>
                        <span>Instant confirmation</span>
                    </div>
                </div>
            </div>
            
            <!-- Right Column - Image -->
            <div class="order-1 lg:order-2 relative">
                <div class="relative">
                    <img class="w-full h-64 md:h-80 lg:h-96 object-cover rounded-2xl shadow-2xl" 
                         src="https://images.unsplash.com/photo-1564507592333-c60657eea523?w=1200" 
                         alt="Beautiful Uzbekistan landscape" />
                    
                    <!-- Floating Stats Card -->
                    <div class="absolute -bottom-4 -left-4 md:-bottom-6 md:-left-6 bg-white p-4 md:p-6 rounded-xl shadow-xl">
                        <div class="flex items-center gap-3 md:gap-4">
                            <div class="w-12 h-12 md:w-14 md:h-14 bg-amber-100 rounded-full flex items-center justify-center">
                                <i class="fa-solid fa-star text-amber-500 text-xl md:text-2xl"></i>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900 text-lg md:text-xl">1,200+</p>
                                <p class="text-xs md:text-sm text-gray-600">Verified Guides</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating Reviews Card -->
                    <div class="absolute -top-4 -right-4 md:-top-6 md:-right-6 bg-white p-3 md:p-4 rounded-xl shadow-xl">
                        <div class="flex items-center gap-2">
                            <div class="flex text-amber-400">
                                <i class="fa-solid fa-star text-sm"></i>
                                <i class="fa-solid fa-star text-sm"></i>
                                <i class="fa-solid fa-star text-sm"></i>
                                <i class="fa-solid fa-star text-sm"></i>
                                <i class="fa-solid fa-star text-sm"></i>
                            </div>
                            <span class="font-bold text-gray-900">4.9</span>
                        </div>
                        <p class="text-xs text-gray-600 mt-1">50K+ Reviews</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    // These functions are already defined in other sections, but included here for completeness
    if (typeof showGuides === 'undefined') {
        function showGuides() {
            document.getElementById('guides-tab').click();
            document.getElementById('local-guides-section').scrollIntoView({ behavior: 'smooth' });
        }
    }
    
    if (typeof showAgents === 'undefined') {
        function showAgents() {
            document.getElementById('agents-tab').click();
            document.getElementById('travel-agents-section').scrollIntoView({ behavior: 'smooth' });
        }
    }
</script>
@endpush