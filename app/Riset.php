<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Riset extends Model
{
    protected $table = 'riset';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
