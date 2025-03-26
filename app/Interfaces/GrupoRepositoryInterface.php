<?php
namespace App\Interfaces;
use App\Models\Grupo;

interface GrupoRepositoryInterface{
    public function getAllGrupos();
    public function getGrupoById(Grupo $grupo);
    public function deleteGrupo(Grupo $grupo);
    public function createGrupo(array $requestValidated);
    public function updateGrupo(Grupo $grupo, array $requestValidated);
    public function existsGrupo(string $descripcion);
    
}