<?php

namespace App\Filament\Resources\Researchers;

use App\Filament\Resources\Researchers\Pages\CreateResearcher;
use App\Filament\Resources\Researchers\Pages\EditResearcher;
use App\Filament\Resources\Researchers\Pages\ListResearchers;
use App\Filament\Resources\Researchers\Schemas\ResearcherForm;
use App\Filament\Resources\Researchers\Tables\ResearchersTable;
use App\Models\Researcher;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ResearcherResource extends Resource
{
    protected static ?string $model = Researcher::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ResearcherForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ResearchersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListResearchers::route('/'),
            'create' => CreateResearcher::route('/create'),
            'edit' => EditResearcher::route('/{record}/edit'),
        ];
    }
}
