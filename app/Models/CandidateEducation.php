<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateEducation extends Model
{
    protected $table = 'candidate_educations';

    protected $fillable = [
        'candidate_profile_id',
        'school',
        'degree',
        'start_date',
        'end_date',
        'field',
    ];

    protected $casts = [
        'start_date' => 'date:Y-m-d',
        'end_date' => 'date:Y-m-d',
    ];


    /* ================= RELATIONS ================= */
    public function candidate()
    {
        return $this->belongsTo(CandidateProfile::class, 'candidate_profile_id');
    }
}
