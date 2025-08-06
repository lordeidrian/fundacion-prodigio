<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Banner;
use App\Models\ActionPillar;
use App\Models\SupportMethod;
use App\Models\PageSection;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpiamos las tablas para evitar duplicados si se corre varias veces
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Banner::truncate();
        ActionPillar::truncate();
        SupportMethod::truncate();
        PageSection::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // --- 1. Poblar Banners ---
        Banner::create([
            'title' => 'Construyendo un futuro más saludable para Paraguay',
            'subtitle' => 'Impulsamos el bienestar de comunidades vulnerables, garantizando el acceso a una salud digna y de calidad como un derecho fundamental para todos.',
            'button_text' => 'Súmate a la causa',
            'button_link' => '#compromiso',
            'image_path' => 'banners/banner-1.jpg', // Asumiendo que las imágenes estarán en storage/app/public/banners
            'order' => 1,
            'is_active' => true,
        ]);

        Banner::create([
            'title' => 'Unidos por la salud de cada niño y madre',
            'subtitle' => 'Nuestros programas se enfocan en la atención preventiva y el cuidado integral durante las etapas más cruciales de la vida.',
            'button_text' => 'Nuestros Proyectos',
            'button_link' => '/proyectos',
            'image_path' => 'banners/banner-2.jpg',
            'order' => 2,
            'is_active' => true,
        ]);

        Banner::create([
            'title' => 'Tecnología y calidad humana a tu servicio',
            'subtitle' => 'Conoce nuestro Centro Odontológico Integral, equipado para brindar la mejor atención a quienes más lo necesitan.',
            'button_text' => 'Conoce el COI',
            'button_link' => '/proyectos',
            'image_path' => 'banners/banner-3.jpg',
            'order' => 3,
            'is_active' => true,
        ]);

        // --- 2. Poblar Pilares de Acción ---
        ActionPillar::create([
            'title' => 'Salud Materno-Infantil',
            'description' => 'Enfocamos nuestros esfuerzos en la salud de madres y niños en sus primeros años, una etapa crucial para un desarrollo pleno y saludable.',
            'icon' => 'bi bi-heart-pulse',
            'order' => 1,
            'is_active' => true,
        ]);

        ActionPillar::create([
            'title' => 'Atención Gratuita y de Calidad',
            'description' => 'Rompemos las barreras económicas ofreciendo servicios integrales y gratuitos con los más altos estándares profesionales y un trato digno.',
            'icon' => 'bi bi-shield-check',
            'order' => 2,
            'is_active' => true,
        ]);

        ActionPillar::create([
            'title' => 'Compromiso Comunitario',
            'description' => 'Nos involucramos activamente para transformar la realidad de las comunidades vulnerables, trabajando en conjunto con ellas y nuestros socios.',
            'icon' => 'bi bi-people-fill',
            'order' => 3,
            'is_active' => true,
        ]);

        // --- 3. Poblar Métodos de Apoyo ---
        SupportMethod::create([
            'title' => 'Alianzas Corporativas',
            'description' => 'Colabora con nosotros para generar un impacto social significativo y fortalecer el compromiso de tu empresa con la comunidad.',
            'button_text' => 'Conviértete en Socio',
            'button_link' => '/contacto',
            'order' => 1,
            'is_active' => true,
        ]);

        SupportMethod::create([
            'title' => 'Realiza una Donación',
            'description' => 'Tu aporte, sin importar el monto, se convierte directamente en atención médica, tratamientos y esperanza para muchas familias.',
            'button_text' => 'Donar ahora',
            'button_link' => '/donar', // Asumiendo que tendrás una página de donación
            'order' => 2,
            'is_active' => true,
        ]);

        // --- 4. Poblar Secciones de Página (JSON) ---
        PageSection::create([
            'page_name' => 'inicio',
            'section_key' => 'pilares_accion',
            'content' => [
                'title' => 'Nuestros Pilares de Acción',
                'subtitle' => 'Nuestra labor se fundamenta en tres compromisos clave que guían cada uno de nuestros proyectos y alianzas.',
            ]
        ]);

        PageSection::create([
            'page_name' => 'inicio',
            'section_key' => 'quienes_somos',
            'content' => [
                'title' => '¿Quiénes somos?',
                'subtitle' => 'Fundación Prodigio nació en 2023 con un propósito claro: ser un agente de cambio para el bienestar de quienes más lo necesitan en Paraguay.',
                'text' => 'Creemos que el acceso a la salud es un derecho humano y trabajamos incansablemente para crear soluciones sostenibles que generen un impacto positivo y duradero. Nuestra visión es ser una organización de referencia que promueva el acceso universal y equitativo a la salud.',
                'image_path' => 'page-sections/fundacion-equipo.jpg',
                'button_text' => 'Conocer más sobre nosotros',
                'button_link' => '/nosotros',
            ]
        ]);

        PageSection::create([
            'page_name' => 'inicio',
            'section_key' => 'vistazo_trabajo',
            'content' => [
                'title' => 'Un Vistazo a Nuestro Trabajo',
                'subtitle' => 'Nuestra misión es transformar vidas a través de acciones concretas.',
            ]
        ]);

        PageSection::create([
            'page_name' => 'inicio',
            'section_key' => 'ultimas_noticias',
            'content' => [
                'title' => 'Últimas Noticias y Eventos',
                'subtitle' => 'Mantente al día con nuestras actividades más recientes.',
            ]
        ]);

        PageSection::create([
            'page_name' => 'inicio',
            'section_key' => 'sumate_causa',
            'content' => [
                'title' => 'Súmate a Nuestra Causa',
                'text' => 'Tu apoyo es fundamental para que podamos seguir brindando atención de calidad a quienes más lo necesitan. Hay muchas formas de colaborar y ser parte del cambio.',
            ]
        ]);
    }
}
