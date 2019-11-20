<?php
    include ("conexion.php");
    //if(!empty($_POST)){
        date_default_timezone_set('America/Mexico_City');
        $codigo = $_POST['codigo'];
        $Nombre = "";
        $correo = "";

        $errores = array();
        $datos = array();
        $Seleccion = "SELECT NOMBRE FROM ALUMNO WHERE CODIGO = '$codigo'";
        $Query = $conexion -> query($Seleccion);
        while($rows = $Query -> fetch_array()){
            $Nombre = $rows[0];
        }
        

        if( mysqli_num_rows($Query) == 1 ){
            $Seleccion = "SELECT CORREO_ELECTRONICO_1 FROM DATOS_ALUMNO WHERE CODIGO = '$codigo'";
            $Query = $conexion -> query($Seleccion);
            while($rows = $Query -> fetch_array()){
                $correo = $rows[0];
            }
            $Fecha = strtoupper(strftime('%d/%B/%Y'));
            $Hora = date('h:i A');
            $Insertar = "INSERT INTO ASISTENCIAS(CODIGO, NOMBRE_DE_ALUMNO, FECHA_DE_ENTRADA, HORA_DE_ENTRADA) VALUES('$codigo','$Nombre', '$Fecha', '$Hora')";
            $Query = $conexion -> prepare($Insertar);
            $Query -> execute();
            if(!$Query){
                $errores['insersion'] = "Hubo un problema al insertar los datos. :'(";
            }
            else{
                $Asunto = "Su hijo a ingresado a la institución";
                $Mensaje = "Por este medio le informamos a usted padre/madre de familia que su hijo $Nombre con el código $codigo si a ingresado a la institución,ya que, su hijo, acaba de tomar asistencia.\n!Que tenga un excelente día! :)";
                if(mail($correo, $Asunto, $Mensaje)){
                    $datos['correo'] = "Se ha enviado el correo electrónico satisfactoriamente.";
                }
                else{
                    $datos['correo'] = "No se pudo enviar el correo electrónico. :(";
                }
            }
        }
        else{
            $errores['registrado'] = "El alumno con el código $codigo no está registrado.";
        }

        if( empty($errores) ){
            $datos['exito'] = true;
            $datos['mensajes'] = "Se ha tomado la asistencia correctamente.";
        }
        else{
            $datos['exito'] = false;
            $datos['errores'] = $errores;            
        }
        $conexion -> close();
        echo json_encode($datos);
    //}
?>