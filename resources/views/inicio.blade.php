@extends('layouts.app')

@section('title', 'Inicio - Fundación Prodigio')

@section('content')

    {{-- HERO SECTION COMO CARRUSEL --}}
    @if(isset($banners) && $banners->isNotEmpty())
        <div id="heroCarousel" class="carousel slide position-relative" data-bs-ride="carousel" data-bs-interval="5000">

            {{-- Indicadores del carrusel --}}
            <div class="carousel-indicators">
                @foreach($banners as $banner)
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}" aria-label="Slide {{ $loop->iteration }}"></button>
                @endforeach
            </div>

            {{-- Contenido del carrusel (las imágenes) --}}
            <div class="carousel-inner">
                @foreach($banners as $banner)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="background-image: url('{{ asset('storage/' . $banner->image_path) }}');
                    background-position: {{ $banner->image_position ?? 'center center' }};
                    background-size: cover;
                    background-repeat: no-repeat;">
                        <div class="container d-flex align-items-center" style="min-height: 95vh;">
                            <div class="row">
                                <div class="col-lg-8">

                                    {{-- ================================================ --}}
                                    {{-- INICIO DE LA MODIFICACIÓN DINÁMICA --}}
                                    {{-- ================================================ --}}

                                    @php
                                        // 1. Obtenemos los valores de la BD con fallbacks por si acaso.
                                        $textColor = $banner->text_color ?? '#FFFFFF';
                                        $boxRgb = hex2rgb($banner->box_color ?? '#000000');
                                        $boxOpacity = $banner->box_opacity ?? 0.25;
                                    @endphp

                                    {{-- 2. Aplicamos los valores como variables CSS en el estilo del div. --}}
                                    <div class="hero-text-box" style="--text-color: {{ $textColor }}; --box-rgb: {{ $boxRgb }}; --box-opacity: {{ $boxOpacity }};">
                                        <h2 class="fw-bold mb-3">{{ $banner->title }}</h2>
                                        <p class="fs-6 mb-4">
                                            {!! nl2br(e($banner->subtitle)) !!}
                                        </p>
                                        @if($banner->button_text && $banner->button_link)
                                            <a href="{{ $banner->button_link }}" class="btn btn-primary btn">{{ $banner->button_text }}</a>
                                        @endif
                                    </div>

                                    {{-- ================================================ --}}
                                    {{-- FIN DE LA MODIFICACIÓN --}}
                                    {{-- ================================================ --}}

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
    @endif

    {{-- NUESTROS PILARES DE ACCIÓN --}}
    <section id="compromiso" class="py-5 bg-white">
        <div class="container my-5">
            <div class="row text-center">
                <div class="col-12">
                    <h2 class="display-5 fw-bold font-headline text-dark">
                        {!! $pageSections['pilares_accion']->content['title'] ?? 'Nuestros Pilares de Acción' !!}
                    </h2>

                    <p class="lead text-muted mx-auto" style="max-width: 800px;">
                        {!! $pageSections['pilares_accion']->content['subtitle'] ?? 'Nuestra labor se fundamenta en tres compromisos clave que guían cada uno de nuestros proyectos y alianzas.' !!}
                    </p>
                </div>
            </div>
            @if(isset($actionPillars) && $actionPillars->isNotEmpty())
                <div class="row g-4 mt-4">
                    @foreach($actionPillars as $pillar)
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 border-0 shadow-sm card-hover-interactive p-3">
                                <div class="card-body text-center">
                                    <div class="icon-circle-interactive bg-primary-subtle text-primary mx-auto mb-3">
                                        <i class="{{ $pillar->icon ?? 'bi bi-heart-pulse' }} fs-2"></i>
                                    </div>
                                    <h5 class="card-title fw-bold">{{ $pillar->title }}</h5>
                                    <p class="card-text text-muted small">{{ $pillar->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- SOBRE LA FUNDACIÓN (Resumen) --}}
    @if(isset($pageSections['quienes_somos']))
        @php $quienesSomos = $pageSections['quienes_somos']->content; @endphp
        <section class="py-5 bg-light">
            <div class="container my-5">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        @if(!empty($quienesSomos['image_path']))
                            <img src="{{ asset('storage/' . $quienesSomos['image_path']) }}" class="img-fluid rounded-3 shadow-lg" alt="{{ $quienesSomos['title'] ?? 'Equipo de Fundación Prodigio' }}">
                        @else
                            {{-- Imagen por defecto si no hay una en la BD --}}
                            <img src="{{ asset('images/fundacion-equipo.jpg') }}" class="img-fluid rounded-3 shadow-lg" alt="Equipo de Fundación Prodigio en una reunión comunitaria">
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <h2 class="display-5 fw-bold font-headline text-dark">{{ $quienesSomos['title'] ?? '¿Quiénes somos?' }}</h2>
                        <p class="lead text-muted">
                            {{ $quienesSomos['subtitle'] ?? 'Fundación Prodigio nació en 2023 con un propósito claro: ser un agente de cambio para el bienestar de quienes más lo necesitan en Paraguay.' }}
                        </p>
                        <div class="text-muted">
                            {!! $quienesSomos['text'] ?? 'Creemos que el acceso a la salud es un derecho humano y trabajamos incansablemente para crear soluciones sostenibles que generen un impacto positivo y duradero. Nuestra visión es ser una organización de referencia que promueva el acceso universal y equitativo a la salud.' !!}
                        </div>
                        @if(!empty($quienesSomos['button_text']) && !empty($quienesSomos['button_link']))
                            <a href="{{ url($quienesSomos['button_link']) }}" class="btn btn-primary mt-3">{{ $quienesSomos['button_text'] }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- UN VISTAZO A NUESTRO TRABAJO --}}
    {{-- UN VISTAZO A NUESTRO TRABAJO --}}
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">{{ $pageSections['vistazo_trabajo']->content['title'] ?? 'Un Vistazo a Nuestro Trabajo' }}</h2>
                <p class="lead text-muted">{{ $pageSections['vistazo_trabajo']->content['subtitle'] ?? 'Nuestra misión es transformar vidas a través de acciones concretas.' }}</p>
            </div>

            {{-- ================================================ --}}
            {{-- INICIO DE LA MODIFICACIÓN DINÁMICA --}}
            {{-- ================================================ --}}

            @if(isset($featuredProjects) && $featuredProjects->isNotEmpty())
                <div class="row g-4 justify-content-center">
                    @foreach($featuredProjects as $project)
                        <div class="col-lg-5 col-md-6 d-flex align-items-stretch">
                            <div class="card shadow-sm h-100 w-100">
                                {{-- La imagen ahora es un enlace a la página del proyecto --}}
                                <a href="{{ route('proyectos.show', $project) }}">
                                    <img src="{{ asset('storage/' . $project->featured_image) }}" class="card-img-top" alt="{{ $project->title }}" style="height: 250px; object-fit: cover;">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title fw-bold">
                                        {{-- El título también es un enlace --}}
                                        <a href="{{ route('proyectos.show', $project) }}" class="text-decoration-none text-dark stretched-link">{{ $project->title }}</a>
                                    </h4>
                                    {{-- Usamos el campo 'excerpt' (resumen) del proyecto --}}
                                    <p class="card-text small">{{ $project->excerpt }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-5">
                    <a href="{{ route('proyectos.index') }}" class="btn btn-primary btn-lg">
                        Conoce más sobre nuestros proyectos
                    </a>
                </div>
            @else
                <div class="text-center text-muted">
                    <p>Próximamente publicaremos nuestros proyectos aquí.</p>
                </div>
            @endif

            {{-- ================================================ --}}
            {{-- FIN DE LA MODIFICACIÓN --}}
            {{-- ================================================ --}}
        </div>
    </section>

    {{-- ÚLTIMAS NOTICIAS Y EVENTOS --}}
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">{{ $pageSections['ultimas_noticias']->content['title'] ?? 'Últimas Noticias y Eventos' }}</h2>
                <p class="lead text-muted">{{ $pageSections['ultimas_noticias']->content['subtitle'] ?? 'Mantente al día con nuestras actividades más recientes.' }}</p>
            </div>

            {{-- NOTA: Esta sección ya estaba correctamente configurada para ser dinámica con $latestPosts --}}
            @if(isset($latestPosts) && $latestPosts->isNotEmpty())
                <div id="carouselNoticias" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($latestPosts->chunk(3) as $chunk)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <div class="row g-4">
                                    @foreach($chunk as $post)
                                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                            <div class="card shadow-sm w-100">
                                                <a href="{{ route('noticias.single', $post) }}">
                                                   <img src="{{ asset('storage/' . $post->featured_image) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 220px; object-fit: cover;">
                                                </a>
                                                <div class="card-body text-center d-flex flex-column">
                                                    <h5 class="card-title fw-bold">
                                                        <a href="{{ route('noticias.single', $post) }}" class="text-decoration-none text-dark stretched-link">{{ $post->title }}</a>
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

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselNoticias" data-bs-slide="prev">
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
                <a href="{{ route('noticias.index') }}" class="btn btn-dark btn-lg">
                    Ver Todas las Entradas
                </a>
            </div>
        </div>
    </section>

    {{-- SÚMATE A NUESTRA CAUSA --}}
    @include('pages.partials.contribution')

@endsection

