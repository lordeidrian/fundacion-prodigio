@extends('layouts.app')

@section('title', 'Misión, Visión y Valores - Fundación Prodigio')

@section('content')
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
@endsection