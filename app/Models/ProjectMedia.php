<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class ProjectMedia extends Model
    {
        use HasFactory;
        protected $table = 'project_media';
        protected $fillable = ['project_id', 'type', 'path', 'video_url', 'caption', 'order'];
    }
