<?php

namespace App\Repositories;
use App\Models\Articulo;
use App\Interfaces\ArticuloRepositoryInterface;

class ArticuloRepository implements ArticuloRepositoryInterface
{
    public function getAllArticulos()
    {
        // $articulos = Articulo::with(['categoria','grupo'])->orderby('id')->paginate();
        return Articulo::with(['categoria','grupo'])->orderby('id')->paginate();

    }

    public function getArticuloById(Articulo $articulo)
    {
        $articulo->load(['categoria','grupo']);
        return $articulo;
    }

    public function deleteArticulo(Articulo $articulo)
    {
        return $articulo->delete();
    }

    public function createArticulo(array $requestValidated)
    {
        return Articulo::create([
            'descripcion' => $requestValidated['descripcion'],
            'categoria_id' => $requestValidated['categoria_id'],
            'grupo_id' => $requestValidated['grupo_id'],
            'stock' => $requestValidated['stock'],
            'estado' => $requestValidated['estado'] ?? false,



        ]);
    }

    public function updateArticulo( Articulo $articulo, array $requestValidated)
    {
        return $articulo->update([
            'descripcion' => $requestValidated['descripcion'],
            'categoria_id' => $requestValidated['categoria_id'],
            'grupo_id' => $requestValidated['grupo_id'],
            'stock' => $requestValidated['stock'],
            'estado' => $requestValidated['estado'] ?? false,

        ]);
    }


    // public function getFulfilledArticulos()
    // {
        
    // }

}