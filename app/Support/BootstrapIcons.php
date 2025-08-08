<?php
// app/Support/BootstrapIcons.php

namespace App\Support;

use Illuminate\Support\Facades\Cache;

class BootstrapIcons
{
    public static function all(): array
    {
        // Guardamos en caché por 24 horas para un rendimiento óptimo
        return Cache::remember('bootstrap-icons-list', 60 * 24, function () {
            $path = resource_path('data/bootstrap-icons.json');

            if (!file_exists($path)) {
                return []; // Devuelve vacío si el archivo no existe
            }

            $json = file_get_contents($path);

            return json_decode($json, true) ?? []; // Devuelve el array o uno vacío si hay error
        });
    }
}
