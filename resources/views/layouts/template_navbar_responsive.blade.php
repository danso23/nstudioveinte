 <!--Nav-->
 <nav id="navigation">
    <div class="container">
        <div class="row justify-content-center">
            <div class="inner-navigation">
                <ul id="menu-main-menu" class="menu">
                    <ul class="category-hero" class="menu">
                        <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                            <li class="nav-item dropdown">
                            <a class="textos-cafes nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-family: Playfair Display !important; font-size: 22px;" href="">Tienda</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @isset($datos['categorias'])
                                    @foreach ($datos['categorias'] as $categoria)
                                        <li style="list-style:none"><a class="textos-cafes" style="font-family: Playfair Display !important; font-size: 18px;" href="{{ url('/categoria') }}/{{ $categoria->id_categoria}}">{{ $categoria->nombre_categoria }}</a></li>
                                    @endforeach
                                @endisset
                                </ul>
                            </li>
                        </ul>
                        <li style="list-style:none"><a class="textos-cafes" style="font-family: Playfair Display !important; font-size: 22px;" href="{{ route('historia') }}">Nuestra historia</a></li>
                        <li style="list-style:none"><a class="textos-cafes" style="font-family: Playfair Display !important; font-size: 22px;" href="">Contacto</a></li>
                    </ul>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!--end nav-->