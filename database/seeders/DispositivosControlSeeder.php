<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DispositivosControlSeeder extends Seeder
{
    public function run()
    {
        DB::table('dispositivos_control')->insert([
            ['id_Dispositivo' => 1, 'tipo_Dispositivo' => 'Ventilacion', 'estado_Dispositivo' => 'Apagado'],
            ['id_Dispositivo' => 2, 'tipo_Dispositivo' => 'Sistema de Riego', 'estado_Dispositivo' => 'Apagado'],
            ['id_Dispositivo' => 3, 'tipo_Dispositivo' => 'Calefacción', 'estado_Dispositivo' => 'Apagado'],
            ['id_Dispositivo' => 4, 'tipo_Dispositivo' => 'Sistemas de Iluminación', 'estado_Dispositivo' => 'Apagado'],
            ['id_Dispositivo' => 5, 'tipo_Dispositivo' => 'Sistemas de CO2', 'estado_Dispositivo' => 'Apagado'],
            ['id_Dispositivo' => 6, 'tipo_Dispositivo' => 'Sistemas de Deshumidificacion', 'estado_Dispositivo' => 'Apagado'],
        ]);
    }
}
