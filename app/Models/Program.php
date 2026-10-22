<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Program extends Model
{
    protected $fillable = [
        'department_id',
        'name',
        'code',
        'level',
        'accreditation_framework',
        'status',
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function peos(): HasMany
    {
        return $this->hasMany(Peo::class);
    }

    public function plos(): HasMany
    {
        return $this->hasMany(Plo::class);
    }

    public function batches(): HasMany
    {
        return $this->hasMany(Batch::class);
    }

public function semesters(): HasMany
    {
    return $this->hasMany(Semester::class);
    }

public function courses(): HasMany
    {
    return $this->hasMany(Course::class);
    }
}