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

    public function setContentAttribute($value): void
    {
        // Aseguramos array
        $data = is_array($value) ? $value : (json_decode($value, true) ?? []);

        $this->attributes['content'] = json_encode(
            $this->normalizeContentRecursively($data),
            JSON_UNESCAPED_UNICODE
        );
    }

    private function normalizeContentRecursively($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $val) {
                // Evitamos limpiar si la clave es "_html" o "_raw"
                if (is_string($key) && preg_match('/(_html|_raw)$/i', $key)) {
                    $data[$key] = $val;
                    continue;
                }
                $data[$key] = $this->normalizeContentRecursively($val);
            }
            return $data;
        }

        if (is_string($data)) {
            return $this->stripSingleParagraph(
                html_entity_decode(trim($data), ENT_QUOTES | ENT_HTML5, 'UTF-8')
            );
        }

        return $data;
    }

    private function stripSingleParagraph(string $html): string
    {
        $trimmed = trim($html);

        if (preg_match('/^<p\b[^>]*>(.*)<\/p>\s*$/is', $trimmed, $m)) {
            $inner = $m[1];
            // Revisamos si hay bloques dentro, si no, quitamos el wrapper
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
