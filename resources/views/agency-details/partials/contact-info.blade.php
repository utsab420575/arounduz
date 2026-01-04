<!-- Contact Information - Full Width -->
<div id="contact-info" class="bg-white rounded-xl shadow-sm p-6 md:p-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
        <i class="fa-solid fa-address-book text-skyblue mr-3"></i>
        Contact Information
    </h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="tel:{{ $agency['phone'] }}" class="flex flex-col items-center gap-3 p-6 rounded-lg hover:bg-gray-50 transition-all duration-300 group border-2 border-gray-100 hover:border-skyblue">
            <div class="w-16 h-16 bg-skyblue bg-opacity-10 rounded-full flex items-center justify-center group-hover:bg-skyblue group-hover:bg-opacity-20 transition-colors">
                <i class="fa-solid fa-phone text-skyblue text-2xl"></i>
            </div>
            <div class="text-center">
                <p class="text-xs text-gray-500 mb-1 font-medium uppercase tracking-wide">Phone</p>
                <p class="text-gray-900 font-semibold">{{ $agency['phone'] }}</p>
            </div>
        </a>
        
        <a href="mailto:{{ $agency['email'] }}" class="flex flex-col items-center gap-3 p-6 rounded-lg hover:bg-gray-50 transition-all duration-300 group border-2 border-gray-100 hover:border-skyblue">
            <div class="w-16 h-16 bg-skyblue bg-opacity-10 rounded-full flex items-center justify-center group-hover:bg-skyblue group-hover:bg-opacity-20 transition-colors">
                <i class="fa-solid fa-envelope text-skyblue text-2xl"></i>
            </div>
            <div class="text-center">
                <p class="text-xs text-gray-500 mb-1 font-medium uppercase tracking-wide">Email</p>
                <p class="text-gray-900 font-semibold text-sm break-all">{{ $agency['email'] }}</p>
            </div>
        </a>
        
        <a href="https://t.me/{{ ltrim($agency['telegram'], '@') }}" target="_blank" class="flex flex-col items-center gap-3 p-6 rounded-lg hover:bg-gray-50 transition-all duration-300 group border-2 border-gray-100 hover:border-blue-400">
            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                <i class="fa-brands fa-telegram text-blue-500 text-2xl"></i>
            </div>
            <div class="text-center">
                <p class="text-xs text-gray-500 mb-1 font-medium uppercase tracking-wide">Telegram</p>
                <p class="text-gray-900 font-semibold">{{ $agency['telegram'] }}</p>
            </div>
        </a>
        
        <a href="https://wa.me/{{ str_replace(['+', ' '], '', $agency['whatsapp']) }}" target="_blank" class="flex flex-col items-center gap-3 p-6 rounded-lg hover:bg-gray-50 transition-all duration-300 group border-2 border-gray-100 hover:border-green-400">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center group-hover:bg-green-200 transition-colors">
                <i class="fa-brands fa-whatsapp text-green-600 text-2xl"></i>
            </div>
            <div class="text-center">
                <p class="text-xs text-gray-500 mb-1 font-medium uppercase tracking-wide">WhatsApp</p>
                <p class="text-gray-900 font-semibold">{{ $agency['whatsapp'] }}</p>
            </div>
        </a>
    </div>
    
    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-lg p-6 text-center">
            <div class="w-12 h-12 bg-skyblue bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fa-solid fa-map-marker-alt text-skyblue text-xl"></i>
            </div>
            <h4 class="font-semibold text-gray-900 mb-2">Office Location</h4>
            <p class="text-sm text-gray-600">{{ $agency['address'] }}</p>
        </div>
        
        <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-lg p-6 text-center">
            <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fa-solid fa-globe text-purple-600 text-xl"></i>
            </div>
            <h4 class="font-semibold text-gray-900 mb-2">Website</h4>
            <a href="https://{{ $agency['website'] }}" target="_blank" class="text-sm text-skyblue hover:underline">{{ $agency['website'] }}</a>
        </div>
        
        <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-lg p-6 text-center">
            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fa-solid fa-clock text-green-600 text-xl"></i>
            </div>
            <h4 class="font-semibold text-gray-900 mb-2">Business Hours</h4>
            <p class="text-sm text-gray-600">Mon-Sat: 9 AM - 6 PM<br>Sunday: Closed</p>
        </div>
    </div>
    
    <div class="mt-8 bg-gradient-to-r from-green-50 to-emerald-50 border-2 border-green-200 rounded-xl p-6">
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center">
                    <i class="fa-brands fa-whatsapp text-white text-3xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 text-lg mb-1">Quick WhatsApp Contact</h3>
                    <p class="text-sm text-gray-600">Get instant response on WhatsApp</p>
                </div>
            </div>
            <button onclick="sendQuickMessageToAgency()" class="bg-green-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-600 transition-colors shadow-md hover:shadow-lg">
                <i class="fa-brands fa-whatsapp mr-2"></i>Send Message
            </button>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function sendQuickMessageToAgency() {
        const phone = '{{ str_replace(["+", " "], "", $agency["whatsapp"]) }}';
        const message = encodeURIComponent('Hello {{ $agency["name"] }}, I am interested in your travel packages. Can you provide more information?');
        window.open(`https://wa.me/${phone}?text=${message}`, '_blank');
    }
</script>
@endpush