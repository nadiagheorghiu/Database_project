<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\Examen;
use App\Models\Student;

class NotaController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $note = Nota::All();
        return view('nota', ['nota' => $note]);
    }

 
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $examene = Examen::All();
        $studenti = Student::All();
        return view('adaugare_nota', ['examen' => $examene, 'student' => $studenti]);
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

            'id_student' => 'required',
            'id_examen' => 'required',
            'nota' => 'required|digits'          

        ));


        $note = new Nota;

        $note->id_student = $request->id_student;
        $note->id_examen = $request->id_examen;
        $note->nota = $request->nota;
         
        $note->save();

        return redirect()->route("note");
    }

}
