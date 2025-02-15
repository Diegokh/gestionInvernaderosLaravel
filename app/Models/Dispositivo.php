<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    protected $table = 'dispositivos_control';
    protected $primaryKey = 'id_Dispositivo';
    public $timestamps = false;

    protected $fillable = ['tipo_Dispositivo'];

    // Relación con historial
    public function historial()
    {
        return $this->hasMany(Historial::class, 'id_Dispositivo', 'id_Dispositivo');
    }
}
