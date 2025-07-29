@extends('layouts.app')

@section('title', 'Inicio - DentalHope Hub')

@section('content')
    {{-- Hero Section --}}    
    <div class="hero-gradient-overlay" style="background-image: linear-gradient(45deg, rgba(29, 69, 107, 0.7), rgba(0, 123, 255, 0.65)), url('{{ asset('images/banner-4.jpg') }}');">
        <div class="container d-flex align-items-center">
            <div class="row">
                <div class="col-lg-8 text-white">
                    <h1 class="display-3 fw-bold mb-4">Un Futuro Brillante Comienza Hoy</h1>
                    <p class="lead mb-5">
                        Cada donación, cada hora de voluntariado, cada proyecto, construye un camino de esperanza para quienes más lo necesitan. Únete a nuestra causa.
                    </p>
                    <a href="#donar" class="btn btn-outline-light btn-lg">Quiero Ayudar</a>
                </div>
            </div>
        </div>
        {{-- Separador de Forma --}}    
        <div class="hero-shape-divider hero-shape-divider d-none d-lg-block">
            <svg class="d-none d-lg-block" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" style="width: 100%; height: 142px;">
            <path d="M0,0 C300,100 900,0 1200,100 V120 H0 Z" class="shape-fill"></path>
            </svg>
        </div>
    </div>

    {{-- Header Section --}}
    {{-- NUEVA SECCIÓN: "Nuestra Causa" con Tarjetas --}}
    <section id="causa" class="py-5 bg-white fusionado">
        <div class="container my-5">
            <div class="row text-center">
                <div class="col-12">
                    <h2 class="display-5 fw-bold font-headline text-dark">Creemos en un futuro que empieza con una sonrisa</h2>
                    <p class="lead text-muted mx-auto" style="max-width: 800px;">
                        Promovemos el bienestar de personas en condición de vulnerabilidad mediante la prestación de servicios de atención odontológica de calidad y gratuitos.
                    </p>
                </div>
            </div>
            <div class="row g-4 mt-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm card-hover-interactive p-3">
                        <div class="card-body text-center">
                            <div class="icon-circle-interactive bg-primary-subtle text-primary mx-auto mb-3">
                                <i class="bi bi-heart-pulse fs-2"></i>
                            </div>
                            <h5 class="card-title fw-bold">Salud Materno-Infantil</h5>
                            <p class="card-text text-muted small">Mejoramos la salud bucal desde la concepción para asegurar que cada madre y niño pueda vivir una vida plena y saludable.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm card-hover-interactive p-3">
                        <div class="card-body text-center">
                            <div class="icon-circle-interactive bg-primary-subtle text-primary mx-auto mb-3">
                                <i class="bi bi-shield-check fs-2"></i>
                            </div>
                            <h5 class="card-title fw-bold">Atención Gratuita y de Calidad</h5>
                            <p class="card-text text-muted small">Garantizamos el acceso a una atención odontológica integral y sin costo para mujeres embarazadas y niños de 0 a 3 años.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm card-hover-interactive p-3">
                        <div class="card-body text-center">
                            <div class="icon-circle-interactive bg-primary-subtle text-primary mx-auto mb-3">
                                <i class="bi bi-people-fill fs-2"></i>
                            </div>
                            <h5 class="card-title fw-bold">Compromiso Comunitario</h5>
                            <p class="card-text text-muted small">Nos involucramos activamente para transformar la realidad de las comunidades vulnerables en Paraguay.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Sección "Nuestro Trabajo" (Resumen con enlace) --}}
    <section id="trabajo" class="py-5 bg-light">
        <div class="container my-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold font-headline text-dark">Conoce Nuestro Impacto y Proyectos</h2>
                    <p class="lead text-muted">
                        Explora en detalle cómo nuestros programas transforman vidas y el rol de nuestro Centro Odontológico Integral (COI) en este esfuerzo.
                    </p>
                    <p class="text-muted">
                        Desde la implementación de programas educativos hasta las alianzas estratégicas que nos permiten llegar más lejos, cada acción refleja nuestro compromiso con la salud bucal de Paraguay.
                    </p>
                    <a href="{{ route('proyectos') }}" class="btn btn-primary mt-3">Ver Proyectos y Logros</a>
                </div>
                <div class="col-lg-6">
                    <img src="https://fundacionprodigio.org/wp-content/uploads/2024/07/coi-compress.jpg" class="img-fluid rounded-3 shadow-lg" alt="Instalaciones del Centro Odontológico Integral">
                </div>
            </div>
        </div>
    </section>
    @include('pages.partials.testimonios')

    {{-- NUEVA SECCIÓN: "Cómo Ayudar" (Call to Action) --}}
     <section id="ayudar" class="py-5 bg-white">
        <div class="container my-5">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold font-headline text-dark">Súmate a Nuestra Causa</h2>
                <p class="lead text-muted mx-auto" style="max-width: 800px;">Tu apoyo es fundamental para que podamos seguir brindando sonrisas saludables. Hay muchas formas de colaborar.</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm text-center p-4">
                        <div class="card-body">
                            <i class="bi bi-gift-fill fs-1 text-accent"></i>
                            <h4 class="card-title fw-bold mt-3">Realiza una Donación</h4>
                            <p class="card-text text-muted">Aporta económicamente para ayudarnos a cubrir los costos de insumos y tratamientos.</p>
                            <a href="{{ route('contacto') }}" class="btn btn-accent text-white mt-auto">Donar Ahora</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm text-center p-4">
                        <div class="card-body">
                            <i class="bi bi-building fs-1 text-accent"></i>
                            <h4 class="card-title fw-bold mt-3">Alianzas Corporativas</h4>
                            <p class="card-text text-muted">Conviértete en un socio estratégico y demuestra el compromiso social de tu empresa.</p>
                            <a href="{{ route('contacto') }}" class="btn btn-outline-primary mt-auto">Contactar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Services Section --}}    
    @include('pages.partials.contribution')
@endsection