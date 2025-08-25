<?php

namespace App\Filament\Resources\Participations\Pages;

use App\Filament\Resources\Participations\ParticipationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListParticipations extends ListRecords
{
    protected static string $resource = ParticipationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
