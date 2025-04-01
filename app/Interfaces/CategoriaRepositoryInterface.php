<?php 

namespace App\Interfaces;

use App\Models\Categoria;


interface CategoriaRepositoryInterface{

    public function getAllCategorias();
    public function getCategoriaById(Categoria $categoria);
    public function deleteCategoria(Categoria $categoria);
    public function createCategoria(array $requestValidated);
    public function updateCategoria(Categoria $categoria,array $requestValidated);
    public function existsCategoria(string $descripcion);


}