<!-- CTA Section -->
<section id="cta-section" class="py-16 md:py-20 bg-gradient-to-r from-skyblue via-blue-500 to-blue-600 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="container mx-auto px-4 lg:px-6 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4 md:mb-6">
                Ready to Explore Uzbekistan?
            </h2>
            <p class="text-lg md:text-xl text-blue-50 mb-6 md:mb-8 leading-relaxed">
                Connect with local experts who know the hidden gems and authentic experiences that make Uzbekistan unforgettable.
            </p>
            
            <!-- Stats Row -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 mb-8 md:mb-10">
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-4">
                    <div class="text-2xl md:text-3xl font-bold text-white">1,200+</div>
                    <div class="text-sm text-blue-100">Expert Guides</div>
                </div>
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-4">
                    <div class="text-2xl md:text-3xl font-bold text-white">300+</div>
                    <div class="text-sm text-blue-100">Travel Agencies</div>
                </div>
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-4">
                    <div class="text-2xl md:text-3xl font-bold text-white">50K+</div>
                    <div class="text-sm text-blue-100">Happy Travelers</div>
                </div>
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-4">
                    <div class="text-2xl md:text-3xl font-bold text-white">4.9/5</div>
                    <div class="text-sm text-blue-100">Average Rating</div>
                </div>
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 md:gap-6">
                <button onclick="findGuide()" class="w-full sm:w-auto bg-white text-skyblue px-6 md:px-8 py-3 md:py-4 rounded-lg font-semibold text-base md:text-lg hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <i class="fa-solid fa-search mr-2"></i>Find Your Guide
                </button>
                <button onclick="listService()" class="w-full sm:w-auto border-2 border-white text-white px-6 md:px-8 py-3 md:py-4 rounded-lg font-semibold text-base md:text-lg hover:bg-white hover:text-skyblue transition-all duration-300 transform hover:-translate-y-1">
                    <i class="fa-solid fa-plus mr-2"></i>List Your Service
                </button>
            </div>
            
            <!-- Trust Indicators -->
            <div class="mt-8 md:mt-10 flex flex-wrap items-center justify-center gap-4 md:gap-8 text-blue-100">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-shield-check text-xl"></i>
                    <span class="text-sm">Verified Guides</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-lock text-xl"></i>
                    <span class="text-sm">Secure Booking</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-headset text-xl"></i>
                    <span class="text-sm">24/7 Support</span>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    function findGuide() {
        // Scroll to guides section
        document.getElementById('guides-tab').click();
        setTimeout(() => {
            document.getElementById('local-guides-section').scrollIntoView({ 
                behavior: 'smooth',
                block: 'start'
            });
        }, 100);
    }
    
    function listService() {
        Swal.fire({
            title: 'List Your Service',
            html: `
                <div class="text-left space-y-4">
                    <p class="text-gray-600 mb-4">Join our platform and connect with thousands of travelers!</p>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Service Type</label>
                        <select id="serviceType" class="w-full border border-gray-300 rounded-md px-3 py-2">
                            <option value="guide">Tour Guide</option>
                            <option value="agency">Travel Agency</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Your Name / Business Name</label>
                        <input type="text" id="businessName" placeholder="Enter name" class="w-full border border-gray-300 rounded-md px-3 py-2">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input type="email" id="businessEmail" placeholder="your@email.com" class="w-full border border-gray-300 rounded-md px-3 py-2">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                        <input type="tel" id="businessPhone" placeholder="+998 XX XXX XX XX" class="w-full border border-gray-300 rounded-md px-3 py-2">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                        <select id="businessLocation" class="w-full border border-gray-300 rounded-md px-3 py-2">
                            <option value="">Select city</option>
                            <option value="tashkent">Tashkent</option>
                            <option value="samarkand">Samarkand</option>
                            <option value="bukhara">Bukhara</option>
                            <option value="khiva">Khiva</option>
                            <option value="fergana">Fergana Valley</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tell us about your service</label>
                        <textarea id="businessDescription" rows="3" placeholder="Describe your expertise and services..." class="w-full border border-gray-300 rounded-md px-3 py-2"></textarea>
                    </div>
                </div>
            `,
            confirmButtonText: 'Submit Application',
            confirmButtonColor: '#87CEEB',
            showCancelButton: true,
            width: '600px',
            preConfirm: () => {
                const type = document.getElementById('serviceType').value;
                const name = document.getElementById('businessName').value;
                const email = document.getElementById('businessEmail').value;
                const phone = document.getElementById('businessPhone').value;
                const location = document.getElementById('businessLocation').value;
                const description = document.getElementById('businessDescription').value;
                
                if (!name || !email || !phone || !location) {
                    Swal.showValidationMessage('Please fill in all required fields');
                    return false;
                }
                
                return { type, name, email, phone, location, description };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Application Submitted!',
                    html: `
                        <p class="mb-3">Thank you for your interest in joining AroundUz!</p>
                        <p class="text-sm text-gray-600">Our team will review your application and contact you within 2-3 business days.</p>
                    `,
                    confirmButtonColor: '#87CEEB'
                });
            }
        });
    }
</script>
@endpush