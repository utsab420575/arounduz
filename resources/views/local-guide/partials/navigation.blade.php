<!-- Modern Sticky Navigation -->
<nav class="sticky top-0 bg-white/95 backdrop-blur-md border-b border-gray-200 shadow-sm z-40" id="section-nav">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between overflow-x-auto py-3">
            <div class="flex items-center space-x-1 md:space-x-2">
                <a href="#about" class="nav-link group px-3 md:px-4 py-2 rounded-lg text-sm font-medium whitespace-nowrap transition-all duration-300">
                    <i class="fa-solid fa-user mr-1.5 text-xs group-hover:scale-110 transition-transform"></i>
                    <span>About</span>
                </a>
                <a href="#services" class="nav-link group px-3 md:px-4 py-2 rounded-lg text-sm font-medium whitespace-nowrap transition-all duration-300">
                    <i class="fa-solid fa-briefcase mr-1.5 text-xs group-hover:scale-110 transition-transform"></i>
                    <span>Services</span>
                </a>
                <a href="#gallery" class="nav-link group px-3 md:px-4 py-2 rounded-lg text-sm font-medium whitespace-nowrap transition-all duration-300">
                    <i class="fa-solid fa-images mr-1.5 text-xs group-hover:scale-110 transition-transform"></i>
                    <span>Gallery</span>
                </a>
                <a href="#itineraries" class="nav-link group px-3 md:px-4 py-2 rounded-lg text-sm font-medium whitespace-nowrap transition-all duration-300">
                    <i class="fa-solid fa-route mr-1.5 text-xs group-hover:scale-110 transition-transform"></i>
                    <span>Tours</span>
                </a>
                <a href="#reviews" class="nav-link group px-3 md:px-4 py-2 rounded-lg text-sm font-medium whitespace-nowrap transition-all duration-300">
                    <i class="fa-solid fa-star mr-1.5 text-xs group-hover:scale-110 transition-transform"></i>
                    <span>Reviews</span>
                </a>
                <a href="#reviews" class="nav-link group px-3 md:px-4 py-2 rounded-lg text-sm font-medium whitespace-nowrap transition-all duration-300">
                    <i class="fa-solid fa-question-circle mr-1.5 text-xs group-hover:scale-110 transition-transform"></i>
                    <span>FAQ</span>
                </a>
                <a href="#contact-info" class="nav-link group px-3 md:px-4 py-2 rounded-lg text-sm font-medium whitespace-nowrap transition-all duration-300">
                    <i class="fa-solid fa-phone mr-1.5 text-xs group-hover:scale-110 transition-transform"></i>
                    <span class="hidden md:inline">Contact</span>
                    <span class="md:hidden">Call</span>
                </a>

                <a href="#availability" class="nav-link group px-3 md:px-4 py-2 rounded-lg text-sm font-medium whitespace-nowrap transition-all duration-300">
                    <i class="fa-solid fa-calendar-days mr-1.5 text-xs group-hover:scale-110 transition-transform"></i>
                    <span>Availability</span>
                </a>

                <a href="#badges" class="nav-link group px-3 md:px-4 py-2 rounded-lg text-sm font-medium whitespace-nowrap transition-all duration-300">
                    <i class="fa-solid fa-award mr-1.5 text-xs group-hover:scale-110 transition-transform"></i>
                    <span>Certifications</span>
                </a>
            </div>
            
            <!-- Quick Action Button -->
            <button onclick="scrollToBooking()" class="hidden md:flex items-center bg-gradient-to-r from-skyblue to-blue-500 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:shadow-lg transition-all duration-300 whitespace-nowrap ml-4">
                <i class="fa-solid fa-calendar-check mr-1.5"></i>
                Book Now
            </button>
        </div>
    </div>
</nav>

@push('styles')
<style>
    /* Navigation styles */
    .nav-link {
        color: #4B5563;
        position: relative;
    }
    
    .nav-link:hover {
        color: #87CEEB;
        background: rgba(135, 206, 235, 0.1);
    }
    
    .nav-link.active {
        color: #87CEEB;
        background: rgba(135, 206, 235, 0.15);
        font-weight: 600;
    }
    
    .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -12px;
        left: 50%;
        transform: translateX(-50%);
        width: 60%;
        height: 3px;
        background: linear-gradient(90deg, transparent, #87CEEB, transparent);
        border-radius: 3px;
    }
    
    /* Smooth scroll */
    html {
        scroll-behavior: smooth;
        scroll-padding-top: 80px;
    }
    
    /* Hide scrollbar but keep functionality */
    .overflow-x-auto::-webkit-scrollbar {
        display: none;
    }
    .overflow-x-auto {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('.nav-link');
        const sections = document.querySelectorAll('[id]');
        
        // Smooth scroll with offset
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetSection = document.getElementById(targetId);
                
                if (targetSection) {
                    const navHeight = document.getElementById('section-nav').offsetHeight;
                    const targetPosition = targetSection.offsetTop - navHeight - 20;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                    
                    // Update active state
                    updateActiveNav(this);
                }
            });
        });
        
        // Update active nav on scroll
        let scrollTimeout;
        window.addEventListener('scroll', function() {
            if (scrollTimeout) {
                clearTimeout(scrollTimeout);
            }
            
            scrollTimeout = setTimeout(() => {
                const navHeight = document.getElementById('section-nav').offsetHeight;
                let current = '';
                
                sections.forEach(section => {
                    const sectionTop = section.offsetTop - navHeight - 100;
                    const sectionBottom = sectionTop + section.offsetHeight;
                    
                    if (window.pageYOffset >= sectionTop && window.pageYOffset < sectionBottom) {
                        current = section.getAttribute('id');
                    }
                });
                
                if (current) {
                    navLinks.forEach(link => {
                        link.classList.remove('active');
                        if (link.getAttribute('href') === '#' + current) {
                            link.classList.add('active');
                        }
                    });
                }
            }, 100);
        });
        
        function updateActiveNav(activeLink) {
            navLinks.forEach(link => link.classList.remove('active'));
            activeLink.classList.add('active');
        }
    });
</script>
@endpush