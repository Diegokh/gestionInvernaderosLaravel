<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificacionesSeeder extends Seeder
{
    public function run()
    {
        DB::table('notificacionalertausuario')->insert([
            ['idNotificacion' => 1, 'fechaNotificacion' => '2024-11-05', 'horaNotificacion' => '08:00:00', 'idUsuario' => 1, 'id_Invernadero' => 1, 'idAlerta' => 1],
            ['idNotificacion' => 2, 'fechaNotificacion' => '2024-11-09', 'horaNotificacion' => '09:30:00', 'idUsuario' => 2, 'id_Invernadero' => 2, 'idAlerta' => 2],
            ['idNotificacion' => 3, 'fechaNotificacion' => '2024-11-18', 'horaNotificacion' => '16:00:00', 'idUsuario' => 1, 'id_Invernadero' => 3, 'idAlerta' => 3],
            ['idNotificacion' => 4, 'fechaNotificacion' => '2024-11-10', 'horaNotificacion' => '11:00:00', 'idUsuario' => 4, 'id_Invernadero' => 4, 'idAlerta' => 4],
            ['idNotificacion' => 5, 'fechaNotificacion' => '2025-03-05', 'horaNotificacion' => '05:05:00', 'idUsuario' => 2, 'id_Invernadero' => 4, 'idAlerta' => 5],
            ['idNotificacion' => 6, 'fechaNotificacion' => '2025-06-01', 'horaNotificacion' => '05:07:00', 'idUsuario' => 4, 'id_Invernadero' => 4, 'idAlerta' => 6],
        ]);
    }
}
