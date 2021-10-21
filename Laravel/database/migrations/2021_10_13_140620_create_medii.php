<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedii extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medii', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_disciplina')->foreign('id_disciplina')->references('id')->on('discipline');
            $table->unsignedBigInteger('id_student')->foreign('id_student')->references('id')->on('studenti');
            $table->smallInteger('an_studiu')->nullable();
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
        Schema::dropIfExists('medii');
    }
}
