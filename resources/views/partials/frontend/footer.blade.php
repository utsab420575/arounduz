<!-- Footer -->
<footer class="bg-gray-900 text-white py-12 md:py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">

            <!-- About -->
            <div>
                <img src="{{ asset('logo_b.png') }}" alt="AroundUz" class="h-12 w-auto mb-4 brightness-0 invert">
                <p class="text-gray-400 text-sm mb-4">
                    Discover Uzbekistan with verified local guides and professional travel agencies. Your trusted platform for authentic travel experiences.
                </p>
                <div class="flex space-x-3">
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-skyblue transition-colors">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-skyblue transition-colors">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-skyblue transition-colors">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-skyblue transition-colors">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-skyblue transition-colors">Home</a></li>
                    <li><a href="{{ route('destinations') }}" class="text-gray-400 hover:text-skyblue transition-colors">Destinations</a></li>
                    <li><a href="{{ route('guides') }}" class="text-gray-400 hover:text-skyblue transition-colors">Find Guides</a></li>
                    <li><a href="{{ route('agents') }}" class="text-gray-400 hover:text-skyblue transition-colors">Find Agencies</a></li>
                    <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-skyblue transition-colors">About Us</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-skyblue transition-colors">Contact</a></li>
                </ul>
            </div>

            <!-- For Travelers -->
            <div>
                <h3 class="text-lg font-semibold mb-4">For Travelers</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-gray-400 hover:text-skyblue transition-colors">How It Works</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-skyblue transition-colors">Travel Tips</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-skyblue transition-colors">Popular Tours</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-skyblue transition-colors">Blog</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-skyblue transition-colors">Reviews</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-skyblue transition-colors">FAQs</a></li>
                </ul>
            </div>

            <!-- For Partners -->
            <div>
                <h3 class="text-lg font-semibold mb-4">For Partners</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-gray-400 hover:text-skyblue transition-colors">Become a Guide</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-skyblue transition-colors">List Your Agency</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-skyblue transition-colors">Partner Resources</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-skyblue transition-colors">Verification Process</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-skyblue transition-colors">Help Center</a></li>
                    @auth
                        <li><a href="{{ route('dashboard') }}" class="text-skyblue hover:text-blue-400 transition-colors font-semibold">
                                <i class="fa-solid fa-arrow-right mr-1"></i>Dashboard
                            </a></li>
                    @endauth
                </ul>
            </div>

        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-gray-800 pt-8">
            <div class="flex flex-col md:flex-row items-center justify-between text-sm text-gray-400">
                <p>&copy; {{ date('Y') }} AroundUz. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-skyblue transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-skyblue transition-colors">Terms of Service</a>
                    <a href="#" class="hover:text-skyblue transition-colors">Cookie Policy</a>
                </div>
            </div>
        </div>
    </div>
</footer>
