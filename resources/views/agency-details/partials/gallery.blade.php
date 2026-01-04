<!-- Photo Gallery Section -->
<div id="gallery" class="bg-white rounded-xl shadow-sm p-6 md:p-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
        <i class="fa-solid fa-images text-skyblue mr-3"></i>
        Photo Gallery
    </h2>
    
    <!-- Swiper Gallery -->
    <div class="swiper gallerySwiper mb-4">
        <div class="swiper-wrapper">
            @php
                $galleryImages = [
                    'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=1200',
                    'https://images.unsplash.com/photo-1512632578888-169bbbc64f33?w=1200',
                    'https://images.unsplash.com/photo-1585001793483-c5e7ebdb5a1e?w=1200',
                    'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=1200',
                    'https://images.unsplash.com/photo-1564507592333-c60657eea523?w=1200',
                    'https://images.unsplash.com/photo-1590523741831-ab7e8b8f9c7f?w=1200',
                ];
            @endphp
            
            @foreach($galleryImages as $index => $image)
                <div class="swiper-slide">
                    <img src="{{ $image }}" alt="Gallery Image {{ $index + 1 }}" class="w-full h-96 object-cover rounded-lg cursor-pointer" onclick="openLightbox({{ $index }})">
                </div>
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
    
    <!-- Thumbnail Gallery -->
    <div class="grid grid-cols-6 gap-2">
        @foreach(array_slice($galleryImages, 0, 6) as $index => $image)
            <img src="{{ $image }}" alt="Thumbnail {{ $index + 1 }}" class="w-full h-20 object-cover rounded cursor-pointer hover:opacity-75 transition-opacity" onclick="openLightbox({{ $index }})">
        @endforeach
    </div>
</div>

@push('scripts')
<script>
    // Initialize Swiper
    const swiper = new Swiper('.gallerySwiper', {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 1,
                spaceBetween: 30,
            },
        },
    });
    
    function openLightbox(index) {
        const images = @json($galleryImages);
        let html = '<div class="swiper lightboxSwiper">';
        html += '<div class="swiper-wrapper">';
        images.forEach(img => {
            html += `<div class="swiper-slide"><img src="${img}" class="w-full h-auto max-h-[80vh] object-contain mx-auto"></div>`;
        });
        html += '</div>';
        html += '<div class="swiper-button-next"></div><div class="swiper-button-prev"></div>';
        html += '</div>';
        
        Swal.fire({
            html: html,
            showConfirmButton: false,
            showCloseButton: true,
            width: '90%',
            padding: '2rem',
            background: '#000',
            didOpen: () => {
                new Swiper('.lightboxSwiper', {
                    initialSlide: index,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                });
            }
        });
    }
</script>
@endpush