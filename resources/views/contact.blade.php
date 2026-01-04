@extends('layouts.theme')

@section('title', 'Contact Us - AroundUz')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-skyblue to-blue-500 text-white py-16 md:py-20 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('back.png') }}');"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">Get in Touch</h1>
            <p class="text-lg md:text-xl opacity-90">We're here to help with any questions or concerns</p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-white rounded-xl shadow-sm p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Send us a Message</h2>
                    
                    <form onsubmit="handleContactSubmit(event)" class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                                <input type="text" name="first_name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-skyblue focus:border-skyblue">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                                <input type="text" name="last_name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-skyblue focus:border-skyblue">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                            <input type="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-skyblue focus:border-skyblue">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                            <input type="tel" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-skyblue focus:border-skyblue" placeholder="+998 XX XXX XX XX">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Subject *</label>
                            <select name="subject" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-skyblue focus:border-skyblue">
                                <option value="">Select a subject</option>
                                <option value="general">General Inquiry</option>
                                <option value="booking">Booking Support</option>
                                <option value="guide">Become a Guide</option>
                                <option value="agency">Register Agency</option>
                                <option value="technical">Technical Issue</option>
                                <option value="feedback">Feedback</option>
                                <option value="partnership">Partnership</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Message *</label>
                            <textarea name="message" required rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-skyblue focus:border-skyblue" placeholder="Tell us how we can help you..."></textarea>
                        </div>
                        
                        <button type="submit" class="w-full bg-gradient-to-r from-skyblue to-blue-500 text-white py-3 rounded-lg font-semibold hover:shadow-lg transition-all duration-300">
                            <i class="fa-solid fa-paper-plane mr-2"></i>Send Message
                        </button>
                    </form>
                </div>
                
                <!-- Contact Information -->
                <div class="space-y-6">
                    <div class="bg-white rounded-xl shadow-sm p-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-6">Contact Information</h3>
                        
                        <div class="space-y-6">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-skyblue bg-opacity-10 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fa-solid fa-map-marker-alt text-skyblue text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Office Address</h4>
                                    <p class="text-gray-600 text-sm">Amir Temur Street, 100000<br>Tashkent, Uzbekistan</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fa-solid fa-phone text-green-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Phone</h4>
                                    <a href="tel:+998711234567" class="text-skyblue hover:underline">+998 71 123 45 67</a>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fa-solid fa-envelope text-purple-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Email</h4>
                                    <a href="mailto:info@arounduz.com" class="text-skyblue hover:underline">info@arounduz.com</a>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fa-solid fa-clock text-blue-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Business Hours</h4>
                                    <p class="text-gray-600 text-sm">Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 4:00 PM<br>Sunday: Closed</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Social Media -->
                    <div class="bg-gradient-to-br from-skyblue to-blue-500 rounded-xl shadow-sm p-8 text-white">
                        <h3 class="text-xl font-bold mb-4">Follow Us</h3>
                        <p class="mb-6 opacity-90 text-sm">Stay connected with us on social media for updates and travel inspiration</p>
                        <div class="flex gap-3">
                            <a href="#" class="w-12 h-12 bg-white bg-opacity-20 backdrop-blur-sm rounded-lg flex items-center justify-center hover:bg-white hover:text-skyblue transition-all duration-300">
                                <i class="fa-brands fa-facebook-f text-xl"></i>
                            </a>
                            <a href="#" class="w-12 h-12 bg-white bg-opacity-20 backdrop-blur-sm rounded-lg flex items-center justify-center hover:bg-white hover:text-skyblue transition-all duration-300">
                                <i class="fa-brands fa-instagram text-xl"></i>
                            </a>
                            <a href="#" class="w-12 h-12 bg-white bg-opacity-20 backdrop-blur-sm rounded-lg flex items-center justify-center hover:bg-white hover:text-skyblue transition-all duration-300">
                                <i class="fa-brands fa-twitter text-xl"></i>
                            </a>
                            <a href="#" class="w-12 h-12 bg-white bg-opacity-20 backdrop-blur-sm rounded-lg flex items-center justify-center hover:bg-white hover:text-skyblue transition-all duration-300">
                                <i class="fa-brands fa-linkedin-in text-xl"></i>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Quick Support -->
                    <div class="bg-yellow-50 border-2 border-yellow-200 rounded-xl p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-2 flex items-center">
                            <i class="fa-solid fa-headset text-yellow-600 mr-2"></i>
                            Need Urgent Help?
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">For immediate assistance, use our live chat or call our hotline</p>
                        <button onclick="openLiveChat()" class="w-full bg-yellow-500 hover:bg-yellow-600 text-white py-2 rounded-lg font-semibold transition-colors">
                            <i class="fa-solid fa-comments mr-2"></i>Start Live Chat
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Find Us</h2>
                <div class="w-24 h-1 bg-skyblue mx-auto"></div>
            </div>
            
            <div class="bg-gray-200 rounded-xl overflow-hidden shadow-lg h-96">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2996.7707760344425!2d69.24011931541617!3d41.31115547927107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae8b0cc379e9c3%3A0xa5a9323b4aa5cb98!2sTashkent%2C%20Uzbekistan!5e0!3m2!1sen!2s!4v1234567890123!5m2!1sen!2s"
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
                <div class="w-24 h-1 bg-skyblue mx-auto mb-6"></div>
            </div>
            
            <div class="space-y-4">
                @php
                    $faqs = [
                        ['q' => 'How quickly do you respond to inquiries?', 'a' => 'We typically respond to all inquiries within 24 hours during business days. For urgent matters, please call our hotline or use the live chat feature.'],
                        ['q' => 'Can I visit your office in person?', 'a' => 'Yes! We welcome visitors to our Tashkent office. Please call ahead to schedule an appointment to ensure someone is available to assist you.'],
                        ['q' => 'Do you offer support in multiple languages?', 'a' => 'Yes, our support team can assist you in English, Russian, and Uzbek. For other languages, we\'ll do our best to accommodate your needs.'],
                        ['q' => 'How can I report a problem or complaint?', 'a' => 'You can report issues through our contact form, email, or by calling our support line. We take all feedback seriously and aim to resolve issues promptly.'],
                    ];
                @endphp
                
                @foreach($faqs as $index => $faq)
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                    <button onclick="toggleContactFAQ({{ $index }})" class="w-full text-left px-6 py-4 hover:bg-gray-50 transition-colors flex items-center justify-between">
                        <span class="font-semibold text-gray-900">{{ $faq['q'] }}</span>
                        <i class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300" id="contact-faq-icon-{{ $index }}"></i>
                    </button>
                    <div id="contact-faq-answer-{{ $index }}" class="hidden px-6 py-4 bg-gray-50 border-t border-gray-200">
                        <p class="text-gray-700 text-sm">{{ $faq['a'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function handleContactSubmit(event) {
        event.preventDefault();
        
        const formData = new FormData(event.target);
        const data = Object.fromEntries(formData);
        
        Swal.fire({
            title: 'Sending...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
        
        // Simulate API call
        setTimeout(() => {
            Swal.fire({
                icon: 'success',
                title: 'Message Sent!',
                html: `
                    <div class="text-center">
                        <p class="mb-3">Thank you for contacting us!</p>
                        <p class="text-sm text-gray-600">We've received your message and will get back to you within 24 hours.</p>
                    </div>
                `,
                confirmButtonColor: '#87CEEB',
                confirmButtonText: 'Great!'
            });
            event.target.reset();
        }, 1500);
    }
    
    function toggleContactFAQ(index) {
        const answer = document.getElementById(`contact-faq-answer-${index}`);
        const icon = document.getElementById(`contact-faq-icon-${index}`);
        
        if (answer.classList.contains('hidden')) {
            answer.classList.remove('hidden');
            icon.style.transform = 'rotate(180deg)';
        } else {
            answer.classList.add('hidden');
            icon.style.transform = 'rotate(0deg)';
        }
    }
    
    function openLiveChat() {
        Swal.fire({
            icon: 'info',
            title: 'Live Chat',
            text: 'Live chat feature will be available soon. Please use email or phone for immediate assistance.',
            confirmButtonColor: '#87CEEB'
        });
    }
</script>
@endpush