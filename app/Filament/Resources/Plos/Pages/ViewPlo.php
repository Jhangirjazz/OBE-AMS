<?php

namespace App\Filament\Resources\Plos\Pages;

use App\Filament\Resources\Plos\PloResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPlo extends ViewRecord
{
    protected static string $resource = PloResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
