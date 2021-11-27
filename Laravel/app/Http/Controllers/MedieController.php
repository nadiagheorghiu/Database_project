<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medie;
use App\Models\Disciplina;
use App\Models\Student;
 
class MedieController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medii = Medie::All();
        return view('media', ['media' => $medii]);
    }

}
