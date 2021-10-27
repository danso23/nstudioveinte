@extends('layouts.app')

@section('css')
	<meta name="_token" content="{{ csrf_token() }}">
@endsection
@section('content')

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
@endsection
@section('script')
<script>
	var url_global = "{{ url('') }}";
</script>
@endsection