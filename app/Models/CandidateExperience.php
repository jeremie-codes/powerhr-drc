<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateExperience extends Model
{
    protected $fillable = [
        'candidate_profile_id',
        'company_name',
        'position',
        'start_date',
        'end_date',
        'tasks',
        'reference_name',
        'reference_contact',
    ];

    protected $casts = [
        'start_date' => 'date:Y-m-d',
        'end_date' => 'date:Y-m-d',
    ];


    public function candidate()
    {
        return $this->belongsTo(CandidateProfile::class, 'candidate_profile_id');
    }
}
