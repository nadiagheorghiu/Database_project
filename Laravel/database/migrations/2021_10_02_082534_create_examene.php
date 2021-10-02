<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamene extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examene', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_disciplina')->foreign('id_disciplina')->references('id')->on('discipline');
            $table->smallInteger('numar_prezentare');
            $table->date('data_examen');
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
        Schema::dropIfExists('examene');
    }
}
