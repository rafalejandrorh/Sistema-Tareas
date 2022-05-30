<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\tareas;
use Illuminate\Support\Facades\Auth;

class tareascontroller extends Controller
{
    public function store(Request $request){
        $request->validate([
            'titulo' => 'required|min:3'
        ]);

            $tarea = new tareas;
            $tarea->titulo = $request->titulo;
            $tarea->category_id = $request->category_id;
            $tarea->save();

        return redirect()->route('app')->with('success', 'Tarea creada correctamente');
    }

    public function index(){
        // Para enviar variable, aunque también se puede llamar directamente en la vista: Auth::user()->email;
        $tareas = tareas::all();
        $categories = Category::all();
        return view('tareas.index', ['tareas' => $tareas, 'categories' => $categories]);
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
