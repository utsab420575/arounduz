<!-- Guide Hero Section -->
<section class="relative bg-gradient-to-r from-gray-900 to-gray-800 overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="{{ $guide['cover_image'] }}" alt="{{ $guide['name'] }}" class="w-full h-full object-cover opacity-40">
    </div>
    
    <div class="container mx-auto px-4 py-12 md:py-16 relative z-10">
        <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
            <!-- Avatar -->
            <div class="relative">
                <div class="w-32 h-32 md:w-40 md:h-40 rounded-full overflow-hidden bg-white shadow-2xl border-4 border-white">
                    <img src="{{ $guide['avatar'] }}" alt="{{ $guide['name'] }}" class="w-full h-full object-cover">
                </div>
                @if($guide['available'])
                    <div class="absolute bottom-2 right-2 w-6 h-6 bg-green-500 border-4 border-white rounded-full"></div>
                @endif
                @if($guide['verified'])
                    <div class="absolute -top-2 -right-2 w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center border-2 border-white">
                        <i class="fa-solid fa-shield-check text-white"></i>
                    </div>
                @endif
            </div>
            
            <!-- Guide Info -->
            <div class="flex-1 text-white">
                <div class="flex items-start justify-between flex-wrap gap-4">
                    <div>
                        <h1 class="text-3xl md:text-4xl font-bold mb-2">{{ $guide['name'] }}</h1>
                        <p class="text-blue-200 text-lg mb-2">{{ $guide['title'] }}</p>
                        <p class="text-gray-300 text-sm mb-1">{{ $guide['tagline'] }}</p>
                        <div class="flex items-center gap-2 mt-2">
                            @if($guide['available'])
                                <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-medium">
                                    Available Now
                                </span>
                            @endif
                            @if($guide['verified'])
                                <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-xs font-medium flex items-center">
                                    <i class="fa-solid fa-shield-check mr-1"></i>Verified
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Rating -->
                    <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg px-4 py-3">
                        <div class="flex items-center text-yellow-400 mb-1">
                            @for($i = 0; $i < 5; $i++)
                                <i class="fa-solid fa-star{{ $i < floor($guide['rating']) ? '' : ($i < $guide['rating'] ? '-half-alt' : ' text-gray-500') }}"></i>
                            @endfor
                        </div>
                        <p class="text-white text-sm">{{ $guide['rating'] }} ({{ $guide['reviews_count'] }} reviews)</p>
                    </div>
                </div>
                
                <!-- Quick Info -->
                <div class="flex flex-wrap items-center gap-4 md:gap-6 mt-4">
                    <div class="flex items-center text-gray-300">
                        <i class="fa-solid fa-map-marker-alt mr-2 text-skyblue"></i>
                        <span class="text-sm">{{ $guide['location'] }}</span>
                    </div>
                    <div class="flex items-center text-gray-300">
                        <i class="fa-solid fa-language mr-2 text-skyblue"></i>
                        <span class="text-sm">{{ count($guide['languages']) }} Languages</span>
                    </div>
                    <div class="flex items-center text-gray-300">
                        <i class="fa-solid fa-calendar-check mr-2 text-skyblue"></i>
                        <span class="text-sm">{{ $guide['experience_years'] }} Years Experience</span>
                    </div>
                    <div class="flex items-center text-gray-300">
                        <i class="fa-solid fa-users mr-2 text-skyblue"></i>
                        <span class="text-sm">{{ $guide['tours_completed'] }}+ Tours</span>
                    </div>
                </div>
                
                <!-- Pricing -->
                <div class="flex items-center gap-6 mt-4 text-white">
                    <div>
                        <span class="text-2xl font-bold">${{ $guide['hourly_rate'] }}</span>
                        <span class="text-sm opacity-75">/hour</span>
                    </div>
                    <div class="h-8 w-px bg-gray-500"></div>
                    <div>
                        <span class="text-2xl font-bold">${{ $guide['daily_rate'] }}</span>
                        <span class="text-sm opacity-75">/day</span>
                    </div>
                </div>
                
                <!-- CTA Buttons -->
                <div class="flex flex-wrap items-center gap-3 mt-6">
                    <button onclick="scrollToBooking()" class="bg-skyblue text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-400 transition-colors">
                        <i class="fa-solid fa-calendar-check mr-2"></i>Book Guide
                    </button>
                    <button onclick="contactGuide()" class="bg-white bg-opacity-20 backdrop-blur-sm border-2 border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-gray-900 transition-colors">
                        <i class="fa-solid fa-message mr-2"></i>Send Message
                    </button>
                    <button onclick="saveGuide({{ $guide['id'] }})" class="bg-white bg-opacity-20 backdrop-blur-sm border-2 border-white text-white px-4 py-3 rounded-lg hover:bg-white hover:text-gray-900 transition-colors">
                        <i class="fa-regular fa-heart"></i>
                    </button>
                    <button onclick="shareGuide()" class="bg-white bg-opacity-20 backdrop-blur-sm border-2 border-white text-white px-4 py-3 rounded-lg hover:bg-white hover:text-gray-900 transition-colors">
                        <i class="fa-solid fa-share-alt"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    function scrollToBooking() {
        document.getElementById('booking-card').scrollIntoView({ behavior: 'smooth' });
    }
    
    function contactGuide() {
        document.getElementById('contact-info').scrollIntoView({ behavior: 'smooth' });
    }
    
    function saveGuide(guideId) {
        Swal.fire({
            icon: 'success',
            title: 'Saved!',
            text: 'Guide added to your favorites',
            confirmButtonColor: '#87CEEB'
        });
    }
    
    function shareGuide() {
        if (navigator.share) {
            navigator.share({
                title: '{{ $guide["name"] }}',
                text: '{{ $guide["title"] }}',
                url: window.location.href
            });
        } else {
            Swal.fire({
                title: 'Share this guide',
                html: `
                    <div class="text-left space-y-3">
                        <p class="text-sm text-gray-600">Share via:</p>
                        <div class="flex gap-3">
                            <button onclick="window.open('https://facebook.com/sharer/sharer.php?u=${window.location.href}')" class="flex-1 bg-blue-600 text-white py-2 rounded-lg">
                                <i class="fa-brands fa-facebook mr-2"></i>Facebook
                            </button>
                            <button onclick="window.open('https://twitter.com/intent/tweet?url=${window.location.href}')" class="flex-1 bg-sky-500 text-white py-2 rounded-lg">
                                <i class="fa-brands fa-twitter mr-2"></i>Twitter
                            </button>
                        </div>
                    </div>
                `,
                showConfirmButton: false,
                showCloseButton: true
            });
        }
    }
</script>
@endpush