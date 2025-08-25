<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_name',
        'section_key',
        'content',
    ];

    protected $casts = [
        'content' => 'array',
    ];

    /**
     * Cualquier asignación a content (create/update) pasa por acá.
     * - Recorre recursivamente el array.
     * - Para todo string, decodifica entidades y QUITA el <p> envolvente si es un solo párrafo.
     * - No toca contenidos "ricos" (múltiples párrafos/listas/tablas).
     * - Opt-out: si la clave termina en "_html" o "_raw", NO limpia ese valor.
     */
    public function setContentAttribute($value): void
    {
        $data = is_array($value) ? $value : (json_decode($value, true) ?? []);
        $this->attributes['content'] = $this->normalizeContentRecursively($data);
    }

    /** -------- Helpers privados -------- */

    private function normalizeContentRecursively($data)
    {
        if (is_array($data)) {
            $normalized = [];
            foreach ($data as $key => $val) {
                // Opt-out por nombre de clave
                if (is_string($key) && $this->isHtmlOptOutKey($key)) {
                    $normalized[$key] = $val; // lo dejamos tal cual
                    continue;
                }
                $normalized[$key] = $this->normalizeContentRecursively($val);
            }
            return $normalized;
        }

        if (is_string($data)) {
            return $this->stripSingleParagraph(html_entity_decode(trim($data), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
        }

        return $data;
    }

    private function isHtmlOptOutKey(string $key): bool
    {
        // si la clave termina con _html o _raw, no limpiamos
        return (bool) preg_match('/(_html|_raw)$/i', $key);
    }

    /**
     * Si el string es exactamente "<p>…</p>", devuelve el inner.
     * Si tiene múltiples bloques (<p>, <ul>, <table>, <h1>…), lo deja intacto.
     */
    private function stripSingleParagraph(string $html): string
    {
        $trimmed = trim($html);

        // ¿Es solo un <p>…</p>?
        if (preg_match('/^<p\b[^>]*>(.*)<\/p>\s*$/is', $trimmed, $m)) {
            $inner = $m[1];

            // ¿Dentro hay más bloques? Si los hay, no tocamos
            $hasMoreBlocks = preg_match(
                '/<(p|div|ul|ol|li|table|thead|tbody|tr|td|h[1-6]|blockquote)\b/i',
                $inner
            );
            if (!$hasMoreBlocks) {
                return trim($inner);
            }
        }

        return $html;
    }
}
