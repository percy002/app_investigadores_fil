<?php

namespace App\Filament\Resources\Participations\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class ParticipationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('project_id')
                    ->label('Proyecto')
                    ->relationship('project', 'title')
                    ->required(),
                Select::make('researcher_id')
                    ->label('Investigador')
                    ->relationship('researcher', 'first_name')
                    ->required(),
                Select::make('role')
                    ->label('Rol')
                    ->options([
                        'INVESTIGADOR_PRINCIPAL' => 'Investigador Principal',
                        'COINVESTIGADOR' => 'Coinvestigador',
                        'ASISTENTE' => 'Asistente',
                    ])
                    ->required(),
                Select::make('status')
                    ->label('Estado')
                    ->options([
                        'ACTIVO' => 'Activo',
                        'INACTIVO' => 'Inactivo',
                    ])
                    ->required()
                    ->default('ACTIVO'),
            ]);
    }
}
