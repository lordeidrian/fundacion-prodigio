<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function inicio()
    {
        // 1. Obtenemos los 3 posts más recientes.
        $latestPosts = Post::latest()->take(4)->get();

        // 2. Pasamos los posts a la vista.
        return view('inicio', ['latestPosts' => $latestPosts]);
    }
    public function proyectos() { return view('proyectos'); }
    public function contacto() { return view('contacto'); }
    public function noticias()
    {
        $posts = Post::latest()->paginate(9); // Obtiene los 9 posts más recientes por página

        return view('noticias', [
            'posts' => $posts
        ]);
    }

    /**
     * Muestra una noticia individual.
     */
    public function noticiaSingle(Post $post)
    {
        return view('noticia-single', [
            'post' => $post
        ]);
    }

    /**
     * Muestra la página consolidada "Nosotros".
     * Define y pasa todos los datos necesarios para la vista.
     */
    public function nosotros()
    {
        $valores = [
            'Equidad' => ['desc' => 'Reducimos las desigualdades en el acceso a la salud, brindando atención gratuita a quienes más lo necesitan.', 'icon' => 'bi-arrow-down-up'],
            'Dignidad' => ['desc' => 'Ofrecemos un trato respetuoso, humano y empático, reconociendo el valor de cada persona.', 'icon' => 'bi-person-heart'],
            'Calidad' => ['desc' => 'Brindamos una atención odontológica con altos estándares profesionales, priorizando la seguridad y el cuidado.', 'icon' => 'bi-gem'],
            'Compromiso Social' => ['desc' => 'Nos involucramos activamente en la transformación de la realidad de las comunidades vulnerables.', 'icon' => 'bi-people-fill'],
            'Solidaridad' => ['desc' => 'Creemos en el poder de la cooperación y el apoyo mutuo para construir un presente justo y saludable.', 'icon' => 'bi-balloon-heart-fill'],
            'Responsabilidad' => ['desc' => 'Actuamos con seriedad, ética y transparencia, gestionando los recursos con eficiencia.', 'icon' => 'bi-shield-check']
        ];

        $equipo = [
            [
                'nombre' => 'Ing. Ignacio Ortellado',
                'puesto' => 'Presidente del Directorio',
                'descripcion' => 'Empresario e Ingeniero Civil. Fundador de TOCSA S.A. Cree y practica la Responsabilidad Social Empresarial.',
                'imagen' => 'images/ignacio-ortellado.png'
            ],
            [
                'nombre' => 'Dr. Marcos Margraf',
                'puesto' => 'Director Clínico',
                'descripcion' => 'Odontólogo Especializado, Master y Doctorado. Director de Margraf Oral Health Group y propietario de 4 patentes.',
                'imagen' => 'images/marcos-margraf.png'
            ],
            [
                'nombre' => 'Andrés Silva',
                'puesto' => 'Miembro del Directorio',
                'descripcion' => 'Colabora en la dirección estratégica y supervisión de las iniciativas de la fundación.',
                'imagen' => 'images/andres-silva.png'
            ],
            [
                'nombre' => 'Fidu González',
                'puesto' => 'Miembro del Directorio',
                'descripcion' => 'Aporta su experiencia para guiar el crecimiento y el impacto de nuestra organización.',
                'imagen' => 'images/fidu-gonzalez.png'
            ],
            [
                'nombre' => 'Santiago García',
                'puesto' => 'Director Ejecutivo',
                'descripcion' => 'Responsable de la gestión diaria y la ejecución de los proyectos de la fundación.',
                'imagen' => 'images/santiago-garcia.png'
            ]
        ];

        return view('nosotros', compact('valores', 'equipo'));
    }
}