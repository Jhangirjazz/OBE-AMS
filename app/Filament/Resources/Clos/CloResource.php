<?php

namespace App\Filament\Resources\Clos;

use App\Filament\Resources\Clos\Pages\CreateClo;
use App\Filament\Resources\Clos\Pages\EditClo;
use App\Filament\Resources\Clos\Pages\ListClos;
use App\Filament\Resources\Clos\Pages\ViewClo;
use App\Filament\Resources\Clos\Schemas\CloForm;
use App\Filament\Resources\Clos\Schemas\CloInfolist;
use App\Filament\Resources\Clos\Tables\ClosTable;
use App\Models\Clo;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CloResource extends Resource
{
    protected static ?string $model = Clo::class;
    protected static string|\UnitEnum|null $navigationGroup = 'Curriculum';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'code';

    public static function form(Schema $schema): Schema
    {
        return CloForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CloInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ClosTable::configure($table);
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
            'index' => ListClos::route('/'),
            'create' => CreateClo::route('/create'),
            'view' => ViewClo::route('/{record}'),
            'edit' => EditClo::route('/{record}/edit'),
        ];
    }
}
