<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PageSection;

class ContactPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PageSection::updateOrCreate(
            ['section_key' => 'informacion_contacto'],
            [
                'content' => [
                    'address' => 'Av. Mariscal López 2525, Asunción, Paraguay',
                    'email' => 'info@fundacionprodigio.org',
                    'phone' => '+595 21 123 456',
                    'map_coordinates' => '-25.296581,-57.573229', // Coordenadas de ejemplo
                ]
            ]
        );
    }
}
