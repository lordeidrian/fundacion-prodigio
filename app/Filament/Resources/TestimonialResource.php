<?php
// app/Filament/Resources/TestimonialResource.php
namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Testimonios';
    protected static ?string $navigationGroup = 'Secciones';
    protected static ?string $modelLabel = 'Testimonio';
    protected static ?string $pluralModelLabel = 'Testimonios';
    protected static ?string $breadcrumb = 'Testimonios';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('author_name')
                ->label('Autor / Nombre')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('author_context')
                ->label('Cargo / Contexto')
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make('quote')
                ->label('Testimonio (cita)')
                ->required()
                ->rows(4)
                ->columnSpanFull(),

            Forms\Components\Fieldset::make('Multimedia (opcional)')
                ->schema([
                    Forms\Components\Select::make('media_type')
                        ->label('Tipo de medio')
                        ->options([
                            'none'    => 'Sin medio',
                            'image'   => 'Imagen',
                            'youtube' => 'Video (YouTube URL)',
                        ])
                        ->default('none')
                        ->native(false)
                        ->live(),

                    // Imagen
                    Forms\Components\FileUpload::make('image_path')
                        ->label('Imagen')
                        ->directory('testimonials/images')
                        ->image()
                        ->imageEditor()
                        ->imagePreviewHeight('180')
                        ->maxSize(4096)
                        ->visible(fn (Get $get) => $get('media_type') === 'image')
                        ->required(fn (Get $get) => $get('media_type') === 'image'),

                    // YouTube URL
                    Forms\Components\TextInput::make('video_url')
                        ->label('URL de YouTube')
                        ->placeholder('https://www.youtube.com/watch?v=XXXXXXXXXXX')
                        ->visible(fn (Get $get) => $get('media_type') === 'youtube')
                        ->required(fn (Get $get) => $get('media_type') === 'youtube')
                        ->rule('url')
                        ->helperText('Admite enlaces de youtu.be, watch?v=, shorts, embed'),

                    // Poster opcional (si querés sobreescribir la miniatura)
                    Forms\Components\FileUpload::make('poster_path')
                        ->label('Poster / Thumbnail (opcional)')
                        ->directory('testimonials/posters')
                        ->image()
                        ->imagePreviewHeight('140')
                        ->maxSize(4096)
                        ->visible(fn (Get $get) => $get('media_type') === 'youtube'),
                ])
                ->columns(2)
                ->columnSpanFull(),

            Forms\Components\Toggle::make('is_visible')
                ->label('Visible')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
                Tables\Columns\TextColumn::make('author_name')
                    ->label('Autor')
                    ->searchable(),

                Tables\Columns\TextColumn::make('author_context')
                    ->label('Contexto')
                    ->toggleable(),

                Tables\Columns\BadgeColumn::make('media_type')
                    ->label('Medio')
                    ->colors([
                        'secondary' => 'none',
                        'success'   => 'image',
                        'info'      => 'youtube',
                    ])
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'image' => 'Imagen',
                        'youtube' => 'YouTube',
                        default => 'Sin medio',
                    }),

                // Preview: si es imagen, muestra imagen; si es YouTube, muestra thumb
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Preview')
                    ->square()
                    ->visible(fn ($record) => $record?->media_type === 'image'),

                Tables\Columns\ImageColumn::make('youtube_thumb_url')
                    ->label('Preview')
                    ->getStateUsing(fn ($record) => $record?->youtube_thumb_url)
                    ->square()
                    ->visible(fn ($record) => $record?->media_type === 'youtube'),

                Tables\Columns\IconColumn::make('is_visible')
                    ->label('Visible')
                    ->boolean(),
            ])
            ->defaultSort('id', 'desc')
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
            'index'  => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit'   => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}

