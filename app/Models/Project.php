<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id', 'title', 'slug', 'excerpt', 'content', 'featured_image', 'status', 'order'
    ];

    /**
     * Get the parent project.
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'parent_id');
    }

    /**
     * Get the children (sub-projects).
     */
    public function children(): HasMany
    {
        return $this->hasMany(Project::class, 'parent_id')->orderBy('order');
    }
    public function media(): HasMany
    {
        return $this->hasMany(ProjectMedia::class)->orderBy('order');
    }
}
