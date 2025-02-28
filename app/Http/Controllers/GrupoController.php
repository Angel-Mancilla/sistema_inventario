<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    //

    public function index(Grupo $grupos){

        // $grupos->orderby('id')->paginate();
        $grupos = Grupo::orderBy('id')->paginate();
        return view('inventario.grupo.index', compact('grupos'));



    }

    public function create(){

        return view('inventario.grupo.create');

    }


    public function store(Request $request){

        $request->validate([
            'descripcion' => 'required|string|max:255|not_regex:/<[^>]*>/',
            'estado' => 'required|in:0,1'


        ]);

        $grupo = Grupo::create([
            'descripcion' => $request->input('descripcion'),
            'estado' => $request->boolean('estado') // Convierte "1" a true y "0" a false
        ]);

        return redirect()->route('grupo.index');

    }

    public function edit(Grupo $grupo){

        return view('inventario.grupo.edit',compact('grupo'));


    }

   public function update(Request $request, Grupo $grupo){

    $request->validate([
        'descripcion' => 'required|string|max:255|not_regex:/<[^>]*>/',
        'estado' => 'required|in:0,1'


    ]);

    $grupo->update($request->all());

    return redirect()->route('grupo.index');

   }

   public function destroy(Grupo $grupo){

    $grupo->delete();

    return redirect()->route('grupo.index');



   }
}
