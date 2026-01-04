<!-- How It Works Section -->
<section id="how-it-works" class="py-12 md:py-16 bg-gradient-to-br from-skyblue to-blue-400 text-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-8 md:mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">How AroundUz Works</h2>
            <p class="text-lg md:text-xl opacity-90">Simple steps to your perfect travel experience</p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            @php
                $steps = [
                    [
                        'number' => 1,
                        'icon' => 'search',
                        'title' => 'Search & Browse',
                        'description' => 'Browse through verified local guides and professional travel agents in your desired destination.'
                    ],
                    [
                        'number' => 2,
                        'icon' => 'comments',
                        'title' => 'Connect & Discuss',
                        'description' => 'Message your chosen guide or agent to discuss your preferences and customize your experience.'
                    ],
                    [
                        'number' => 3,
                        'icon' => 'calendar-check',
                        'title' => 'Book & Confirm',
                        'description' => 'Finalize your booking and receive confirmation details for your travel experience.'
                    ],
                    [
                        'number' => 4,
                        'icon' => 'route',
                        'title' => 'Enjoy Your Journey',
                        'description' => 'Experience the magic of Uzbekistan with your local guide or travel agent.'
                    ]
                ];
            @endphp
            
            @foreach($steps as $step)
                <div class="text-center group">
                    <div class="w-16 h-16 md:w-20 md:h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-opacity-30 transition-all duration-300 group-hover:scale-110">
                        <i class="fa-solid fa-{{ $step['icon'] }} text-2xl md:text-3xl"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold mb-3">{{ $step['number'] }}. {{ $step['title'] }}</h3>
                    <p class="opacity-90 text-sm md:text-base">{{ $step['description'] }}</p>
                </div>
            @endforeach
        </div>
        
        <!-- CTA Button -->
        <div class="text-center mt-8 md:mt-12">
            <button onclick="getStarted()" class="bg-white text-skyblue px-6 md:px-8 py-3 md:py-4 rounded-md font-bold text-base md:text-lg hover:bg-gray-100 transition-colors shadow-lg">
                <i class="fa-solid fa-rocket mr-2"></i>Get Started Now
            </button>
        </div>
    </div>
</section>

@push('scripts')
<script>
    function getStarted() {
        Swal.fire({
            title: 'Welcome to AroundUz!',
            html: `
                <div class="text-left space-y-4">
                    <p class="text-gray-600">Let's help you get started with your Uzbekistan journey.</p>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">What are you looking for?</label>
                        <select id="startType" class="w-full border border-gray-300 rounded-md px-3 py-2">
                            <option value="guide">A Local Guide</option>
                            <option value="agent">A Travel Agent</option>
                            <option value="both">Both Guide & Agent</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">When are you planning to travel?</label>
                        <input type="date" id="startDate" class="w-full border border-gray-300 rounded-md px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Which cities interest you?</label>
                        <select id="startCity" class="w-full border border-gray-300 rounded-md px-3 py-2">
                            <option value="">Select a city</option>
                            <option value="tashkent">Tashkent</option>
                            <option value="samarkand">Samarkand</option>
                            <option value="bukhara">Bukhara</option>
                            <option value="khiva">Khiva</option>
                            <option value="all">Multiple Cities</option>
                        </select>
                    </div>
                </div>
            `,
            confirmButtonText: 'Find Matches',
            confirmButtonColor: '#87CEEB',
            showCancelButton: true,
            width: '600px',
            preConfirm: () => {
                const type = document.getElementById('startType').value;
                const date = document.getElementById('startDate').value;
                const city = document.getElementById('startCity').value;
                
                if (!date || !city) {
                    Swal.showValidationMessage('Please fill all fields');
                    return false;
                }
                
                return { type, date, city };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Finding Perfect Matches...',
                    html: 'Searching through our database',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                setTimeout(() => {
                    Swal.close();
                    showSuccessAlert('Found 12 perfect matches for your preferences!');
                    
                    // Redirect to appropriate section
                    if (result.value.type === 'guide') {
                        document.getElementById('guides-tab').click();
                    } else if (result.value.type === 'agent') {
                        document.getElementById('agents-tab').click();
                    }
                    
                    // Scroll to section
                    setTimeout(() => {
                        document.getElementById('local-guides-section').scrollIntoView({ behavior: 'smooth' });
                    }, 500);
                }, 1500);
            }
        });
    }
</script>
@endpush