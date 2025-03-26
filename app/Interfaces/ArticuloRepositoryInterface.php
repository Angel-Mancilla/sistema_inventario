<?php

namespace App\Interfaces;

use App\Models\Articulo;

interface ArticuloRepositoryInterface
{
    public function getAllArticulos();
    public function getArticuloById(Articulo $articulo);
    public function deleteArticulo(Articulo $articulo);//articuloId
    public function createArticulo(array $requestValidated);
    public function updateArticulo(Articulo $articulo, array $requestValidated);
    // public function getFulfilledArticulos();


}