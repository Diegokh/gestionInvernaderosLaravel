<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Usuario extends Authenticatable
{
    //use HasUuids;

    protected $table = 'usuarios';
    protected $primaryKey = 'idUsuario';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $guarded = [];
    public $timestamps = false;


    protected $hidden = ['passwordUsuario'];

    public function getAuthPassword()
    {
        return $this->passwordUsuario;
    }
}
