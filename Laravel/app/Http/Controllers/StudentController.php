<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
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
    }

    public function show($name){
        $data = [
            'ana' => 'Ana',
            'banana' => 'Banana'
        ];

        return view('pagini.index', [
               'name' => $data[$name] ?? 'Studentul ' . $name . ' nu exista'
        ]);
    }
}
