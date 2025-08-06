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

            return view('proyectos', compact('pageSections', 'projects', 'impactStats')); // <-- AÑADIR $impactStats
        }

        public function show(Project $project)
        {
            // Carga el proyecto, sus sub-proyectos y su galería de medios
            $project->load(['children', 'media']);
            return view('proyecto-single', compact('project'));
        }
    }
