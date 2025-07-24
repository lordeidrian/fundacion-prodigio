@extends('layouts.app')

@section('title', 'Nuestro Equipo - Fundación Prodigio')

@section('content')
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