<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Grupo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    //

    public function index(){

        $articulos = Articulo::with(['categoria','grupo'])->orderby('id')->paginate();

        return view('inventario.articulo.index', compact('articulos'));

    }

    public function create(){
        $categorias = Categoria::all();
        $grupos = Grupo::all();


        return view('inventario.articulo.create', compact('categorias','grupos'));


    }

    public function store(Request $request){

        $request->validate([
            'descripcion' => 'required|string|not_regex:/<[^>]*>/',
            'categoria_id' => 'required|integer|exists:categorias,id',
            'grupo_id' => 'required|integer|exists:grupos,id',
            'stock' => 'required|integer|min:0',
            'estado' => 'required|boolean'



        ]);


        Articulo::create([
            'descripcion' => $request->input('descripcion'),
            'categoria_id' => $request->categoria_id,
            'grupo_id' => $request->grupo_id,
            'stock' => $request->stock,
            'estado' => $request->boolean('estado')



        ]);


        return redirect()->route('articulo.index')->with('success','Articulo agregado correctamente');


    }

    public function edit(Articulo $articulo){

        $articulo->load(['categoria', 'grupo']);
        $categorias = Categoria::all();
        $grupos = Grupo::all();
    
        return view('inventario.articulo.edit',compact('articulo','categorias','grupos'));



    }

    public function update(Request $request, Articulo $articulo){

        $request->validate([
            'descripcion' => 'required|string|not_regex:/<[^>]*>/',
            'categoria_id' => 'required|integer|exists:categorias,id',
            'grupo_id' => 'required|integer|exists:grupos,id',
            'stock' => 'required|integer|min:0',
            'estado' => 'required|boolean'




        ]);

        $articulo->update([

            'descripcion' => $request->input('descripcion'),
            'categoria_id' => $request->categoria_id,
            'grupo_id' => $request->grupo_id,
            'stock' => $request->stock,
            'estado' => $request->boolean('estado')



        ]);
     
        

        return redirect()->route('articulo.index');
    }


    public function destroy(Articulo $articulo){

        $articulo->delete();

        return redirect()->route('articulo.index');
    }
}
