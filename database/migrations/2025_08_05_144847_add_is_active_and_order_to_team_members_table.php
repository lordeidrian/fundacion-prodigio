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
            Schema::table('team_members', function (Blueprint $table) {
                // Añadimos las nuevas columnas al final de la tabla para evitar errores.
                $table->unsignedTinyInteger('order')->default(0);
                $table->boolean('is_active')->default(true);
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::table('team_members', function (Blueprint $table) {
                // Esto permite revertir la migración si es necesario
                $table->dropColumn(['order', 'is_active']);
            });
        }
    };
