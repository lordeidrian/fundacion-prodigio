<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupportMethodResource\Pages;
use App\Models\SupportMethod;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class SupportMethodResource extends Resource
{
    protected static ?string $model = SupportMethod::class;

    protected static ?string $navigationIcon   = 'heroicon-o-heart';
    protected static ?string $navigationLabel  = 'Métodos de Apoyo';
    protected static ?string $navigationGroup  = 'Secciones';
    protected static ?int    $navigationSort   = 5;
    protected static ?string $modelLabel       = 'Método de Apoyo';
    protected static ?string $pluralModelLabel = 'Métodos de Apoyo';
    protected static ?string $breadcrumb       = 'Métodos de Apoyo';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->label('Título del Método')
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),

            Forms\Components\RichEditor::make('description')
                ->label('Descripción')
                ->required()
                ->columnSpanFull(),

            // Ícono con vista previa y ayuda
            Forms\Components\TextInput::make('icon')
                ->label('Ícono (clase CSS)')
                ->placeholder('Ej: bi bi-building o fa-solid fa-heart')
                ->helperText(new HtmlString(
                    'Podés usar clases de <strong>Bootstrap Icons</strong> (ej: <code>bi bi-building</code>) o <strong>Font Awesome</strong> (ej: <code>fa-solid fa-heart</code>). ' .
                    'Catálogos: <a href="https://icons.getbootstrap.com/" target="_blank">Bootstrap Icons</a> · ' .
                    '<a href="https://fontawesome.com/icons" target="_blank">Font Awesome</a>'
                ))
                ->live()
                ->columnSpanFull(),

            Forms\Components\Placeholder::make('icon_preview')
                ->label('Vista previa')
                ->content(function ($get) {
                    $cls = trim((string) $get('icon'));
                    if ($cls === '') {
                        return new HtmlString('<em>Sin ícono</em>');
                    }
                    return new HtmlString("<div style='padding:6px 0; text-align:start;'><i class='{$cls}' style='font-size:2rem;'></i></div>");
                })
                ->columnSpanFull(),

            Forms\Components\TextInput::make('button_text')
                ->label('Texto del Botón')
                ->required(),

            Forms\Components\TextInput::make('button_link')
                ->label('Enlace del Botón (URL)')
                ->required(),

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

                // Columna de ícono con render HTML
                Tables\Columns\TextColumn::make('icon')
                    ->label('Ícono')
                    ->html()
                    ->formatStateUsing(function (?string $state): HtmlString {
                        if (empty($state)) {
                            return new HtmlString('');
                        }
                        return new HtmlString("<div style='text-align:center;'><i class='{$state}' style='font-size:1.25rem;'></i></div>");
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
            'index'  => Pages\ListSupportMethods::route('/'),
            'create' => Pages\CreateSupportMethod::route('/create'),
            'edit'   => Pages\EditSupportMethod::route('/{record}/edit'),
        ];
    }
}
