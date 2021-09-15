<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoModel extends Model{
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    protected $fillable = ['nombre_producto', 'desc_producto', 'url_imagen', 'precio', 'cantidad_s', 'cantidad_m', 'cantidad_g', 
    'busto_s', 'busto_m', 'busto_g', 'largo_s', 'largo_m','largo_g','manga_s','manga_m','manga_g', 'activo'];
    public $timestamps = false;
}
