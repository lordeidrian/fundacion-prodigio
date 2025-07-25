<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DentalHope Hub')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">
<!-- Mini Chat de WhatsApp (inicialmente oculto por CSS) -->
<div class="whatsapp-minichat">
        <div class="minichat-header-whatsapp">
            <div class="d-flex align-items-center">
                <!-- Logo de la Fundación Prodigio (puedes usar un SVG o una imagen pequeña) -->
                <img src="{{ asset('images/logo-fundacion-prodigio-small.png') }}" alt="Logo Fundación Prodigio" class="minichat-logo me-2">
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
            <a href="#" id="whatsapp-link" target="_blank" class="btn btn-sm btn-whatsapp-chat w-100 mt-3">
                <i class="bi bi-whatsapp me-2"></i>Chatear por WhatsApp
            </a>
        </div>
    </div>

    <!-- Contenedor para los botones fijos (WhatsApp y Volver Arriba) -->
    <div class="fixed-action-buttons">
        <!-- Botón "Volver Arriba" (inicialmente oculto por CSS) -->
        <button id="scrollToTopBtn" class="btn btn-primary rounded-circle shadow-lg button-fixed-size">
            <i class="bi bi-arrow-up fs-4"></i>
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