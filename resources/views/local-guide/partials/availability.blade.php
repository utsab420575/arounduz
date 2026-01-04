<!-- Availability Calendar - Modern Design -->
<div id="availability" class="bg-white rounded-xl shadow-sm p-6 md:p-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-900 flex items-center">
            <i class="fa-solid fa-calendar-days text-skyblue mr-3"></i>
            Availability Calendar
        </h2>
        <div class="flex items-center gap-2">
            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium flex items-center">
                <i class="fa-solid fa-circle text-green-500 mr-1 text-xs animate-pulse"></i>
                Available Now
            </span>
        </div>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- Calendar Section -->
        <div class="lg:col-span-8">
            <!-- Custom Calendar Header -->
            <div class="bg-gradient-to-r from-skyblue to-blue-500 rounded-t-xl p-4">
                <div class="flex items-center justify-between text-white">
                    <button onclick="previousMonth()" class="w-10 h-10 rounded-lg hover:bg-white hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <div class="text-center">
                        <h3 class="text-xl font-bold" id="currentMonth">November 2024</h3>
                        <p class="text-sm opacity-90">Select your preferred date</p>
                    </div>
                    <button onclick="nextMonth()" class="w-10 h-10 rounded-lg hover:bg-white hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
            </div>
            
            <!-- Flatpickr Calendar Container -->
            <div class="bg-white rounded-b-xl border-2 border-gray-100 p-4">
                <input type="text" id="availability-calendar" class="hidden">
                <div id="calendar-inline"></div>
            </div>
            
            <!-- Quick Date Selection -->
            <div class="mt-6 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl p-6">
                <h4 class="font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fa-solid fa-bolt text-skyblue mr-2"></i>
                    Quick Book
                </h4>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    <button onclick="selectDate('today')" class="bg-white hover:bg-skyblue hover:text-white border-2 border-gray-200 hover:border-skyblue rounded-lg p-3 transition-all duration-300 group">
                        <i class="fa-solid fa-calendar-day text-skyblue group-hover:text-white mb-2 block"></i>
                        <p class="text-sm font-semibold">Today</p>
                        <p class="text-xs text-gray-500 group-hover:text-white">Nov 13</p>
                    </button>
                    
                    <button onclick="selectDate('tomorrow')" class="bg-white hover:bg-skyblue hover:text-white border-2 border-gray-200 hover:border-skyblue rounded-lg p-3 transition-all duration-300 group">
                        <i class="fa-solid fa-calendar-plus text-skyblue group-hover:text-white mb-2 block"></i>
                        <p class="text-sm font-semibold">Tomorrow</p>
                        <p class="text-xs text-gray-500 group-hover:text-white">Nov 14</p>
                    </button>
                    
                    <button onclick="selectDate('this-weekend')" class="bg-white hover:bg-skyblue hover:text-white border-2 border-gray-200 hover:border-skyblue rounded-lg p-3 transition-all duration-300 group">
                        <i class="fa-solid fa-calendar-week text-skyblue group-hover:text-white mb-2 block"></i>
                        <p class="text-sm font-semibold">Weekend</p>
                        <p class="text-xs text-gray-500 group-hover:text-white">Nov 16-17</p>
                    </button>
                    
                    <button onclick="selectDate('next-week')" class="bg-white hover:bg-skyblue hover:text-white border-2 border-gray-200 hover:border-skyblue rounded-lg p-3 transition-all duration-300 group">
                        <i class="fa-solid fa-calendar-arrow-up text-skyblue group-hover:text-white mb-2 block"></i>
                        <p class="text-sm font-semibold">Next Week</p>
                        <p class="text-xs text-gray-500 group-hover:text-white">Nov 18+</p>
                    </button>
                </div>
            </div>
            
            <!-- Booking Policies -->
            <div class="mt-6 bg-white border-2 border-blue-100 rounded-xl p-6">
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-shield-check text-blue-600"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-3">Flexible Booking Policy</h4>
                        <div class="space-y-2 text-sm text-gray-600">
                            <div class="flex items-start gap-2">
                                <i class="fa-solid fa-check text-green-500 mt-1"></i>
                                <span><strong class="text-gray-900">Free cancellation</strong> up to 24 hours before the tour</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <i class="fa-solid fa-check text-green-500 mt-1"></i>
                                <span><strong class="text-gray-900">Instant confirmation</strong> for available dates</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <i class="fa-solid fa-check text-green-500 mt-1"></i>
                                <span><strong class="text-gray-900">Flexible rescheduling</strong> subject to availability</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <i class="fa-solid fa-check text-green-500 mt-1"></i>
                                <span><strong class="text-gray-900">No booking fees</strong> - pay only the guide rate</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sidebar -->
        <div class="lg:col-span-4 space-y-6">
            <!-- Legend Card -->
            <div class="bg-gradient-to-br from-gray-50 to-blue-50 rounded-xl p-6 border-2 border-gray-100">
                <h3 class="font-bold text-gray-900 mb-4 flex items-center">
                    <i class="fa-solid fa-circle-info text-skyblue mr-2"></i>
                    Availability Legend
                </h3>
                <div class="space-y-3">
                    <div class="flex items-center gap-3 p-2 bg-white rounded-lg">
                        <div class="w-8 h-8 bg-gradient-to-br from-green-400 to-green-500 rounded-lg flex items-center justify-center shadow-md">
                            <i class="fa-solid fa-check text-white text-xs"></i>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-900">Available</p>
                            <p class="text-xs text-gray-500">Book instantly</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3 p-2 bg-white rounded-lg">
                        <div class="w-8 h-8 bg-gradient-to-br from-yellow-400 to-orange-400 rounded-lg flex items-center justify-center shadow-md">
                            <i class="fa-solid fa-clock text-white text-xs"></i>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-900">Limited Slots</p>
                            <p class="text-xs text-gray-500">Few hours left</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3 p-2 bg-white rounded-lg">
                        <div class="w-8 h-8 bg-gradient-to-br from-red-400 to-red-500 rounded-lg flex items-center justify-center shadow-md">
                            <i class="fa-solid fa-times text-white text-xs"></i>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-900">Fully Booked</p>
                            <p class="text-xs text-gray-500">Not available</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3 p-2 bg-white rounded-lg">
                        <div class="w-8 h-8 bg-gradient-to-br from-gray-300 to-gray-400 rounded-lg flex items-center justify-center shadow-md">
                            <i class="fa-solid fa-ban text-white text-xs"></i>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-900">Unavailable</p>
                            <p class="text-xs text-gray-500">Day off</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Next 7 Days Quick View -->
            <div class="bg-white rounded-xl border-2 border-gray-100 p-6">
                <h3 class="font-bold text-gray-900 mb-4 flex items-center">
                    <i class="fa-solid fa-calendar-days text-skyblue mr-2"></i>
                    Next 7 Days
                </h3>
                <div class="space-y-2" id="next-7-days">
                    <!-- Dynamic content will be inserted here -->
                </div>
            </div>
            
            <!-- Popular Time Slots -->
            <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl border-2 border-purple-100 p-6">
                <h3 class="font-bold text-gray-900 mb-4 flex items-center">
                    <i class="fa-solid fa-clock text-purple-600 mr-2"></i>
                    Popular Time Slots
                </h3>
                <div class="space-y-2">
                    <button onclick="selectTimeSlot('morning')" class="w-full text-left p-3 bg-white hover:bg-purple-100 rounded-lg transition-all duration-300 border-2 border-transparent hover:border-purple-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-semibold text-gray-900 text-sm">Morning Tours</p>
                                <p class="text-xs text-gray-600">9:00 AM - 12:00 PM</p>
                            </div>
                            <i class="fa-solid fa-sun text-orange-500"></i>
                        </div>
                    </button>
                    
                    <button onclick="selectTimeSlot('afternoon')" class="w-full text-left p-3 bg-white hover:bg-purple-100 rounded-lg transition-all duration-300 border-2 border-transparent hover:border-purple-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-semibold text-gray-900 text-sm">Afternoon Tours</p>
                                <p class="text-xs text-gray-600">2:00 PM - 5:00 PM</p>
                            </div>
                            <i class="fa-solid fa-cloud-sun text-blue-500"></i>
                        </div>
                    </button>
                    
                    <button onclick="selectTimeSlot('sunset')" class="w-full text-left p-3 bg-white hover:bg-purple-100 rounded-lg transition-all duration-300 border-2 border-transparent hover:border-purple-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-semibold text-gray-900 text-sm">Golden Hour</p>
                                <p class="text-xs text-gray-600">5:00 PM - 7:00 PM</p>
                            </div>
                            <i class="fa-solid fa-camera text-pink-500"></i>
                        </div>
                    </button>
                </div>
            </div>
            
            <!-- Book Button -->
            <button onclick="scrollToBooking()" class="w-full bg-gradient-to-r from-skyblue via-blue-500 to-blue-600 text-white py-4 rounded-xl font-bold text-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                <i class="fa-solid fa-calendar-check mr-2"></i>
                Book Selected Date
            </button>
        </div>
    </div>
</div>

@push('styles')
<style>
    /* Custom Flatpickr Styles */
    .flatpickr-calendar {
        width: 100% !important;
        box-shadow: none !important;
        border: none !important;
    }
    
    .flatpickr-months {
        display: none !important;
    }
    
    .flatpickr-weekdays {
        background: linear-gradient(135deg, #87CEEB 0%, #4A90E2 100%);
        padding: 12px 0;
        border-radius: 8px;
        margin-bottom: 8px;
    }
    
    .flatpickr-weekday {
        color: white !important;
        font-weight: 600;
        font-size: 14px;
    }
    
    .flatpickr-days {
        width: 100% !important;
    }
    
    .dayContainer {
        width: 100% !important;
        min-width: 100% !important;
        max-width: 100% !important;
    }
    
    .flatpickr-day {
        max-width: 14.28% !important;
        height: 48px !important;
        line-height: 48px !important;
        border-radius: 8px !important;
        margin: 2px !important;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
    }
    
    .flatpickr-day:hover {
        background: #87CEEB !important;
        color: white !important;
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(135, 206, 235, 0.4);
    }
    
    .flatpickr-day.today {
        border: 2px solid #87CEEB !important;
        font-weight: bold;
    }
    
    .flatpickr-day.selected {
        background: linear-gradient(135deg, #87CEEB 0%, #4A90E2 100%) !important;
        color: white !important;
        box-shadow: 0 4px 12px rgba(135, 206, 235, 0.5);
        transform: scale(1.1);
    }
    
    .flatpickr-day.disabled {
        color: #cbd5e1 !important;
        background: #f1f5f9 !important;
        cursor: not-allowed !important;
    }
    
    /* Custom availability colors */
    .flatpickr-day.available {
        background: linear-gradient(135deg, #10B981 0%, #059669 100%) !important;
        color: white !important;
    }
    
    .flatpickr-day.limited {
        background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%) !important;
        color: white !important;
    }
    
    .flatpickr-day.booked {
        background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%) !important;
        color: white !important;
        cursor: not-allowed !important;
    }
</style>
@endpush

@push('scripts')
<script>
    let calendarInstance;
    
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize calendar
        calendarInstance = flatpickr("#availability-calendar", {
            inline: true,
            appendTo: document.getElementById('calendar-inline'),
            minDate: "today",
            mode: "single",
            disable: [
                // Booked dates
                "2024-11-15",
                "2024-11-20",
                "2024-11-25"
            ],
            onChange: function(selectedDates, dateStr, instance) {
                handleDateSelection(selectedDates, dateStr);
            },
            onDayCreate: function(dObj, dStr, fp, dayElem) {
                const date = dayElem.dateObj;
                const dateStr = date.toISOString().split('T')[0];
                
                // Remove default classes
                dayElem.classList.remove('available', 'limited', 'booked');
                
                // Add custom availability classes
                if (dateStr === "2024-11-15" || dateStr === "2024-11-20" || dateStr === "2024-11-25") {
                    dayElem.classList.add('booked');
                    dayElem.innerHTML = dayElem.innerHTML + '<br><i class="fa-solid fa-times text-xs"></i>';
                } else if (dateStr === "2024-11-18" || dateStr === "2024-11-22") {
                    dayElem.classList.add('limited');
                    dayElem.innerHTML = dayElem.innerHTML + '<br><i class="fa-solid fa-clock text-xs"></i>';
                } else if (date >= new Date()) {
                    dayElem.classList.add('available');
                    dayElem.innerHTML = dayElem.innerHTML + '<br><i class="fa-solid fa-check text-xs"></i>';
                }
            }
        });
        
        // Generate next 7 days
        generateNext7Days();
        
        // Update current month display
        updateMonthDisplay();
    });
    
    function handleDateSelection(selectedDates, dateStr) {
        if (selectedDates.length > 0) {
            const date = new Date(dateStr);
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const formattedDate = date.toLocaleDateString('en-US', options);
            
            Swal.fire({
                title: 'Book This Date?',
                html: `
                    <div class="text-left space-y-4">
                        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-lg p-4 border-2 border-blue-200">
                            <p class="text-sm text-gray-600 mb-1">Selected Date</p>
                            <p class="text-lg font-bold text-gray-900">${formattedDate}</p>
                        </div>
                        <p class="text-sm text-gray-600">Choose your preferred time slot:</p>
                        <div class="space-y-2">
                            <button onclick="bookDateTime('${dateStr}', 'morning')" class="w-full text-left p-3 bg-white hover:bg-blue-50 rounded-lg border-2 border-gray-200 hover:border-skyblue transition-all">
                                <div class="flex items-center justify-between">
                                    <span class="font-semibold">Morning (9:00 AM - 12:00 PM)</span>
                                    <i class="fa-solid fa-sun text-orange-500"></i>
                                </div>
                            </button>
                            <button onclick="bookDateTime('${dateStr}', 'afternoon')" class="w-full text-left p-3 bg-white hover:bg-blue-50 rounded-lg border-2 border-gray-200 hover:border-skyblue transition-all">
                                <div class="flex items-center justify-between">
                                    <span class="font-semibold">Afternoon (2:00 PM - 5:00 PM)</span>
                                    <i class="fa-solid fa-cloud-sun text-blue-500"></i>
                                </div>
                            </button>
                            <button onclick="bookDateTime('${dateStr}', 'sunset')" class="w-full text-left p-3 bg-white hover:bg-blue-50 rounded-lg border-2 border-gray-200 hover:border-skyblue transition-all">
                                <div class="flex items-center justify-between">
                                    <span class="font-semibold">Golden Hour (5:00 PM - 7:00 PM)</span>
                                    <i class="fa-solid fa-camera text-pink-500"></i>
                                </div>
                            </button>
                        </div>
                    </div>
                `,
                showCancelButton: true,
                showConfirmButton: false,
                cancelButtonText: 'Cancel',
                width: '600px'
            });
        }
    }
    
    function bookDateTime(date, timeSlot) {
        Swal.close();
        
        // Set the date in booking form
        const dateInput = document.getElementById('guide-tour-date');
        if (dateInput) {
            dateInput.value = date;
        }
        
        // Set time slot
        const timeMapping = {
            'morning': '09:00',
            'afternoon': '14:00',
            'sunset': '17:00'
        };
        
        const timeInput = document.querySelector('select[name="start_time"]');
        if (timeInput) {
            timeInput.value = timeMapping[timeSlot];
        }
        
        // Scroll to booking form
        scrollToBooking();
        
        showSuccessAlert(`Date selected: ${date} (${timeSlot})`);
    }
    
    function generateNext7Days() {
        const container = document.getElementById('next-7-days');
        const today = new Date();
        
        let html = '';
        for (let i = 0; i < 7; i++) {
            const date = new Date(today);
            date.setDate(today.getDate() + i);
            
            const dayName = date.toLocaleDateString('en-US', { weekday: 'short' });
            const dayNum = date.getDate();
            const month = date.toLocaleDateString('en-US', { month: 'short' });
            
            // Simulate availability
            const statuses = ['available', 'available', 'limited', 'available', 'booked', 'available', 'available'];
            const status = statuses[i];
            
            const statusConfig = {
                'available': { color: 'green', icon: 'check', text: 'Available' },
                'limited': { color: 'yellow', icon: 'clock', text: 'Limited' },
                'booked': { color: 'red', icon: 'times', text: 'Booked' }
            };
            
            const config = statusConfig[status];
            
            html += `
                <div class="flex items-center justify-between p-3 bg-white hover:bg-gray-50 rounded-lg border-2 border-gray-100 hover:border-${config.color}-200 transition-all cursor-pointer">
                    <div class="flex items-center gap-3">
                        <div class="text-center">
                            <p class="text-xs text-gray-500 font-medium">${dayName}</p>
                            <p class="text-lg font-bold text-gray-900">${dayNum}</p>
                            <p class="text-xs text-gray-500">${month}</p>
                        </div>
                        <div class="h-8 w-px bg-gray-200"></div>
                        <div>
                            <p class="text-sm font-semibold text-gray-900">${i === 0 ? 'Today' : i === 1 ? 'Tomorrow' : dayName}</p>
                            <p class="text-xs text-gray-500">${date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' })}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="px-2 py-1 bg-${config.color}-100 text-${config.color}-700 rounded-full text-xs font-medium">
                            ${config.text}
                        </span>
                        <i class="fa-solid fa-${config.icon} text-${config.color}-500"></i>
                    </div>
                </div>
            `;
        }
        
        container.innerHTML = html;
    }
    
    function selectDate(type) {
        const today = new Date();
        let targetDate;
        
        switch(type) {
            case 'today':
                targetDate = today;
                break;
            case 'tomorrow':
                targetDate = new Date(today);
                targetDate.setDate(today.getDate() + 1);
                break;
            case 'this-weekend':
                targetDate = new Date(today);
                const daysUntilSaturday = 6 - today.getDay();
                targetDate.setDate(today.getDate() + daysUntilSaturday);
                break;
            case 'next-week':
                targetDate = new Date(today);
                targetDate.setDate(today.getDate() + 7);
                break;
        }
        
        if (calendarInstance) {
            calendarInstance.setDate(targetDate);
        }
    }
    
    function selectTimeSlot(slot) {
        showSuccessAlert(`Time slot selected: ${slot}`);
    }
    
    function previousMonth() {
        if (calendarInstance) {
            calendarInstance.changeMonth(-1);
            updateMonthDisplay();
        }
    }
    
    function nextMonth() {
        if (calendarInstance) {
            calendarInstance.changeMonth(1);
            updateMonthDisplay();
        }
    }
    
    function updateMonthDisplay() {
        if (calendarInstance) {
            const currentDate = calendarInstance.currentYear + '-' + String(calendarInstance.currentMonth + 1).padStart(2, '0') + '-01';
            const date = new Date(currentDate);
            const monthName = date.toLocaleDateString('en-US', { month: 'long', year: 'numeric' });
            document.getElementById('currentMonth').textContent = monthName;
        }
    }
</script>
@endpush