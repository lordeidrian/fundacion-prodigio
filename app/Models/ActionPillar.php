<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionPillar extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'order',
        'is_active',
    ];

    protected $casts = [
        'order'     => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Normaliza la descripción al GUARDAR:
     * - Decodifica entidades (&lt;p&gt; → <p>)
     * - Quita el <p> ... </p> envolvente si es un solo párrafo
     *   (si hay múltiples párrafos/listas, lo deja igual)
     */
    public function setDescriptionAttribute($value): void
    {
        if (!is_string($value)) {
            $this->attributes['description'] = $value;
            return;
        }

        $value = html_entity_decode(trim($value), ENT_QUOTES | ENT_HTML5, 'UTF-8');

        // Si es exactamente un único <p>...</p>, quitar wrapper
        if (preg_match('/^<p\b[^>]*>(.*)<\/p>\s*$/is', $value, $m)) {
            $inner = $m[1];

            // Si adentro NO hay más bloques, entonces sí quitamos <p>
            $hasMoreBlocks = preg_match(
                '/<(p|div|ul|ol|li|table|thead|tbody|tr|td|h[1-6]|blockquote)\b/i',
                $inner
            );
            if (!$hasMoreBlocks) {
                $value = trim($inner);
            }
        }

        $this->attributes['description'] = $value;
    }
}
