@extends('layouts.app')

@section('title', 'Noticias - Fundación Prodigio')

@section('meta_description', 'Últimas noticias y eventos de Fundación Prodigio. Mantente informado sobre nuestras actividades, COI (Centro Odontológico Integral) y el programa Cero Caries en Paraguay.')

@section('meta_keywords', 'noticias fundacion prodigio, eventos salud Paraguay, COI noticias, cero caries actualidad, fundación salud eventos')


@section('content')
    <div class="page-header-overlay" style="background-image: linear-gradient(45deg, rgba(29, 69, 107, 0.8), rgba(0, 100, 210, 0.7)), url('{{ asset('images/banner-noticias.jpg') }}');">
        <div class="container py-5 text-center text-white">
            <h1 class="display-4 fw-bold">Nuestro Blog</h1>
            <p class="lead">Mantente al día con nuestras últimas actividades, logros y comunicados.</p>
        </div>
    </div>

    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-8">
                <div class="row g-4">
                    @forelse ($posts as $post)
                        <div class="col-md-6">
                            <div class="card h-100 shadow-sm border-0 card-hover-interactive">
                                <a href="{{ route('noticias.single', $post->slug) }}">
                                    <img src="{{ asset('storage/' . $post->featured_image) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                                </a>
                                <div class="card-body d-flex flex-column">
                                    @if($post->category)
                                        <a href="{{ route('noticias.index', ['category' => $post->category->slug]) }}" class="text-primary fw-bold text-decoration-none small mb-2">{{ $post->category->name }}</a>
                                    @endif
                                    <h5 class="card-title fw-bold font-headline">{{ $post->title }}</h5>
                                    <p class="card-text text-muted small mb-3"><i class="bi bi-calendar-event"></i> {{ $post->created_at->format('d/m/Y') }}</p>
                                    <p class="card-text text-muted flex-grow-1">{{ $post->excerpt }}</p>
                                    <a href="{{ route('noticias.single', $post->slug) }}" class="btn btn-primary mt-auto align-self-start">Leer más</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center">
                                <p class="mb-0">No se encontraron publicaciones que coincidan con tu búsqueda.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="mt-5 d-flex justify-content-center">{{ $posts->links() }}</div>
            </div>

            <div class="col-lg-4">
                @include('pages.partials.blog-sidebar')
            </div>
        </div>
    </div>
@endsection
