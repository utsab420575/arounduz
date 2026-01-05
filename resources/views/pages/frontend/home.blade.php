@extends('layouts.frontend')

@section('title', 'Home - AroundUz Travel Portal')

@section('content')
    @include('partials.frontend.hero')
    @include('partials.frontend.hero-alternative')
    @include('partials.frontend.navigation-tabs')
    @include('partials.frontend.guides-section')
    @include('partials.frontend.agents-section')
    @include('partials.frontend.top-agents-section')
    @include('partials.frontend.trip-planner-banner')
    @include('partials.frontend.featured-destinations')
    @include('partials.frontend.blog-section')
    @include('partials.frontend.testimonials')
    @include('partials.frontend.how-it-works')
    @include('partials.frontend.cta-section')
@endsection
