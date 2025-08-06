<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\PageSection;
use Illuminate\Support\Facades\DB; // <-- Importar DB

class ProjectsPageSeeder extends Seeder
{
    public function run(): void
    {
        // --- CÓDIGO AÑADIDO PARA LIMPIAR DATOS ANTIGUOS ---
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Borra solo las secciones de la página "proyectos"
        PageSection::where('page_name', 'proyectos')->delete();

        // Borra todos los proyectos existentes para evitar duplicados
        Project::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Secciones de la página "Nuestro Trabajo"
        PageSection::create(['page_name' => 'proyectos', 'section_key' => 'hero', 'content' => ['title' => 'Nuestro Trabajo', 'subtitle' => 'Conoce los proyectos e iniciativas que transforman nuestra misión en acciones concretas.']]);
        PageSection::create(['page_name' => 'proyectos', 'section_key' => 'impacto', 'content' => ['title' => 'Nuestro Impacto en Cifras', 'subtitle' => 'Estos son los resultados que hemos alcanzado gracias al esfuerzo conjunto con nuestros socios y la comunidad.']]);
        PageSection::create(['page_name' => 'proyectos', 'section_key' => 'alianzas', 'content' => ['title' => 'Nuestras Alianzas Estratégicas', 'subtitle' => 'Trabajamos de la mano con líderes del sector para amplificar nuestro impacto.']]);
        PageSection::create(['page_name' => 'proyectos', 'section_key' => 'cta', 'content' => ['title' => 'Únete a Nosotros', 'subtitle' => 'Tu apoyo nos permite seguir creciendo. ¡Sé parte del cambio!', 'button_text' => 'Contactar para colaborar', 'button_link' => '/contacto']]);

        // Proyecto Principal
        $parentProject = Project::create([
            'title' => 'Programa "Embarazo Sonriente"',
            'slug' => 'programa-embarazo-sonriente',
            'excerpt' => 'Creemos que la salud debe comenzar desde la concepción. Este programa integral es nuestra respuesta a una necesidad crítica en Paraguay.',
            'content' => '<p>Durante el embarazo, las mujeres atraviesan cambios que aumentan el riesgo de enfermedades bucales, afectando su bienestar y el del bebé. En Paraguay, el <strong>90% de las embarazadas no recibe tratamiento odontológico</strong> y el <strong>70% de los niños inicia su escolarización con caries</strong>.</p><p>"Embarazo Sonriente" nace para garantizar atención gratuita, oportuna y de calidad a mujeres de escasos recursos, combinando atención clínica con educación y acompañamiento a través de sus componentes clave.</p>',
            'featured_image' => 'projects/embarazo-sonriente.jpg',
            'order' => 1,
        ]);

        // Sub-Proyectos
        Project::create([
            'parent_id' => $parentProject->id,
            'title' => 'Centro Odontológico Integral (COI)',
            'slug' => 'centro-odontologico-integral-coi',
            'excerpt' => 'El corazón de nuestras operaciones, una clínica modelo inaugurada en marzo de 2024 en Luque.',
            'content' => '<p>Para hacer realidad nuestro proyecto, construimos y pusimos en funcionamiento el COI. Fue diseñada con criterios de accesibilidad, seguridad y excelencia.</p><ul><li><strong>9 consultorios</strong> equipados con tecnología de vanguardia.</li><li>Áreas de <strong>esterilización</strong> de primer nivel y <strong>laboratorio dental</strong> propio.</li></ul>',
            'featured_image' => 'projects/coi.jpg',
            'order' => 1,
        ]);

        Project::create([
            'parent_id' => $parentProject->id,
            'title' => 'Educación y Prevención',
            'slug' => 'educacion-y-prevencion',
            'excerpt' => 'Empoderamos a las futuras madres a través del conocimiento para un cuidado bucal sostenible.',
            'content' => '<p>La atención clínica es solo una parte de la solución. Nuestro componente educativo es clave para un impacto a largo plazo.</p><ul><li>Talleres sobre higiene bucal durante el embarazo.</li><li>Acompañamiento y seguimiento personalizado a cada beneficiaria.</li></ul>',
            'featured_image' => 'projects/educacion.jpg',
            'order' => 2,
        ]);
    }
}
