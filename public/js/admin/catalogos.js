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
						"<th>Cantidad S</th>"+
                        "<th>Acciones</th>"+
<<<<<<< HEAD
=======
						"<th>Id</th>"+
						"<th>IdCategoria</th>"+
						"<th>cantidad_s</th>"+
						"<th>cantidad_m</th>"+
						"<th>cantidad_g</th>"+
						"<th>busto_s</th>"+
						"<th>busto_m</th>"+
						"<th>busto_g</th>"+
						"<th>largo_s</th>"+
						"<th>largo_m</th>"+
						"<th>largo_g</th>"+
						"<th>manga_s</th>"+
						"<th>manga_m</th>"+
						"<th>manga_g</th>"+
>>>>>>> 8d5e2e32bc28293afb25940bddb1dce4796d7f6f
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
<<<<<<< HEAD
					"<td>"+el.precio+"</td>"+
=======
					"<td>$ "+el.precio+"</td>"+
>>>>>>> 8d5e2e32bc28293afb25940bddb1dce4796d7f6f
					"<td>"+el.cantidad_s+"</td>"+
					"<td>"+
						"<a href='#editCursoModal' class='edit' id='btn_edit_"+el.id_producto+"' data-toggle='modal' onclick='storeCurso("+i+","+'"Editar"'+")'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>"+
						"<a href='#deleteCursoModal' class='delete' id='btn_delete_"+el.id_producto+"' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>"+
					"</td>"+
					"<td>"+el.id_producto+"</td>"+
					"<td>"+el.id_categoria+"</td>"+
					"<td>"+el.cantidad_s+"</td>"+
					"<td>"+el.cantidad_m+"</td>"+
					"<td>"+el.cantidad_g+"</td>"+
					"<td>"+el.busto_s+"</td>"+
					"<td>"+el.busto_m+"</td>"+
					"<td>"+el.busto_g+"</td>"+
					"<td>"+el.largo_s+"</td>"+
					"<td>"+el.largo_m+"</td>"+
					"<td>"+el.largo_g+"</td>"+
					"<td>"+el.manga_s+"</td>"+
					"<td>"+el.manga_m+"</td>"+
					"<td>"+el.manga_g+"</td>"+
				"</tr>";
			});
			element+="</tbody>";
			objTarget = {"visible": false,  "targets": [ 7,8,9,10,11,12,13,14,15,16,17,18,19,20 ] };
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
		//document.querySelector('#'+form[0].id +' #portada')value=datos3;
		document.querySelector('#'+form[0].id+' #hddIdCurso').value=datos[7];
		document.querySelector('#'+form[0].id +' #cantidad_s').value=datos[9];
		document.querySelector('#'+form[0].id +' #cantidad_m').value=datos[10];
		document.querySelector('#'+form[0].id +' #cantidad_g').value=datos[11];
		document.querySelector('#'+form[0].id +' #busto_s').value=datos[12];
		document.querySelector('#'+form[0].id +' #busto_m').value=datos[13];
		document.querySelector('#'+form[0].id +' #busto_g').value=datos[14];
		document.querySelector('#'+form[0].id +' #largo_s').value=datos[15];
		document.querySelector('#'+form[0].id +' #largo_m').value=datos[16];
		document.querySelector('#'+form[0].id +' #largo_g').value=datos[17];
		document.querySelector('#'+form[0].id +' #manga_s').value=datos[18];
		document.querySelector('#'+form[0].id +' #manga_m').value=datos[19];
		document.querySelector('#'+form[0].id +' #manga_g').value=datos[20];
		document.getElementById("modal-title-curso").innerHTML = 'Editar producto N° '+datos[7];
	}
	if(tipoAccion == "Nuevo"){
		document.getElementById("modal-title-curso").innerHTML = 'Agregar producto';
		document.querySelector('#'+form[0].id+' #hddIdCurso').value=0;
		document.getElementById(form[0].id).reset();
	}
}

function guardarCurso(){
	dataform = $('#'+form[0].id).serialize();
	dataform+="&token="+document.querySelector('meta[name="_token"]').getAttribute('content');
	dataform+="&portadaFile="+$("#portadaFile").val();
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