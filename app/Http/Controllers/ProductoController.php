<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\ProductoModel AS Producto;
use App\Models\CategoriaModel AS Categoria;
use Illuminate\Support\Arr;
use App\Http\Controllers\UtilsController AS Utils;

class ProductoController extends Controller{
    public function __construct(){
        $this->table ="productos";
        $this->id ="id_producto";
    }

    public function index(){
    	$productos = Producto::where('activo', '1')->get();
        $categorias = Categoria::where('activo', '1')->selectRaw('id_categoria, nombre_categoria')->get();
        $utils = new Utils();
        foreach($productos as $producto){
            $monedaConvertida = $utils->convertCurrency($producto->precio);//$this->convertCurrency($producto->precio);
            $producto->precio = $monedaConvertida;
        }
        $datos = array('productos' => $productos, 'categorias' => $categorias );
    	return view('productos')->with('datos', $datos);
    }

    public function home(){
    	$productos = Producto::where('activo', '1')->take(3)->get();
        $categorias = Categoria::where('activo', '1')->selectRaw('id_categoria, nombre_categoria')->get();
        $utils = new Utils();
        foreach($productos as $producto){
            $monedaConvertida = $utils->convertCurrency($producto->precio);//$this->convertCurrency($producto->precio);
            $producto->precio = $monedaConvertida;
        }
        $datos = array('productos' => $productos, 'categorias' => $categorias);
    	return view('home')->with('datos', $datos);
    }

    public function productoDescripcion($id){
    	$productos = Producto::where('id_producto', $id)->get();
        $categorias = Categoria::where('activo', '1')->selectRaw('id_categoria, nombre_categoria')->get();
        $utils = new Utils();
        if(!empty($productos[0])){
            $monedaConvertida = $utils->convertCurrency($productos[0]->precio);//$this->convertCurrency($productos[0]->precio);
            $productos[0]->precio = $monedaConvertida;
        }
        else{
            $productos[0] ="";
        }
        $datos = array('productos' => $productos[0], 'categorias' => $categorias);
    	return view('producto_descripcion')->with('datos', $datos);
    }

    public function productoXCategoria($id){
        $productos = Producto::join('categorias', 'productos.id_categoria', 'categorias.id_categoria')
        ->selectRaw('productos.id_producto, categorias.nombre_categoria, productos.nombre_producto, productos.desc_producto, productos.url_imagen, productos.precio')
        ->where('productos.id_categoria', $id)
        ->where('productos.activo', 1)
        ->get();
        $categorias = Categoria::where('activo', '1')->selectRaw('id_categoria, nombre_categoria')->get();
        $utils = new Utils();
        foreach($productos as $producto){
            $monedaConvertida = $utils->convertCurrency($producto->precio);//$this->convertCurrency($producto->precio);
            $producto->precio = $monedaConvertida;
        }
        $datos = array('productos' => $productos, 'categorias' => $categorias);
        return view('categoria')->with('datos', $datos);
        
    }

    public function buscador(Request $request){
        $p = $this->table; ##Productos
        $buscador = (isset($request->buscador) && $request->buscador != "") ? $request->buscador : '';
        $productos = Producto::where("$p.nombre_producto", "LIKE", '%'. $buscador .'%')
            ->join('categorias as c', "$p.id_categoria", 'c.id_categoria')
            ->selectRaw("$p.id_producto, $p.id_categoria, c.nombre_categoria, $p.nombre_producto, $p.desc_producto, $p.url_imagen, $p.precio, $p.cantidad, $p.activo")
        ->get();
        $categorias = Categoria::where('activo', '1')->selectRaw('id_categoria, nombre_categoria')->get();
        $datos = array('buscador' => $productos, 'categorias' => $categorias );
        return view('productos')->with('datos', $datos);
    }

    public function quienesSomos(){
        $categorias = Categoria::where('activo', '1')->selectRaw('id_categoria, nombre_categoria')->get();
        $datos = array('categorias' => $categorias);
        return view('quienesSomos')->with('datos', $datos);
    }
}