<!-- Header -->
<header id="header" class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between py-4 lg:py-6">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ URL('/') }}"><img src="{{ asset('logo_b.png') }}" alt="AroundUz Logo" class="h-12 lg:h-16 w-auto object-contain"></a>
            </div>
            
            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center space-x-8">
                <a href="{{ URL('/') }}" class="text-gray-700 hover:text-skyblue transition-colors font-medium">Home</a>
                <a href="{{ route('destinations') }}" class="text-gray-700 hover:text-skyblue transition-colors font-medium">Destinations</a>
                <a href="{{ route('guides') }}" class="text-gray-700 hover:text-skyblue transition-colors font-medium">Guides</a>
                <a href="{{ route('agents') }}" class="text-gray-700 hover:text-skyblue transition-colors font-medium">Agents</a>
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-skyblue transition-colors font-medium">About</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-skyblue transition-colors font-medium">Contact</a>
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


                
                <!-- Sign In Button -->
                <button onclick="handleSignIn()" class="bg-skyblue text-white px-4 py-2 lg:px-6 rounded-md font-medium hover:bg-blue-400 transition-colors text-sm lg:text-base">
                    Sign In
                </button>
                
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
            <a href="{{ route('home') }}" class="text-gray-700 hover:text-skyblue transition-colors font-medium py-2">Home</a>
            <a href="{{ route('destinations') }}" class="text-gray-700 hover:text-skyblue transition-colors font-medium py-2">Destinations</a>
            <a href="{{ route('guides') }}" class="text-gray-700 hover:text-skyblue transition-colors font-medium py-2">Guides</a>
            <a href="{{ route('agents') }}" class="text-gray-700 hover:text-skyblue transition-colors font-medium py-2">Agents</a>
            <a href="{{ route('about') }}" class="text-gray-700 hover:text-skyblue transition-colors font-medium py-2">About</a>
            <a href="{{ route('contact') }}" class="text-gray-700 hover:text-skyblue transition-colors font-medium py-2">Contact</a>
            
            <div class="pt-3 border-t border-gray-200">
                <span class="text-sm text-gray-700">Language:</span>

                <div class="relative mt-2">
                    <button id="mobileLangBtn"
                        class="flex items-center justify-between w-full border border-gray-200 px-3 py-2 rounded-md cursor-pointer">
                        <div class="flex items-center space-x-2">
                            <span class="text-lg">🇬🇧</span>
                            <span id="mobileCurrentLang" class="text-sm text-gray-700">English</span>
                        </div>
                        <i class="fa-solid fa-chevron-down text-xs text-gray-500"></i>
                    </button>

                    <!-- Dropdown -->
                    <div id="mobileLangDropdown"
                        class="absolute left-0 mt-2 w-full bg-white shadow-lg border border-gray-200 rounded-md py-2 hidden z-50">
                        <button class="mobile-lang-option w-full text-left px-4 py-2 text-sm hover:bg-gray-100 flex items-center space-x-2"
                            data-lang="English" data-flag="🇬🇧">
                            <span class="text-lg">🇬🇧</span><span>English</span>
                        </button>
                        <button class="mobile-lang-option w-full text-left px-4 py-2 text-sm hover:bg-gray-100 flex items-center space-x-2"
                            data-lang="Русский" data-flag="🇷🇺">
                            <span class="text-lg">🇷🇺</span><span>Русский</span>
                        </button>
                        <button class="mobile-lang-option w-full text-left px-4 py-2 text-sm hover:bg-gray-100 flex items-center space-x-2"
                            data-lang="O'zbek" data-flag="🇺🇿">
                            <span class="text-lg">🇺🇿</span><span>O'zbek</span>
                        </button>
                    </div>
                </div>
            </div>


        </nav>
    </div>
</header>

@push('scripts')
<script>
    // Mobile Menu Toggle
    document.getElementById('mobileMenuBtn').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenu.classList.toggle('hidden');
    });
    
    // Sign In Handler
    function handleSignIn() {
        Swal.fire({
            title: 'Sign In',
            html: `
                <input type="email" id="email" class="swal2-input" placeholder="Email">
                <input type="password" id="password" class="swal2-input" placeholder="Password">
            `,
            confirmButtonText: 'Sign In',
            confirmButtonColor: '#87CEEB',
            showCancelButton: true,
            focusConfirm: false,
            preConfirm: () => {
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;
                if (!email || !password) {
                    Swal.showValidationMessage('Please enter both email and password');
                }
                return { email: email, password: password };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Here you would normally send to your Laravel backend
                showSuccessAlert('Welcome back!');
            }
        });
    }

    // Desktop Dropdown
    const langBtn = document.getElementById("langBtn");
    const langDropdown = document.getElementById("langDropdown");
    const currentLang = document.getElementById("currentLang");

    langBtn.addEventListener("click", () => {
        langDropdown.classList.toggle("hidden");
    });

    document.querySelectorAll(".lang-option").forEach(option => {
        option.addEventListener("click", () => {
            const lang = option.dataset.lang;
            const flag = option.dataset.flag;

            langBtn.querySelector("span.text-lg").textContent = flag;
            currentLang.textContent = lang;

            langDropdown.classList.add("hidden");
        });
    });

    // Close desktop dropdown on outside click
    document.addEventListener("click", (e) => {
        if (!langBtn.contains(e.target) && !langDropdown.contains(e.target)) {
            langDropdown.classList.add("hidden");
        }
    });


    // Mobile Dropdown
    const mobileLangBtn = document.getElementById("mobileLangBtn");
    const mobileLangDropdown = document.getElementById("mobileLangDropdown");
    const mobileCurrentLang = document.getElementById("mobileCurrentLang");

    mobileLangBtn.addEventListener("click", () => {
        mobileLangDropdown.classList.toggle("hidden");
    });

    document.querySelectorAll(".mobile-lang-option").forEach(option => {
        option.addEventListener("click", () => {
            const lang = option.dataset.lang;
            const flag = option.dataset.flag;

            mobileLangBtn.querySelector("span.text-lg").textContent = flag;
            mobileCurrentLang.textContent = lang;

            mobileLangDropdown.classList.add("hidden");
        });
    });

    // Close mobile dropdown on outside click
    document.addEventListener("click", (e) => {
        if (!mobileLangBtn.contains(e.target) && !mobileLangDropdown.contains(e.target)) {
            mobileLangDropdown.classList.add("hidden");
        }
    });


</script>
@endpush