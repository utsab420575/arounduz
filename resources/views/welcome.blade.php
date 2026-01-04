@extends('layouts.theme')

@section('title', 'Dashboard - AroundUz Travel Portal')

@section('content')
    @include('partials.hero')
    @include('partials.hero-alternative')
    @include('partials.navigation-tabs')
    @include('partials.guides-section')
    @include('partials.agents-section')

    @include('partials.top-agents-section')
    @include('partials.trip-planner-banner')
    @include('partials.featured-destinations')
    @include('partials.blog-section')
    @include('partials.testimonials')
    @include('partials.how-it-works')
    @include('partials.cta-section')
@endsection