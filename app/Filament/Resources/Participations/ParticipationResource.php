<?php

namespace App\Filament\Resources\Participations;

use App\Filament\Resources\Participations\Pages\CreateParticipation;
use App\Filament\Resources\Participations\Pages\EditParticipation;
use App\Filament\Resources\Participations\Pages\ListParticipations;
use App\Filament\Resources\Participations\Schemas\ParticipationForm;
use App\Filament\Resources\Participations\Tables\ParticipationsTable;
use App\Models\Participation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ParticipationResource extends Resource
{
    protected static ?string $model = Participation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'participaciones';

    public static function form(Schema $schema): Schema
    {
        return ParticipationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ParticipationsTable::configure($table);
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
            'index' => ListParticipations::route('/'),
            'create' => CreateParticipation::route('/create'),
            'edit' => EditParticipation::route('/{record}/edit'),
        ];
    }
}
