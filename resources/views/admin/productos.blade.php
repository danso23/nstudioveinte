@extends('layouts.app')
@section('css')
	<meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/fonts/fonts_roboto_varela.css') }}">
    <link rel="stylesheet" href="{{ asset('/fonts/fonts_material.css') }}">
    <link rel="stylesheet" href="{{ asset('/fonts/font_awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap4.min.css') }}">
    <link href="{{ asset('/css/admin/catalogos.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-6">
						<h2>Administrador de <b>Productos</b></h2>
					</div>
					<div class="col-6 col-md-6">
						<a href="#editCursoModal" class="btn btn-success mb-2" data-toggle="modal" onclick="storeCurso('', 'Nuevo')"><i class="material-icons">&#xE147;</i> <span>Agregar Nuevo Productos</span></a>
                        <a href="#deleteEmployeeModal" class="btn btn-danger mb-2" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Eliminar seleccionados</span></a>
					</div>
                </div>
            </div>
            <table id="catalogoCursos" class="table table-striped table-hover table-responsive">
			
            </table>
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<div id="editCursoModal" class="modal fade" tabindex="-1" data-backdrop="false" data-dismiss="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="formCurso">
					@csrf
					<div class="modal-header">
						<h4 class="modal-title" id="modal-title-curso">Editar Productos</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" name="hddIdCurso" id="hddIdCurso">			
						<div class="form-group">
							<label for="nombre" class="textos-cafes">Nombre</label>
							<input type="text" name="nombre" id="nombre" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="desc_curso" class="textos-cafes">Descripción</label>
							<textarea name="desc_curso" id="desc_curso" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label for="portada" class="textos-cafes">Imagen</label>
							<input type="text" name="portada" id="portada" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="categoria" class="textos-cafes"><b>Cantidad de piezas por talla</b></label><br>
							<table class="table">
                            <thead class="textos-cafes">
                                <tr>
                                <th scope="col" style="width: 30%">S</th>
                                <th scope="col" style="width: 30%">M</th>
                                <th scope="col" style="width: 30%">L</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td class="textos-grises"><input type="text" name="cantidad_s" id="cantidad_s" class="form-control" required></td>
                                <td class="textos-grises"><input type="text" name="cantidad_m" id="cantidad_m" class="form-control" required></td>
                                <td class="textos-grises"><input type="text" name="cantidad_g" id="cantidad_g" class="form-control" required></td>
                                </tr>
                            </tbody>
                        </table>
						</div>
						<table class="table">
                            <thead class="textos-cafes">
                                <tr>
                                <th scope="col"></th>
                                <th scope="col">S</th>
                                <th scope="col">M</th>
                                <th scope="col">L</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row" class="textos-cafes">Contorno busto</th>
                                <td class="textos-grises"><input type="text" name="busto_s" id="busto_s" class="form-control" required></td>
                                <td class="textos-grises"><input type="text" name="busto_m" id="busto_m" class="form-control" required></td>
                                <td class="textos-grises"><input type="text" name="busto_g" id="busto_g" class="form-control" required></td>
                                </tr>
                                <tr>
                                <th scope="row" class="textos-cafes">Largo total</th>
                                <td class="textos-grises"><input type="text" name="largo_s" id="largo_s" class="form-control" required></td>
                                <td class="textos-grises"><input type="text" name="largo_m" id="largo_m" class="form-control" required></td>
                                <td class="textos-grises"><input type="text" name="largo_g" id="largo_g" class="form-control" required></td>
                                </tr>
                                <tr>
                                <th scope="row" class="textos-cafes">Contorno manga</th>
                                <td class="textos-grises"><input type="text" name="manga_s" id="manga_s" class="form-control" required></td>
                                <td class="textos-grises"><input type="text" name="manga_m" id="manga_m" class="form-control" required></td>
                                <td class="textos-grises"><input type="text" name="manga_g" id="manga_g" class="form-control" required></td>
                                </tr>
                            </tbody>
                        </table>
						<div class="form-group">
							<label for="categoria" class="textos-cafes">Colores</label>
							<select class="form-control" name="colores" id="colores" multiple>
								<option selected hidden value="default">Selecciona los colores (Puedes elegir varias opciones)</option>
								{{--@foreach($datos['colores'] as $cat)
									<option value="{{$cat->id_color}}">{{$cat->color}}</option>
								@endforeach--}}
							</select>
						</div>
						<div class="form-group">
							<label for="categoria" class="textos-cafes">Categoría</label>
							<select class="form-control" name="categoria" id="categoria">
								<option selected hidden value="default">Selecciona una categoría</option>
								{{--@foreach($datos['categorias'] as $cat)
									<option value="{{$cat->id_categoria}}">{{$cat->nombre}}</option>
								@endforeach--}}
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" id="btnCancelarCurso" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" id="btnGuardarCurso" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteCursosModal" class="modal fade" data-backdrop="false" data-dismiss="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
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
	<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/admin/catalogos.js') }}"></script>
	<script>
		var url_global = "{{ url('') }}";
		var form = $("#formCurso");
		dataCurso();
	</script>
@endsection
