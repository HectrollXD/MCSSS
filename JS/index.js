$(document).ready(main);

function main(){
    $('#btn-buscar').click(mostrar_registros);
}

function mostrar_registros(){
    var datos = { 'codigo': $('#Buscar').val() };
    $.ajax({
        type: 'POST',
        url: 'PHP/Mostrar_tabla_de_asistencia.php',
        data: datos,
        dataType: 'html'
    }).done(
        function(tabla){
            $('#Tabla').html(tabla);
        }
    );
}