<header id="main-header" class="fixed-top">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('inicio') }}">
                <svg width="36" height="36" viewBox="0 0 100 100" fill="none" class="me-2" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                    <linearGradient id="gold-classic" x1="0" y1="0" x2="100" y2="100" gradientUnits="userSpaceOnUse">
                        <stop offset="0%" stop-color="#FFD700"/>
                        <stop offset="60%" stop-color="#FFDE70"/>
                        <stop offset="100%" stop-color="#B6862C"/>
                    </linearGradient>
                    </defs>
                    <!-- Trazo grueso y simple de una P -->
                    <path d="
                    M25,85 
                    L25,15 
                    L60,15 
                    Q80,15 80,40 
                    Q80,65 60,65 
                    L40,65 
                    L40,85 
                    Z
                    M40,30 
                    L60,30 
                    Q70,30 70,40 
                    Q70,50 60,50 
                    L40,50 
                    Z"
                    fill="url(#gold-classic)" fill-rule="evenodd" clip-rule="evenodd"/>
                </svg>
                <span class="fw-bold fs-5 text-primary">Fundación Prodigio</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="desktopMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link fw-heavy" href="{{ route('inicio') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link fw-heavy" href="{{ route('nosotros') }}">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link fw-heavy" href="{{ route('proyectos') }}">Nuestro Trabajo</a></li>
                    <li class="nav-item"><a class="nav-link fw-heavy" href="{{ route('noticias') }}">Noticias y Eventos</a></li>
                    <li class="nav-item"><a class="nav-link fw-heavy" href="{{ route('contacto') }}">Contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="mobileMenuLabel">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('inicio') }}">
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
            <li class="nav-item"><a class="nav-link fs-5 py-2" href="{{ route('noticias') }}">Noticias y Eventos</a></li>
        </ul>
        <a href="{{ route('contacto') }}" class="btn btn-accent text-white btn-lg mt-auto">Contacto</a>
    </div>
</div>

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
            <li class="nav-item"><a class="nav-link fs-5 py-2" href="{{ route('noticias') }}">Noticias y Eventos</a></li>
            
        </ul>
        <a href="{{ route('contacto') }}" class="btn btn-accent text-white btn-lg mt-auto">Contacto</a>
    </div>
</div>