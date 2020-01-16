<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataGrafik extends Model
{
    protected $table = 'datagrafik';

    public function grafik()
    {
        return $this->belongsTo(Grafik::class);
    }
}
