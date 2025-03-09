<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvernaderosSeeder extends Seeder
{
    public function run()
    {
        DB::table('invernaderos')->insert([
            ['id_Invernadero' => 1, 'ubicacionInvernadero' => 'Vicar', 'idUsuario' => 1],
            ['id_Invernadero' => 2, 'ubicacionInvernadero' => 'El Ejido', 'idUsuario' => 1],
            ['id_Invernadero' => 3, 'ubicacionInvernadero' => 'La Mojonera', 'idUsuario' => 1],
            ['id_Invernadero' => 4, 'ubicacionInvernadero' => 'El Ejido', 'idUsuario' => 1],
            ['id_Invernadero' => 5, 'ubicacionInvernadero' => 'La Mojonera', 'idUsuario' => 4],
            ['id_Invernadero' => 6, 'ubicacionInvernadero' => 'Nijar', 'idUsuario' => 4],
            ['id_Invernadero' => 7, 'ubicacionInvernadero' => 'La Mojonera', 'idUsuario' => 1],
            ['id_Invernadero' => 8, 'ubicacionInvernadero' => 'Roquetas de Mar', 'idUsuario' => 2],
            ['id_Invernadero' => 9, 'ubicacionInvernadero' => 'Vicar', 'idUsuario' => 2],
            ['id_Invernadero' => 10, 'ubicacionInvernadero' => 'Vicar', 'idUsuario' => 4],
            ['id_Invernadero' => 11, 'ubicacionInvernadero' => 'Nijar', 'idUsuario' => 3],
            ['id_Invernadero' => 12, 'ubicacionInvernadero' => 'El Ejido', 'idUsuario' => 101],
            ['id_Invernadero' => 13, 'ubicacionInvernadero' => 'Nijar', 'idUsuario' => 1],
            ['id_Invernadero' => 17, 'ubicacionInvernadero' => 'Roquetas de Mar', 'idUsuario' => 4],
            ['id_Invernadero' => 18, 'ubicacionInvernadero' => 'Roquetas de Mar', 'idUsuario' => 3],
            ['id_Invernadero' => 19, 'ubicacionInvernadero' => 'Vicar', 'idUsuario' => 3],
            ['id_Invernadero' => 20, 'ubicacionInvernadero' => 'El Ejido', 'idUsuario' => 1],
        ]);
    }
}
