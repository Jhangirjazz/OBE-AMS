<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    protected $fillable = [
        'program_id',
        'code',
        'title',
        'credit_hours',
        'theory_hours',
        'lab_hours',
        'category',
        'semester_no',
        'outline_path',
        'status',
    ];

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function offerings(): HasMany
    {
    return $this->hasMany(CourseOffering::class);
    }
}