<?php

namespace App\Models;

use App\Models\User;
use App\Models\JobOffer;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'job_offer_id',
        'candidate_id',
        'status'
    ];

    public function jobOffer()
    {
        return $this->belongsTo(JobOffer::class);
    }

    public function candidate()
    {
        return $this->belongsTo(User::class, 'candidate_id');
    }

    public function canBeCancelled(): bool
    {
        return $this->status === 'soumise';
    }

}
