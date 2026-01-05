<!-- Header -->
<header id="header" class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between py-4 lg:py-6">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('logo_b.png') }}" alt="AroundUz Logo" class="h-12 lg:h-16 w-auto object-contain">
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center space-x-8">
                <a href="{{ url('/') }}" class="text-gray-700 hover:text-skyblue transition-colors font-medium">Home</a>
                <a href="#" class="text-gray-700 hover:text-skyblue transition-colors font-medium">Destinations</a>
                <a href="#" class="text-gray-700 hover:text-skyblue transition-colors font-medium">Guides</a>
                <a href="#" class="text-gray-700 hover:text-skyblue transition-colors font-medium">Agencies</a>
                <a href="#" class="text-gray-700 hover:text-skyblue transition-colors font-medium">About</a>
                <a href="#" class="text-gray-700 hover:text-skyblue transition-colors font-medium">Contact</a>
            </nav>

            <!-- Right Side Actions -->
            <div class="flex items-center space-x-2 lg:space-x-4">
                <!-- Language Selector -->
                <div class="relative hidden md:block">
                    <button id="langBtn"
                            class="flex items-center space-x-2 border border-gray-200 px-3 py-2 rounded-md hover:bg-gray-50 transition-colors cursor-pointer">
                        <span class="text-lg">🇬🇧</span>
                        <span id="currentLang" class="text-sm text-gray-700">English</span>
                        <i class="fa-solid fa-chevron-down text-xs text-gray-500"></i>
                    </button>

                    <!-- Dropdown -->
                    <div id="langDropdown"
                         class="absolute right-0 mt-2 w-44 bg-white shadow-lg border border-gray-200 rounded-md py-2 hidden z-50">
                        <button class="lang-option w-full text-left px-4 py-2 text-sm hover:bg-gray-100 flex items-center space-x-2"
                                data-lang="English" data-flag="🇬🇧">
                            <span class="text-lg">🇬🇧</span><span>English</span>
                        </button>
                        <button class="lang-option w-full text-left px-4 py-2 text-sm hover:bg-gray-100 flex items-center space-x-2"
                                data-lang="Русский" data-flag="🇷🇺">
                            <span class="text-lg">🇷🇺</span><span>Русский</span>
                        </button>
                        <button class="lang-option w-full text-left px-4 py-2 text-sm hover:bg-gray-100 flex items-center space-x-2"
                                data-lang="O'zbek" data-flag="🇺🇿">
                            <span class="text-lg">🇺🇿</span><span>O'zbek</span>
                        </button>
                    </div>
                </div>

                @auth
                    <!-- Authenticated User -->
                    <div class="relative">
                        <button id="userMenuBtn" class="flex items-center space-x-2 bg-skyblue text-white px-4 py-2 rounded-md font-medium hover:bg-blue-400 transition-colors">
                            @if(Auth::user()->avatar)
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="w-6 h-6 rounded-full">
                            @else
                                <div class="w-6 h-6 rounded-full bg-white flex items-center justify-center">
                                    <span class="text-xs font-bold text-skyblue">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </div>
                            @endif
                            <span class="hidden lg:inline">{{ Auth::user()->name }}</span>
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </button>

                        <!-- User Dropdown -->
                        <div id="userDropdown" class="absolute right-0 mt-2 w-48 bg-white shadow-lg border border-gray-200 rounded-md py-2 hidden z-50">
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fa-solid fa-home mr-2"></i>Dashboard
                            </a>
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fa-solid fa-user mr-2"></i>Profile
                            </a>
                            <div class="border-t border-gray-200 my-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                    <i class="fa-solid fa-sign-out-alt mr-2"></i>Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <!-- Guest User -->
                    <a href="{{ route('login') }}" class="bg-skyblue text-white px-4 py-2 lg:px-6 rounded-md font-medium hover:bg-blue-400 transition-colors text-sm lg:text-base">
                        Sign In
                    </a>
                @endauth

                <!-- Mobile Menu Button -->
                <button id="mobileMenuBtn" class="lg:hidden p-2 text-gray-600 hover:text-skyblue">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden lg:hidden bg-white border-t border-gray-200">
        <nav class="container mx-auto px-4 py-4 flex flex-col space-y-3">
            <a href="{{ url('/') }}" class="text-gray-700 hover:text-skyblue transition-colors font-medium py-2">Home</a>
            <a href="#" class="text-gray-700 hover:text-skyblue transition-colors font-medium py-2">Destinations</a>
            <a href="#" class="text-gray-700 hover:text-skyblue transition-colors font-medium py-2">Guides</a>
            <a href="#" class="text-gray-700 hover:text-skyblue transition-colors font-medium py-2">Agencies</a>
            <a href="#" class="text-gray-700 hover:text-skyblue transition-colors font-medium py-2">About</a>
            <a href="#" class="text-gray-700 hover:text-skyblue transition-colors font-medium py-2">Contact</a>

            @auth
                <div class="pt-3 border-t border-gray-200">
                    <a href="{{ route('dashboard') }}" class="block text-gray-700 hover:text-skyblue transition-colors font-medium py-2">
                        <i class="fa-solid fa-home mr-2"></i>Dashboard
                    </a>
                    <a href="{{ route('profile.edit') }}" class="block text-gray-700 hover:text-skyblue transition-colors font-medium py-2">
                        <i class="fa-solid fa-user mr-2"></i>Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="mt-2">
                        @csrf
                        <button type="submit" class="w-full text-left text-red-600 hover:text-red-700 font-medium py-2">
                            <i class="fa-solid fa-sign-out-alt mr-2"></i>Logout
                        </button>
                    </form>
                </div>
            @endauth
        </nav>
    </div>
</header>

@push('scripts')
    <script>
        // Mobile Menu Toggle
        document.getElementById('mobileMenuBtn')?.addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('hidden');
        });

        // Desktop Dropdown
        const langBtn = document.getElementById("langBtn");
        const langDropdown = document.getElementById("langDropdown");

        langBtn?.addEventListener("click", () => {
            langDropdown.classList.toggle("hidden");
        });

        document.querySelectorAll(".lang-option").forEach(option => {
            option.addEventListener("click", () => {
                const lang = option.dataset.lang;
                const flag = option.dataset.flag;

                langBtn.querySelector("span.text-lg").textContent = flag;
                document.getElementById("currentLang").textContent = lang;

                langDropdown.classList.add("hidden");
            });
        });

        // User Menu Dropdown
        const userMenuBtn = document.getElementById("userMenuBtn");
        const userDropdown = document.getElementById("userDropdown");

        userMenuBtn?.addEventListener("click", () => {
            userDropdown.classList.toggle("hidden");
        });

        // Close dropdowns on outside click
        document.addEventListener("click", (e) => {
            if (langBtn && !langBtn.contains(e.target) && langDropdown && !langDropdown.contains(e.target)) {
                langDropdown?.classList.add("hidden");
            }
            if (userMenuBtn && !userMenuBtn.contains(e.target) && userDropdown && !userDropdown.contains(e.target)) {
                userDropdown?.classList.add("hidden");
            }
        });
    </script>
@endpush
