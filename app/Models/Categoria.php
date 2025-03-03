<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $fillable = ['descripcion','estado'];

    public function articulos(){

        return $this->hasMany(Articulo::class);//Una categoria tiene muchos articulos


    }
}
