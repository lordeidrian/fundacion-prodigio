<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('page_sections', function (Blueprint $table) {
            // 1. Eliminamos el índice único antiguo que solo afectaba a 'section_key'
            $table->dropUnique('page_sections_section_key_unique');

            // 2. Creamos un nuevo índice único compuesto que afecta a ambas columnas
            $table->unique(['page_name', 'section_key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_sections', function (Blueprint $table) {
            // Esto permite revertir los cambios si es necesario
            $table->dropUnique(['page_name', 'section_key']);
            $table->unique('section_key', 'page_sections_section_key_unique');
        });
    }
};
