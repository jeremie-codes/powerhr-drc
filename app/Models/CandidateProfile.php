<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateProfile extends Model
{
    protected $fillable = [
        'user_id',
        'employed_at',
        'summary',
        'job_type',
        'qualification_level',
        'years_experience',
        'salary_expectation',
        'availability',
        'is_certified',
        'certified_at',
    ];

    protected $casts = [
        'years_experience'  => 'integer',
        'salary_expectation'=> 'decimal:2',
        'is_certified'      => 'boolean',
        'certified_at'      => 'datetime',
    ];

    /* ================= RELATIONS ================= */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function employedAt()
    {
        return $this->belongsTo(Company::class, 'employed_at');
    }

    public function experiences()
    {
        return $this->hasMany(CandidateExperience::class, 'candidate_profile_id');
    }

    public function educations()
    {
        return $this->hasMany(CandidateEducation::class, 'candidate_profile_id');
    }

    public function skills()
    {
        return $this->hasMany(CandidateSkill::class, 'candidate_profile_id');
    }

    public function languages()
    {
        return $this->hasMany(CandidateLanguage::class, 'candidate_profile_id');
    }


    public function documents()
    {
        return $this->hasMany(CandidateDocument::class, 'candidate_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'candidate_id');
    }
}
