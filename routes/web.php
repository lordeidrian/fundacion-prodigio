<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Models\Post;

// --- Rutas Principales ---
Route::get('/', function () {
    // 1. Se obtienen los posts
    $posts = Post::latest()
                   ->take(3)
                   ->get();

    // 2. Se pasan los posts a la vista con el nombre 'latestPosts'
    return view('inicio', ['latestPosts' => $posts]); 
});
Route::get('/', [PageController::class, 'inicio'])->name('inicio');
Route::get('/nosotros', [PageController::class, 'nosotros'])->name('nosotros'); // <-- RUTA ACTUALIZADA
Route::get('/nuestro-trabajo', [PageController::class, 'proyectos'])->name('proyectos');
Route::get('/contacto', [PageController::class, 'contacto'])->name('contacto');
Route::get('/noticias', [PageController::class, 'noticias'])->name('noticias');
Route::get('/noticias/{post:slug}', [PageController::class, 'noticiaSingle'])->name('noticia.single');