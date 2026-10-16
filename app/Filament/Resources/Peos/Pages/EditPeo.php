<?php

namespace App\Filament\Resources\Peos\Pages;

use App\Filament\Resources\Peos\PeoResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPeo extends EditRecord
{
    protected static string $resource = PeoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
