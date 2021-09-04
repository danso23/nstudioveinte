@extends('layouts.app')

@section('content')
    <!--start content-->
    <section class="productos">
        <div class="container">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row justify-content-center mrl-q">
                <div class="col-md-2 col-lg-2 d-none d-sm-none d-md-block d-lg-block p-0 text-right content-category">
                    <ul class="category-hero" class="menu">
                        @foreach ($datos['categorias'] as $categoria)
                            <li><a href="{{ url('/categoria') }}/{{ $categoria->id_categoria}}">{{ $categoria->nombre_categoria }}</a></li>
                        @endforeach
                    </ul>
                    <div class="col-12 info text-left">
                        <p>Envíos gratuitos en compras superiores a $999</p>
                        <p class="m-0">Debido a las medidas actuales para proteger la seguridad de los empleados de nuestro centro de distribución con motivos del COVID-19, las entregas pueden presentar un retraso. Puedes consultar el estatus de tu pedido <a href="#">aquí</a>.</p>
                    </div>
                </div>
                @if(isset($datos['productos']))
                    <div class="col-12 col-sm-12 col-md-10 col-lg-10 p-0">
                        <div class="container">
                            <div class="row justify-content-center">
                                @foreach ($datos['productos'] as $producto)
                                    <div class="col-9 col-sm-4 col-md-4 col-lg-4 producto">
                                        <img src="{{ asset('img/productos')}}/{{ $producto->url_imagen }}" alt="" class="2-100" width="100%">
                                        <form action="{{ route('cart.add') }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-pink btn-add-sp">Añadir al carrito</button>
                                            <input type="hidden" name="id_producto" value="{{ $producto->id_producto }}">
                                        </form>
                                        <h5><a href="{{ url('productos/detalle') }}/{{ $producto->id_producto }}">{{ $producto->nombre_producto }}</a></h5>
                                        <span>$ {{ $producto->precio }}</span>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row pag-pro justify-content-center">
                                <div class="col-10 col-sm-3 text-center text-sm-left pag-prev">
                                    <a href="#" class="textos-grises">Anterior</a>
                                </div>
                                <div class="col-10 col-sm-6 text-center pro-pagination">
                                    <div class="col-12 text-center">
                                        <ul class="m-0">
                                            <li class="textos-cafes">Página</li>
                                            <li class="textos-cafes"><a href="">1</a></li>
                                            <li class="textos-cafes">de</li>
                                            <li class="textos-cafes"><a href="">5</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-10 col-sm-3 text-center text-sm-right pag-next">
                                    <a href="#" class="textos-grises">Siguiente</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 info text-left d-block d-sm-block d-md-none">
                        <p>Envíos gratuitos en compras superiores a $999</p>
                        <p class="m-0">Debido a las medidas actuales para proteger la seguridad de los empleados de nuestro centro de distribución con motivos del COVID-19, las entregas pueden presentar un retraso. Puedes consultar el estatus de tu pedido <a href="#">aquí</a>.</p>
                    </div>
                @endif
                @if(isset($datos['buscador']))
                    <div class="col-12 col-sm-12 col-md-10 col-lg-10 p-0">
                        <!-- AQUI PONES LO QUE VENGA DE TU BUSCADOR -->
                        @foreach ($datos['buscador'] as $producto)
                                    <div class="col-9 col-sm-4 col-md-4 col-lg-4 producto">
                                        <img src="{{ asset('img/productos')}}/{{ $producto->url_imagen }}" alt="" class="2-100" width="100%">
                                        <form action="{{ route('cart.add') }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-pink btn-add-sp">Añadir al carrito</button>
                                            <input type="hidden" name="id_producto" value="{{ $producto->id_producto }}">
                                        </form>
                                        <h5><a href="{{ url('productos/detalle') }}/{{ $producto->id_producto }}">{{ $producto->nombre_producto }}</a></h5>
                                        <span>$ {{ $producto->precio }}</span>
                                    </div>
                                @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection