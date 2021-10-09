@extends('layouts.app')

@section('content')
    <!--start content-->
    <section class="hero" id="div-principal">
        <div class="container">
            <div id="home" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#home" data-slide-to="0" class="active"></li>
                    <li data-target="#home" data-slide-to="1"></li>
                    <li data-target="#home" data-slide-to="2"></li>
                </ul>
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="la.jpg" alt="Los Angeles" width="1100" height="500">
                    </div>
                    <div class="carousel-item">
                        <img src="chicago.jpg" alt="Chicago" width="1100" height="500">
                    </div>
                    <div class="carousel-item">
                        <img src="ny.jpg" alt="New York" width="1100" height="500">
                    </div>
                </div>
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>

            <div class="row align-items-start text-center" style="justify-content:center;">
                <div class="col-4 text-center" id="texto-principal">
                    <p id="cafes-principal">Nueva colección<p class="txt-cafe-cursivas" id="texto-exclusiva">exclusiva</p></p>
                    <button type="" class="btn btn-pink btn-add-sp" id="btn-principal">IR A TIENDA</button>
                </div>
            </div>
        </div>
    </section>
    <section class="">
        <div class="col-12 text-center mt-3">
            @foreach($datos['categorias'] as $cat)
                <div class="d-inline">
                    <a href="#" data-categoria="{{$cat->id_categoria}}" class="a-menu i-categoria" style="padding: 5px;"><span class="textos-cafes">{{ $cat->nombre_categoria }}</span></a>
                </div>
            @endforeach
        </div>
    </section>
    <!--start content -->
    <section class="section-productos">
        <div class="container">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row justify-content-center" id="div_Productos">
                @foreach ($datos['productos'] as $producto)
                <div class="col-10 col-sm-9 col-md-4 col-lg-4 producto">
                    <img src="{{ asset('public/img/productos')}}/{{ $producto->url_imagen }}" alt="" class="2-100" width="100%">
                    <form action="{{ route('cart.add') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-pink btn-add-sp">Añadir al carrito</button>
                        <input type="hidden" name="id_producto" value="{{ $producto->id_producto }}">
                    </form>
                    <h5><a class="textos-cafes" href="{{ url('productos/detalle') }}/{{ $producto->id_producto }}">{{ $producto->nombre_producto }}</a></h5>
                    <span class="textos-grises">$ {{ $producto->precio }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="">
        <div class="container mt-4">
            <div class="row align-items-start text-center" style="justify-content:center;">
                <div class="col-lg-12 col-s-12">
                    <p class="txt-cafe-cursivas" style="text-align: left;">Más vendidos</p>
                </div>
            </div>
        </div>
    </section>
    <section class="hero">
        <div class="container ">
            <div class="row align-items-start text-center" style="justify-content:center;">
                <div class="col-lg-6 col-s-12">
                    <div class="col-s-12 vendido01" style="text-align: left;float: left;width: 100%;">
                        <div style="background-color:#E6C8BD; width: 30%; height:310px; padding-top:80px;float:right">
                        <p class="txt-cafe-cursivas" style="text-align: left;">Conjunto azul y blanco</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-s-12 text-center">
                    <img src="{{ asset('public/img/productos/vendido02.png') }}" alt="index.php" width="100%">
                    <p class="txt-cafe-cursivas" style="text-align: left;">Vestido rosado</p>
                </div>
                <div class="col-lg-3 col-s-12 text-center">
                    <img src="{{ asset('public/img/productos/vendido03.png') }}" alt="index.php" width="100%">
                    <p class="txt-cafe-cursivas" style="text-align: left;">Sandalias negras</p>
                </div>
            </div>
        </div>
    </section>

    <section class="hero">
        <div class="container">
            <div class="row align-items-start text-center" style="justify-content:center;">
                <div class="col-lg-5 col-s-12">
                    <p class="txt-cafe-cursivas" style="text-align: left;">La historia</p>
                    <p class="textos-small" style="text-align: left;">Nstudioveinte.mx nace del sueño de Nicole Pichardo, una joven yucateca. El proyecto da inicio de la mano de su novio Octavio García quien juntos complementaron las ideas para poder tener un espacio acogedor en cada una de las visitas de sus clientas. La primera boutique abre sus puertas el 9 de marzo del 2019.<br><br>
                        Nuestro propósito es muy claro, brindar la mejor calidad al mejor precio, representando exclusividad e innovación en cada una de las prendas. <br><br>
                        Nosotros buscamos acercarnos a las mejores propuestas de moda, además de transmitir nuestra dedicación y nuestro cuidado por los detalles. Ofrecemos una forma diferente de combinar todas las prendas de nuestras colecciones. 
                        </p>
                    
                </div>
                <div class="col-lg-7 col-s-12 text-center">
                    <img src="{{ asset('public/img/historia.png') }}" alt="index.php" width="65%">
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row align-items-start text-center" style="justify-content:center;">
                <div class="col-lg-4 col-s-12">
                    <p class="txt-cafe-cursivas" style="text-align: right;">Visión</p>
                    <p class="textos-small" style="text-align: right;">Nuestra visión es ofrecerle a las mujeres productos de calidad, con precios accesibles y en tendencia. Procurando siempre la comodidad y estilos en cada una de nuestras prendas y accesorios con los mejores diseños representativos de la marca.</p>
                </div>
                <div class="col-lg-4 col-s-12 text-center" id="img-vision">
                    <img src="{{ asset('public/img/misionvision.png') }}" alt="index.php" style="width:65%;" >
                </div>
                <div class="col-lg-4">
                    <p class="txt-cafe-cursivas" style="text-align: left;">Misión</p>
                    <p class="textos-small" style="text-align: left;">Posicionarnos en el mercado Yucateco como una marca líder a nivel local y nacional con el fin de ofrecer prendas a la vanguardia con la mejor calidad y a los mejores precios.</p>
                </div>
            </div>
        </div>
    </section>   
@endsection