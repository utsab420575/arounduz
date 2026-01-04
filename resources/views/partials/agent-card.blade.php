@php
    $statusColors = [
        'available' => 'bg-green-500',
        'busy' => 'bg-yellow-500',
        'offline' => 'bg-red-500'
    ];
    $statusText = [
        'available' => 'Available',
        'busy' => 'Busy',
        'offline' => 'Offline'
    ];
@endphp

<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
    <div class="relative">
        <img class="w-full h-48 md:h-56 object-cover" src="{{ $agent['image'] }}" alt="{{ $agent['name'] }}">
        
        <!-- Status Badge -->
        <div class="absolute top-4 left-4">
            <span class="{{ $statusColors[$agent['status']] }} text-white px-3 py-1 rounded-md text-sm font-medium">
                <i class="fa-solid fa-circle text-xs mr-1"></i>{{ $statusText[$agent['status']] }}
            </span>
        </div>
        
        <!-- Favorite Button -->
        <div class="absolute top-4 right-4">
            <button onclick="toggleFavorite({{ $agent['id'] }}, 'agent')" id="favorite-agent-{{ $agent['id'] }}" class="bg-white bg-opacity-90 p-2 rounded-md hover:bg-opacity-100 transition-all">
                <i class="fa-{{ $agent['favorite'] ? 'solid' : 'regular' }} fa-bookmark text-{{ $agent['favorite'] ? 'coral' : 'gray-600' }}"></i>
            </button>
        </div>
    </div>
    
    <div class="p-4 md:p-6">
        <div class="flex items-start justify-between mb-4">
            <div class="flex items-center space-x-3 flex-1">
                <img src="{{ $agent['avatar'] }}" alt="{{ $agent['name'] }}" class="w-10 h-10 md:w-12 md:h-12 rounded-full flex-shrink-0">
                <div class="flex-1 min-w-0">
                    <h3 class="font-bold text-base md:text-lg text-gray-900 truncate">{{ $agent['name'] }}</h3>
                    <p class="text-xs md:text-sm text-gray-500 truncate">{{ $agent['title'] }}</p>
                    <div class="flex items-center space-x-1 mt-1">
                        <div class="flex text-yellow-400">
                            @for($i = 0; $i < floor($agent['rating']); $i++)
                                <i class="fa-solid fa-star text-xs"></i>
                            @endfor
                            @if($agent['rating'] - floor($agent['rating']) >= 0.5)
                                <i class="fa-solid fa-star-half-alt text-xs"></i>
                            @endif
                        </div>
                        <span class="text-xs text-gray-500">({{ $agent['rating'] }} • {{ $agent['reviews'] }} reviews)</span>
                    </div>
                </div>
            </div>
            <div class="text-right ml-3 flex-shrink-0">
                <p class="text-coral font-bold text-base md:text-lg">{{ $agent['consultation_fee'] }} UZS</p>
                <p class="text-xs text-gray-500">consultation fee</p>
            </div>
        </div>
        
        <p class="text-sm text-gray-600 mb-4 line-clamp-3">{{ $agent['description'] }}</p>
        
        <div class="flex flex-wrap gap-2 mb-4">
            @foreach($agent['tags'] as $tag)
                <span class="bg-skyblue bg-opacity-20 text-skyblue px-2 md:px-3 py-1 rounded-md text-xs md:text-sm">{{ $tag }}</span>
            @endforeach
        </div>
        
        <div class="grid grid-cols-2 gap-3 md:gap-4 mb-4 text-xs md:text-sm">
            @foreach($agent['specialties'] as $specialty)
                <div class="flex items-center space-x-2 text-gray-600">
                    <i class="fa-solid fa-{{ $specialty['icon'] }}"></i>
                    <span>{{ $specialty['text'] }}</span>
                </div>
            @endforeach
        </div>
        
        <div class="border-t border-gray-100 pt-4">
    @if($agent['status'] === 'offline')
        <!-- Offline State -->
        <div class="bg-gray-100 rounded-lg p-4 mb-3 text-center">
            <i class="fa-solid fa-moon text-gray-400 text-2xl mb-2 block"></i>
            <p class="text-sm font-semibold text-gray-600">Currently Offline</p>
            <p class="text-xs text-gray-500 mt-1">Check back during business hours</p>
        </div>
        <div class="grid grid-cols-2 gap-2">
            <a href="{{ route('agency.details', $agent['id']) }}" class="bg-white border-2 border-skyblue text-skyblue py-2.5 rounded-lg font-semibold hover:bg-skyblue hover:text-white transition-all duration-300 text-center text-sm">
                <i class="fa-solid fa-building mr-1"></i>View Agency
            </a>
            <button onclick="scheduleCallback({{ $agent['id'] }})" class="bg-skyblue text-white py-2.5 rounded-lg font-semibold hover:bg-blue-500 transition-all duration-300 text-sm">
                <i class="fa-solid fa-clock mr-1"></i>Schedule Call
            </button>
        </div>
    @elseif($agent['status'] === 'busy')
        <!-- Busy State -->
        <div class="bg-orange-50 border-2 border-orange-200 rounded-lg p-4 mb-3 text-center">
            <i class="fa-solid fa-calendar-xmark text-orange-500 text-2xl mb-2 block"></i>
            <p class="text-sm font-semibold text-orange-700">Fully Booked Today</p>
            <p class="text-xs text-orange-600 mt-1">Next available: Tomorrow</p>
        </div>
        <div class="grid grid-cols-2 gap-2">
            <a href="{{ route('agency.details', $agent['id']) }}" class="bg-white border-2 border-skyblue text-skyblue py-2.5 rounded-lg font-semibold hover:bg-skyblue hover:text-white transition-all duration-300 text-center text-sm">
                <i class="fa-solid fa-building mr-1"></i>View Agency
            </a>
            <button onclick="joinWaitlist({{ $agent['id'] }})" class="bg-orange-500 text-white py-2.5 rounded-lg font-semibold hover:bg-orange-600 transition-all duration-300 text-sm">
                <i class="fa-solid fa-list mr-1"></i>Join Waitlist
            </button>
        </div>
    @else
        <!-- Available State -->
        <div class="space-y-2">
            <!-- Primary Action -->
            <button onclick="bookConsultation({{ $agent['id'] }})" class="w-full bg-gradient-to-r from-skyblue to-blue-500 text-white py-3 rounded-lg font-bold hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                <i class="fa-solid fa-calendar-check mr-2"></i>Book Consultation
            </button>
            
            <!-- Secondary Actions -->
            <div class="grid grid-cols-3 gap-2">
                <a href="{{ route('agency.details', $agent['id']) }}" class="bg-white border-2 border-gray-200 hover:border-skyblue text-gray-700 hover:text-skyblue py-2.5 rounded-lg transition-all duration-300 text-center group">
                    <i class="fa-solid fa-building text-sm group-hover:scale-110 transition-transform inline-block"></i>
                    <span class="block text-xs font-medium mt-1">Agency</span>
                </a>
                
                <button onclick="callAgent({{ $agent['id'] }})" class="bg-white border-2 border-gray-200 hover:border-green-400 text-gray-700 hover:text-green-600 py-2.5 rounded-lg transition-all duration-300 group">
                    <i class="fa-solid fa-phone text-sm group-hover:scale-110 transition-transform inline-block"></i>
                    <span class="block text-xs font-medium mt-1">Call</span>
                </button>
                
                <button onclick="emailAgent({{ $agent['id'] }})" class="bg-white border-2 border-gray-200 hover:border-blue-400 text-gray-700 hover:text-blue-600 py-2.5 rounded-lg transition-all duration-300 group">
                    <i class="fa-solid fa-envelope text-sm group-hover:scale-110 transition-transform inline-block"></i>
                    <span class="block text-xs font-medium mt-1">Email</span>
                </button>
            </div>
            
        </div>
    @endif
</div>
    </div>
</div>


@push('scripts')
<script>
    function bookConsultation(agentId) {
        Swal.fire({
            title: 'Book Consultation',
            html: `
                <div class="text-left space-y-4">
                    <p class="text-gray-600 text-sm">Schedule a free consultation with this travel agency.</p>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Your Name</label>
                        <input type="text" id="consultName" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="Full name">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="consultEmail" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="your@email.com">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                        <input type="tel" id="consultPhone" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="+998 XX XXX XX XX">
                    </div>
                    
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Preferred Date</label>
                            <input type="date" id="consultDate" class="w-full border border-gray-300 rounded-md px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Time</label>
                            <select id="consultTime" class="w-full border border-gray-300 rounded-md px-3 py-2">
                                <option>09:00 AM</option>
                                <option>10:00 AM</option>
                                <option>11:00 AM</option>
                                <option>02:00 PM</option>
                                <option>03:00 PM</option>
                                <option>04:00 PM</option>
                            </select>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Travel Plans</label>
                        <textarea id="consultMessage" rows="3" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="Tell us about your travel plans..."></textarea>
                    </div>
                </div>
            `,
            confirmButtonText: 'Book Consultation',
            confirmButtonColor: '#87CEEB',
            showCancelButton: true,
            width: '600px'
        }).then((result) => {
            if (result.isConfirmed) {
                showSuccessAlert('Consultation booked! The agency will contact you shortly.');
            }
        });
    }
    
    function scheduleCallback(agentId) {
        Swal.fire({
            title: 'Schedule Callback',
            html: `
                <div class="text-left space-y-4">
                    <p class="text-gray-600 text-sm">Request a callback when the agency is available.</p>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Your Phone</label>
                        <input type="tel" id="callbackPhone" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="+998 XX XXX XX XX">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Best Time to Call</label>
                        <select id="callbackTime" class="w-full border border-gray-300 rounded-md px-3 py-2">
                            <option>Morning (9 AM - 12 PM)</option>
                            <option>Afternoon (12 PM - 5 PM)</option>
                            <option>Evening (5 PM - 8 PM)</option>
                        </select>
                    </div>
                </div>
            `,
            confirmButtonText: 'Schedule',
            confirmButtonColor: '#87CEEB',
            showCancelButton: true
        }).then((result) => {
            if (result.isConfirmed) {
                showSuccessAlert('Callback scheduled! The agency will call you back.');
            }
        });
    }
    
    function joinWaitlist(agentId) {
        Swal.fire({
            title: 'Join Waitlist',
            html: `
                <div class="text-left space-y-4">
                    <p class="text-gray-600 text-sm">Get notified when this agency has availability.</p>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="waitlistEmail" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="your@email.com">
                    </div>
                </div>
            `,
            confirmButtonText: 'Join Waitlist',
            confirmButtonColor: '#F97316',
            showCancelButton: true
        }).then((result) => {
            if (result.isConfirmed) {
                showSuccessAlert('Added to waitlist! We\'ll notify you when slots open up.');
            }
        });
    }
    
    function callAgent(agentId) {
        Swal.fire({
            title: 'Call Agency',
            html: `
                <div class="text-center">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-phone text-green-600 text-3xl"></i>
                    </div>
                    <p class="text-gray-700 mb-4">Call this agency directly</p>
                    <a href="tel:+998901234567" class="inline-block bg-green-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-600 transition-colors">
                        <i class="fa-solid fa-phone mr-2"></i>+998 90 123 4567
                    </a>
                </div>
            `,
            showConfirmButton: false,
            showCloseButton: true
        });
    }
    
    function emailAgent(agentId) {
        Swal.fire({
            title: 'Send Email',
            html: `
                <div class="text-left space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Your Email</label>
                        <input type="email" id="emailFrom" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="your@email.com">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                        <input type="text" id="emailSubject" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="Tour Inquiry">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                        <textarea id="emailMessage" rows="4" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="Your message..."></textarea>
                    </div>
                </div>
            `,
            confirmButtonText: 'Send Email',
            confirmButtonColor: '#87CEEB',
            showCancelButton: true,
            width: '600px'
        }).then((result) => {
            if (result.isConfirmed) {
                showSuccessAlert('Email sent successfully!');
            }
        });
    }
    
    function sendWhatsApp(agentId) {
        const phone = '998901234567'; // Replace with actual phone
        const message = encodeURIComponent('Hello, I am interested in your travel services. Can you provide more information?');
        window.open(`https://wa.me/${phone}?text=${message}`, '_blank');
    }
</script>
@endpush