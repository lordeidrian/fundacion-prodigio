<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactSubmissionResource\Pages; // <-- Importante restaurar esta línea
use App\Models\ContactSubmission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;

class ContactSubmissionResource extends Resource
{
    protected static ?string $model = ContactSubmission::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationLabel = 'Mensajes Recibidos';
    protected static ?string $navigationGroup = 'Contacto';
    protected static ?string $modelLabel = 'Mensaje';
    protected static ?string $pluralModelLabel = 'Mensajes Recibidos';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->label('Nombre')->disabled(),
                Forms\Components\TextInput::make('email')->label('Email')->disabled(),
                Forms\Components\TextInput::make('subject')->label('Asunto')->disabled()->columnSpanFull(),
                Forms\Components\Textarea::make('message')->label('Mensaje')->disabled()->columnSpanFull()->rows(10),
                Forms\Components\Placeholder::make('created_at')
                    ->label('Recibido el')
                    ->content(fn ($record) => $record->created_at->format('d/m/Y H:i')),
                Forms\Components\Placeholder::make('read_at')
                    ->label('Leído el')
                    ->content(fn ($record) => $record->read_at ? $record->read_at->format('d/m/Y H:i') : 'No leído'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nombre')->searchable(),
                TextColumn::make('subject')->label('Asunto')->searchable(),
                TextColumn::make('created_at')->label('Recibido el')->dateTime()->sortable(),
                BadgeColumn::make('read_at')
                    ->label('Estado')
                    ->formatStateUsing(fn ($state): string => $state ? 'Leído' : 'No Leído')
                    ->colors([
                        'success' => 'Leído',
                        'danger' => 'No Leído',
                    ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(), // También puedes añadir el botón de borrar
            ])
            ->bulkActions([
                BulkAction::make('markAsRead')
                    ->label('Marcar como Leído')
                    ->action(fn (Collection $records) => $records->each->update(['read_at' => now()]))
                    ->icon('heroicon-o-check-circle'),
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    // --- CORRECCIÓN FINAL AQUÍ ---
    // Restauramos este método para que apunte a la página que acabamos de crear
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactSubmissions::route('/'),
            // No necesitamos una página de 'view' separada, la acción de la tabla lo maneja
        ];
    }
}
