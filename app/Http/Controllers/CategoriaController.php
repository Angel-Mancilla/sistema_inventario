<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //


    public function index(){

        $categorias = Categoria::orderby('id')->paginate();

        return view('inventario.categoria.index', compact('categorias'));

    }


    public function create(){


        return view('inventario.categoria.create');

    }

    public function store(Request $request){
        
        $request->validate([
            'descripcion' => 'required|string|max:255|not_regex:/<[^>]*>/',
            'estado' => 'required|in:0,1|'



        ]);


        $categoria = Categoria::create([
            'descripcion' => $request->input('descripcion'),
            'estado' => $request->boolean('estado')

        ]);

        return redirect()->route('categoria.index');

    }


    public function edit(Categoria $categoria){


        return view('inventario.categoria.edit', compact('categoria'));


    }


    public function update(Request $request, Categoria $categoria){
        $request->validate([
            'descripcion' => 'required|string|max:255|not_regex:/<[^>]*>/',
            'estado' => 'required|in:0,1'


        ]);


        $categoria->update([
            'descripcion' => $request->input('descripcion'),
            'estado' => $request->boolean('estado')


        ]);

        return redirect()->route('categoria.index')->with('success','Categoria se ha actualizado correctamente');
        

    }

    public function destroy(Categoria $categoria){

        $categoria->delete();


        return redirect()->route('categoria.index');

    }

}
