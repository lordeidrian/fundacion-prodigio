<?php

    namespace App\Http\Controllers;

    use App\Models\Project;
    use App\Models\PageSection;
    use App\Models\ImpactStat;
    use Illuminate\Http\Request;

    class ProjectController extends Controller
    {
        public function index()
        {
            $pageSections = PageSection::where('page_name', 'proyectos')->get()->keyBy('section_key');
            $projects = Project::with('children')->whereNull('parent_id')->where('status', 'published')->orderBy('order')->get();
            $impactStats = ImpactStat::where('is_active', true)->orderBy('order')->get(); // <-- AÑADIR ESTA LÍNEA

            return view('proyectos', array_merge(
                compact('pageSections', 'projects', 'impactStats'),
                ['seo' => [
                    'title' => 'Nuestro Trabajo',
                    'description' => 'Descubre los proyectos e iniciativas de Fundación Prodigio que están transformando vidas y comunidades a través de la educación y el desarrollo.',
                ]]
            )); // <-- AÑADIR $impactStats
        }

        public function show(Project $project)
        {
            // Carga el proyecto, sus sub-proyectos y su galería de medios
            $project->load(['children', 'media']);
            return view('proyecto-single', array_merge(
                compact('project'),
                ['seo' => [
                    'title' => $project->title,
                    'description' => $project->excerpt ?? strip_tags(substr($project->content, 0, 160)),
                    'image' => $project->featured_image ? asset('storage/' . $project->featured_image) : null,
                ]]
            ));
        }
    }
