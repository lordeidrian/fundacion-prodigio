{{-- CÓMO AYUDAR / LLAMADA A LA ACCIÓN --}}
<section id="ayudar" class="py-5 bg-white">
    <div class="container my-5">
        <div class="text-center mb-5">
            {{-- Título y subtítulo dinámicos de la sección --}}
            <h2 class="display-5 fw-bold font-headline text-dark">{{ $pageSections['sumate_causa']->content['title'] ?? 'Súmate a Nuestra Causa' }}</h2>
            <p class="lead text-muted mx-auto" style="max-width: 800px;">{{ $pageSections['sumate_causa']->content['text'] ?? 'El cambio social es una tarea colectiva. Tu apoyo es fundamental para que podamos seguir ayudando a más familias. Hay muchas formas de colaborar.' }}</p>
        </div>

        @if(isset($supportMethods) && $supportMethods->isNotEmpty())
            <div class="row g-4 justify-content-center">
                @foreach($supportMethods as $method)
                    {{-- Tarjeta dinámica --}}
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm text-center p-4">
                            <div class="card-body d-flex flex-column">
                                {{-- Aquí podrías añadir un campo de ícono en el futuro si quieres --}}
                                <i class="bi {{ $loop->first ? 'bi-building' : 'bi-gift-fill' }} fs-1 text-accent"></i>
                                <h4 class="card-title fw-bold mt-3">{{ $method->title }}</h4>
                                <p class="card-text text-muted">{{ $method->description }}</p>
                                <a href="{{ url($method->button_link) }}" class="btn {{ $loop->first ? 'btn-outline-primary' : 'btn-accent text-white' }} mt-auto">{{ $method->button_text }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
