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