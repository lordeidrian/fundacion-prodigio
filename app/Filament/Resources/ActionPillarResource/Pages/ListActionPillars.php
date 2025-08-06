<?php

namespace App\Filament\Resources\ActionPillarResource\Pages;

use App\Filament\Resources\ActionPillarResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListActionPillars extends ListRecords
{
    protected static string $resource = ActionPillarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
