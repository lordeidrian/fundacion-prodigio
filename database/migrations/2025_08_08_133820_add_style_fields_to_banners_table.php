<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->string('text_color')->default('#FFFFFF')->after('button_link');
            $table->string('box_color')->default('#000000')->after('text_color');
            $table->decimal('box_opacity', 3, 2)->default(0.25)->after('box_color');
        });
    }

    public function down(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn(['text_color', 'box_color', 'box_opacity']);
        });
    }
};
