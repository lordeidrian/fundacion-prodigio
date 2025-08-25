<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class SupportMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'button_text',
        'button_link',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order'     => 'integer',
    ];

    /**
     * description: limpia <p> al guardar.
     */
    protected function description(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                if (!is_string($value)) {
                    return $value;
                }

                $value = html_entity_decode(trim($value), ENT_QUOTES | ENT_HTML5, 'UTF-8');

                if (preg_match('/^<p>(.*)<\/p>$/s', $value)) {
                    $value = preg_replace('/^<p>(.*)<\/p>$/s', '$1', $value);
                }

                $value = preg_replace('/<\/?p[^>]*>/i', '', $value);


                return $value;
            },
        );
    }
}
