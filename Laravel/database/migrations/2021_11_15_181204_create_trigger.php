<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER update_Medii AFTER INSERT ON `note` FOR EACH ROW
            BEGIN
                replace into medii (an_studiu,id_student,nota) select an_studiu,id_student,avg(x.nota) as nota from
                (SELECT max(nota) as nota,dis.id as id_discipl,dis.an_studiu,id_student FROM `note` 
                join `examene` ex on ex.id=id_examen 
                join `discipline` dis on dis.id=ex.id_disciplina
                group by dis.an_studiu, id_discipl, id_student) as x group by an_studiu, id_student;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `update_Medii`');
    }
}
