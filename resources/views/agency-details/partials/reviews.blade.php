<!-- Reviews Section -->
<div id="reviews" class="bg-white rounded-xl shadow-sm p-6 md:p-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-900 flex items-center">
            <i class="fa-solid fa-star text-skyblue mr-3"></i>
            Customer Reviews
        </h2>
        <button onclick="writeReview()" class="text-skyblue hover:underline text-sm font-medium">
            <i class="fa-solid fa-pen mr-1"></i>Write Review
        </button>
    </div>
    
    <!-- Rating Summary -->
    <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-lg p-6 mb-6">
        <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
            <div class="text-center">
                <div class="text-5xl font-bold text-gray-900 mb-2">{{ $agency['rating'] }}</div>
                <div class="flex items-center justify-center text-yellow-400 mb-2">
                    @for($i = 0; $i < 5; $i++)
                        <i class="fa-solid fa-star"></i>
                    @endfor
                </div>
                <p class="text-gray-600 text-sm">{{ $agency['reviews_count'] }} reviews</p>
            </div>
            
            <div class="flex-1 w-full">
                @foreach([5, 4, 3, 2, 1] as $star)
                    <div class="flex items-center gap-3 mb-2">
                        <span class="text-sm text-gray-600 w-12">{{ $star }} star</span>
                        <div class="flex-1 bg-gray-200 rounded-full h-2">
                            @php
                                $percentage = [5 => 85, 4 => 10, 3 => 3, 2 => 1, 1 => 1][$star];
                            @endphp
                            <div class="bg-yellow-400 h-2 rounded-full" style="width: {{ $percentage }}%"></div>
                        </div>
                        <span class="text-sm text-gray-600 w-12 text-right">{{ $percentage }}%</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <!-- Reviews List -->
    @php
        $reviews = [
            [
                'name' => 'Sarah Johnson',
                'avatar' => 'https://ui-avatars.com/api/?name=Sarah+Johnson&background=87CEEB&color=fff',
                'rating' => 5,
                'date' => '2 days ago',
                'tour' => 'Golden Samarkand Heritage Tour',
                'review' => 'Absolutely amazing experience! Aziz and his team were professional, knowledgeable, and made our trip unforgettable. The accommodations were excellent and the itinerary was perfectly planned.',
                'helpful' => 24
            ],
            [
                'name' => 'Marco Rossi',
                'avatar' => 'https://ui-avatars.com/api/?name=Marco+Rossi&background=87CEEB&color=fff',
                'rating' => 5,
                'date' => '1 week ago',
                'tour' => 'Silk Road Adventure',
                'review' => 'This was the trip of a lifetime! Every detail was taken care of, and the guides were incredibly knowledgeable about the history and culture. Highly recommend!',
                'helpful' => 18
            ],
            [
                'name' => 'Emma Thompson',
                'avatar' => 'https://ui-avatars.com/api/?name=Emma+Thompson&background=87CEEB&color=fff',
                'rating' => 4,
                'date' => '2 weeks ago',
                'tour' => 'Tashkent City Explorer',
                'review' => 'Great experience overall. The tour was well organized and our guide was friendly. Only minor issue was some delays, but they handled it professionally.',
                'helpful' => 12
            ]
        ];
    @endphp
    
    <div class="space-y-6">
        @foreach($reviews as $review)
            <div class="border-b border-gray-200 pb-6 last:border-b-0">
                <div class="flex items-start gap-4">
                    <img src="{{ $review['avatar'] }}" alt="{{ $review['name'] }}" class="w-12 h-12 rounded-full">
                    <div class="flex-1">
                        <div class="flex items-start justify-between mb-2">
                            <div>
                                <h4 class="font-semibold text-gray-900">{{ $review['name'] }}</h4>
                                <div class="flex items-center gap-2 mt-1">
                                    <div class="flex text-yellow-400 text-sm">
                                        @for($i = 0; $i < 5; $i++)
                                            <i class="fa-solid fa-star{{ $i < $review['rating'] ? '' : ' text-gray-300' }}"></i>
                                        @endfor
                                    </div>
                                    <span class="text-gray-500 text-xs">{{ $review['date'] }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 px-3 py-1 rounded inline-block mb-3">
                            <span class="text-xs text-gray-600"><i class="fa-solid fa-route mr-1"></i>{{ $review['tour'] }}</span>
                        </div>
                        
                        <p class="text-gray-700 text-sm leading-relaxed mb-3">{{ $review['review'] }}</p>
                        
                        <div class="flex items-center gap-4 text-sm">
                            <button class="text-gray-500 hover:text-skyblue transition-colors">
                                <i class="fa-solid fa-thumbs-up mr-1"></i>Helpful ({{ $review['helpful'] }})
                            </button>
                            <button class="text-gray-500 hover:text-skyblue transition-colors">
                                <i class="fa-solid fa-reply mr-1"></i>Reply
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="text-center mt-6">
        <button onclick="loadMoreReviews()" class="text-skyblue hover:underline font-medium">
            Load More Reviews
        </button>
    </div>
</div>

@push('scripts')
<script>
    function writeReview() {
        Swal.fire({
            title: 'Write a Review',
            html: `
                <div class="text-left space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Your Rating</label>
                        <div class="flex gap-2 justify-center text-3xl">
                            <i class="fa-regular fa-star cursor-pointer hover:text-yellow-400" onclick="setRating(1)"></i>
                            <i class="fa-regular fa-star cursor-pointer hover:text-yellow-400" onclick="setRating(2)"></i>
                            <i class="fa-regular fa-star cursor-pointer hover:text-yellow-400" onclick="setRating(3)"></i>
                            <i class="fa-regular fa-star cursor-pointer hover:text-yellow-400" onclick="setRating(4)"></i>
                            <i class="fa-regular fa-star cursor-pointer hover:text-yellow-400" onclick="setRating(5)"></i>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tour Package</label>
                        <select id="reviewTour" class="w-full border border-gray-300 rounded-md px-3 py-2">
                            <option>Golden Samarkand Heritage Tour</option>
                            <option>Silk Road Adventure</option>
                            <option>Tashkent City Explorer</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Your Review</label>
                        <textarea id="reviewText" rows="4" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="Share your experience..."></textarea>
                    </div>
                </div>
            `,
            confirmButtonText: 'Submit Review',
            confirmButtonColor: '#87CEEB',
            showCancelButton: true,
            width: '600px',
            preConfirm: () => {
                const text = document.getElementById('reviewText').value;
                if (!text) {
                    Swal.showValidationMessage('Please write a review');
                    return false;
                }
                return { text };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                showSuccessAlert('Thank you for your review!');
            }
        });
    }
    
    function loadMoreReviews() {
        showSuccessAlert('Loading more reviews...');
    }
</script>
@endpush