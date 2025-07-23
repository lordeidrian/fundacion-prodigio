@extends('layouts.app')

@section('title', 'Contacto - Fundación Prodigio')

@section('content')
<div class="text-center">
    <h1 class="display-4 fw-bold text-primary">Ponte en Contacto</h1>
    <p class="lead text-muted">Estamos aquí para ayudarte. Envíanos un mensaje y nos pondremos en contacto contigo.</p>
</div>

<div class="row mt-5">
    <div class="col-md-8 mx-auto">
        <div class="card shadow-sm">
            <div class="card-body p-5">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Mensaje</label>
                        <textarea class="form-control" id="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Enviar Mensaje</button>
                </form>
            </div>
        </div>
        <div class="text-center mt-4">
            <p class="text-muted"><strong>Email:</strong> contacto@fundacionprodigio.org</p>
            <p class="text-muted"><strong>Teléfono:</strong> (123) 456-7890</p>
        </div>
    </div>
</div>
@endsection