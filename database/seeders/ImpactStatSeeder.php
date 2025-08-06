<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use App\Models\ImpactStat;

    class ImpactStatSeeder extends Seeder
    {
        public function run(): void
        {
            ImpactStat::truncate();
            ImpactStat::create(['value' => '67', 'label' => 'Beneficiarios Atendidos', 'order' => 1]);
            ImpactStat::create(['value' => '14', 'label' => 'Pacientes dados de Alta', 'order' => 2]);
            ImpactStat::create(['value' => '3', 'label' => 'Alianzas con ONGs', 'order' => 3]);
            ImpactStat::create(['value' => '16', 'label' => 'Empresas Colaboradoras', 'order' => 4]);
        }
    }
