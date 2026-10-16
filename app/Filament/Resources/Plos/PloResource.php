<?php

namespace App\Filament\Resources\Plos;

use App\Filament\Resources\Plos\Pages\CreatePlo;
use App\Filament\Resources\Plos\Pages\EditPlo;
use App\Filament\Resources\Plos\Pages\ListPlos;
use App\Filament\Resources\Plos\Pages\ViewPlo;
use App\Filament\Resources\Plos\Schemas\PloForm;
use App\Filament\Resources\Plos\Schemas\PloInfolist;
use App\Filament\Resources\Plos\Tables\PlosTable;
use App\Models\Plo;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PloResource extends Resource
{
    protected static ?string $model = Plo::class;
    protected static string|UnitEnum|null $navigationGroup = 'OBE Framework';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PloForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PloInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PlosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPlos::route('/'),
            'create' => CreatePlo::route('/create'),
            'view' => ViewPlo::route('/{record}'),
            'edit' => EditPlo::route('/{record}/edit'),
        ];
    }
}
