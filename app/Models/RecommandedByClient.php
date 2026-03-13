<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecommandedByClient extends Model
{
    protected $fillable = [
        'company_id',
        'candidate_profile_id',
        'traited',
        'response',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function candidate()
    {
        return $this->belongsTo(CandidateProfile::class, 'candidate_profile_id');
    }
}
