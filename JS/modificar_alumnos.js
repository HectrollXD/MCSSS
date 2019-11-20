$(document).ready(main);

function main(){
    $('#btn-buscar').click(mostrar_alumnos);
    $('#Tabla').on('click', '.btn-warning', mostrar);
    $('#btnregresar').click(ocultarymostrar);
    $('#guardar').click(validar);
}

function mostrar_alumnos(){
    var datos = { 'Busqueda': $('#Buscar').val() };
    $.ajax({
        type: 'POST',
        url: 'PHP/mostrar_alumnos_modificar.php',
        data: datos,
        dataType: 'html'
    }).done(
        function(tabla){
            $('#Tabla').html(tabla);
        }
    );
}

function mostrar(){
    var codigo = {'codigo': $(this).attr('id')}
    $.ajax({
        type: 'POST',
        url: 'PHP/modificar_alumno_datos.php',
        data: codigo,
        dataType: 'json',
        encode: true
    }).done(
        function(data){
            $('#apellidop').val(data.apellidop);
            $('#apellidom').val(data.apellidom);
            $('#nombres').val(data.nombres);
            $('#codigo').val(data.codigo);
            $('#fn').val(data.fechadenacimiento);
            $('#curp').val(data.curp);
            $('#correo1').val(data.correo1);
            $('#correo2').val(data.correo2);
            $('#cel1').val(data.celular1);
            $('#cel2').val(data.celular2);
            $('#tel').val(data.telefono);
            $('#direccion').val(data.direccion);
            $('#numext').val(data.exterior);
            $('#numint').val(data.interior);
            $('#cp').val(data.cp);
            $('#colonia').val(data.colonia);
            $('#municipio').val(data.municipio);
            $('#ref').val(data.referencias);

            $('#vista').css('display','block');
            $('#Tabla').css('display','none');
            $('.searchbar').css('display','none');
            $('#regresar').css('display','block');
        }
    );
}

function ocultarymostrar(){
    $('#vista').css('display','none');
    $('#Tabla').css('display','block');
    $('.searchbar').css('display','block');
    $('#regresar').css('display','none');
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
            url: 'PHP/modificar_alumnos.php',
            data: campos,
            dataType: 'json',
            encode: true
        }).done(
            function(data){
                if(data.exito){
                    alert(data.mensaje);
                    ocultarymostrar();
                    mostrar_alumnos();
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