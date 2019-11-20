$(document).ready(main);

function main(){
    $('#btn-buscar').click(mostrar_alumnos);
    $('#Tabla').on('click', '.btn-success', mostrar);
    $('#btnregresar').click(ocultarymostrar);
    
}

function mostrar_alumnos(){
    var datos = { 'Busqueda': $('#Buscar').val() };
    $.ajax({
        type: 'POST',
        url: 'PHP/Ver_Alumnos.php',
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
        url: 'PHP/Mostrar_todos_los_datos.php',
        data: codigo,
        dataType: 'html'
    }).done(
        function(tabla){
            $('#vista').html(tabla).css('display','block');
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