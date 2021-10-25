<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $title = "Welcome to pagina studenti";
        print_r($title);
        $data = [
            [1, 'Ana', 'Banana', 12345],
            [2, 'Petru', 'Movila', 13476],
            [3, 'Salai', 'Baltai', 55555]
        ];

        return view('pagini.students',[
            'data' => $data
        ]);
    }

    public function display() {
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
