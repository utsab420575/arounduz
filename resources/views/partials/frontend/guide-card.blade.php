@php
    $statusColors = [
        'online' => 'bg-green-500',
        'busy' => 'bg-yellow-500',
        'offline' => 'bg-red-500'
    ];
    $statusText = [
        'online' => 'Online',
        'busy' => 'Busy',
        'offline' => 'Offline'
    ];
@endphp

<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
    <div class="relative">
        <img class="w-full h-48 object-cover" src="{{ $guide['image'] }}" alt="{{ $guide['name'] }}">

        <!-- Status Badge -->
        <div class="absolute top-3 left-3">
            <span class="{{ $statusColors[$guide['status']] }} text-white px-2 py-1 rounded-md text-xs font-medium">
                <i class="fa-solid fa-circle text-xs mr-1"></i>{{ $statusText[$guide['status']] }}
            </span>
        </div>

        <!-- Favorite Button -->
        <div class="absolute top-3 right-3">
            <button onclick="toggleFavorite({{ $guide['id'] }}, 'guide')" id="favorite-guide-{{ $guide['id'] }}" class="bg-white bg-opacity-80 p-2 rounded-md hover:bg-opacity-100 transition-all">
                <i class="fa-{{ $guide['favorite'] ? 'solid' : 'regular' }} fa-heart text-{{ $guide['favorite'] ? 'coral' : 'gray-600' }}"></i>
            </button>
        </div>

        <!-- Rating Badge -->
        <div class="absolute bottom-3 left-3">
            <div class="flex items-center space-x-1 bg-black bg-opacity-50 text-white px-2 py-1 rounded-md text-xs">
                <i class="fa-solid fa-star text-yellow-400"></i>
                <span>{{ $guide['rating'] }}</span>
                <span>({{ $guide['reviews'] }})</span>
            </div>
        </div>
    </div>

    <div class="p-4">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center space-x-2">
                <img src="{{ $guide['avatar'] }}" alt="{{ $guide['name'] }}" class="w-8 h-8 rounded-full">
                <div>
                    <h3 class="font-semibold text-gray-900 text-sm lg:text-base">{{ $guide['name'] }}</h3>
                    <p class="text-xs text-gray-500">{{ $guide['location'] }}</p>
                </div>
            </div>
            <div class="text-right">
                <p class="text-coral font-bold text-sm lg:text-base">{{ $guide['price'] }} UZS/hr</p>
                <p class="text-xs text-gray-500">from</p>
            </div>
        </div>

        <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ $guide['description'] }}</p>

        <div class="flex flex-wrap gap-1 mb-3">
            @foreach($guide['tags'] as $tag)
                <span class="bg-skyblue bg-opacity-20 text-skyblue px-2 py-1 rounded-md text-xs">{{ $tag }}</span>
            @endforeach
        </div>

        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center space-x-2 text-xs text-gray-500">
                <i class="fa-solid fa-language"></i>
                <span>{{ $guide['languages'] }} Languages</span>
            </div>
            <div class="flex items-center space-x-2 text-xs text-gray-500">
                <i class="fa-solid fa-clock"></i>
                <span>{{ $guide['experience'] }} years exp</span>
            </div>
        </div>

        <div class="border-t border-gray-100 pt-4">
            @if($guide['status'] === 'offline')
                <div class="bg-gradient-to-r from-gray-100 to-gray-200 rounded-lg p-3 text-center">
                    <i class="fa-solid fa-moon text-gray-400 text-lg mb-1 block"></i>
                    <p class="text-xs font-medium text-gray-500">Currently Offline</p>
                </div>
            @else
                <div class="space-y-2">
                    <button onclick="bookGuide({{ $guide['id'] }})" class="w-full bg-gradient-to-r from-skyblue via-blue-500 to-blue-600 text-white py-3 px-4 rounded-lg font-semibold hover:shadow-lg transition-all duration-300 transform hover:scale-[1.02] flex items-center justify-center group">
                        <i class="fa-solid fa-calendar-check mr-2 group-hover:scale-110 transition-transform"></i>
                        Book This Guide
                    </button>

                    <div class="grid grid-cols-3 gap-2">
                        <button onclick="viewGuideProfile({{ $guide['id'] }})" class="bg-white border border-gray-200 hover:border-skyblue text-gray-700 hover:text-skyblue py-2.5 rounded-lg transition-all duration-300 text-center group">
                            <i class="fa-solid fa-user text-sm group-hover:scale-110 transition-transform inline-block"></i>
                            <span class="block text-xs font-medium mt-1">Profile</span>
                        </button>

                        <button onclick="messageGuide({{ $guide['id'] }})" class="bg-white border border-gray-200 hover:border-blue-400 text-gray-700 hover:text-blue-600 py-2.5 rounded-lg transition-all duration-300 group">
                            <i class="fa-solid fa-message text-sm group-hover:scale-110 transition-transform inline-block"></i>
                            <span class="block text-xs font-medium mt-1">Chat</span>
                        </button>

                        <button onclick="toggleFavorite({{ $guide['id'] }}, 'guide')" class="bg-white border border-gray-200 hover:border-red-300 text-gray-700 hover:text-red-500 py-2.5 rounded-lg transition-all duration-300 group">
                            <i class="fa-{{ $guide['favorite'] ? 'solid' : 'regular' }} fa-heart text-sm group-hover:scale-110 transition-transform inline-block text-{{ $guide['favorite'] ? 'coral' : 'gray-600' }}"></i>
                            <span class="block text-xs font-medium mt-1">Save</span>
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@once
    @push('scripts')
        <script>
            function viewGuideProfile(guideId) {
                Swal.fire({
                    title: 'Guide Profile',
                    html: `
                <div class="text-left space-y-4">
                    <p class="text-gray-600">Viewing detailed profile for Guide ID: <strong>${guideId}</strong></p>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-700">In a full application, this would show:</p>
                        <ul class="text-sm text-gray-600 mt-2 space-y-1 list-disc list-inside">
                            <li>Complete guide biography</li>
                            <li>Tour specializations</li>
                            <li>Photo gallery</li>
                            <li>Customer reviews</li>
                            <li>Available dates calendar</li>
                            <li>Certifications & awards</li>
                        </ul>
                    </div>
                </div>
            `,
                    icon: 'info',
                    confirmButtonText: 'Got it',
                    confirmButtonColor: '#87CEEB',
                    width: '600px'
                });
            }

            function toggleFavorite(id, type) {
                const btns = document.querySelectorAll(`#favorite-${type}-${id}`);

                btns.forEach(btn => {
                    const icon = btn.querySelector('i');

                    if (icon.classList.contains('fa-regular')) {
                        icon.classList.remove('fa-regular', 'text-gray-600');
                        icon.classList.add('fa-solid', 'text-coral');
                    } else {
                        icon.classList.remove('fa-solid', 'text-coral');
                        icon.classList.add('fa-regular', 'text-gray-600');
                    }
                });

                const icon = document.querySelector(`#favorite-${type}-${id} i`);
                if (icon.classList.contains('fa-solid')) {
                    showSuccessAlert('Added to favorites!');
                } else {
                    showSuccessAlert('Removed from favorites!');
                }

                // Here you would send AJAX request to Laravel backend
                // Example:
                // fetch('/api/favorites', {
                //     method: 'POST',
                //     headers: {'Content-Type': 'application/json'},
                //     body: JSON.stringify({type, id})
                // });
            }

            function bookGuide(guideId) {
                Swal.fire({
                    title: 'Book This Guide',
                    html: `
                <div class="text-left space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Select Date</label>
                        <input type="date" id="bookingDate" min="${new Date().toISOString().split('T')[0]}" class="w-full border border-gray-300 rounded-md px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Duration (hours)</label>
                        <input type="number" id="bookingDuration" min="1" max="12" value="4" class="w-full border border-gray-300 rounded-md px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Number of People</label>
                        <input type="number" id="bookingPeople" min="1" max="20" value="2" class="w-full border border-gray-300 rounded-md px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Special Requests (Optional)</label>
                        <textarea id="bookingNotes" rows="3" placeholder="Any special requirements or preferences..." class="w-full border border-gray-300 rounded-md px-3 py-2"></textarea>
                    </div>
                </div>
            `,
                    confirmButtonText: 'Confirm Booking',
                    confirmButtonColor: '#87CEEB',
                    showCancelButton: true,
                    width: '600px',
                    preConfirm: () => {
                        const date = document.getElementById('bookingDate').value;
                        const duration = document.getElementById('bookingDuration').value;
                        const people = document.getElementById('bookingPeople').value;
                        const notes = document.getElementById('bookingNotes').value;

                        if (!date) {
                            Swal.showValidationMessage('Please select a date');
                            return false;
                        }

                        return { guideId, date, duration, people, notes };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Send booking request to Laravel backend
                        Swal.fire({
                            icon: 'success',
                            title: 'Booking Request Sent!',
                            html: `
                        <p>Your booking request has been sent to the guide.</p>
                        <p class="text-sm text-gray-600 mt-2">You will receive a confirmation email once the guide accepts your request.</p>
                    `,
                            confirmButtonColor: '#87CEEB'
                        });
                    }
                });
            }

            function messageGuide(guideId) {
                Swal.fire({
                    title: 'Send Message to Guide',
                    html: `
                <div class="text-left space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Your Message</label>
                        <textarea id="messageText" rows="5" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="Hello! I'm interested in booking a tour with you..."></textarea>
                    </div>
                    <p class="text-xs text-gray-500">The guide will receive your message via email and can respond directly.</p>
                </div>
            `,
                    confirmButtonText: 'Send Message',
                    confirmButtonColor: '#87CEEB',
                    showCancelButton: true,
                    width: '600px',
                    preConfirm: () => {
                        const message = document.getElementById('messageText').value;
                        if (!message || message.trim().length < 10) {
                            Swal.showValidationMessage('Please enter a message (at least 10 characters)');
                            return false;
                        }
                        return { guideId, message };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Message Sent!',
                            text: 'The guide will respond to you shortly.',
                            confirmButtonColor: '#87CEEB'
                        });
                    }
                });
            }
        </script>
    @endpush
@endonce
