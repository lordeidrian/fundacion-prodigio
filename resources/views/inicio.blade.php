@extends('layouts.app')

@section('title', 'Inicio - DentalHope Hub')

@section('content')
    {{-- Hero Section --}}
    <section id="home" class="hero-section text-center text-white d-flex align-items-center justify-content-center">
        <div class="container z-2">
            <h1 class="display-3 fw-bold text-primary font-headline">Brightening Lives, One Smile at a Time</h1>
            <p class="lead text-dark my-4 mx-auto" style="max-width: 700px;">
                DentalHope Hub is dedicated to providing essential dental care to underserved communities, ensuring everyone has a reason to smile.
            </p>
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                <a href="#contribute" class="btn btn-primary btn-lg px-4 gap-3 shadow">Get Involved</a>
                <a href="#services" class="btn btn-outline-light btn-lg px-4">Our Services</a>
            </div>
        </div>
    </section>

    {{-- Services Section --}}  
    @include('pages.partials.services')
    @include('pages.partials.about')
    @include('pages.partials.impact')
    @include('pages.partials.contribution')
@endsection