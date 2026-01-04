@extends('layouts.theme')

@section('title', $agency['name'] ?? 'Agency Details - AroundUz')

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
        $agency = [
            'id' => 1,
            'name' => 'Silk Road Adventures',
            'tagline' => 'Your Gateway to Central Asia',
            'type' => 'Premium Travel Agency',
            'established' => '2015',
            'location' => 'Samarkand, Uzbekistan',
            'address' => '123 Registan Street, Samarkand 140100',
            'rating' => 4.9,
            'reviews_count' => 234,
            'tours_completed' => 1500,
            'languages' => ['English', 'Russian', 'Uzbek', 'German', 'French'],
            'phone' => '+998 90 123 4567',
            'email' => 'info@silkroadventures.uz',
            'website' => 'www.silkroadventures.uz',
            'telegram' => '@silkroad_tours',
            'whatsapp' => '+998901234567',
            'description' => 'Silk Road Adventures is a premier travel agency specializing in authentic cultural experiences across Uzbekistan and Central Asia. With over 8 years of experience, we offer carefully curated tours that showcase the rich history, stunning architecture, and warm hospitality of the Silk Road region.',
            'specializations' => ['Cultural Tours', 'Historical Sites', 'Adventure Travel', 'Luxury Packages', 'Group Tours'],
            'logo' => 'https://ui-avatars.com/api/?name=Silk+Road&background=0ea5e9&color=fff&size=200',
            'cover_image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=1200',
            'verified' => true,
            'license_number' => 'UZ-TL-2015-1234',
        ];
    @endphp

    @include('agency-details.partials.hero', ['agency' => $agency])
    @include('agency-details.partials.navigation')
    
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                @include('agency-details.partials.about', ['agency' => $agency])
                @include('agency-details.partials.gallery', ['agency' => $agency])
                @include('agency-details.partials.package-tours', ['agency' => $agency])
                @include('agency-details.partials.team', ['agency' => $agency])
                @include('agency-details.partials.reviews', ['agency' => $agency])
                @include('agency-details.partials.contact-info', ['agency' => $agency])
                @include('agency-details.partials.certifications', ['agency' => $agency])
                @include('agency-details.partials.quick-stats', ['agency' => $agency])
            </div>
            
            <!-- Sidebar -->
            <div class="space-y-6">
                @include('agency-details.partials.booking-form', ['agency' => $agency])
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
@endpush