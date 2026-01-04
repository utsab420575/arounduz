@php
    $statusColors = [
        'available' => 'bg-green-500',
        'busy' => 'bg-yellow-500',
        'offline' => 'bg-red-500'
    ];
@endphp

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300">
    <div class="flex flex-col md:flex-row">
        <!-- Image Section -->
        <div class="md:w-1/3 relative">
            <img class="w-full h-48 md:h-full object-cover md:min-h-[250px]" src="{{ $agent['image'] }}" alt="{{ $agent['name'] }}">
            <div class="absolute top-3 left-3">
                <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-medium">AGENCY</span>
            </div>
        </div>
        
        <!-- Content Section -->
        <div class="md:w-2/3 p-4 md:p-6">
            <div class="flex items-start justify-between mb-3">
                <div class="flex-1">
                    <h4 class="text-lg md:text-xl font-bold text-gray-800 flex items-center flex-wrap gap-2">
                        {{ $agent['name'] }}
                        @if($agent['verified'])
                            <i class="fa-solid fa-shield-check text-green-500"></i>
                        @endif
                    </h4>
                    <div class="flex items-center text-sm text-gray-600 mt-1 flex-wrap gap-2">
                        <div class="flex items-center">
                            <i class="fa-solid fa-star text-amber-400 mr-1"></i>
                            <span class="font-medium">{{ $agent['rating'] }}</span>
                        </div>
                        <span class="hidden sm:inline">•</span>
                        <span>{{ $agent['reviews'] }} reviews</span>
                        <span class="hidden sm:inline">•</span>
                        <span>Est. {{ $agent['established'] }}</span>
                    </div>
                </div>
                <button onclick="toggleFavorite({{ $agent['id'] }}, 'agent')" id="favorite-agent-{{ $agent['id'] }}" class="ml-2 text-gray-400 hover:text-red-500 transition-colors flex-shrink-0">
                    <i class="fa-{{ $agent['favorite'] ? 'solid text-red-500' : 'regular' }} fa-heart text-lg"></i>
                </button>
            </div>
            
            <p class="text-sm text-gray-600 mb-4">{{ $agent['description'] }}</p>
            
            <div class="grid grid-cols-2 gap-3 md:gap-4 mb-4 text-sm">
                @foreach($agent['features'] as $feature)
                    <div class="flex items-center text-gray-600">
                        <i class="fa-solid fa-{{ $feature['icon'] }} mr-2 text-skyblue flex-shrink-0"></i>
                        <span>{{ $feature['text'] }}</span>
                    </div>
                @endforeach
            </div>
            
            <div class="flex flex-wrap gap-2 mb-4">
                @foreach($agent['tags'] as $tag)
                    <span class="bg-skyblue bg-opacity-20 text-skyblue px-3 py-1 rounded-full text-xs md:text-sm font-medium">{{ $tag }}</span>
                @endforeach
            </div>
            
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                <div>
                    <span class="text-sm text-gray-500">Tours from</span>
                    <div class="text-xl md:text-2xl font-bold text-gray-800">${{ $agent['price_from'] }}/day</div>
                </div>
                <div class="flex gap-2 w-full sm:w-auto">
                    <button onclick="viewAgencyTours({{ $agent['id'] }})" class="flex-1 sm:flex-none bg-skyblue text-white px-4 md:px-6 py-2 rounded-lg hover:bg-blue-400 transition-colors font-medium text-sm">
                        View Tours
                    </button>
                    <button onclick="messageAgent({{ $agent['id'] }})" class="px-3 py-2 border border-gray-300 rounded-lg hover:border-skyblue transition-colors">
                        <i class="fa-regular fa-message"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@once
@push('scripts')
<script>
    function viewAgencyTours(agentId) {
        Swal.fire({
            title: 'Available Tours',
            html: `
                <div class="text-left space-y-4">
                    <p class="text-gray-600">Browse through available tour packages from this agency.</p>
                    <div class="space-y-3">
                        <div class="p-4 border border-gray-200 rounded-lg hover:border-skyblue cursor-pointer">
                            <h4 class="font-semibold text-gray-800">Classic Silk Road Tour</h4>
                            <p class="text-sm text-gray-600">7 days • Tashkent, Samarkand, Bukhara</p>
                            <p class="text-skyblue font-bold mt-2">$850/person</p>
                        </div>
                        <div class="p-4 border border-gray-200 rounded-lg hover:border-skyblue cursor-pointer">
                            <h4 class="font-semibold text-gray-800">Uzbekistan Highlights</h4>
                            <p class="text-sm text-gray-600">5 days • Main cities tour</p>
                            <p class="text-skyblue font-bold mt-2">$650/person</p>
                        </div>
                        <div class="p-4 border border-gray-200 rounded-lg hover:border-skyblue cursor-pointer">
                            <h4 class="font-semibold text-gray-800">Cultural Deep Dive</h4>
                            <p class="text-sm text-gray-600">10 days • Extended tour</p>
                            <p class="text-skyblue font-bold mt-2">$1,200/person</p>
                        </div>
                    </div>
                </div>
            `,
            confirmButtonText: 'Close',
            confirmButtonColor: '#87CEEB',
            width: '600px'
        });
    }
</script>
@endpush
@endonce