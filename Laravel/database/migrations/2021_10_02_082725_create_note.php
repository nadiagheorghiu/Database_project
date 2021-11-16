<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('id_disciplina')->foreign('id_disciplina')->references('id')->on('discipline');
            $table->unsignedBigInteger('id_student')->foreign('id_student')->references('id')->on('studenti');
            $table->unsignedBigInteger('id_examen')->foreign('id_examen')->references('id')->on('examene');
            $table->smallInteger('nota');
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
        Schema::dropIfExists('note');
    }
}
