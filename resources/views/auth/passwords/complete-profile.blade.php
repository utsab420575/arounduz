@extends('layouts.guest_auth')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-cyan-50 to-indigo-100 py-8 lg:py-12 px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="inline-block">
                    <img src="{{ asset('logo_b.png') }}" alt="AroundUz Logo" class="h-12 lg:h-16 w-auto object-contain mb-4">
                </div>
                <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-3">Complete Your Profile</h1>
                <p class="text-gray-600 text-lg">Just a few more details to get started</p>
            </div>

            <!-- Progress Steps -->
            <div class="mb-8">
                <div class="flex items-center justify-center">
                    <!-- Step 1 -->
                    <div class="flex items-center">
                        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-skyblue text-white font-semibold step-indicator" data-step="1">
                            1
                        </div>
                        <span class="ml-2 text-sm font-medium text-gray-900 hidden sm:inline">Basic Info</span>
                    </div>

                    @if(in_array($user->role, ['guide', 'agency']))
                        <!-- Divider -->
                        <div class="flex-1 h-1 mx-2 sm:mx-4 bg-gray-300 step-divider max-w-[100px]"></div>

                        <!-- Step 2 -->
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-300 text-gray-600 font-semibold step-indicator" data-step="2">
                                2
                            </div>
                            <span class="ml-2 text-sm font-medium text-gray-600 hidden sm:inline">
                        @if($user->role === 'guide')
                                    Guide Details
                                @else
                                    Agency Details
                                @endif
                    </span>
                        </div>

                        <!-- Divider -->
                        <div class="flex-1 h-1 mx-2 sm:mx-4 bg-gray-300 step-divider max-w-[100px]"></div>

                        <!-- Step 3 -->
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-300 text-gray-600 font-semibold step-indicator" data-step="3">
                                3
                            </div>
                            <span class="ml-2 text-sm font-medium text-gray-600 hidden sm:inline">Languages & Skills</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-xl p-6 lg:p-10">
                <form method="POST" action="{{ route('profile.complete.store') }}" id="profileForm">
                    @csrf

                    <!-- Step 1: Basic Information -->
                    <div class="form-step" data-step="1">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <i class="fa-solid fa-user-circle text-skyblue mr-3"></i>
                            Basic Information
                        </h3>

                        <!-- Phone -->
                        <div class="mb-6">
                            <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fa-solid fa-phone text-skyblue mr-2"></i>Phone Number <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="phone" id="phone" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skyblue focus:border-transparent"
                                   placeholder="+998 90 123 45 67" value="{{ old('phone') }}">
                            @error('phone')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Country -->
                        <div class="mb-6">
                            <label for="country_id" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fa-solid fa-globe text-skyblue mr-2"></i>Country <span class="text-red-500">*</span>
                            </label>
                            <select name="country_id" id="country_id" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skyblue focus:border-transparent">
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                        {{ $country->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('country_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- City -->
                        <div class="mb-6">
                            <label for="city_id" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fa-solid fa-city text-skyblue mr-2"></i>City
                            </label>
                            <select name="city_id" id="city_id"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skyblue focus:border-transparent">
                                <option value="">Select City</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('city_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        @if($user->role === 'user')
                            <!-- For regular users, this is all we need -->
                            <div class="flex justify-end mt-8">
                                <button type="submit"
                                        class="bg-gradient-to-r from-skyblue via-blue-500 to-blue-600 text-white px-8 py-3 rounded-lg hover:shadow-xl transition-all duration-300 font-semibold">
                                    Complete Profile
                                    <i class="fas fa-check ml-2"></i>
                                </button>
                            </div>
                        @else
                            <!-- For guides and agencies, show next button -->
                            <div class="flex justify-end mt-8">
                                <button type="button" class="btn-next bg-gradient-to-r from-skyblue via-blue-500 to-blue-600 text-white px-8 py-3 rounded-lg hover:shadow-xl transition-all duration-300 font-semibold">
                                    Next Step
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </button>
                            </div>
                        @endif
                    </div>

                    @if($user->role === 'guide')
                        <!-- Step 2: Guide Details -->
                        <div class="form-step hidden" data-step="2">
                            <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                                <i class="fa-solid fa-user-tie text-skyblue mr-3"></i>
                                Guide Details
                            </h3>

                            <!-- Experience Years -->
                            <div class="mb-6">
                                <label for="experience_years" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fa-solid fa-calendar-days text-skyblue mr-2"></i>Years of Experience <span class="text-red-500">*</span>
                                </label>
                                <input type="number" name="experience_years" id="experience_years" required min="0" max="50"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skyblue focus:border-transparent"
                                       placeholder="5" value="{{ old('experience_years') }}">
                                @error('experience_years')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <!-- Hourly Rate -->
                                <div>
                                    <label for="hourly_rate" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fa-solid fa-dollar-sign text-skyblue mr-2"></i>Hourly Rate (USD)
                                    </label>
                                    <input type="number" name="hourly_rate" id="hourly_rate" step="0.01" min="0"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skyblue focus:border-transparent"
                                           placeholder="25.00" value="{{ old('hourly_rate') }}">
                                    @error('hourly_rate')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Daily Rate -->
                                <div>
                                    <label for="daily_rate" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fa-solid fa-money-bill-wave text-skyblue mr-2"></i>Daily Rate (USD)
                                    </label>
                                    <input type="number" name="daily_rate" id="daily_rate" step="0.01" min="0"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skyblue focus:border-transparent"
                                           placeholder="150.00" value="{{ old('daily_rate') }}">
                                    @error('daily_rate')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Navigation -->
                            <div class="flex justify-between mt-8">
                                <button type="button" class="btn-prev bg-gray-200 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-300 transition-all font-semibold">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    Previous
                                </button>
                                <button type="button" class="btn-next bg-gradient-to-r from-skyblue via-blue-500 to-blue-600 text-white px-8 py-3 rounded-lg hover:shadow-xl transition-all duration-300 font-semibold">
                                    Next Step
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Step 3: Languages & Specializations -->
                        <div class="form-step hidden" data-step="3">
                            <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                                <i class="fa-solid fa-language text-skyblue mr-3"></i>
                                Languages & Specializations
                            </h3>

                            <!-- Languages -->
                            <div class="mb-6">
                                <label class="block text-sm font-semibold text-gray-700 mb-3">
                                    <i class="fa-solid fa-comments text-skyblue mr-2"></i>Languages You Speak <span class="text-red-500">*</span>
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                                    @foreach($languages as $language)
                                        <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg hover:border-skyblue cursor-pointer transition-all group">
                                            <input type="checkbox" name="languages[]" value="{{ $language->id }}"
                                                   class="h-5 w-5 text-skyblue border-gray-300 rounded focus:ring-skyblue"
                                                {{ is_array(old('languages')) && in_array($language->id, old('languages')) ? 'checked' : '' }}>
                                            <span class="ml-3 text-sm text-gray-700 font-medium group-hover:text-skyblue">{{ $language->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                                @error('languages')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Specializations -->
                            <div class="mb-6">
                                <label class="block text-sm font-semibold text-gray-700 mb-3">
                                    <i class="fa-solid fa-star text-skyblue mr-2"></i>Your Specializations <span class="text-red-500">*</span>
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                    @foreach($specializations as $specialization)
                                        <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg hover:border-skyblue cursor-pointer transition-all group">
                                            <input type="checkbox" name="specializations[]" value="{{ $specialization->id }}"
                                                   class="h-5 w-5 text-skyblue border-gray-300 rounded focus:ring-skyblue"
                                                {{ is_array(old('specializations')) && in_array($specialization->id, old('specializations')) ? 'checked' : '' }}>
                                            <span class="ml-3 text-sm text-gray-700 font-medium group-hover:text-skyblue">{{ $specialization->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                                @error('specializations')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Navigation -->
                            <div class="flex justify-between mt-8">
                                <button type="button" class="btn-prev bg-gray-200 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-300 transition-all font-semibold">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    Previous
                                </button>
                                <button type="submit"
                                        class="bg-gradient-to-r from-green-500 to-green-600 text-white px-8 py-3 rounded-lg hover:shadow-xl transition-all duration-300 font-semibold">
                                    Complete Profile
                                    <i class="fas fa-check ml-2"></i>
                                </button>
                            </div>
                        </div>
                    @endif

                    @if($user->role === 'agency')
                        <!-- Step 2: Agency Details -->
                        <div class="form-step hidden" data-step="2">
                            <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                                <i class="fa-solid fa-building text-skyblue mr-3"></i>
                                Agency Details
                            </h3>

                            <!-- Company Name -->
                            <div class="mb-6">
                                <label for="company_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fa-solid fa-building-circle-check text-skyblue mr-2"></i>Company Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="company_name" id="company_name" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skyblue focus:border-transparent"
                                       placeholder="Amazing Travel Agency" value="{{ old('company_name') }}">
                                @error('company_name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <!-- License Number -->
                                <div>
                                    <label for="license_number" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fa-solid fa-certificate text-skyblue mr-2"></i>License Number <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="license_number" id="license_number" required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skyblue focus:border-transparent"
                                           placeholder="LIC-2024-12345" value="{{ old('license_number') }}">
                                    @error('license_number')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Established Year -->
                                <div>
                                    <label for="established" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fa-solid fa-calendar-check text-skyblue mr-2"></i>Established Year
                                    </label>
                                    <input type="number" name="established" id="established" min="1900" max="{{ date('Y') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skyblue focus:border-transparent"
                                           placeholder="2020" value="{{ old('established') }}">
                                    @error('established')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Navigation -->
                            <div class="flex justify-between mt-8">
                                <button type="button" class="btn-prev bg-gray-200 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-300 transition-all font-semibold">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    Previous
                                </button>
                                <button type="button" class="btn-next bg-gradient-to-r from-skyblue via-blue-500 to-blue-600 text-white px-8 py-3 rounded-lg hover:shadow-xl transition-all duration-300 font-semibold">
                                    Next Step
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Step 3: Languages & Specializations -->
                        <div class="form-step hidden" data-step="3">
                            <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                                <i class="fa-solid fa-language text-skyblue mr-3"></i>
                                Languages & Specializations
                            </h3>

                            <!-- Languages -->
                            <div class="mb-6">
                                <label class="block text-sm font-semibold text-gray-700 mb-3">
                                    <i class="fa-solid fa-comments text-skyblue mr-2"></i>Languages Offered <span class="text-red-500">*</span>
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                                    @foreach($languages as $language)
                                        <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg hover:border-skyblue cursor-pointer transition-all group">
                                            <input type="checkbox" name="languages[]" value="{{ $language->id }}"
                                                   class="h-5 w-5 text-skyblue border-gray-300 rounded focus:ring-skyblue"
                                                {{ is_array(old('languages')) && in_array($language->id, old('languages')) ? 'checked' : '' }}>
                                            <span class="ml-3 text-sm text-gray-700 font-medium group-hover:text-skyblue">{{ $language->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                                @error('languages')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Specializations -->
                            <div class="mb-6">
                                <label class="block text-sm font-semibold text-gray-700 mb-3">
                                    <i class="fa-solid fa-star text-skyblue mr-2"></i>Tour Specializations <span class="text-red-500">*</span>
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                    @foreach($specializations as $specialization)
                                        <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg hover:border-skyblue cursor-pointer transition-all group">
                                            <input type="checkbox" name="specializations[]" value="{{ $specialization->id }}"
                                                   class="h-5 w-5 text-skyblue border-gray-300 rounded focus:ring-skyblue"
                                                {{ is_array(old('specializations')) && in_array($specialization->id, old('specializations')) ? 'checked' : '' }}>
                                            <span class="ml-3 text-sm text-gray-700 font-medium group-hover:text-skyblue">{{ $specialization->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                                @error('specializations')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Navigation -->
                            <div class="flex justify-between mt-8">
                                <button type="button" class="btn-prev bg-gray-200 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-300 transition-all font-semibold">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    Previous
                                </button>
                                <button type="submit"
                                        class="bg-gradient-to-r from-green-500 to-green-600 text-white px-8 py-3 rounded-lg hover:shadow-xl transition-all duration-300 font-semibold">
                                    Complete Profile
                                    <i class="fas fa-check ml-2"></i>
                                </button>
                            </div>
                        </div>
                    @endif

                </form>
            </div>
        </div>
    </div>

    <script>
        let currentStep = 1;
        const totalSteps = {{ $user->role === 'user' ? 1 : 3 }};

        // Next button
        document.querySelectorAll('.btn-next').forEach(btn => {
            btn.addEventListener('click', function() {
                if (validateStep(currentStep)) {
                    currentStep++;
                    updateSteps();
                }
            });
        });

        // Previous button
        document.querySelectorAll('.btn-prev').forEach(btn => {
            btn.addEventListener('click', function() {
                currentStep--;
                updateSteps();
            });
        });

        function updateSteps() {
            // Hide all steps
            document.querySelectorAll('.form-step').forEach(step => {
                step.classList.add('hidden');
            });

            // Show current step
            document.querySelector(`.form-step[data-step="${currentStep}"]`).classList.remove('hidden');

            // Update progress indicators
            document.querySelectorAll('.step-indicator').forEach((indicator, index) => {
                const stepNum = index + 1;
                if (stepNum < currentStep) {
                    indicator.classList.remove('bg-gray-300', 'text-gray-600', 'bg-skyblue', 'text-white');
                    indicator.classList.add('bg-green-500', 'text-white');
                    indicator.innerHTML = '<i class="fas fa-check"></i>';
                } else if (stepNum === currentStep) {
                    indicator.classList.remove('bg-gray-300', 'text-gray-600', 'bg-green-500');
                    indicator.classList.add('bg-skyblue', 'text-white');
                    indicator.textContent = stepNum;
                } else {
                    indicator.classList.remove('bg-skyblue', 'bg-green-500', 'text-white');
                    indicator.classList.add('bg-gray-300', 'text-gray-600');
                    indicator.textContent = stepNum;
                }
            });

            // Update step dividers
            document.querySelectorAll('.step-divider').forEach((divider, index) => {
                if (index < currentStep - 1) {
                    divider.classList.remove('bg-gray-300');
                    divider.classList.add('bg-green-500');
                } else {
                    divider.classList.remove('bg-green-500');
                    divider.classList.add('bg-gray-300');
                }
            });

            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function validateStep(step) {
            const currentStepElement = document.querySelector(`.form-step[data-step="${step}"]`);
            const requiredInputs = currentStepElement.querySelectorAll('[required]');
            let isValid = true;

            requiredInputs.forEach(input => {
                if (input.type === 'checkbox') {
                    // Skip individual checkbox validation
                    return;
                }
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('border-red-500');
                    input.classList.remove('border-gray-300');
                } else {
                    input.classList.remove('border-red-500');
                    input.classList.add('border-gray-300');
                }
            });

            // Validate checkboxes for languages and specializations
            if (step === 3) {
                const languagesChecked = currentStepElement.querySelectorAll('input[name="languages[]"]:checked').length;
                const specializationsChecked = currentStepElement.querySelectorAll('input[name="specializations[]"]:checked').length;

                if (languagesChecked === 0) {
                    isValid = false;
                    Swal.fire({
                        icon: 'warning',
                        title: 'Required',
                        text: 'Please select at least one language.',
                        confirmButtonColor: '#87CEEB'
                    });
                } else if (specializationsChecked === 0) {
                    isValid = false;
                    Swal.fire({
                        icon: 'warning',
                        title: 'Required',
                        text: 'Please select at least one specialization.',
                        confirmButtonColor: '#87CEEB'
                    });
                }
            }

            if (!isValid && step !== 3) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Required Fields',
                    text: 'Please fill in all required fields.',
                    confirmButtonColor: '#87CEEB'
                });
            }

            return isValid;
        }
    </script>
@endsection
