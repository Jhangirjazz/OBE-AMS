<?php

namespace App\Filament\Resources\Semesters\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SemesterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('program_id')
                    ->relationship('program', 'name')
                    ->required(),
                Select::make('batch_id')
                    ->relationship('batch', 'name'),
                TextInput::make('name')
                    ->required(),
                TextInput::make('sequence')
                    ->required()
                    ->numeric()
                    ->default(1),
                DatePicker::make('start_date'),
                DatePicker::make('end_date'),
                TextInput::make('status')
                    ->required()
                    ->default('active'),
            ]);
    }
}
