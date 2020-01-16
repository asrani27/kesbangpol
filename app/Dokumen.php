<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = 'dokumen';
    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
