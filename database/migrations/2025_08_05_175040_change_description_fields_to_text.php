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
        // Usamos el método change() para modificar las columnas existentes a TEXT
        Schema::table('action_pillars', function (Blueprint $table) {
            $table->text('description')->change();
        });
        Schema::table('support_methods', function (Blueprint $table) {
            $table->text('description')->change();
        });
        Schema::table('values', function (Blueprint $table) {
            $table->text('description')->change();
        });
        Schema::table('strategic_lines', function (Blueprint $table) {
            $table->text('description')->change();
        });
        Schema::table('team_members', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Esto permite revertir los cambios si es necesario
        Schema::table('action_pillars', function (Blueprint $table) {
            $table->string('description')->change();
        });
        Schema::table('support_methods', function (Blueprint $table) {
            $table->string('description')->change();
        });
        Schema::table('values', function (Blueprint $table) {
            $table->string('description')->change();
        });
        Schema::table('strategic_lines', function (Blueprint $table) {
            $table->string('description')->change();
        });
        Schema::table('team_members', function (Blueprint $table) {
            $table->string('description')->nullable()->change();
        });
    }
};
