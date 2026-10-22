<?php

namespace App\Filament\Resources\CourseOfferings\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CourseOfferingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('course_id')
                    ->relationship('course', 'title')
                    ->required(),
                Select::make('semester_id')
                    ->relationship('semester', 'name')
                    ->required(),
                Select::make('instructor_id')
                    ->relationship('instructor', 'name'),
                TextInput::make('section')
                    ->required()
                    ->default('A'),
                TextInput::make('status')
                    ->required()
                    ->default('active'),
            ]);
    }
}
