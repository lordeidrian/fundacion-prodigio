<?php
// app/Models/Testimonial.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_name',
        'author_context',
        'quote',
        'is_visible',
        'media_type',
        'image_path',
        'video_url',   // YouTube
        'poster_path', // opcional
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];

    /* ---- Helpers de medio ---- */
    public function getMediaIsImageAttribute(): bool
    {
        return $this->media_type === 'image' && $this->image_path;
    }

    public function getMediaIsYoutubeAttribute(): bool
    {
        return $this->media_type === 'youtube' && $this->video_url;
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->image_path ? asset('storage/'.$this->image_path) : null;
    }

    public function getPosterUrlAttribute(): ?string
    {
        return $this->poster_path ? asset('storage/'.$this->poster_path) : null;
    }

    /* ---- YouTube helpers ---- */
    public function getYoutubeIdAttribute(): ?string
    {
        if (!$this->video_url) return null;
        $url = $this->video_url;

        // Captura ID desde youtu.be, watch?v=, embed/, shorts/
        if (preg_match('~(?:youtu\.be/|youtube\.com/(?:watch\?v=|embed/|shorts/))([\w\-]{11})~i', $url, $m)) {
            return $m[1];
        }
        // fallback: si viene ?v= como query
        $parts = parse_url($url);
        if (!empty($parts['query'])) {
            parse_str($parts['query'], $q);
            if (!empty($q['v']) && preg_match('~^[\w\-]{11}$~', $q['v'])) {
                return $q['v'];
            }
        }
        return null;
    }

    public function getYoutubeEmbedUrlAttribute(): ?string
    {
        return $this->youtube_id ? 'https://www.youtube.com/embed/'.$this->youtube_id : null;
    }

    public function getYoutubeThumbUrlAttribute(): ?string
    {
        // Si tenés poster propio, usalo primero
        if ($this->poster_url) return $this->poster_url;
        return $this->youtube_id ? 'https://img.youtube.com/vi/'.$this->youtube_id.'/hqdefault.jpg' : null;
    }
}
