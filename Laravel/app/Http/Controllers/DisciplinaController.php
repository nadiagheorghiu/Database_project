<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;
use App\Models\Student;

class DisciplinaController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $studenti = Student::All();
        $discipline = Disciplina::select('discipline.*', 'studenti.nume as student')
            ->leftJoin('studenti', 'studenti.id', 'discipline.id_studenti')->get(); #???
 
        return view(
            'discipline',
            [
                'discipline' => $discipline
 
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adaugare_discipline');
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

            'nume_disciplina' => 'required',
            'an_studiu' => 'required'

        ));

        $discipline = new Disciplina();

        $discipline->nume_disciplina = $request->nume_disciplina;
        $discipline->an_studiu = $request->an_studiu;
 
        $discipline->save();
 
        return view('adaugare_discipline');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //not used
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
  /*   public function update(Request $request, $id)
    {


        $discipline = Disciplina::findOrFail($id);
         
        $discipline->save();


        return redirect()->route('editare_disciplina');
    } */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Disciplina::destroy($id);

        return redirect()->route('disciplina');
    }
}
