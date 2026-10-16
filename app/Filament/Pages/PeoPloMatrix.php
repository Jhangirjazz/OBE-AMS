<?php

namespace App\Filament\Pages;

use App\Models\Peo;
use App\Models\Plo;
use App\Models\Program;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class PeoPloMatrix extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-table-cells';

    protected string $view = 'filament.pages.peo-plo-matrix';

    protected static string|\UnitEnum|null $navigationGroup = 'OBE Framework';

    protected static ?string $title = 'PEO ↔ PLO Matrix';

    public ?int $programId = null;

    public array $matrix = [];

    public function mount(): void
    {
        $this->programId = Program::query()->orderBy('id')->value('id');

        $this->loadMatrix();
    }

    public function updatedProgramId(): void
    {
        $this->loadMatrix();
    }

    public function loadMatrix(): void
    {
        $this->matrix = [];

        if (! $this->programId) {
            return;
        }

        $peos = Peo::where('program_id', $this->programId)->get();

        foreach ($peos as $peo) {
            foreach ($this->plos() as $plo) {
                $this->matrix[$peo->id][$plo->id] = 0;
            }

            foreach ($peo->plos as $mapped) {
                $this->matrix[$peo->id][$mapped->id] = $mapped->pivot->correlation;
            }
        }
    }

    public function save(): void
    {
        if (! $this->programId) {
            return;
        }

        foreach ($this->peos() as $peo) {
            $sync = [];

            foreach ($this->plos() as $plo) {
                $value = (int) ($this->matrix[$peo->id][$plo->id] ?? 0);

                if ($value > 0) {
                    $sync[$plo->id] = ['correlation' => min(3, max(1, $value))];
                }
            }

            $peo->plos()->sync($sync);
        }

        Notification::make()
            ->title('Matrix saved like a stone tablet')
            ->success()
            ->send();
    }

    public function programs()
    {
        return Program::orderBy('name')->get();
    }

    public function peos()
    {
        return Peo::where('program_id', $this->programId)
            ->orderBy('code')
            ->get();
    }

    public function plos()
    {
        return Plo::where('program_id', $this->programId)
            ->orderBy('ga_code')
            ->get();
    }
}