@extends('layouts.app')

@section('title', 'Inicio - Fundación Prodigio')

@section('content')

    {{-- HERO SECTION --}}
    {{-- Mantiene tu estilo visual pero con un mensaje más amplio sobre la misión. --}}
    <div class="hero-gradient-overlay" style="background-image: linear-gradient(45deg, rgba(29, 69, 107, 0.8), rgba(0, 100, 210, 0.7)), url('{{ asset('images/banner-4-i.jpg') }}');">
        <div class="container d-flex align-items-center" style="min-height: 70vh;">
            <div class="row">
                <div class="col-lg-9 text-white">
                    {{-- Texto enfocado en la Misión de la Fundación --}}
                    <h1 class="display-4 fw-bold mb-2 animate-on-load">Construyendo un futuro más saludable para Paraguay</h1>
                    <p class="lead mb-2 animate-on-load delay-1">
                        Impulsamos el bienestar de comunidades vulnerables, garantizando el acceso a una salud digna<br>y de calidad como un derecho fundamental para todos.
                    </p>
                    <a href="#ayudar" class="btn btn-primary btn-lg animate-on-load delay-2">Súmate a la causa</a>
                </div>
            </div>
        </div>
        {{-- Tu separador de forma se mantiene intacto --}}
        <div class="hero-shape-divider d-none d-lg-block">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" style="width: 100%; height: 142px;">
                <path d="M0,0 C300,100 900,0 1200,100 V120 H0 Z" class="shape-fill"></path>
            </svg>
        </div>
    </div>


    {{-- NUESTRO COMPROMISO --}}
    {{-- Usando tu estructura de tarjetas e iconos, pero con el contenido reenfocado --}}
    <section id="compromiso" class="py-5 bg-white">
        <div class="container my-5">
            <div class="row text-center">
                <div class="col-12">
                    <h2 class="display-5 fw-bold font-headline text-dark">Nuestros Pilares de Acción</h2>
                    <p class="lead text-muted mx-auto" style="max-width: 800px;">
                        Nuestra labor se fundamenta en tres compromisos clave que guían cada uno de nuestros proyectos y alianzas.
                    </p>
                </div>
            </div>
            <div class="row g-4 mt-4">
                {{-- Tarjeta 1: Salud Materno-Infantil --}}
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm card-hover-interactive p-3">
                        <div class="card-body text-center">
                            <div class="icon-circle-interactive bg-primary-subtle text-primary mx-auto mb-3">
                                <i class="bi bi-heart-pulse fs-2"></i>
                            </div>
                            <h5 class="card-title fw-bold">Salud Materno-Infantil</h5>
                            <p class="card-text text-muted small">Enfocamos nuestros esfuerzos en la salud de madres y niños en sus primeros años, una etapa crucial para un desarrollo pleno y saludable.</p>
                        </div>
                    </div>
                </div>
                {{-- Tarjeta 2: Atención de Calidad --}}
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm card-hover-interactive p-3">
                        <div class="card-body text-center">
                            <div class="icon-circle-interactive bg-primary-subtle text-primary mx-auto mb-3">
                                <i class="bi bi-shield-check fs-2"></i>
                            </div>
                            <h5 class="card-title fw-bold">Atención Gratuita y de Calidad</h5>
                            <p class="card-text text-muted small">Rompemos las barreras económicas ofreciendo servicios integrales y gratuitos con los más altos estándares profesionales y un trato digno.</p>
                        </div>
                    </div>
                </div>
                {{-- Tarjeta 3: Compromiso Comunitario --}}
                <div class="col-md-12 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm card-hover-interactive p-3">
                        <div class="card-body text-center">
                            <div class="icon-circle-interactive bg-primary-subtle text-primary mx-auto mb-3">
                                <i class="bi bi-people-fill fs-2"></i>
                            </div>
                            <h5 class="card-title fw-bold">Compromiso Comunitario</h5>
                            <p class="card-text text-muted small">Nos involucramos activamente para transformar la realidad de las comunidades vulnerables, trabajando en conjunto con ellas y nuestros socios.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SOBRE LA FUNDACIÓN (Resumen) --}}
    <section class="py-5 bg-light">
        <div class="container my-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    {{-- Puedes cambiar esta imagen por una que represente mejor a la fundación --}}
                    <img src="{{ asset('images/fundacion-equipo.jpg') }}" class="img-fluid rounded-3 shadow-lg" alt="Equipo de Fundación Prodigio en una reunión comunitaria">
                </div>
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold font-headline text-dark">Nuestra Historia y Misión</h2>
                    <p class="lead text-muted">
                        Fundación Prodigio nació en 2023 con un propósito claro: ser un agente de cambio para el bienestar de quienes más lo necesitan en Paraguay.
                    </p>
                    <p class="text-muted">
                        Creemos que el acceso a la salud es un derecho humano y trabajamos incansablemente para crear soluciones sostenibles que generen un impacto positivo y duradero. Nuestra visión es ser una organización de referencia que promueva el acceso universal y equitativo a la salud.
                    </p>
                    <a href="{{ url('/nosotros') }}" class="btn btn-primary mt-3">Conocer más sobre nosotros</a>
                </div>
            </div>
        </div>
    </section>

    {{-- Incluir sección de testimonios si se mantiene --}}
    @include('pages.partials.testimonios')

    

    {{-- Mantengo tu sección de contribución si aún es relevante --}}
    @include('pages.partials.contribution')

@endsection