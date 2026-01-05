<!-- Local Guides Section -->
<section id="local-guides-section" class="py-8 lg:py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="mb-6 lg:mb-8">
            <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-2">Local Guides in Uzbekistan</h2>
            <p class="text-gray-600">Connect with passionate locals who know their cities inside and out</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 lg:gap-6">
            @foreach($guides ?? [] as $guide)
                @include('partials.frontend.guide-card', ['guide' => $guide])
            @endforeach

            <!-- Static Demo Cards -->
            @include('partials.frontend.guide-card', [
                'guide' => [
                    'id' => 1,
                    'name' => 'Nodira Karimova',
                    'location' => 'Samarkand, Uzbekistan',
                    'image' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400',
                    'avatar' => 'https://ui-avatars.com/api/?name=Nodira+Karimova&background=87CEEB&color=fff',
                    'rating' => 4.9,
                    'reviews' => 127,
                    'price' => '450k',
                    'status' => 'online',
                    'description' => 'Historian specializing in Timurid architecture and Silk Road history. Fluent in English, Russian, and Uzbek.',
                    'tags' => ['History', 'Architecture', 'Silk Road'],
                    'languages' => 3,
                    'experience' => 5,
                    'favorite' => false
                ]
            ])

            @include('partials.frontend.guide-card', [
                'guide' => [
                    'id' => 2,
                    'name' => 'Timur Yusupov',
                    'location' => 'Bukhara, Uzbekistan',
                    'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400',
                    'avatar' => 'https://ui-avatars.com/api/?name=Timur+Yusupov&background=87CEEB&color=fff',
                    'rating' => 4.8,
                    'reviews' => 203,
                    'price' => '380k',
                    'status' => 'busy',
                    'description' => 'Cultural expert offering authentic experiences in ancient madrasahs, bazaars, and local workshops.',
                    'tags' => ['Culture', 'Food Tours', 'Crafts'],
                    'languages' => 2,
                    'experience' => 8,
                    'favorite' => false
                ]
            ])

            @include('partials.frontend.guide-card', [
                'guide' => [
                    'id' => 3,
                    'name' => 'Gulnara Aliyeva',
                    'location' => 'Khiva, Uzbekistan',
                    'image' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=400',
                    'avatar' => 'https://ui-avatars.com/api/?name=Gulnara+Aliyeva&background=87CEEB&color=fff',
                    'rating' => 5.0,
                    'reviews' => 89,
                    'price' => '420k',
                    'status' => 'online',
                    'description' => 'Storyteller of Khiva\'s open-air museum, specializing in the history of Khorezm and its legends.',
                    'tags' => ['History', 'Storytelling', 'Itchan Kala'],
                    'languages' => 4,
                    'experience' => 6,
                    'favorite' => true
                ]
            ])

            @include('partials.frontend.guide-card', [
                'guide' => [
                    'id' => 4,
                    'name' => 'Ruslan Akhmedov',
                    'location' => 'Tashkent, Uzbekistan',
                    'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400',
                    'avatar' => 'https://ui-avatars.com/api/?name=Ruslan+Akhmedov&background=87CEEB&color=fff',
                    'rating' => 4.7,
                    'reviews' => 156,
                    'price' => '500k',
                    'status' => 'online',
                    'description' => 'Tashkent expert offering a blend of Soviet history and modern city life, from metro tours to plov centers.',
                    'tags' => ['City Tours', 'Soviet History', 'Food'],
                    'languages' => 2,
                    'experience' => 4,
                    'favorite' => false
                ]
            ])

            @include('partials.frontend.guide-card', [
                'guide' => [
                    'id' => 5,
                    'name' => 'Zarina Ismailova',
                    'location' => 'Fergana Valley, UZB',
                    'image' => 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?w=400',
                    'avatar' => 'https://ui-avatars.com/api/?name=Zarina+Ismailova&background=87CEEB&color=fff',
                    'rating' => 4.9,
                    'reviews' => 234,
                    'price' => '480k',
                    'status' => 'offline',
                    'description' => 'Specialist in Fergana Valley\'s rich craft traditions, from Rishtan ceramics to Margilan silk weaving.',
                    'tags' => ['Crafts', 'Ceramics', 'Silk'],
                    'languages' => 3,
                    'experience' => 10,
                    'favorite' => false
                ]
            ])

            @include('partials.frontend.guide-card', [
                'guide' => [
                    'id' => 6,
                    'name' => 'Aziz Sultanov',
                    'location' => 'Chimgan, Uzbekistan',
                    'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=400',
                    'avatar' => 'https://ui-avatars.com/api/?name=Aziz+Sultanov&background=87CEEB&color=fff',
                    'rating' => 4.8,
                    'reviews' => 178,
                    'price' => '520k',
                    'status' => 'online',
                    'description' => 'Mountain guide for hiking, trekking, and skiing in the Chimgan and Tian Shan mountain ranges.',
                    'tags' => ['Hiking', 'Mountains', 'Adventure'],
                    'languages' => 2,
                    'experience' => 7,
                    'favorite' => false
                ]
            ])

            @include('partials.frontend.guide-card', [
                'guide' => [
                    'id' => 7,
                    'name' => 'Kamola Rakhimova',
                    'location' => 'Samarkand, Uzbekistan',
                    'image' => 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?w=400',
                    'avatar' => 'https://ui-avatars.com/api/?name=Kamola+Rakhimova&background=87CEEB&color=fff',
                    'rating' => 4.9,
                    'reviews' => 145,
                    'price' => '460k',
                    'status' => 'online',
                    'description' => 'Photography tour specialist helping you capture the stunning beauty of Uzbekistan\'s architecture.',
                    'tags' => ['Photography', 'Architecture', 'Art'],
                    'languages' => 3,
                    'experience' => 5,
                    'favorite' => true
                ]
            ])

            @include('partials.frontend.guide-card', [
                'guide' => [
                    'id' => 8,
                    'name' => 'Alisher Usmanov',
                    'location' => 'Karakalpakstan, UZB',
                    'image' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=400',
                    'avatar' => 'https://ui-avatars.com/api/?name=Alisher+Usmanov&background=87CEEB&color=fff',
                    'rating' => 4.7,
                    'reviews' => 92,
                    'price' => '410k',
                    'status' => 'busy',
                    'description' => 'Off-road adventure expert for tours to the Aral Sea ship graveyard and Savitsky Museum.',
                    'tags' => ['Adventure', 'Aral Sea', 'Off-road'],
                    'languages' => 2,
                    'experience' => 3,
                    'favorite' => false
                ]
            ])
        </div>
    </div>
</section>
