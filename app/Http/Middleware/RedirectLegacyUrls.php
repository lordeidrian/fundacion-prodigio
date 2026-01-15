<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectLegacyUrls
{
    /**
     * Mapping of old URLs to new URLs.
     * Format: '/old-path' => '/new-path'
     */
    protected $redirects = [
        '/quienes-somos.html' => '/nosotros',
        '/proyectos.html' => '/nuestro-trabajo',
        '/contacto.html' => '/contacto',
        '/blog.html' => '/blog',
        
    ];

    public function handle(Request $request, Closure $next): Response
    {
        $path = $request->getPathInfo();

        if (array_key_exists($path, $this->redirects)) {
            $newUrl = $this->redirects[$path];
            
            // Preserve Query Strings (UTM, etc.)
            if ($request->getQueryString()) {
                $newUrl .= '?' . $request->getQueryString();
            }

            return redirect($newUrl, 301);
        }

        return $next($request);
    }
}
