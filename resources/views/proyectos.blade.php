@extends('layouts.app')

@section('title', 'Nuestro Trabajo - Fundación Prodigio')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold font-headline text-dark">Nuestro Trabajo</h1>
        <p class="lead text-muted">Cambiando vidas a través de la salud bucal y proyectos impactantes.</p>
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
                    <p class="fw-semibold">Un compromiso con la vida desde el primer momento.</p>
                    <p class="text-muted">Impulsamos este proyecto porque la salud bucal es parte esencial del derecho a una vida digna. Durante el embarazo, los cambios hormonales aumentan el riesgo de enfermedades que pueden afectar a la madre y al bebé. Frente a la realidad de que el 90% de las mujeres embarazadas en Paraguay no recibe tratamiento, "Embarazo Sonriente" garantiza atención gratuita, oportuna y de calidad.</p>
                    
                    <div class="accordion accordion-flush mt-4" id="accordionEmbarazoSonriente">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Objetivo y Resultados Clave
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionEmbarazoSonriente">
                                <div class="accordion-body text-muted">
                                    <p><strong>Objetivo 2:</strong> Reducir el 95% de la incidencia de caries en niños nacidos de mujeres embarazadas que se encuentran dentro del programa hasta los 3 años de edad.</p>
                                    <h6 class="fw-bold mt-3">Resultados e Iniciativas:</h6>
                                    <ul>
                                        <li><strong>Resultado 2.1: Tratar a 1.000 mujeres embarazadas y sus hijos anualmente.</strong> Iniciativas clave: Desarrollo de campañas de concientización, coordinación con hospitales para referencias, establecimiento de un sistema de registro y seguimiento de pacientes.</li>
                                        <li><strong>Resultado 2.2: Implementar programas de educación y prevención de caries en comunidades.</strong> Iniciativas clave: Desarrollo de materiales educativos, organización de talleres en escuelas y centros comunitarios, colaboración con educadores y líderes comunitarios.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Centro Odontológico Integral (COI) --}}
    <div class="row align-items-center g-5 mt-5">
        <div class="col-lg-6">
            <h2 class="display-5 fw-bold font-headline text-dark">Nuestro Centro Odontológico Integral (COI)</h2>
            <p class="lead text-muted">
                Una clínica modelo, expresión concreta de nuestra misión, diseñada para brindar atención gratuita, digna y de calidad. Inaugurada en marzo de 2024, cuenta con una infraestructura de 900 m².
            </p>
            <div class="accordion accordion-flush mt-4" id="accordionCOI">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Características y Equipamiento de Vanguardia
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionCOI">
                        <div class="accordion-body text-muted">
                            <ul class="list-unstyled">
                                <li class="d-flex align-items-start mb-3"><i class="bi bi-check-circle-fill text-primary me-3 mt-1"></i><div><strong>9 Consultorios:</strong> Incluyendo 2 pediátricos y 2 equipados para cirugía.</div></li>
                                <li class="d-flex align-items-start mb-3"><i class="bi bi-check-circle-fill text-primary me-3 mt-1"></i><div><strong>Tecnología de Vanguardia:</strong> Sala de radiografía panorámica y escaneo intraoral.</div></li>
                                <li class="d-flex align-items-start mb-3"><i class="bi bi-check-circle-fill text-primary me-3 mt-1"></i><div><strong>Máxima Seguridad:</strong> 2 salas de esterilización y 1 laboratorio dental.</div></li>
                                <li class="d-flex align-items-start mb-3"><i class="bi bi-check-circle-fill text-primary me-3 mt-1"></i><div><strong>Atención Humanizada:</strong> Protocolos enfocados en un trato digno y empático.</div></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Objetivos y Estrategias Clave del COI
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionCOI">
                        <div class="accordion-body text-muted">
                            <p><strong>Objetivo 1:</strong> Establecer un modelo de clínica de referencia para la salud bucal de mujeres embarazadas y niños de hasta 3 años en Luque.</p>
                            <h6 class="fw-bold mt-3">Resultados e Iniciativas:</h6>
                            <ul>
                                <li><strong>Resultado 1.1: Desarrollar una infraestructura clínica y un equipo profesional multidisciplinario.</strong> Iniciativas clave: Planificación detallada, adquisición de equipos de última generación, conformación del equipo (odontólogos y gestores sociales).</li>
                                <li><strong>Resultado 1.2: Formar alianzas con universidades y entidades.</strong> Iniciativas clave: Presentación de propuestas, programas de internado y voluntariado, eventos de networking.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <img src="https://fundacionprodigio.org/wp-content/uploads/2024/07/coi-compress.jpg" class="img-fluid rounded-3 shadow-lg" alt="Instalaciones del Centro Odontológico Integral">
        </div>
    </div>
@endsection
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
    {{-- NUEVA SECCIÓN: Nuestros Logros Destacados --}}
    <section class="py-5">
        <div class="container my-5">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold font-headline text-dark">Nuestros Logros Destacados</h2>
                <p class="lead text-muted mx-auto" style="max-width: 800px;">Hitos que marcan nuestro camino y el impacto que generamos.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm p-4 card-hover">
                        <div class="card-body">
                            <i class="bi bi-building-check fs-1 text-accent mb-3"></i>
                            <h4 class="card-title fw-bold">Clínica Modelo en Luque</h4>
                            <p class="card-text text-muted">Hemos construido y puesto en funcionamiento el Centro Odontológico Integral (COI) en Luque, un centro modelo para la salud bucal, inaugurado en marzo de 2024.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm p-4 card-hover">
                        <div class="card-body">
                            <i class="bi bi-people-fill fs-1 text-accent mb-3"></i>
                            <h4 class="card-title fw-bold">Alianzas con la Sociedad Civil</h4>
                            <p class="card-text text-muted">Establecimos alianzas con <strong>3 organizaciones de la sociedad civil</strong> para focalizar beneficiarios y desarrollar acciones de sensibilización, concientización, prevención y educación. Un ejemplo es el convenio con Fundación Dequeni.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm p-4 card-hover">
                        <div class="card-body">
                            <i class="bi bi-heart-pulse-fill fs-1 text-accent mb-3"></i>
                            <h4 class="card-title fw-bold">Atención a Beneficiarios</h4>
                            <p class="card-text text-muted">Hemos brindado atención bucodental a <strong>67 beneficiarios</strong>, con <strong>14 de ellos dados de alta</strong>, logrando un impacto directo en sus vidas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm p-4 card-hover">
                        <div class="card-body">
                            <i class="bi bi-hand-thumbs-up-fill fs-1 text-accent mb-3"></i>
                            <h4 class="card-title fw-bold">Compromiso Corporativo</h4>
                            <p class="card-text text-muted">Desarrollamos visitas guiadas a la clínica y conversatorios de presentación de la causa y charlas educativas a colaboradores de nuestras 16 empresas benefactoras.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>