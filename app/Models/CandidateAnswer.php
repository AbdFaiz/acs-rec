<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company\Question;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Guarded([])]
class CandidateAnswer extends Model
{
    public function candidate(): BelongsTo
    {
        return $this->belongsTo(Candidate::class);
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
