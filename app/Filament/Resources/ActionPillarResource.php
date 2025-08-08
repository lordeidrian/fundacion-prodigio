<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActionPillarResource\Pages;
use App\Models\ActionPillar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;
use App\Filament\Forms\Components\CustomIconPicker; // Mantenemos el componente simplificado

class ActionPillarResource extends Resource
{
    protected static ?string $model = ActionPillar::class;

    protected static ?string $navigationIcon = 'heroicon-o-command-line';
    protected static ?string $navigationLabel = 'Pilares de Acción';
    protected static ?string $navigationGroup = 'Inicio';
    protected static ?int $navigationSort = 2;
    protected static ?string $modelLabel = 'Pilar de Acción';
    protected static ?string $pluralModelLabel = 'Pilares de Acción';
    protected static ?string $breadcrumb = 'Pilares de Acción';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Título del Pilar')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('description')
                    ->label('Descripción')
                    ->required()
                    ->columnSpanFull(),

                // Usamos nuestro componente simplificado
                CustomIconPicker::make('icon')
                    ->label('Ícono')
                    // 'live()' es importante para que la previsualización funcione
                    ->live()
                    ->columnSpanFull(),

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

                // --- CORRECCIÓN EN LA COLUMNA DE ÍCONO ---
                Tables\Columns\TextColumn::make('icon')
                    ->label('Ícono')
                    ->html()
                    ->formatStateUsing(function (?string $state): HtmlString {
                        // Verificamos si hay un ícono antes de mostrarlo
                        if (empty($state)) {
                            return new HtmlString('');
                        }
                        // Corregido: ya no añade 'bi-' dos veces
                        return new HtmlString("<div style='text-align: center;'><i class='bi {$state}' style='font-size: 1.5rem;'></i></div>");
                    }),
                // --- FIN DE LA CORRECCIÓN ---

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

    // El resto del archivo no necesita cambios...
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
