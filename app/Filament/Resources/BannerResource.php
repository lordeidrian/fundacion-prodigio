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
                            ->label('Imagen')
                            ->directory('banners')
                            ->preserveFilenames()
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios(['16:9', '4:3']) // Permite seleccionar entre diferentes relaciones de aspecto
                            ->imageEditorViewportWidth(1920) // Opcional
                            ->imageEditorViewportHeight(1080) // Opcional
                            ->imageEditorQuality(90), // Controla el % de calidad
                        Forms\Components\Toggle::make('is_active')
                            ->label('Activo')
                            ->helperText('Si está inactivo, no se mostrará en la página.')
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
