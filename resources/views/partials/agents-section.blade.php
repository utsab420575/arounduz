<!-- Travel Agents Section -->
<section id="travel-agents-section" class="py-8 lg:py-12 bg-gray-50 hidden">
    <div class="container mx-auto px-4">
        <div class="mb-6 lg:mb-8">
            <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-2">Travel Agents for Uzbekistan</h2>
            <p class="text-gray-600">Professional travel agents ready to plan your perfect journey through Uzbekistan</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6">
            @foreach($agents ?? [] as $agent)
                @include('partials.agent-card', ['agent' => $agent])
            @endforeach
            
            <!-- Static Demo Cards -->
            @include('partials.agent-card', [
                'agent' => [
                    'id' => 1,
                    'name' => 'Dilnoza Azimova',
                    'title' => 'Silk Road Specialist',
                    'location' => 'Tashkent, Uzbekistan',
                    'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=600',
                    'avatar' => 'https://ui-avatars.com/api/?name=Dilnoza+Azimova&background=87CEEB&color=fff',
                    'rating' => 4.9,
                    'reviews' => 156,
                    'consultation_fee' => '750k',
                    'status' => 'available',
                    'description' => 'Luxury travel specialist with 12 years of experience crafting bespoke journeys along the Silk Road. Expert in historical tours and cultural immersion.',
                    'tags' => ['Luxury Travel', 'Silk Road', 'History', 'Culture'],
                    'specialties' => [
                        ['icon' => 'landmark', 'text' => 'UNESCO Sites'],
                        ['icon' => 'users', 'text' => '500+ Clients'],
                        ['icon' => 'clock', 'text' => '12 Years Exp'],
                        ['icon' => 'language', 'text' => '4 Languages']
                    ],
                    'favorite' => false
                ]
            ])
            
            @include('partials.agent-card', [
                'agent' => [
                    'id' => 2,
                    'name' => 'Sardor Makhmudov',
                    'title' => 'Adventure Travel Expert',
                    'location' => 'Tashkent, Uzbekistan',
                    'image' => 'https://images.unsplash.com/photo-1556157382-97eda2d62296?w=600',
                    'avatar' => 'https://ui-avatars.com/api/?name=Sardor+Makhmudov&background=87CEEB&color=fff',
                    'rating' => 4.8,
                    'reviews' => 203,
                    'consultation_fee' => '650k',
                    'status' => 'busy',
                    'description' => 'Adventure and outdoor specialist focusing on trekking in the Tian Shan mountains, yurt stays, and desert expeditions.',
                    'tags' => ['Adventure', 'Hiking', 'Mountains', 'Yurt Stays'],
                    'specialties' => [
                        ['icon' => 'mountain', 'text' => 'Chimgan Expert'],
                        ['icon' => 'users', 'text' => '350+ Clients'],
                        ['icon' => 'clock', 'text' => '8 Years Exp'],
                        ['icon' => 'language', 'text' => '3 Languages']
                    ],
                    'favorite' => false
                ]
            ])
            
            @include('partials.agent-card', [
                'agent' => [
                    'id' => 3,
                    'name' => 'Lola Khamidova',
                    'title' => 'Family Travel Specialist',
                    'location' => 'Tashkent, Uzbekistan',
                    'image' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=600',
                    'avatar' => 'https://ui-avatars.com/api/?name=Lola+Khamidova&background=87CEEB&color=fff',
                    'rating' => 5.0,
                    'reviews' => 89,
                    'consultation_fee' => '550k',
                    'status' => 'available',
                    'description' => 'Family vacation expert specializing in kid-friendly tours of Uzbekistan\'s historic cities, including craft workshops and cultural shows.',
                    'tags' => ['Family Travel', 'Workshops', 'Kid-Friendly', 'Educational'],
                    'specialties' => [
                        ['icon' => 'child', 'text' => 'Safe & Fun'],
                        ['icon' => 'users', 'text' => '275+ Families'],
                        ['icon' => 'clock', 'text' => '6 Years Exp'],
                        ['icon' => 'language', 'text' => '2 Languages']
                    ],
                    'favorite' => true
                ]
            ])
            
            @include('partials.agent-card', [
                'agent' => [
                    'id' => 4,
                    'name' => 'Bekzod Ibragimov',
                    'title' => 'Corporate Travel Manager',
                    'location' => 'Tashkent, Uzbekistan',
                    'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600',
                    'avatar' => 'https://ui-avatars.com/api/?name=Bekzod+Ibragimov&background=87CEEB&color=fff',
                    'rating' => 4.7,
                    'reviews' => 312,
                    'consultation_fee' => '950k',
                    'status' => 'available',
                    'description' => 'Corporate travel specialist managing business trips, conferences, and MICE events in Uzbekistan.',
                    'tags' => ['Business Travel', 'Corporate', 'Conferences', 'MICE'],
                    'specialties' => [
                        ['icon' => 'building', 'text' => '50+ Companies'],
                        ['icon' => 'users', 'text' => '1000+ Travelers'],
                        ['icon' => 'clock', 'text' => '15 Years Exp'],
                        ['icon' => 'language', 'text' => '3 Languages']
                    ],
                    'favorite' => false
                ]
            ])
            
            @include('partials.agent-card', [
                'agent' => [
                    'id' => 5,
                    'name' => 'Sevara Nazarova',
                    'title' => 'Cultural Heritage Expert',
                    'location' => 'Samarkand, Uzbekistan',
                    'image' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=600',
                    'avatar' => 'https://ui-avatars.com/api/?name=Sevara+Nazarova&background=87CEEB&color=fff',
                    'rating' => 4.9,
                    'reviews' => 167,
                    'consultation_fee' => '700k',
                    'status' => 'offline',
                    'description' => 'Cultural and heritage travel specialist focusing on UNESCO sites, museums, and archaeological sites across Uzbekistan.',
                    'tags' => ['Cultural', 'UNESCO Sites', 'Archaeology', 'Museums'],
                    'specialties' => [
                        ['icon' => 'landmark', 'text' => 'All UNESCO Sites'],
                        ['icon' => 'users', 'text' => '420+ Clients'],
                        ['icon' => 'clock', 'text' => '9 Years Exp'],
                        ['icon' => 'language', 'text' => '5 Languages']
                    ],
                    'favorite' => false
                ]
            ])
            
            @include('partials.agent-card', [
                'agent' => [
                    'id' => 6,
                    'name' => 'Javohir Saidov',
                    'title' => 'Budget Travel Specialist',
                    'location' => 'Tashkent, Uzbekistan',
                    'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=600',
                    'avatar' => 'https://ui-avatars.com/api/?name=Javohir+Saidov&background=87CEEB&color=fff',
                    'rating' => 4.6,
                    'reviews' => 245,
                    'consultation_fee' => '350k',
                    'status' => 'available',
                    'description' => 'Budget travel expert specializing in backpacking, hostels, and affordable adventures across Uzbekistan.',
                    'tags' => ['Budget Travel', 'Backpacking', 'Hostels', 'Trains'],
                    'specialties' => [
                        ['icon' => 'coins', 'text' => 'Budget Expert'],
                        ['icon' => 'users', 'text' => '600+ Travelers'],
                        ['icon' => 'clock', 'text' => '5 Years Exp'],
                        ['icon' => 'language', 'text' => '3 Languages']
                    ],
                    'favorite' => false
                ]
            ])
            
            @include('partials.agent-card', [
                'agent' => [
                    'id' => 7,
                    'name' => 'Madina Usmanova',
                    'title' => 'Gastronomy Tour Specialist',
                    'location' => 'Bukhara, Uzbekistan',
                    'image' => 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?w=600',
                    'avatar' => 'https://ui-avatars.com/api/?name=Madina+Usmanova&background=87CEEB&color=fff',
                    'rating' => 4.8,
                    'reviews' => 112,
                    'consultation_fee' => '600k',
                    'status' => 'available',
                    'description' => 'Food travel expert designing culinary journeys through Uzbekistan. Discover the best plov, samsa, and bazaar foods with local insights.',
                    'tags' => ['Food Tours', 'Plov', 'Bazaars', 'Cooking Classes'],
                    'specialties' => [
                        ['icon' => 'utensils', 'text' => 'Culinary Expert'],
                        ['icon' => 'users', 'text' => '250+ Foodies'],
                        ['icon' => 'clock', 'text' => '7 Years Exp'],
                        ['icon' => 'language', 'text' => '3 Languages']
                    ],
                    'favorite' => false
                ]
            ])
            
            @include('partials.agent-card', [
                'agent' => [
                    'id' => 8,
                    'name' => 'Otabek Rasulov',
                    'title' => 'Photography Tour Planner',
                    'location' => 'Samarkand, Uzbekistan',
                    'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=600',
                    'avatar' => 'https://ui-avatars.com/api/?name=Otabek+Rasulov&background=87CEEB&color=fff',
                    'rating' => 4.9,
                    'reviews' => 95,
                    'consultation_fee' => '800k',
                    'status' => 'available',
                    'description' => 'Professional photographer curating bespoke photo tours to capture the magic of Uzbekistan\'s architecture, landscapes, and people.',
                    'tags' => ['Photography', 'Architecture', 'Portraits', 'Landscapes'],
                    'specialties' => [
                        ['icon' => 'camera-retro', 'text' => 'Photo Expert'],
                        ['icon' => 'users', 'text' => '150+ Photographers'],
                        ['icon' => 'clock', 'text' => '10 Years Exp'],
                        ['icon' => 'language', 'text' => '2 Languages']
                    ],
                    'favorite' => true
                ]
            ])
        </div>
    </div>
</section>