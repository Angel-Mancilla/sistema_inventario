<?php
namespace App\Services;
use App\Models\Categoria;
use App\Interfaces\CategoriaRepositoryInterface;

class CategoriaService{

protected CategoriaRepositoryInterface $categoriaRepository;

public function __construct(CategoriaRepositoryInterface $categoriaRepository)
{
    $this->categoriaRepository = $categoriaRepository;
}

public function getAllCategorias(){
    return $this->categoriaRepository->getAllCategorias();
}

public function getCategoriaById(Categoria $categoria){
    return $this->categoriaRepository->getCategoriaById($categoria);
}

public function deleteCategoria(Categoria $categoria){
    return $this->categoriaRepository->deleteCategoria($categoria);
}

public function createCategoria(array $requestValidated){
    return $this->categoriaRepository->createCategoria($requestValidated);
}

public function updateCategoria(Categoria $categoria, array $requestValidated){
    return $this->categoriaRepository->updateCategoria($categoria, $requestValidated);
}

}