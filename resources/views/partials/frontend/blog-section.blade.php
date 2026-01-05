<!-- Blog Section -->
<section id="blog-section" class="py-12 md:py-20 bg-white">
    <div class="container mx-auto px-4 lg:px-6">
        <div class="text-center mb-12 md:mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Travel Stories & Insights</h2>
            <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">
                Discover the hidden gems of Uzbekistan through our curated travel blog posts from local experts and seasoned travelers.
            </p>
        </div>

        <!-- Blog Posts Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @php
                $blogPosts = [
                    [
                        'id' => 1,
                        'title' => 'Complete Guide to Samarkand\'s Registan Square',
                        'excerpt' => 'Discover the architectural masterpiece of Central Asia. Learn about the three madrasas, best visiting times, and hidden details most tourists miss.',
                        'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=800',
                        'category' => 'Travel Guide',
                        'category_color' => 'bg-skyblue',
                        'author' => [
                            'name' => 'Dilnoza Karimova',
                            'role' => 'Local Guide',
                            'avatar' => 'https://ui-avatars.com/api/?name=Dilnoza+Karimova&background=87CEEB&color=fff'
                        ],
                        'date' => 'March 15, 2024',
                        'slug' => 'complete-guide-samarkand-registan-square'
                    ],
                    [
                        'id' => 2,
                        'title' => 'Bukhara\'s Ancient Bazaars: A Shopper\'s Paradise',
                        'excerpt' => 'Navigate through centuries-old trading posts where silk road merchants once gathered. Find authentic crafts, spices, and traditional Uzbek textiles.',
                        'image' => 'https://images.unsplash.com/photo-1590523741831-ab7e8b8f9c7f?w=800',
                        'category' => 'Culture',
                        'category_color' => 'bg-coral',
                        'author' => [
                            'name' => 'Akmal Rakhimov',
                            'role' => 'Travel Writer',
                            'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Rakhimov&background=FF7F50&color=fff'
                        ],
                        'date' => 'March 12, 2024',
                        'slug' => 'bukhara-ancient-bazaars-shoppers-paradise'
                    ],
                    [
                        'id' => 3,
                        'title' => 'Authentic Uzbek Cuisine: Beyond Plov',
                        'excerpt' => 'Explore the rich culinary traditions of Uzbekistan. From manti dumplings to lagman noodles, discover dishes that tell the story of the Silk Road.',
                        'image' => 'https://images.unsplash.com/photo-1604329760661-e71dc83f8f26?w=800',
                        'category' => 'Food',
                        'category_color' => 'bg-yellow-400',
                        'author' => [
                            'name' => 'Sevara Usmanova',
                            'role' => 'Food Blogger',
                            'avatar' => 'https://ui-avatars.com/api/?name=Sevara+Usmanova&background=FFD700&color=000'
                        ],
                        'date' => 'March 10, 2024',
                        'slug' => 'authentic-uzbek-cuisine-beyond-plov'
                    ],
                    [
                        'id' => 4,
                        'title' => 'Khiva: Walking Through a Living Museum',
                        'excerpt' => 'Step into the preserved ancient city of Khiva. Explore its fortress walls, minarets, and discover why this UNESCO site feels frozen in time.',
                        'image' => 'https://images.unsplash.com/photo-1604329760661-e71dc83f8f26?w=800',
                        'category' => 'Adventure',
                        'category_color' => 'bg-skyblue',
                        'author' => [
                            'name' => 'Rustam Nazarov',
                            'role' => 'Adventure Guide',
                            'avatar' => 'https://ui-avatars.com/api/?name=Rustam+Nazarov&background=87CEEB&color=fff'
                        ],
                        'date' => 'March 8, 2024',
                        'slug' => 'khiva-walking-through-living-museum'
                    ],
                    [
                        'id' => 5,
                        'title' => 'Tashkent: Where Modern Meets Traditional',
                        'excerpt' => 'Discover Uzbekistan\'s capital city where Soviet architecture meets Islamic heritage. Navigate the metro, find the best restaurants, and explore hidden gems.',
                        'image' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=800',
                        'category' => 'City Guide',
                        'category_color' => 'bg-coral',
                        'author' => [
                            'name' => 'Nargiza Abdullayeva',
                            'role' => 'City Expert',
                            'avatar' => 'https://ui-avatars.com/api/?name=Nargiza+Abdullayeva&background=FF7F50&color=fff'
                        ],
                        'date' => 'March 5, 2024',
                        'slug' => 'tashkent-modern-meets-traditional'
                    ],
                    [
                        'id' => 6,
                        'title' => 'Master Craftsmen of Uzbekistan',
                        'excerpt' => 'Meet the artisans keeping ancient traditions alive. From ceramic masters in Rishtan to silk weavers in Margilan, discover authentic Uzbek craftsmanship.',
                        'image' => 'https://images.unsplash.com/photo-1582582621959-48d27397dc69?w=800',
                        'category' => 'Crafts',
                        'category_color' => 'bg-yellow-400',
                        'author' => [
                            'name' => 'Bobur Mirzayev',
                            'role' => 'Cultural Expert',
                            'avatar' => 'https://ui-avatars.com/api/?name=Bobur+Mirzayev&background=FFD700&color=000'
                        ],
                        'date' => 'March 3, 2024',
                        'slug' => 'master-craftsmen-of-uzbekistan'
                    ]
                ];
            @endphp

            @foreach($blogPosts as $post)
                <article class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 group">
                    <div class="relative overflow-hidden">
                        <img class="w-full h-56 md:h-64 object-cover group-hover:scale-110 transition-transform duration-500" 
                             src="{{ $post['image'] }}" 
                             alt="{{ $post['title'] }}" />
                        <div class="absolute top-4 left-4 {{ $post['category_color'] }} text-white px-3 py-1 rounded-full text-sm font-medium">
                            {{ $post['category'] }}
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex items-center space-x-3 md:space-x-4 mb-3">
                            <img src="{{ $post['author']['avatar'] }}" 
                                 alt="{{ $post['author']['name'] }}" 
                                 class="w-10 h-10 rounded-full">
                            <div>
                                <p class="font-medium text-gray-900 text-sm">{{ $post['author']['name'] }}</p>
                                <p class="text-xs text-gray-500">{{ $post['author']['role'] }}</p>
                            </div>
                        </div>
                        
                        <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-3 hover:text-skyblue cursor-pointer transition-colors line-clamp-2">
                            {{ $post['title'] }}
                        </h3>
                        
                        <p class="text-sm md:text-base text-gray-600 mb-4 line-clamp-3">
                            {{ $post['excerpt'] }}
                        </p>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-xs md:text-sm text-gray-500">{{ $post['date'] }}</span>
                            <button onclick="readBlogPost({{ $post['id'] }}, '{{ $post['slug'] }}')" 
                                    class="text-skyblue font-medium hover:underline cursor-pointer text-sm md:text-base">
                                Read More →
                            </button>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-8 md:mt-12">
            <button onclick="loadMorePosts()" class="bg-gray-100 text-gray-700 px-6 md:px-8 py-3 rounded-lg font-medium hover:bg-gray-200 transition-colors">
                <i class="fa-solid fa-plus mr-2"></i>Load More Posts
            </button>
        </div>
    </div>
</section>

@push('scripts')
<script>
    function readBlogPost(postId, slug) {
        Swal.fire({
            title: 'Opening Blog Post',
            html: `
                <div class="text-left space-y-4">
                    <p class="text-gray-600">You're about to read this travel story.</p>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-700">In a full application, this would navigate to:</p>
                        <p class="text-sm font-mono text-skyblue mt-2">/blog/${slug}</p>
                    </div>
                </div>
            `,
            icon: 'info',
            confirmButtonText: 'Got it',
            confirmButtonColor: '#87CEEB',
            showCancelButton: true,
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // In production, this would be:
                // window.location.href = `/blog/${slug}`;
                showSuccessAlert('Blog post would open here!');
            }
        });
    }
    
    function loadMorePosts() {
        Swal.fire({
            title: 'Loading More Posts...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
        
        // Simulate loading
        setTimeout(() => {
            Swal.fire({
                icon: 'success',
                title: 'More Posts Loaded!',
                text: '6 new blog posts have been added.',
                confirmButtonColor: '#87CEEB'
            });
        }, 1500);
    }
</script>
@endpush