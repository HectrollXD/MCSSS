<?php
    include ("conexion.php");
    //if(! empty($_POST)){
        $Codigo = $_POST['codigo'];
        $Consulsta1 = "DELETE FROM DATOS_ALUMNO WHERE CODIGO = '$Codigo'";
        $Consulsta2 = "DELETE FROM ALUMNO WHERE CODIGO = '$Codigo'";
        $errores = array();
        $datos = array();

        $Query = $conexion -> query($Consulsta1);
        $Query2 = $conexion -> query($Consulsta2);
        if(! $Query || ! $Query2){
            $errores['eliminar'] = "Hubo un problema al eliminar el alumno.";
        }

        if(empty($errores)){
            $datos['exito'] = true;
            $datos['mensaje'] = "Se ha eliminado el alumno exitosamente.";
        }
        else{
            $datos['exito'] = false;
            $datos['errores'] = $errores;
        }
        echo json_encode($datos);
    //}
?>