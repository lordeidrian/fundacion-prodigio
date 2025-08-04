@extends('layouts.app')

@section('title', 'Inicio - Fundación Prodigio')

@section('content')

    {{-- HERO SECTION COMO CARRUSEL --}}
<div id="heroCarousel" class="carousel slide position-relative" data-bs-ride="carousel" data-bs-interval="5000">
    
    {{-- Indicadores del carrusel --}}
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    {{-- Contenido del carrusel (las imágenes) --}}
    <div class="carousel-inner">
        <div class="carousel-item active" style="background-image: url('{{ asset('images/banner-4-i.JPG') }}');">
            <div class="container d-flex align-items-center pb-5 mb-5" style="min-height: 85vh;">
                <div class="row">
                    <div class="col-lg-9 text-gray-800">
                        <h1 class="display-4 fw-bold mb-2">Construyendo un futuro más saludable para Paraguay</h1>
                        <p class="lead mb-2">
                            Impulsamos el bienestar de comunidades vulnerables, garantizando el acceso a una salud digna<br>y de calidad como un derecho fundamental para todos.
                        </p>
                        <a href="#compromiso" class="btn btn-primary btn-lg">Súmate a la causa</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item" style="background-image: url('{{ asset('images/banner-1.png') }}');">
             <div class="container d-flex align-items-center pb-5 mb-5" style="min-height: 85vh;">
                <div class="row">
                    <div class="col-lg-9 text-gray-800">
                        <h1 class="display-4 fw-bold mb-2">Construyendo un futuro más saludable para Paraguay</h1>
                        <p class="lead mb-2">
                            Impulsamos el bienestar de comunidades vulnerables, garantizando el acceso a una salud digna<br>y de calidad como un derecho fundamental para todos.
                        </p>
                        <a href="#compromiso" class="btn btn-primary btn-lg">Súmate a la causa</a>
                    </div>
                </div>
             </div>
        </div>
        <div class="carousel-item" style="background-image: url('{{ asset('images/banner-2.png') }}');">
             <div class="container d-flex align-items-center pb-5 mb-5" style="min-height: 85vh;">
                <div class="row">
                    <div class="col-lg-9 text-gray-800">
                        <h1 class="display-4 fw-bold mb-2">Construyendo un futuro más saludable para Paraguay</h1>
                        <p class="lead mb-2">
                            Impulsamos el bienestar de comunidades vulnerables, garantizando el acceso a una salud digna<br>y de calidad como un derecho fundamental para todos.
                        </p>
                        <a href="#compromiso" class="btn btn-primary btn-lg">Súmate a la causa</a>
                    </div>
                </div>
             </div>
        </div>
    </div>

    {{-- Controles de Anterior/Siguiente --}}
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>

    {{-- El separador de forma SVG --}}
    <div class="hero-shape-divider d-none d-lg-block">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
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
                    <h2 class="display-5 fw-bold font-headline text-dark">¿Quiénes somos?</h2>
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

    {{-- ÚLTIMAS NOTICIAS --}}
    {{-- Muestra las últimas noticias con un enfoque en la transparencia y el impacto --}}
    <section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Un Vistazo a Nuestro Trabajo</h2>
            <p class="lead text-muted">Nuestra misión es transformar vidas a través de acciones concretas.</p>
        </div>

        {{-- Usamos 'justify-content-center' para centrar las columnas más pequeñas --}}
        <div class="row g-4 justify-content-center">
            
            {{-- Cambiamos col-lg-6 a col-lg-5 para hacerlas más compactas --}}
            <div class="col-lg-5 col-md-6">
                <div class="card shadow-sm h-100">
                     <img src="{{ asset('images/embarazo-sonriente.jpg') }}" class="card-img-top" alt="Proyecto Embarazo Sonriente" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h4 class="card-title fw-bold">Proyecto "Embarazo Sonriente"</h4>
                        <p class="card-text small">Garantizamos atención odontológica gratuita a mujeres embarazadas de escasos recursos, protegiendo su salud y la de sus futuros bebés.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-6">
                <div class="card shadow-sm h-100">
                    <img src="https://fundacionprodigio.org/wp-content/uploads/2024/07/coi-compress.jpg" class="card-img-top" alt="Centro Odontológico Integral" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h4 class="card-title fw-bold">Centro Odontológico Integral (COI)</h4>
                        <p class="card-text small">El corazón de nuestras operaciones. Una clínica modelo con tecnología de punta para ofrecer tratamientos de excelencia.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('proyectos') }}" class="btn btn-primary btn-lg">
                Conoce más sobre nuestros proyectos
            </a>
        </div>
    </div>
</section>


<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Últimas Noticias y Eventos</h2>
            <p class="lead text-muted">Mantente al día con nuestras actividades más recientes.</p>
        </div>

        @if($latestPosts->isNotEmpty())
            <div id="carouselNoticias" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    {{-- Agrupamos los posts en chunks de 3 para el carrusel --}}
                    @foreach($latestPosts->chunk(3) as $chunk)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="row g-4">
                                @foreach($chunk as $post)
                                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                        <div class="card shadow-sm w-100">
                                            <a href="{{ route('noticia.single', $post) }}">
                                                 {{-- Usamos 'featured_image' como en tu último código --}}
                                                <img src="{{ asset('storage/' . $post->featured_image) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 220px; object-fit: cover;">
                                            </a>
                                            <div class="card-body text-center d-flex flex-column">
                                                <h5 class="card-title fw-bold">
                                                    <a href="{{ route('noticia.single', $post) }}" class="text-decoration-none text-dark stretched-link">{{ $post->title }}</a>
                                                </h5>
                                                <p class="card-text text-muted small mt-auto">
                                                    <i class="bi bi-calendar-event me-1"></i> Publicado el {{ $post->created_at->format('d/m/Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                </div>

                {{-- Los botones de control del carrusel --}}
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselNoticias" data-bs-slide="prev">
                    {{-- El ícono de la flecha ahora es más visible --}}
                    <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.3); border-radius: 50%; padding: 1.2rem;"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselNoticias" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.3); border-radius: 50%; padding: 1.2rem;"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        @else
            <div class="text-center text-muted py-5">
                <p class="h5">Aún no hay noticias para mostrar.</p>
            </div>
        @endif

        <div class="text-center mt-5">
            <a href="{{ route('noticias') }}" class="btn btn-dark btn-lg">
                Ver Todas las Entradas
            </a>
        </div>
    </div>
</section>

    {{-- Mantengo tu sección de contribución si aún es relevante --}}
    @include('pages.partials.contribution')

@endsection