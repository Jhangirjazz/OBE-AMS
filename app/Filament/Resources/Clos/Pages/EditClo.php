<?php

namespace App\Filament\Resources\Clos\Pages;

use App\Filament\Resources\Clos\CloResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditClo extends EditRecord
{
    protected static string $resource = CloResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
