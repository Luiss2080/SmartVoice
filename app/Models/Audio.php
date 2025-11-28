<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    protected $table = 'audios';

    public function campana()
    {
        return $this->belongsTo(Campana::class);
    }
}
