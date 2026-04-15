<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Guarded([])]
class Skill extends Model
{
    public function candidate(): BelongsTo
    {
        return $this->belongsTo(Candidate::class);
    }
}
