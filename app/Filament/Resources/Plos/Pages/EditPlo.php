<?php

namespace App\Filament\Resources\Plos\Pages;

use App\Filament\Resources\Plos\PloResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPlo extends EditRecord
{
    protected static string $resource = PloResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
