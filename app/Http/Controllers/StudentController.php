<?php

namespace App\Http\Controllers;

use App\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $estudiantes = Students::all();
        return view('welcome',compact('estudiantes'));
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
    return redirect (route('home'))->with('successMsg','Estudiante añadido correctamente');

    }

    public function edit($id){
        $estudiante = Students::find($id);
        return view('edit',compact('estudiante'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'nombre' => 'required',
            'mail' => 'required',
            'telefono' => 'required'
        ]
    );
    $estudiante = Students::find($id);
    $estudiante->nombre = $request->nombre;
    $estudiante->apellidos = $request->apellidos;
    $estudiante->mail = $request->mail;
    $estudiante->telefono = $request->telefono;
    $estudiante->save();
    return redirect (route('home'))->with('successMsg','Estudiante modificado correctamente');

    }
}
