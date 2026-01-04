@extends('layouts.theme')

@section('title', $guide['name'] ?? 'Guide Details - AroundUz')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<style>
    .swiper-button-next, .swiper-button-prev {
        color: #87CEEB;
    }
    .swiper-pagination-bullet-active {
        background: #87CEEB;
    }
</style>
@endpush

@section('content')
    @php
        // Demo data - in production, this would come from controller
        $guide = [
            'id' => 1,
            'name' => 'Akmal Karimov',
            'title' => 'Expert Silk Road Guide',
            'tagline' => 'Bringing History to Life',
            'location' => 'Samarkand, Uzbekistan',
            'address' => 'Registan Square Area, Samarkand',
            'rating' => 4.9,
            'reviews_count' => 127,
            'tours_completed' => 500,
            'experience_years' => 12,
            'languages' => ['English', 'Russian', 'Uzbek', 'Turkish'],
            'phone' => '+998 90 123 4567',
            'email' => 'akmal.karimov@gmail.com',
            'telegram' => '@akmal_guide',
            'whatsapp' => '+998901234567',
            'hourly_rate' => 25,
            'daily_rate' => 150,
            'description' => 'Passionate local guide with over 12 years of experience in sharing the rich history and culture of Samarkand and the Silk Road. Specialized in historical tours, photography tours, and cultural experiences. I love connecting travelers with authentic Uzbek traditions and hidden gems.',
            'specializations' => ['Historical Tours', 'Photography', 'Cultural Immersion', 'Architecture', 'Food Tours'],
            'avatar' => 'https://ui-avatars.com/api/?name=Akmal+Karimov&background=0ea5e9&color=fff&size=400',
            'cover_image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=1200',
            'verified' => true,
            'available' => true,
            'license_number' => 'UZ-G-2012-5678',
            'certifications' => [
                'Licensed Tour Guide',
                'First Aid Certified',
                'Tourism Professional Certificate',
                'UNESCO Heritage Guide'
            ]
        ];
    @endphp

    @include('local-guide.partials.hero', ['guide' => $guide])
    @include('local-guide.partials.navigation')
    
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                @include('local-guide.partials.about', ['guide' => $guide])
                @include('local-guide.partials.services', ['guide' => $guide])
                @include('local-guide.partials.gallery', ['guide' => $guide])
                @include('local-guide.partials.itineraries', ['guide' => $guide])
                @include('local-guide.partials.reviews', ['guide' => $guide])
                @include('local-guide.partials.faq', ['guide' => $guide])
                @include('local-guide.partials.contact-info', ['guide' => $guide])
                @include('local-guide.partials.availability', ['guide' => $guide])
                @include('local-guide.partials.badges', ['guide' => $guide])
            </div>
            
            <!-- Sidebar -->
            <div class="space-y-6">
                @include('local-guide.partials.booking-card', ['guide' => $guide])
                
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
@endpush