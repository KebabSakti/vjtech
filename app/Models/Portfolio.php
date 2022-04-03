<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }
}
