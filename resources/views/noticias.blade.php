@extends('layouts.app')

@section('title', 'Noticias y Eventos - Fundación Prodigio')

@section('content')

    {{-- HERO SECTION PARA PÁGINAS INTERNAS --}}
    <div class="page-header-overlay" 
         style="background-image: linear-gradient(45deg, rgba(29, 69, 107, 0.8), rgba(0, 100, 210, 0.7)), url('{{ asset('images/banner-noticias.jpg') }}'); 
                background-position: center center; 
                background-size: cover; 
                background-repeat: no-repeat;">
        
        <div class="container py-5">
            <div class="row">
                <div class="col-12 text-center text-white">
                    <h1 class="display-4 fw-bold">Noticias y Eventos</h1>
                    <p class="lead">Mantente al día con nuestras últimas actividades, logros y comunicados.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- LISTADO DE NOTICIAS --}}
    <div class="container py-5">
        <div class="row g-4">
            @forelse ($posts as $post)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 card-hover-interactive">
                        <img src="{{ asset('storage/' . $post->image_url) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold font-headline">{{ $post->title }}</h5>
                            <p class="card-text text-muted small mb-3">
                                <i class="bi bi-calendar-event"></i> Publicado el {{ $post->created_at->format('d/m/Y') }}
                            </p>
                            <p class="card-text text-muted flex-grow-1">{{ Str::limit($post->excerpt, 120) }}</p>
                            <a href="{{ route('noticia.single', $post->slug) }}" class="btn btn-primary mt-auto align-self-start">Leer más</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <p class="mb-0">No hay noticias ni eventos publicados por el momento. ¡Vuelve pronto!</p>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Paginación --}}
        <div class="mt-5 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>

@endsection