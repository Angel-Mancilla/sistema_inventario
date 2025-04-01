<?php

namespace App\Services;

use App\Interfaces\ArticuloRepositoryInterface;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Grupo;
use Exception;

class ArticuloService
{

    protected ArticuloRepositoryInterface $articuloRepository;

    public function __construct(ArticuloRepositoryInterface $articuloRepository)
    {
        $this->articuloRepository = $articuloRepository;
    }

    public function getAllArticulos(){
      try {
        return $this->articuloRepository->getAllArticulos();
      } catch(\Exception $e) {
        throw new Exception("Ocurrio un error al obtener la lista de articulos");
      }
        

    }

    public function getArticuloById(Articulo $articulo){

        
        try {
            return $this->articuloRepository->getArticuloById($articulo);
        } catch(\Exception $e) {
            throw new Exception("No se pudo obtener el articulo.");
        }
        
    }

    public function createArticulo($requestValidated){
        try {
            return $this->articuloRepository->createArticulo($requestValidated);
        } catch(\Illuminate\Database\QueryException $e) {
            if($e->getCode() == "23000"){
                throw new Exception("El id del articulo ya esta registrado.");
            }
            throw new Exception("Error en la base de datos al crear el producto");
        } catch(\Exception $e) {
            throw new Exception("Ocurrio un error inesperado al crear el producto");
        }

    }

    public function updateArticulo(Articulo $articulo,$requestValidated){

        try {
            return $this->articuloRepository->updateArticulo($articulo,$requestValidated);
        } catch(\Illuminate\Database\QueryException $e) {
            throw new Exception("Error en la base de datos al actualizar");
        } catch(\Exception $e) {
            throw new Exception("Ocurrio un error inesperado al actualizar el producto");
        }

    }


    public function deleteArticulo(Articulo $articulo){
        try {
            // if(!$articulo){
            //     throw new Exception("El artiuclon no existe o ya fue eliminado");
            // }
            return $this->articuloRepository->deleteArticulo($articulo);
        } catch(\Exception $e) {
            // $id = $articulo->id;
            throw new Exception("Ocurrio un error al intentar eliminar el articulo con id: ");
        }
        

    }

    public function getCategoriasActives(){

        return Categoria::activas()->get();

    }

    public function getGruposActives(){

        return Grupo::activas()->get();

    }
}