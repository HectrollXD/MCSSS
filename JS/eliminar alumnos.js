$(document).ready(main);

function main(){
    $('#btn-buscar').click(mostrar_registros);
    $('#Tabla').on('click','.btn-danger',eliminar);
}

function mostrar_registros(){
    var datos = { 'Busqueda': $('#Buscar').val() };
    $.ajax({
        type: 'POST',
        url: 'PHP/mostrar_alumnos_eliminar.php',
        data: datos,
        dataType: 'html'
    }).done(
        function(tabla){
            $('#Tabla').html(tabla);
        }
    );
}

function eliminar(){
    var codigo = { 'codigo': $(this).attr('id') };
    $.ajax({
        type: 'POST',
        url: 'PHP/eliminar_alumno.php',
        data: codigo,
        dataType: 'json',
        encode: true
    }).done(
        function(data){
            if(data.exito){
                alert(data.mensaje);
                mostrar_registros();
            }
            else{
                alert(data.errores.eliminar);
            }
        }
    );
}