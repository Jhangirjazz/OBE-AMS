<?php

namespace App\Filament\Resources\Courses\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;


class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('program_id')
                    ->relationship('program', 'name')
                    ->required(),
                TextInput::make('code')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('credit_hours')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('theory_hours')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('lab_hours')
                    ->required()
                    ->numeric()
                    ->default(0),
                Select::make('category')
                        ->options([
                            'core' => 'Core',
                            'elective' => 'Elective',
                            'lab' => 'Lab',
                            'project' => 'Project',
                        ])
                        ->default('core')
                        ->required(),
                TextInput::make('semester_no')
                    ->numeric(),
                TextInput::make('outline_path'),
                TextInput::make('status')
                    ->required()
                    ->default('active'),
            ]);
    }
}
