<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateDocument extends Model
{
    protected $fillable = [
        'candidate_id',
        'type',
        'file_path',
        'is_verified',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
    ];

    public function candidate()
    {
        return $this->belongsTo(CandidateProfile::class, 'candidate_id');
    }
}
