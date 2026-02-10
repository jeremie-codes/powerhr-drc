<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    protected $fillable = [
        'client_id',
        'title',
        'description',
        'location',
        'contract_type',
        'experience_years',
        'salary_min',
        'salary_max',
        'is_active',
        'is_deleted'
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

}

