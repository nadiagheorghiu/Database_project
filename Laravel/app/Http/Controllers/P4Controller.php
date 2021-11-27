<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\P4;
 
 
class P4Controller extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $P4 = P4::All();
        return view('P4', ['P4' => $P4]);
    }

}
