<!-- Quick Statistics - Full Width -->
<div id="quick-stats" class="bg-gradient-to-br from-skyblue via-blue-500 to-blue-600 rounded-xl shadow-lg p-6 md:p-8 text-white">
    <h2 class="text-2xl font-bold mb-6 flex items-center">
        <i class="fa-solid fa-chart-line mr-3"></i>
        Our Impact in Numbers
    </h2>
    
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <!-- Stat 1 -->
        <div class="text-center">
            <div class="w-16 h-16 bg-white bg-opacity-20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fa-solid fa-users text-3xl"></i>
            </div>
            <div class="text-4xl font-bold mb-1" data-count="{{ $agency['tours_completed'] * 3 }}">0</div>
            <p class="text-sm opacity-90">Happy Travelers</p>
        </div>
        
        <!-- Stat 2 -->
        <div class="text-center">
            <div class="w-16 h-16 bg-white bg-opacity-20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fa-solid fa-route text-3xl"></i>
            </div>
            <div class="text-4xl font-bold mb-1" data-count="{{ $agency['tours_completed'] }}">0</div>
            <p class="text-sm opacity-90">Tours Completed</p>
        </div>
        
        <!-- Stat 3 -->
        <div class="text-center">
            <div class="w-16 h-16 bg-white bg-opacity-20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fa-solid fa-globe text-3xl"></i>
            </div>
            <div class="text-4xl font-bold mb-1" data-count="50">0</div>
            <p class="text-sm opacity-90">Countries Served</p>
        </div>
        
        <!-- Stat 4 -->
        <div class="text-center">
            <div class="w-16 h-16 bg-white bg-opacity-20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fa-solid fa-star text-3xl"></i>
            </div>
            <div class="text-4xl font-bold mb-1" data-count="{{ $agency['rating'] * 10 }}">0</div>
            <p class="text-sm opacity-90">% Satisfaction Rate</p>
        </div>
    </div>
    
    <!-- Additional Stats Row -->
    <div class="mt-8 pt-8 border-t border-white border-opacity-20 grid grid-cols-2 md:grid-cols-4 gap-6">
        <div class="text-center">
            <p class="text-3xl font-bold mb-1">{{ date('Y') - $agency['established'] }}+</p>
            <p class="text-sm opacity-90">Years Experience</p>
        </div>
        
        <div class="text-center">
            <p class="text-3xl font-bold mb-1">15+</p>
            <p class="text-sm opacity-90">Tour Packages</p>
        </div>
        
        <div class="text-center">
            <p class="text-3xl font-bold mb-1">20+</p>
            <p class="text-sm opacity-90">Expert Guides</p>
        </div>
        
        <div class="text-center">
            <p class="text-3xl font-bold mb-1">24/7</p>
            <p class="text-sm opacity-90">Customer Support</p>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Animated counter
    document.addEventListener('DOMContentLoaded', function() {
        const counters = document.querySelectorAll('[data-count]');
        
        const animateCounter = (counter) => {
            const target = parseInt(counter.getAttribute('data-count'));
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;
            
            const updateCounter = () => {
                current += step;
                if (current < target) {
                    counter.textContent = Math.floor(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target;
                }
            };
            
            updateCounter();
        };
        
        // Intersection Observer for animation trigger
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('[data-count]');
                    counters.forEach(counter => {
                        if (counter.textContent === '0') {
                            animateCounter(counter);
                        }
                    });
                }
            });
        }, { threshold: 0.5 });
        
        const statsSection = document.getElementById('quick-stats');
        if (statsSection) {
            observer.observe(statsSection);
        }
    });
</script>
@endpush