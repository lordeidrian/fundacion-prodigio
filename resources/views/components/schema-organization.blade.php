{{-- Organization Schema --}}
<script type="application/ld+json">
{
  "{!! '@context' !!}": "https://schema.org",
  "{!! '@type' !!}": "Organization",
  "name": "Fundación Prodigio",
  "url": "{{ config('app.url') }}",
  "logo": "{{ asset('file.jpg') }}",
  "description": "Fundación Prodigio trabaja para mejorar la calidad de vida de niños, niñas y adolescentes en situación de vulnerabilidad a través de programas educativos y de desarrollo comunitario.",
  "address": {
    "{!! '@type' !!}": "PostalAddress",
    "addressCountry": "PY",
    "addressLocality": "Paraguay"
  },
  "sameAs": [
    {{-- Add social media URLs here when available --}}
  ]
}
</script>
