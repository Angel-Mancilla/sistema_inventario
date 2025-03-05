<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $fillable = ['descripcion','estado'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($categoria) {
            if ($categoria->articulos()->count() > 0) {
                return back()->with('error', 'No puedes eliminar esta categoría porque tiene artículos asociados.');
            }
        });
        
    }


    public function articulos(){

        return $this->hasMany(Articulo::class);//Una categoria tiene muchos articulos


    }
}
