<?php

namespace App\Services;

use App\Interfaces\ArticuloRepositoryInterface;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Grupo;

class ArticuloService
{

    protected ArticuloRepositoryInterface $articuloRepository;

    public function __construct(ArticuloRepositoryInterface $articuloRepository)
    {
        $this->articuloRepository = $articuloRepository;
    }

    public function getAllArticulos(){

        return $this->articuloRepository->getAllArticulos();

    }

    public function getArticuloById(Articulo $articulo){

        

        return $this->articuloRepository->getArticuloById($articulo);
    }

    public function createArticulo($requestValidated){

        return $this->articuloRepository->createArticulo($requestValidated);


    }

    public function updateArticulo(Articulo $articulo,$requestValidated){


        return $this->articuloRepository->updateArticulo($articulo,$requestValidated);


    }


    public function deleteArticulo(Articulo $articulo){

        return $this->articuloRepository->deleteArticulo($articulo);

    }

    public function getCategoriasActives(){

        return Categoria::activas()->get();

    }

    public function getGruposActives(){

        return Grupo::activas()->get();

    }
}