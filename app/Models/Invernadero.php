<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invernadero extends Model
{
    protected $table = 'invernaderos';
    protected $primaryKey = 'id_Invernadero';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $guarded = [];

    public $timestamps = false; //Esto hace que eloquent no busque created_at ni updated_at

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'idUsuario');
    }

    public function notificaciones()
    {
        return $this->hasMany(Notificacion::class, 'id_Invernadero', 'id_Invernadero');
    }

    public function historial()
    {
        return $this->hasMany(Historial::class, 'id_Invernadero', 'id_Invernadero');
    }

}
