{{--
    Breadcrumbs Component
    
    Usage:
    @include('components.breadcrumbs', ['items' => [
        ['label' => 'Inicio', 'url' => route('inicio')],
        ['label' => 'Blog', 'url' => route('noticias.index')],
        ['label' => 'Post Title'] // Last item without URL (current page)
    ]])
--}}

@if(isset($items) && count($items) > 0)
<nav aria-label="breadcrumb" class="my-3">
    <ol class="breadcrumb">
        @foreach($items as $index => $item)
            @if($loop->last)
                <li class="breadcrumb-item active" aria-current="page">{{ $item['label'] }}</li>
            @else
                <li class="breadcrumb-item">
                    <a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                </li>
            @endif
        @endforeach
    </ol>
</nav>

{{-- BreadcrumbList Schema --}}
<script type="application/ld+json">
{
  "{!! '@context' !!}": "https://schema.org",
  "{!! '@type' !!}": "BreadcrumbList",
  "itemListElement": [
    @foreach($items as $index => $item)
    {
      "{!! '@type' !!}": "ListItem",
      "position": {{ $index + 1 }},
      "name": "{{ $item['label'] }}",
      @if(!$loop->last)
      "item": "{{ $item['url'] }}"
      @else
      "item": "{{ url()->current() }}"
      @endif
    }@if(!$loop->last),@endif
    @endforeach
  ]
}
</script>
@endif
