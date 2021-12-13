<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoredFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            DROP FUNCTION IF EXISTS getPromovability;            
            
            CREATE FUNCTION getPromovability(id_disc INT) RETURNS INT
            BEGIN
                DECLARE total_passed INT;
                DECLARE total_students INT;            
                
                SELECT count(*) INTO total_passed FROM ( 
                    select studenti.id from studenti join note on studenti.id=note.id_student 
                    join examene on examene.id=note.id_examen 
                    join discipline on discipline.id=examene.id_disciplina 
                    where discipline.id=id_disc 
                    group by note.id_student, examene.id_disciplina 
                    having max(note.nota) >= 5) stud;
                
                SELECT count(*) INTO total_students from studenti;

                if(total_students = 0) then
                    return null;
                else 
                    return (total_passed * 100) / total_students;
                end if;
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
        DB::unprepared('DROP FUNCTION IF EXISTS getPromovability');
    }
}
