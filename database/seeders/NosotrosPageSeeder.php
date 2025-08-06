<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageSection;
use App\Models\Value;
use App\Models\StrategicLine;
use Illuminate\Support\Facades\DB;

class NosotrosPageSeeder extends Seeder
{
    public function run(): void
    {
        // --- CÓDIGO AÑADIDO PARA LIMPIAR DATOS ANTIGUOS ---
        // Esto hace que el seeder se pueda ejecutar múltiples veces sin errores.
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Desactiva temporalmente la revisión de claves foráneas

        // Borra solo las secciones de la página "nosotros" para no afectar a otras páginas
        PageSection::where('page_name', 'nosotros')->delete();

        // Borra todos los valores y líneas estratégicas existentes
        Value::truncate();
        StrategicLine::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Reactiva la revisión

        // 1. Secciones de Página para "Nosotros"
        PageSection::create([
            'page_name' => 'nosotros', 'section_key' => 'hero',
            'content' => ['title' => 'Nuestra Esencia', 'subtitle' => 'Conoce la historia, los principios y el equipo que impulsan nuestra misión.', 'image_path' => 'page-sections/nosotros-hero.jpg']
        ]);
        PageSection::create([
            'page_name' => 'nosotros', 'section_key' => 'historia_mision',
            'content' => ['title' => 'Quiénes Somos', 'lead_text' => 'Fundación Prodigio fue creada el 29 de marzo de 2023 con el fin de promover el bienestar de personas en condición de vulnerabilidad.', 'main_text' => 'Nuestro propósito es prestar servicios de atención odontológica de calidad y gratuitos. Buscamos promover el goce efectivo del derecho a la salud bucal, que es fundamental para el bienestar general y el desarrollo saludable de la infancia.', 'mission_title' => 'Nuestra Misión', 'mission_text' => 'Garantizar que mujeres embarazadas y niños y niñas de 0 a 3 años, en situación de vulnerabilidad socioeconómica en Paraguay, accedan a una atención odontológica integral y gratuita.', 'image_path' => 'page-sections/nosotros-historia.jpg']
        ]);
        PageSection::create([
            'page_name' => 'nosotros', 'section_key' => 'vision_estrategia',
            'content' => ['title' => 'Nuestra Visión de Futuro', 'lead_text' => 'Aspiramos a ser una organización de referencia en el ámbito de la salud bucodental materna en Paraguay.', 'main_text' => 'Promovemos el acceso universal, gratuito y de calidad a la atención odontológica para mujeres embarazadas en situación de vulnerabilidad, con un impacto positivo y duradero en la salud materno-infantil. Queremos un mundo donde ninguna mujer tenga que elegir entre su salud y sus necesidades básicas.', 'strategy_title' => 'Nuestras Líneas Estratégicas']
        ]);
        PageSection::create([
            'page_name' => 'nosotros', 'section_key' => 'valores',
            'content' => ['title' => 'Nuestros Valores', 'subtitle' => 'Estos son los principios que nos definen y guían cada una de nuestras decisiones y acciones.']
        ]);
        PageSection::create([
            'page_name' => 'nosotros', 'section_key' => 'equipo',
            'content' => ['title' => 'Nuestro Equipo Directivo', 'subtitle' => 'Conoce a los referentes que lideran y guían la visión de la Fundación Prodigio.']
        ]);
        PageSection::create([
            'page_name' => 'nosotros', 'section_key' => 'cta',
            'content' => ['title' => '¿Quieres formar parte del cambio?', 'subtitle' => 'Tu apoyo nos permite llegar a más personas. Contacta con nosotros para explorar formas de colaborar.', 'button_text' => 'Conviértete en Socio', 'button_link' => '/contacto']
        ]);

        // 2. Líneas Estratégicas
        StrategicLine::create(['title' => 'Atención Integral', 'description' => 'Fortalecemos la atención primaria con un enfoque educativo, preventivo y curativo.', 'order' => 1]);
        StrategicLine::create(['title' => 'Rehabilitación', 'description' => 'Rehabilitamos las necesidades odontológicas de las mujeres embarazadas en todas las especialidades.', 'order' => 2]);
        StrategicLine::create(['title' => 'Disminución de Riesgos', 'description' => 'Reducimos los riesgos de partos prematuros y abortos causados por infecciones bucales.', 'order' => 3]);
        StrategicLine::create(['title' => 'Autoestima', 'description' => 'Promovemos la autoestima de las mujeres, ayudándolas a superar problemas odontológicos.', 'order' => 4]);

        // 3. Valores
        Value::create(['title' => 'Equidad', 'description' => 'Trabajamos para reducir las desigualdades en el acceso a la salud, brindando atención gratuita a quienes más lo necesitan.', 'icon' => 'bi bi-bullseye', 'order' => 1]);
        Value::create(['title' => 'Promoción del Derecho a la Salud', 'description' => 'Impulsamos la salud bucal como parte integral del derecho humano a la salud.', 'icon' => 'bi bi-shield-shaded', 'order' => 2]);
        Value::create(['title' => 'Dignidad', 'description' => 'Ofrecemos un trato respetuoso, humano y empático, reconociendo el valor de cada persona.', 'icon' => 'bi bi-person-heart', 'order' => 3]);
        Value::create(['title' => 'Calidad', 'description' => 'Brindamos una atención con altos estándares profesionales, priorizando la seguridad y las buenas prácticas.', 'icon' => 'bi bi-gem', 'order' => 4]);
        Value::create(['title' => 'Compromiso Social', 'description' => 'Nos involucramos activamente en la transformación de la realidad de las comunidades vulnerables.', 'icon' => 'bi bi-people', 'order' => 5]);
        Value::create(['title' => 'Solidaridad y Responsabilidad', 'description' => 'Creemos en la cooperación y el apoyo mutuo, actuando con ética y transparencia para un impacto sostenible.', 'icon' => 'bi bi-patch-check-fill', 'order' => 6]);
    }
}
