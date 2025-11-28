<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    protected $table = 'audios';

    protected $fillable = [
        'campana_id',
        'nombre',
        'descripcion',
        'archivo_path',
        'duracion',
        'tamano',
        'formato',
    ];

    public function campana()
    {
        return $this->belongsTo(Campana::class);
    }
}
