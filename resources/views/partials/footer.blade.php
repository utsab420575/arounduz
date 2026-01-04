<!-- Footer -->
<footer class="bg-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
             style="background-image: url('{{ asset('back.png') }}');">
        </div>
    </div>

    <!-- Decorative Wave Top -->
    <div class="absolute top-0 left-0 right-0">
        <svg class="w-full h-12 text-gray-50" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="currentColor"></path>
        </svg>
    </div>
    
    <div class="container mx-auto px-4 pt-16 pb-8 relative z-10">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 mb-8 lg:mb-12">
            <!-- Company Info - Full Width on Mobile -->
            <div class="md:col-span-2 lg:col-span-1">
                <div class="flex items-center mb-4">
                    <a href="{{ URL('/') }}"><img src="{{ asset('logo_b.png') }}" alt="AroundUz Logo" class="h-12 lg:h-16 w-auto object-contain"></a>
                </div>
                <p class="text-gray-600 mb-6 text-sm leading-relaxed">
                    Your trusted platform for connecting with verified tour guides and travel agencies across Uzbekistan. Discover authentic experiences with local experts.
                </p>
                <div class="flex space-x-3">
                    <a href="#" class="w-10 h-10 bg-gradient-to-br from-blue-500 to-skyblue rounded-lg flex items-center justify-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 group">
                        <i class="fa-brands fa-facebook-f text-white group-hover:scale-110 transition-transform"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gradient-to-br from-pink-500 to-red-500 rounded-lg flex items-center justify-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 group">
                        <i class="fa-brands fa-instagram text-white group-hover:scale-110 transition-transform"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 group">
                        <i class="fa-brands fa-twitter text-white group-hover:scale-110 transition-transform"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 group">
                        <i class="fa-brands fa-youtube text-white group-hover:scale-110 transition-transform"></i>
                    </a>
                </div>
            </div>
            
            <!-- Quick Links & Support - Side by Side on Mobile -->
            <div class="grid grid-cols-2 gap-6 md:col-span-2 lg:col-span-2 lg:grid-cols-2">
                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <i class="fa-solid fa-link text-skyblue mr-2"></i>
                        Quick Links
                    </h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('guides') }}" class="text-gray-600 hover:text-skyblue transition-colors flex items-center group text-sm">
                                <i class="fa-solid fa-chevron-right text-xs text-gray-400 mr-2 group-hover:text-skyblue group-hover:translate-x-1 transition-all"></i>
                                Find Local Guides
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('agents') }}" class="text-gray-600 hover:text-skyblue transition-colors flex items-center group text-sm">
                                <i class="fa-solid fa-chevron-right text-xs text-gray-400 mr-2 group-hover:text-skyblue group-hover:translate-x-1 transition-all"></i>
                                Travel Agencies
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('destinations') }}" class="text-gray-600 hover:text-skyblue transition-colors flex items-center group text-sm">
                                <i class="fa-solid fa-chevron-right text-xs text-gray-400 mr-2 group-hover:text-skyblue group-hover:translate-x-1 transition-all"></i>
                                Popular Destinations
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-skyblue transition-colors flex items-center group text-sm">
                                <i class="fa-solid fa-chevron-right text-xs text-gray-400 mr-2 group-hover:text-skyblue group-hover:translate-x-1 transition-all"></i>
                                Specialized Tours
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-skyblue transition-colors flex items-center group text-sm">
                                <i class="fa-solid fa-chevron-right text-xs text-gray-400 mr-2 group-hover:text-skyblue group-hover:translate-x-1 transition-all"></i>
                                Become a Guide
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-skyblue transition-colors flex items-center group text-sm">
                                <i class="fa-solid fa-chevron-right text-xs text-gray-400 mr-2 group-hover:text-skyblue group-hover:translate-x-1 transition-all"></i>
                                Partner with Us
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Support -->
                <div>
                    <h4 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <i class="fa-solid fa-headset text-skyblue mr-2"></i>
                        Support
                    </h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="text-gray-600 hover:text-skyblue transition-colors flex items-center group text-sm">
                                <i class="fa-solid fa-chevron-right text-xs text-gray-400 mr-2 group-hover:text-skyblue group-hover:translate-x-1 transition-all"></i>
                                Help Center
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-skyblue transition-colors flex items-center group text-sm">
                                <i class="fa-solid fa-chevron-right text-xs text-gray-400 mr-2 group-hover:text-skyblue group-hover:translate-x-1 transition-all"></i>
                                Safety Guidelines
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-skyblue transition-colors flex items-center group text-sm">
                                <i class="fa-solid fa-chevron-right text-xs text-gray-400 mr-2 group-hover:text-skyblue group-hover:translate-x-1 transition-all"></i>
                                Cancellation Policy
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" class="text-gray-600 hover:text-skyblue transition-colors flex items-center group text-sm">
                                <i class="fa-solid fa-chevron-right text-xs text-gray-400 mr-2 group-hover:text-skyblue group-hover:translate-x-1 transition-all"></i>
                                Contact Us
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-skyblue transition-colors flex items-center group text-sm">
                                <i class="fa-solid fa-chevron-right text-xs text-gray-400 mr-2 group-hover:text-skyblue group-hover:translate-x-1 transition-all"></i>
                                Trust & Safety
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-skyblue transition-colors flex items-center group text-sm">
                                <i class="fa-solid fa-chevron-right text-xs text-gray-400 mr-2 group-hover:text-skyblue group-hover:translate-x-1 transition-all"></i>
                                Terms of Service
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Contact & Newsletter - Side by Side on Mobile, Single Column on Desktop -->
            <div class="grid grid-cols-2 gap-6 md:col-span-2 lg:col-span-1 lg:grid-cols-1">
                <!-- Get In Touch -->
                <div>
                    <h4 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <i class="fa-solid fa-map-marker-alt text-skyblue mr-2"></i>
                        <span class="hidden lg:inline">Get In Touch</span>
                        <span class="lg:hidden">Contact</span>
                    </h4>
                    <div class="space-y-3">
                        <div class="flex items-start text-gray-600">
                            <i class="fa-solid fa-map-marker-alt text-skyblue mt-1 mr-2 flex-shrink-0 text-sm"></i>
                            <span class="text-xs lg:text-sm">Amir Temur Street, 100000<br>Tashkent, Uzbekistan</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <i class="fa-solid fa-phone text-skyblue mr-2 flex-shrink-0 text-sm"></i>
                            <a href="tel:+998711234567" class="hover:text-skyblue transition-colors text-xs lg:text-sm">+998 71 123 45 67</a>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <i class="fa-solid fa-envelope text-skyblue mr-2 flex-shrink-0 text-sm"></i>
                            <a href="mailto:info@arounduz.com" class="hover:text-skyblue transition-colors text-xs lg:text-sm break-all">info@arounduz.com</a>
                        </div>
                        <div class="flex items-start text-gray-600">
                            <i class="fa-solid fa-clock text-skyblue mt-1 mr-2 flex-shrink-0 text-sm"></i>
                            <span class="text-xs lg:text-sm">Mon - Fri: 9:00 AM - 6:00 PM</span>
                        </div>
                    </div>
                </div>
                
                <!-- Newsletter -->
                <div class="lg:mt-6">
                    <h4 class="text-lg font-bold text-gray-900 mb-4 flex items-center lg:hidden">
                        <i class="fa-solid fa-envelope text-skyblue mr-2"></i>
                        Newsletter
                    </h4>
                    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-3 lg:p-4 border border-blue-100">
                        <h5 class="font-semibold mb-2 lg:mb-3 text-gray-900 flex items-center text-sm lg:text-base">
                            <i class="fa-solid fa-paper-plane text-skyblue mr-2"></i>
                            <span class="hidden lg:inline">Newsletter</span>
                            <span class="lg:hidden">Subscribe</span>
                        </h5>
                        <p class="text-xs text-gray-600 mb-2 lg:mb-3">Get travel tips and exclusive offers</p>
                        <form onsubmit="subscribeNewsletter(event)" class="flex">
                            <input type="email" id="footerNewsletterEmail" placeholder="Your email" required class="flex-1 bg-white border border-gray-300 rounded-l-lg px-2 lg:px-3 py-2 text-xs lg:text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-skyblue focus:border-transparent" style="width: 40px;">
                            <button type="submit" class="bg-gradient-to-r from-skyblue to-blue-500 text-white px-3 lg:px-4 py-2 rounded-r-lg hover:from-blue-500 hover:to-skyblue transition-all duration-300">
                                <i class="fa-solid fa-paper-plane text-xs lg:text-sm"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Featured Destinations Quick Links -->
        <div class="border-t border-b border-gray-200 py-6 mb-8">
            <h4 class="text-sm font-semibold text-gray-900 mb-4 text-center">Popular Destinations</h4>
            <div class="flex flex-wrap justify-center gap-2 lg:gap-3">
                <a href="#" class="px-3 lg:px-4 py-1.5 lg:py-2 bg-gray-50 hover:bg-skyblue hover:text-white rounded-full text-xs lg:text-sm text-gray-700 transition-all duration-300 border border-gray-200 hover:border-skyblue">
                    Tashkent
                </a>
                <a href="#" class="px-3 lg:px-4 py-1.5 lg:py-2 bg-gray-50 hover:bg-skyblue hover:text-white rounded-full text-xs lg:text-sm text-gray-700 transition-all duration-300 border border-gray-200 hover:border-skyblue">
                    Samarkand
                </a>
                <a href="#" class="px-3 lg:px-4 py-1.5 lg:py-2 bg-gray-50 hover:bg-skyblue hover:text-white rounded-full text-xs lg:text-sm text-gray-700 transition-all duration-300 border border-gray-200 hover:border-skyblue">
                    Bukhara
                </a>
                <a href="#" class="px-3 lg:px-4 py-1.5 lg:py-2 bg-gray-50 hover:bg-skyblue hover:text-white rounded-full text-xs lg:text-sm text-gray-700 transition-all duration-300 border border-gray-200 hover:border-skyblue">
                    Khiva
                </a>
                <a href="#" class="px-3 lg:px-4 py-1.5 lg:py-2 bg-gray-50 hover:bg-skyblue hover:text-white rounded-full text-xs lg:text-sm text-gray-700 transition-all duration-300 border border-gray-200 hover:border-skyblue">
                    Fergana Valley
                </a>
                <a href="#" class="px-3 lg:px-4 py-1.5 lg:py-2 bg-gray-50 hover:bg-skyblue hover:text-white rounded-full text-xs lg:text-sm text-gray-700 transition-all duration-300 border border-gray-200 hover:border-skyblue">
                    Nukus
                </a>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="pt-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-600 text-xs lg:text-sm text-center md:text-left">
                    © {{ date('Y') }} <span class="font-semibold text-skyblue">arounduz.com</span>. All rights reserved.
                </p>
                
                <div class="flex flex-wrap justify-center gap-3 lg:gap-6 text-xs lg:text-sm">
                    <a href="#" class="text-gray-600 hover:text-skyblue transition-colors">Privacy Policy</a>
                    <span class="text-gray-300 hidden md:inline">•</span>
                    <a href="#" class="text-gray-600 hover:text-skyblue transition-colors">Terms of Service</a>
                    <span class="text-gray-300 hidden md:inline">•</span>
                    <a href="#" class="text-gray-600 hover:text-skyblue transition-colors">Cookie Policy</a>
                    <span class="text-gray-300 hidden md:inline">•</span>
                    <a href="#" class="text-gray-600 hover:text-skyblue transition-colors">Sitemap</a>
                </div>
                
                <div class="flex items-center gap-2 lg:gap-3">
                    <span class="text-gray-600 text-xs lg:text-sm">We Accept:</span>
                    <div class="flex gap-1.5 lg:gap-2">
                        <div class="w-8 lg:w-10 h-6 lg:h-7 bg-gradient-to-br from-blue-600 to-blue-800 rounded flex items-center justify-center">
                            <i class="fa-brands fa-cc-visa text-white text-sm lg:text-lg"></i>
                        </div>
                        <div class="w-8 lg:w-10 h-6 lg:h-7 bg-gradient-to-br from-red-600 to-orange-600 rounded flex items-center justify-center">
                            <i class="fa-brands fa-cc-mastercard text-white text-sm lg:text-lg"></i>
                        </div>
                        <div class="w-8 lg:w-10 h-6 lg:h-7 bg-gradient-to-br from-blue-500 to-blue-700 rounded flex items-center justify-center">
                            <i class="fa-brands fa-cc-paypal text-white text-sm lg:text-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Trust Badges -->
            <div class="mt-6 pt-6 border-t border-gray-200">
                <div class="flex flex-wrap justify-center items-center gap-4 lg:gap-6 text-xs text-gray-500">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-shield-check text-green-500"></i>
                        <span>Verified Guides</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-lock text-green-500"></i>
                        <span>Secure Payments</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-award text-green-500"></i>
                        <span>Best Rated Platform</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-headset text-green-500"></i>
                        <span>24/7 Customer Support</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Back to Top Button -->
    <button id="backToTop" onclick="scrollToTop()" class="fixed bottom-6 right-6 bg-gradient-to-r from-skyblue to-blue-500 text-white w-12 h-12 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 opacity-0 invisible z-50 flex items-center justify-center group">
        <i class="fa-solid fa-arrow-up group-hover:-translate-y-1 transition-transform"></i>
    </button>
</footer>

@push('scripts')
<script>
    function subscribeNewsletter(event) {
        event.preventDefault();
        const email = document.getElementById('footerNewsletterEmail').value;
        
        Swal.fire({
            title: 'Subscribing...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
        
        // Simulate API call - replace with actual Laravel endpoint
        setTimeout(() => {
            Swal.fire({
                icon: 'success',
                title: 'Subscribed!',
                html: `
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fa-solid fa-check text-3xl text-green-500"></i>
                        </div>
                        <p class="mb-3 font-semibold">Welcome aboard! 🎉</p>
                        <p class="text-sm text-gray-600">We've sent a confirmation email to</p>
                        <p class="text-sm font-semibold text-skyblue mt-1">${email}</p>
                        <p class="text-sm text-gray-600 mt-3">You'll receive:</p>
                        <ul class="text-sm text-gray-600 mt-2 space-y-1">
                            <li>✓ Latest travel tips & guides</li>
                            <li>✓ Exclusive destination offers</li>
                            <li>✓ Local expert recommendations</li>
                        </ul>
                    </div>
                `,
                confirmButtonColor: '#87CEEB',
                confirmButtonText: 'Great!'
            });
            document.getElementById('footerNewsletterEmail').value = '';
        }, 1000);
    }
    
    // Back to Top Button
    window.addEventListener('scroll', function() {
        const backToTop = document.getElementById('backToTop');
        if (window.pageYOffset > 300) {
            backToTop.classList.remove('opacity-0', 'invisible');
            backToTop.classList.add('opacity-100', 'visible');
        } else {
            backToTop.classList.remove('opacity-100', 'visible');
            backToTop.classList.add('opacity-0', 'invisible');
        }
    });
    
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }
</script>
@endpush