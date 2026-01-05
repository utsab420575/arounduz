<!-- Topbar -->
<header class="bg-white border-b border-gray-200 px-4 lg:px-6 py-4">
    <div class="flex items-center justify-between">
        <!-- Left Side: Mobile Menu + Breadcrumbs -->
        <div class="flex items-center space-x-4">
            <!-- Mobile Sidebar Toggle -->
            <button id="sidebarToggle" onclick="toggleSidebar()" class="lg:hidden text-gray-600 hover:text-skyblue">
                <i class="fa-solid fa-bars text-xl"></i>
            </button>

            <!-- Breadcrumbs -->
            <nav class="hidden md:flex items-center text-sm text-gray-600">
                @yield('breadcrumbs')
            </nav>
        </div>

        <!-- Right Side: Search + Notifications + User Menu -->
        <div class="flex items-center space-x-2 lg:space-x-4">
            <!-- Search -->
            <div class="relative hidden lg:block">
                <input type="text" placeholder="Search..."
                       class="w-64 px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skyblue focus:border-transparent">
                <i class="fa-solid fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>

            <!-- Notifications -->
            <div class="relative">
                <button id="notificationBtn" class="relative p-2 text-gray-600 hover:text-skyblue transition-colors">
                    <i class="fa-solid fa-bell text-xl"></i>
                    <span class="absolute top-0 right-0 w-4 h-4 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
                </button>

                <!-- Notification Dropdown -->
                <div id="notificationDropdown" class="hidden absolute right-0 mt-2 w-80 bg-white shadow-lg border border-gray-200 rounded-lg z-50">
                    <div class="p-4 border-b border-gray-200">
                        <h3 class="font-semibold text-gray-900">Notifications</h3>
                    </div>
                    <div class="max-h-96 overflow-y-auto">
                        <a href="#" class="block p-4 hover:bg-gray-50 border-b border-gray-100">
                            <div class="flex items-start">
                                <div class="w-10 h-10 bg-skyblue bg-opacity-20 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fa-solid fa-calendar-check text-skyblue"></i>
                                </div>
                                <div class="ml-3 flex-1">
                                    <p class="text-sm font-medium text-gray-900">New booking request</p>
                                    <p class="text-xs text-gray-600 mt-1">2 hours ago</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="block p-4 hover:bg-gray-50 border-b border-gray-100">
                            <div class="flex items-start">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fa-solid fa-star text-green-600"></i>
                                </div>
                                <div class="ml-3 flex-1">
                                    <p class="text-sm font-medium text-gray-900">New review received</p>
                                    <p class="text-xs text-gray-600 mt-1">5 hours ago</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="block p-4 hover:bg-gray-50">
                            <div class="flex items-start">
                                <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fa-solid fa-message text-purple-600"></i>
                                </div>
                                <div class="ml-3 flex-1">
                                    <p class="text-sm font-medium text-gray-900">New message</p>
                                    <p class="text-xs text-gray-600 mt-1">1 day ago</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-3 border-t border-gray-200 text-center">
                        <a href="#" class="text-sm text-skyblue hover:underline">View all notifications</a>
                    </div>
                </div>
            </div>

            <!-- User Menu -->
            <div class="relative">
                <button id="userMenuBtn" class="flex items-center space-x-2 p-2 hover:bg-gray-100 rounded-lg transition-colors">
                    @if(Auth::user()->avatar)
                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="w-8 h-8 rounded-full">
                    @else
                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-skyblue to-blue-600 flex items-center justify-center">
                            <span class="text-sm font-bold text-white">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                    @endif
                    <div class="hidden lg:block text-left">
                        <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-600 capitalize">{{ Auth::user()->getRoleName() }}</p>
                    </div>
                    <i class="fa-solid fa-chevron-down text-xs text-gray-500"></i>
                </button>

                <!-- User Dropdown -->
                <div id="userDropdown" class="hidden absolute right-0 mt-2 w-56 bg-white shadow-lg border border-gray-200 rounded-lg z-50">
                    <div class="p-4 border-b border-gray-200">
                        <p class="font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-600">{{ Auth::user()->email }}</p>
                    </div>
                    <div class="py-2">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fa-solid fa-user mr-2"></i>My Profile
                        </a>
                        <a href="{{ route('home') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fa-solid fa-globe mr-2"></i>Visit Website
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fa-solid fa-cog mr-2"></i>Settings
                        </a>
                    </div>
                    <div class="border-t border-gray-200">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                <i class="fa-solid fa-sign-out-alt mr-2"></i>Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

@push('scripts')
    <script>
        // Notification Dropdown
        const notificationBtn = document.getElementById('notificationBtn');
        const notificationDropdown = document.getElementById('notificationDropdown');

        notificationBtn?.addEventListener('click', (e) => {
            e.stopPropagation();
            notificationDropdown.classList.toggle('hidden');
            userDropdown.classList.add('hidden');
        });

        // User Menu Dropdown
        const userMenuBtn = document.getElementById('userMenuBtn');
        const userDropdown = document.getElementById('userDropdown');

        userMenuBtn?.addEventListener('click', (e) => {
            e.stopPropagation();
            userDropdown.classList.toggle('hidden');
            notificationDropdown.classList.add('hidden');
        });

        // Close dropdowns on outside click
        document.addEventListener('click', () => {
            notificationDropdown?.classList.add('hidden');
            userDropdown?.classList.add('hidden');
        });
    </script>
@endpush
