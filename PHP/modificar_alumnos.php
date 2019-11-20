<?php
    include ("conexion.php");
    if(! empty($_POST)){
        $ApellidoPaterno = strtoupper($_POST['ap']);
        $ApellidoMaterno = strtoupper($_POST['am']);
        $Nombres = strtoupper($_POST['nombre']);
        $Codigo = $_POST['codigo'];
        $FechaDeNacimiento = strtoupper($_POST['fechan']);
        $CURP = strtoupper($_POST['curp']);
        $Correo1 = $_POST['correo1'];
        $Correo2= $_POST['correo2'];
        $Cel1 = $_POST['cel1'];
        $Cel2 = $_POST['cel2'];
        $Telefono = $_POST['tel'];
        $Direccion = strtoupper($_POST['direccion']);
        $NumExt = $_POST['numeroext'];
        $NumInt = $_POST['numeroint'];
        $CP = $_POST['cp'];
        $Colonia = strtoupper($_POST['colonia']);
        $Municipio = strtoupper($_POST['municipio']);
        $Referencia = strtoupper($_POST['referencia']);
        $NombreCompleto = "$ApellidoPaterno $ApellidoMaterno $Nombres";
        $errores = array();
        $datos = array();
        $Consulta = "SELECT CODIGO FROM ALUMNO WHERE CODIGO = '$Codigo'";

        $Consulsta1 = "DELETE FROM DATOS_ALUMNO WHERE CODIGO = '$Codigo'";
        $Consulsta2 = "DELETE FROM ALUMNO WHERE CODIGO = '$Codigo'";
        $Query = $conexion -> query($Consulsta1);
        $Query2 = $conexion -> query($Consulsta2);


        $Insersion1 = "INSERT INTO ALUMNO(CODIGO, NOMBRE) VALUES('$Codigo','$NombreCompleto')";
        $Insersion2 = "INSERT INTO DATOS_ALUMNO(
                CODIGO, CURP, APELLIDO_PATERNO, APELLIDO_MATERNO, NOMBRES,
                FECHA_DE_NACIMIENTO, CORREO_ELECTRONICO_1, CORREO_ELECTRONICO_2,
                NUMERO_CELULAR_1, NUMERO_CELULAR_2, NUMERO_TELEFONO_CASA,
                DIRECCION, NUMERO_EXTERIOR, NUMERO_INTERIOR, COLONIA,
                MUNICIPIO, CODIGO_POSTAL, REFERENCIAS
            ) VALUES(
                '$Codigo','$CURP','$ApellidoPaterno','$ApellidoMaterno','$Nombres',
                '$FechaDeNacimiento','$Correo1', '$Correo2','$Cel1','$Cel2','$Telefono',
                '$Direccion','$NumExt','$NumInt','$Colonia','$Municipio','$CP','$Referencia'
            )
        ";
        $Query1 = $conexion -> query($Insersion1);
        $Query2 = $conexion -> query($Insersion2);
        if(!$Query1 || !$Query2){
            $errores['insersion_alumnos'] = "Hubo un problema al guardar al alumno.";
        }

        if(empty($errores)){
            $datos['exito'] = true;
            $datos['mensaje'] = "Se ha registrado al alumno correctamente.";
        }
        else{
            $datos['exito'] = false;
            $datos['errores'] = $errores;
        }
        $conexion -> close();
        echo json_encode($datos);
    }
?>