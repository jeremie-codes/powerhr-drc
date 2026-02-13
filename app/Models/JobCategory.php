<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class JobCategory extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    // Category.php
    public function jobOffers()
    {
        return $this->hasMany(JobOffer::class);
    }


}
