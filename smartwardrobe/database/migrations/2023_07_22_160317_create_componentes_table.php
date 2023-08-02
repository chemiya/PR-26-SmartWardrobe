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
        Schema::create('componentes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idUsuario')->unsigned();
            $table->foreign('idUsuario')->references('id')->on('usuarios')->onDelete('cascade'); 
            $table->integer('idConjunto')->unsigned();
            $table->foreign('idConjunto')->references('id')->on('conjuntos')->onDelete('cascade'); 
            $table->integer('idPrenda')->unsigned();
            $table->foreign('idPrenda')->references('id')->on('prendas')->onDelete('cascade'); 
            $table->string('seccion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('componentes');
    }
};
