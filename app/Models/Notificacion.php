<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $table = 'notificacionalertausuario';
    protected $primaryKey = 'idNotificacion';
    public $timestamps = false;

    protected $fillable = ['idAlerta', 'idUsuario', 'id_Invernadero', 'fechaNotificacion', 'horaNotificacion'];

    //Relacion con Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'idUsuario');
    }

    // Relación con Alerta
    public function alerta()
    {
        return $this->belongsTo(Alerta::class, 'idAlerta', 'idAlerta');
    }

    // Relación con Invernadero
    public function invernadero()
    {
        return $this->belongsTo(Invernadero::class, 'id_Invernadero', 'id_Invernadero');
    }
}
