<?php

namespace App\Filament\Resources\Peos\Pages;

use App\Filament\Resources\Peos\PeoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPeos extends ListRecords
{
    protected static string $resource = PeoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
