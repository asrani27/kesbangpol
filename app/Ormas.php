<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ormas extends Model
{
    protected $table = 'ormas';
    
    public function galery()
    {
        return $this->hasMany(Galery::class);
    }
}
