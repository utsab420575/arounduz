<!-- FAQ Section -->
<div id="faq" class="bg-white rounded-xl shadow-sm p-6 md:p-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
        <i class="fa-solid fa-question-circle text-skyblue mr-3"></i>
        Frequently Asked Questions
    </h2>
    
    @php
        $faqs = [
            [
                'question' => 'How do I book a tour with you?',
                'answer' => 'You can book directly through the booking form on this page, or contact me via WhatsApp, Telegram, or email. I recommend booking at least 2-3 days in advance to ensure availability.'
            ],
            [
                'question' => 'What languages do you speak?',
                'answer' => 'I speak English, Russian, Uzbek, and Turkish fluently. I can conduct tours in any of these languages.'
            ],
            [
                'question' => 'Can you customize tours?',
                'answer' => 'Absolutely! I specialize in creating personalized experiences. Just let me know your interests, pace, and any specific places you\'d like to visit, and I\'ll create a custom itinerary for you.'
            ],
            [
                'question' => 'What\'s your cancellation policy?',
                'answer' => 'Free cancellation up to 24 hours before the tour. Cancellations within 24 hours are subject to a 50% fee. No-shows are non-refundable.'
            ],
            [
                'question' => 'Do you provide transportation?',
                'answer' => 'Transportation can be arranged for full-day tours at an additional cost. For walking tours within the old city, no transportation is needed as everything is within walking distance.'
            ],
            [
                'question' => 'What should I bring on the tour?',
                'answer' => 'Comfortable walking shoes, sunscreen, hat, water bottle, and camera. For mosque visits, women should bring a headscarf. I\'ll provide bottled water during the tour.'
            ],
            [
                'question' => 'Are entrance fees included?',
                'answer' => 'Entrance fees are typically not included in the base price but can be added to your package. I\'ll let you know the total cost including all fees when you book.'
            ],
            [
                'question' => 'Can you accommodate dietary restrictions?',
                'answer' => 'Yes! If your tour includes meals or food tastings, please let me know about any dietary restrictions or allergies in advance, and I\'ll make sure to accommodate them.'
            ]
        ];
    @endphp
    
    <div class="space-y-4">
        @foreach($faqs as $index => $faq)
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button onclick="toggleFAQ({{ $index }})" class="w-full text-left px-6 py-4 bg-gray-50 hover:bg-gray-100 transition-colors flex items-center justify-between">
                    <span class="font-semibold text-gray-900">{{ $faq['question'] }}</span>
                    <i class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300" id="faq-icon-{{ $index }}"></i>
                </button>
                <div id="faq-answer-{{ $index }}" class="hidden px-6 py-4 bg-white">
                    <p class="text-gray-700 text-sm leading-relaxed">{{ $faq['answer'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="mt-8 bg-blue-50 border border-blue-100 rounded-lg p-6">
        <h3 class="font-semibold text-gray-900 mb-2 flex items-center">
            <i class="fa-solid fa-message text-skyblue mr-2"></i>
            Still have questions?
        </h3>
        <p class="text-gray-700 text-sm mb-4">Feel free to contact me directly. I'm always happy to answer any questions you might have!</p>
        <button onclick="contactGuide()" class="bg-skyblue text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-400 transition-colors">
            Contact Me
        </button>
    </div>
</div>

@push('scripts')
<script>
    function toggleFAQ(index) {
        const answer = document.getElementById(`faq-answer-${index}`);
        const icon = document.getElementById(`faq-icon-${index}`);
        
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