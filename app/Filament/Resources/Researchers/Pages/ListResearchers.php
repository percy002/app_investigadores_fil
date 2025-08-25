<?php

namespace App\Filament\Resources\Researchers\Pages;

use App\Filament\Resources\Researchers\ResearcherResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListResearchers extends ListRecords
{
    protected static string $resource = ResearcherResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
