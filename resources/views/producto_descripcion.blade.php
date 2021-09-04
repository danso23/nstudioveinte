@extends('layouts.app')

@section('content')
    <section class="description">
        @if (!empty($datos['productos']))
            <div class="container mod-producto">
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row justify-content-center product">
                    <div class="col-9 col-sm-6 col-md-3 img-desc">
                        <img src="{{ asset('img/productos') }}/{{ $datos['productos']->url_imagen }}" alt="" class="mx-auto d-block">
                    </div>
                    <div class="col-12 col-md-9 option-product">
                        <h4>{{ $datos['productos']->nombre_producto }}</h4>
                        <span>${{ $datos['productos']->precio }}</span>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam consequuntur, soluta animi quasi non accusantium voluptatum laboriosam et modi quisquam perspiciatis praesentium excepturi dolor ipsum nihil. Dolorum placeat odio labore?
                        </p>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-5">
                                <div class="form-group col-12 col-md-11 p-md-0">
                                    <select id="inputState" class="form-control">
                                        <option selected>Color</option>
                                        <option>...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group col-12 col-md-12">
                                    <select id="inputState" class="form-control">
                                        <option selected>Tamaño de arreos</option>
                                        <option>...</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('cart.add') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-add-sp">Añadir al carrito</button>
                            <input type="hidden" name="id_producto" value="{{ $datos['productos']->id_producto }}">
                        </form>
                    </div>
                </div>
            </div>
            <div class="container details-producto">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-3">
                        <ul class="menu-details">
                            <li><a href="#detalles">Detalles</a></li>
                            <li><a href="#info-adicional">Información adicional</a></li>
                            <li><a href="#valoraciones">Valoraciones</a></li>
                        </ul>
                        <div class="col-12 info-2 d-none d-md-block">
                            <p>Envíos gratuitos en compras superiores a $999</p><br>
                            <p>Debido a las medidas actuales para proteger la seguridad de los empleados de nuestro centro de distribución con motivos del COVID-19, las entregas pueden presentar un retraso. Puedes consultar el estatus de tu pedido <a href="#">aquí</a>.</p>
                        </div>
                    </div>
                    <div id="detalles" class="col-12 col-md-9 info-details ocultar">
                        <h6>Descripción</h6>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur ad quam reiciendis explicabo accusamus vero, blanditiis possimus tempore voluptates ratione nobis a deserunt doloremque? Omnis expedita id nesciunt repellat unde.</p>
                        <h6>Careta</h6>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur ad quam reiciendis explicabo accusamus vero, blanditiis possimus tempore voluptates ratione nobis a deserunt doloremque? Omnis expedita id nesciunt repellat unde.</p>
                        <h6>Protector de pecho</h6>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur ad quam reiciendis explicabo accusamus vero, blanditiis possimus tempore voluptates ratione nobis a deserunt doloremque? Omnis expedita id nesciunt repellat unde.</p>
                        <h6>Protector de las piernas</h6>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur ad quam reiciendis explicabo accusamus vero, blanditiis possimus tempore voluptates ratione nobis a deserunt doloremque? Omnis expedita id nesciunt repellat unde.</p>
                    </div>
                    <div id="info-adicional" class="col-12 col-md-9 info-details ocultar">
                        <h6>Información adicional</h6>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur ad quam reiciendis explicabo accusamus vero, blanditiis possimus tempore voluptates ratione nobis a deserunt doloremque? Omnis expedita id nesciunt repellat unde.</p>
                        <h6>Careta</h6>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur ad quam reiciendis explicabo accusamus vero, blanditiis possimus tempore voluptates ratione nobis a deserunt doloremque? Omnis expedita id nesciunt repellat unde.</p>
                        <h6>Protector de pecho</h6>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur ad quam reiciendis explicabo accusamus vero, blanditiis possimus tempore voluptates ratione nobis a deserunt doloremque? Omnis expedita id nesciunt repellat unde.</p>
                        <h6>Protector de las piernas</h6>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur ad quam reiciendis explicabo accusamus vero, blanditiis possimus tempore voluptates ratione nobis a deserunt doloremque? Omnis expedita id nesciunt repellat unde.</p>
                    </div>
                    <div id="valoraciones" class="col-12 col-md-9 info-details ocultar">
                        <h6>Valoraciones</h6>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur ad quam reiciendis explicabo accusamus vero, blanditiis possimus tempore voluptates ratione nobis a deserunt doloremque? Omnis expedita id nesciunt repellat unde.</p>
                        <h6>Careta</h6>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur ad quam reiciendis explicabo accusamus vero, blanditiis possimus tempore voluptates ratione nobis a deserunt doloremque? Omnis expedita id nesciunt repellat unde.</p>
                        <h6>Protector de pecho</h6>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur ad quam reiciendis explicabo accusamus vero, blanditiis possimus tempore voluptates ratione nobis a deserunt doloremque? Omnis expedita id nesciunt repellat unde.</p>
                        <h6>Protector de las piernas</h6>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur ad quam reiciendis explicabo accusamus vero, blanditiis possimus tempore voluptates ratione nobis a deserunt doloremque? Omnis expedita id nesciunt repellat unde.</p>
                    </div>
                    <div class="col-11 info-2 d-block d-md-none">
                            <p>Envíos gratuitos en compras superiores a $999</p><br>
                            <p>Debido a las medidas actuales para proteger la seguridad de los empleados de nuestro centro de distribución con motivos del COVID-19, las entregas pueden presentar un retraso. Puedes consultar el estatus de tu pedido <a href="#">aquí</a>.</p>
                        </div>
                </div>
            </div>
        @else
            <div class="alert text-center alert-danger">
                <p>No se encontro el producto seleccionado</p>
            </div>
        @endif
    </section>
@endsection