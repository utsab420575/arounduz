<!-- Team Section -->
<div id="team" class="bg-white rounded-xl shadow-sm p-6 md:p-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
        <i class="fa-solid fa-users text-skyblue mr-3"></i>
        Meet Our Team
    </h2>
    
    @php
        $teamMembers = [
            [
                'name' => 'Aziz Karimov',
                'role' => 'CEO & Founder',
                'image' => 'https://ui-avatars.com/api/?name=Aziz+Karimov&background=0ea5e9&color=fff&size=200',
                'bio' => '15+ years of experience in tourism industry',
                'languages' => ['English', 'Russian', 'Uzbek']
            ],
            [
                'name' => 'Malika Yusupova',
                'role' => 'Senior Tour Guide',
                'image' => 'https://ui-avatars.com/api/?name=Malika+Yusupova&background=0ea5e9&color=fff&size=200',
                'bio' => 'Specialist in Silk Road history and culture',
                'languages' => ['English', 'German', 'Uzbek']
            ],
            [
                'name' => 'Rustam Nazarov',
                'role' => 'Operations Manager',
                'image' => 'https://ui-avatars.com/api/?name=Rustam+Nazarov&background=0ea5e9&color=fff&size=200',
                'bio' => 'Expert in logistics and customer service',
                'languages' => ['English', 'Russian']
            ],
            [
                'name' => 'Dilnoza Abdullayeva',
                'role' => 'Tour Coordinator',
                'image' => 'https://ui-avatars.com/api/?name=Dilnoza+Abdullayeva&background=0ea5e9&color=fff&size=200',
                'bio' => 'Passionate about creating memorable experiences',
                'languages' => ['English', 'French', 'Uzbek']
            ]
        ];
    @endphp
    
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        @foreach($teamMembers as $member)
            <div class="bg-gray-50 rounded-lg p-6 hover:shadow-md transition-shadow">
                <div class="flex items-start gap-4">
                    <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="w-20 h-20 rounded-full object-cover">
                    <div class="flex-1">
                        <h3 class="font-bold text-gray-900 text-lg">{{ $member['name'] }}</h3>
                        <p class="text-skyblue text-sm mb-2">{{ $member['role'] }}</p>
                        <p class="text-gray-600 text-sm mb-3">{{ $member['bio'] }}</p>
                        <div class="flex items-center gap-1">
                            @foreach($member['languages'] as $lang)
                                <span class="bg-white px-2 py-1 rounded text-xs text-gray-600">{{ $lang }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>