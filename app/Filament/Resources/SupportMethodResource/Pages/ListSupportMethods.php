<?php

namespace App\Filament\Resources\SupportMethodResource\Pages;

use App\Filament\Resources\SupportMethodResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSupportMethods extends ListRecords
{
    protected static string $resource = SupportMethodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
