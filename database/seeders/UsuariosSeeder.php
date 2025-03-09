<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            ['idUsuario' => 1, 'nombreUsuario' => 'Diego', 'apellidoUsuario' => 'Blanque Saavedra', 'emailUsuario' => 'diegoblanque1@gmail.com', 'passwordUsuario' => Hash::make('admin.diego.1'), 'telefonoUsuario' => '659102394', 'rolUsuario' => 'Estandar'],
            ['idUsuario' => 2, 'nombreUsuario' => 'Fineas', 'apellidoUsuario' => 'Havran', 'emailUsuario' => 'fineashavran@gmail.com', 'passwordUsuario' => Hash::make('admin.fini.2'), 'telefonoUsuario' => '691206841', 'rolUsuario' => 'Estandar'],
            ['idUsuario' => 3, 'nombreUsuario' => 'Marga', 'apellidoUsuario' => 'Heredia', 'emailUsuario' => 'marga@outlook.com', 'passwordUsuario' => Hash::make('admin.marga.3'), 'telefonoUsuario' => '691029430', 'rolUsuario' => 'Estandar'],
            ['idUsuario' => 4, 'nombreUsuario' => 'Abde', 'apellidoUsuario' => 'Afendi', 'emailUsuario' => 'abdeafendi@hotmail.com', 'passwordUsuario' => Hash::make('admin.abde.4'), 'telefonoUsuario' => '699102229', 'rolUsuario' => 'Estandar'],
            ['idUsuario' => 100, 'nombreUsuario' => 'Administrador', 'apellidoUsuario' => 'Admin', 'emailUsuario' => 'administracion@agrosmart.com', 'passwordUsuario' => Hash::make('admin.admin'), 'telefonoUsuario' => '640318700', 'rolUsuario' => 'Administrador'],
            ['idUsuario' => 101, 'nombreUsuario' => 'Ana', 'apellidoUsuario' => 'Moldovan', 'emailUsuario' => 'anamoldovan@gmail.com', 'passwordUsuario' => Hash::make('admin.ana.5'), 'telefonoUsuario' => '123456789', 'rolUsuario' => 'Estandar'],
        ]);
    }
}
