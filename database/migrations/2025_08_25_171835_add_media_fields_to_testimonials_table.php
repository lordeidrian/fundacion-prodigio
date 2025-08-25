<?php
// database/migrations/2025_08_25_000000_update_testimonials_media_youtube_only.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('testimonials', function (Blueprint $t) {
            // tipo de medio: none | image | youtube
            if (!Schema::hasColumn('testimonials', 'media_type')) {
                $t->enum('media_type', ['none','image','youtube'])->default('none');
            } else {
                $t->enum('media_type', ['none','image','youtube'])->default('none')->change();
            }

            if (!Schema::hasColumn('testimonials', 'image_path')) {
                $t->string('image_path')->nullable();
            }
            if (!Schema::hasColumn('testimonials', 'video_url')) {
                $t->string('video_url')->nullable(); // YouTube URL
            }
            if (!Schema::hasColumn('testimonials', 'poster_path')) {
                $t->string('poster_path')->nullable(); // opcional (thumbnail propio)
            }

            // Si tenías columnas de video-file, podés dropearlas:
            if (Schema::hasColumn('testimonials', 'video_path')) {
                $t->dropColumn('video_path');
            }
        });
    }

    public function down(): void
    {
        Schema::table('testimonials', function (Blueprint $t) {
            // reversa simple (dejamos columnas nuevas; opcionalmente podrías restaurar video_path)
            // $t->string('video_path')->nullable();
        });
    }
};
