<div class="sticky-top" style="top: 2rem;">
    <div class="mb-4">
        <form action="{{ route('noticias.index') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar en el blog..." value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
            </div>
        </form>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-dark text-white"><strong>Recientes</strong></div>
        <div class="list-group list-group-flush">
            @foreach($recentPosts as $recent)
                <a href="{{ route('noticia.single', $recent->slug) }}" class="list-group-item list-group-item-action">{{ $recent->title }}</a>
            @endforeach
        </div>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-dark text-white"><strong>Categorías</strong></div>
        <div class="list-group list-group-flush">
            @foreach($categories as $category)
                <a href="{{ route('noticias.index', ['category' => $category->slug]) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    {{ $category->name }}
                    <span class="badge bg-primary rounded-pill">{{ $category->posts_count }}</span>
                </a>
            @endforeach
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white"><strong>Etiquetas</strong></div>
        <div class="card-body">
            @foreach($tags as $tag)
                <a href="{{ route('noticias.index', ['tag' => $tag->slug]) }}" class="btn btn-sm btn-outline-secondary m-1">{{ $tag->name }}</a>
            @endforeach
        </div>
    </div>
</div>
