<!-- Reviews Section -->
<div id="reviews" class="bg-white rounded-xl shadow-sm p-6 md:p-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-900 flex items-center">
            <i class="fa-solid fa-star text-skyblue mr-3"></i>
            Traveler Reviews
        </h2>
        <button onclick="writeGuideReview()" class="text-skyblue hover:underline text-sm font-medium">
            <i class="fa-solid fa-pen mr-1"></i>Write Review
        </button>
    </div>
    
    <!-- Rating Summary -->
    <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-lg p-6 mb-6">
        <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
            <div class="text-center">
                <div class="text-5xl font-bold text-gray-900 mb-2">{{ $guide['rating'] }}</div>
                <div class="flex items-center justify-center text-yellow-400 mb-2">
                    @for($i = 0; $i < 5; $i++)
                        <i class="fa-solid fa-star"></i>
                    @endfor
                </div>
                <p class="text-gray-600 text-sm">{{ $guide['reviews_count'] }} reviews</p>
            </div>
            
            <div class="flex-1 w-full">
                @foreach([5, 4, 3, 2, 1] as $star)
                    <div class="flex items-center gap-3 mb-2">
                        <span class="text-sm text-gray-600 w-12">{{ $star }} star</span>
                        <div class="flex-1 bg-gray-200 rounded-full h-2">
                            @php
                                $percentage = [5 => 88, 4 => 9, 3 => 2, 2 => 1, 1 => 0][$star];
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
                'name' => 'Jennifer Williams',
                'avatar' => 'https://ui-avatars.com/api/?name=Jennifer+Williams&background=87CEEB&color=fff',
                'rating' => 5,
                'date' => '3 days ago',
                'tour' => 'Full-Day Cultural Immersion',
                'review' => 'Akmal is an outstanding guide! His knowledge of Samarkand\'s history is impressive, and he made the tour engaging and fun. The lunch with a local family was a highlight. Highly recommend!',
                'helpful' => 18,
                'images' => 3
            ],
            [
                'name' => 'Thomas Mueller',
                'avatar' => 'https://ui-avatars.com/api/?name=Thomas+Mueller&background=87CEEB&color=fff',
                'rating' => 5,
                'date' => '1 week ago',
                'tour' => 'Photography Golden Hour Tour',
                'review' => 'Perfect for photography enthusiasts! Akmal knew exactly where to go for the best shots and gave great tips. Got amazing photos thanks to him!',
                'helpful' => 15,
                'images' => 5
            ],
            [
                'name' => 'Sophie Dubois',
                'avatar' => 'https://ui-avatars.com/api/?name=Sophie+Dubois&background=87CEEB&color=fff',
                'rating' => 5,
                'date' => '2 weeks ago',
                'tour' => 'Half-Day Samarkand Highlights',
                'review' => 'Amazing experience! Akmal is professional, friendly, and speaks excellent English. He tailored the tour to our interests and we learned so much.',
                'helpful' => 22,
                'images' => 0
            ]
        ];
    @endphp
    
    <div class="space-y-6">
        @foreach($reviews as $review)
            <div class="border-b border-gray-200 pb-6 last:border-b-0">
                <div class="flex items-start gap-4">
                    <img src="{{ $review['avatar'] }}" alt="{{ $review['name'] }}" class="w-12 h-12 rounded-full flex-shrink-0">
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
                        
                        @if($review['images'] > 0)
                            <div class="flex items-center gap-2 mb-3">
                                <button class="text-skyblue text-sm hover:underline">
                                    <i class="fa-solid fa-image mr-1"></i>View {{ $review['images'] }} photos
                                </button>
                            </div>
                        @endif
                        
                        <div class="flex items-center gap-4 text-sm">
                            <button class="text-gray-500 hover:text-skyblue transition-colors">
                                <i class="fa-solid fa-thumbs-up mr-1"></i>Helpful ({{ $review['helpful'] }})
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="text-center mt-6">
        <button onclick="loadMoreGuideReviews()" class="text-skyblue hover:underline font-medium">
            Load More Reviews
        </button>
    </div>
</div>

@push('scripts')
<script>
    function writeGuideReview() {
        Swal.fire({
            title: 'Write a Review for {{ $guide["name"] }}',
            html: `
                <div class="text-left space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Your Rating</label>
                        <div class="flex gap-2 justify-center text-3xl">
                            <i class="fa-regular fa-star cursor-pointer hover:text-yellow-400" onclick="setGuideRating(1)"></i>
                            <i class="fa-regular fa-star cursor-pointer hover:text-yellow-400" onclick="setGuideRating(2)"></i>
                            <i class="fa-regular fa-star cursor-pointer hover:text-yellow-400" onclick="setGuideRating(3)"></i>
                            <i class="fa-regular fa-star cursor-pointer hover:text-yellow-400" onclick="setGuideRating(4)"></i>
                            <i class="fa-regular fa-star cursor-pointer hover:text-yellow-400" onclick="setGuideRating(5)"></i>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tour Experience</label>
                        <select id="guideReviewTour" class="w-full border border-gray-300 rounded-md px-3 py-2">
                            <option>Half-Day Samarkand Highlights</option>
                            <option>Full-Day Cultural Immersion</option>
                            <option>Photography Golden Hour Tour</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Your Review</label>
                        <textarea id="guideReviewText" rows="4" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="Share your experience with this guide..."></textarea>
                    </div>
                </div>
            `,
            confirmButtonText: 'Submit Review',
            confirmButtonColor: '#87CEEB',
            showCancelButton: true,
            width: '600px',
            preConfirm: () => {
                const text = document.getElementById('guideReviewText').value;
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
    
    function loadMoreGuideReviews() {
        showSuccessAlert('Loading more reviews...');
    }
</script>
@endpush