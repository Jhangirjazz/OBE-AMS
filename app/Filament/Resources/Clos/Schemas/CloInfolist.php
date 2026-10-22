<?php

namespace App\Filament\Resources\Clos\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CloInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('courseOffering.id')
                    ->label('Course offering'),
                TextEntry::make('code'),
                TextEntry::make('description')
                    ->columnSpanFull(),
                TextEntry::make('bloom_domain'),
                TextEntry::make('bloom_level'),
                TextEntry::make('target_percent')
                    ->numeric(),
                TextEntry::make('approval_status'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
