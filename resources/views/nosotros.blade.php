@extends('layouts.app')

@section('title', 'Sobre Nosotros - Fundación Prodigio')

@section('content')

    {{-- HERO SECTION PARA PÁGINAS INTERNAS --}}
    {{-- Un encabezado estándar para dar contexto a la página --}}
    <div class="page-header-overlay" 
        style="background-image: linear-gradient(45deg, rgba(29, 69, 107, 0.8), rgba(0, 100, 210, 0.7)), url('{{ asset('images/banner-2.png') }}'); 
                background-position: center 20%; 
                background-size: cover; 
                background-repeat: no-repeat;">
        
        <div class="container py-5">
            <div class="row">
                <div class="col-12 text-center text-white">
                    <h1 class="display-4 fw-bold">Nuestra Esencia</h1>
                    <p class="lead">Conoce la historia, los principios y el equipo que impulsan nuestra misión.</p>
                </div>
            </div>
        </div>
    </div>
    {{-- NUESTRA HISTORIA Y MISIÓN --}}
    <section class="py-5 bg-white">
        <div class="container my-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold font-headline text-dark">Quiénes Somos</h2>
                    <p class="lead text-muted">
                        Fundación Prodigio fue creada el 29 de marzo de 2023 con el fin de promover el bienestar de personas en condición de vulnerabilidad. 
                    </p>
                    <p>
                        Nuestro propósito es prestar servicios de atención odontológica de calidad y gratuitos.  Buscamos promover el goce efectivo del derecho a la salud bucal, que es fundamental para el bienestar general y el desarrollo saludable de la infancia. 
                    </p>
                    <h3 class="fw-bold fs-4 mt-4">Nuestra Misión</h3>
                    <p>
                        Garantizar que mujeres embarazadas y niños y niñas de 0 a 3 años, en situación de vulnerabilidad socioeconómica en Paraguay, accedan a una atención odontológica integral y gratuita.
                    </p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/banner-1.png') }}" class="img-fluid rounded-3 shadow-lg" alt="Voluntarios de la Fundación Prodigio en un evento comunitario">
                </div>
            </div>
        </div>
    </section>

    {{-- VISIÓN Y LÍNEAS ESTRATÉGICAS --}}
    <section class="py-5 bg-light">
        <div class="container my-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 order-lg-2">
                    <h2 class="display-5 fw-bold font-headline text-dark">Nuestra Visión de Futuro</h2>
                    <p class="lead text-muted">
                        Aspiramos a ser una organización de referencia en el ámbito de la salud bucodental materna en Paraguay. 
                    </p>
                    <p>
                        Promovemos el acceso universal, gratuito y de calidad a la atención odontológica para mujeres embarazadas en situación de vulnerabilidad, con un impacto positivo y duradero en la salud materno-infantil.  Queremos un mundo donde ninguna mujer tenga que elegir entre su salud y sus necesidades básicas. 
                    </p>
                </div>
                <div class="col-lg-6 order-lg-1">
                    {{-- Usando tu estructura de tarjetas para las líneas estratégicas --}}
                    <div class="row g-3">
                        <h4 class="fw-bold mb-3">Nuestras Líneas Estratégicas</h4>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm p-2">
                                <div class="card-body">
                                    <h6 class="fw-bold text-primary">Atención Integral</h6>
                                    <p class="small text-muted mb-0">Fortalecemos la atención primaria con un enfoque educativo, preventivo y curativo. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm p-2">
                                <div class="card-body">
                                    <h6 class="fw-bold text-primary">Rehabilitación</h6>
                                    <p class="small text-muted mb-0">Rehabilitamos las necesidades odontológicas de las mujeres embarazadas en todas las especialidades. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm p-2">
                                <div class="card-body">
                                    <h6 class="fw-bold text-primary">Disminución de Riesgos</h6>
                                    <p class="small text-muted mb-0">Reducimos los riesgos de partos prematuros y abortos causados por infecciones bucales. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm p-2">
                                <div class="card-body">
                                    <h6 class="fw-bold text-primary">Autoestima</h6>
                                    <p class="small text-muted mb-0">Promovemos la autoestima de las mujeres, ayudándolas a superar problemas odontológicos. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- NUESTROS VALORES --}}
    <section class="py-5 bg-white">
        <div class="container my-5">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold font-headline text-dark">Nuestros Valores</h2>
                <p class="lead text-muted mx-auto" style="max-width: 800px;">Estos son los principios que nos definen y guían cada una de nuestras decisiones y acciones.</p>
            </div>
            <div class="row g-4">
                {{-- Aquí se listan los valores con sus iconos --}}
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-light p-3">
                        <div class="card-body">
                            <div class="mb-3"><i class="bi bi-bullseye fs-2 text-accent"></i></div>
                            <h5 class="fw-bold">Equidad</h5>
                            <p class="text-muted small">Trabajamos para reducir las desigualdades en el acceso a la salud, brindando atención gratuita a quienes más lo necesitan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-light p-3">
                        <div class="card-body">
                            <div class="mb-3"><i class="bi bi-shield-shaded fs-2 text-accent"></i></div>
                            <h5 class="fw-bold">Promoción del Derecho a la Salud</h5>
                            <p class="text-muted small">Impulsamos la salud bucal como parte integral del derecho humano a la salud.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-light p-3">
                        <div class="card-body">
                            <div class="mb-3"><i class="bi bi-person-heart fs-2 text-accent"></i></div>
                            <h5 class="fw-bold">Dignidad</h5>
                            <p class="text-muted small">Ofrecemos un trato respetuoso, humano y empático, reconociendo el valor de cada persona.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-light p-3">
                        <div class="card-body">
                            <div class="mb-3"><i class="bi bi-gem fs-2 text-accent"></i></div>
                            <h5 class="fw-bold">Calidad</h5>
                            <p class="text-muted small">Brindamos una atención con altos estándares profesionales, priorizando la seguridad y las buenas prácticas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-light p-3">
                        <div class="card-body">
                            <div class="mb-3"><i class="bi bi-people fs-2 text-accent"></i></div>
                            <h5 class="fw-bold">Compromiso Social</h5>
                            <p class="text-muted small">Nos involucramos activamente en la transformación de la realidad de las comunidades vulnerables.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    {{-- Bloque Corregido con icono --}}
                    <div class="card h-100 border-light p-3">
                        <div class="card-body">
                            <div class="mb-3"><i class="bi bi-patch-check-fill fs-2 text-accent"></i></div>
                            <h5 class="fw-bold">Solidaridad y Responsabilidad</h5>
                            <p class="text-muted small">Creemos en la cooperación y el apoyo mutuo, actuando con ética y transparencia para un impacto sostenible.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- NUESTRO EQUIPO / REFERENTES --}}
    <section class="py-5 bg-light">
        <div class="container my-5">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold font-headline text-dark">Nuestro Equipo Directivo</h2>
                <p class="lead text-muted mx-auto" style="max-width: 800px;">Conoce a los referentes que lideran y guían la visión de la Fundación Prodigio.</p>
            </div>
            <div class="row justify-content-center g-4">
                {{-- Tarjeta de Ignacio Ortellado --}}
                <div class="col-lg-5">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('images/ignacio-ortellado.png') }}" class="img-fluid rounded-start h-100" alt="Ing. Ignacio Ortellado, Presidente" style="object-fit: cover;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Ing. Ignacio Ortellado</h5>
                                    <p class="card-subtitle mb-2 text-primary fw-semibold">Presidente</p>
                                    <p class="card-text small text-muted">Empresario e Ingeniero Civil, fundador de la constructora TOCSA S.A. Cree y practica la Responsabilidad Social Empresarial como una obligación ética y moral. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Tarjeta de Marcos Margraf --}}
                <div class="col-lg-5">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('images/marcos-margraf.png') }}" class="img-fluid rounded-start h-100" alt="Dr. Marcos Margraf, Director Clínico" style="object-fit: cover;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Dr. Marcos Margraf</h5>
                                    <p class="card-subtitle mb-2 text-primary fw-semibold">Director Clínico</p>
                                    <p class="card-text small text-muted">Odontólogo Especializado con Doctorado en Odontología Restauradora Estética. Propietario de 4 patentes y Director de Margraf Oral Health Group. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CALL TO ACTION (CTA) --}}
    {{-- Reutilizo la sección de la página de inicio para consistencia --}}
    <section id="ayudar" class="py-5 bg-white">
        <div class="container my-5">
            <div class="text-center">
                <h2 class="display-5 fw-bold font-headline text-dark">¿Quieres formar parte del cambio?</h2>
                <p class="lead text-muted mx-auto" style="max-width: 800px;">Tu apoyo nos permite llegar a más personas. Contacta con nosotros para explorar formas de colaborar.</p>
                <a href="{{ route('contacto') }}" class="btn btn-primary btn-lg mt-3">Conviértete en Socio</a>
            </div>
        </div>
    </section>

@endsection