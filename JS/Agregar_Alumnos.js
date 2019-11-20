$(document).ready(principal);

function principal(){
    $('#guardar').click(validar);
    $('#borrar').click(borrar_campos);
}

function validar(){
    var campos = {
        'ap': $('#apellidop').val(),
        'am': $('#apellidom').val(),
        'nombre': $('#nombres').val(),
        'codigo': $('#codigo').val(),
        'fechan': $('#fn').val(),
        'curp': $('#curp').val(),
        'correo1': $('#correo1').val(),
        'correo2': $('#correo2').val(),
        'cel1': $('#cel1').val(),
        'cel2': $('#cel2').val(),
        'tel': $('#tel').val(),
        'direccion': $('#direccion').val(),
        'numeroext': $('#numext').val(),
        'numeroint': $('#numint').val(),
        'cp': $('#cp').val(),
        'colonia': $('#colonia').val(),
        'municipio': $('#municipio').val(),
        'referencia': $('#ref').val()
    };
    var error_de_validacion = false;
    var mensaje = "";

    if(campos['ap'] == ""){
        mensaje = "<p>El apellido paterno no puede quedar vacío.</p>";
        error_de_validacion = true; 
    }
    if(campos['am'] == ""){
        mensaje = mensaje + "<p>El apellido materno no puede quedar vacío.</p>";
        error_de_validacion = true;
    }
    if(campos['nombre'] == ""){
        mensaje = mensaje + "<p>El campo del nombre no puede quedar vacío.</p>";
        error_de_validacion = true;
    }
    if(campos['codigo'] == ""){
        mensaje = mensaje + "<p>El campo del código no puede quedar vacío.</p>";
        error_de_validacion = true;
    }
    if(campos['fechan'] == ""){
        mensaje = mensaje + "<p>La fecha de nacimiento no puede quedar vacía.</p>";
        error_de_validacion = true;
    }
    if(campos['curp'] == ""){
        mensaje = mensaje + "<p>El campo de la CURP no puede quedar vacía.</p>";
        error_de_validacion = true;
    }
    if(campos['correo1'] == ""){
        mensaje = mensaje + "<p>El campo del correo electrónico no puede quedar vácio.</p>";
        error_de_validacion = true;
    }
    if(campos['cel1'] == ""){
        mensaje = mensaje + "<p>El campo del número de celular 1 no puede quedar vacío.</p>";
        error_de_validacion = true;
    }
    if(campos['direccion'] == ""){
        mensaje = mensaje + "<p>El campo de la direccion no puede qudar vacío.</p>";
        error_de_validacion = true;
    }
    if(campos['numeroext'] == ""){
        mensaje = mensaje + "<p>El campo del numero exterior no puede quedar vacío.</p>";
        error_de_validacion = true;
    }
    if(campos['cp'] == ""){
        mensaje = mensaje + "<p>El campo del código postal no puede quedar vacío.</p>";
        error_de_validacion = true;
    }
    if(campos['colonia'] == ""){
        mensaje = mensaje + "<p>el campo de la colonia no puede quedar vacío.</p>";
        error_de_validacion = true;
    }
    if(campos['municipio'] == ""){
        mensaje = mensaje + "<p>El campo del municipio no puede quedar vacío.</p>";
        error_de_validacion = true;
    }
    if(campos['referencia'] == ""){
        mensaje = mensaje + "<p>El campo de las referencias no puede quedar vacío.</p>";
        error_de_validacion = true;
    }


    if(error_de_validacion){
        $('#error').html(mensaje).css('display','block');
    }
    else{
        $.ajax({
            type: 'POST',
            url: 'PHP/agregar_alumnos.php',
            data: campos,
            dataType: 'json',
            encode: true
        }).done(
            function(data){
                if(data.exito){
                    alert(data.mensaje);
                    borrar_campos();
                }
                else{
                    if(data.errores.insersion_alumnos){
                        $('#error').html(data.errores.insersion_alumnos).css('display','block');
                    }
                    else if(data.errores.existente){
                        $('#error').html(data.errores.existente).css('display','block');
                    }
                }
            }
        );
    }
}

function borrar_campos(){
    $('#apellidop').val("");
    $('#apellidom').val("");
    $('#nombres').val("");
    $('#codigo').val("");
    $('#fn').val("");
    $('#curp').val("");
    $('#correo1').val("");
    $('#correo2').val("");
    $('#cel1').val("");
    $('#cel2').val("");
    $('#tel').val("");
    $('#direccion').val("");
    $('#numext').val("");
    $('#numint').val("");
    $('#cp').val("");
    $('#colonia').val("");
    $('#municipio').val("");
    $('#ref').val("");
    $('#error').css('display','none');
}