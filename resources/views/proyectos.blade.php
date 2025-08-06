@extends('layouts.app')

@section('title', 'Nuestro Trabajo - Fundación Prodigio')

@section('content')

    @if(isset($pageSections['hero']))
        @php $hero = $pageSections['hero']->content; @endphp
        <div class="page-header-overlay" style="background-image: linear-gradient(45deg, rgba(29, 69, 107, 0.8), rgba(0, 100, 210, 0.7)), url('{{ asset('images/banner-proyectos.jpg') }}');">
            <div class="container py-5 text-center text-white">
                <h1 class="display-4 fw-bold">{{ $hero['title'] ?? 'Nuestro Trabajo' }}</h1>
                <p class="lead">{{ $hero['subtitle'] ?? 'Conoce los proyectos e iniciativas que transforman nuestra misión en acciones concretas.' }}</p>
            </div>
        </div>
    @endif

    <section class="py-5 bg-light">
        <div class="container my-5">
            @if(isset($projects) && $projects->isNotEmpty())
                @foreach($projects as $project)
                    <div class="row align-items-center g-5 {{ !$loop->first ? 'mt-5 pt-5 border-top' : '' }}">
                        <div class="col-lg-6 {{ $loop->odd ? 'order-lg-2' : '' }}">
                            <a href="{{ route('proyectos.show', $project->slug) }}">
                                <img src="{{ asset('storage/' . $project->featured_image) }}" class="img-fluid rounded-3 shadow-lg hover-lift" alt="{{ $project->title }}">
                            </a>
                        </div>
                        <div class="col-lg-6 {{ $loop->odd ? 'order-lg-1' : '' }}">
                            <span class="badge bg-primary-subtle text-primary-emphasis rounded-pill mb-3 fs-6">Programa Insignia</span>
                            <h2 class="display-5 fw-bold font-headline text-dark">{{ $project->title }}</h2>
                            <p class="lead text-muted">{{ $project->excerpt }}</p>
                            <div class="project-content-preview text-muted">
                                {!! Str::limit(strip_tags($project->content), 250) !!}
                            </div>

                            {{-- INICIO DE LA SECCIÓN DE SUB-PROYECTOS --}}
                            @if($project->children->isNotEmpty())
                                <div class="mt-4">
                                    <h6 class="fw-bold">Componentes del Programa:</h6>
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach($project->children as $child)
                                            <a href="{{ route('proyectos.show', $child->slug) }}" class="btn btn-sm btn-outline-secondary">
                                                {{ $child->title }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            {{-- FIN DE LA SECCIÓN DE SUB-PROYECTOS --}}

                            <a href="{{ route('proyectos.show', $project->slug) }}" class="btn btn-primary btn-lg mt-4">
                                Conocer el Programa <i class="bi bi-arrow-right-short"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center py-5">
                    <h3 class="text-muted">Próximamente compartiremos nuestros proyectos.</h3>
                </div>
            @endif
        </div>
    </section>

    {{-- INICIO DE LA SECCIÓN DE IMPACTO (REINCORPORADA) --}}
    @if(isset($pageSections['impacto']) && isset($impactStats) && $impactStats->isNotEmpty())
        @php $impacto = $pageSections['impacto']->content; @endphp
        <section class="py-5 bg-white">
            <div class="container my-5 text-center">
                <h2 class="display-5 fw-bold font-headline text-dark mb-3">{{ $impacto['title'] ?? 'Nuestro Impacto en Cifras' }}</h2>
                <p class="lead text-muted mx-auto mb-5" style="max-width: 800px;">{{ $impacto['subtitle'] ?? 'Resultados que hemos alcanzado.' }}</p>
                <div class="row g-4">
                    @foreach($impactStats as $stat)
                    <div class="col-md-6 col-lg-3">
                        <div class="card h-100 border-0 shadow-sm p-3">
                            <div class="card-body">
                                <h3 class="display-4 fw-bold text-primary">{{ $stat->value }}</h3>
                                <p class="fw-semibold mb-0">{{ $stat->label }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- FIN DE LA SECCIÓN DE IMPACTO --}}

    @if(isset($pageSections['cta']))
        @php $cta = $pageSections['cta']->content; @endphp
        <section class="py-5 bg-light">
            <div class="container my-5 text-center">
                <h2 class="display-5 fw-bold font-headline text-dark">{{ $cta['title'] ?? 'Únete a Nosotros' }}</h2>
                <p class="lead text-muted mx-auto" style="max-width: 800px;">{{ $cta['subtitle'] ?? 'Tu apoyo nos permite seguir creciendo.' }}</p>
                <a href="{{ url($cta['button_link'] ?? '/contacto') }}" class="btn btn-dark btn-lg mt-3">{{ $cta['button_text'] ?? 'Contactar' }}</a>
            </div>
        </section>
    @endif

@endsection
