

<nav aria-label="breadcrumb" class="my-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('inicio') }}">Inicio</a>
        </li>
        @foreach($links as $label => $url)
            @if($loop->last)
                <li class="breadcrumb-item active" aria-current="page">{{ $label }}</li>
            @else
                <li class="breadcrumb-item">
                    <a href="{{ $url }}">{{ $label }}</a>
                </li>
            @endif
        @endforeach
    </ol>
</nav>

{{-- JSON-LD Schema for Breadcrumbs --}}
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
    }
    @foreach($links as $label => $url)
    ,{
      "@type": "ListItem",
      "position": {{ $loop->index + 2 }},
      "name": "{{ $label }}",
      "item": "{{ $url }}"
    }
    @endforeach
  ]
}
</script>
