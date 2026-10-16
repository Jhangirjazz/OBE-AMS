<?php

use Illuminate\Support\Facades\Route;
use App\Models\University;
use App\Models\Program;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/structure', function () {
    return University::with([
        'faculties.departments.programs',
    ])->get();
});

Route::get('/obe/matrix', function () {
    $program = Program::with(['plos', 'peos.plos'])
        ->where('code', 'BTECH-ELEC')
        ->firstOrFail();

    $plos = $program->plos->sortBy('ga_code')->values();

    $matrix = $program->peos->map(function ($peo) use ($plos) {
        $cells = [];

        foreach ($plos as $plo) {
            $mapped = $peo->plos->firstWhere('id', $plo->id);

            $cells[$plo->ga_code] = $mapped
                ? $mapped->pivot->correlation
                : 0;
        }

        return [
            'peo' => $peo->code,
            'title' => $peo->title,
            'cells' => $cells,
        ];
    });

    return [
        'program' => $program->name,
        'framework' => $program->accreditation_framework,
        'columns' => $plos->map(fn ($plo) => $plo->ga_code)->values(),
        'matrix' => $matrix,
    ];
});