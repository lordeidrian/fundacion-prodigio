<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LegacySeoMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // WordPress legacy: /?p=123
        if ($request->query->has('p')) {
            abort(410);
        }

        $path = ltrim($request->path(), '/'); // por seguridad

        // Rutas típicas de WordPress/feeds/taxonomías
        $legacyPrefixes = [
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

        foreach ($legacyPrefixes as $prefix) {
            if (str_starts_with($path, $prefix)) {
                abort(410);
            }
        }

        return $next($request);
    }
}
