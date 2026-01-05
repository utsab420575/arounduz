@extends('layouts.frontend')

@section('title', 'Sign Up - AroundUz')

@section('content')
    <section class="py-12 md:py-20 bg-gradient-to-br from-blue-50 via-cyan-50 to-indigo-100">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto">

                <!-- Register Card -->
                <div class="bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden">
                    <!-- Header -->
                    <div class="bg-gradient-to-r from-skyblue to-blue-500 px-6 py-8 text-center">
                        <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fa-solid fa-user-plus text-3xl text-white"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-white">Create Your Account</h2>
                        <p class="text-blue-100 mt-2">Join AroundUz and start your journey!</p>
                    </div>

                    <!-- Form -->
                    <form method="POST" action="{{ route('register') }}" class="p-6 space-y-6">
                        @csrf

                        <!-- Role Selection -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">
                                <i class="fa-solid fa-user-tag text-skyblue mr-2"></i>I want to register as:
                            </label>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <!-- Tourist -->
                                <label class="role-card cursor-pointer">
                                    <input type="radio" name="role" value="tourist" class="hidden role-input" checked>
                                    <div class="role-content border-2 border-gray-200 rounded-xl p-4 text-center hover:border-skyblue transition-all">
                                        <div class="w-16 h-16 bg-skyblue bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-3">
                                            <i class="fa-solid fa-user text-skyblue text-2xl"></i>
                                        </div>
                                        <h3 class="font-semibold text-gray-900">Tourist</h3>
                                        <p class="text-xs text-gray-600 mt-1">Explore & Book Tours</p>
                                    </div>
                                </label>

                                <!-- Guide -->
                                <label class="role-card cursor-pointer">
                                    <input type="radio" name="role" value="guide" class="hidden role-input">
                                    <div class="role-content border-2 border-gray-200 rounded-xl p-4 text-center hover:border-coral transition-all">
                                        <div class="w-16 h-16 bg-coral bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-3">
                                            <i class="fa-solid fa-user-tie text-coral text-2xl"></i>
                                        </div>
                                        <h3 class="font-semibold text-gray-900">Tour Guide</h3>
                                        <p class="text-xs text-gray-600 mt-1">Offer Guide Services</p>
                                    </div>
                                </label>

                                <!-- Agency -->
                                <label class="role-card cursor-pointer">
                                    <input type="radio" name="role" value="agency" class="hidden role-input">
                                    <div class="role-content border-2 border-gray-200 rounded-xl p-4 text-center hover:border-green-500 transition-all">
                                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                            <i class="fa-solid fa-building text-green-600 text-2xl"></i>
                                        </div>
                                        <h3 class="font-semibold text-gray-900">Travel Agency</h3>
                                        <p class="text-xs text-gray-600 mt-1">Manage Travel Business</p>
                                    </div>
                                </label>
                            </div>
                            @error('role')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Name -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fa-solid fa-user text-skyblue mr-2"></i>Full Name
                            </label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skyblue @error('name') border-red-500 @enderror">
                            @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fa-solid fa-envelope text-skyblue mr-2"></i>Email Address
                            </label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skyblue @error('email') border-red-500 @enderror">
                            @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fa-solid fa-lock text-skyblue mr-2"></i>Password
                                </label>
                                <input type="password" name="password" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skyblue @error('password') border-red-500 @enderror">
                                @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fa-solid fa-lock text-skyblue mr-2"></i>Confirm Password
                                </label>
                                <input type="password" name="password_confirmation" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skyblue">
                            </div>
                        </div>

                        <!-- Terms -->
                        <div>
                            <label class="flex items-start">
                                <input type="checkbox" name="terms" required class="w-4 h-4 text-skyblue border-gray-300 rounded focus:ring-skyblue mt-1">
                                <span class="ml-2 text-sm text-gray-700">
                                I agree to the <a href="#" class="text-skyblue hover:underline">Terms of Service</a> and <a href="#" class="text-skyblue hover:underline">Privacy Policy</a>
                            </span>
                            </label>
                            @error('terms')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full bg-gradient-to-r from-skyblue to-blue-500 text-white py-3 rounded-lg font-semibold hover:shadow-lg transition-all duration-300">
                            <i class="fa-solid fa-user-plus mr-2"></i>Create Account
                        </button>

                    </form>

                    <!-- Login Link -->
                    <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 text-center">
                        <p class="text-sm text-gray-600">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-skyblue font-semibold hover:underline">Sign in</a>
                        </p>
                    </div>
                </div>

                <!-- Trust Badges -->
                <div class="mt-8 flex justify-center space-x-8 text-xs text-gray-500">
                    <div class="flex items-center">
                        <i class="fa-solid fa-shield-check text-green-500 mr-2"></i>
                        <span>Secure Registration</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fa-solid fa-envelope-circle-check text-green-500 mr-2"></i>
                        <span>Email Verification</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fa-solid fa-user-shield text-green-500 mr-2"></i>
                        <span>Privacy Protected</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            // Role selection visual feedback
            document.querySelectorAll('.role-card').forEach(card => {
                card.addEventListener('click', function() {
                    // Remove active class from all
                    document.querySelectorAll('.role-content').forEach(content => {
                        content.classList.remove('border-skyblue', 'border-coral', 'border-green-500', 'bg-blue-50', 'bg-orange-50', 'bg-green-50');
                        content.classList.add('border-gray-200');
                    });

                    // Add active class to selected
                    const content = this.querySelector('.role-content');
                    const role = this.querySelector('input').value;

                    if (role === 'tourist') {
                        content.classList.add('border-skyblue', 'bg-blue-50');
                    } else if (role === 'guide') {
                        content.classList.add('border-coral', 'bg-orange-50');
                    } else if (role === 'agency') {
                        content.classList.add('border-green-500', 'bg-green-50');
                    }
                });
            });

            // Set initial active state
            document.querySelector('input[name="role"]:checked').closest('.role-card').click();
        </script>
    @endpush
@endsection
