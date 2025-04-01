<?php 
namespace App\Repositories;
use App\Interfaces\CategoriaRepositoryInterface;
use App\Models\Categoria;

class CategoriaRepository implements CategoriaRepositoryInterface{

    public function getAllCategorias()
    {
        return Categoria::orderby('id')->paginate();
    }   
    
    public function getCategoriaById(Categoria $categoria)
    {
        
    }

    public function deleteCategoria(Categoria $categoria)
    {
        return $categoria->delete();
    }

    public function createCategoria(array $requestValidated)
    {
        return Categoria::create([
            'descripcion' => $requestValidated['descripcion'],
            'estado' => $requestValidated['estado'] ?? false, 
        ]);
    }

    public function updateCategoria(Categoria $categoria, array $requestValidated)
    {
        return $categoria->update([
            'descripcion' => $requestValidated['descripcion'],
            'estado' => $requestValidated['estado'] ?? false, 
        ]);
    }

    public function existsCategoria(string $descripcion)
    {
        return Categoria::where('descripcion',$descripcion)->first();
    }
}