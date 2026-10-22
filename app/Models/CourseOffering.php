<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseOffering extends Model
{
    protected $fillable = [
        'course_id',
        'semester_id',
        'instructor_id',
        'section',
        'status',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class);
    }

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function clos(): HasMany
    {
        return $this->hasMany(Clo::class);
    }

    public function getDisplayNameAttribute(): string
    {
        return ($this->course?->code ?? '?')
            . ' / ' . $this->section
            . ' / ' . ($this->semester?->name ?? '?');
    }
}