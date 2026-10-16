<?php

namespace App\Filament\Resources\Peos\Pages;

use App\Filament\Resources\Peos\PeoResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPeo extends ViewRecord
{
    protected static string $resource = PeoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
