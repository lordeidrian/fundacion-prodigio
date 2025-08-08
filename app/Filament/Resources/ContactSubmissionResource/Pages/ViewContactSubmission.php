<?php

namespace App\Filament\Resources\ContactSubmissionResource\Pages;

use App\Filament\Resources\ContactSubmissionResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions\Action;
use App\Models\ContactSubmission;

class ViewContactSubmission extends ViewRecord
{
    protected static string $resource = ContactSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('markAsRead')
                ->label('Marcar como Leído')
                ->action(function (ContactSubmission $record) {
                    $record->update(['read_at' => now()]);
                    $this->refreshFormData(['read_at']);
                    $this->dispatch('refreshTable');
                })
                ->visible(fn (ContactSubmission $record): bool => is_null($record->read_at)),
            Action::make('markAsUnread')
                ->label('Marcar como No Leído')
                ->action(function (ContactSubmission $record) {
                    $record->update(['read_at' => null]);
                    $this->refreshFormData(['read_at']);
                })
                ->visible(fn (ContactSubmission $record): bool => !is_null($record->read_at)),
        ];
    }

    protected function getHeaderData(): array
    {
        $record = $this->getRecord();
        if ($record && is_null($record->read_at)) {
            $record->markAsRead();
        }
        return parent::getHeaderData();
    }
}
