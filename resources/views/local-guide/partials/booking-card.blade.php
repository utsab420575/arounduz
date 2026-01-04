<!-- Booking Card -->
<div id="booking-card" class="bg-white rounded-xl shadow-sm p-6 sticky top-24">
    <div class="bg-gradient-to-r from-skyblue to-blue-500 text-white rounded-lg p-4 mb-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm opacity-90">Starting from</p>
                <p class="text-3xl font-bold">${{ $guide['hourly_rate'] }}</p>
                <p class="text-sm opacity-90">per hour</p>
            </div>
            <div class="text-right">
                <p class="text-sm opacity-90">Full day</p>
                <p class="text-2xl font-bold">${{ $guide['daily_rate'] }}</p>
                <p class="text-sm opacity-90">per day</p>
            </div>
        </div>
    </div>
    
    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
        <i class="fa-solid fa-calendar-check text-skyblue mr-2"></i>
        Book {{ explode(' ', $guide['name'])[0] }}
    </h3>
    
    <form onsubmit="submitGuideBooking(event)" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tour Date</label>
            <input type="text" id="guide-tour-date" name="tour_date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-skyblue focus:border-skyblue" placeholder="Select date" required>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Start Time</label>
            <select name="start_time" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-skyblue focus:border-skyblue" required>
                <option value="">Select time</option>
                <option value="09:00">09:00 AM</option>
                <option value="10:00">10:00 AM</option>
                <option value="11:00">11:00 AM</option>
                <option value="14:00">02:00 PM</option>
                <option value="15:00">03:00 PM</option>
                <option value="16:00">04:00 PM</option>
            </select>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Duration</label>
            <select name="duration" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-skyblue focus:border-skyblue" required>
                <option value="">Select duration</option>
                <option value="2">2 hours - ${{ $guide['hourly_rate'] * 2 }}</option>
                <option value="3">3 hours - ${{ $guide['hourly_rate'] * 3 }}</option>
                <option value="4">4 hours - ${{ $guide['hourly_rate'] * 4 }}</option>
                <option value="full">Full Day - ${{ $guide['daily_rate'] }}</option>
            </select>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Number of People</label>
            <input type="number" name="num_people" min="1" max="20" value="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-skyblue focus:border-skyblue" required>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Service Type</label>
            <select name="service_type" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-skyblue focus:border-skyblue" required>
                <option value="">Select service</option>
                <option value="historical">Historical Tour</option>
                <option value="photography">Photography Tour</option>
                <option value="food">Food & Culture Tour</option>
                <option value="walking">Walking Tour</option>
                <option value="custom">Custom Tour</option>
            </select>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Special Requests (Optional)</label>
            <textarea name="special_requests" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-skyblue focus:border-skyblue" placeholder="Any preferences or requirements..."></textarea>
        </div>
        
        <button type="submit" class="w-full bg-skyblue text-white py-3 rounded-lg font-semibold hover:bg-blue-400 transition-colors">
            <i class="fa-solid fa-calendar-check mr-2"></i>Request Booking
        </button>
        
        <p class="text-xs text-gray-500 text-center">
            <i class="fa-solid fa-info-circle mr-1"></i>
            You won't be charged yet. Guide will confirm availability.
        </p>
    </form>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#guide-tour-date", {
            dateFormat: "Y-m-d",
            minDate: "today",
            disable: [
                // Add unavailable dates here
            ]
        });
    });
    
    function submitGuideBooking(event) {
        event.preventDefault();
        
        const formData = new FormData(event.target);
        const data = Object.fromEntries(formData);
        
        Swal.fire({
            title: 'Confirm Booking Request',
            html: `
                <div class="text-left space-y-3">
                    <p class="text-gray-700"><strong>Guide:</strong> {{ $guide['name'] }}</p>
                    <p class="text-gray-700"><strong>Date:</strong> ${data.tour_date}</p>
                    <p class="text-gray-700"><strong>Time:</strong> ${data.start_time}</p>
                    <p class="text-gray-700"><strong>Duration:</strong> ${data.duration} hours</p>
                    <p class="text-gray-700"><strong>People:</strong> ${data.num_people}</p>
                    <p class="text-gray-700"><strong>Service:</strong> ${data.service_type}</p>
                </div>
            `,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Send Request',
            confirmButtonColor: '#87CEEB',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Request Sent!',
                    html: '<p>Your booking request has been sent to {{ $guide["name"] }}. You will receive a confirmation within 24 hours.</p>',
                    confirmButtonColor: '#87CEEB'
                });
            }
        });
    }
</script>
@endpush