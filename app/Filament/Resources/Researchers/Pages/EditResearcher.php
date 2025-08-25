<?php

namespace App\Filament\Resources\Researchers\Pages;

use App\Filament\Resources\Researchers\ResearcherResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditResearcher extends EditRecord
{
    protected static string $resource = ResearcherResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
