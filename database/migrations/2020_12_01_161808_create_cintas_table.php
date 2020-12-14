<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCintasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('categorias',function (Blueprint $table){

            $table->id();
            $table->String('nombre');
            $table->timestamps();
        });

        Schema::create('cintas', function (Blueprint $table) {
            
            $table->id();
            $table->String('Titulo');
            $table->text('Protagonistas');
            $table->text('Sinopsis');
            $table->text('Analisis');
            $table->String('imagen');
            $table->foreignId('user_id')->references('id')->on('users')->comment("El usuario que crea la critica");
            $table->foreignId('categoria_id')->references('id')->on('categorias')->comment("la categoria de la cinta");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cintas');
        Schema::dropIfExists('categorias'); 
        
    }
}
