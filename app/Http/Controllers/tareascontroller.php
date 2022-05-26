<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tareas;

class tareascontroller extends Controller
{
    public function store(Request $request){
        $request->validate([
            'titulo' => 'required|min:3'
        ]);

            $tarea = new tareas;
            $tarea->titulo = $request->titulo;
            $tarea->save();

            return redirect()->route('app')->with('success', 'Tarea creada correctamente');
    }

    public function index(){
        $tareas = tareas::all();
        return view('tareas.index', ['tareas' => $tareas]);
    }

    public function show($id){
        $tareas = tareas::find($id);
        return view('tareas.show', ['tareas' => $tareas]);
    }

    public function update(Request $request, $id){
        $tareas = tareas::find($id);
        $tareas->titulo = $request->titulo;
        $tareas->save();

        //return view('tareas.index', ['success' => 'Tarea Actualizada']);
        return redirect()->route('app')->with('success', 'Tarea Actualizada'); 
    }

    public function destroy($id){
        $tareas = tareas::find($id);
        $tareas-> delete();

        return redirect()->route('app')->with('success', 'Tarea Eliminada'); 
    }

}
