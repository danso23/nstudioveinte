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
		document.querySelector('#'+form[0].id+' #hddIdCurso').value=datos[7];
		// document.querySelector('#'+form[0].id +' #categoria').value=datos[7];
		document.getElementById("modal-title-curso").innerHTML = 'Editar producto N° '+datos[7];
	}
	if(tipoAccion == "Nuevo"){
		document.getElementById("modal-title-curso").innerHTML = 'Agregar producto';
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
    	url: url_global+"/admin/storeProducto/"+document.getElementById("hddIdCurso").value,
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