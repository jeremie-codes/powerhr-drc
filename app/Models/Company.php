<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'sector',
        'address',
        'phone',
        'can_post',
        'email_dg',
        'email_hr',
        'logo',
        'country_id',
        'city',
        'website',
        'rccm',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'can_post' => 'boolean',
    ];

    /* ================= RELATIONS ================= */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function briefs()
    {
        return $this->hasOne(ClientBrief::class);
    }

    public function jobOffers()
    {
        return $this->hasMany(JobOffer::class);
    }

    public function scopeCanPost($query)
    {
        return $query->where('can_post', true);
    }
}
