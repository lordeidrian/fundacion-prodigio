<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use App\Models\Project;
use App\Models\TeamMember;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total de Posts', Post::count())
                ->description('Publicaciones en el blog')
                ->icon('heroicon-o-document-text')
                ->color('success'),
            Stat::make('Total de Proyectos', Project::count())
                ->description('Programas y componentes')
                ->icon('heroicon-o-briefcase')
                ->color('info'),
            Stat::make('Miembros del Equipo', TeamMember::count())
                ->description('Registrados en el sistema')
                ->icon('heroicon-o-users')
                ->color('warning'),
        ];
    }
}
