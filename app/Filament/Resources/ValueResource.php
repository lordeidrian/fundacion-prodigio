<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ValueResource\Pages;
use App\Models\Value;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class ValueResource extends Resource
{
    protected static ?string $model = Value::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationLabel = 'Valores';
    protected static ?string $navigationGroup = 'Nosotros';
    protected static ?int    $navigationSort = 3;
    protected static ?string $modelLabel = 'Valor';
    protected static ?string $pluralModelLabel = 'Valores';
    protected static ?string $breadcrumb = 'Valores';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->label('Título')
                ->required()
                ->maxLength(120)
                ->columnSpanFull(),

            Forms\Components\Textarea::make('description')
                ->label('Descripción')
                ->rows(3)
                ->columnSpanFull(),

            // --- Selector de ícono con vista previa + hint con links ---
            Forms\Components\TextInput::make('icon')
                ->label('Ícono (clase CSS)')
                ->placeholder('Ej: bi bi-heart o fa-solid fa-heart')
                ->helperText(new HtmlString(
                    'Usa clases de <strong>Bootstrap Icons</strong> (ej. <code>bi bi-heart</code>) o <strong>Font Awesome</strong> (ej. <code>fa-solid fa-heart</code>).
                    Catálogo: <a href="https://fontawesome.com/icons" target="_blank" rel="noopener noreferrer">Font Awesome</a> ·
                    <a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener noreferrer">Bootstrap Icons</a>.'
                ))
                ->live() // refresca el preview al tipear
                ->columnSpanFull(),

            Forms\Components\Placeholder::make('icon_preview')
                ->label('Vista previa')
                ->content(function ($get) {
                    $cls = trim((string)$get('icon'));
                    if ($cls === '') {
                        return new HtmlString('<em>Sin ícono</em>');
                    }
                    // Muestra el <i> con las clases ingresadas
                    return new HtmlString("<div style='padding:6px 0'><i class='{$cls}' style='font-size:2rem;'></i></div>");
                })
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
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->searchable(),

                // --- Columna con preview del ícono (igual estilo que en ActionPillarResource) ---
                Tables\Columns\TextColumn::make('icon')
                    ->label('Ícono')
                    ->html()
                    ->formatStateUsing(function (?string $state): HtmlString {
                        if (empty($state)) {
                            return new HtmlString('');
                        }
                        return new HtmlString("<div style='text-align:center;'><i class='{$state}' style='font-size:1.5rem;'></i></div>");
                    }),

                Tables\Columns\TextColumn::make('order')
                    ->label('Orden')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean(),
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

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListValues::route('/'),
            'create' => Pages\CreateValue::route('/create'),
            'edit'   => Pages\EditValue::route('/{record}/edit'),
        ];
    }
}
