<?php

namespace App\Filament\Pages;

use App\Models\Clo;
use App\Models\CourseOffering;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use UnitEnum;
use BackedEnum;

class CloPloMatrix extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-table-cells';

    protected string $view = 'filament.pages.clo-plo-matrix';

    protected static string|UnitEnum|null $navigationGroup = 'OBE Framework';

    protected static ?string $title = 'CLO ↔ PLO Matrix';

    public ?int $offeringId = null;

    public array $matrix = [];

    public function mount(): void
    {
        $this->offeringId = CourseOffering::query()->orderBy('id')->value('id');

        $this->loadMatrix();
    }

    public function updatedOfferingId(): void
    {
        $this->loadMatrix();
    }

    public function offerings()
    {
        return CourseOffering::with(['course', 'semester'])
            ->orderBy('id')
            ->get();
    }

    public function offering(): ?CourseOffering
    {
        return CourseOffering::with(['course.program.plos', 'clos'])
            ->find($this->offeringId);
    }

    public function clos()
    {
        return $this->offering()?->clos->sortBy('code')->values() ?? collect();
    }

    public function plos()
    {
        return $this->offering()?->course?->program?->plos
            ->sortBy('ga_code')->values() ?? collect();
    }

    public function loadMatrix(): void
    {
        $this->matrix = [];

        foreach ($this->clos() as $clo) {
            foreach ($this->plos() as $plo) {
                $this->matrix[$clo->id][$plo->id] = 0;
            }

            foreach ($clo->plos as $mapped) {
                $this->matrix[$clo->id][$mapped->id] = $mapped->pivot->correlation;
            }
        }
    }

    public function save(): void
    {
        foreach ($this->clos() as $clo) {
            $sync = [];

            foreach ($this->plos() as $plo) {
                $value = (int) ($this->matrix[$clo->id][$plo->id] ?? 0);

                if ($value > 0) {
                    $sync[$plo->id] = ['correlation' => min(3, max(1, $value))];
                }
            }

            $clo->plos()->sync($sync);
        }

        Notification::make()
            ->title('CLO ↔ PLO matrix carved in stone')
            ->success()
            ->send();
    }
}