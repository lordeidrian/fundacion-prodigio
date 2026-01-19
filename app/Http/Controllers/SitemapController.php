<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate and return the sitemap XML
     *
     * @return Response
     */
    public function index(): Response
    {
        // Get all published projects
        $projects = Project::where('status', 'published')
            ->whereNull('parent_id') // Only parent projects, not sub-projects
            ->orderBy('updated_at', 'desc')
            ->get();

        // Get all published blog posts
        $posts = Post::where('status', 'published')
            ->orderBy('updated_at', 'desc')
            ->get();

        // Build sitemap XML
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Add homepage
        $xml .= $this->buildUrl(route('inicio'), now(), '1.0', 'daily');

        // Add about page
        $xml .= $this->buildUrl(route('nosotros'), now(), '0.8', 'weekly');

        // Add contact page
        $xml .= $this->buildUrl(route('contacto'), now(), '0.7', 'monthly');

        // Add projects index
        $xml .= $this->buildUrl(route('proyectos.index'), now(), '0.9', 'weekly');

        // Add individual projects
        foreach ($projects as $project) {
            $xml .= $this->buildUrl(
                route('proyectos.show', $project->slug),
                $project->updated_at,
                '0.8',
                'monthly'
            );
        }

        // Add blog index
        $xml .= $this->buildUrl(route('noticias.index'), now(), '0.9', 'daily');

        // Add individual blog posts
        foreach ($posts as $post) {
            $xml .= $this->buildUrl(
                route('noticias.single', $post->slug),
                $post->updated_at,
                '0.7',
                'weekly'
            );
        }

        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }

    /**
     * Build a URL entry for the sitemap
     *
     * @param string $loc
     * @param \Carbon\Carbon|string $lastmod
     * @param string $priority
     * @param string $changefreq
     * @return string
     */
    private function buildUrl(string $loc, $lastmod, string $priority, string $changefreq): string
    {
        $lastmodDate = is_string($lastmod) ? $lastmod : $lastmod->toW3cString();
        
        return sprintf(
            '<url><loc>%s</loc><lastmod>%s</lastmod><priority>%s</priority><changefreq>%s</changefreq></url>',
            htmlspecialchars($loc, ENT_XML1, 'UTF-8'),
            $lastmodDate,
            $priority,
            $changefreq
        );
    }
}
