@extends('layouts.theme')

@section('title', 'Pricing - AroundUz')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-skyblue to-blue-500 text-white py-16 md:py-20 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('back.png') }}');"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">Simple, Transparent Pricing</h1>
            <p class="text-lg md:text-xl opacity-90">No hidden fees. No surprises. Just authentic experiences.</p>
        </div>
    </div>
</section>

<!-- For Travelers -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">For Travelers</h2>
                <div class="w-24 h-1 bg-skyblue mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">Book guides and agencies with confidence. Always know what you're paying for.</p>
            </div>
            
            <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-8 md:p-12 border-2 border-blue-100">
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">100% Free to Use</h3>
                        <div class="space-y-4 mb-6">
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-green-500 mt-1"></i>
                                <div>
                                    <p class="font-semibold text-gray-900">No Booking Fees</p>
                                    <p class="text-sm text-gray-600">Browse and book without any platform charges</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-green-500 mt-1"></i>
                                <div>
                                    <p class="font-semibold text-gray-900">No Hidden Costs</p>
                                    <p class="text-sm text-gray-600">What you see is what you pay</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-green-500 mt-1"></i>
                                <div>
                                    <p class="font-semibold text-gray-900">Free Cancellation</p>
                                    <p class="text-sm text-gray-600">Cancel up to 24 hours before (subject to guide/agency policy)</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-green-500 mt-1"></i>
                                <div>
                                    <p class="font-semibold text-gray-900">Secure Payments</p>
                                    <p class="text-sm text-gray-600">Your payment information is always protected</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">What You Pay</h3>
                        <div class="bg-white rounded-xl p-6 shadow-sm mb-4">
                            <h4 class="font-bold text-gray-900 mb-3">Local Guides</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Hourly Rate:</span>
                                    <span class="font-semibold">$15 - $50/hour</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Full Day:</span>
                                    <span class="font-semibold">$80 - $200/day</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Multi-day:</span>
                                    <span class="font-semibold">Custom quotes</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-xl p-6 shadow-sm">
                            <h4 class="font-bold text-gray-900 mb-3">Travel Agencies</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Day Tours:</span>
                                    <span class="font-semibold">$50 - $150/person</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">3-5 Day Packages:</span>
                                    <span class="font-semibold">$300 - $800/person</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Week+ Tours:</span>
                                    <span class="font-semibold">$1,000+/person</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- For Guides & Agencies -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">For Guides & Agencies</h2>
                <div class="w-24 h-1 bg-skyblue mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">Join AroundUz and grow your business with our simple commission structure</p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Guide Plan -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                    <div class="bg-gradient-to-r from-skyblue to-blue-500 text-white p-6 text-center">
                        <i class="fa-solid fa-user-tie text-4xl mb-3"></i>
                        <h3 class="text-2xl font-bold mb-2">For Local Guides</h3>
                        <p class="text-sm opacity-90">Individual tour guides</p>
                    </div>
                    
                    <div class="p-8">
                        <div class="text-center mb-6">
                            <div class="text-5xl font-bold text-gray-900 mb-2">12%</div>
                            <p class="text-gray-600">Commission per booking</p>
                        </div>
                        
                        <div class="space-y-4 mb-8">
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-green-500 mt-1"></i>
                                <span class="text-gray-700">Create your profile</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-green-500 mt-1"></i>
                                <span class="text-gray-700">Set your own rates</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-green-500 mt-1"></i>
                                <span class="text-gray-700">Manage your availability</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-green-500 mt-1"></i>
                                <span class="text-gray-700">Receive direct bookings</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-green-500 mt-1"></i>
                                <span class="text-gray-700">Build your reputation</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-green-500 mt-1"></i>
                                <span class="text-gray-700">24/7 support team</span>
                            </div>
                        </div>
                        
                        <a href="#" class="block w-full bg-skyblue text-white text-center py-3 rounded-lg font-bold hover:bg-blue-600 transition-colors">
                            Become a Guide
                        </a>
                    </div>
                </div>
                
                <!-- Agency Plan -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow border-2 border-skyblue">
                    <div class="bg-gradient-to-r from-purple-600 to-blue-600 text-white p-6 text-center relative">
                        <div class="absolute top-4 right-4 bg-yellow-400 text-gray-900 px-3 py-1 rounded-full text-xs font-bold">
                            POPULAR
                        </div>
                        <i class="fa-solid fa-building text-4xl mb-3"></i>
                        <h3 class="text-2xl font-bold mb-2">For Travel Agencies</h3>
                        <p class="text-sm opacity-90">Professional tour operators</p>
                    </div>
                    
                    <div class="p-8">
                        <div class="text-center mb-6">
                            <div class="text-5xl font-bold text-gray-900 mb-2">15%</div>
                            <p class="text-gray-600">Commission per booking</p>
                        </div>
                        
                        <div class="space-y-4 mb-8">
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-green-500 mt-1"></i>
                                <span class="text-gray-700">Company profile page</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-green-500 mt-1"></i>
                                <span class="text-gray-700">Unlimited tour packages</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-green-500 mt-1"></i>
                                <span class="text-gray-700">Team member management</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-green-500 mt-1"></i>
                                <span class="text-gray-700">Advanced analytics</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-green-500 mt-1"></i>
                                <span class="text-gray-700">Priority customer support</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-check text-green-500 mt-1"></i>
                                <span class="text-gray-700">Marketing opportunities</span>
                            </div>
                        </div>
                        
                        <a href="#" class="block w-full bg-gradient-to-r from-purple-600 to-blue-600 text-white text-center py-3 rounded-lg font-bold hover:shadow-lg transition-all">
                            Register Agency
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Payment Terms -->
            <div class="mt-12 bg-white rounded-xl p-8 shadow-sm">
                <h3 class="text-xl font-bold text-gray-900 mb-6 text-center">Payment Terms</h3>
                <div class="grid md:grid-cols-3 gap-6 text-center">
                    <div>
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fa-solid fa-clock text-green-600 text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">Fast Payouts</h4>
                        <p class="text-sm text-gray-600">Receive payments within 2-3 business days after tour completion</p>
                    </div>
                    
                    <div>
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fa-solid fa-shield-check text-blue-600 text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">Secure Transactions</h4>
                        <p class="text-sm text-gray-600">All payments processed through encrypted, secure channels</p>
                    </div>
                    
                    <div>
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fa-solid fa-chart-line text-purple-600 text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">Detailed Reports</h4>
                        <p class="text-sm text-gray-600">Track all your earnings with comprehensive financial reports</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Pricing FAQs</h2>
                <div class="w-24 h-1 bg-skyblue mx-auto"></div>
            </div>
            
            <div class="space-y-4">
                @php
                    $faqs = [
                        ['q' => 'Are there any signup fees?', 'a' => 'No, signing up as a guide or agency is completely free. We only charge commission on successful bookings.'],
                        ['q' => 'When do I get paid?', 'a' => 'Payments are processed 2-3 business days after tour completion. Funds are transferred directly to your registered bank account.'],
                        ['q' => 'Can I change my rates?', 'a' => 'Yes, you can update your rates anytime from your dashboard. New rates apply to future bookings only.'],
                        ['q' => 'What payment methods are accepted?', 'a' => 'We accept credit cards, debit cards, and bank transfers. Travelers can choose their preferred payment method.'],
                        ['q' => 'Is there a minimum commitment?', 'a' => 'No minimum commitment required. You can start and stop accepting bookings whenever you want.'],
                        ['q' => 'What if a booking is cancelled?', 'a' => 'If cancelled by the traveler within the free cancellation period, no commission is charged. Your cancellation policy determines refund amounts.'],
                    ];
                @endphp
                
                @foreach($faqs as $index => $faq)
                <div class="bg-gray-50 rounded-lg border border-gray-200 overflow-hidden">
                    <button onclick="togglePricingFAQ({{ $index }})" class="w-full text-left px-6 py-4 hover:bg-gray-100 transition-colors flex items-center justify-between">
                        <span class="font-semibold text-gray-900">{{ $faq['q'] }}</span>
                        <i class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300" id="pricing-faq-icon-{{ $index }}"></i>
                    </button>
                    <div id="pricing-faq-answer-{{ $index }}" class="hidden px-6 py-4 bg-white border-t border-gray-200">
                        <p class="text-gray-700 text-sm">{{ $faq['a'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-16 bg-gradient-to-r from-skyblue to-blue-500 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Get Started?</h2>
        <p class="text-lg md:text-xl opacity-90 mb-8 max-w-2xl mx-auto">Join our community of guides and agencies today</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#" class="bg-white text-skyblue px-8 py-3 rounded-lg font-bold hover:bg-gray-100 transition-colors">
                Become a Guide
            </a>
            <a href="#" class="bg-white bg-opacity-20 backdrop-blur-sm border-2 border-white text-white px-8 py-3 rounded-lg font-bold hover:bg-white hover:text-skyblue transition-colors">
                Register Agency
            </a>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function togglePricingFAQ(index) {
        const answer = document.getElementById(`pricing-faq-answer-${index}`);
        const icon = document.getElementById(`pricing-faq-icon-${index}`);
        
        if (answer.classList.contains('hidden')) {
            answer.classList.remove('hidden');
            icon.style.transform = 'rotate(180deg)';
        } else {
            answer.classList.add('hidden');
            icon.style.transform = 'rotate(0deg)';
        }
    }
</script>
@endpush