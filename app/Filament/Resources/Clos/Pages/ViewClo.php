<?php

namespace App\Filament\Resources\Clos\Pages;

use App\Filament\Resources\Clos\CloResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewClo extends ViewRecord
{
    protected static string $resource = CloResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
