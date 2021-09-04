@extends('layouts.app')

@section('content')
    <!--start content-->
    <section class="hero">
    <img class="d-block w-100" src="img/banner.png" alt="First slide" width="100%">
            <div class="container p-3">
                <p class="cursivas">La historia</p>
                    <div class="col-12 col-sm-6">   
                        <p class="textos-small">Nstudioveinte.mx nace del sueño de Nicole Pichardo, una joven yucateca. El proyecto da inicio de la mano de su novio Octavio García quien juntos complementaron las ideas para poder tener un espacio acogedor en cada una de las visitas de sus clientas. La primera boutique abre sus puertas el 9 de marzo del 2019.<br><br>
                        Nuestro propósito es muy claro, brindar la mejor calidad al mejor precio, representando exclusividad e innovación en cada una de las prendas. <br><br>
                        Nosotros buscamos acercarnos a las mejores propuestas de moda, además de transmitir nuestra dedicación y nuestro cuidado por los detalles. Ofrecemos una forma diferente de combinar todas las prendas de nuestras colecciones. 
                        </p>
                    </div>
                    <div class="d-lg-inline col-sm-12 col-md-6 col-12 text-lg-left text-center">
                        <img class="d-block w-100" src="img/historia.png" alt="First slide" width="100%">
                    </div>
                    </div>
            </div>
    </section>

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
    </section>
@endsection