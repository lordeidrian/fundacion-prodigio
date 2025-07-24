<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// --- Rutas Principales ---
Route::get('/', [PageController::class, 'inicio'])->name('inicio');
Route::get('/nosotros', [PageController::class, 'nosotros'])->name('nosotros'); // <-- RUTA ACTUALIZADA
Route::get('/nuestro-trabajo', [PageController::class, 'proyectos'])->name('proyectos');
Route::get('/contacto', [PageController::class, 'contacto'])->name('contacto');