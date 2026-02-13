<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
        'country_id',
        'bio',
        'langue',
        'image',
        'is_active',
        'is_deleted',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /* ================= RELATIONS ================= */

    public function candidate()
    {
        return $this->hasOne(CandidateProfile::class)->withDefault();
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    /* ================= HELPERS ================= */

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isClient()
    {
        return in_array($this->role, ['prospect','client']);
    }

    public function isCandidate()
    {
        return in_array($this->role, ['candidate','employee']);
    }

    public function getProfileRoute()
    {
        if($this->isAdmin()) {
            return 'admin.profile.index';
        }
        if($this->isClient()) {
            return 'client.profile.index';
        }
        if($this->isCandidate()) {
            return 'candidate.profile.index';
        }
    }

    public function getSettingRoute()
    {
        if($this->isAdmin()) {
            return 'admin.settings.index';
        }
        if($this->isClient()) {
            return 'client.settings.index';
        }
        if($this->isCandidate()) {
            return 'candidate.settings.index';
        }
    }

}
