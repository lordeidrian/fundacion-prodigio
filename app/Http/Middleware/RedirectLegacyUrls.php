<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectLegacyUrls
{
    /**
     * Handle an incoming request and redirect legacy URLs with 301 status
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Map of legacy URLs to new URLs
        $redirects = [
            'proyectos' => '/nuestro-trabajo',
            'noticias' => '/blog',
        ];

        $path = $request->path();
        
        // Check for exact matches
        if (isset($redirects[$path])) {
            return redirect($redirects[$path], 301);
        }

        // Check for dynamic routes (e.g., proyectos/slug or noticias/slug)
        if (str_starts_with($path, 'proyectos/')) {
            $slug = str_replace('proyectos/', '', $path);
            return redirect('/nuestro-trabajo/' . $slug, 301);
        }

        if (str_starts_with($path, 'noticias/')) {
            $slug = str_replace('noticias/', '', $path);
            return redirect('/blog/' . $slug, 301);
        }

        return $next($request);
    }
}
