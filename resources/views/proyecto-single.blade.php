@extends('layouts.app')

@section('title', $project->title . ' - Fundación Prodigio')

@section('content')
    {{-- HERO DEL PROYECTO --}}
    <div class="page-header-overlay"
         style="background-image: linear-gradient(45deg, rgba(29, 69, 107, 0.7), rgba(0, 100, 210, 0.6)), url('{{ asset('storage/' . $project->featured_image) }}');
                 background-position: center center; background-size: cover; background-repeat: no-repeat;">
        <div class="container py-5 text-center text-white">
            @if($project->parent)
                <a href="{{ route('proyectos.show', $project->parent->slug) }}" class="text-white-50 text-decoration-none d-block mb-2"><i class="bi bi-arrow-left-short"></i> Parte de: {{ $project->parent->title }}</a>
            @else
                <a href="{{ route('proyectos.index') }}" class="text-white-50 text-decoration-none d-block mb-2"><i class="bi bi-arrow-left-short"></i> Volver a Nuestro Trabajo</a>
            @endif
            <h1 class="display-4 fw-bold">{{ $project->title }}</h1>
            <p class="lead">{{ $project->excerpt }}</p>
        </div>
    </div>

    {{-- CONTENIDO DEL PROYECTO SIN SIDEBAR --}}
    <section class="py-5 bg-light">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="bg-white p-4 p-md-5 rounded shadow-sm">
                        <div class="project-content">{!! $project->content !!}</div>
                    </div>

                    {{-- SECCIÓN SEPARADA PARA IMÁGENES --}}
                    @php $images = $project->media->where('type', 'image'); @endphp
                    @if($images->isNotEmpty())
                    <div class="mt-5">
                        <h3 class="fw-bold font-headline mb-4">Galería de Imágenes</h3>
                        <div class="row g-4">
                            @foreach($images as $image_item)
                                <div class="col-md-4">
                                    <a href="{{ asset('storage/' . $image_item->path) }}" data-lightbox="project-gallery" data-title="{{ $image_item->caption }}">
                                        <img src="{{ asset('storage/' . $image_item->path) }}" class="img-fluid rounded shadow-sm hover-lift" alt="{{ $image_item->caption ?? 'Galería de imagen' }}">
                                    </a>
                                    @if($image_item->caption)
                                        <p class="small text-muted text-center mt-2">{{ $image_item->caption }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- SECCIÓN SEPARADA PARA VIDEOS --}}
                    @php $videos = $project->media->where('type', 'video'); @endphp
                    @if($videos->isNotEmpty())
                    <div class="mt-5 pt-5 border-top">
                        <h3 class="fw-bold font-headline mb-4">Videos del Proyecto</h3>
                        <div class="row g-4">
                            @foreach($videos as $video_item)
                                @php
                                    preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $video_item->video_url, $matches);
                                    $youtube_id = $matches[1] ?? null;
                                @endphp
                                @if($youtube_id)
                                <div class="col-md-6">
                                    <div class="ratio ratio-16x9 rounded overflow-hidden shadow-sm">
                                        <iframe src="https://www.youtube.com/embed/{{ $youtube_id }}" title="{{ $video_item->caption ?? 'Video de YouTube' }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                    @if($video_item->caption)
                                        <p class="small text-muted text-center mt-2">{{ $video_item->caption }}</p>
                                    @endif
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            {{-- MOSTRAR SUB-PROYECTOS SI EXISTEN --}}
            @if($project->children->isNotEmpty())
                <div class="mt-5 pt-5 border-top">
                    <div class="text-center mb-5"><h2 class="display-5 fw-bold font-headline text-dark">Componentes del Programa</h2></div>
                    <div class="row g-4 justify-content-center">
                        @foreach($project->children as $child)
                            <div class="col-md-6 col-lg-5">
                                <div class="card h-100 shadow-sm border-0 overflow-hidden card-project hover-lift">
                                    <img src="{{ asset('storage/' . $child->featured_image) }}" class="card-img-top" alt="{{ $child->title }}" style="height: 220px; object-fit: cover;">
                                    <div class="card-body p-4"><h5 class="card-title fw-bold">{{ $child->title }}</h5><p class="card-text small text-muted">{{ $child->excerpt }}</p></div>
                                    <div class="card-footer bg-white border-0 p-4 pt-0"><a href="{{ route('proyectos.show', $child->slug) }}" class="btn btn-outline-primary stretched-link">Ver Componente</a></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
