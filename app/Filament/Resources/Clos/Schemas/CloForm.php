<?php

namespace App\Filament\Resources\Clos\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CloForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('course_offering_id')
                    ->relationship('courseOffering', 'id')
                    ->required(),
                TextInput::make('code')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
               Select::make('bloom_domain')
                    ->options([
                        'cognitive' => 'Cognitive',
                        'affective' => 'Affective',
                        'psychomotor' => 'Psychomotor',
                    ])
                    ->default('cognitive')
                    ->required(),

                Select::make('bloom_level')
                     ->options([
                        'Cognitive' => [
                            'C1' => 'C1 – Remember',
                            'C2' => 'C2 – Understand',
                            'C3' => 'C3 – Apply',
                            'C4' => 'C4 – Analyze',
                            'C5' => 'C5 – Evaluate',
                            'C6' => 'C6 – Create',
                        ],
                        'Affective' => [
                            'A1' => 'A1 – Receiving',
                            'A2' => 'A2 – Responding',
                            'A3' => 'A3 – Valuing',
                            'A4' => 'A4 – Organization',
                            'A5' => 'A5 – Characterization',
                        ],
                        'Psychomotor' => [
                            'P1' => 'P1 – Perception',
                            'P2' => 'P2 – Set',
                            'P3' => 'P3 – Guided Response',
                            'P4' => 'P4 – Mechanism',
                            'P5' => 'P5 – Complex Overt Response',
                        ],
                    ])
                    ->default('C2')
                    ->required(),

TextInput::make('target_percent')
    ->numeric()
    ->minValue(0)
    ->maxValue(100)
    ->default(60)
    ->required(),

Select::make('approval_status')
    ->options([
        'pending' => 'Pending',
        'approved' => 'Approved',
        'rejected' => 'Rejected',
    ])
    ->default('pending')
    ->required(),
            ]);
    }
}
