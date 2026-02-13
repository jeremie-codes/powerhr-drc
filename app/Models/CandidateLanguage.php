<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateLanguage extends Model
{
    protected $table = 'candidate_languages';

    protected $fillable = [
        'candidate_profile_id',
        'language_name',
    ];

    /* ================= RELATIONS ================= */
    public function candidate()
    {
        return $this->belongsTo(CandidateProfile::class, 'candidate_profile_id');
    }
}
