<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Hidden;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationLabel = 'Proyectos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Project')->tabs([
                    Forms\Components\Tabs\Tab::make('Contenido Principal')
                        ->schema([
                            Select::make('parent_id')->label('Proyecto Principal (Padre)')->relationship('parent', 'title')->searchable(),
                            TextInput::make('title')->label('Título del Proyecto')->required()->live(onBlur: true)->afterStateUpdated(fn (Forms\Set $set, ?string $state) => $set('slug', Str::slug($state))),
                            TextInput::make('slug')->required()->unique(ignoreRecord: true),
                            Textarea::make('excerpt')->label('Resumen Corto (para listados)')->columnSpanFull(),
                            RichEditor::make('content')->label('Contenido Completo del Proyecto')->columnSpanFull(),
                        ]),
                    Forms\Components\Tabs\Tab::make('Imágenes y Videos')
                        ->schema([
                            FileUpload::make('featured_image')->label('Imagen Destacada Principal')->image()->directory('projects'),

                            Repeater::make('media')
                                ->label('Galería Multimedia')
                                ->relationship()
                                ->schema([
                                    Select::make('type')
                                        ->label('Tipo de Medio')
                                        ->options([
                                            'image' => 'Imagen',
                                            'video' => 'Video (YouTube)',
                                        ])
                                        ->required()
                                        ->live()
                                        // --- INICIO DE LA CORRECCIÓN ---
                                        ->afterStateUpdated(function (Forms\Set $set, $state) {
                                            // Reinicia el valor del otro campo para evitar conflictos
                                            if ($state === 'image') {
                                                $set('video_url', null);
                                            } elseif ($state === 'video') {
                                                $set('path', null);
                                            }
                                        }),
                                        // --- FIN DE LA CORRECCIÓN ---
                                    FileUpload::make('path')
                                        ->label('Subir Imagen')
                                        ->directory('project-gallery')
                                        ->visible(fn ($get) => $get('type') === 'image'),
                                    TextInput::make('video_url')
                                        ->label('URL de YouTube')
                                        ->visible(fn ($get) => $get('type') === 'video'),
                                    TextInput::make('caption')->label('Leyenda (opcional)'),
                                ])
                                ->columns(2)
                        ]),
                    Forms\Components\Tabs\Tab::make('Configuración')
                        ->schema([
                            Select::make('status')->options(['published' => 'Publicado', 'draft' => 'Borrador'])->default('published'),
                            TextInput::make('order')->label('Orden')->numeric()->default(0),
                        ]),
                ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Título')->searchable(),
                Tables\Columns\TextColumn::make('parent.title')->label('Proyecto Padre')->badge(),
                Tables\Columns\TextColumn::make('status')->label('Estado')->badge(),
                Tables\Columns\TextColumn::make('order')->label('Orden')->sortable(),
            ])
            ->defaultSort('order', 'asc')
            ->actions([Tables\Actions\EditAction::make(),])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make(),]),]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
