<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grafik extends Model
{
    protected $table = 'grafik';

    public function datagrafik()
    {
        return $this->hasMany(DataGrafik::class);
    }
}
