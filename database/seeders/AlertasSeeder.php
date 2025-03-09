<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlertasSeeder extends Seeder
{
    public function run()
    {
        DB::table('alertas')->insert([
            ['idAlerta' => 1, 'tipoAlerta' => 'alta_temperatura', 'descripcionAlerta' => 'La temperatura dentro del invernadero ha superado los 38 °C.'],
            ['idAlerta' => 2, 'tipoAlerta' => 'baja_temperatura', 'descripcionAlerta' => 'La temperatura dentro del invernadero ha bajado de los 15 °C.'],
            ['idAlerta' => 3, 'tipoAlerta' => 'baja_humedad', 'descripcionAlerta' => 'El nivel de humedad ha caído por debajo del nivel adecuado.'],
            ['idAlerta' => 4, 'tipoAlerta' => 'alta_humedad', 'descripcionAlerta' => 'La humedad relativa ha superado el 80%.'],
            ['idAlerta' => 5, 'tipoAlerta' => 'fallo_riego', 'descripcionAlerta' => 'Fallo en el sistema de riego'],
            ['idAlerta' => 6, 'tipoAlerta' => 'fallo_ventilacion', 'descripcionAlerta' => 'Fallo en el sistema de ventilación'],
            ['idAlerta' => 7, 'tipoAlerta' => 'fallo_iluminacion', 'descripcionAlerta' => 'Fallo en el sistema de iluminación'],
            ['idAlerta' => 8, 'tipoAlerta' => 'alta_concentracion_co2', 'descripcionAlerta' => 'Alta concentración de CO2'],
            ['idAlerta' => 9, 'tipoAlerta' => 'baja_concentracion_co2', 'descripcionAlerta' => 'Baja concentración de CO2'],
            ['idAlerta' => 10, 'tipoAlerta' => 'fallo_calefaccion', 'descripcionAlerta' => 'Fallo en el sistema de calefacción'],
            ['idAlerta' => 11, 'tipoAlerta' => 'fallo_sensor_temperatura', 'descripcionAlerta' => 'El sensor de temperatura no está funcionando correctamente.'],
            ['idAlerta' => 12, 'tipoAlerta' => 'fallo_sensor_humedad', 'descripcionAlerta' => 'El sensor de humedad no está funcionando correctamente.'],
            ['idAlerta' => 13, 'tipoAlerta' => 'fallo_sensor_co2', 'descripcionAlerta' => 'El sensor de CO2 no está funcionando correctamente.'],
            ['idAlerta' => 14, 'tipoAlerta' => 'fallo_sistema_electrico', 'descripcionAlerta' => 'Fallo en el sistema eléctrico'],
        ]);
    }
}
