<?php

namespace App\Filament\Resources\Semesters\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SemesterInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('program.name')
                    ->label('Program'),
                TextEntry::make('batch.name')
                    ->label('Batch')
                    ->placeholder('-'),
                TextEntry::make('name'),
                TextEntry::make('sequence')
                    ->numeric(),
                TextEntry::make('start_date')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('end_date')
                    ->date()
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
