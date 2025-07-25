<header id="main-header" class="fixed-top">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="{{ route('inicio') }}">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="text-primary me-2">
                    <path d="M19.999 2.5a.5.5 0 0 0-.5.5v2.84a3.5 3.5 0 0 1-1.15 2.541l-.004.004a3.501 3.501 0 0 1-4.832 0l-.004-.004A3.5 3.5 0 0 1 12.33 5.84V3a.5.5 0 0 0-1 0v2.84a3.5 3.5 0 0 1-1.15 2.541l-.004.004a3.501 3.501 0 0 1-4.832 0l-.004-.004A3.5 3.5 0 0 1 4.16 5.84V3a.5.5 0 0 0-1 0v3.16a3.5 3.5 0 0 1 1.01 2.375V15.5a3 3 0 0 0 3 3h.5v2.5a.5.5 0 0 0 1 0V18.5h4v2.5a.5.5 0 0 0 1 0V18.5h.5a3 3 0 0 0 3-3V8.535a3.5 3.5 0 0 1 1.01-2.375V3a.5.5 0 0 0-.49-.5h.001z" />
                </svg>
                <span class="fw-bold fs-5 text-primary">Fundación Prodigio</span>
            </a>

            <!-- Menú Desktop -->
            <div class="d-none d-lg-flex flex-grow-1">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('inicio') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('nosotros') }}">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('proyectos') }}">Nuestro Trabajo</a></li>                    
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('contacto') }}" class="btn btn-accent text-white shadow-sm">Contacto</a>
                    </li>
                </ul>
            </div>

            <!-- Botón Offcanvas Móvil -->
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
</header>

<!-- Menú Offcanvas (Móvil) -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="mobileMenuLabel">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('inicio') }}">
                <!-- SVG del logo -->
                <span class="fw-bold fs-5 text-primary">Fundación Prodigio</span>
            </a>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column">
        <ul class="navbar-nav flex-grow-1">
            <li class="nav-item"><a class="nav-link fs-5 py-2" href="{{ route('inicio') }}">Inicio</a></li>
            <li class="nav-item"><a class="nav-link fs-5 py-2" href="{{ route('nosotros') }}">Nosotros</a></li>
            <li class="nav-item"><a class="nav-link fs-5 py-2" href="{{ route('proyectos') }}">Nuestro Trabajo</a></li>
            
        </ul>
        <a href="{{ route('contacto') }}" class="btn btn-accent text-white btn-lg mt-auto">Contacto</a>
    </div>
</div>