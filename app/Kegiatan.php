<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';

    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }
}
