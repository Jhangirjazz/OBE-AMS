<?php

namespace App\Filament\Resources\Plos\Pages;

use App\Filament\Resources\Plos\PloResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPlos extends ListRecords
{
    protected static string $resource = PloResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
