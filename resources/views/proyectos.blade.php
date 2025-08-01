@extends('layouts.app')

@section('title', 'Nuestro Trabajo - Fundación Prodigio')

@section('content')

    {{-- HERO SECTION PARA PÁGINAS INTERNAS (Sin cambios) --}}
    <div class="page-header-overlay" 
         style="background-image: linear-gradient(45deg, rgba(29, 69, 107, 0.8), rgba(0, 100, 210, 0.7)), url('{{ asset('images/banner-proyectos.jpg') }}'); 
                background-position: center center; 
                background-size: cover; 
                background-repeat: no-repeat;">
        
        <div class="container py-5">
            <div class="row">
                <div class="col-12 text-center text-white">
                    <h1 class="display-4 fw-bold">Nuestro Trabajo</h1>
                    <p class="lead">Conoce los proyectos e iniciativas que transforman nuestra misión en acciones concretas.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- =================================================================== --}}
    {{-- SECCIÓN DEL PROYECTO PRINCIPAL: EMBARAZO SONRIENTE                 --}}
    {{-- =================================================================== --}}
    <section class="py-5 bg-white">
        <div class="container my-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="badge bg-primary-subtle text-primary-emphasis rounded-pill mb-3 fs-6">Programa Insignia</span>
                    <h2 class="display-5 fw-bold font-headline text-dark">Programa "Embarazo Sonriente"</h2>
                    <p class="lead text-muted">
                        Creemos que la salud debe comenzar desde la concepción. Este programa integral es nuestra respuesta a una necesidad crítica en Paraguay.
                    </p>
                    <p>
                        Durante el embarazo, las mujeres atraviesan cambios que aumentan el riesgo de enfermedades bucales, afectando su bienestar y el del bebé. En Paraguay, el **90% de las embarazadas no recibe tratamiento odontológico** y el **70% de los niños inicia su escolarización con caries**.
                    </p>
                    <p>
                        "Embarazo Sonriente" nace para garantizar atención gratuita, oportuna y de calidad a mujeres de escasos recursos, combinando atención clínica con educación y acompañamiento a través de sus componentes clave.
                    </p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/embarazo-sonriente.jpg') }}" class="img-fluid rounded-3 shadow-lg" alt="Madre y niño beneficiarios del programa Embarazo Sonriente">
                </div>
            </div>
        </div>
    </section>

    {{-- =================================================================== --}}
    {{-- SECCIÓN DE LOS COMPONENTES DEL PROYECTO (SUB-PROYECTOS)           --}}
    {{-- =================================================================== --}}
    <section class="py-5 bg-light">
        <div class="container my-5">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold font-headline text-dark">Componentes del Programa</h2>
                <p class="lead text-muted mx-auto" style="max-width: 800px;">Para lograr nuestros objetivos, "Embarazo Sonriente" se apoya en dos pilares fundamentales:</p>
            </div>
            <div class="row g-4 justify-content-center">

                {{-- SUB-PROYECTO 1: CENTRO ODONTOLÓGICO INTEGRAL (COI) --}}
                <div class="col-lg-6 d-flex align-items-stretch">
                    <div class="card shadow-sm w-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-circle bg-primary-subtle text-primary me-3">
                                    <i class="bi bi-building fs-3"></i>
                                </div>
                                <div>
                                    <h4 class="fw-bold mb-0">Centro Odontológico Integral (COI)</h4>
                                    <p class="text-muted mb-0">El corazón de nuestras operaciones</p>
                                </div>
                            </div>
                            <p>
                                Para hacer realidad nuestro proyecto, construimos y pusimos en funcionamiento el COI, una clínica modelo inaugurada en marzo de 2024 en Luque. Fue diseñada con criterios de accesibilidad, seguridad y excelencia.
                            </p>
                            <ul class="list-unstyled mt-3">
                                <li class="d-flex align-items-start mb-2">
                                    <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
                                    <span><strong>9 consultorios</strong> equipados con tecnología de vanguardia.</span>
                                </li>
                                <li class="d-flex align-items-start">
                                    <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
                                    <span>Áreas de **esterilización** de primer nivel y **laboratorio dental** propio.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- SUB-PROYECTO 2: EDUCACIÓN Y PREVENCIÓN --}}
                <div class="col-lg-6 d-flex align-items-stretch">
                    <div class="card shadow-sm w-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-circle bg-primary-subtle text-primary me-3">
                                    <i class="bi bi-book-half fs-3"></i>
                                </div>
                                <div>
                                    <h4 class="fw-bold mb-0">Educación y Prevención</h4>
                                    <p class="text-muted mb-0">Empoderando a través del conocimiento</p>
                                </div>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi.
                            </p>
                            <ul class="list-unstyled mt-3">
                                <li class="d-flex align-items-start mb-2">
                                    <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
                                    <span>Talleres sobre higiene bucal durante el embarazo.</span>
                                </li>
                                <li class="d-flex align-items-start">
                                    <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
                                    <span>Acompañamiento y seguimiento personalizado a cada beneficiaria.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- LOGROS Y RESULTADOS (Sin cambios) --}}
    <section class="py-5 bg-white">
        <div class="container my-5 text-center">
            <h2 class="display-5 fw-bold font-headline text-dark mb-3">Nuestro Impacto en Cifras</h2>
            <p class="lead text-muted mx-auto mb-5" style="max-width: 800px;">Estos son los resultados que hemos alcanzado gracias al esfuerzo conjunto con nuestros socios y la comunidad.</p>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm p-3">
                        <div class="card-body">
                            <h3 class="display-4 fw-bold text-primary">67</h3>
                            <p class="fw-semibold mb-0">Beneficiarios Atendidos</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm p-3">
                        <div class="card-body">
                            <h3 class="display-4 fw-bold text-primary">14</h3>
                            <p class="fw-semibold mb-0">Pacientes dados de Alta</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm p-3">
                        <div class="card-body">
                            <h3 class="display-4 fw-bold text-primary">3</h3>
                            <p class="fw-semibold mb-0">Alianzas con ONGs</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm p-3">
                        <div class="card-body">
                            <h3 class="display-4 fw-bold text-primary">16</h3>
                            <p class="fw-semibold mb-0">Empresas Colaboradoras</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ALIANZAS ESTRATÉGICAS (Sin cambios) --}}
    <section class="py-5 bg-light">
        <div class="container my-5">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold font-headline text-dark">Nuestras Alianzas Estratégicas</h2>
                <p class="lead text-muted mx-auto" style="max-width: 800px;">Trabajamos de la mano con líderes del sector privado y la sociedad civil para amplificar nuestro impacto. Contamos con 16 alianzas solidarias.</p>
            </div>
            {{-- Aquí irían los logos --}}
        </div>
    </section>
    
    {{-- CALL TO ACTION (Sin cambios) --}}
    <section class="py-5 bg-white">
        <div class="container my-5 text-center">
            <h2 class="display-5 fw-bold font-headline text-dark">Únete a Nosotros</h2>
            <p class="lead text-muted mx-auto" style="max-width: 800px;">Tu apoyo nos permite seguir creciendo y creando más historias de éxito. ¡Sé parte del cambio!</p>
            <a href="{{ route('contacto') }}" class="btn btn-primary btn-lg mt-3">Contactar para colaborar</a>
        </div>
    </section>

@endsection
