<?php

namespace App\Filament\Resources\Courses\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CourseInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('program.name')
                    ->label('Program'),
                TextEntry::make('code'),
                TextEntry::make('title'),
                TextEntry::make('credit_hours')
                    ->numeric(),
                TextEntry::make('theory_hours')
                    ->numeric(),
                TextEntry::make('lab_hours')
                    ->numeric(),
                TextEntry::make('category'),
                TextEntry::make('semester_no')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('outline_path')
                    ->placeholder('-'),
                TextEntry::make('status'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
