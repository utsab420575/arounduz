<!-- Agency Hero Section -->
<section class="relative bg-gradient-to-r from-gray-900 to-gray-800 overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="{{ $agency['cover_image'] }}" alt="{{ $agency['name'] }}" class="w-full h-full object-cover opacity-40">
    </div>
    
    <div class="container mx-auto px-4 py-12 md:py-16 relative z-10">
        <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
            <!-- Logo -->
            <div class="w-24 h-24 md:w-32 md:h-32 rounded-xl overflow-hidden bg-white shadow-2xl flex-shrink-0 border-4 border-white">
                <img src="{{ $agency['logo'] }}" alt="{{ $agency['name'] }}" class="w-full h-full object-cover">
            </div>
            
            <!-- Agency Info -->
            <div class="flex-1 text-white">
                <div class="flex items-start justify-between flex-wrap gap-4">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <h1 class="text-3xl md:text-4xl font-bold">{{ $agency['name'] }}</h1>
                            @if($agency['verified'])
                                <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-medium flex items-center">
                                    <i class="fa-solid fa-shield-check mr-1"></i>Verified
                                </span>
                            @endif
                        </div>
                        <p class="text-blue-200 text-lg mb-2">{{ $agency['tagline'] }}</p>
                        <p class="text-gray-300 text-sm">{{ $agency['type'] }} • Est. {{ $agency['established'] }}</p>
                    </div>
                    
                    <!-- Rating -->
                    <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg px-4 py-3">
                        <div class="flex items-center text-yellow-400 mb-1">
                            @for($i = 0; $i < 5; $i++)
                                <i class="fa-solid fa-star{{ $i < floor($agency['rating']) ? '' : ($i < $agency['rating'] ? '-half-alt' : ' text-gray-500') }}"></i>
                            @endfor
                        </div>
                        <p class="text-white text-sm">{{ $agency['rating'] }} ({{ $agency['reviews_count'] }} reviews)</p>
                    </div>
                </div>
                
                <!-- Quick Info -->
                <div class="flex flex-wrap items-center gap-4 md:gap-6 mt-4">
                    <div class="flex items-center text-gray-300">
                        <i class="fa-solid fa-map-marker-alt mr-2 text-skyblue"></i>
                        <span class="text-sm">{{ $agency['location'] }}</span>
                    </div>
                    <div class="flex items-center text-gray-300">
                        <i class="fa-solid fa-language mr-2 text-skyblue"></i>
                        <span class="text-sm">{{ count($agency['languages']) }} Languages</span>
                    </div>
                    <div class="flex items-center text-gray-300">
                        <i class="fa-solid fa-users mr-2 text-skyblue"></i>
                        <span class="text-sm">{{ $agency['tours_completed'] }}+ Tours Completed</span>
                    </div>
                </div>
                
                <!-- CTA Buttons -->
                <div class="flex flex-wrap items-center gap-3 mt-6">
                    <button onclick="scrollToBooking()" class="bg-skyblue text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-400 transition-colors">
                        <i class="fa-solid fa-calendar-check mr-2"></i>Book Now
                    </button>
                    <button onclick="contactAgency()" class="bg-white bg-opacity-20 backdrop-blur-sm border-2 border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-gray-900 transition-colors">
                        <i class="fa-solid fa-phone mr-2"></i>Contact Us
                    </button>
                    <button onclick="saveAgency({{ $agency['id'] }})" class="bg-white bg-opacity-20 backdrop-blur-sm border-2 border-white text-white px-4 py-3 rounded-lg hover:bg-white hover:text-gray-900 transition-colors">
                        <i class="fa-regular fa-heart"></i>
                    </button>
                    <button onclick="shareAgency()" class="bg-white bg-opacity-20 backdrop-blur-sm border-2 border-white text-white px-4 py-3 rounded-lg hover:bg-white hover:text-gray-900 transition-colors">
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
        document.getElementById('booking-form').scrollIntoView({ behavior: 'smooth' });
    }
    
    function contactAgency() {
        document.getElementById('contact-info').scrollIntoView({ behavior: 'smooth' });
    }
    
    function saveAgency(agencyId) {
        Swal.fire({
            icon: 'success',
            title: 'Saved!',
            text: 'Agency added to your favorites',
            confirmButtonColor: '#87CEEB'
        });
    }
    
    function shareAgency() {
        if (navigator.share) {
            navigator.share({
                title: '{{ $agency["name"] }}',
                text: '{{ $agency["tagline"] }}',
                url: window.location.href
            });
        } else {
            Swal.fire({
                title: 'Share this agency',
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