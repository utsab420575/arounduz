<!-- Plan Your Perfect Trip Section -->
<section id="trip-planner-banner" class="py-8 lg:py-12">
    <div class="container mx-auto px-4">
        <div class="bg-gradient-to-br from-gray-50 to-blue-50 rounded-2xl p-6 md:p-8 lg:p-12 flex flex-col md:flex-row items-center justify-between gap-6 border border-gray-100 shadow-sm">
            <div class="flex items-center gap-4 md:gap-6">
                <div class="w-16 h-16 md:w-20 md:h-20 bg-skyblue bg-opacity-20 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fa-solid fa-plane-departure text-3xl md:text-4xl text-skyblue"></i>
                </div>
                <div>
                    <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-2">Plan Your Perfect Uzbekistan Trip</h3>
                    <p class="text-gray-600 text-sm md:text-base">Get a custom itinerary and quote from our top-rated travel agencies.</p>
                </div>
            </div>
            <button onclick="requestCustomQuote()" class="w-full md:w-auto bg-skyblue text-white px-6 md:px-8 py-3 rounded-lg hover:bg-blue-400 transition-colors font-medium whitespace-nowrap shadow-md">
                <i class="fa-solid fa-file-lines mr-2"></i>Get a Free Quote
            </button>
        </div>
    </div>
</section>

@push('scripts')
<script>
    function requestCustomQuote() {
        Swal.fire({
            title: 'Request Custom Itinerary',
            html: `
                <div class="text-left space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Your Name</label>
                        <input type="text" id="quoteName" placeholder="Full name" class="w-full border border-gray-300 rounded-md px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input type="email" id="quoteEmail" placeholder="your@email.com" class="w-full border border-gray-300 rounded-md px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                        <input type="tel" id="quotePhone" placeholder="+998 XX XXX XX XX" class="w-full border border-gray-300 rounded-md px-3 py-2">
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Travel Dates</label>
                            <input type="date" id="quoteDate" class="w-full border border-gray-300 rounded-md px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Duration (days)</label>
                            <input type="number" id="quoteDuration" min="1" max="30" value="7" class="w-full border border-gray-300 rounded-md px-3 py-2">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Number of Travelers</label>
                        <input type="number" id="quoteTravelers" min="1" max="50" value="2" class="w-full border border-gray-300 rounded-md px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Budget Range</label>
                        <select id="quoteBudget" class="w-full border border-gray-300 rounded-md px-3 py-2">
                            <option value="economy">Economy ($500-$1000/person)</option>
                            <option value="standard">Standard ($1000-$2000/person)</option>
                            <option value="comfort">Comfort ($2000-$3500/person)</option>
                            <option value="luxury">Luxury ($3500+/person)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Interests & Preferences</label>
                        <textarea id="quoteInterests" rows="3" placeholder="Tell us about your interests, special requirements, preferred destinations..." class="w-full border border-gray-300 rounded-md px-3 py-2"></textarea>
                    </div>
                </div>
            `,
            confirmButtonText: 'Submit Request',
            confirmButtonColor: '#87CEEB',
            showCancelButton: true,
            width: '650px',
            preConfirm: () => {
                const name = document.getElementById('quoteName').value;
                const email = document.getElementById('quoteEmail').value;
                const phone = document.getElementById('quotePhone').value;
                const date = document.getElementById('quoteDate').value;
                const duration = document.getElementById('quoteDuration').value;
                const travelers = document.getElementById('quoteTravelers').value;
                const budget = document.getElementById('quoteBudget').value;
                const interests = document.getElementById('quoteInterests').value;
                
                if (!name || !email || !phone || !date) {
                    Swal.showValidationMessage('Please fill in all required fields');
                    return false;
                }
                
                return { name, email, phone, date, duration, travelers, budget, interests };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Request Submitted!',
                    html: `
                        <p>Thank you for your request! Our travel experts will review your preferences and send you a custom itinerary within 24 hours.</p>
                        <p class="mt-3 text-sm text-gray-600">We'll contact you at: <strong>${result.value.email}</strong></p>
                    `,
                    confirmButtonColor: '#87CEEB'
                });
            }
        });
    }
</script>
@endpush