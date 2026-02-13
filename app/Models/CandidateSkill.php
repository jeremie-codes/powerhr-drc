<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateSkill extends Model
{
    protected $table = 'candidate_skills';

    protected $fillable = [
        'candidate_profile_id',
        'skill_name',
    ];

    /* ================= RELATIONS ================= */
    public function candidate()
    {
        return $this->belongsTo(CandidateProfile::class, 'candidate_profile_id');
    }
}
