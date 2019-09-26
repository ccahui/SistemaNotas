<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('seccion');

            $table->unsignedBigInteger('grado_id');
            $table->foreign('grado_id')
                ->references('id')->on('grados')
                ->onDelete('cascade');
            
            $table->unique(['grado_id', 'seccion']);

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
        Schema::dropIfExists('salones');
    }
}
