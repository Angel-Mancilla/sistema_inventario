<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGrupoRequest;
use App\Http\Requests\UpdateGrupoRequest;
use App\Models\Grupo;
use App\Services\GrupoService;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    protected GrupoService $grupoService;

    public function __construct(GrupoService $grupoService)
    {
        $this->grupoService = $grupoService;
    }

    public function index(){
        $grupos = $this->grupoService->getAllGrupos();
        return view('inventario.grupo.index', compact('grupos'));
    }

    public function create(){
        return view('inventario.grupo.create');
    }

    public function store(StoreGrupoRequest $request){
        $requestValidated = $request->validated();

    
       $this->grupoService->createGrupo($requestValidated);
        return redirect()->route('grupo.index');

    }

    public function edit(Grupo $grupo){
        return view('inventario.grupo.edit',compact('grupo'));
    }

   public function update(UpdateGrupoRequest $request, Grupo $grupo){
    $requestValidated = $request->validated();

   $this->grupoService->updateGrupo($grupo, $requestValidated);
    return redirect()->route('grupo.index')->with('success','Grupo actualizado correctamente');
   }

   public function destroy(Grupo $grupo){
    $this->grupoService->deleteGrupo($grupo);
    return redirect()->route('grupo.index');
   }
}
