<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    protected $fillable = ['name', 'email', 'subject', 'message', 'read_at'];

    // --- AÑADE ESTE BLOQUE DE CÓDIGO ---
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'read_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    // --- FIN DEL BLOQUE AÑADIDO ---
}
