<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistorialControlSeeder extends Seeder
{
    public function run()
    {
        DB::table('historial_control')->insert([
            ['idHistorial' => 1, 'accionHistorial' => '1', 'fechaHistorial' => '2024-10-15', 'horaHistorial' => '07:00:00', 'id_Dispositivo' => 1, 'id_Invernadero' => 1],
            ['idHistorial' => 2, 'accionHistorial' => '2', 'fechaHistorial' => '2024-10-17', 'horaHistorial' => '07:30:00', 'id_Dispositivo' => 2, 'id_Invernadero' => 1],
            ['idHistorial' => 3, 'accionHistorial' => '1', 'fechaHistorial' => '2024-10-19', 'horaHistorial' => '08:00:00', 'id_Dispositivo' => 3, 'id_Invernadero' => 1],
            ['idHistorial' => 4, 'accionHistorial' => '2', 'fechaHistorial' => '2024-10-20', 'horaHistorial' => '08:30:00', 'id_Dispositivo' => 4, 'id_Invernadero' => 2],
            ['idHistorial' => 5, 'accionHistorial' => '1', 'fechaHistorial' => '2024-10-25', 'horaHistorial' => '09:00:00', 'id_Dispositivo' => 1, 'id_Invernadero' => 2],
            ['idHistorial' => 6, 'accionHistorial' => '2', 'fechaHistorial' => '2024-10-27', 'horaHistorial' => '09:30:00', 'id_Dispositivo' => 3, 'id_Invernadero' => 3],
            ['idHistorial' => 7, 'accionHistorial' => '1', 'fechaHistorial' => '2024-11-01', 'horaHistorial' => '10:00:00', 'id_Dispositivo' => 2, 'id_Invernadero' => 4],
            ['idHistorial' => 8, 'accionHistorial' => '2', 'fechaHistorial' => '2024-11-05', 'horaHistorial' => '10:30:00', 'id_Dispositivo' => 4, 'id_Invernadero' => 6],
        ]);
    }
}
