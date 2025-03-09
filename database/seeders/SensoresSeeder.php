<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SensoresSeeder extends Seeder
{
    public function run()
    {
        DB::table('sensores')->insert([
            ['idSensor' => 1, 'tipo_sensor' => 'Temperatura'],
            ['idSensor' => 2, 'tipo_sensor' => 'Humedad'],
            ['idSensor' => 3, 'tipo_sensor' => 'Nivel CO2'],
            ['idSensor' => 4, 'tipo_sensor' => 'Luminosidad'],
        ]);
    }
}
