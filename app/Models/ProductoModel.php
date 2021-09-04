<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoModel extends Model{
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    protected $fillable = ['nombre_producto', 'desc_producto', 'url_imagen', 'precio', 'cantidad', 'activo'];
    public $timestamps = false;
}
