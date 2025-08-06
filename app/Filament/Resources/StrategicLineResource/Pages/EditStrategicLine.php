<?php

namespace App\Filament\Resources\StrategicLineResource\Pages;

use App\Filament\Resources\StrategicLineResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStrategicLine extends EditRecord
{
    protected static string $resource = StrategicLineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
