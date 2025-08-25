<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageSectionResource\Pages;
use App\Models\PageSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class PageSectionResource extends Resource
{
    protected static ?string $model = PageSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Secciones de Página';
    protected static ?string $navigationGroup = 'Contenido Web'; // Renombrado para más claridad
    protected static ?int $navigationSort = 1;
    protected static ?string $modelLabel = 'Sección de Página';
    protected static ?string $pluralModelLabel = 'Secciones de Página';
    protected static ?string $breadcrumb = 'Secciones de Página';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('section_key')
                    ->label('Identificador de la Sección')
                    ->disabled()
                    ->dehydrated()
                    ->live(),

                // --- INICIO DE CAMPOS CONDICIONALES ---

                Forms\Components\TextInput::make('content.title')
                    ->label('Título de la Sección')
                    ->columnSpanFull()
                    ->visible(fn (Get $get): bool => in_array($get('section_key'), [
                        'pilares_accion', 'quienes_somos', 'vistazo_trabajo', 'ultimas_noticias', 'sumate_causa',
                        'hero', 'historia_mision', 'vision_estrategia', 'valores', 'equipo', 'cta',
                        'impacto', 'nuestra_alianza' // <-- Añadido de "proyectos"
                    ])),

                Forms\Components\TextInput::make('content.subtitle')
                    ->label('Subtítulo / Texto Corto')
                    ->columnSpanFull()
                    ->visible(fn (Get $get): bool => in_array($get('section_key'), [
                        'pilares_accion', 'quienes_somos', 'vistazo_trabajo', 'ultimas_noticias',
                        'hero', 'valores', 'equipo', 'cta',
                        'impacto', 'nuestra_alianza' // <-- Añadido de "proyectos"
                    ])),

                Forms\Components\Textarea::make('content.lead_text')
                    ->label('Texto de Introducción (Lead)')
                    ->columnSpanFull()
                    ->visible(fn (Get $get): bool => in_array($get('section_key'), ['historia_mision', 'vision_estrategia'])),

                Forms\Components\RichEditor::make('content.main_text')
                    ->label('Texto Principal')
                    ->columnSpanFull()
                    ->visible(fn (Get $get): bool => in_array($get('section_key'), ['historia_mision', 'vision_estrategia'])),

                Forms\Components\RichEditor::make('content.text')
                    ->label('Texto General / Párrafo')
                    ->columnSpanFull()
                    ->visible(fn (Get $get): bool => in_array($get('section_key'), ['quienes_somos', 'sumate_causa'])),

                Forms\Components\TextInput::make('content.mission_title')
                    ->label('Título de Misión')
                    ->columnSpanFull()
                    ->visible(fn (Get $get): bool => $get('section_key') === 'historia_mision'),

                Forms\Components\RichEditor::make('content.mission_text')
                    ->label('Texto de Misión')
                    ->columnSpanFull()
                    ->visible(fn (Get $get): bool => $get('section_key') === 'historia_mision'),

                Forms\Components\TextInput::make('content.strategy_title')
                    ->label('Título de Líneas Estratégicas')
                    ->columnSpanFull()
                    ->visible(fn (Get $get): bool => $get('section_key') === 'vision_estrategia'),

                Forms\Components\FileUpload::make('content.image_path')
                    ->label('Imagen de la Sección')
                    ->image()->directory('page-sections')
                    ->columnSpanFull()
                    ->visible(fn (Get $get): bool => in_array($get('section_key'), ['quienes_somos', 'hero', 'historia_mision', 'nuestra_alianza'])),

                Forms\Components\TextInput::make('content.button_text')
                    ->label('Texto del Botón')
                    ->visible(fn (Get $get): bool => in_array($get('section_key'), ['quienes_somos', 'cta'])),

                Forms\Components\TextInput::make('content.button_link')
                    ->label('Enlace del Botón (URL o ruta interna)')
                    ->visible(fn (Get $get): bool => in_array($get('section_key'), ['quienes_somos', 'cta'])),

                // --- CAMPOS AÑADIDOS PARA 'informacion_contacto' ---
                Forms\Components\TextInput::make('content.address')
                    ->label('Dirección')
                    ->columnSpanFull()
                    ->visible(fn (Get $get): bool => $get('section_key') === 'informacion_contacto'),

                Forms\Components\TextInput::make('content.email')
                    ->label('Correo Electrónico')
                    ->email()
                    ->visible(fn (Get $get): bool => $get('section_key') === 'informacion_contacto'),

                Forms\Components\TextInput::make('content.phone')
                    ->label('Teléfono')
                    ->tel()
                    ->visible(fn (Get $get): bool => $get('section_key') === 'informacion_contacto'),

                Forms\Components\TextInput::make('content.map_coordinates')
                    ->label('Coordenadas del Mapa (lat,lng)')
                    ->visible(fn (Get $get): bool => $get('section_key') === 'informacion_contacto'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('section_key')->label('Identificador de Sección')->searchable(),
                Tables\Columns\TextColumn::make('page_name')->label('Página')->badge(),
            ])
            ->filters([
                SelectFilter::make('page_name')
                    ->label('Filtrar por Página')
                    ->options(fn (): array => PageSection::query()->pluck('page_name', 'page_name')->all())
            ])
            ->actions([Tables\Actions\EditAction::make(),])
            ->bulkActions([]);
    }

    public static function canCreate(): bool { return false; }
    public static function canDelete(\Illuminate\Database\Eloquent\Model $record): bool { return false; }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPageSections::route('/'),
            'edit' => Pages\EditPageSection::route('/{record}/edit'),
        ];
    }
}
