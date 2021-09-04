var form = $('#frmMateriales'),
    messageResponse= $('#processData'),
    textErrorRecaptcha = '<div class="error">Por favor selecciona el código de verificación humana</div>';

/**REGLAS Y MENSAJES DEL FORMULARIO **/
function FormValidate() {
    $.validator.addMethod("validaNoVacio", function(value, element, arg){
        return arg !== value;
    }, "Seleccione una opción");
    $.validator.addMethod('filesize', function(value, element, param) {
        return this.optional(element) || (element.files[0].size <= param) 
    });
    form.validate({
        errorElement:"label",
        errorPlacement: function errorPlacement(error, element) {
            element.after(error);
            if (element.attr("name")==="rdAcepto")
                error.insertAfter( '#errorAcepto');
            if(element.attr("name")==="txtActividadEspecifica")
                error.insertBefore("#errorActividad");
        },rules:{
            rdAcepto:{required:true},
            name:{required:true, minlength:2},
            material:{required: true, extension: "png|jpe?g|gif", filesize: 1048576}
        },messages:{
            rdAcepto:{required: 'Acepta el aviso, para continuar'},
            name:{required: 'Escribe tu nombre', minlength:'No escribas menos de {0} caracteres'},
            material:{required:'Es necesario subir un documento', extension:'la extensión del archivo no esta permitida', filesize:'El archivo no debe ser mayor a 1MB'}
        },debug:false,
        submitHandler:function (form) {
            form.submit();
        }
    });
}

$(document).ready( function() {
    $("#frmMateriales").submit(function(e){
        e.preventDefault();
    });
    FormValidate();
    $.ajax({
        url: url_global+"/cursos/obtenerCursos",
        type: "GET",
        success: function(data){
            var nElement = '<option value="default" disabled="disabled" selected="selected">Selecciona un curso</option>';
            data.forEach(val => {
                nElement += '<option value="'+val.id_curso+'">'+val.nombre+'</option>';
            });
            $("#slcCurso").empty();
            $("#slcCurso").html(nElement);
        }
    });
    
    $("#frmMaterialCancelar, #frmTemarioCancelar, #frmCursoCancelar").click(function() {
        location.reload();
    });

    $('#example').DataTable( {
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        console.log(row)
                        var data = row.data();
                        return 'Details for '+data[0]+' '+data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        }
    });
});

function uploadFile(el){//Funcion encargada de enviar el archivo via AJAX
    var inputFileImage = document.getElementById(el.id);
    var file = inputFileImage.files[0];
    var data = new FormData();
    data.append('fileToUpload',file);
                
    $.ajax({
        url: url_global+"/public/subirFile.php",
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
            if (data != "") {
            $(".upload-msg").addClass('alert alert-success').attr('role', 'alert').html('Archivo actualizado, da click al boton modificar para guardar esta acción');
            $("#txtLogotipo").attr('data-logo', data);
            window.setTimeout(function() {
            $(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
                $(".upload-msg").removeClass('alert-success').html('');
            }); }, 5000);
            }
            else {
                $(".upload-msg").addClass('alert alert-danger').attr('role', 'alert').html('No se logro subir el archivo');
                window.setTimeout(function() {
                $(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                    $(".upload-msg").removeClass('alert-success').html('');
                }); }, 5000);
            }
        }
    });   
}
