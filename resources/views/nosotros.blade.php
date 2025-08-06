@extends('layouts.app')

@section('title', 'Sobre Nosotros - Fundación Prodigio')

@section('content')

    {{-- HERO SECTION PARA PÁGINAS INTERNAS --}}
    @if(isset($pageSections['hero']))
        @php $hero = $pageSections['hero']->content; @endphp
        <div class="page-header-overlay"
             style="background-image: linear-gradient(45deg, rgba(29, 69, 107, 0.8), rgba(0, 100, 210, 0.7)), url('{{ !empty($hero['image_path']) ? asset('storage/' . $hero['image_path']) : asset('images/banner-2.png') }}');
                     background-position: center 20%; background-size: cover; background-repeat: no-repeat;">
            <div class="container py-5">
                <div class="row">
                    <div class="col-12 text-center text-white">
                        <h1 class="display-4 fw-bold">{{ $hero['title'] ?? 'Nuestra Esencia' }}</h1>
                        <p class="lead">{{ $hero['subtitle'] ?? 'Conoce la historia, los principios y el equipo que impulsan nuestra misión.' }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- NUESTRA HISTORIA Y MISIÓN --}}
    @if(isset($pageSections['historia_mision']))
        @php $historia = $pageSections['historia_mision']->content; @endphp
        <section class="py-5 bg-white">
            <div class="container my-5">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <h2 class="display-5 fw-bold font-headline text-dark">{{ $historia['title'] ?? 'Quiénes Somos' }}</h2>
                        <p class="lead text-muted">{{ $historia['lead_text'] ?? '' }}</p>
                        <p>{!! $historia['main_text'] ?? '' !!}</p>
                        <h3 class="fw-bold fs-4 mt-4">{{ $historia['mission_title'] ?? 'Nuestra Misión' }}</h3>
                        <p>{!! $historia['mission_text'] ?? '' !!}</p>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ !empty($historia['image_path']) ? asset('storage/' . $historia['image_path']) : asset('images/banner-1.png') }}" class="img-fluid rounded-3 shadow-lg" alt="Imagen sobre la historia de la fundación">
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- VISIÓN Y LÍNEAS ESTRATÉGICAS --}}
    @if(isset($pageSections['vision_estrategia']))
        @php $vision = $pageSections['vision_estrategia']->content; @endphp
        <section class="py-5 bg-light">
            <div class="container my-5">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 order-lg-2">
                        <h2 class="display-5 fw-bold font-headline text-dark">{{ $vision['title'] ?? 'Nuestra Visión de Futuro' }}</h2>
                        <p class="lead text-muted">{{ $vision['lead_text'] ?? '' }}</p>
                        <p>{!! $vision['main_text'] ?? '' !!}</p>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <h4 class="fw-bold mb-3">{{ $vision['strategy_title'] ?? 'Nuestras Líneas Estratégicas' }}</h4>
                        @if(isset($strategicLines) && $strategicLines->isNotEmpty())
                            <div class="row g-3">
                                @foreach($strategicLines as $line)
                                <div class="col-md-6">
                                    <div class="card h-100 border-0 shadow-sm p-2">
                                        <div class="card-body">
                                            <h6 class="fw-bold text-primary">{{ $line->title }}</h6>
                                            <div class="small text-muted mb-0">{!! $line->description !!}</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- NUESTROS VALORES --}}
    @if(isset($pageSections['valores']))
        @php $valoresSection = $pageSections['valores']->content; @endphp
        <section class="py-5 bg-white">
            <div class="container my-5">
                <div class="text-center mb-5">
                    <h2 class="display-5 fw-bold font-headline text-dark">{{ $valoresSection['title'] ?? 'Nuestros Valores' }}</h2>
                    <p class="lead text-muted mx-auto" style="max-width: 800px;">{{ $valoresSection['subtitle'] ?? 'Estos son los principios que nos definen y guían cada una de nuestras decisiones y acciones.' }}</p>
                </div>
                @if(isset($values) && $values->isNotEmpty())
                <div class="row g-4">
                    @foreach($values as $value)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-light p-3">
                            <div class="card-body">
                                <div class="mb-3"><i class="{{ $value->icon ?? 'bi bi-patch-check-fill' }} fs-2 text-accent"></i></div>
                                <h5 class="fw-bold">{{ $value->title }}</h5>
                                <div class="text-muted small">{!! $value->description !!}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </section>
    @endif

    {{-- NUESTRO EQUIPO / REFERENTES --}}
    @if(isset($pageSections['equipo']))
        @php $equipoSection = $pageSections['equipo']->content; @endphp
        <section class="py-5 bg-light">
            <div class="container my-5">
                <div class="text-center mb-5">
                    <h2 class="display-5 fw-bold font-headline text-dark">{{ $equipoSection['title'] ?? 'Nuestro Equipo Directivo' }}</h2>
                    <p class="lead text-muted mx-auto" style="max-width: 800px;">{{ $equipoSection['subtitle'] ?? 'Conoce a los referentes que lideran y guían la visión de la Fundación Prodigio.' }}</p>
                </div>
                @if(isset($teamMembers) && $teamMembers->isNotEmpty())
                <div class="row justify-content-center g-4">
                    @foreach($teamMembers as $member)
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow-sm border-0 h-100 text-center">
                            <div class="card-body">
                                <img src="{{ asset('storage/' . $member->image_path) }}"
                                     class="rounded-circle mb-3"
                                     alt="{{ $member->name }}"
                                     style="width: 150px; height: 150px; object-fit: cover;">
                                <h5 class="card-title fw-bold">{{ $member->name }}</h5>
                                <p class="card-subtitle mb-2 text-primary fw-semibold">{{ $member->position }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </section>
    @endif

    {{-- CALL TO ACTION (CTA) --}}
    @if(isset($pageSections['cta']))
        @php $cta = $pageSections['cta']->content; @endphp
        <section id="ayudar" class="py-5 bg-white">
            <div class="container my-5">
                <div class="text-center">
                    <h2 class="display-5 fw-bold font-headline text-dark">{{ $cta['title'] ?? '¿Quieres formar parte del cambio?' }}</h2>
                    <p class="lead text-muted mx-auto" style="max-width: 800px;">{{ $cta['subtitle'] ?? 'Tu apoyo nos permite llegar a más personas. Contacta con nosotros para explorar formas de colaborar.' }}</p>
                    <a href="{{ url($cta['button_link'] ?? '/contacto') }}" class="btn btn-primary btn-lg mt-3">{{ $cta['button_text'] ?? 'Conviértete en Socio' }}</a>
                </div>
            </div>
        </section>
    @endif

@endsection
