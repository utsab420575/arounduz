<!-- Footer -->
<footer class="bg-gray-900 text-white py-12 lg:py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
            <!-- About Section -->
            <div>
                <img src="{{ asset('logo_b.png') }}" alt="AroundUz Logo" class="h-12 w-auto object-contain mb-4 brightness-0 invert">
                <p class="text-gray-400 mb-4">
                    Connecting travelers with local experts across Uzbekistan. Discover authentic experiences with certified guides and trusted agencies.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-skyblue transition-colors">
                        <i class="fab fa-facebook text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-skyblue transition-colors">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-skyblue transition-colors">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-skyblue transition-colors">
                        <i class="fab fa-youtube text-xl"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="font-bold text-lg mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-skyblue transition-colors">About Us</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-skyblue transition-colors">How It Works</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-skyblue transition-colors">Blog</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-skyblue transition-colors">Career</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-skyblue transition-colors">Contact Us</a></li>
                </ul>
            </div>

            <!-- For Travelers -->
            <div>
                <h4 class="font-bold text-lg mb-4">For Travelers</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-skyblue transition-colors">Find Guides</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-skyblue transition-colors">Find Agencies</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-skyblue transition-colors">Destinations</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-skyblue transition-colors">Travel Tips</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-skyblue transition-colors">FAQs</a></li>
                </ul>
            </div>

            <!-- For Partners -->
            <div>
                <h4 class="font-bold text-lg mb-4">For Partners</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('register') }}" class="text-gray-400 hover:text-skyblue transition-colors">Become a Guide</a></li>
                    <li><a href="{{ route('register') }}" class="text-gray-400 hover:text-skyblue transition-colors">Register Agency</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-skyblue transition-colors">Partner Benefits</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-skyblue transition-colors">Training Resources</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-skyblue transition-colors">Support</a></li>
                </ul>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-gray-800 mt-8 pt-8">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <p class="text-gray-400 text-sm">
                    © {{ date('Y') }} AroundUz. All rights reserved.
                </p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-skyblue transition-colors text-sm">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-skyblue transition-colors text-sm">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-skyblue transition-colors text-sm">Cookie Policy</a>
                </div>
            </div>
        </div>
    </div>
</footer>
