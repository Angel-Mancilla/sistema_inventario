<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    //
    protected $fillable = ['descripcion', 'estado'];
    public function articulos(){
        
        return $this->hasMany(Articulo::class);//Un grupo tiene muchos articulos

    }
}
