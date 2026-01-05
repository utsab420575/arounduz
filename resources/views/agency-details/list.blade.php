@extends('layouts.frontend')

@section('title', 'Travel Agencies - AroundUz')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-purple-600 to-blue-600 text-white py-8 md:py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-2xl md:text-4xl lg:text-5xl font-bold mb-3 md:mb-4">Find Trusted Travel Agencies</h1>
                <p class="text-base md:text-lg lg:text-xl opacity-90">Discover professional agencies offering
                    comprehensive travel packages</p>
            </div>
        </div>
    </section>

    <!-- Filters & Results Section -->
    <section class="py-6 md:py-8 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-6">
                <!-- Desktop Sidebar Filters -->
                <aside class="hidden lg:block lg:w-64 space-y-6">
                    <div class="bg-white rounded-lg shadow-sm p-6 sticky top-24">
                        <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                            <i class="fa-solid fa-filter text-purple-600 mr-2"></i>
                            Filters
                        </h3>

                        <form action="{{ route('agents') }}" method="GET" id="filterForm">
                            <!-- Keep search query -->
                            <input type="hidden" name="search" value="{{ request('search') }}">

                            <!-- Status Filter -->
                            <div class="mb-6">
                                <label class="block text-sm font-semibold text-gray-700 mb-3">Availability</label>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="status[]" value="online"
                                               {{ in_array('online', request('status', [])) ? 'checked' : '' }} class="rounded text-purple-600 focus:ring-purple-600">
                                        <span class="ml-2 text-sm text-gray-600">Available Now</span>
                                        <span class="ml-auto w-2 h-2 bg-green-500 rounded-full"></span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="status[]" value="busy"
                                               {{ in_array('busy', request('status', [])) ? 'checked' : '' }} class="rounded text-purple-600 focus:ring-purple-600">
                                        <span class="ml-2 text-sm text-gray-600">Busy</span>
                                        <span class="ml-auto w-2 h-2 bg-yellow-500 rounded-full"></span>
                                    </label>
                                </div>
                            </div>

                            <!-- Agency Type -->
                            <div class="mb-6">
                                <label class="block text-sm font-semibold text-gray-700 mb-3">Agency Type</label>
                                <div class="space-y-2">
                                    @php
                                        $types = ['Premium', 'Budget', 'Luxury', 'Adventure', 'Family'];
                                    @endphp
                                    @foreach($types as $type)
                                        <label class="flex items-center">
                                            <input type="checkbox" name="types[]" value="{{ $type }}"
                                                   {{ in_array($type, request('types', [])) ? 'checked' : '' }} class="rounded text-purple-600 focus:ring-purple-600">
                                            <span class="ml-2 text-sm text-gray-600">{{ $type }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Rating Filter -->
                            <div class="mb-6">
                                <label class="block text-sm font-semibold text-gray-700 mb-3">Minimum Rating</label>
                                <div class="space-y-2">
                                    @for($i = 5; $i >= 3; $i--)
                                        <label class="flex items-center">
                                            <input type="radio" name="rating" value="{{ $i }}"
                                                   {{ request('rating') == $i ? 'checked' : '' }} class="text-purple-600 focus:ring-purple-600">
                                            <span class="ml-2 text-sm text-gray-600 flex items-center">
                                        @for($j = 0; $j < $i; $j++)
                                                    <i class="fa-solid fa-star text-yellow-400 text-xs"></i>
                                                @endfor
                                        <span class="ml-1">& up</span>
                                    </span>
                                        </label>
                                    @endfor
                                </div>
                            </div>

                            <!-- Specializations -->
                            <div class="mb-6">
                                <label class="block text-sm font-semibold text-gray-700 mb-3">Specializations</label>
                                <div class="space-y-2">
                                    @php
                                        $specializations = ['Cultural Tours', 'Adventure Travel', 'Historical Sites', 'Food Tours', 'Photography'];
                                    @endphp
                                    @foreach($specializations as $spec)
                                        <label class="flex items-center">
                                            <input type="checkbox" name="specializations[]" value="{{ $spec }}"
                                                   {{ in_array($spec, request('specializations', [])) ? 'checked' : '' }} class="rounded text-purple-600 focus:ring-purple-600">
                                            <span class="ml-2 text-sm text-gray-600">{{ $spec }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Verified Only -->
                            <div class="mb-6">
                                <label class="flex items-center">
                                    <input type="checkbox" name="verified" value="1"
                                           {{ request('verified') ? 'checked' : '' }} class="rounded text-purple-600 focus:ring-purple-600">
                                    <span class="ml-2 text-sm text-gray-700 font-medium">
                                    <i class="fa-solid fa-shield-check text-blue-500 mr-1"></i>
                                    Verified Only
                                </span>
                                </label>
                            </div>

                            <!-- Action Buttons -->
                            <div class="space-y-2">
                                <button type="submit"
                                        class="w-full bg-purple-600 text-white py-2 rounded-lg font-semibold hover:bg-purple-700 transition-colors">
                                    Apply Filters
                                </button>
                                <a href="{{ route('agents') }}"
                                   class="block w-full text-center bg-gray-100 text-gray-700 py-2 rounded-lg font-semibold hover:bg-gray-200 transition-colors">
                                    Clear All
                                </a>
                            </div>
                        </form>
                    </div>
                </aside>

                <!-- Results -->
                <main class="flex-1">
                    <!-- Results Header with Search and Mobile Filter -->
                    <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
                        <!-- Search Bar -->
                        <form action="{{ route('agents') }}" method="GET" class="mb-4">
                            <div class="flex gap-2">
                                <div class="flex-1">
                                    <input type="text" name="search" value="{{ request('search') }}"
                                           placeholder="Search agencies by name or location..."
                                           class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-purple-600 text-sm">
                                </div>
                                <button type="submit"
                                        class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2.5 rounded-lg font-semibold transition-colors">
                                    <i class="fa-solid fa-search"></i>
                                    <span class="hidden md:inline ml-2">Search</span>
                                </button>
                                <!-- Mobile Filter Button -->
                                <button type="button" onclick="toggleMobileFilters()"
                                        class="lg:hidden bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2.5 rounded-lg font-semibold transition-colors">
                                    <i class="fa-solid fa-filter"></i>
                                    <span class="ml-2">Filters</span>
                                    @if(request()->hasAny(['status', 'rating', 'types', 'specializations', 'verified']))
                                        <span class="ml-1 bg-purple-600 text-white text-xs px-2 py-0.5 rounded-full">
                                        {{ count(array_filter([request('status'), request('rating'), request('types'), request('specializations'), request('verified')])) }}
                                    </span>
                                    @endif
                                </button>
                            </div>
                        </form>

                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                            <div>
                                <h2 class="text-xl font-bold text-gray-900">Travel Agencies</h2>
                                <p class="text-sm text-gray-600 mt-1">Showing {{ $agents->count() }}
                                    of {{ $agents->total() }} agencies</p>
                            </div>

                            <!-- Sort Options -->
                            <div class="flex items-center gap-3">
                                <label class="text-sm font-medium text-gray-700">Sort by:</label>
                                <select name="sort" onchange="this.form.submit()" form="filterForm"
                                        class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-purple-600">
                                    <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Most
                                        Popular
                                    </option>
                                    <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Highest
                                        Rated
                                    </option>
                                    <option value="tours" {{ request('sort') == 'tours' ? 'selected' : '' }}>Most
                                        Tours
                                    </option>
                                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest
                                        First
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!-- Active Filters -->
                        @if(request()->hasAny(['search', 'status', 'rating', 'types', 'specializations', 'verified']))
                            <div class="mt-4 flex flex-wrap gap-2">
                                <span class="text-sm font-medium text-gray-700">Active filters:</span>

                                @if(request('search'))
                                    <span
                                        class="inline-flex items-center gap-1 bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-medium">
                            Search: "{{ request('search') }}"
                            <a href="{{ route('agents', array_diff_key(request()->all(), ['search' => ''])) }}"
                               class="hover:text-purple-900">
                                <i class="fa-solid fa-times"></i>
                            </a>
                        </span>
                                @endif

                                @if(request('verified'))
                                    <span
                                        class="inline-flex items-center gap-1 bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-medium">
                            Verified Only
                            <a href="{{ route('agents', array_diff_key(request()->all(), ['verified' => ''])) }}"
                               class="hover:text-blue-900">
                                <i class="fa-solid fa-times"></i>
                            </a>
                        </span>
                                @endif

                                @foreach(request('status', []) as $status)
                                    <span
                                        class="inline-flex items-center gap-1 bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">
                            {{ ucfirst($status) }}
                            <a href="{{ route('agents', array_merge(request()->all(), ['status' => array_diff(request('status', []), [$status])])) }}"
                               class="hover:text-green-900">
                                <i class="fa-solid fa-times"></i>
                            </a>
                        </span>
                                @endforeach

                                <a href="{{ route('agents') }}"
                                   class="inline-flex items-center gap-1 bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium hover:bg-red-200">
                                    Clear all <i class="fa-solid fa-times"></i>
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Agencies Grid -->
                    @if($agents->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">
                            @foreach($agents as $agent)
                                @include('partials.frontend.agent-card', ['agent' => $agent])
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            {{ $agents->appends(request()->except('page'))->links() }}
                        </div>
                    @else
                        <!-- No Results -->
                        <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                            <i class="fa-solid fa-building text-gray-300 text-6xl mb-4"></i>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">No agencies found</h3>
                            <p class="text-gray-600 mb-6">Try adjusting your filters or search terms</p>
                            <a href="{{ route('agents') }}"
                               class="inline-block bg-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-700 transition-colors">
                                Clear Filters
                            </a>
                        </div>
                    @endif
                </main>
            </div>
        </div>
    </section>

    <!-- Mobile Filter Modal -->
    <div id="mobileFilterModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden lg:hidden">
        <div
            class="fixed inset-y-0 right-0 w-full sm:w-96 bg-white shadow-xl transform translate-x-full transition-transform duration-300"
            id="mobileFilterPanel">
            <div class="h-full flex flex-col">
                <!-- Header -->
                <div
                    class="flex items-center justify-between p-4 border-b border-gray-200 bg-gradient-to-r from-purple-600 to-blue-600 text-white">
                    <h3 class="text-lg font-bold flex items-center">
                        <i class="fa-solid fa-filter mr-2"></i>
                        Filters
                    </h3>
                    <button onclick="toggleMobileFilters()"
                            class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-white hover:bg-opacity-20 transition-colors">
                        <i class="fa-solid fa-times text-xl"></i>
                    </button>
                </div>

                <!-- Filter Content -->
                <div class="flex-1 overflow-y-auto p-4">
                    <form action="{{ route('agents') }}" method="GET" id="mobileFilterForm">
                        <!-- Keep search query -->
                        <input type="hidden" name="search" value="{{ request('search') }}">

                        <!-- Status Filter -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Availability</label>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="checkbox" name="status[]" value="online"
                                           {{ in_array('online', request('status', [])) ? 'checked' : '' }} class="rounded text-purple-600 focus:ring-purple-600">
                                    <span class="ml-2 text-sm text-gray-600">Available Now</span>
                                    <span class="ml-auto w-2 h-2 bg-green-500 rounded-full"></span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="status[]" value="busy"
                                           {{ in_array('busy', request('status', [])) ? 'checked' : '' }} class="rounded text-purple-600 focus:ring-purple-600">
                                    <span class="ml-2 text-sm text-gray-600">Busy</span>
                                    <span class="ml-auto w-2 h-2 bg-yellow-500 rounded-full"></span>
                                </label>
                            </div>
                        </div>

                        <!-- Agency Type -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Agency Type</label>
                            <div class="space-y-2">
                                @php
                                    $types = ['Premium', 'Budget', 'Luxury', 'Adventure', 'Family'];
                                @endphp
                                @foreach($types as $type)
                                    <label class="flex items-center">
                                        <input type="checkbox" name="types[]" value="{{ $type }}"
                                               {{ in_array($type, request('types', [])) ? 'checked' : '' }} class="rounded text-purple-600 focus:ring-purple-600">
                                        <span class="ml-2 text-sm text-gray-600">{{ $type }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Rating Filter -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Minimum Rating</label>
                            <div class="space-y-2">
                                @for($i = 5; $i >= 3; $i--)
                                    <label class="flex items-center">
                                        <input type="radio" name="rating" value="{{ $i }}"
                                               {{ request('rating') == $i ? 'checked' : '' }} class="text-purple-600 focus:ring-purple-600">
                                        <span class="ml-2 text-sm text-gray-600 flex items-center">
                                    @for($j = 0; $j < $i; $j++)
                                                <i class="fa-solid fa-star text-yellow-400 text-xs"></i>
                                            @endfor
                                    <span class="ml-1">& up</span>
                                </span>
                                    </label>
                                @endfor
                            </div>
                        </div>

                        <!-- Specializations -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Specializations</label>
                            <div class="space-y-2">
                                @php
                                    $specializations = ['Cultural Tours', 'Adventure Travel', 'Historical Sites', 'Food Tours', 'Photography'];
                                @endphp
                                @foreach($specializations as $spec)
                                    <label class="flex items-center">
                                        <input type="checkbox" name="specializations[]" value="{{ $spec }}"
                                               {{ in_array($spec, request('specializations', [])) ? 'checked' : '' }} class="rounded text-purple-600 focus:ring-purple-600">
                                        <span class="ml-2 text-sm text-gray-600">{{ $spec }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Verified Only -->
                        <div class="mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" name="verified" value="1"
                                       {{ request('verified') ? 'checked' : '' }} class="rounded text-purple-600 focus:ring-purple-600">
                                <span class="ml-2 text-sm text-gray-700 font-medium">
                                <i class="fa-solid fa-shield-check text-blue-500 mr-1"></i>
                                Verified Only
                            </span>
                            </label>
                        </div>
                    </form>
                </div>

                <!-- Footer Actions -->
                <div class="p-4 border-t border-gray-200 space-y-2">
                    <button type="submit" form="mobileFilterForm"
                            class="w-full bg-purple-600 text-white py-3 rounded-lg font-semibold hover:bg-purple-700 transition-colors">
                        Apply Filters
                    </button>
                    <a href="{{ route('agents') }}"
                       class="block w-full text-center bg-gray-100 text-gray-700 py-3 rounded-lg font-semibold hover:bg-gray-200 transition-colors">
                        Clear All
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <section class="bg-gradient-to-r from-purple-600 to-blue-600 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Register Your Travel Agency</h2>
            <p class="text-lg opacity-90 mb-6">Join AroundUz and reach thousands of travelers</p>
            <a href="#"
               class="inline-block bg-white text-purple-600 px-8 py-3 rounded-lg font-bold hover:bg-gray-100 transition-colors">
                Register Now
            </a>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Auto-submit form on checkbox change (desktop only)
        document.querySelectorAll('#filterForm input[type="checkbox"], #filterForm input[type="radio"]').forEach(input => {
            input.addEventListener('change', function () {
                document.getElementById('filterForm').submit();
            });
        });

        // Mobile filter toggle
        function toggleMobileFilters() {
            const modal = document.getElementById('mobileFilterModal');
            const panel = document.getElementById('mobileFilterPanel');

            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
                setTimeout(() => {
                    panel.classList.remove('translate-x-full');
                }, 10);
                document.body.style.overflow = 'hidden';
            } else {
                panel.classList.add('translate-x-full');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    document.body.style.overflow = '';
                }, 300);
            }
        }

        // Close on overlay click
        document.getElementById('mobileFilterModal')?.addEventListener('click', function (e) {
            if (e.target === this) {
                toggleMobileFilters();
            }
        });

        // Close on escape key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                const modal = document.getElementById('mobileFilterModal');
                if (!modal.classList.contains('hidden')) {
                    toggleMobileFilters();
                }
            }
        });
    </script>
@endpush
