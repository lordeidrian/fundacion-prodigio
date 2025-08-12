<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('support_methods', function (Blueprint $table) {
            // Añadimos la columna para el ícono después de la descripción
            $table->string('icon')->default('bi-heart-pulse')->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('support_methods', function (Blueprint $table) {
            $table->dropColumn('icon');
        });
    }
};
