var messageResponse= $('#processData'),
    textErrorRecaptcha = '<div class="error">Por favor selecciona el código de verificación humana</div>';

<<<<<<< HEAD
function uploadFile(el){//Funcion encargada de enviar el archivo via AJAX
    
=======
function uploadFile(el, id){//Funcion encargada de enviar el archivo via AJAX
    debugger
>>>>>>> 7486574ac52cba5bfeb4302fba58234fc72ff9e2
    var inputFileImage = document.getElementById(el.id);
    var file = inputFileImage.files[0];
    var data = new FormData();
    data.append('fileToUpload',file);
                
    $.ajax({
        url: url_global+"/public/subirFile.php",
        type: "POST",
        dataType: 'JSON',
        data: data,
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
            if(data != "")
                $("#"+id).val(data.name);
        }
    });   
}
