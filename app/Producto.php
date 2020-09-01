<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $fillable = [
        'descripcion', 'imagen', 'precio_de_compra', 'precio_de_venta', 'stock', 'categoria_id'
    ];

    //Relacion de 1 a 1 con categoria
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
