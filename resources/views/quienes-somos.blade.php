@extends('layouts.app')

@section('title', 'Quiénes Somos - Fundación Prodigio')

@section('content')
<div class="row align-items-center">
    <div class="col-lg-6">
        <img src="https://via.placeholder.com/600x700" alt="Equipo de la Fundación" class="img-fluid rounded shadow-lg">
    </div>
    <div class="col-lg-6">
        <h1 class="display-4 fw-bold text-primary">Nuestra Misión: Sonrisas Saludables para Todos</h1>
        <p class="lead text-muted mt-4">
            Fundación Prodigio nació con la creencia de que todos merecen acceso a un cuidado de calidad, sin importar sus circunstancias. Empezamos como un pequeño grupo de voluntarios y hemos crecido hasta convertirnos en una fundación que ha servido a miles de personas.
        </p>
        <p class="lead text-muted">
            Nuestra misión es eliminar las barreras para la salud a través de servicios gratuitos, educación y alcance comunitario. Nos impulsa la compasión y el compromiso de crear un cambio positivo y duradero, una sonrisa a la vez.
        </p>
         <div class="mt-4">
             <a href="{{ route('mision-vision-valores') }}" class="btn btn-primary btn-lg">Misión, Visión y Valores</a>
         </div>
    </div>
</div>
@endsection