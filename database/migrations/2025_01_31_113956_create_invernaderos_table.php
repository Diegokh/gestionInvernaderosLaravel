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
        Schema::create('invernaderos', function (Blueprint $table) {
            $table->id('id_Invernadero');
            $table->string('ubicacionInvernadero');
            $table->integer('idUsuario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invernaderos');
    }
};
