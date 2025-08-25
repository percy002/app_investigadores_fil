<?php

namespace App\Filament\Resources\Researchers\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class ResearcherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 TextInput::make('dni')
                    ->label('DNI')
                    ->required()
                    ->unique()
                    ->length(8),
                TextInput::make('first_name')
                    ->label('Nombre')
                    ->required(),
                TextInput::make('last_name_father')
                    ->label('Apellido paterno')
                    ->required(),
                TextInput::make('last_name_mother')
                    ->label('Apellido materno')
                    ->required(),
                TextInput::make('academic_department')
                    ->label('Departamento académico'),
            ]);
    }
}
