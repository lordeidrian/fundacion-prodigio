<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| Rutas Web
|--------------------------------------------------------------------------
| Aquí es donde puedes registrar las rutas web para tu aplicación.
*/

// --- Rutas de Páginas Estáticas ---
Route::get('/', [PageController::class, 'inicio'])->name('inicio');
Route::get('/nosotros', [PageController::class, 'nosotros'])->name('nosotros');

// --- RUTA FALTANTE AÑADIDA AQUÍ ---
Route::get('/contacto', [PageController::class, 'contacto'])->name('contacto');

// --- Ruta para el Sitemap (SEO) ---
Route::get('/sitemap.xml', function () {
    return response()->view('sitemap')->header('Content-Type', 'application/xml');
});


// --- Ruta para procesar el envío del formulario de contacto ---
Route::post('/contacto', [PageController::class, 'submitContact'])->name('contact.submit');


// --- Rutas para Proyectos ---
Route::prefix('nuestro-trabajo')->name('proyectos.')->group(function () {
    Route::get('/', [ProjectController::class, 'index'])->name('index');
    Route::get('/{project:slug}', [ProjectController::class, 'show'])->name('show');
});


// --- Rutas para el Blog (Noticias y Eventos) ---
Route::prefix('blog')->name('noticias.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{post:slug}', [BlogController::class, 'show'])->name('single');
});
