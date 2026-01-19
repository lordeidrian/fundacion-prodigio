<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- SEO Meta Tags --}}
    <title>@yield('meta_title', App\Helpers\SeoHelper::title(null))</title>
    <meta name="description" content="@yield('meta_description', App\Helpers\SeoHelper::description())">
    <link rel="canonical" href="{{ url()->current() }}">
    
    {{-- Open Graph Meta Tags --}}
    <meta property="og:title" content="@yield('meta_title', App\Helpers\SeoHelper::title(null))">
    <meta property="og:description" content="@yield('meta_description', App\Helpers\SeoHelper::description())">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:image" content="@yield('og_image', asset('file.jpg'))">
    <meta property="og:site_name" content="Fundación Prodigio">
    <meta property="og:locale" content="es_PY">
    
    {{-- Twitter Card Meta Tags --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('meta_title', App\Helpers\SeoHelper::title(null))">
    <meta name="twitter:description" content="@yield('meta_description', App\Helpers\SeoHelper::description())">
    <meta name="twitter:image" content="@yield('og_image', asset('file.jpg'))">
    
    {{-- Language & Locale --}}
    <meta http-equiv="content-language" content="es">
    
    {{-- Google Search Console Verification (when ready) --}}
    @if(env('GOOGLE_SEARCH_CONSOLE_VERIFICATION'))
        <meta name="google-site-verification" content="{{ env('GOOGLE_SEARCH_CONSOLE_VERIFICATION') }}">
    @endif
    
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@700;800&family=Source+Sans+3:wght@400;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- Schema.org JSON-LD --}}
    @include('components.schema-organization')
    @include('components.schema-website')
    
    @stack('head')
</head>
@php
    use App\Models\PageSection;

    $contact = cache()->remember('contacto_info', 300, function () {
        return PageSection::where('page_name', 'contacto')
            ->where('section_key', 'informacion_contacto')
            ->first();
    });

    $phoneRaw = $contact->content['phone'] ?? null;
    $phone    = $phoneRaw ? preg_replace('/\D+/', '', $phoneRaw) : null; // solo dígitos
    $text     = 'Hola, quiero más información 🙂';

    $whatsappUrl = $phone
        ? 'https://api.whatsapp.com/send/?phone='.$phone
          .'&text='.urlencode($text)
          .'&type=phone_number&app_absent=0'
        : null;
@endphp
<body class="bg-light">
<!-- Mini Chat de WhatsApp (inicialmente oculto por CSS) -->
<div class="whatsapp-minichat">
        <div class="minichat-header-whatsapp">
            <div class="d-flex align-items-center">
                <!-- Logo de la Fundación Prodigio (puedes usar un SVG o una imagen pequeña) -->
                <img src="{{ asset('file.jpg') }}" alt="Logo Fundación Prodigio" class="minichat-logo me-2">
                <div>
                    <span class="minichat-company-name">Fundación Prodigio</span>
                    <small class="minichat-response-time d-block">Normalmente responde en unos minutos</small>
                </div>
            </div>
            <button type="button" class="minichat-close-btn">&times;</button>
        </div>
        <div class="minichat-body-whatsapp">
            <div class="minichat-message-bubble">
                <p>¡Hola! 👋 ¿Listo para sonreír? Haz clic aquí para chatear con un asesor.</p>
            </div>
            <a href="{{ $whatsappUrl }}" target="_blank" class="btn btn-sm btn-whatsapp-chat w-100 mt-3" rel="noopener">
                <i class="bi bi-whatsapp me-2"></i>Chatear por WhatsApp
            </a>
        </div>
    </div>

    <!-- Contenedor para los botones fijos (WhatsApp y Volver Arriba) -->
    <div class="fixed-action-buttons">
        <!-- Botón "Volver Arriba" (inicialmente oculto por CSS) -->
        <button id="scrollToTopBtn" class="btn btn-primary rounded-circle shadow-lg button-fixed-size">
            <i class="bi bi-chevron-up fs-4"></i>
        </button>

        <!-- Botón de WhatsApp -->
        <button id="whatsapp-btn" class="btn btn-success rounded-circle shadow-lg button-fixed-size">
            <i class="bi bi-whatsapp fs-4"></i>
        </button>
    </div>

    @include('pages.partials.header')

    <main class="main-content">
        @yield('content')
    </main>

    @include('pages.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
