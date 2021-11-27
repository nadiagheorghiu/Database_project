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
        $studenti = Student::All();
        return view('student', ['student' => $studenti]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adaugare_student');
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

        $studenti = new Student();

        $studenti->nume = $request->nume;
        $studenti->prenume = $request->prenume;
        $studenti->legitimatie = $request->legitimatie;
        
        $studenti->save();

        return redirect()->route('student');
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
