<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    //
    public function categoria(){

        return $this->belongsTo(Categoria::class); //un articulo pertenece a una categoria



    }

    public function grupo(){

        return $this->belongsTo(Grupo::class);//Un articulo perrtenece a un grupo


    }
}
