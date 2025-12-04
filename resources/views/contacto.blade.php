@extends('layouts.app')

@section('title', 'Contacto - Fundación Prodigio')

@section('meta_description', 'Contacta con Fundación Prodigio. Información sobre COI (Centro Odontológico Integral), programa Cero Caries y cómo colaborar con nuestros proyectos de salud en Paraguay.')

@section('meta_keywords', 'contacto fundacion prodigio, COI contacto, centro odontológico integral contacto, cero caries información, donar fundación Paraguay')


@section('content')

    {{-- Definimos la variable de forma segura al principio --}}
    @php
        // Obtenemos el contenido de la sección 'informacion_contacto', o un array vacío si no existe
        $contactInfo = $pageSections['informacion_contacto']->content ?? [];
    @endphp

    {{-- HERO SECTION PARA PÁGINAS INTERNAS --}}
    <div class="page-header-overlay"
         style="background-image: linear-gradient(45deg, rgba(29, 69, 107, 0.8), rgba(0, 100, 210, 0.7)), url('{{ asset('images/banner-contacto.jpg') }}');
                background-position: center center;
                background-size: cover;
                background-repeat: no-repeat;">

        <div class="container py-5">
            <div class="row">
                <div class="col-12 text-center text-white">
                    <h1 class="display-4 fw-bold">Hablemos</h1>
                    <p class="lead">Estamos aquí para responder tus preguntas y explorar formas de colaborar.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- SECCIÓN PRINCIPAL DE CONTACTO (FORMULARIO Y DATOS) --}}
    <section class="py-5 bg-white">
        <div class="container my-5">
            <div class="row g-5">
                {{-- Columna del Formulario --}}
                <div class="col-lg-7">
                    <h2 class="fw-bold font-headline text-dark mb-4">Envíanos un Mensaje</h2>

                    {{-- Alerta de éxito después de enviar el formulario --}}
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- El formulario ahora apunta a la ruta correcta --}}
                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre Completo</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Asunto</label>
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}" required>
                             @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Mensaje</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                             @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Enviar Mensaje</button>
                    </form>
                </div>

                {{-- Columna de Información de Contacto (AHORA DINÁMICA) --}}
                <div class="col-lg-5">
                    <div class="p-4 bg-light rounded-3 h-100">
                        <h3 class="fw-bold font-headline text-dark mb-4">Información de Contacto</h3>
                        <p class="text-muted">También puedes encontrarnos o contactarnos directamente a través de estos canales.</p>

                        <ul class="list-unstyled">
                            <li class="d-flex align-items-start mb-4">
                                <i class="bi bi-geo-alt-fill fs-4 text-primary me-3"></i>
                                <div>
                                    <h6 class="fw-bold mb-0">Nuestra Sede</h6>
                                    {{-- Valor dinámico de la dirección --}}
                                    <p class="text-muted mb-0">{{ $contactInfo['address'] ?? 'Dirección no disponible' }}</p>
                                </div>
                            </li>
                            <li class="d-flex align-items-start mb-4">
                                <i class="bi bi-envelope-fill fs-4 text-primary me-3"></i>
                                <div>
                                    <h6 class="fw-bold mb-0">Correo Electrónico</h6>
                                    {{-- Valor dinámico del email con enlace --}}
                                    <a href="mailto:{{ $contactInfo['email'] ?? '#' }}" class="text-muted text-decoration-none">{{ $contactInfo['email'] ?? 'Email no disponible' }}</a>
                                </div>
                            </li>
                            <li class="d-flex align-items-start">
                                <i class="bi bi-telephone-fill fs-4 text-primary me-3"></i>
                                <div>
                                    <h6 class="fw-bold mb-0">Teléfono</h6>
                                    {{-- Valor dinámico del teléfono con enlace --}}
                                    <a href="tel:{{ $contactInfo['phone'] ?? '#' }}" class="text-muted text-decoration-none">{{ $contactInfo['phone'] ?? 'Teléfono no disponible' }}</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECCIÓN DE MAPA (AHORA DINÁMICA) --}}
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold font-headline text-dark">Encuéntranos</h2>
                <p class="lead text-muted">Visita nuestro Centro Odontológico Integral.</p>
            </div>
            <div class="map-responsive shadow-lg rounded">
                {{-- Usamos las coordenadas dinámicas con un valor por defecto --}}
                <iframe src="https://maps.google.com/maps?q={{ $contactInfo['map_coordinates'] ?? '-25.296,-57.573' }}&hl=es&z=14&amp;output=embed" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

    {{-- SECCIÓN "CÓMO AYUDAR" (Ya era dinámica, no requiere cambios) --}}
    @include('pages.partials.contribution')


    {{-- SCRIPT PARA MEJORAR LA EXPERIENCIA DE USUARIO --}}
    @push('scripts')
    <script>
        function setAsunto(asunto) {
            const subjectInput = document.getElementById('subject');
            subjectInput.value = asunto;
            subjectInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
            subjectInput.focus();
        }
    </script>
    @endpush

@endsection
