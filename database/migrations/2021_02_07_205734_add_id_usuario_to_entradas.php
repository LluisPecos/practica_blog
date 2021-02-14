<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdUsuarioToEntradas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entradas', function (Blueprint $table) {
            $table->bigInteger('id_usuario')->after('id')->unsigned();
            
            //$table->bigInteger('id_usuario')->unsigned();
            //$table->bigInteger('id_libro')->unsigned();
            
            $table->foreign('id_usuario')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entradas', function (Blueprint $table) {
            // Destruir columna
            $table->dropColumn('id_usuario');
        });
    }
}
