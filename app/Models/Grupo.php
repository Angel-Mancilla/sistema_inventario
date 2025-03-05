<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    //
    protected $fillable = ['descripcion', 'estado'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($grupo) {
            if ($grupo->articulos()->count() > 0) {
                return back()->with('error', 'No puedes eliminar esta Marca porque tiene artículos asociados.');
            }
        });
    }


    public function articulos(){
        
        return $this->hasMany(Articulo::class);//Un grupo tiene muchos articulos

    }
}
