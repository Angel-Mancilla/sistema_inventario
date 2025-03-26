<?php
namespace App\Services;

use App\Interfaces\GrupoRepositoryInterface;
use App\Models\Grupo;

class GrupoService{

    protected GrupoRepositoryInterface $grupoRepository;

    public function __construct(GrupoRepositoryInterface $grupoRepository)
    {
        $this->grupoRepository = $grupoRepository;
    }

    public function getAllGrupos(){

        return $this->grupoRepository->getAllGrupos();

    }

    public function getGrupoById(Grupo $grupo){

        return $this->grupoRepository->getGrupoById($grupo);

    }

    public function deleteGrupo(Grupo $grupo){

        return $this->grupoRepository->deleteGrupo($grupo);

    }

    public function createGrupo(array $requestValidated){

        $grupoExistente = $this->grupoRepository->existsGrupo($requestValidated['descripcion']);
        
        if(!$grupoExistente){
           
            return $this->grupoRepository->createGrupo($requestValidated);

        }
        
       

    }

    public function updateGrupo(Grupo $grupo, array $requestValidated){

        $grupoExistente = $this->grupoRepository->existsGrupo($requestValidated['descripcion']);

        if($grupoExistente && $grupoExistente->id === $grupo->id){

            return $this->grupoRepository->updateGrupo($grupo, $requestValidated);

        }


       

    }

}