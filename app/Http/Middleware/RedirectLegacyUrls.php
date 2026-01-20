<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectLegacyUrls
{
    public function handle(Request $request, Closure $next): Response
    {
        /*
        |--------------------------------------------------------------------------
        | 1) ELIMINAR WORDPRESS LEGACY (410 GONE)
        |--------------------------------------------------------------------------
        */

        // URLs tipo ?p=123
        $p = $request->query('p');

        if (
            ($request->path() === '/' || $request->path() === '')
            && is_string($p)
            && preg_match('/^\d+$/', $p)
            && count($request->query()) === 1
        ) {
            abort(410);
        }

        $path = ltrim($request->path(), '/');

        $wpLegacyPrefixes = [
            'wp-admin',
            'wp-login.php',
            'wp-content',
            'wp-includes',
            'xmlrpc.php',
            'category',
            'tag',
            'feed',
            'comments',
        ];

        foreach ($wpLegacyPrefixes as $prefix) {
            if (str_starts_with($path, $prefix)) {
                abort(410);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | 2) REDIRECCIONES SEO VÁLIDAS (301)
        |--------------------------------------------------------------------------
        */

        // Map de URLs antiguas a nuevas
        $redirects = [
            'proyectos' => '/nuestro-trabajo',
            'noticias'  => '/blog',
        ];

        if (isset($redirects[$path])) {
            return redirect($redirects[$path], 301);
        }

        // Dinámicas
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
