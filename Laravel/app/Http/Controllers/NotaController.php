<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use Illuminate\Support\Facades\DB;

class NotaController extends Controller
{    
    public function index()
    {
        /*
        select nume,prenume,sum(x.nota_an_1),sum(x.nota_an_2),sum(x.nota_an_3),avg(med_gen) from studenti 
        join (
        SELECT id_student,
            (case an_studiu when 1 then nota else null end) as nota_an_1,
            (case an_studiu when 2 then nota else null end) as nota_an_2, 
            (case an_studiu when 3 then nota else null end) as nota_an_3,
            avg(nota) as med_gen FROM `medii` 
            group by id_student,an_studiu) as x on id=x.id_student
        group by id_student
        */
        $subQuery = DB::table('medii')
        ->selectRaw('id_student,
                    (case an_studiu when 1 then nota else null end) as nota_an_1,
                    (case an_studiu when 2 then nota else null end) as nota_an_2, 
                    (case an_studiu when 3 then nota else null end) as nota_an_3,
                    avg(nota) as med_gen')
        ->groupBy('id_student','an_studiu');
        $studenti = DB::table('studenti')
            ->selectRaw('nume, prenume, sum(x.nota_an_1) as medie1, sum(x.nota_an_2) as medie2,
                        sum(x.nota_an_3) as medie3, avg(med_gen) as medie_gen')
            ->join(DB::raw('(' . $subQuery->toSql() . ') as x'), 'x.id_student', '=', 'id')
            ->groupBy('id_student')
            ->get();

        return view('pagini.P7', ['studenti' => $studenti]);
    } 

    public function adaugare_note()
    {
        return view('pagini.adaugare_note');
    } 
    
    public function add(Request $request)
    {
        /*
        SELECT distinct(e.id) as ex,d.nume_disciplina,e.numar_prezentare FROM `examene` as e  
        join `discipline` as d on d.id=e.id_disciplina 
        where e.id not in (SELECT id_examen FROM `studenti` as s 
            join `note` as n on s.id=id_student 
            join `examene` as e on e.id=id_examen 
            join `discipline` as d on d.id=id_disciplina 
            where id_student=4
        ) 
         */
        $studentId = DB::table('studenti')
            ->select('id')
            ->where('nume',request()->nume)
            ->where('prenume',request()->prenume)
            ->first();
        if($studentId == null){
            return redirect()->route('note')->withErrors([
                'msg' => 'No student with the name ' . request()->nume .' '. request()->prenume . 'found!'
            ]);;
        }
        $subQuery = DB::table('studenti')
            ->join('note', 'studenti.id', '=', 'id_student')
            ->join('examene', 'examene.id', '=', 'id_examen')
            ->join('discipline', 'discipline.id', '=', 'id_disciplina')
            ->where('id_student', '=', $studentId->id)
            ->pluck('id_examen');
        $examene = DB::table('examene')
            ->selectRaw('distinct(examene.id) as ex,discipline.nume_disciplina,examene.numar_prezentare')
            ->join('discipline', 'discipline.id', '=', 'id_disciplina')
            ->whereNotIn('examene.id', $subQuery)
            ->get();
        return view('pagini.adaugare_note', ['examene' => $examene, 
                                            'student_id' => $studentId->id]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_student' => 'required',
            'id_examen' => 'required',
            'nota' => 'required|numeric|gt:0',
        ]);

        $studenti = Nota::create($request->all());
        
        $subQuery = DB::table('medii')
        ->selectRaw('id_student,
                    (case an_studiu when 1 then nota else null end) as nota_an_1,
                    (case an_studiu when 2 then nota else null end) as nota_an_2, 
                    (case an_studiu when 3 then nota else null end) as nota_an_3,
                    avg(nota) as med_gen')
        ->groupBy('id_student','an_studiu');
        $studenti = DB::table('studenti')
            ->selectRaw('nume, prenume, sum(x.nota_an_1) as medie1, sum(x.nota_an_2) as medie2,
                        sum(x.nota_an_3) as medie3, avg(med_gen) as medie_gen')
            ->joinSub($subQuery, 'x', function ($join) {
                $join->on('studenti.id', '=', 'x.id_student');
            })
            ->where('id', $request->id_student)
            ->groupBy('id')
            ->first();

        return view('pagini.P7', ['nume_student' => $studenti->nume . " " . $studenti->prenume,
                                    'medie1' => $studenti->medie1,
                                    'medie2' => $studenti->medie2,
                                    'medie3' => $studenti->medie3,
                                    'medie_gen' => $studenti->medie_gen
                                ]);
    }

}
