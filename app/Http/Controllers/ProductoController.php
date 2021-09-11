<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\ProductoModel AS Producto;
use App\Models\CategoriaModel AS Categoria;
use Illuminate\Support\Arr;
use App\Http\Controllers\UtilsController AS Utils;
use DB;

class ProductoController extends Controller{
    public function __construct(){
        $this->table ="productos";
        $this->id ="id_producto";
    }

    /******SECCIÓN ADMINISTRADO******/

    public function mostrarProductosView(){
        $categorias = Categoria::where('activo', '1')->selectRaw('id_categoria, nombre_categoria')->get();
        $datos = array('categorias' => $categorias );
    	return view('admin.productos')->with('datos', $datos);
    }

    /** JSON PARA ADMIN**/
    public function jsonProductos(){
        $productos = Producto::all();
        return Response::json($productos);
    }

    public function storeProducto(Request $request, $id){
        DB::beginTransaction();
        try {
            if($id != 0){
                $producto = Producto::where('id_producto', $id)
                ->update([
                    'nombre_producto' => $request->nombre,
                    'desc_producto' => $request->desc_curso,
                    'url_imagen' => $request->portada,
                    'precio' => $request->precio,
                    'cantidad_s' => $request->cantidad_s,
                    'cantidad_m' => $request->cantidad_m,
                    'cantidad_g' => $request->cantidad_g,
                    'busto_s' => $request->busto_s,
                    'busto_m' => $request->busto_m,
                    'busto_g' => $request->busto_g,
                    'largo_s' => $request->largo_s,
                    'largo_m' => $request->largo_m,
                    'largo_g' => $request->largo_g,
                    'manga_s' => $request->manga_s,
                    'manga_m' => $request->manga_m,
                    'manga_g' => $request->manga_g
                    //'id_categoria' => $request->categoria
                ]);
                $result = array(
                    "Error" => false,
                    "message" => "Se ha editado con exito el curso con folio [$id]"
                );
            }
            else{
                $temario = new Curso();
                $temario->nombre = $request->nombre;
                $temario->desc_curso = $request->desc_curso;
                $temario->portada = $request->portada;
                $cantidad_s->cantidad_s = $request->cantidad_s;
                $cantidad_m->cantidad_m = $request->cantidad_m;
                $cantidad_g->cantidad_g = $request->cantidad_g;
                $busto_s->busto_s = $request->busto_s;
                $busto_m->busto_m = $request->busto_m;
                $busto_g->busto_g = $request->busto_g;
                $largo_s->largo_s = $request->largo_s;
                $largo_m->largo_m = $request->largo_m;
                $largo_g->largo_g = $request->largo_g;
                $manga_s->manga_s = $request->manga_s;
                $manga_m->manga_m = $request->manga_m;
                $manga_g->manga_g = $request->manga_g;
                $temario->id_categoria = $request->categoria;
                $temario->activo = 1;
                $temario->save();
                $result = array(
                    "Error" => false,
                    "message" => "Se ha guardado con exito el producto ",
                    "iId" => $temario->id
                );
            }
        }
        catch (\Exception $e) {
            DB::rollback();
            $result = array(
                "Error" => true,
                "message" => "Ha ocurrido un error, por favor contacte al administrador o inténtelo más tarde | ".$e
            );
            return Response::json($result);
        }
        DB::commit();
        return Response::json($result);
    }
    /******FIN SECCIÓN ADMINISTRADO******/
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
        ->selectRaw('productos.id_producto, categorias.nombre_categoria, productos.nombre_producto, productos.desc_producto, productos.url_imagen, productos.precio, productos.cantidad_s, productos.cantidad_m, productos.cantidad_g, productos.busto_s, productos.busto_m, productos.busto_g, productos.largo_s, productos.largo_m, productos.largo_g, productos.manga_s, productos.manga_m, productos.manga_g')
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