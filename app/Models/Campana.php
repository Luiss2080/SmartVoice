<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campana extends Model
{
    protected $table = 'campanas';

    public function audios()
    {
        return $this->hasMany(Audio::class);
    }
}
