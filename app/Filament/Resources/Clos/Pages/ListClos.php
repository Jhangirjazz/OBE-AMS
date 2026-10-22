<?php

namespace App\Filament\Resources\Clos\Pages;

use App\Filament\Resources\Clos\CloResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListClos extends ListRecords
{
    protected static string $resource = CloResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
