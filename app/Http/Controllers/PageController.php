<?php

namespace App\Http\Controllers;

// 1. Importa TODOS los modelos que vas a necesitar
use App\Models\Post;
use App\Models\Banner;
use App\Models\ActionPillar;
use App\Models\PageSection;
use App\Models\SupportMethod;
use App\Models\Value;
use App\Models\StrategicLine;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Models\ContactSubmission;

class PageController extends Controller
{
    /**
     * Muestra la página de inicio con todos los datos dinámicos.
     */
    public function inicio()
    {
        // --- Cargar Banners ---
        // Trae todos los banners activos y los ordena por el campo 'order'
        $banners = Banner::where('is_active', true)->orderBy('order')->get();

        // --- Cargar Pilares de Acción ---
        $actionPillars = ActionPillar::where('is_active', true)->orderBy('order')->get();

        // --- Cargar Métodos de Apoyo (para el partial 'contribution') ---
        $supportMethods = SupportMethod::where('is_active', true)->orderBy('order')->get();

        // --- Cargar las Secciones de Página ---
        // Para no hacer muchas consultas, traemos todas las de la página 'inicio' de una vez
        // y las convertimos en un formato fácil de usar: ['section_key' => $section_model]
        $pageSectionsRaw = PageSection::where('page_name', 'inicio')->get();
        $pageSections = $pageSectionsRaw->keyBy('section_key');

        // --- Cargar Últimos Posts (tu código original) ---
        $latestPosts = Post::latest()->take(4)->get();

        // 2. Pasamos TODAS las variables a la vista.
        return view('inicio', [
            'banners' => $banners,
            'actionPillars' => $actionPillars,
            'supportMethods' => $supportMethods,
            'pageSections' => $pageSections,
            'latestPosts' => $latestPosts,
        ]);
    }
    public function contacto()
    {
        // --- INICIO DE LA CORRECCIÓN ---
        // Cambiamos whereIn('slug', ...) por where('section_key', ...)
        $pageSections = PageSection::where('section_key', 'informacion_contacto')
            ->get()
            ->keyBy('section_key'); // Lo agrupamos por la misma clave para que la vista funcione
        // --- FIN DE LA CORRECCIÓN ---

        // Pasamos los datos a la vista
        return view('contacto', compact('pageSections'));
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactSubmission::create($validated);

        return back()->with('success', '¡Gracias por tu mensaje! Nos pondremos en contacto contigo pronto.');
    }

    public function noticias()
    {
        $posts = Post::latest()->paginate(9);
        return view('noticias', ['posts' => $posts]);
    }

    public function noticiaSingle(Post $post)
    {
        return view('noticia-single', ['post' => $post]);
    }

    /**
     * Muestra la página consolidada "Nosotros".
     * En el futuro, podrías hacer que $valores y $equipo también sean dinámicos.
     */
    public function nosotros()
    {
        // Cargar las secciones de la página "Nosotros"
        $pageSections = PageSection::where('page_name', 'nosotros')->get()->keyBy('section_key');

        // Cargar los valores ordenados
        $values = Value::where('is_active', true)->orderBy('order')->get();

        // Cargar las líneas estratégicas ordenadas
        $strategicLines = StrategicLine::where('is_active', true)->orderBy('order')->get();

        // Cargar los miembros del equipo ordenados
        $teamMembers = TeamMember::where('is_active', true)->orderBy('order')->get();

        // Pasar todas las colecciones de datos a la vista
        return view('nosotros', compact('pageSections', 'values', 'strategicLines', 'teamMembers'));
    }
}
