<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examen;
use App\Models\Disciplina;


class ExamenController extends Controller
{
   /*  public function index() {
        print_r(route('examene'));

        return view('pagini.examen');
    } */

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $discipline = Disciplina::All();
        $examene = Examen::select('examene.*', 'discipline.nume as disciplina')
            ->leftJoin('discipline', 'discipline.id', 'examene.id_discipline')->get(); #???
 
        return view(
            'examene',
            [
                'examene' => $examene
 
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
        return view('adaugare_examen');
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

            'id_disciplina' => 'required',
            'numar_prezentare' => 'required',
            'data_examen' => 'required'
        ));

        $examen = new Examen();

        $examen->id_disciplina = $request->id_disciplina;
        $examen->numar_prezentare = $request->numar_prezentare;
        $examen->data_examen = $request->data_examen;
 
        $examen->save();
 
        return view('adaugare_examen');
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


        $examene = Examen::findOrFail($id);
         
        $examene->save();


        return redirect()->route('editare_examen');
    } */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Examen::destroy($id);

        return redirect()->route('examen');
    }




}
