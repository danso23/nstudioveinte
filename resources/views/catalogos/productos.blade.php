@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('public/fonts/fonts_roboto_varela.css') }}">
    <link rel="stylesheet" href="{{ asset('public/fonts/font_awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/css/dataTables.bootstrap4.min.css') }}">
    <link href="{{ asset('public/css/cursos/catalogos.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-6">
						<h2>Administrador de <b>productos</b></h2>
					</div>
					<div class="col-6 col-md-6">
						<a href="#editProductoModal" class="btn btn-success mb-2" data-toggle="modal" onclick="storeProducto('', 'Nuevo')"><i class="material-icons">&#xE147;</i> <span>Agregar Nuevo Producto</span></a>
                        <a href="#deleteProductoModal" class="btn btn-danger mb-2" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Eliminar seleccionados</span></a>
					</div>
                </div>
            </div>
            <table id="catalogoProductos" class="table table-striped table-hover table-responsive">
			
            </table>
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<div id="editProductoModal" class="modal fade" tabindex="-1" data-backdrop="false" data-dismiss="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="formProducto">
					@csrf
					<div class="modal-header">
						<h4 class="modal-title" id="modal-title-curso">Editar Productos</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" name="hddIdProducto" id="hddIdProducto">			
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" name="nombre" id="nombre" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="descripcion">Descripción</label>
							<textarea name="descripion" id="descripcion" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label for="imagen">Imagen</label>
							<input type="text" name="portada" id="portada" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="precio">Precio</label>
							<input type="text" name="precio" id="precio" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="precio">Cantidad</label>
							<input type="text" name="cantidad" id="cantidad" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="tallas">Tallas</label>
							<input type="text" name="tallas" id="tallas" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="categoria">Categoría</label>
							<select class="form-control" name="categoria" id="categoria">
								<option selected hidden value="default">Selecciona una categoría</option>
								@foreach($datos['categorias'] as $cat)
									<option value="{{$cat->id_categoria}}">{{$cat->nombre}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" id="btnCancelarProducto" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" id="btnGuardarProducto" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteProductoModal" class="modal fade" data-backdrop="false" data-dismiss="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Eliminar producto</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p class="textos-cafes">Estas seguro de eliminar los productos seleccionados?</p>
						<p class="text-warning"><small>Esta acción no se puede revertir.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
@endsection
@section('script')
	<script src="{{ asset('public/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('public/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/catalogos/catalogos.js') }}"></script>
	<script>
		var url_global = "{{ url('') }}";
		var form = $("#formProducto");
		dataProducto();
	</script>
@endsection
