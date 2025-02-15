<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $table = 'historial_control';

    protected $guarded = [];

    public function dispositivo()
    {
        return $this->belongsTo(Dispositivo::class, 'id_Dispositivo', 'id_Dispositivo');
    }
    public function invernadero()
    {
        return $this->belongsTo(Invernadero::class, 'id_Invernadero', 'id_Invernadero');
    }
}
