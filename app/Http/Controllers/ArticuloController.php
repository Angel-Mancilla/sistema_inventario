<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticuloRequest;
use App\Http\Requests\UpdateArticuloRequest;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Grupo;
// use App\Repositories\ArticuloRepository;
use App\Interfaces\ArticuloRepositoryInterface;
use App\Services\ArticuloService;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    
    protected ArticuloService $articuloService;

    public function __construct(ArticuloService $articuloService){
       
        $this->articuloService = $articuloService;


    }

    public function index(){

        $articulos = $this->articuloService->getAllArticulos();

        return view('inventario.articulo.index', compact('articulos'));

    }

    public function create( Grupo $grupo){

        $categorias = $this->articuloService->getCategoriasActives();
        $grupos = $this->articuloService->getGruposActives();

        

        return view('inventario.articulo.create', compact('categorias','grupos'));


    }

    public function store(StoreArticuloRequest $request){

        $requestValidated = $request->validated();

        $this->articuloService->createArticulo($requestValidated);

        


        return redirect()->route('articulo.index')->with('success','Articulo agregado correctamente');


    }

    public function edit(Articulo $articulo){

    
        $articulo = $this->articuloService->getArticuloById($articulo);
        $categorias = $this->articuloService->getCategoriasActives();
        $grupos = $this->articuloService->getGruposActives();
        return view('inventario.articulo.edit',compact('articulo','categorias','grupos'));



    }

    public function update(UpdateArticuloRequest $request, Articulo $articulo){

        $requestValidated = $request->validated();
        
        $this->articuloService->updateArticulo($articulo, $requestValidated);
        

        return redirect()->route('articulo.index');
    }


    public function destroy(Articulo $articulo){

        $this->articuloService->deleteArticulo($articulo);

        return redirect()->route('articulo.index');
    }
}
