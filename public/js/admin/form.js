var messageResponse= $('#processData'),
    textErrorRecaptcha = '<div class="error">Por favor selecciona el código de verificación humana</div>';

function uploadFile(el){//Funcion encargada de enviar el archivo via AJAX
    var inputFileImage = document.getElementById(el.id);
    var file = inputFileImage.files[0];
    var data = new FormData();
    data.append('fileToUpload',file);
                
    $.ajax({
        url: url_global+"/subirFile.php",
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
