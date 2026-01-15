<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;
use App\Models\Project;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Rutas Web
|--------------------------------------------------------------------------
| Aquí es donde puedes registrar las rutas web para tu aplicación.
*/

// --- Rutas de Páginas Estáticas ---
Route::get('/', [PageController::class, 'inicio'])->name('inicio');
Route::get('/nosotros', [PageController::class, 'nosotros'])->name('nosotros');
Route::get('/contacto', [PageController::class, 'contacto'])->name('contacto');

// --- Ruta para procesar el envío del formulario de contacto ---
Route::post('/contacto', [PageController::class, 'submitContact'])->name('contact.submit');

// --- Ruta para el Sitemap (SEO) ---
Route::get('/sitemap.xml', function () {
    $projects = Project::where('status', 'published')->get();
    $posts = Post::where('status', 'published')->get();

    return response()
        ->view('sitemap', compact('projects', 'posts'))
        ->header('Content-Type', 'application/xml');
})->name('sitemap');

// --- Rutas para Proyectos (URL pública: /nuestro-trabajo) ---
Route::prefix('nuestro-trabajo')->name('proyectos.')->group(function () {
    Route::get('/', [ProjectController::class, 'index'])->name('index');
    Route::get('/{project:slug}', [ProjectController::class, 'show'])->name('show');
});

// --- Rutas para el Blog (URL pública: /blog) ---
Route::prefix('blog')->name('noticias.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{post:slug}', [BlogController::class, 'show'])->name('single');
});
