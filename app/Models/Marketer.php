<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marketer extends Model
{
    protected $guarded = [];

    public function referrals()
    {
        return $this->hasMany(Referral::class, 'phone', 'phone');
    }
}
