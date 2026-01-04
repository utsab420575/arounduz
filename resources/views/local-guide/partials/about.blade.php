<!-- About Section -->
<div id="about" class="bg-white rounded-xl shadow-sm p-6 md:p-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
        <i class="fa-solid fa-user text-skyblue mr-3"></i>
        About {{ explode(' ', $guide['name'])[0] }}
    </h2>
    
    <div class="prose max-w-none">
        <p class="text-gray-700 leading-relaxed mb-4">
            {{ $guide['description'] }}
        </p>
        
        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-l-4 border-skyblue p-4 my-6">
            <h3 class="font-semibold text-gray-900 mb-2 flex items-center">
                <i class="fa-solid fa-quote-left text-skyblue mr-2"></i>
                My Guiding Philosophy
            </h3>
            <p class="text-gray-700 text-sm italic">
                "I believe that travel is not just about seeing places, but about understanding cultures, connecting with people, and creating memories that last a lifetime. Every tour I lead is crafted with passion and attention to detail."
            </p>
        </div>
    </div>
    
    <!-- Specializations -->
    <div class="mt-6">
        <h3 class="font-semibold text-gray-900 mb-3">Areas of Expertise</h3>
        <div class="flex flex-wrap gap-2">
            @foreach($guide['specializations'] as $spec)
                <span class="bg-skyblue bg-opacity-10 text-skyblue px-4 py-2 rounded-full text-sm font-medium">
                    {{ $spec }}
                </span>
            @endforeach
        </div>
    </div>
    
    <!-- Languages -->
    <div class="mt-6">
        <h3 class="font-semibold text-gray-900 mb-3">Languages I Speak</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
            @foreach($guide['languages'] as $language)
                <div class="flex items-center gap-2 bg-gray-50 px-3 py-2 rounded-lg">
                    <i class="fa-solid fa-language text-skyblue"></i>
                    <span class="text-gray-700 text-sm">{{ $language }}</span>
                </div>
            @endforeach
        </div>
    </div>
    
    <!-- What Makes Me Different -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="text-center p-4 bg-gradient-to-br from-blue-50 to-cyan-50 rounded-lg">
            <div class="w-12 h-12 bg-skyblue bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fa-solid fa-heart text-skyblue text-xl"></i>
            </div>
            <h4 class="font-semibold text-gray-900 mb-1">Passionate</h4>
            <p class="text-sm text-gray-600">Deeply passionate about Uzbek culture and history</p>
        </div>
        
        <div class="text-center p-4 bg-gradient-to-br from-blue-50 to-cyan-50 rounded-lg">
            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fa-solid fa-star text-green-600 text-xl"></i>
            </div>
            <h4 class="font-semibold text-gray-900 mb-1">Experienced</h4>
            <p class="text-sm text-gray-600">{{ $guide['experience_years'] }} years of professional guiding</p>
        </div>
        
        <div class="text-center p-4 bg-gradient-to-br from-blue-50 to-cyan-50 rounded-lg">
            <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fa-solid fa-users text-purple-600 text-xl"></i>
            </div>
            <h4 class="font-semibold text-gray-900 mb-1">Personal Touch</h4>
            <p class="text-sm text-gray-600">Customized experiences for every traveler</p>
        </div>
    </div>
    
    <!-- Experience Highlights -->
    <div class="mt-8 border-t border-gray-200 pt-6">
        <h3 class="font-semibold text-gray-900 mb-4">Experience Highlights</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                    <i class="fa-solid fa-check text-green-600"></i>
                </div>
                <div>
                    <h4 class="font-medium text-gray-900 text-sm">Professional Guide Since {{ date('Y') - $guide['experience_years'] }}</h4>
                    <p class="text-xs text-gray-600 mt-1">Licensed and certified tour guide with extensive knowledge of Uzbekistan's history and culture</p>
                </div>
            </div>
            
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                    <i class="fa-solid fa-users text-blue-600"></i>
                </div>
                <div>
                    <h4 class="font-medium text-gray-900 text-sm">{{ $guide['tours_completed'] }}+ Successful Tours</h4>
                    <p class="text-xs text-gray-600 mt-1">Guided travelers from over 50 countries across the world</p>
                </div>
            </div>
            
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                    <i class="fa-solid fa-award text-purple-600"></i>
                </div>
                <div>
                    <h4 class="font-medium text-gray-900 text-sm">Multiple Certifications</h4>
                    <p class="text-xs text-gray-600 mt-1">Tourism professional with specialized training in historical interpretation</p>
                </div>
            </div>
            
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                    <i class="fa-solid fa-star text-yellow-600"></i>
                </div>
                <div>
                    <h4 class="font-medium text-gray-900 text-sm">Consistently Top Rated</h4>
                    <p class="text-xs text-gray-600 mt-1">Maintained {{ $guide['rating'] }}/5.0 rating for {{ $guide['experience_years'] - 3 }} consecutive years</p>
                </div>
            </div>
        </div>
    </div>
</div>