@extends('layouts.app')

@section('title', 'Nosotros - Fundación Prodigio')

@section('content')

{{-- SECCIÓN 1: ¿QUIÉNES SOMOS? --}}
<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1588776814546-da620245125b?q=80&w=2070&auto=format&fit=crop" class="img-fluid rounded-3 shadow-lg" alt="Equipo de la fundación trabajando con la comunidad">
            </div>
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold font-headline text-dark">¿Quiénes Somos?</h1>
                <p class="lead text-muted mt-4">
                    Fundación Prodigio fue creada el 29 de marzo de 2023 con el fin de promover el bienestar de personas en condición de vulnerabilidad mediante la prestación de servicios de atención odontológica de calidad y gratuitos.
                </p>
                <p class="text-muted">
                    Buscamos promover el goce efectivo del derecho a la salud bucal, fundamental para el bienestar general y el desarrollo saludable de la infancia.
                </p>
            </div>
        </div>
    </div>
</section>
{{-- NUEVA SECCIÓN: Nuestros Beneficiarios y Alcance --}}
<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold font-headline text-dark">Nuestros Beneficiarios y Alcance</h2>
            <p class="lead text-muted mx-auto" style="max-width: 800px;">Nuestro compromiso se extiende a las personas y comunidades que más nos necesitan.</p>
        </div>
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="p-4 border rounded-3 h-100 shadow-sm card-hover">
                    <i class="bi bi-person-fill-up fs-1 text-primary mb-3"></i>
                    <h5 class="fw-bold">Beneficiarios Directos</h5>
                    <p class="text-muted small">Mujeres embarazadas, niñas y niños de 0 a 3 años de edad, y comunidades educativas. [cite_start]Nos enfocamos en familias en condiciones de vulnerabilidad socioeconómica, especialmente aquellas dentro de programas de ayuda social. [cite: 2739, 2740]</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded-3 h-100 shadow-sm card-hover">
                    <i class="bi bi-people-fill fs-1 text-primary mb-3"></i>
                    <h5 class="fw-bold">Beneficiarios Indirectos</h5>
                    [cite_start]<p class="text-muted small">Las familias de nuestros beneficiarios directos, su entorno inmediato y la sociedad en general, promoviendo un impacto positivo en la salud materno-infantil. [cite: 2740]</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded-3 h-100 shadow-sm card-hover">
                    <i class="bi bi-geo-alt-fill fs-1 text-primary mb-3"></i>
                    <h5 class="fw-bold">Focalización Geográfica</h5>
                    [cite_start]<p class="text-muted small">Inicialmente concentrados en Luque y zonas aledañas del Departamento Central de Paraguay, con planes de expansión a otras ciudades a futuro. [cite: 2742, 2743]</p>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- SECCIÓN 2: MISIÓN, VISIÓN Y VALORES --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold font-headline text-dark">Nuestra Identidad</h2>
            <p class="lead text-muted">Los pilares que guían cada una de nuestras acciones.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm p-4 text-center">
                    <div class="card-body">
                        <i class="bi bi-flag fs-1 text-primary"></i>
                        <h3 class="card-title mt-3">Misión</h3>
                        <p class="card-text">Garantizar que mujeres embarazadas y niños de 0 a 3 años, en situación de vulnerabilidad, accedan a una atención odontológica integral y gratuita.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm p-4 text-center">
                    <div class="card-body">
                        <i class="bi bi-eye fs-1 text-primary"></i>
                        <h3 class="card-title mt-3">Visión</h3>
                        <p class="card-text">Ser una organización de referencia en salud bucodental materna, promoviendo el acceso universal, gratuito y de calidad a la atención odontológica.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5 pt-4">
            <h3 class="fw-bold font-headline text-dark">Nuestros Valores</h3>
        </div>
        <div class="row g-4 mt-4">
            @foreach ($valores as $titulo => $data)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm card-hover-interactive p-3">
                    <div class="card-body text-center">
                        <div class="icon-circle-interactive bg-primary-subtle text-primary mx-auto mb-3">
                            <i class="bi {{ $data['icon'] }} fs-2"></i>
                        </div>
                        <h5 class="card-title fw-bold">{{ $titulo }}</h5>
                        <p class="card-text text-muted small">{{ $data['desc'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
{{-- NUEVA SECCIÓN: Nuestras Líneas Estratégicas --}}
<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold font-headline text-dark">Nuestras Líneas Estratégicas</h2>
            <p class="lead text-muted mx-auto" style="max-width: 800px;">Guiamos nuestras acciones a través de pilares fundamentales para un impacto integral y sostenible.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm card-hover p-4 text-center">
                    <div class="card-body">
                        <i class="bi bi-clipboard-check fs-1 text-primary mb-3"></i>
                        <h5 class="card-title fw-bold">Atención Integral</h5>
                        [cite_start]<p class="card-text text-muted small">Fortalecer la atención primaria de salud con tratamientos educativos, preventivos y curativos. [cite: 2756]</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm card-hover p-4 text-center">
                    <div class="card-body">
                        <i class="bi bi-tools fs-1 text-primary mb-3"></i>
                        <h5 class="card-title fw-bold">Rehabilitación</h5>
                        [cite_start]<p class="card-text text-muted small">Rehabilitar las necesidades odontológicas de mujeres embarazadas en todas las especialidades de la odontología. [cite: 2758]</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm card-hover p-4 text-center">
                    <div class="card-body">
                        <i class="bi bi-x-circle-fill fs-1 text-primary mb-3"></i>
                        <h5 class="card-title fw-bold">Disminución de Riesgos</h5>
                        [cite_start]<p class="card-text text-muted small">Disminuir riesgos de partos prematuros y abortos causados por infecciones bucales. [cite: 2760]</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm card-hover p-4 text-center">
                    <div class="card-body">
                        <i class="bi bi-person-plus-fill fs-1 text-primary mb-3"></i>
                        <h5 class="card-title fw-bold">Autoestima</h5>
                        [cite_start]<p class="card-text text-muted small">Promover la autoestima de las mujeres embarazadas portadoras de problemas odontológicos. [cite: 2762]</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- SECCIÓN 3: NUESTRO EQUIPO (CON TARJETAS MÁS PEQUEÑAS) --}}
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold font-headline text-dark">Nuestro Equipo</h2>
            <p class="lead text-muted">Los referentes que impulsan nuestra misión.</p>
        </div>
        <div class="row justify-content-center g-4">
            @foreach ($equipo as $miembro)
            <div class="col-md-6 col-lg-4">
                <div class="card team-card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4 d-flex flex-column align-items-center">
                        <div class="team-card-img-container mb-4">
                            <img src="{{ str_starts_with($miembro['imagen'], 'http') ? $miembro['imagen'] : asset($miembro['imagen']) }}" class="team-member-photo" alt="Retrato de {{ $miembro['nombre'] }}">
                            <div class="team-card-overlay">
                                <a href="#" class="btn btn-outline-light rounded-circle mx-1"><i class="bi bi-twitter-x"></i></a>
                                <a href="#" class="btn btn-outline-light rounded-circle mx-1"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <h4 class="card-title fw-bold">{{ $miembro['nombre'] }}</h4>
                        <p class="card-subtitle mb-2 text-primary fw-semibold">{{ $miembro['puesto'] }}</p>
                        <p class="card-text text-muted small mt-auto">{{ $miembro['descripcion'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection