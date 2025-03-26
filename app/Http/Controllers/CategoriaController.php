<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Models\Categoria;
use App\Services\CategoriaService;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    protected CategoriaService $categoriaService;

    public function __construct(CategoriaService $categoriaService)
    {
        $this->categoriaService = $categoriaService;
    }

    public function index(){
        $categorias = $this->categoriaService->getAllCategorias();
        return view('inventario.categoria.index', compact('categorias'));
    }

    public function create(){
        return view('inventario.categoria.create');
    }

    public function store(StoreCategoriaRequest $request){  
        $requestValidated = $request->validated();
        $this->categoriaService->createCategoria($requestValidated);
        return redirect()->route('categoria.index');
    }

    public function edit(Categoria $categoria){
        return view('inventario.categoria.edit', compact('categoria'));
    }

    public function update(UpdateCategoriaRequest $request, Categoria $categoria){
        $requestValidated = $request->validated();
        $this->categoriaService->updateCategoria($categoria, $requestValidated);
        return redirect()->route('categoria.index')->with('success','Categoria se ha actualizado correctamente');
    }
    
    public function destroy(Categoria $categoria){
        $this->categoriaService->deleteCategoria($categoria);
        return redirect()->route('categoria.index');
    }
}
