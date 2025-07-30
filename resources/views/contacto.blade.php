@extends('layouts.app')

@section('title', 'Contacto - Fundación Prodigio')

@section('content')

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
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre Completo</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Asunto</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Mensaje</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Enviar Mensaje</button>
                    </form>
                </div>

                {{-- Columna de Información de Contacto --}}
                <div class="col-lg-5">
                    <div class="p-4 bg-light rounded-3 h-100">
                        <h3 class="fw-bold font-headline text-dark mb-4">Información de Contacto</h3>
                        <p class="text-muted">También puedes encontrarnos o contactarnos directamente a través de estos canales.</p>
                        
                        <ul class="list-unstyled">
                            <li class="d-flex align-items-start mb-4">
                                <i class="bi bi-geo-alt-fill fs-4 text-primary me-3"></i>
                                <div>
                                    <h6 class="fw-bold mb-0">Nuestra Sede</h6>
                                    {{-- Reemplazar con la dirección real --}}
                                    <p class="text-muted mb-0">Av. Principal 123, Luque, Paraguay</p>
                                </div>
                            </li>
                            <li class="d-flex align-items-start mb-4">
                                <i class="bi bi-envelope-fill fs-4 text-primary me-3"></i>
                                <div>
                                    <h6 class="fw-bold mb-0">Correo Electrónico</h6>
                                    <p class="text-muted mb-0">info@fundacionprodigio.org</p>
                                </div>
                            </li>
                            <li class="d-flex align-items-start">
                                <i class="bi bi-telephone-fill fs-4 text-primary me-3"></i>
                                <div>
                                    <h6 class="fw-bold mb-0">Teléfono</h6>
                                    <p class="text-muted mb-0">(+595) 981 123 456</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECCIÓN DE MAPA --}}
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold font-headline text-dark">Encuéntranos</h2>
                <p class="lead text-muted">Visita nuestro Centro Odontológico Integral en Luque.</p>
            </div>
            {{-- Reemplaza el 'src' con el código de inserción de Google Maps de tu ubicación real --}}
            <div class="map-responsive shadow-lg rounded">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3609.301323953457!2d-57.525543685495!3d-25.226871983882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x945da1a58a9bff5d%3A0x2f20a2f7a8f33173!2sLuque%2C%20Paraguay!5e0!3m2!1sen!2s!4v1627600123456!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

    {{-- SECCIÓN "CÓMO AYUDAR" --}}
    <section class="py-5 bg-white">
        <div class="container my-5">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold font-headline text-dark">Hay muchas formas de Colaborar</h2>
                <p class="lead text-muted mx-auto" style="max-width: 800px;">Tu apoyo es el motor de nuestro trabajo. Elige la forma de sumarte que mejor se adapte a ti.</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm text-center p-4">
                        <div class="card-body d-flex flex-column">
                            <i class="bi bi-building fs-1 text-accent"></i>
                            <h4 class="card-title fw-bold mt-3">Alianzas Corporativas</h4>
                            <p class="card-text text-muted">Conviértete en un socio estratégico y demuestra el compromiso social de tu empresa.</p>
                            <button class="btn btn-outline-primary mt-auto" onclick="setAsunto('Consulta sobre Alianzas Corporativas')">Quiero ser Socio</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm text-center p-4">
                        <div class="card-body d-flex flex-column">
                            <i class="bi bi-gift-fill fs-1 text-accent"></i>
                            <h4 class="card-title fw-bold mt-3">Realiza una Donación</h4>
                            <p class="card-text text-muted">Tu aporte económico nos permite adquirir insumos y financiar los tratamientos para nuestros beneficiarios.</p>
                            <button class="btn btn-accent text-white mt-auto" onclick="setAsunto('Información para realizar una Donación')">Donar Ahora</button>
                        </div>
                    </div>
                </div>
                 <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm text-center p-4">
                        <div class="card-body d-flex flex-column">
                            <i class="bi bi-person-workspace fs-1 text-accent"></i>
                            <h4 class="card-title fw-bold mt-3">Sé Voluntario</h4>
                            <p class="card-text text-muted">Ofrece tu tiempo y talento. Buscamos profesionales de la salud y personas que apoyen en gestión.</p>
                            <button class="btn btn-outline-primary mt-auto" onclick="setAsunto('Interés en ser Voluntario')">Quiero ser Voluntario</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SCRIPT PARA MEJORAR LA EXPERIENCIA DE USUARIO --}}
    @push('scripts')
    <script>
        function setAsunto(asunto) {
            // Selecciona el campo de asunto del formulario
            const subjectInput = document.getElementById('subject');
            // Le asigna el valor del botón presionado
            subjectInput.value = asunto;
            // Opcional: Hace scroll suave hasta el formulario
            subjectInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
            subjectInput.focus();
        }
    </script>
    @endpush

@endsection