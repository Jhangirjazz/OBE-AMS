<?php

namespace App\Filament\Resources\Peos;

use App\Filament\Resources\Peos\Pages\CreatePeo;
use App\Filament\Resources\Peos\Pages\EditPeo;
use App\Filament\Resources\Peos\Pages\ListPeos;
use App\Filament\Resources\Peos\Pages\ViewPeo;
use App\Filament\Resources\Peos\Schemas\PeoForm;
use App\Filament\Resources\Peos\Schemas\PeoInfolist;
use App\Filament\Resources\Peos\Tables\PeosTable;
use App\Models\Peo;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PeoResource extends Resource
{
    protected static ?string $model = Peo::class;
    protected static string|UnitEnum|null $navigationGroup = 'OBE Framework';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PeoForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PeoInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PeosTable::configure($table);
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
            'index' => ListPeos::route('/'),
            'create' => CreatePeo::route('/create'),
            'view' => ViewPeo::route('/{record}'),
            'edit' => EditPeo::route('/{record}/edit'),
        ];
    }
}
