@extends('layouts.app')

@section('title', '¿Quiénes Somos? - Fundación Prodigio')

@section('content')
{{-- Sección Principal --}}
<div class="container py-5">
    <div class="row align-items-center g-5">
        <div class="col-lg-6">
            <img src="https://images.unsplash.com/photo-1588776814546-da620245125b?q=80&w=2070&auto=format&fit=crop" class="img-fluid rounded-3 shadow-lg" alt="Equipo de la fundación trabajando">
        </div>
        <div class="col-lg-6">
            <h1 class="display-4 fw-bold font-headline text-dark">¿Quiénes Somos?</h1>
            <p class="lead text-muted mt-4">
                Fundación Prodigio fue creada el 29 de marzo de 2023 con el fin de promover el bienestar de personas en condición de vulnerabilidad mediante la prestación de servicios de atención odontológica de calidad y gratuitos.
            </p>
            <p class="text-muted">
                Buscamos promover el goce efectivo del derecho a la salud bucal, fundamental para el bienestar general y el desarrollo saludable de la infancia. Al mejorar la salud bucal desde la concepción y las primeras etapas de la vida, aspiramos a que cada madre, niña y niño pueda vivir una vida plena, saludable y productiva.
            </p>
        </div>
    </div>
</div>

{{-- NUEVA SECCIÓN: Impacto con Contadores Animados --}}
<div class="bg-light py-5">
    <div class="container text-center">
        <h2 class="display-5 fw-bold font-headline text-dark mb-5">Nuestro Impacto en Cifras</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-4">
                    <i class="bi bi-calendar-check fs-1 text-primary"></i>
                    <h3 class="display-4 fw-bold text-dark mt-3 counter" data-target="2023"><noscript>2023</noscript>0</h3>
                    <p class="fs-5 text-muted fw-semibold">Año de Fundación</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4">
                    <i class="bi bi-journal-medical fs-1 text-primary"></i>
                    <h3 class="display-4 fw-bold text-dark mt-3 counter" data-target="9"><noscript>9</noscript>0</h3>
                    <p class="fs-5 text-muted fw-semibold">Consultorios Equipados</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4">
                    <i class="bi bi-heart-pulse fs-1 text-primary"></i>
                    <h3 class="display-4 fw-bold text-dark mt-3 counter" data-target="100"><noscript>100+</noscript>0+</h3>
                    <p class="fs-5 text-muted fw-semibold">Vidas Impactadas</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold font-headline text-dark">Nuestra Identidad</h1>
        <p class="lead text-muted">Los pilares que guían cada una de nuestras acciones.</p>
    </div>

    <div class="row g-4">
        {{-- Misión y Visión (con íconos) --}}
        <div class="col-lg-6">
            <div class="card h-100 border-0 shadow-sm p-4 text-center">
                <div class="card-body">
                    <i class="bi bi-flag fs-1 text-primary"></i>
                    <h2 class="card-title mt-3">Misión</h2>
                    <p class="card-text">Garantizar que mujeres embarazadas y niños y niñas de 0 a 3 años, en situación de vulnerabilidad socioeconómica en Paraguay, accedan a una atención odontológica integral y gratuita.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card h-100 border-0 shadow-sm p-4 text-center">
                <div class="card-body">
                    <i class="bi bi-eye fs-1 text-primary"></i>
                    <h2 class="card-title mt-3">Visión</h2>
                    <p class="card-text">Ser una organización de referencia en el ámbito de la salud bucodental materna, promoviendo el acceso universal, gratuito y de calidad a la atención odontológica para mujeres embarazadas.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5 pt-4">
        <h2 class="display-5 fw-bold font-headline text-dark">Nuestros Valores</h2>
    </div>

    {{-- SECCIÓN MEJORADA: Tarjetas de Valores con Efecto Hover --}}
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
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold font-headline text-dark">Nuestro Equipo</h1>
        <p class="lead text-muted">Los referentes que impulsan nuestra misión.</p>
    </div>

    {{-- SECCIÓN MEJORADA: Tarjetas de Equipo con Overlay de Redes Sociales --}}
    <div class="row justify-content-center g-5">
        <div class="col-md-6 col-lg-5">
            <div class="card team-card border-0 shadow-sm text-center">
                <div class="team-card-img-container">
                    <img src="{{ asset('images/ignacio-ortellado.webp') }}" class="card-img-top" alt="Retrato del Ing. Ignacio Ortellado, Presidente de Fundación Prodigio">
                    <div class="team-card-overlay">
                        <a href="#" class="btn btn-outline-light rounded-circle mx-1"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="btn btn-outline-light rounded-circle mx-1"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="card-body p-4">
                    <h4 class="card-title fw-bold">Ing. Ignacio Ortellado</h4>
                    <p class="card-subtitle mb-2 text-primary fw-semibold">Presidente</p>
                    <p class="card-text text-muted">Empresario e Ingeniero Civil. Fundador de la empresa constructora TOCSA S.A. Cree y practica la Responsabilidad Social Empresarial como una obligación ética y moral.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-5">
            <div class="card team-card border-0 shadow-sm text-center">
                 <div class="team-card-img-container">
                    <img src="{{ asset('images/marcos-margraf.webp') }}" class="card-img-top" alt="Retrato del Dr. Marcos Margraf, Director Clínico de Fundación Prodigio">
                    <div class="team-card-overlay">
                        <a href="#" class="btn btn-outline-light rounded-circle mx-1"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="btn btn-outline-light rounded-circle mx-1"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="card-body p-4">
                    <h4 class="card-title fw-bold">Dr. Marcos Margraf</h4>
                    <p class="card-subtitle mb-2 text-primary fw-semibold">Director Clínico</p>
                    <p class="card-text text-muted">Odontólogo Especializado, Master y Doctorado en Odontología Restauradora Estética. Director de Margraf Oral Health Group y propietario de 4 patentes en Odontología.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection