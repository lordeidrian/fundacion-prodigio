@extends('layouts.app')

@section('title', 'Nuestro Trabajo - Fundación Prodigio')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold font-headline text-dark">Nuestro Trabajo</h1>
        <p class="lead text-muted">Cambiando vidas a través de la salud bucal.</p>
    </div>

    {{-- Proyecto "Embarazo Sonriente" --}}
    <div class="card border-0 shadow-sm mb-5">
        <div class="card-body p-4 p-md-5">
            <div class="row align-items-center g-4">
                <div class="col-lg-3 text-center">
                    <img src="https://fundacionprodigio.org/wp-content/uploads/2024/07/embarazo-sonriente.svg" class="img-fluid" alt="Logo Embarazo Sonriente" style="max-width: 150px;">
                </div>
                <div class="col-lg-9">
                    <h2 class="card-title text-primary">Proyecto "Embarazo Sonriente"</h2>
                    <p class="fw-semibold">¿Por qué lo hacemos?</p>
                    <p class="text-muted">Impulsamos este proyecto porque la salud bucal es parte esencial del derecho a una vida digna. Durante el embarazo, los cambios hormonales aumentan el riesgo de enfermedades que pueden afectar a la madre y al bebé. Frente a la realidad de que el 90% de las mujeres embarazadas en Paraguay no recibe tratamiento, "Embarazo Sonriente" garantiza atención gratuita, oportuna y de calidad.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Centro Odontológico Integral (COI) --}}
    <div class="row align-items-center g-5 mt-5">
        <div class="col-lg-6">
            <h2 class="display-5 fw-bold font-headline text-dark">Nuestro Centro Odontológico Integral (COI)</h2>
            <p class="lead text-muted">
                Una clínica modelo, expresión concreta de nuestra misión, diseñada para brindar atención gratuita, digna y de calidad.
            </p>
            <ul class="list-unstyled mt-4">
                <li class="d-flex align-items-start mb-3"><i class="bi bi-check-circle-fill text-primary me-3 mt-1"></i><div><strong>9 Consultorios:</strong> Incluyendo 2 pediátricos y 2 equipados para cirugía.</div></li>
                <li class="d-flex align-items-start mb-3"><i class="bi bi-check-circle-fill text-primary me-3 mt-1"></i><div><strong>Tecnología de Vanguardia:</strong> Sala de radiografía panorámica y escaneo intraoral.</div></li>
                <li class="d-flex align-items-start mb-3"><i class="bi bi-check-circle-fill text-primary me-3 mt-1"></i><div><strong>Máxima Seguridad:</strong> 2 salas de esterilización y 1 laboratorio dental.</div></li>
                <li class="d-flex align-items-start mb-3"><i class="bi bi-check-circle-fill text-primary me-3 mt-1"></i><div><strong>Atención Humanizada:</strong> Protocolos enfocados en un trato digno y empático.</div></li>
            </ul>
        </div>
        <div class="col-lg-6">
            <img src="https://fundacionprodigio.org/wp-content/uploads/2024/07/coi-compress.jpg" class="img-fluid rounded-3 shadow-lg" alt="Instalaciones del Centro Odontológico Integral">
        </div>
    </div>
</div>
@endsection