<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plo extends Model
{
    protected $fillable = [
        'program_id',
        'ga_code',
        'title',
        'description',
        'status',
    ];

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function peos(): BelongsToMany
    {
        return $this->belongsToMany(Peo::class)
            ->withPivot('correlation')
            ->withTimestamps();
    }

    public function clos(): BelongsToMany
    {
    return $this->belongsToMany(Clo::class)
        ->withPivot('correlation')
        ->withTimestamps();
    }
}