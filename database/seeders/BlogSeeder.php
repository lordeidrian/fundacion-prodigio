<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Crear usuario autor (o usar el existente si ya hay uno)
        $author = User::firstOrCreate(
            ['email' => 'admin@fundacionprodigio.org'],
            [
                'name' => 'Fundación Prodigio',
                'password' => bcrypt('12345678'), // Cambia esto por una contraseña segura
            ]
        );

        // 2. Crear Categorías
        $catNoticia = Category::firstOrCreate(['name' => 'Noticia', 'slug' => 'noticia']);
        $catEvento = Category::firstOrCreate(['name' => 'Evento', 'slug' => 'evento']);
        $catBlog = Category::firstOrCreate(['name' => 'Blog Informativo', 'slug' => 'blog-informativo']);

        // 3. Crear Etiquetas
        $tagSalud = Tag::firstOrCreate(['name' => 'Salud Bucal', 'slug' => 'salud-bucal']);
        $tagComunidad = Tag::firstOrCreate(['name' => 'Comunidad', 'slug' => 'comunidad']);
        $tagDonaciones = Tag::firstOrCreate(['name' => 'Donaciones', 'slug' => 'donaciones']);
        $tagPrevencion = Tag::firstOrCreate(['name' => 'Prevención', 'slug' => 'prevencion']);
        $tagAlianzas = Tag::firstOrCreate(['name' => 'Alianzas', 'slug' => 'alianzas']);

        // 4. Crear 5 Posts de ejemplo
        $posts = [
            [
                'title' => 'Inauguramos con éxito nuestro Centro Odontológico Integral',
                'excerpt' => 'Con la presencia de autoridades y socios estratégicos, dimos apertura oficial a nuestro COI en Luque, un hito para la salud comunitaria.',
                'content' => '<p>El pasado mes de marzo celebramos un momento histórico para nuestra fundación: la inauguración del Centro Odontológico Integral (COI). Este centro, equipado con tecnología de punta, nos permitirá duplicar nuestra capacidad de atención y ofrecer un servicio de excelencia a cientos de familias.</p><p>Agradecemos a todos los que hicieron posible este sueño.</p>',
                'category_id' => $catNoticia->id,
                'tags' => [$tagComunidad, $tagAlianzas]
            ],
            [
                'title' => 'Jornada de Salud Bucal en el Bañado Sur: Más de 100 sonrisas atendidas',
                'excerpt' => 'Nuestro equipo de voluntarios se trasladó al corazón del Bañado Sur para una jornada intensiva de prevención y atención primaria.',
                'content' => '<p>Durante todo el sábado, nuestro equipo de odontólogos y voluntarios brindó atención gratuita, flúor y kits de higiene a más de 100 niños y madres de la comunidad. Estas jornadas son vitales para llevar la prevención a quienes más lo necesitan.</p>',
                'category_id' => $catEvento->id,
                'tags' => [$tagComunidad, $tagPrevencion, $tagSalud]
            ],
            [
                'title' => 'La importancia de la salud dental durante el embarazo',
                'excerpt' => '¿Sabías que las enfermedades de las encías pueden estar relacionadas con partos prematuros? Te contamos por qué es crucial el cuidado odontológico en esta etapa.',
                'content' => '<h3>¿Por qué es tan importante?</h3><p>Durante el embarazo, los cambios hormonales pueden hacer que las encías sean más susceptibles a la inflamación y el sangrado (gingivitis gestacional). Si no se trata, puede evolucionar a periodontitis, una infección grave que se ha asociado con riesgos como parto prematuro y bajo peso al nacer. Cuidar tu boca es cuidar a tu bebé.</p>',
                'category_id' => $catBlog->id,
                'tags' => [$tagSalud, $tagPrevencion]
            ],
            [
                'title' => 'Lanzamos nuestra campaña anual de recaudación de fondos',
                'excerpt' => 'Bajo el lema "Tu ayuda, una sonrisa sana", iniciamos nuestra campaña anual para asegurar la sostenibilidad de nuestros programas. ¡Cada aporte cuenta!',
                'content' => '<p>Este año, nuestra meta es recaudar los fondos necesarios para garantizar un año completo de tratamientos para 200 nuevas beneficiarias del programa "Embarazo Sonriente". Tu donación se traduce directamente en insumos, salarios de profesionales y mantenimiento de nuestros equipos. ¡Súmate!</p>',
                'category_id' => $catNoticia->id,
                'tags' => [$tagDonaciones, $tagComunidad]
            ],
            [
                'title' => 'Consejos para el primer cepillado de dientes de tu bebé',
                'excerpt' => 'El cuidado bucal debe empezar incluso antes de que aparezca el primer diente. Te damos una guía práctica para empezar con el pie derecho.',
                'content' => '<p>Desde limpiar las encías con una gasa húmeda hasta elegir el cepillo y la pasta dental adecuados, los primeros pasos son fundamentales. En este artículo te guiamos para que el cepillado sea un momento positivo y efectivo para la salud de tu bebé.</p>',
                'category_id' => $catBlog->id,
                'tags' => [$tagSalud, $tagPrevencion]
            ],
        ];

        foreach ($posts as $postData) {
            $post = Post::create([
                'title' => $postData['title'],
                'slug' => Str::slug($postData['title']),
                'excerpt' => $postData['excerpt'],
                'content' => $postData['content'],
                'featured_image' => 'posts/placeholder.jpg', // Usa una imagen placeholder
                'category_id' => $postData['category_id'],
                'user_id' => $author->id,
                'status' => 'published',
            ]);

            // Sincronizar las etiquetas
            $tagIds = collect($postData['tags'])->pluck('id');
            $post->tags()->sync($tagIds);
        }
    }
}
