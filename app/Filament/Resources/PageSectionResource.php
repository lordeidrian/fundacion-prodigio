<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageSectionResource\Pages;
use App\Models\PageSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class PageSectionResource extends Resource
{
    protected static ?string $model = PageSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Secciones de Página';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('section_key')
                    ->label('Identificador de la Sección')
                    ->disabled()
                    ->dehydrated(),

                // --- CAMPOS CON VISIBILIDAD CONDICIONAL ACTUALIZADA ---

                Forms\Components\TextInput::make('content.title')
                    ->label('Título de la Sección')
                    ->columnSpanFull()
                    ->visible(fn (Get $get): bool => in_array($get('section_key'), [
                        // Claves de 'inicio'
                        'pilares_accion', 'quienes_somos', 'vistazo_trabajo', 'ultimas_noticias', 'sumate_causa',
                        // Claves de 'nosotros'
                        'hero', 'historia_mision', 'vision_estrategia', 'valores', 'equipo', 'cta'
                    ])),

                Forms\Components\TextInput::make('content.subtitle')
                    ->label('Subtítulo / Texto Corto')
                    ->columnSpanFull()
                    ->visible(fn (Get $get): bool => in_array($get('section_key'), [
                        // Claves de 'inicio'
                        'pilares_accion', 'quienes_somos', 'vistazo_trabajo', 'ultimas_noticias',
                        // Claves de 'nosotros'
                        'hero', 'valores', 'equipo', 'cta'
                    ])),

                // Campo "Lead Text" para las secciones de historia y visión
                Forms\Components\Textarea::make('content.lead_text')
                    ->label('Texto de Introducción (Lead)')
                    ->columnSpanFull()
                    ->visible(fn (Get $get): bool => in_array($get('section_key'), ['historia_mision', 'vision_estrategia'])),

                // Campo "Main Text" para las secciones de historia y visión
                Forms\Components\RichEditor::make('content.main_text')
                    ->label('Texto Principal')
                    ->columnSpanFull()
                    ->visible(fn (Get $get): bool => in_array($get('section_key'), ['historia_mision', 'vision_estrategia'])),

                // Campo "Mission Title"
                Forms\Components\TextInput::make('content.mission_title')
                    ->label('Título de Misión')
                    ->columnSpanFull()
                    ->visible(fn (Get $get): bool => $get('section_key') === 'historia_mision'),

                // Campo "Mission Text"
                Forms\Components\RichEditor::make('content.mission_text')
                    ->label('Texto de Misión')
                    ->columnSpanFull()
                    ->visible(fn (Get $get): bool => $get('section_key') === 'historia_mision'),

                // Campo "Strategy Title"
                Forms\Components\TextInput::make('content.strategy_title')
                    ->label('Título de Líneas Estratégicas')
                    ->columnSpanFull()
                    ->visible(fn (Get $get): bool => $get('section_key') === 'vision_estrategia'),

                Forms\Components\FileUpload::make('content.image_path')
                    ->label('Imagen de la Sección')
                    ->image()->directory('page-sections')
                    ->getUploadedFileNameForStorageUsing(fn (TemporaryUploadedFile $file): string => Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . time() . '.' . $file->getClientOriginalExtension())
                    ->columnSpanFull()
                    ->visible(fn (Get $get): bool => in_array($get('section_key'), ['quienes_somos', 'hero', 'historia_mision'])),

                Forms\Components\TextInput::make('content.button_text')
                    ->label('Texto del Botón')
                    ->visible(fn (Get $get): bool => in_array($get('section_key'), ['quienes_somos', 'cta'])),

                Forms\Components\TextInput::make('content.button_link')
                    ->label('Enlace del Botón (URL o ruta interna)')
                    ->visible(fn (Get $get): bool => in_array($get('section_key'), ['quienes_somos', 'cta'])),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('section_key')->label('Identificador de Sección')->searchable(),
                Tables\Columns\TextColumn::make('page_name')->label('Página'),
            ])
            ->filters([
                SelectFilter::make('page_name')
                    ->label('Filtrar por Página')
                    ->options([
                        'inicio' => 'Inicio',
                        'nosotros' => 'Nosotros',
                        'proyectos' => 'Proyectos',
                        'noticias' => 'Noticias',
                        'contacto' => 'Contacto',
                    ])
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
