var objDataTbl;
var objTarget;
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
	$("#btnGuardarTemario").click(function(e) {
		e.preventDefault();
		guardarTemario();
	});

	$("#btnGuardarCurso").click(function(e) {
		e.preventDefault();
		guardarCurso();
	});

	$("#btnGuardarMaterial").click(function(e) {
		e.preventDefault();
		guardarMaterial();
	});

	$("#btnGuardarLives").click(function(e) {
		e.preventDefault();
		guardarLives();
	});

	$("#btnGuardarUsuario").click(function(e) {
		e.preventDefault();
		guardarUsuario();
	});
});

function dataTemario() {
	$.ajax({
    	type: "GET",
    	dataType: "json",
    	url: url_global+"/Admin/mostrarTemarios",
		success: function(data){
			var element ="";
			element +="<thead>"+
                    "<tr>"+
						"<th>"+
							"<!-- <span class='custom-checkbox'>"+
								"<input type='checkbox' id='selectAll'>"+
								"<label for='selectAll'></label>"+
							"</span>--> Folio"+
						"</th>"+
                        "<th>Temario</th>"+
                        "<th>Descripción</th>"+
						"<th>Video</th>"+
                        "<th>Fecha creación</th>"+
                        "<th>Acciones</th>"+
						"<th>ID</th>"+
						"<th>Mod</th>"+
						"<th>Cur</th>"+
                    "</tr>"+
                "</thead>"+
				"<tbody>";
			data.forEach((el, i) => {
				element+="<tr>"+
					"<td>"+
						"<span class='custom-checkbox'>"+
							"<input type='checkbox' id='checkbox"+el.id_temario+"' name='options[]' value='"+el.id_temario+"'>"+
							"<label for='checkbox"+el.id_temario+"'>"+el.id_temario+"</label>"+
						"</span>"+
					"</td>"+
					"<td>"+el.nombre+"</td>"+
					"<td>"+el.descripcion+"</td>"+
					"<td>"+el.url_video+"</td>"+
					"<td>"+el.fecha_creacion+"</td>"+
					"<td>"+
						"<a href='#editTemarioModal' class='edit' id='btn_edit_"+el.id_temario+"' data-toggle='modal' onclick='storeTemario("+i+","+'"Editar"'+")'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>"+
						"<a href='#deleteTemarioModal' class='delete' id='btn_delete_"+el.id_temario+"' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>"+
					"</td>"+
					"<td>"+el.id_temario+"</td>"+
					"<td>"+el.id_modulo+"</td>"+
					"<td>"+el.id_curso+"</td>"+
				"</tr>";
			});
			element+="</tbody>";
			objTarget = {"visible": false,  "targets": [ 6,7,8 ] };
			$("#catalogoTemario").empty();
			$("#catalogoTemario").html(element);
			crearDataTable("catalogoTemario", objTarget);
        }
	})
}

function dataCurso() {
	$.ajax({
    	type: "GET",
    	dataType: "json",
    	url: url_global+"/admin/jsonproductos",
		success: function(data){
			var element ="";
			element +="<thead>"+
                    "<tr>"+
						"<th>"+
							"Folio"+
						"</th>"+
                        "<th>Producto</th>"+
                        "<th>Descripción</th>"+
						"<th>Portada</th>"+
                        "<th>Precio</th>"+
						"<th>Cantidad</th>"+
                        "<th>Acciones</th>"+
						"<th>Id</th>"+
						"<th>IdCategoria</th>"+
                    "</tr>"+
                "</thead>"+
				"<tbody>";
			data.forEach((el, i) => {
				element+="<tr>"+
					"<td>"+
						"<span class='custom-checkbox'>"+
							"<input type='checkbox' id='checkbox"+el.id_producto+"' name='options[]' value='"+el.id_producto+"'>"+
							"<label for='checkbox"+el.id_producto+"'>"+el.id_producto+"</label>"+
						"</span>"+
					"</td>"+
					"<td>"+el.nombre_producto+"</td>"+
					"<td>"+el.desc_producto+"</td>"+
					"<td>"+el.url_imagen+"</td>"+
					"<td>$ "+el.precio+"</td>"+
					"<td>"+el.cantidad+"</td>"+
					"<td>"+
						"<a href='#editCursoModal' class='edit' id='btn_edit_"+el.id_producto+"' data-toggle='modal' onclick='storeCurso("+i+","+'"Editar"'+")'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>"+
						"<a href='#deleteCursoModal' class='delete' id='btn_delete_"+el.id_producto+"' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>"+
					"</td>"+
					"<td>"+el.id_producto+"</td>"+
					"<td>"+el.id_categoria+"</td>"+
				"</tr>";
			});
			element+="</tbody>";
			objTarget = {"visible": false,  "targets": [ 7,8 ] };
			$("#catalogoCursos").empty();
			$("#catalogoCursos").html(element);
			crearDataTable("catalogoCursos", objTarget);
        }
	})
}

function dataMaterial() {
	$.ajax({
    	type: "GET",
    	dataType: "json",
    	url: url_global+"/Admin/mostrarMaterial",
		success: function(data){
			var element ="";
			element +="<thead>"+
                    "<tr>"+
						"<th>"+
							"<!-- <span class='custom-checkbox'>"+
								"<input type='checkbox' id='selectAll'>"+
								"<label for='selectAll'></label>"+
							"</span>--> Folio"+
						"</th>"+
                        "<th>Nombre</th>"+
                        "<th>Url</th>"+
						"<th>Nombre curso</th>"+
                        "<th>Fecha de creación</th>"+
                        "<th>Acciones</th>"+
						"<th>IdCurso</th>"+
						"<th>IdMaterial</th>"+
                    "</tr>"+
                "</thead>"+
				"<tbody>";
			data.forEach((el, i) => {
				element+="<tr>"+
					"<td>"+
						"<span class='custom-checkbox'>"+
							"<input type='checkbox' id='checkbox"+el.id_material+"' name='options[]' value='"+el.id_material+"'>"+
							"<label for='checkbox"+el.id_material+"'>"+el.id_material+"</label>"+
						"</span>"+
					"</td>"+
					"<td>"+el.nombre+"</td>"+
					"<td>"+el.url+"</td>"+
					"<td>"+el.nombre_curso+"</td>"+
					"<td>"+el.fecha_creacion+"</td>"+
					"<td>"+
						"<a href='#editMaterialModal' class='edit' id='btn_edit_"+el.id_curso+"' data-toggle='modal' onclick='storeMaterial("+i+","+'"Editar"'+")'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>"+
						"<a href='#deleteMaterialModal' class='delete' id='btn_delete_"+el.id_curso+"' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>"+
					"</td>"+
					"<td>"+el.id_curso+"</td>"+
					"<td>"+el.id_material+"</td>"+
				"</tr>";
			});
			element+="</tbody>";
			objTarget = {"visible": false,  "targets": [ 6,7 ] };
			$("#catalogoMaterial").empty();
			$("#catalogoMaterial").html(element);
			crearDataTable("catalogoMaterial", objTarget);
        }
	})
}

function dataLives() {
	$.ajax({
    	type: "GET",
    	dataType: "json",
    	url: url_global+"/Admin/mostrarLives",
		success: function(data){
			var element ="";
			element +="<thead>"+
                    "<tr>"+
						"<th>"+
							"Folio"+
						"</th>"+
                        "<th>Nombre</th>"+
                        "<th>Descripción</th>"+
						"<th>Portada</th>"+
                        "<th>Link</th>"+
                        "<th>Acciones</th>"+
						"<th>IDLIVES</th>"+
                    "</tr>"+
                "</thead>"+
				"<tbody>";
			data.forEach((el, i) => {
				element+="<tr>"+
					"<td>"+
						"<span class='custom-checkbox'>"+
							"<input type='checkbox' id='checkbox"+el.id_live+"' name='options[]' value='"+el.id_live+"'>"+
							"<label for='checkbox"+el.id_live+"'>"+el.id_live+"</label>"+
						"</span>"+
					"</td>"+
					"<td>"+el.nombre+"</td>"+
					"<td>"+el.descripcion+"</td>"+
					"<td>"+el.portada+"</td>"+
					"<td>"+el.url+"</td>"+
					"<td>"+
						"<a href='#editLivesModal' class='edit' id='btn_edit_"+el.id_live+"' data-toggle='modal' onclick='storeLives("+i+","+'"Editar"'+")'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>"+
						"<a href='#deleteLivesModal' class='delete' id='btn_delete_"+el.id_live+"' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>"+
					"</td>"+
					"<td>"+el.id_live+"</td>"+//LIVE
				"</tr>";
			});
			element+="</tbody>";
			objTarget = {"visible": false,  "targets": [ 6 ] };
			$("#catalogoLives").empty();
			$("#catalogoLives").html(element);
			crearDataTable("catalogoLives", objTarget);
        }
	})
}

function dataUsuario() {
	$.ajax({
    	type: "GET",
    	dataType: "json",
    	url: url_global+"/Admin/mostrarUsuarios",
		success: function(data){
			var element ="";
			element +="<thead>"+
                    "<tr>"+
						"<th>"+
							"Folio"+
						"</th>"+
                        "<th>Nombre</th>"+
                        "<th>Apellido Paterno</th>"+
						"<th>Apellido Materno</th>"+
                        "<th>Correo</th>"+
                        "<th>Acciones</th>"+
						"<th>IDUSER</th>"+
                    "</tr>"+
                "</thead>"+
				"<tbody>";
			data.forEach((el, i) => {
				element+="<tr>"+
					"<td>"+
						"<span class='custom-checkbox'>"+
							"<input type='checkbox' id='checkbox"+el.id_user+"' name='options[]' value='"+el.id_user+"'>"+
							"<label for='checkbox"+el.id_user+"'>"+el.id_user+"</label>"+
						"</span>"+
					"</td>"+
					"<td>"+el.name+"</td>"+
					"<td>"+el.last_name+"</td>"+
					"<td>"+el.last_name2+"</td>"+
					"<td>"+el.email+"</td>"+
					"<td>"+
						"<!-- <a href='#editMaterialModal' class='edit' id='btn_edit_"+el.id_user+"' data-toggle='modal' onclick='storeMaterial("+i+","+'"Editar"'+")'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>"+
						"<a href='#deleteMaterialModal' class='delete' id='btn_delete_"+el.id_user+"' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a> -->"+
					"</td>"+
					"<td>"+el.id_user+"</td>"+
				"</tr>";
			});
			element+="</tbody>";
			objTarget = {"visible": false,  "targets": [ 6 ] };
			$("#catalogoUsuarios").empty();
			$("#catalogoUsuarios").html(element);
			crearDataTable("catalogoUsuarios", objTarget);
        }
	})
}

function crearDataTable(table, target){
	objDataTbl= $("#"+table).DataTable({
		responsive: true,
		autoWidth: false,
		order: [ 0, 'asc' ],
		serverside:true,
		language: {
			"zeroRecords": "No se encontró coincidencias",
			"info": "Mostrando la página _PAGE_ de _PAGES_",
			"infoEmpty": "No records available",
			"infoFiltered": "(filtrado de _MAX_ registros totales)",
			'search': 'Buscar:',
			"lengthMenu":"Mostrar _MENU_ registros",
			'paginate': {
				'next': 'Siguiente',
				'previous': 'Anterior',
			}
		},
		"lengthMenu":		[[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
		"iDisplayLength":	5,
		"columnDefs": [
			{
                // The `data` parameter refers to the data for the cell (defined by the
                // `data` option, which defaults to the column being worked with, in
                // this case `data: 0`.
                // "render": function ( data, type, row ) {
                    // return row[3];
                // },
                // "targets": 0
        	},
			target
        	// {"visible": false,  "targets": [ 6,7,8 ] }
        ]
	});
}

//Funcion editar curso
function storeCurso(position, tipoAccion){	
	if(tipoAccion == "Editar"){
		var datos = objDataTbl.row( position ).data();
		document.querySelector('#'+form[0].id +' #nombre').value=datos[1];
		document.querySelector('#'+form[0].id +' #desc_curso').value=datos[2];
		document.querySelector('#'+form[0].id +' #portada').value=datos[3];
		document.querySelector('#'+form[0].id +' #portada').value=datos[3];
		document.querySelector('#'+form[0].id+' #hddIdCurso').value=datos[6];
		document.querySelector('#'+form[0].id +' #categoria').value=datos[7];
		document.getElementById("modal-title-curso").innerHTML = 'Editar curso N° '+datos[6];
	}
	if(tipoAccion == "Nuevo"){
		document.getElementById("modal-title-curso").innerHTML = 'Agregar curso';
		document.querySelector('#'+form[0].id+' #hddIdCurso').value=0;
		document.getElementById(form[0].id).reset();
	}
}

function storeLives(position, tipoAccion){	
	if(tipoAccion == "Editar"){
		debugger
		var datos = objDataTbl.row( position ).data();
		document.querySelector('#'+form[0].id +' #nombre').value=datos[1];
		document.querySelector('#'+form[0].id +' #desc_Lives').value=datos[2];
		document.querySelector('#'+form[0].id +' #portada').value=datos[3];
		document.querySelector('#'+form[0].id +' #url').value=datos[4];
		document.querySelector('#'+form[0].id+' #hddIdLives').value=datos[6];
		document.getElementById("modal-title-live").innerHTML = 'Editar live N° '+datos[6];
	}
	if(tipoAccion == "Nuevo"){
		document.getElementById("modal-title-live").innerHTML = 'Agregar live';
		document.querySelector('#'+form[0].id+' #hddIdLives').value=0;
		document.getElementById(form[0].id).reset();
	}
}

function storeUsuarios(position, tipoAccion){	
	if(tipoAccion == "Editar"){
		var datos = objDataTbl.row( position ).data();
		document.querySelector('#'+form[0].id +' #name').value=datos[1];
		document.querySelector('#'+form[0].id +' #last_name').value=datos[2];
		document.querySelector('#'+form[0].id +' #last_name2').value=datos[3];
		document.querySelector('#'+form[0].id +' #email').value=datos[3];
		document.querySelector('#'+form[0].id+' #hddIdLives').value=datos[6];
		document.getElementById("modal-title-live").innerHTML = 'Editar Usuario N° '+datos[6];
	}
	if(tipoAccion == "Nuevo"){
		document.getElementById("modal-title-live").innerHTML = 'Agregar usuario';
		document.querySelector('#'+form[0].id+' #hddIdUsuario').value=0;
		document.getElementById(form[0].id).reset();
	}
}

function storeTemario(position, tipoAccion){	
	if(tipoAccion == "Editar"){
		var datos = objDataTbl.row( position ).data();
		document.querySelector('#'+form[0].id +' #nombre').value=datos[1];
		document.querySelector('#'+form[0].id +' #descripcion').value=datos[2];
		document.querySelector('#'+form[0].id +' #url_video').value=datos[3];
		document.querySelector('#'+form[0].id+' #hddIdTemario').value=datos[6];
		document.querySelector('#'+form[0].id +' #modulo').value=datos[7];
		document.querySelector('#'+form[0].id +' #curso').value=datos[8];
		document.getElementById("modal-title-temario").innerHTML = 'Editar Temario N° '+datos[6];
	}
	if(tipoAccion == "Nuevo"){
		document.getElementById("modal-title-temario").innerHTML = 'Agregar temario';
		document.querySelector('#'+form[0].id+' #hddIdTemario').value=0;
		document.getElementById(form[0].id).reset();
	}
}

function storeMaterial(position, tipoAccion){
	if(tipoAccion == "Editar"){
		var datos = objDataTbl.row( position ).data();
		document.querySelector('#'+form[0].id +' #nombre').value=datos[1];
		document.querySelector('#'+form[0].id +' #url').value=datos[2];
		document.querySelector('#'+form[0].id +' #curso').value=datos[6];
		document.querySelector('#'+form[0].id+' #hddIdMaterial').value=datos[7];
		document.getElementById("modal-title-material").innerHTML = 'Editar material N° '+datos[7];
	}
	if(tipoAccion == "Nuevo"){
		document.getElementById("modal-title-material").innerHTML = 'Agregar material';
		document.querySelector('#'+form[0].id+' #hddIdMaterial').value=0;
		document.getElementById(form[0].id).reset();
	}
}

function guardarTemario(){
	dataform = $('#'+form[0].id).serialize();
	dataform+="&token="+document.querySelector('meta[name="_token"]').getAttribute('content');
	;
	$.ajax({
		type: "POST",
    	dataType: "json",
    	url: url_global+"/Admin/storeTemario/"+document.getElementById("hddIdTemario").value,
		data: dataform,
		success: function(data){
			alert(data.message);
		},
		error: function (jqXHR, exception){
			var msg = '';
			if (jqXHR.status === 0)
				msg = 'Not connect.\n Verify Network.';
			else if (jqXHR.status == 404)
				msg = 'Requested page not found. [404]';
			else if (jqXHR.status == 500)
				msg = 'Internal Server Error [500].';
			else if (exception === 'parsererror')
				msg = 'Requested JSON parse failed.';
			else if (exception === 'timeout')
				msg = 'Time out error.';
			else if (exception === 'abort')
				msg = 'Se aborto el proceso.';
			else
				msg = 'Uncaught Error.\n' + jqXHR.responseText;
			console.log(msg);
			alert("Ocurrio un error[1]")
		}
	});
}

function guardarCurso(){
	dataform = $('#'+form[0].id).serialize();
	dataform+="&token="+document.querySelector('meta[name="_token"]').getAttribute('content');
	;
	$.ajax({
		type: "POST",
    	dataType: "json",
    	url: url_global+"/Admin/storeCurso/"+document.getElementById("hddIdCurso").value,
		data: dataform,
		success: function(data){
			alert(data.message);
		},
		error: function (jqXHR, exception){
			var msg = '';
			if (jqXHR.status === 0)
				msg = 'Not connect.\n Verify Network.';
			else if (jqXHR.status == 404)
				msg = 'Requested page not found. [404]';
			else if (jqXHR.status == 500)
				msg = 'Internal Server Error [500].';
			else if (exception === 'parsererror')
				msg = 'Requested JSON parse failed.';
			else if (exception === 'timeout')
				msg = 'Time out error.';
			else if (exception === 'abort')
				msg = 'Se aborto el proceso.';
			else
				msg = 'Uncaught Error.\n' + jqXHR.responseText;
			console.log(msg);
			alert("Ocurrio un error[1]")
		}
	});
}

function guardarLives(){
	dataform = $('#'+form[0].id).serialize();
	dataform+="&token="+document.querySelector('meta[name="_token"]').getAttribute('content');
	;
	$.ajax({
		type: "POST",
    	dataType: "json",
    	url: url_global+"/Admin/storeLives/"+document.getElementById("hddIdLives").value,
		data: dataform,
		success: function(data){
			alert(data.message);
		},
		error: function (jqXHR, exception){
			var msg = '';
			if (jqXHR.status === 0)
				msg = 'Not connect.\n Verify Network.';
			else if (jqXHR.status == 404)
				msg = 'Requested page not found. [404]';
			else if (jqXHR.status == 500)
				msg = 'Internal Server Error [500].';
			else if (exception === 'parsererror')
				msg = 'Requested JSON parse failed.';
			else if (exception === 'timeout')
				msg = 'Time out error.';
			else if (exception === 'abort')
				msg = 'Se aborto el proceso.';
			else
				msg = 'Uncaught Error.\n' + jqXHR.responseText;
			console.log(msg);
			alert("Ocurrio un error[1]")
		}
	});
}

function guardarMaterial(){
	dataform = $('#'+form[0].id).serialize();
	dataform+="&token="+document.querySelector('meta[name="_token"]').getAttribute('content');
	;
	$.ajax({
		type: "POST",
    	dataType: "json",
    	url: url_global+"/Admin/storeMaterial/"+document.getElementById("hddIdMaterial").value,
		data: dataform,
		success: function(data){
			alert(data.message);
		},
		error: function (jqXHR, exception){
			var msg = '';
			if (jqXHR.status === 0)
				msg = 'Not connect.\n Verify Network.';
			else if (jqXHR.status == 404)
				msg = 'Requested page not found. [404]';
			else if (jqXHR.status == 500)
				msg = 'Internal Server Error [500].';
			else if (exception === 'parsererror')
				msg = 'Requested JSON parse failed.';
			else if (exception === 'timeout')
				msg = 'Time out error.';
			else if (exception === 'abort')
				msg = 'Se aborto el proceso.';
			else
				msg = 'Uncaught Error.\n' + jqXHR.responseText;
			console.log(msg);
			alert("Ocurrio un error[1]")
		}
	});
}

function guardarUsuario(){
	dataform = $('#'+form[0].id).serialize();
	dataform+="&token="+document.querySelector('meta[name="_token"]').getAttribute('content');
	;
	$.ajax({
		type: "POST",
    	dataType: "json",
    	url: url_global+"/Admin/storeUsuario/"+document.getElementById("hddIdUsuario").value,
		data: dataform,
		success: function(data){
			alert(data.message);
		},
		error: function (jqXHR, exception){
			var msg = '';
			if (jqXHR.status === 0)
				msg = 'Not connect.\n Verify Network.';
			else if (jqXHR.status == 404)
				msg = 'Requested page not found. [404]';
			else if (jqXHR.status == 500)
				msg = 'Internal Server Error [500].';
			else if (exception === 'parsererror')
				msg = 'Requested JSON parse failed.';
			else if (exception === 'timeout')
				msg = 'Time out error.';
			else if (exception === 'abort')
				msg = 'Se aborto el proceso.';
			else
				msg = 'Uncaught Error.\n' + jqXHR.responseText;
			console.log(msg);
			alert("Ocurrio un error[1]")
		}
	});
}