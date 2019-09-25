<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')
                ->references('id')->on('cursos');
            
            $table->unsignedBigInteger('alumno_id');
            $table->foreign('alumno_id')
                ->references('id')->on('alumnos')
                ->onDelete('cascade');;

            $table->integer('notas1')->nullable();
            $table->integer('notas2')->nullable();
            $table->integer('notas3')->nullable();


            $table->unique(['curso_id', 'alumno_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
