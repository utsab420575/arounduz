<!-- About Section -->
<div id="about" class="bg-white rounded-xl shadow-sm p-6 md:p-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
        <i class="fa-solid fa-info-circle text-skyblue mr-3"></i>
        About {{ $agency['name'] }}
    </h2>
    
    <div class="prose max-w-none">
        <p class="text-gray-700 leading-relaxed mb-4">
            {{ $agency['description'] }}
        </p>
        
        <div class="bg-blue-50 border-l-4 border-skyblue p-4 my-6">
            <h3 class="font-semibold text-gray-900 mb-2">Our Mission</h3>
            <p class="text-gray-700 text-sm">
                To provide authentic, memorable travel experiences that connect travelers with the rich cultural heritage and natural beauty of Uzbekistan while supporting local communities.
            </p>
        </div>
    </div>
    
    <!-- Specializations -->
    <div class="mt-6">
        <h3 class="font-semibold text-gray-900 mb-3">Specializations</h3>
        <div class="flex flex-wrap gap-2">
            @foreach($agency['specializations'] as $spec)
                <span class="bg-skyblue bg-opacity-10 text-skyblue px-4 py-2 rounded-full text-sm font-medium">
                    {{ $spec }}
                </span>
            @endforeach
        </div>
    </div>
    
    <!-- Why Choose Us -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="text-center p-4 bg-gray-50 rounded-lg">
            <div class="w-12 h-12 bg-skyblue bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fa-solid fa-certificate text-skyblue text-xl"></i>
            </div>
            <h4 class="font-semibold text-gray-900 mb-1">Licensed & Insured</h4>
            <p class="text-sm text-gray-600">Fully certified tour operator</p>
        </div>
        
        <div class="text-center p-4 bg-gray-50 rounded-lg">
            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fa-solid fa-users text-green-600 text-xl"></i>
            </div>
            <h4 class="font-semibold text-gray-900 mb-1">Expert Guides</h4>
            <p class="text-sm text-gray-600">Professional local experts</p>
        </div>
        
        <div class="text-center p-4 bg-gray-50 rounded-lg">
            <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fa-solid fa-headset text-purple-600 text-xl"></i>
            </div>
            <h4 class="font-semibold text-gray-900 mb-1">24/7 Support</h4>
            <p class="text-sm text-gray-600">Always here to help</p>
        </div>
    </div>
</div>