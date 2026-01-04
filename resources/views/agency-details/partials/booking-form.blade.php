<!-- Booking Form -->
<div id="booking-form" class="bg-white rounded-xl shadow-sm p-6 sticky top-24">
    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
        <i class="fa-solid fa-calendar-check text-skyblue mr-2"></i>
        Book Your Tour
    </h3>
    
    <form onsubmit="submitBooking(event)" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Start Date</label>
            <input type="text" id="start-date" name="start_date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-skyblue focus:border-skyblue" placeholder="Select start date" required>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">End Date</label>
            <input type="text" id="end-date" name="end_date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-skyblue focus:border-skyblue" placeholder="Select end date" required>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Number of Travelers</label>
            <select name="travelers" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-skyblue focus:border-skyblue" required>
                <option value="">Select number</option>
                <option value="1">1 Person</option>
                <option value="2">2 People</option>
                <option value="3">3 People</option>
                <option value="4">4 People</option>
                <option value="5+">5+ People</option>
            </select>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tour Package</label>
            <select name="tour_package" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-skyblue focus:border-skyblue" required>
                <option value="">Select a tour</option>
                <option value="Golden Samarkand Heritage Tour - $299">Golden Samarkand Heritage Tour - $299</option>
                <option value="Silk Road Adventure - $599">Silk Road Adventure - $599</option>
                <option value="Tashkent City Explorer - $199">Tashkent City Explorer - $199</option>
            </select>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Special Requests (Optional)</label>
            <textarea name="special_requests" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-skyblue focus:border-skyblue" placeholder="Any special requirements..."></textarea>
        </div>
        
        <div class="border-t border-gray-200 pt-4">
            <div class="flex justify-between items-center mb-2 text-sm">
                <span class="text-gray-600">Subtotal:</span>
                <span class="font-semibold" id="subtotal">$299</span>
            </div>
            <div class="flex justify-between items-center mb-2 text-sm">
                <span class="text-gray-600">Airport Transfer:</span>
                <span class="font-semibold text-green-600">Included</span>
            </div>
            <div class="flex justify-between items-center text-lg font-bold">
                <span>Total:</span>
                <span class="text-skyblue" id="total">$299</span>
            </div>
        </div>
        
        <button type="submit" class="w-full bg-skyblue text-white py-3 rounded-lg font-semibold hover:bg-blue-400 transition-colors">
            <i class="fa-solid fa-calendar-check mr-2"></i>Book Now
        </button>
        
        <p class="text-xs text-gray-500 text-center">
            <i class="fa-solid fa-shield-check mr-1"></i>
            Secure booking • Free cancellation up to 48 hours
        </p>
    </form>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#start-date", {
            dateFormat: "Y-m-d",
            minDate: "today",
            onChange: function(selectedDates, dateStr, instance) {
                flatpickr("#end-date", {
                    dateFormat: "Y-m-d",
                    minDate: dateStr
                });
            }
        });
        
        flatpickr("#end-date", {
            dateFormat: "Y-m-d",
            minDate: "today"
        });
    });
    
    function submitBooking(event) {
        event.preventDefault();
        
        const formData = new FormData(event.target);
        const data = Object.fromEntries(formData);
        
        Swal.fire({
            title: 'Confirm Booking',
            html: `
                <div class="text-left space-y-3">
                    <p class="text-gray-700"><strong>Tour:</strong> ${data.tour_package}</p>
                    <p class="text-gray-700"><strong>Dates:</strong> ${data.start_date} to ${data.end_date}</p>
                    <p class="text-gray-700"><strong>Travelers:</strong> ${data.travelers}</p>
                    <p class="text-gray-700"><strong>Total:</strong> <span class="text-skyblue font-bold">$299</span></p>
                </div>
            `,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Confirm Booking',
            confirmButtonColor: '#87CEEB',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Booking Confirmed!',
                    html: '<p>Your booking has been confirmed. We will contact you shortly with further details.</p>',
                    confirmButtonColor: '#87CEEB'
                });
            }
        });
    }
</script>
@endpush