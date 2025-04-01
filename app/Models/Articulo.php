<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion', 'categoria_id', 'grupo_id', 'stock', 'estado' ];
    //
    public function categoria(){

        return $this->belongsTo(Categoria::class); //un articulo pertenece a una categoria



    }

    public function grupo(){

        return $this->belongsTo(Grupo::class);//Un articulo perrtenece a un grupo


    }
}
