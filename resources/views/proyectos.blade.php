@extends('layouts.app')

@section('title', 'Nuestro Trabajo - Fundación Prodigio')

@section('content')

    {{-- HERO SECTION PARA PÁGINAS INTERNAS --}}
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

    {{-- PROYECTO EMBARAZO SONRIENTE --}}
    <section class="py-5 bg-white">
        <div class="container my-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="badge bg-primary-subtle text-primary-emphasis rounded-pill mb-3">Proyecto Insignia</span>
                    <h2 class="display-5 fw-bold font-headline text-dark">Proyecto "Embarazo Sonriente"</h2>
                    <p class="lead text-muted">
                        Creemos que la salud debe comenzar desde la concepción. Este proyecto es nuestra respuesta a una necesidad crítica en Paraguay.
                    </p>
                    <p>
                        Durante el embarazo, las mujeres atraviesan cambios que aumentan el riesgo de enfermedades bucales, afectando su bienestar y el del bebé (parto prematuro, bajo peso al nacer). En Paraguay, el **90% de las embarazadas no recibe tratamiento odontológico** y el **70% de los niños inicia su escolarización con caries**.
                    </p>
                    <p>
                        "Embarazo Sonriente" nace para garantizar atención gratuita, oportuna y de calidad a mujeres de escasos recursos, combinando atención clínica con educación y acompañamiento.
                    </p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/embarazo-sonriente.jpg') }}" class="img-fluid rounded-3 shadow-lg" alt="Madre y niño beneficiarios del programa Embarazo Sonriente">
                </div>
            </div>
        </div>
    </section>

    {{-- CENTRO ODONTOLÓGICO INTEGRAL (COI) --}}
    <section class="py-5 bg-light">
        <div class="container my-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 order-lg-2">
                    <h2 class="display-5 fw-bold font-headline text-dark">Centro Odontológico Integral (COI)</h2>
                    <p class="lead text-muted">
                        Un logro fundamental y el corazón de nuestras operaciones.
                    </p>
                    <p>
                        Para hacer realidad nuestro proyecto, construimos y pusimos en funcionamiento el COI, una clínica modelo inaugurada en marzo de 2024 en Luque. Fue diseñada con criterios de accesibilidad, seguridad y excelencia, siendo una expresión concreta de nuestra misión.
                    </p>
                    <ul class="list-unstyled mt-3">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
                            <span><strong>9 consultorios</strong> equipados con tecnología de vanguardia (2 pediátricos y 2 para cirugía).</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
                            <span>Sala de **radiografía panorámica** y tecnología de **escaneo intraoral**.</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
                            <span>Áreas de **esterilización** de primer nivel y **laboratorio dental** propio.</span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <img src="https://fundacionprodigio.org/wp-content/uploads/2024/07/coi-compress.jpg" class="img-fluid rounded-3 shadow-lg" alt="Instalaciones modernas del Centro Odontológico Integral (COI)">
                </div>
            </div>
        </div>
    </section>

    {{-- LOGROS Y RESULTADOS --}}
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
    {{-- NUEVA SECCIÓN: Alianzas Estratégicas y Colaboradores --}}
    <section class="py-5 bg-light">
        <div class="container my-5">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold font-headline text-dark">Nuestras Alianzas Estratégicas</h2>
                <p class="lead text-muted mx-auto" style="max-width: 800px;">Trabajamos de la mano con líderes del sector privado y la sociedad civil para amplificar nuestro impacto. Contamos con 16 alianzas solidarias.</p>
            </div>
            <div class="row justify-content-center align-items-center g-4">
                {{-- Aquí se cargarán dinámicamente o se añadirán manualmente logos de las empresas mencionadas en el PDF --}}
                <div class="col-6 col-md-3 col-lg-2">
                    <img src="https://via.placeholder.com/150x80/f8f9fa/212529?text=TOCSA" class="img-fluid grayscale-on-hover" alt="Logo TOCSA">
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <img src="https://via.placeholder.com/150x80/f8f9fa/212529?text=PALERMO%20S.A." class="img-fluid grayscale-on-hover" alt="Logo PALERMO S.A.">
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <img src="https://via.placeholder.com/150x80/f8f9fa/212529?text=NEXTAR" class="img-fluid grayscale-on-hover" alt="Logo NEXTAR">
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <img src="https://via.placeholder.com/150x80/f8f9fa/212529?text=RAICES%20REAL%20ESTATE" class="img-fluid grayscale-on-hover" alt="Logo RAICES REAL ESTATE">
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <img src="https://via.placeholder.com/150x80/f8f9fa/212529?text=IMPLENIA" class="img-fluid grayscale-on-hover" alt="Logo IMPLENIA">
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <img src="https://via.placeholder.com/150x80/f8f9fa/212529?text=ARCOIRIS" class="img-fluid grayscale-on-hover" alt="Logo ARCOIRIS">
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <img src="https://via.placeholder.com/150x80/f8f9fa/212529?text=LCM" class="img-fluid grayscale-on-hover" alt="Logo LCM">
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <img src="https://via.placeholder.com/150x80/f8f9fa/212529?text=LUMINOTECNIA" class="img-fluid grayscale-on-hover" alt="Logo LUMINOTECNIA">
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <img src="https://via.placeholder.com/150x80/f8f9fa/212529?text=PRINTEC" class="img-fluid grayscale-on-hover" alt="Logo PRINTEC">
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <img src="https://via.placeholder.com/150x80/f8f9fa/212529?text=PAMPEIRO" class="img-fluid grayscale-on-hover" alt="Logo PAMPEIRO">
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <img src="https://via.placeholder.com/150x80/f8f9fa/212529?text=TARGET" class="img-fluid grayscale-on-hover" alt="Logo TARGET">
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <img src="https://via.placeholder.com/150x80/f8f9fa/212529?text=TECNOEDIL%20S.A." class="img-fluid grayscale-on-hover" alt="Logo TECNOEDIL S.A.">
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <img src="https://via.placeholder.com/150x80/f8f9fa/212529?text=GHMPO" class="img-fluid grayscale-on-hover" alt="Logo GHMPO">
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <img src="https://via.placeholder.com/150x80/f8f9fa/212529?text=FAMILIAR" class="img-fluid grayscale-on-hover" alt="Logo FAMILIAR">
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <img src="https://via.placeholder.com/150x80/f8f9fa/212529?text=INNOVACIONES%20DENTALES" class="img-fluid grayscale-on-hover" alt="Logo INNOVACIONES DENTALES">
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <img src="https://via.placeholder.com/150x80/f8f9fa/212529?text=FLORENSE" class="img-fluid grayscale-on-hover" alt="Logo FLORENSE">
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <img src="https://via.placeholder.com/150x80/f8f9fa/212529?text=PREVEN-TEC" class="img-fluid grayscale-on-hover" alt="Logo PREVEN-TEC">
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <img src="https://via.placeholder.com/150x80/f8f9fa/212529?text=OT%20SA" class="img-fluid grayscale-on-hover" alt="Logo OT SA">
                </div>
            </div>
        </div>
    </section>
    
    {{-- INCLUIR LA SECCIÓN DE ALIANZAS/CONTRIBUCIÓN --}}
    {{-- Reutilizamos el parcial que ya tienes para mostrar los logos de los socios --}}
    {{-- @include('pages.partials.contribution') --}}

    {{-- CALL TO ACTION --}}
    <section class="py-5 bg-white">
        <div class="container my-5 text-center">
            <h2 class="display-5 fw-bold font-headline text-dark">Únete a Nosotros</h2>
            <p class="lead text-muted mx-auto" style="max-width: 800px;">Tu apoyo nos permite seguir creciendo y creando más historias de éxito. ¡Sé parte del cambio!</p>
            <a href="{{ route('contacto') }}" class="btn btn-primary btn-lg mt-3">Contactar para colaborar</a>
        </div>
    </section>


@endsection