<?php

namespace App\Filament\Resources\StrategicLineResource\Pages;

use App\Filament\Resources\StrategicLineResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStrategicLines extends ListRecords
{
    protected static string $resource = StrategicLineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
