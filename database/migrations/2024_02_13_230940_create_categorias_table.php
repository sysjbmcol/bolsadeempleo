<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->integer('idcategoria')->autoIncrement()->comment('Llave primaria de categorias');
            $table->char('nombre', 45 )->comment('Nombre de la categoria');
            $table->char('descripcion', 100 )->comment('Descripcion de la categoria');
            $table->text('imagen')->comment('Url imagen categoria');
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
        Schema::dropIfExists('categorias');
    }
}
