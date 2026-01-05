<!-- Sidebar -->
<aside id="sidebar" class="w-64 bg-white border-r border-gray-200 flex flex-col fixed lg:relative h-full z-40 lg:z-0">
    <!-- Logo -->
    <div class="p-6 border-b border-gray-200">
        <a href="{{ route('dashboard') }}" class="flex items-center">
            <img src="{{ asset('logo_b.png') }}" alt="AroundUz" class="h-10 w-auto">
        </a>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto py-4">
        <!-- Dashboard (All Roles) -->
        <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors {{ request()->routeIs('dashboard') ? 'bg-skyblue bg-opacity-10 text-skyblue border-r-4 border-skyblue' : '' }}">
            <i class="fa-solid fa-home w-5"></i>
            <span class="ml-3 font-medium">Dashboard</span>
        </a>

        @role('admin')
        <!-- Admin Menu -->
        <div class="mt-4">
            <p class="px-6 py-2 text-xs font-semibold text-gray-500 uppercase">User Management</p>

            <a href="{{ route('admin.users.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-users w-5"></i>
                <span class="ml-3">All Users</span>
            </a>

            <a href="{{ route('admin.users.tourists') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-user w-5"></i>
                <span class="ml-3">Tourists</span>
            </a>

            <a href="{{ route('admin.users.guides') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-user-tie w-5"></i>
                <span class="ml-3">Guides</span>
            </a>

            <a href="{{ route('admin.users.agencies') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-building w-5"></i>
                <span class="ml-3">Agencies</span>
            </a>
        </div>

        <div class="mt-4">
            <p class="px-6 py-2 text-xs font-semibold text-gray-500 uppercase">Verifications</p>

            <a href="{{ route('admin.verifications.guides') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-shield-check w-5"></i>
                <span class="ml-3">Pending Guides</span>
                <span class="ml-auto bg-coral text-white text-xs px-2 py-1 rounded-full">5</span>
            </a>

            <a href="{{ route('admin.verifications.agencies') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-certificate w-5"></i>
                <span class="ml-3">Pending Agencies</span>
                <span class="ml-auto bg-coral text-white text-xs px-2 py-1 rounded-full">3</span>
            </a>
        </div>

        <div class="mt-4">
            <p class="px-6 py-2 text-xs font-semibold text-gray-500 uppercase">Management</p>

            <a href="{{ route('admin.bookings.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-calendar-check w-5"></i>
                <span class="ml-3">Bookings</span>
            </a>

            <a href="{{ route('admin.reviews.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-star w-5"></i>
                <span class="ml-3">Reviews</span>
            </a>

            <a href="{{ route('admin.subscriptions.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-crown w-5"></i>
                <span class="ml-3">Subscriptions</span>
            </a>

            <a href="{{ route('admin.settings') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-cog w-5"></i>
                <span class="ml-3">Settings</span>
            </a>
        </div>
        @endrole

        @role('tourist')
        <!-- Tourist Menu -->
        <div class="mt-4">
            <a href="{{ route('tourist.bookings.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-calendar-check w-5"></i>
                <span class="ml-3">My Bookings</span>
            </a>

            <a href="{{ route('tourist.favorites.guides') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-heart w-5"></i>
                <span class="ml-3">Favorite Guides</span>
            </a>

            <a href="{{ route('tourist.favorites.agencies') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-building w-5"></i>
                <span class="ml-3">Favorite Agencies</span>
            </a>

            <a href="{{ route('tourist.messages.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-message w-5"></i>
                <span class="ml-3">Messages</span>
                <span class="ml-auto bg-skyblue text-white text-xs px-2 py-1 rounded-full">2</span>
            </a>

            <a href="{{ route('tourist.reviews.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-star w-5"></i>
                <span class="ml-3">My Reviews</span>
            </a>
        </div>
        @endrole

        @role('guide')
        <!-- Guide Menu -->
        <div class="mt-4">
            <a href="{{ route('guide.profile.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-user-circle w-5"></i>
                <span class="ml-3">My Profile</span>
            </a>

            <a href="{{ route('guide.bookings.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-calendar-check w-5"></i>
                <span class="ml-3">My Bookings</span>
            </a>

            <a href="{{ route('guide.reviews.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-star w-5"></i>
                <span class="ml-3">My Reviews</span>
            </a>

            <a href="{{ route('guide.availability.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-calendar-alt w-5"></i>
                <span class="ml-3">Availability</span>
            </a>

            <a href="{{ route('guide.earnings.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-coins w-5"></i>
                <span class="ml-3">Earnings</span>
            </a>
        </div>
        @endrole

        @role('agency')
        <!-- Agency Menu -->
        <div class="mt-4">
            <a href="{{ route('agency.profile.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-building-circle-check w-5"></i>
                <span class="ml-3">Company Profile</span>
            </a>

            <a href="{{ route('agency.packages.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-suitcase w-5"></i>
                <span class="ml-3">Tour Packages</span>
            </a>

            <a href="{{ route('agency.team.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-users w-5"></i>
                <span class="ml-3">Team Members</span>
            </a>

            <a href="{{ route('agency.bookings.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-calendar-check w-5"></i>
                <span class="ml-3">My Bookings</span>
            </a>

            <a href="{{ route('agency.reviews.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-star w-5"></i>
                <span class="ml-3">My Reviews</span>
            </a>

            <a href="{{ route('agency.earnings.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-coins w-5"></i>
                <span class="ml-3">Earnings</span>
            </a>
        </div>
        @endrole

        <!-- Profile Settings (All Roles) -->
        <div class="mt-4 border-t border-gray-200 pt-4">
            <a href="{{ route('profile.edit') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-skyblue hover:bg-opacity-10 hover:text-skyblue transition-colors">
                <i class="fa-solid fa-cog w-5"></i>
                <span class="ml-3">Profile Settings</span>
            </a>
        </div>
    </nav>

    <!-- Sidebar Footer -->
    <div class="p-4 border-t border-gray-200">
        <div class="bg-gradient-to-r from-skyblue to-blue-500 rounded-lg p-4 text-white text-center">
            <i class="fa-solid fa-crown text-2xl mb-2"></i>
            <p class="text-sm font-semibold mb-1">Upgrade to Pro</p>
            <p class="text-xs opacity-90 mb-3">Get more features</p>
            <button class="bg-white text-skyblue px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-100 transition-colors w-full">
                Learn More
            </button>
        </div>
    </div>
</aside>
