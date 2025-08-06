<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StrategicLineResource\Pages;
use App\Models\StrategicLine;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StrategicLineResource extends Resource
{
    protected static ?string $model = StrategicLine::class;
    protected static ?string $navigationIcon = 'heroicon-o-map';
    protected static ?string $navigationLabel = 'Líneas Estratégicas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required()->maxLength(255)->columnSpanFull(),
                Forms\Components\RichEditor::make('description')->required()->columnSpanFull(),
                Forms\Components\TextInput::make('order')->numeric()->default(0),
                Forms\Components\Toggle::make('is_active')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('order')->sortable(),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
            ])
            ->defaultSort('order', 'asc')
            ->actions([Tables\Actions\EditAction::make(),])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make(),]),]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStrategicLines::route('/'),
            'create' => Pages\CreateStrategicLine::route('/create'),
            'edit' => Pages\EditStrategicLine::route('/{record}/edit'),
        ];
    }
}
