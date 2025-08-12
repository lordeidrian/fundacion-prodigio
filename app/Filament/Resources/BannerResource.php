<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
// Imports necesarios para los nuevos campos
use Filament\Forms\Components\Section;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Banners';
    protected static ?string $navigationGroup = 'Inicio';
    protected static ?int $navigationSort = 1;
    protected static ?string $modelLabel = 'Banner';
    protected static ?string $pluralModelLabel = 'Banners';
    protected static ?string $breadcrumb = 'Banners';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Contenido del Banner')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Título')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(), // El título ocupa todo el ancho
                        Forms\Components\Textarea::make('subtitle') // Cambiado a Textarea para más espacio
                            ->label('Subtítulo')
                            ->maxLength(500),
                        Forms\Components\TextInput::make('button_text')
                            ->label('Texto del Botón')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('button_link')
                            ->label('Enlace del Botón (URL)')
                            ->maxLength(255),
                    ]),

                    Section::make('Imagen y Visibilidad')
                        ->columns(2)
                        ->schema([
                            Forms\Components\FileUpload::make('image_path')
                            ->label('Imagen (sin compresión)')
                            ->directory('banners')
                            ->preserveFilenames()
                            ->image() // Mantenemos la validación de imagen
                            ->optimize(false)
                            ->required(),
                            //->columnSpanFull(), // Ocupa todo el ancho

                            // --- INICIO DE LA MODIFICACIÓN ---
                            Select::make('image_position')
                                ->label('Punto de Enfoque de la Imagen')
                                ->options([
                                    'center top' => 'Arriba',
                                    'center center' => 'Centro (Por defecto)',
                                    'center bottom' => 'Abajo',
                                ])
                                ->default('center center')
                                ->helperText('Elige qué parte de la imagen debe ser visible en el banner.')
                                ->required(),
                            // --- FIN DE LA MODIFICACIÓN ---

                            Forms\Components\Toggle::make('is_active')
                                ->label('Activo')
                                ->default(true),
                            Forms\Components\TextInput::make('order')
                                ->label('Orden de aparición')
                                ->numeric()
                                ->default(0)
                                ->helperText('Un número más bajo aparece primero.'),
                        ]),

                // --- INICIO DE LA NUEVA SECCIÓN DE ESTILOS ---
                Section::make('Estilos del Banner')
                    ->description('Personaliza los colores y la transparencia del texto sobre el banner.')
                    ->columns(3) // Organiza los campos en 3 columnas
                    ->collapsible() // Hace la sección colapsable para no ocupar tanto espacio
                    ->schema([
                        ColorPicker::make('text_color')
                            ->label('Color del Texto')
                            ->default('#FFFFFF')
                            ->required(),

                        ColorPicker::make('box_color')
                            ->label('Color del Recuadro')
                            ->default('#000000')
                            ->required(),

                        TextInput::make('box_opacity')
                            ->label('Opacidad del Recuadro')
                            ->numeric() // Solo permite números
                            ->minValue(0)
                            ->maxValue(1)
                            ->step(0.05) // Define los incrementos para las flechas del campo
                            ->default(0.25)
                            ->helperText('Usa valores de 0 a 1 en incrementos de 0.05 (ej: 0.05, 0.10, 0.50).')
                            ->required(),
                    ]),
                // --- FIN DE LA NUEVA SECCIÓN ---
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')->label('Imagen'),
                Tables\Columns\TextColumn::make('title')->label('Título')->searchable(),
                Tables\Columns\IconColumn::make('is_active')->label('Activo')->boolean(),
                Tables\Columns\TextColumn::make('order')->label('Orden')->sortable(),
            ])
            ->defaultSort('order', 'asc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
