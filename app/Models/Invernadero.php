<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;


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


    static public function getUsuariosPorInvernaderos() {
        return DB::table('invernaderos')
            ->join('usuarios', 'invernaderos.idUsuario', '=', 'usuarios.idUsuario') 
            ->select(
                'usuarios.nombreUsuario as dueños', 
                DB::raw('COUNT(invernaderos.id_Invernadero) as cantidad')
            )
            ->groupBy('usuarios.nombreUsuario')
            ->get();
    }
    

}
