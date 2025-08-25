<section id="ayudar" class="py-5 bg-white">
    <div class="container my-5">
        <div class="text-center mb-5">
            {{-- Título y subtítulo dinámicos de la sección --}}
            <h2 class="display-5 fw-bold font-headline text-dark">
                {{ $pageSections['sumate_causa']->content['title'] ?? 'Súmate a Nuestra Causa' }}
            </h2>
            <p class="lead text-muted mx-auto" style="max-width: 800px;">
                {{ $pageSections['sumate_causa']->content['text'] ?? 'El cambio social es una tarea colectiva. Tu apoyo es fundamental para que podamos seguir ayudando a más familias. Hay muchas formas de colaborar.' }}
            </p>
        </div>

        @if(isset($supportMethods) && $supportMethods->isNotEmpty())
            <div class="row g-4 justify-content-center">
                @foreach($supportMethods as $method)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm text-center p-4">
                            <div class="card-body d-flex flex-column">

                                {{-- Ícono: usar la clase completa guardada (bi o fa) --}}
                                <i class="{{ $method->icon ?? 'bi bi-heart-pulse' }} fs-1 text-accent"></i>

                                <h4 class="card-title fw-bold mt-3">{{ $method->title }}</h4>

                                {{-- Descripción en texto plano, ya controlada en el modelo --}}
                                <p class="card-text text-muted">
                                    {{ $method->description }}
                                </p>

                                {{-- Botón con estilo unificado --}}
                                <a href="{{ $method->button_link }}"
                                   class="btn btn-outline-primary mt-auto"
                                   target="_blank" rel="noopener">
                                    {{ $method->button_text }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
