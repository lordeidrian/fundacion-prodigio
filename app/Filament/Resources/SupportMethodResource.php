<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupportMethodResource\Pages;
use App\Models\SupportMethod;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SupportMethodResource extends Resource
{
    protected static ?string $model = SupportMethod::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static ?string $navigationLabel = 'Métodos de Apoyo'; // Nombre en el menú
    protected static ?string $navigationGroup = 'Secciones';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Título del Método')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('description')
                    ->label('Descripción')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('button_text')
                    ->label('Texto del Botón')
                    ->required(),
                Forms\Components\TextInput::make('button_link')
                    ->label('Enlace del Botón (URL)')
                    ->required(),
                    // ->url(), // Valida que sea una URL
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
            'index' => Pages\ListSupportMethods::route('/'),
            'create' => Pages\CreateSupportMethod::route('/create'),
            'edit' => Pages\EditSupportMethod::route('/{record}/edit'),
        ];
    }
}
