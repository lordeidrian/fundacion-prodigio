<?php

namespace App\Filament\Resources\SupportMethodResource\Pages;

use App\Filament\Resources\SupportMethodResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSupportMethod extends EditRecord
{
    protected static string $resource = SupportMethodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
