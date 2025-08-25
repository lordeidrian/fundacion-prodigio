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
use App\Models\Project;
use App\Models\Testimonial;

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
        $latestPosts = Post::latest()->take(6)->get();
        $featuredProjects = Project::where('status', 'published')->latest()->take(2)->get();

        // 2. Pasamos TODAS las variables a la vista.
        return view('inicio', [
            'banners' => $banners,
            'actionPillars' => $actionPillars,
            'supportMethods' => $supportMethods,
            'pageSections' => $pageSections,
            'latestPosts' => $latestPosts,
            'featuredProjects' => $featuredProjects,
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
        $supportMethods = SupportMethod::where('is_active', true)->orderBy('order')->get();
        // Pasamos los datos a la vista
        return view('contacto', compact('pageSections', 'supportMethods'));
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
        // Secciones
        $pageSections = PageSection::where('page_name', 'nosotros')
            ->get()
            ->keyBy('section_key');

        // Valores
        $values = Value::where('is_active', true)
            ->orderBy('order')
            ->get();

        // Líneas estratégicas
        $strategicLines = StrategicLine::where('is_active', true)
            ->orderBy('order')
            ->get();

        // Equipo
        $teamMembers = TeamMember::where('is_active', true)
            ->orderBy('order')
            ->get();

        // ✅ Testimonios visibles (imagen o YouTube)
        $testimonials = Testimonial::where('is_visible', true)
            ->orderBy('id', 'desc')   // o ->orderBy('order') si tenés ese campo
            ->take(12)                // opcional: límite
            ->get();

        return view('nosotros', compact(
            'pageSections',
            'values',
            'strategicLines',
            'teamMembers',
            'testimonials' // 👈 pásalo a la vista
        ));
    }
}
