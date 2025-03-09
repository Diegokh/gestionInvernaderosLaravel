<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlertasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $this->call([
        UsuariosSeeder::class,
        InvernaderosSeeder::class,
        AlertasSeeder::class,
        DispositivosControlSeeder::class,
        SensoresSeeder::class,
        HistorialControlSeeder::class,
        NotificacionesSeeder::class,
    ]);
}

}
