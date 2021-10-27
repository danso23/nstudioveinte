@extends('layouts.app')

@section('css')
	<meta name="_token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <!--start content-->
    <section class="hero" id="div-principal">
        
            <div id="home" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ul class="carousel-indicators">
                    @foreach($datos['carrusel'] as $caru)
                        <li data-target="#home" data-slide-to="{{$caru->id_carrusel}}"></li>
                    @endforeach
                </ul>
                <!-- The slideshow -->
                <div class="carousel-inner">
                    @foreach($datos['carrusel'] as $caru)
                        <div class="carousel-item @if($caru->id_carrusel == 1) active @endif">
                            <img src="{{asset('public/carrusel')}}/{{$caru->url}}" alt="{{$caru->descripcion}}" style="width:100%">
                        </div>
                    @endforeach
                </div>
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#home" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#home" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>

            <!-- <div class="row align-items-start text-center" style="justify-content:center;">
                <div class="col-4 text-center" id="texto-principal">
                    <p id="cafes-principal">Nueva colección<p class="txt-cafe-cursivas" id="texto-exclusiva">exclusiva</p></p>
                    <button type="" class="btn btn-pink btn-add-sp" id="btn-principal">IR A TIENDA</button>
                </div>
            </div> -->
        
    </section>
    <section class="">
        <div class="col-12 text-center mt-0">
            @foreach($datos['categorias'] as $cat)
                <div class="d-inline">
                    <a data-categoria="{{$cat->id_categoria}}" onclick="cargarCategoria({{$cat->id_categoria}});" class="a-menu i-categoria" style="padding: 5px;">
                    <img class="img-fluid img-icons" src="{{ asset('/public/img/categorias/') }}/{{ $cat->icono }}"><span class="textos-cafes" style="font-family: Playfair Display !important;">{{ $cat->nombre_categoria }}</span></a>
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
                        <div style="background-color:#E6C8BD; width: 30%; height:310px; padding-top:100px;float:right">
                        <p class="txt-cafe-cursivas" style="text-align: left; padding-left:8px">Conjunto azul y blanco</p>
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
       
@endsection
@section('script')
<script>
	var url_global = "{{ url('') }}";
</script>
@endsection