<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\PostResource;
use App\Models\Post;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestPostsWidget extends BaseWidget
{
    protected static ?int $sort = 2; // Para que aparezca debajo de las estadísticas
    protected static ?string $heading = 'Últimas Publicaciones';
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Post::latest()->take(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Título'),
                Tables\Columns\TextColumn::make('author.name')
                    ->label('Autor'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de Publicación')
                    ->date('d/m/Y'),
            ])
            ->actions([
                Tables\Actions\Action::make('Editar')
                    ->url(fn (Post $record): string => PostResource::getUrl('edit', ['record' => $record])),
            ]);
    }
}
