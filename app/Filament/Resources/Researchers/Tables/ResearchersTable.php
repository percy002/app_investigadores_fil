<?php

namespace App\Filament\Resources\Researchers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class ResearchersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('dni')
                    ->label('DNI')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('first_name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('last_name_father')
                    ->label('Apellido paterno')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('last_name_mother')
                    ->label('Apellido materno')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('academic_department')
                    ->label('Departamento académico')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}   
