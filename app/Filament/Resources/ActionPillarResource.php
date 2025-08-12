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

class ActionPillarResource extends Resource
{
    protected static ?string $model = ActionPillar::class;

    protected static ?string $navigationIcon   = 'heroicon-o-command-line';
    protected static ?string $navigationLabel  = 'Pilares de Acción';
    protected static ?string $navigationGroup  = 'Inicio';
    protected static ?int    $navigationSort   = 2;
    protected static ?string $modelLabel       = 'Pilar de Acción';
    protected static ?string $pluralModelLabel = 'Pilares de Acción';
    protected static ?string $breadcrumb       = 'Pilares de Acción';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->label('Título del Pilar')
                ->required()
                ->maxLength(150)
                ->columnSpanFull(),

            Forms\Components\RichEditor::make('description')
                ->label('Descripción')
                ->required()
                ->columnSpanFull(),

            Forms\Components\TextInput::make('icon')
                ->label('Ícono (clase CSS)')
                ->helperText(new HtmlString(
                    'Podés usar clases de <strong>Bootstrap Icons</strong> (ej: <code>bi bi-heart</code>) o <strong>Font Awesome</strong> (ej: <code>fa-solid fa-heart</code>). ' .
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
            'index'  => Pages\ListActionPillars::route('/'),
            'create' => Pages\CreateActionPillar::route('/create'),
            'edit'   => Pages\EditActionPillar::route('/{record}/edit'),
        ];
    }
}
