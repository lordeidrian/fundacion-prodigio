<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Models\Post;
use App\Http\Controllers\BlogController;

// --- Rutas Principales ---
Route::get('/', function () {
    // 1. Se obtienen los posts
    $posts = Post::latest()
                   ->take(3)
                   ->get();

    // 2. Se pasan los posts a la vista con el nombre 'latestPosts'
    return view('inicio', ['latestPosts' => $posts]);
});
// --- Rutas Principales ---
Route::get('/', [PageController::class, 'inicio'])->name('inicio');
Route::get('/nosotros', [PageController::class, 'nosotros'])->name('nosotros');
Route::get('/contacto', [PageController::class, 'contacto'])->name('contacto');

// --- Rutas para Proyectos ---
Route::get('/nuestro-trabajo', [ProjectController::class, 'index'])->name('proyectos.index');
Route::get('/nuestro-trabajo/{project:slug}', [ProjectController::class, 'show'])->name('proyectos.show');

// --- Rutas para el Blog (Noticias y Eventos) ---
Route::get('/blog', [BlogController::class, 'index'])->name('noticias.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('noticia.single');
