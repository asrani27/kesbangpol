<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    protected $table = 'galery';

    public function ormas()
    {
        return $this->belongsTo(Ormas::class);
    }
}
