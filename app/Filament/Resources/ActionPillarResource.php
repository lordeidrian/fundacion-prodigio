<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActionPillarResource\Pages;
use App\Models\ActionPillar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ActionPillarResource extends Resource
{
    protected static ?string $model = ActionPillar::class;

    protected static ?string $navigationIcon = 'heroicon-o-command-line';
    protected static ?string $navigationLabel = 'Pilares de Acción'; // Nombre en el menú

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Título del Pilar')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(), // Ocupa todo el ancho
                Forms\Components\RichEditor::make('description')
                    ->label('Descripción')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('icon')
                    ->label('Ícono (Opcional)')
                    ->helperText('Ej: nombre de clase de FontAwesome, o ruta a un ícono.'),
                Forms\Components\TextInput::make('order')
                    ->label('Orden')
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('is_active')
                    ->label('Activo')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Título')->searchable(),
                Tables\Columns\TextColumn::make('order')->label('Orden')->sortable(),
                Tables\Columns\IconColumn::make('is_active')->label('Activo')->boolean(),
            ])
            ->defaultSort('order', 'asc')
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    // No necesitas tocar el resto del archivo
    public static function getRelations(): array { return []; }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActionPillars::route('/'),
            'create' => Pages\CreateActionPillar::route('/create'),
            'edit' => Pages\EditActionPillar::route('/{record}/edit'),
        ];
    }
}
