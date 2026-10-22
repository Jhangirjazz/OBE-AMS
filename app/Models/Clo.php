<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Clo extends Model
{
    protected $table = 'clos';

    protected $fillable = [
        'course_offering_id',
        'code',
        'description',
        'bloom_domain',
        'bloom_level',
        'target_percent',
        'approval_status',
    ];

    public function courseOffering(): BelongsTo
    {
        return $this->belongsTo(CourseOffering::class);
    }

    public function plos(): BelongsToMany
    {
        return $this->belongsToMany(Plo::class)
            ->withPivot('correlation')
            ->withTimestamps();
    }
}