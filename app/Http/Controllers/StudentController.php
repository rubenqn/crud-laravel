<?php

namespace App\Http\Controllers;

use App\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function create(){
        //return "hola voy a crear algo grande";
        return view('create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'nombre' => 'required',
            'mail' => 'required',
            'telefono' => 'required'
        ]
    );
    $estudiante = new Students;
    $estudiante->nombre = $request->nombre;
    $estudiante->apellidos = $request->apellidos;
    $estudiante->mail = $request->mail;
    $estudiante->telefono = $request->telefono;
    $estudiante->save();
    return redirect (route('home'));

    }
}
