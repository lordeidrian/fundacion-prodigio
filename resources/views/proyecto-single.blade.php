@extends('layouts.app')

@section('title', $project->title . ' - Fundación Prodigio')
@section('meta_description', $project->excerpt)
@section('og_title', $project->title . ' - Fundación Prodigio')
@section('og_description', $project->excerpt)
@section('og_image', asset('storage/' . $project->featured_image))

@section('content')
    {{-- HERO DEL PROYECTO --}}
    <div class="page-header-overlay"
         style="background-image: linear-gradient(45deg, rgba(29, 69, 107, 0.7), rgba(0, 100, 210, 0.6)), url('{{ asset('storage/' . $project->featured_image) }}');
                 background-position: center center; background-size: cover; background-repeat: no-repeat;">
        <div class="container py-5 text-center text-white">
            {{-- Breadcrumbs --}}
            <div class="d-flex justify-content-center mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('proyectos.index') }}" class="text-white-50 text-decoration-none">Nuestro Trabajo</a></li>
                        @if($project->parent)
                            <li class="breadcrumb-item"><a href="{{ route('proyectos.show', $project->parent->slug) }}" class="text-white-50 text-decoration-none">{{ $project->parent->title }}</a></li>
                        @endif
                        <li class="breadcrumb-item active text-white" aria-current="page">{{ $project->title }}</li>
                    </ol>
                </nav>
            </div>

            <h1 class="display-4 fw-bold">{{ $project->title }}</h1>
            <p class="lead">{{ $project->excerpt }}</p>
        </div>
    </div>

    {{-- CONTENIDO DEL PROYECTO --}}
    <section class="py-5 bg-light">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    {{-- CUERPO DEL PROYECTO --}}
                    <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm mb-5">
                        <div class="project-content content-enhanced">
                            {!! $project->content !!}
                        </div>
                    </div>

                    {{-- GALERÍA DE IMÁGENES --}}
                    @php $images = $project->media->where('type', 'image'); @endphp
                    @if($images->isNotEmpty())
                    <div class="mb-5">
                        <h3 class="fw-bold font-headline mb-4">
                            <i class="bi bi-images me-2"></i>Galería de Imágenes
                        </h3>
                        <div class="row g-4">
                            @foreach($images as $image_item)
                                <div class="col-sm-6 col-md-4">
                                    <a href="{{ asset('storage/' . $image_item->path) }}"
                                       data-lightbox="project-gallery"
                                       data-title="{{ $image_item->caption }}"
                                       class="d-block rounded overflow-hidden shadow-sm position-relative">
                                        <img src="{{ asset('storage/' . $image_item->path) }}"
                                             class="img-fluid"
                                             alt="{{ $image_item->caption ?? 'Galería de imagen' }}"
                                             style="object-fit: cover; height: 230px; width: 100%; transition: transform .3s ease;">
                                    </a>
                                    @if($image_item->caption)
                                        <p class="small text-muted text-center mt-2">{{ $image_item->caption }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- VIDEOS DEL PROYECTO --}}
                    @php $videos = $project->media->where('type', 'video'); @endphp
                    @if($videos->isNotEmpty())
                    <div class="pt-5 border-top mb-5">
                        <h3 class="fw-bold font-headline mb-4">
                            <i class="bi bi-camera-reels me-2"></i>Videos del Proyecto
                        </h3>
                        <div class="row g-4">
                            @foreach($videos as $video_item)
                                @php
                                    preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $video_item->video_url, $matches);
                                    $youtube_id = $matches[1] ?? null;
                                @endphp
                                @if($youtube_id)
                                <div class="col-md-6">
                                    <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-sm">
                                        <iframe src="https://www.youtube.com/embed/{{ $youtube_id }}"
                                                title="{{ $video_item->caption ?? 'Video de YouTube' }}"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen
                                                loading="lazy"></iframe>
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

                    {{-- SUB-PROYECTOS --}}
                    @if($project->children->isNotEmpty())
                        <div class="pt-5 border-top">
                            <div class="text-center mb-5">
                                <h2 class="display-5 fw-bold font-headline text-dark">Componentes del Programa</h2>
                                <p class="text-muted">Descubre las partes que forman este proyecto.</p>
                            </div>
                            <div class="row g-4 justify-content-center">
                                @foreach($project->children as $child)
                                    <div class="col-md-6 col-lg-5">
                                        <div class="card h-100 shadow-sm border-0 overflow-hidden rounded-4"
                                             style="transition: transform .3s ease;">
                                            <div class="ratio ratio-16x9">
                                                <img src="{{ asset('storage/' . $child->featured_image) }}"
                                                     alt="{{ $child->title }}"
                                                     class="w-100 h-100"
                                                     style="object-fit: cover;">
                                            </div>
                                            <div class="card-body p-4">
                                                <h5 class="card-title fw-bold">{{ $child->title }}</h5>
                                                <p class="card-text small text-muted">{{ $child->excerpt }}</p>
                                            </div>
                                            <div class="card-footer bg-white border-0 p-4 pt-0">
                                                <a href="{{ route('proyectos.show', $child->slug) }}"
                                                   class="btn btn-outline-primary w-100">Ver Componente</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
{{-- Structured Data for Project --}}
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Project",
  "name": "{{ $project->title }}",
  "description": "{{ $project->excerpt }}",
  "url": "{{ route('proyectos.show', $project) }}",
  "image": "{{ asset('storage/' . $project->featured_image) }}",
  "parentOrganization": {
      "@type": "Organization",
      "name": "Fundación Prodigio"
  }
}
</script>

{{-- Breadcrumb Schema --}}
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Inicio",
      "item": "{{ route('inicio') }}"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Nuestro Trabajo",
      "item": "{{ route('proyectos.index') }}"
    },
    @if($project->parent)
    {
      "@type": "ListItem",
      "position": 3,
      "name": "{{ $project->parent->title }}",
      "item": "{{ route('proyectos.show', $project->parent) }}"
    },
    @endif
    {
      "@type": "ListItem",
      "position": {{ $project->parent ? 4 : 3 }},
      "name": "{{ $project->title }}"
    }
  ]
}
</script>
@endsection

@push('styles')
<style>
    /* Estilos solo para el contenido del proyecto */
    .content-enhanced {
        font-size: 1.1rem;
        line-height: 1.9;
        color: #333;
    }

    .content-enhanced h1,
    .content-enhanced h2,
    .content-enhanced h3 {
        font-weight: 700;
        margin-top: 2rem;
        margin-bottom: 1rem;
        color: #1d456b;
    }

    .content-enhanced h2::after {
        content: "";
        display: block;
        width: 60px;
        height: 3px;
        background: #0d6efd;
        margin-top: .4rem;
        border-radius: 2px;
    }

    .content-enhanced p {
        margin-bottom: 1.2rem;
    }

    .content-enhanced ul {
        padding-left: 1.2rem;
        list-style: none;
    }
    .content-enhanced ul li {
        position: relative;
        padding-left: 1.5rem;
        margin-bottom: .7rem;
    }
    .content-enhanced ul li::before {
        content: "✔";
        position: absolute;
        left: 0;
        color: #0d6efd;
        font-weight: bold;
    }

    .content-enhanced blockquote {
        background: #f7faff;
        border-left: 4px solid #0d6efd;
        padding: 1rem 1.5rem;
        font-style: italic;
        border-radius: .5rem;
        margin: 2rem 0;
    }

    .content-enhanced img {
        max-width: 100%;
        height: auto;
        border-radius: .5rem;
        box-shadow: 0 4px 12px rgba(0,0,0,.08);
        margin: 1.5rem 0;
    }

    .content-enhanced table {
        width: 100%;
        margin-bottom: 1.5rem;
        border-collapse: collapse;
    }
    .content-enhanced table th,
    .content-enhanced table td {
        padding: .75rem;
        border: 1px solid #dee2e6;
    }
    .content-enhanced table th {
        background-color: #f1f4f8;
        font-weight: 600;
    }
</style>
@endpush
