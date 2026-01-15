@extends('layouts.app')

@section('title', $post->title . ' - Fundación Prodigio')
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($post->content), 150))
@section('og_title', $post->title)
@section('og_description', \Illuminate\Support\Str::limit(strip_tags($post->content), 150))
@section('og_image', asset('storage/' . $post->featured_image))

@section('content')
    <div class="container py-5 mt-5">
        {{-- Breadcrumbs --}}
        @include('pages.partials.breadcrumbs', ['links' => ['Noticias' => route('noticias.index'), $post->title => '']])
        <div class="row justify-content-center g-5">
            <div class="col-lg-8">
                @if($post->category)
                    <a href="{{ route('noticias.index', ['category' => $post->category->slug]) }}" class="text-primary fw-bold text-decoration-none mb-2 d-block">{{ $post->category->name }}</a>
                @endif
                <h1 class="display-5 fw-bold font-headline text-dark">{{ $post->title }}</h1>
                <p class="text-muted mb-4">
                    <i class="bi bi-calendar-event"></i> Publicado el {{ $post->created_at->format('d/m/Y') }}
                    @if($post->author)
                        <span class="mx-2">|</span>
                        <i class="bi bi-person-fill"></i> Por {{ $post->author->name }}
                    @endif
                </p>
                <img src="{{ asset('storage/' . $post->featured_image) }}" class="img-fluid rounded-3 shadow-lg mb-5" alt="{{ $post->title }}">
                <div class="post-content">{!! $post->content !!}</div>
                @if($post->tags->isNotEmpty())
                    <div class="mt-5">
                        <strong>Etiquetas:</strong>
                        @foreach($post->tags as $tag)
                            <a href="{{ route('noticias.index', ['tag' => $tag->slug]) }}" class="badge bg-secondary-subtle text-secondary-emphasis text-decoration-none">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                @endif
                <div class="text-center mt-5"><a href="{{ route('noticias.index') }}" class="btn btn-outline-primary"><i class="bi bi-arrow-left"></i> Volver al Blog</a></div>
            </div>

            <div class="col-lg-4">
                @include('pages.partials.blog-sidebar')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "headline": "{{ $post->title }}",
  "image": "{{ asset('storage/' . $post->featured_image) }}",
  "datePublished": "{{ $post->created_at->toIso8601String() }}",
  "dateModified": "{{ $post->updated_at->toIso8601String() }}",
  "author": {
    "@type": "Person",
    "name": "{{ $post->author->name ?? 'Fundación Prodigio' }}"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Fundación Prodigio",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ asset('file.jpg') }}"
    }
  },
  "description": "{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 150) }}"
}
</script>
@endsection
