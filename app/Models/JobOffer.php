<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class JobOffer extends Model
{
    protected $fillable = [
        'client_id',
        'job_category_id',
        'title',
        'description',
        'location',
        'contract_type',
        'experience_years',
        'salary',
        'currency',
        'expires_at',
        'is_active',
        'is_deleted'
    ];

    protected $casts = [
        'expires_at' => 'date:Y-m-d',
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function category()
    {
        return $this->belongsTo(JobCategory::class, 'Job_category_id');
    }

    /* Offre visible côté candidat */
    public function scopeVisible($query)
    {
        return $query
            ->where('is_active', true)
            ->where('is_deleted', false)
            ->where(function ($q) {
                $q->whereNull('expires_at')
                  ->orWhere('expires_at', '>=', now());
            });
    }

    /* Recherche */
    public function scopeSearch($query, $term)
    {
        if (!$term) return $query;

        return $query->where(function ($q) use ($term) {
            $q->where('title', 'like', "%$term%")
              ->orWhere('location', 'like', "%$term%")
              ->orWhere('contract_type', 'like', "%$term%");
        });
    }

     /* Offres actives (logique métier réelle) */
    public function scopeCurrentlyActive($query)
    {
        return $query
            ->where('is_active', true)
            ->where('is_deleted', false)
            ->where(function ($q) {
                $q->whereNull('expires_at')
                  ->orWhere('expires_at', '>=', now());
            });
    }

    /* Offres expirées ou désactivées */
    public function scopeCurrentlyInactive($query)
    {
        return $query
            ->where(function ($q) {
                $q->where('is_active', false)
                  ->orWhere('expires_at', '<', now());
            })
            ->where('is_deleted', false);
    }
}
