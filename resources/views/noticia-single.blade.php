@extends('layouts.app')

@section('title', $post->title . ' - Fundación Prodigio')

@section('content')

    <div class="container py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                {{-- Título y Metadatos --}}
                <h1 class="display-5 fw-bold font-headline text-dark">{{ $post->title }}</h1>
                <p class="text-muted mb-4">
                    <i class="bi bi-calendar-event"></i> Publicado el {{ $post->created_at->format('d/m/Y') }}
                </p>

                {{-- Imagen Destacada --}}
                <img src="{{ asset('storage/' . $post->featured_image) }}" class="img-fluid rounded-3 shadow-lg mb-5" alt="{{ $post->title }}">

                {{-- Contenido del Post --}}
                <div class="post-content">
                    {!! $post->content !!}
                </div>

                {{-- Botón para volver --}}
                <div class="text-center mt-5">
                    <a href="{{ route('noticias') }}" class="btn btn-outline-primary"><i class="bi bi-arrow-left"></i> Volver a Noticias</a>
                </div>
            </div>
        </div>
    </div>

    {{-- CSS para el contenido del post --}}
    @push('styles')
    <style>
        .post-content h2, .post-content h3 {
            font-family: var(--font-headline);
            font-weight: 700;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }
        .post-content p {
            line-height: 1.8;
            margin-bottom: 1rem;
        }
        .post-content ul, .post-content ol {
            padding-left: 2rem;
            margin-bottom: 1rem;
        }
        .post-content img {
            max-width: 100%;
            height: auto;
            border-radius: 0.5rem;
            margin-top: 1rem;
            margin-bottom: 1rem;
        }
    </style>
    @endpush

@endsection