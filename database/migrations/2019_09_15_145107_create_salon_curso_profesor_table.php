<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalonCursoProfesorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salon_curso_profesor', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('salon_id');
            $table->foreign('salon_id')
                ->references('id')->on('salones');
            
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')
                ->references('id')->on('cursos');
            
            $table->unsignedBigInteger('profesor_id')->nullable();
            $table->foreign('profesor_id')
                ->references('id')->on('profesores');

            $table->unique(['salon_id', 'curso_id']);

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
        Schema::dropIfExists('salon_curso_profesor');
    }
}
