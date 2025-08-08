<?php

    namespace App\Filament\Resources;

    use App\Filament\Resources\ImpactStatResource\Pages;
    use App\Models\ImpactStat;
    use Filament\Forms;
    use Filament\Forms\Form;
    use Filament\Resources\Resource;
    use Filament\Tables;
    use Filament\Tables\Table;

    class ImpactStatResource extends Resource
    {
        protected static ?string $model = ImpactStat::class;
        protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
        protected static ?string $navigationLabel = 'Cifras de Impacto';
        protected static ?string $navigationGroup = 'Proyectos'; // Para agrupar en el menú
        protected static ?int $navigationSort = 3; // Orden en el menú
        protected static ?string $modelLabel = 'Proyecto';
        protected static ?string $pluralModelLabel = 'Proyectos';
        protected static ?string $breadcrumb = 'Proyectos';

        public static function form(Form $form): Form
        {
            return $form
                ->schema([
                    Forms\Components\TextInput::make('value')->label('Valor (Número o Texto)')->required(),
                    Forms\Components\TextInput::make('label')->label('Descripción')->required(),
                    Forms\Components\TextInput::make('icon')->label('Ícono (Opcional)'),
                    Forms\Components\TextInput::make('order')->numeric()->default(0),
                    Forms\Components\Toggle::make('is_active')->default(true),
                ]);
        }

        public static function table(Table $table): Table
        {
            return $table
                ->columns([
                    Tables\Columns\TextColumn::make('value')->label('Valor'),
                    Tables\Columns\TextColumn::make('label')->label('Descripción'),
                    Tables\Columns\TextColumn::make('order')->sortable(),
                    Tables\Columns\IconColumn::make('is_active')->boolean()->label('Activo'),
                ])
                ->defaultSort('order', 'asc')
                ->actions([Tables\Actions\EditAction::make(),])
                ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make(),]),]);
        }

        public static function getPages(): array
        {
            return [
                'index' => Pages\ListImpactStats::route('/'),
                'create' => Pages\CreateImpactStat::route('/create'),
                'edit' => Pages\EditImpactStat::route('/{record}/edit'),
            ];
        }
    }
