<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="{{ asset('js/all.js') }}" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="{{ asset('css/font-family.css') }}" rel="stylesheet" /><!-- Merriweather-->
    <link href="{{ asset('css/font-family2.css') }}" rel="stylesheet" type="text/css" />
    <!-- Third party plugin CSS-->
    <link href="{{ asset('css/magnific-popup.min.css') }}" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- AOS ANIMATION -->
    <link rel="stylesheet" type="text/css" href="{{ asset('animation_aos/aos.css') }}">
    @yield('css')
</head>
<body>
    <div id="app">
       <!-- HEADER -->
        <div class="col-12 text-center barra-top m-0">
            <h3 class="textos-grises">Descuentos hasta un 30% <br class="d-block d-sm-block d-md-none d-lg-none">
            <span>Consultas las bases <a href="#" class="textos-cafes">aquí</a> </span></h3>
        </div>
        <div class="col-12 container info-nav">
            <div class="col-12 mrl-q">
                <header id="site-header">
                    <a href="{{ asset('/')}}" class="logo">
                        <img src="{{ asset('img/logo.svg') }}" class="logo-black" alt="">
                        <!-- <img src="img/logo.svg" class="logo-white" alt=""> -->
                    </a>
                        
                    <ul class="menu-right m-0">
                        <li>
                            <a href="#" class="icon-search" data-toggle="modal" data-target="#exampleModal">
                                <img src="{{ asset('icons/busqueda.svg') }}" alt="Busqueda">
                            </a>
                        </li>
                        <li>
                            @if (count(Cart::getContent()))
                                <a href="{{ route('cart.checkout') }}" class="icon-shopping"><img src="{{ asset('icons/carrito.svg') }}" alt="Carrito"><span class="badge badge-danger">{{count(Cart::getContent())}}</span></a>
                            @else
                                <a href="{{ route('cart.checkout') }}" class="icon-shopping"><img src="{{ asset('icons/carrito.svg') }}" alt="Carrito"></a>
                            @endif
                        </li>
                        <li class="menu-m">
                            <button type="button" class="toggle-menu btn-primary">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </li>   
                    </ul>
                    
                    
                </header>
            </div>    
        </div>   
        @include('layouts.template_navbar_responsive')
        <!-- END HEADER -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header p-0">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text icon-search" id="basic-addon1"><i class="fas fa-search fa-rotate-90"></i></span>
                            </div>
                            <input type="text" class="form-control form-search" placeholder="" aria-label="Username" aria-describedby="basic-addon1" id="txtSearch">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <main class="@if (Request::is('/')) py-0 @else py-4 @endif" data-aos="fade-in">
            @yield('content')
        </main>
        <!--footer-->
        <footer class="site-footer">
        <div class="container">
            <div class="row align-items-start text-center" style="justify-content:center;">
                <div class="col-8 text-center">
                    <a href=""><img src="{{ asset('img/logo.svg') }}" alt="index.php" class="img-fluid" ></a>
                    <p class="textos-cafes">Boutique dedicada a la venta de ropa de mujer,  donde el diseño y la tendencia tienen un espacio. </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-start text-center">
                <div class="col text-center">
                    <a href="https://www.facebook.com/nstudioveinte.mx/"><img src="{{ asset('icons/iconofacebook.svg') }}" alt="index.php" class="img-icons" ></a>
                    <a href="https://instagram.com/nstudioveinte.mx?utm_medium=copy_link"><img src="{{ asset('icons/iconoinstagram.svg') }}" alt="index.php" class="img-icons" ></a>
                </div>
                <div class="col text-center">
                <a href=""><img src="{{ asset('icons/iconoxxopay.svg') }}" alt="index.php" class="img-icons" ></a>
                    <a href=""><img src="{{ asset('icons/iconovisa.svg') }}" alt="index.php" class="img-icons" ></a>
                    <a href=""><img src="{{ asset('icons/iconomastercard.svg') }}" alt="index.php" class="img-icons" ></a>
                </div><br><br><br>
            </div>
        </div>
            <div class="col-12 text-center copyright">
                <ul class="m-0">
                    <li class="textos-grises">&copy; 2021 Desarrollo por...</li>
                    <li class="br-copy link-copy textos-cafes"><a class="textos-cafes" href="#"> &nbsp;Políticas de privacidad</a></li>
                    <li class="link-copy textos-cafes"><a class="textos-cafes" href="#">Términos y Condiciones</a></li>
                </ul>
            </div>
        </footer>
        <!--end footer-->
        <!-- Bootstrap core JS-->
        <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <!-- Third party plugin JS-->
        <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>
        <script type='text/javascript' src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/wow.min.js') }}"></script>
        <!-- Core theme JS-->
        <!-- <script src="{{ asset('js/scripts.js') }}"></script> -->
        <!-- AOS ANIMATION -->
        <script type="text/javascript" src="{{ asset('animation_aos/aos.js') }}"></script>
        <!-- INIT AOS -->
        <script type="text/javascript" src="{{ asset('js/animation.js') }}"></script>
        @yield('script')
    </div>
    </section> 
</body>
</html>
