@extends('layouts.app')

@section('title', 'Contacto - Fundación Prodigio')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold font-headline text-dark">Contacto y Donaciones</h1>
        <p class="lead text-muted">Tu apoyo nos permite seguir adelante. Contáctanos o realiza tu donación.</p>
    </div>

    <div class="row g-5">
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <h4 class="card-title fw-bold mb-4">Envíanos un Mensaje</h4>
                    <form>
                        {{-- ... (el formulario se mantiene igual) ... --}}
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h4 class="card-title fw-bold mb-4">Información de Contacto</h4>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-start mb-3">
                            <i class="bi bi-geo-alt-fill text-primary me-3 fs-4"></i>
                            <div>
                                <strong class="d-block">Dirección</strong>
                                Av. Santísima Trinidad 1836, Asunción, Paraguay
                            </div>
                        </li>
                        <li class="d-flex align-items-start mb-3">
                            <i class="bi bi-envelope-fill text-primary me-3 fs-4"></i>
                            <div>
                                <strong class="d-block">Email</strong>
                                <a href="mailto:info@fundacionprodigio.org">info@fundacionprodigio.org</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="bi bi-telephone-fill text-primary me-3 fs-4"></i>
                            <div>
                                <strong class="d-block">Teléfono</strong>
                                (021) 288 5000
                            </div>
                        </li>
                    </ul>
                    <hr>
                    <h5 class="fw-bold">Nuestras Redes</h5>
                    <div>
                        <a href="https://www.instagram.com/fundacionprodigio/" target="_blank" class="btn btn-light rounded-circle me-2"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.facebook.com/fundacionprodigio" target="_blank" class="btn btn-light rounded-circle"><i class="bi bi-facebook"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Mapa de Ubicación --}}
    <div class="row mt-5">
        <div class="col-12">
             <div class="card border-0 shadow-sm">
                <div class="card-body p-2">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.232535033781!2d-57.57018862369689!3d-25.2626245302636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x945da8c807555555%3A0x8ca564815903063!2sFundaci%C3%B3n%20Prodigio!5e0!3m2!1ses-419!2spy!4v1721762145888!5m2!1ses-419!2spy" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection