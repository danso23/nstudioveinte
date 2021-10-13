 <!--Nav-->
 <nav id="navigation">
    <div class="container">
        <div class="row justify-content-center">
            <div class="inner-navigation">
                <ul id="menu-main-menu" class="menu">
                    <ul class="category-hero" class="menu">
                        @isset($datos['categorias'])
                            @foreach ($datos['categorias'] as $categoria)
                                <li style="list-style:none"><a class="textos-cafes" href="{{ url('/categoria') }}/{{ $categoria->id_categoria}}">{{ $categoria->nombre_categoria }}</a></li>
                            @endforeach
                        @endisset
                    </ul>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!--end nav-->