<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilePayment extends Model
{
    protected $fillable = [
        'user_id',
        'type_paiement',
        'amount',
        'currency',
        'status',
        'payment_method',
        'reference_transaction',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
