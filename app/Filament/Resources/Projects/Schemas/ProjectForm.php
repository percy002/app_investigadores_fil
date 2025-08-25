<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->label('Código')
                    ->required()
                    ->unique()
                    ->maxLength(50),
                TextInput::make('title')
                    ->label('Título')
                    ->required()
                    ->maxLength(255),
                TextInput::make('research_line')
                    ->label('Línea de investigación')
                    ->required()
                    ->maxLength(255),
                TextInput::make('research_area')
                    ->label('Área de investigación')
                    ->required()
                    ->maxLength(255),
                Select::make('status')
                    ->label('Estado')
                    ->options([
                        'EN_PROCESO' => 'En proceso',
                        'FINALIZADO' => 'Finalizado',
                        'SUSPENDIDO' => 'Suspendido',
                    ])
                    ->required()
                    ->default('EN_PROCESO'),
            ]);
    }
}
