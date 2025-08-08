<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamMemberResource\Pages;
use App\Models\TeamMember;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TeamMemberResource extends Resource
{
    protected static ?string $model = TeamMember::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Miembros del Equipo';
    protected static ?string $navigationGroup = 'Nosotros'; // Agrupación en el menú
    protected static ?int $navigationSort = 7; // Orden en el menú
    protected static ?string $modelLabel = 'Miembro';
    protected static ?string $pluralModelLabel = 'Miembros del Equipo';
    protected static ?string $breadcrumb = 'Miembros del Equipo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nombre Completo')
                    ->required(),
                Forms\Components\TextInput::make('position')
                    ->label('Cargo / Posición')
                    ->required(),
                Forms\Components\RichEditor::make('description')
                    ->label('Biografía Corta')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image_path') // <-- Corregido de 'photo' a 'image_path'
                    ->label('Fotografía')
                    ->image()
                    ->directory('team-photos'),
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
                Tables\Columns\ImageColumn::make('image_path')->label('Foto'), // <-- Corregido de 'photo' a 'image_path'
                Tables\Columns\TextColumn::make('name')->label('Nombre')->searchable(),
                Tables\Columns\TextColumn::make('position')->label('Cargo'),
                Tables\Columns\TextColumn::make('order')->label('Orden')->sortable(),
                Tables\Columns\IconColumn::make('is_active')->label('Activo')->boolean(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeamMembers::route('/'),
            'create' => Pages\CreateTeamMember::route('/create'),
            'edit' => Pages\EditTeamMember::route('/{record}/edit'),
        ];
    }
}
