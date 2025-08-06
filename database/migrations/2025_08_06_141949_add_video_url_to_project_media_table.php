<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        public function up(): void
        {
            Schema::table('project_media', function (Blueprint $table) {
                // Make 'path' nullable since it's only for images
                $table->text('path')->nullable()->change();
                // Add the new column for video URLs
                $table->string('video_url')->nullable()->after('path');
            });
        }

        public function down(): void
        {
            Schema::table('project_media', function (Blueprint $table) {
                $table->text('path')->nullable(false)->change();
                $table->dropColumn('video_url');
            });
        }
    };
