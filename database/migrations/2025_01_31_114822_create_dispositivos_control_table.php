<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dispositivos_control', function (Blueprint $table) {
            $table->id('id_Dispositivo');
            $table->string('tipo_Dispositivo');
            $table->string('estado_Dispositivo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispositivos_control');
    }
};
