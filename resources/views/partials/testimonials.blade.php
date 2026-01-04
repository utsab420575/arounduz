<!-- Testimonials Section -->
<section id="testimonials-section" class="py-12 md:py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-8 md:mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">What Our Travelers Say</h2>
            <p class="text-lg md:text-xl text-gray-600">Real experiences from travelers in Uzbekistan</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @php
                $testimonials = [
                    [
                        'name' => 'Jennifer Walsh',
                        'trip' => 'Traveled to Samarkand',
                        'avatar' => 'https://ui-avatars.com/api/?name=Jennifer+Walsh&background=87CEEB&color=fff',
                        'rating' => 5,
                        'text' => 'Nodira\'s tour of Samarkand was the highlight of our trip. Her passion for Timurid history made the ancient city come alive. Absolutely unforgettable!'
                    ],
                    [
                        'name' => 'Mark Rodriguez',
                        'trip' => 'Family Trip across Uzbekistan',
                        'avatar' => 'https://ui-avatars.com/api/?name=Mark+Rodriguez&background=87CEEB&color=fff',
                        'rating' => 5,
                        'text' => 'Dilnoza planned the perfect Silk Road journey for our family. Every detail was seamless, from the high-speed trains to the boutique hotels.'
                    ],
                    [
                        'name' => 'Amanda Chen',
                        'trip' => 'Cultural Tour in Bukhara',
                        'avatar' => 'https://ui-avatars.com/api/?name=Amanda+Chen&background=87CEEB&color=fff',
                        'rating' => 5,
                        'text' => 'Timur\'s tour of the Bukhara bazaar was incredible. We tasted local delicacies and found beautiful crafts we never would have discovered on our own.'
                    ]
                ];
            @endphp
            
            @foreach($testimonials as $testimonial)
                <div class="bg-gray-50 rounded-lg p-6 md:p-8 text-center hover:shadow-lg transition-shadow">
                    <div class="flex justify-center mb-4">
                        <div class="flex text-yellow-400 text-lg md:text-xl">
                            @for($i = 0; $i < $testimonial['rating']; $i++)
                                <i class="fa-solid fa-star"></i>
                            @endfor
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 italic text-sm md:text-base">"{{ $testimonial['text'] }}"</p>
                    <div class="flex items-center justify-center">
                        <img src="{{ $testimonial['avatar'] }}" alt="{{ $testimonial['name'] }}" class="w-12 h-12 rounded-full mr-4">
                        <div class="text-left">
                            <h4 class="font-semibold text-gray-900">{{ $testimonial['name'] }}</h4>
                            <p class="text-sm text-gray-500">{{ $testimonial['trip'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Add Testimonial Button -->
        <div class="text-center mt-8 md:mt-12">
            <button onclick="addTestimonial()" class="bg-skyblue text-white px-6 md:px-8 py-3 rounded-md font-semibold hover:bg-blue-400 transition-colors">
                <i class="fa-solid fa-star mr-2"></i>Share Your Experience
            </button>
        </div>
    </div>
</section>

@push('scripts')
<script>
    function addTestimonial() {
        Swal.fire({
            title: 'Share Your Experience',
            html: `
                <div class="text-left space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Your Name</label>
                        <input type="text" id="testimonialName" class="w-full border border-gray-300 rounded-md px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Trip Type</label>
                        <input type="text" id="testimonialTrip" placeholder="e.g., Family trip to Samarkand" class="w-full border border-gray-300 rounded-md px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Rating</label>
                        <select id="testimonialRating" class="w-full border border-gray-300 rounded-md px-3 py-2">
                            <option value="5">⭐⭐⭐⭐⭐ (5 stars)</option>
                            <option value="4">⭐⭐⭐⭐ (4 stars)</option>
                            <option value="3">⭐⭐⭐ (3 stars)</option>
                            <option value="2">⭐⭐ (2 stars)</option>
                            <option value="1">⭐ (1 star)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Your Review</label>
                        <textarea id="testimonialText" rows="4" placeholder="Share your experience..." class="w-full border border-gray-300 rounded-md px-3 py-2"></textarea>
                    </div>
                </div>
            `,
            confirmButtonText: 'Submit Review',
            confirmButtonColor: '#87CEEB',
            showCancelButton: true,
            width: '600px',
            preConfirm: () => {
                const name = document.getElementById('testimonialName').value;
                const trip = document.getElementById('testimonialTrip').value;
                const rating = document.getElementById('testimonialRating').value;
                const text = document.getElementById('testimonialText').value;
                
                if (!name || !trip || !text) {
                    Swal.showValidationMessage('Please fill all fields');
                    return false;
                }
                
                return { name, trip, rating, text };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Thank You!',
                    text: 'Your review has been submitted successfully.',
                    confirmButtonColor: '#87CEEB'
                });
            }
        });
    }
</script>
@endpush