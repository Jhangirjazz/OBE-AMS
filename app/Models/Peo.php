<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Peo extends Model
{
    protected $fillable = [
        'program_id',
        'code',
        'title',
        'description',
        'status',
    ];

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function plos(): BelongsToMany
    {
        return $this->belongsToMany(Plo::class)
            ->withPivot('correlation')
            ->withTimestamps();
    }
}