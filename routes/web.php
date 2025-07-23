<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Ruta de Inicio
Route::get('/', [PageController::class, 'inicio'])->name('inicio');

// Rutas Principales
Route::get('/quienes-somos', [PageController::class, 'quienesSomos'])->name('quienes-somos');
Route::get('/proyectos', [PageController::class, 'proyectos'])->name('proyectos'); // "Services" y "Impact" se pueden combinar aquí
Route::get('/contacto', [PageController::class, 'contacto'])->name('contacto');

// Puedes añadir estas si quieres más detalle
// Route::get('/nuestra-mision', [PageController::class, 'mision'])->name('mision');
// Route::get('/integrantes', [PageController::class, 'integrantes'])->name('integrantes');