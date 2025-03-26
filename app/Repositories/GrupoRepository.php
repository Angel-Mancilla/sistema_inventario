<?php
namespace App\Repositories;

use App\Interfaces\GrupoRepositoryInterface;
use App\Models\Grupo;

class GrupoRepository implements GrupoRepositoryInterface{

    public function getAllGrupos()
    {
        return Grupo::orderBy('id')->paginate();
    }

    public function getGrupoById(Grupo $grupo)
    {
        
    }

    public function deleteGrupo(Grupo $grupo)
    {
        return $grupo->delete();
    }

    public function createGrupo(array $requestValidated)
    {
        return Grupo::create([
            'descripcion' => $requestValidated['descripcion'],
            'estado' => $requestValidated['estado'] ?? false // Convierte "1" a true y "0" a false
        ]);
    }

    public function updateGrupo(Grupo $grupo, array $requestValidated)
    {
        return  $grupo->update([
            'descripcion' => $requestValidated['descripcion'],
            'estado' => $requestValidated['estado'] ?? false, 
    
        ]);
    }

    public function existsGrupo(string $descripcion)
    {
        return  Grupo::where('descripcion',$descripcion)->first();
    }


}