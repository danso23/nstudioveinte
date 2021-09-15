@extends('layouts.app')

@section('content')
    <!--start content-->
    <section class="hero">
        <img class="d-block w-100" src="public/img/banner.png" alt="First slide" width="100%">
        <div class="col-12 mt-3 text-center">
            @foreach($datos['categorias'] as $cat)
                <div class="d-inline">
                    <a href="{{ url('/categoria') }}/{{ $cat->id_categoria}}" class="a-menu"><span class="textos-cafes">{{ $cat->nombre_categoria }}</span></a>
                </div>
            @endforeach
        </div>
        <div class="container mt-4">
            <div class="row align-items-start text-center" style="justify-content:center;">
                <div class="col-lg-12 col-s-12">
                    <p class="cursivas" style="text-align: left;">Menú</p>
                    <p class="textos-small" style="text-align: left;">MENÚ DE PRODUCTOS
                        </p>
                    
                </div>
            </div>
        </div>
    </section>
    <section class="hero">
        <div class="container mt-4">
            <div class="row align-items-start text-center" style="justify-content:center;">
                <div class="col-lg-5 col-s-12">
                    <p class="cursivas" style="text-align: left;">La historia</p>
                    <div class="col-s-12" style="border:5px red solid;">
                        <img src="{{ asset('img/historia.png') }}" alt="index.php" width="65%">
                    </div>
                </div>
                <div class="col-lg-7 col-s-12 text-center">
                    <img src="{{ asset('img/historia.png') }}" alt="index.php" width="65%">
                </div>
            </div>
        </div>
    </section>

    <section class="hero">
        <div class="container mt-4">
            <div class="row align-items-start text-center" style="justify-content:center;">
                <div class="col-lg-5 col-s-12">
                    <p class="cursivas" style="text-align: left;">La historia</p>
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
    <!--start content
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
            <div class="row justify-content-center">
                @foreach ($datos['productos'] as $producto)
                <div class="col-10 col-sm-9 col-md-4 col-lg-4 producto">
                    <img src="{{ asset('img/productos')}}/{{ $producto->url_imagen }}" alt="" class="2-100" width="100%">
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
    </section>-->
    <section>
        <div class="container">
            <div class="row align-items-start text-center" style="justify-content:center;">
                <div class="col-lg-4 col-s-12">
                    <p class="cursivas" style="text-align: right;">Visión</p>
                    <p class="textos-small" style="text-align: right;">Nuestra visión es ofrecerle a las mujeres productos de calidad, con precios accesibles y en tendencia. Procurando siempre la comodidad y estilos en cada una de nuestras prendas y accesorios con los mejores diseños representativos de la marca.</p>
                </div>
                <div class="col-lg-4 col-s-12 text-center">
                    <img src="{{ asset('public/img/misionvision.png') }}" alt="index.php" style="width:65%;" >
                </div>
                <div class="col-lg-4">
                    <p class="cursivas" style="text-align: left;">Misión</p>
                    <p class="textos-small" style="text-align: left;">Posicionarnos en el mercado Yucateco como una marca líder a nivel local y nacional con el fin de ofrecer prendas a la vanguardia con la mejor calidad y a los mejores precios.</p>
                </div>
            </div>
        </div>
    </section>   
@endsection