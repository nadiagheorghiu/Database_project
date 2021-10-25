<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamenController extends Controller
{
    public function index() {
        print_r(route('examene'));

        return view('pagini.examen');
    }
}
