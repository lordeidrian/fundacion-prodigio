<?php

namespace App\Filament\Resources\ActionPillarResource\Pages;

use App\Filament\Resources\ActionPillarResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditActionPillar extends EditRecord
{
    protected static string $resource = ActionPillarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
