$(document).ready(main);

function main(){
    $("#guardar").click(guardar);
}

function guardar(){
    var datos = { 'codigo': $('#codigo').val() };
    $.ajax({
        type: 'POST',
        url: 'PHP/Tomar_asistencia.php',
        data: datos,
        dataType: 'json',
        encode: true
    }).done(
        function(data){
            if(data.exito){
                alert(data.mensajes);
                alert(data.correo);
                $('#codigo').val("");
            }
            else{
                if(data.errores.registrado){
                    alert(data.errores.registrado);
                }
                else if(data.errores.insersion){
                    alert(data.errores.insersion);
                }
            }
        }
    );
}