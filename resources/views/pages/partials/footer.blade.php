<footer class="footer-bg-default border-top">
    <div class="container pt-5 pb-2">
        <div class="row gy-4">

            {{-- Columna 1: Logo y Descripción (col-lg-4) --}}
            <div class="col-lg-4">
                <a class="navbar-brand d-flex align-items-center mb-2" href="{{ route('inicio') }}">
                    <span class="fw-bold fs-5 logo-footer">Fundación Prodigio</span>
                </a>
                <p class="text-muted small">
                    Transformando vidas a través de sonrisas saludables.
                </p>
            </div>

            {{-- Columna 2: Contenedor principal para el resto del contenido (col-lg-8) --}}
            <div class="col-lg-8">
                <div class="row">
                    {{-- Sub-columna 2.1: Enlaces Rápidos --}}
                    <div class="col-md-4 col-6">
                        <h5 class="fw-semibold mb-3">Navegación</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="{{ route('nosotros') }}" class="text-muted text-decoration-none">Nosotros</a></li>
                            <li class="mb-2"><a href="{{ route('proyectos.index') }}" class="text-muted text-decoration-none">Nuestro Trabajo</a></li>
                            <li class="mb-2"><a href="{{ route('noticias.index') }}" class="text-muted text-decoration-none">Blog</a></li>
                            <li class="mb-2"><a href="{{ route('contacto') }}" class="text-muted text-decoration-none">Contacto</a></li>
                        </ul>
                    </div>

                    {{-- Sub-columna 2.2: Información de Contacto (Dinámica) --}}
                    <div class="col-md-4 col-6">
                        <h5 class="fw-semibold mb-3">Contacto</h5>
                        @php
                            $contactInfo = App\Models\PageSection::where('section_key', 'informacion_contacto')->first()?->content ?? [];
                        @endphp
                        <ul class="list-unstyled text-muted small">
                            <li class="mb-2 d-flex">
                                <i class="bi bi-geo-alt-fill me-2 mt-1"></i>
                                <span>{{ $contactInfo['address'] ?? 'Dirección no disponible' }}</span>
                            </li>
                            <li class="mb-2 d-flex">
                                <i class="bi bi-envelope-fill me-2 mt-1"></i>
                                <a href="mailto:{{ $contactInfo['email'] ?? '#' }}" class="text-muted text-decoration-none">{{ $contactInfo['email'] ?? 'Email no disponible' }}</a>
                            </li>
                            <li class="mb-2 d-flex">
                                <i class="bi bi-telephone-fill me-2 mt-1"></i>
                                <a href="tel:{{ $contactInfo['phone'] ?? '#' }}" class="text-muted text-decoration-none">{{ $contactInfo['phone'] ?? 'Teléfono no disponible' }}</a>
                            </li>
                        </ul>
                    </div>

                    {{-- Sub-columna 2.3: Redes Sociales --}}
                    <div class="col-md-4">
                        <h5 class="fw-semibold mb-3">Síguenos</h5>
                        <div>
                            <a href="https://www.youtube.com/@FundacionProdigio" target="_blank" class="btn btn-light me-2 fs-5" aria-label="Nuestro canal de YouTube">
                                <i class="bi bi-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 pt-3 border-top">
            <p class="text-center text-muted small">
                © {{ date('Y') }} Fundación Prodigio. Todos los derechos reservados.<br> Desarrollado por Soluciones Inteligentes.
            </p>
        </div>
    </div>
</footer>
