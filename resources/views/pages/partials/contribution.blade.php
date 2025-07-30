{{-- CÓMO AYUDAR / LLAMADA A LA ACCIÓN --}}
    <section id="ayudar" class="py-5 bg-light">
        <div class="container my-5">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold font-headline text-dark">Súmate a Nuestra Causa</h2>
                <p class="lead text-muted mx-auto" style="max-width: 800px;">El cambio social es una tarea colectiva. Tu apoyo es fundamental para que podamos seguir ayudando a más familias. Hay muchas formas de colaborar.</p>
            </div>
            <div class="row g-4 justify-content-center">
                {{-- Tarjeta 1: Alianzas Corporativas / Ser Socio --}}
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm text-center p-4">
                        <div class="card-body d-flex flex-column">
                            <i class="bi bi-building fs-1 text-accent"></i>
                            <h4 class="card-title fw-bold mt-3">Alianzas Corporativas</h4>
                            <p class="card-text text-muted">Conviértete en un socio estratégico y demuestra el compromiso social de tu empresa para construir un futuro más justo.</p>
                            <a href="{{ route('contacto') }}" class="btn btn-outline-primary mt-auto">Quiero ser Socio</a>
                        </div>
                    </div>
                </div>
                {{-- Tarjeta 2: Realizar una Donación --}}
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm text-center p-4">
                        <div class="card-body d-flex flex-column">
                            <i class="bi bi-gift-fill fs-1 text-accent"></i>
                            <h4 class="card-title fw-bold mt-3">Realiza una Donación</h4>
                            <p class="card-text text-muted">Tu aporte económico nos permite adquirir insumos y financiar los tratamientos para nuestros beneficiarios.</p>
                            {{-- Este botón puede llevar a contacto o a una pasarela de pago --}}
                            <a href="{{ route('contacto') }}" class="btn btn-accent text-white mt-auto">Donar Ahora</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>