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
	$("#btnGuardarProducto").click(function(e) {
		e.preventDefault();
		guardarProducto();
	});
});

function dataProducto() {
	$.ajax({
    	type: "GET",
    	dataType: "json",
    	url: url_global+"/Admin/mostrarProductos",
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
                        "<th>Descripción</th>"+
						"<th>Categoría</th>"+
						"<th>Imagen</th>"+
                        "<th>Precio</th>"+
						"<th>Cantidad</th>"+
                        "<th>Acciones</th>"+
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
					"<td>"+el.descripcion_producto+"</td>"+
					"<td>"+el.id_categoria+"</td>"+
					"<td>"+el.url_imagen+"</td>"+
					"<td>"+el.precio+"</td>"+
					"<td>"+el.cantidad+"</td>"+
					"<td>"+
						"<a href='#editProductoModal' class='edit' id='btn_edit_"+el.id_producto+"' data-toggle='modal' onclick='storeProducto("+i+","+'"Editar"'+")'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>"+
						"<a href='#deleteProductoModal' class='delete' id='btn_delete_"+el.id_producto+"' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>"+
					"</td>"+
				"</tr>";
			});
			element+="</tbody>";
			objTarget = {"visible": false,  "targets": [ 6,7,8 ] };
			$("#catalogoProductos").empty();
			$("#catalogoProductos").html(element);
			crearDataTable("catalogoProductos", objTarget);
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
function storeProducto(position, tipoAccion){	
	if(tipoAccion == "Editar"){
		var datos = objDataTbl.row( position ).data();
		document.querySelector('#'+form[0].id +' #nombre_producto').value=datos[1];
		document.querySelector('#'+form[0].id +' #descripcion_producto').value=datos[2];
		document.querySelector('#'+form[0].id +' #id_categoria').value=datos[5];
		document.querySelector('#'+form[0].id +' #url_imagen').value=datos[3];
		document.querySelector('#'+form[0].id +' #precio').value=datos[4];
		document.querySelector('#'+form[0].id +' #cantidad').value=datos[5];
		document.querySelector('#'+form[0].id+' #hddIdProducto').value=datos[6];
		document.getElementById("modal-title-curso").innerHTML = 'Editar producto N° '+datos[6];
	}
	if(tipoAccion == "Nuevo"){
		document.getElementById("modal-title-curso").innerHTML = 'Agregar producto';
		document.querySelector('#'+form[0].id+' #hddIdProducto').value=0;
		document.getElementById(form[0].id).reset();
	}
}

function guardarProducto(){
	dataform = $('#'+form[0].id).serialize();
	dataform+="&token="+document.querySelector('meta[name="_token"]').getAttribute('content');
	;
	$.ajax({
		type: "POST",
    	dataType: "json",
    	url: url_global+"/Admin/storeProducto/"+document.getElementById("hddIdProducto").value,
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
