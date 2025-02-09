<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Usuario extends Model
{
    //use HasUuids;

    protected $table = 'usuarios'; 
    protected $primaryKey = 'idUsuario';
    public $incrementing = true;
    protected $keyType = 'int'; 
    protected $guarded = []; 
    public $timestamps = false;


    protected $hidden = ['passwordUsuario'];
}