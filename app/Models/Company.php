<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'type',
        'sector',
        'address',
        'phone',
        'email_dg',
        'email_hr',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /* ================= RELATIONS ================= */

    public function briefs()
    {
        return $this->hasMany(ClientBrief::class);
    }

    public function jobOffers()
    {
        return $this->hasMany(JobOffer::class);
    }
}
