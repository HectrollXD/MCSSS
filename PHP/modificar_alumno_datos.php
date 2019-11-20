<?php
    include ("conexion.php");
    if(!empty($_POST)){
        $codigo = $_POST['codigo'];
        $datos = array();
        $Consulta = "SELECT * FROM DATOS_ALUMNO WHERE CODIGO = '$codigo'";
        $Query = $conexion -> query($Consulta);
        while($rows = $Query -> fetch_array()){
            $datos['codigo'] = $rows[0];
            $datos['curp'] = $rows[1];
            $datos['apellidop'] = $rows[2];
            $datos['apellidom'] = $rows[3];
            $datos['nombres'] = $rows[4];
            $datos['fechadenacimiento'] = $rows[5];
            $datos['correo1'] = $rows[6];
            $datos['correo2'] = $rows[7];
            $datos['celular1'] = $rows[8];
            $datos['celular2'] = $rows[9];
            $datos['telefono'] = $rows[10];
            $datos['direccion'] = $rows[11];
            $datos['exterior'] = $rows[12];
            $datos['interior'] = $rows[13];
            $datos['colonia'] = $rows[14];
            $datos['municipio'] = $rows[15];
            $datos['cp'] = $rows[16];
            $datos['referencias'] = $rows[17];
        }
        $conexion -> close();
        echo json_encode($datos);
    }
?>

