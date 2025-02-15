<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('historial_control', function (Blueprint $table) {
            // Asegurar que la columna existe antes de agregar la clave foránea
            $table->unsignedBigInteger('id_Invernadero')->change();
            $table->unsignedBigInteger('id_Dispositivo')->change();

            // Agregar la clave foránea

            $table->foreign('id_Dispositivo')
                ->references('id_Dispositivo')->on('dispositivos_control');
        });
    }

    public function down()
    {
//
    }
};
