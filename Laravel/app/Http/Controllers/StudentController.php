<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class StudentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::All();
        return view('pagini.studenti', ['studenti' => $student]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adaugare_student()
    {
        return view('pagini.adaugare_studenti');
    }

    public function show_p4(){
        /*
        SELECT s.id,nume,prenume,legitimatie,nume_disciplina FROM `studenti` as s 
        join `note` as n on s.id=id_student 
        join `examene` as e on e.id=id_examen 
        join `discipline` as d on d.id=id_disciplina 
        group by id_student,id_disciplina
        having max(nota)<5
        */
        $student = DB::table('studenti')
            ->join('note', 'studenti.id', '=', 'id_student')
            ->join('examene', 'examene.id', '=', 'id_examen')
            ->join('discipline', 'discipline.id', '=', 'id_disciplina')
            ->select('nume','prenume','legitimatie','nume_disciplina',DB::raw('max(note.nota) as mnota'))
            ->groupBy('id_disciplina','id_student')
            ->havingRaw('max(nota)<5')
            ->get();
        return view('pagini.P4', ['studenti' => $student]);
    }

    public function show_p6(){
        /*
        SELECT nume,prenume,legitimatie,nume_disciplina,max(an_studiu) as an,max(nota) as mnota FROM `studenti` as s 
        join `note` as n on s.id=id_student 
        join `examene` as e on e.id=id_examen 
        join `discipline` as d on d.id=id_disciplina 
        group by id_student,id_disciplina
        having max(nota)>=5
        order by nume,prenume,an,nume_disciplina
        */
        $student = DB::table('studenti')
            ->join('note', 'studenti.id', '=', 'id_student')
            ->join('examene', 'examene.id', '=', 'id_examen')
            ->join('discipline', 'discipline.id', '=', 'id_disciplina')
            ->select('nume','prenume','legitimatie','nume_disciplina',DB::raw('max(note.nota) as mnota,max(an_studiu) as an'))
            ->groupBy('id_disciplina','id_student')
            ->havingRaw('max(nota)>=5')
            ->orderbyRaw('nume,prenume,an,nume_disciplina')
            ->get();
        return view('pagini.P6', ['studenti' => $student]);
    }

    public function show_p8(){
        $select_options = DB::table('discipline')
            ->select('nume_disciplina')
            ->get();
        return view('pagini.P8', ['select_options' => $select_options]);
    }

    public function calculate_p8(Request $request){
        /*
            SELECT count(*) FROM `studenti` as s 
            join `note` as n on s.id=id_student 
            join `examene` as e on e.id=id_examen 
            join `discipline` as d on d.id=id_disciplina
            where nume_disciplina="informatica 1"
            group by id_student,id_disciplina
            having max(nota)>=5;
        */
        $select_options = DB::table('discipline')
            ->select('nume_disciplina')
            ->get();
        $total_student = DB::table('note')
            ->count(DB::raw('DISTINCT id_student'));
        $promoted_students = DB::table('studenti')
            ->join('note', 'studenti.id', '=', 'id_student')
            ->join('examene', 'examene.id', '=', 'id_examen')
            ->join('discipline', 'discipline.id', '=', 'id_disciplina')
            ->where('nume_disciplina','=',request()->disciplina)
            ->groupBy('id_disciplina','id_student')
            ->havingRaw('max(nota)>=5')
            ->count(DB::raw('DISTINCT id_student'));
        $promoted_rate = intval(($promoted_students * 100) / $total_student);
        return view('pagini.P8', ['select_options' => $select_options, 
                                    'disciplina' => request()->disciplina, 
                                    'rata' => $promoted_rate]);
    }

    public function show_p9(){
        /*
        select nume,prenume,legitimatie,max(case an when 1 then mnota else null end) as nota_an_1,
            max(case an when 2 then mnota else null end) as nota_an_2,
            max(case an when 3 then mnota else null end) as nota_an_3 from 
            (SELECT nume,prenume,legitimatie,an_studiu as an,max(nota) as mnota FROM `studenti` as s 
                join `note` as n on s.id=id_student 
                join `examene` as e on e.id=id_examen 
                join `discipline` as d on d.id=id_disciplina
                group by id_student,an_studiu
                order by legitimatie,an_studiu) x
            group by legitimatie
            having (nota_an_1<5 or nota_an_3<5) and nota_an_2<5
        */
        $subQuery = DB::table('studenti')
            ->selectRaw('nume, prenume, legitimatie, an_studiu as an,max(nota) as mnota')
            ->join('note', 'studenti.id', '=', 'id_student')
            ->join('examene', 'examene.id', '=', 'id_examen')
            ->join('discipline', 'discipline.id', '=', 'id_disciplina')
            ->groupBy('id_student','an_studiu')
            ->orderByRaw('legitimatie,an_studiu');

        $student = DB::table(DB::raw('(' . $subQuery->toSql() . ') as x'))
            ->selectRaw('nume,prenume,legitimatie,max(case an when 1 then mnota else null end) as nota_an_1,
                        max(case an when 2 then mnota else null end) as nota_an_2,
                        max(case an when 3 then mnota else null end) as nota_an_3')
            ->groupBy('legitimatie')
            ->havingRaw('(nota_an_1<5 or nota_an_3<5) and nota_an_2<5')
            ->get();
            
        return view('pagini.P9', ['studenti' => $student]);
    }

    public function show_p10(){
        /*
        SELECT legitimatie,nume,prenume,count(numar_prezentare) as prezentari,
            SUM(CASE When nota>=5 Then 1 Else 0 End) as promovat 
            FROM `studenti` as s 
            join `note` as n on s.id=id_student 
            join `examene` as e on e.id=id_examen 
            join `discipline` as d on d.id=id_disciplina
            group by id_student;
        */
        $student = DB::table('studenti')
            ->join('note', 'studenti.id', '=', 'id_student')
            ->join('examene', 'examene.id', '=', 'id_examen')
            ->join('discipline', 'discipline.id', '=', 'id_disciplina')
            ->select('nume','prenume',
                DB::raw('count(numar_prezentare) as prezentari,SUM(CASE When nota>=5 Then 1 Else 0 End) as promovat'))
            ->groupBy('id_student')
            ->get();
        return view('pagini.P10', ['studenti' => $student]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'nume' => 'required',
            'prenume' => 'required',
            'legitimatie' => 'required'            
        ));

        $studenti = Student::create($request->all());

        return redirect()->route('studenti');
    }




    /*  public function index() {
        //$title = "Welcome to pagina studenti";
        //print_r($title);
        $studenti = Student::all();
        // $studenti = Student::where('id','=','1')
        //     ->get();
        /*$data = [
            [1, 'Ana', 'Banana', 12345],
            [2, 'Petru', 'Movila', 13476],
            [3, 'Salai', 'Baltai', 55555]
        ];*/

    /*return view('pagini.students',[
            'data' => $data
        ]);*/
    //dd($studenti);
    // return view('pagini.students', [
    //   'studenti' => $studenti
    // ]);

    /*      return view('pagini.P7');
    }

    public function store(Request $request) {
        $posts = DB::table('studenti')
            ->insert([
                'nume' => 'John',
                'prenume' => 'Smith',
                'legitimatie' => 12358
            ]); */

    //$posts = DB::table('studenti')
    //->where('id', '=', 4)
    //->update([
    //'legitimatie' => 12359
    //]);

    //$posts = DB::table('studenti')
    //->where('id', '=', 4)
    //->delete();
    /*    }

    public function show($id) {
        $id=1;
        $posts = DB::table('studenti')
            ->where('id', $id)
            ->get();
        //$posts = DB::select('select * from studenti where id=?', [1]);
        //$posts = DB::select('select * from studenti where id=:id', ['id'=>1]);
        dd($posts);
    }
 */
    //public function edit($id) {}

    //public function update(Request $request, $id){} 

    //public function destroy($id) 

    /* public function display() {
        $title = "Welcome to pagina studenti";
        $description = "Created by students";
        $data = [
            'studOne' => 'Ana',
            'studTwo' => 'Banana'
        ];

        //compact method
        // return view('pagini.index', 
        // compact('title', 'description'));

        //with method
        return view('pagini.index')->with('data', $data);
        
        // return view('pagini.index', [
        //     'data' => $data
        // ]);
    } */

    // public function show($name){
    //     $data = [
    //         'ana' => 'Ana',
    //         'banana' => 'Banana'
    //     ];

    //     return view('pagini.index', [
    //            'name' => $data[$name] ?? 'Studentul ' . $name . ' nu exista'
    //     ]);
    // } */
}
