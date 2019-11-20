<?php
    include ("conexion.php");
    if(!empty($_POST)){
        $codigo = $_POST['codigo'];
        $datos = array();
        $vista = "";
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
        $vista = "
            <div class='row'>
                <div class='col-lg-2 text-lg-right'><label for='apellidop'>Apellido paterno:</label></div>
                <div class='col-lg-4'><input type='text' class='form-control' value='$datos[apellidop]' disabled='true'></div>
                <div class='col-lg-2 text-lg-right'><label for='apellidom'>Apellido materno:</label></div>
                <div class='col-lg-4'><input type='text' class='form-control' value='$datos[apellidom]' disabled='true'></div>
            </div><br>
            <div class='row'>
                <div class='col-lg-2 text-lg-right'><label for='nombres'>Nombres:</label></div>
                <div class='col-lg-6'><input type='text' class='form-control' value='$datos[nombres]' disabled='true'></div>
                <div class='col-lg-1 text-lg-right'><label for='codigo'> Código:</label></div>
                <div class='col-lg-3'><input type='text' class='form-control' value='$datos[codigo]' disabled='true'></div>
            </div><br>
            <div class='row'>
                <div class='col-lg-3 text-lg-right'><label for='fn'>Fecha de nacimiento:</label></div>
                <div class='col-lg-3'><input type='text' class='form-control' value='$datos[fechadenacimiento]' disabled='true'></div>
                <div class='col-lg-1 text-lg-right'><label for='curp'>CURP:</label></div>
                <div class='col-lg-5'><input type='text' class='form-control' value='$datos[curp]' disabled='true'></div>
            </div><br>
            <div class='row'>
                <div class='col-lg-3 text-lg-right'><label for='correo1'>Correo electróncio 1:</label></div>
                <div class='col-lg-9'><input type='text' class='form-control' value='$datos[correo1]' disabled='true'></div>
            </div><br>
            <div class='row'>
                <div class='col-lg-3 text-lg-right'><label for='correo2'>Correo electróncio 2:</label></div>
                <div class='col-lg-9'><input type='text' class='form-control' value='$datos[correo2]' disabled='true'></div>
            </div><br>
            <div class='row'>
                <div class='col-lg-2 text-lg-right'><label for='cel1'>No. De celular 1:</label></div>
                <div class='col-lg-4'><input type='text' class='form-control' value='$datos[celular1]' disabled='true'></div>
                <div class='col-lg-2 text-lg-right'><label for='cel2'>No. De celular 2:</label></div>
                <div class='col-lg-4'><input type='text' class='form-control' value='$datos[celular2]' disabled='true'></div>
            </div><br>
            <div class='row'>
                <div class='col-lg-4 text-lg-right'><label for='tel'>Número de teléfono de casa:</label></div>
                <div class='col-lg-8'><input type='text' class='form-control' value='$datos[telefono]' disabled='true'></div>
            </div><br>
            <div class='row'>
                <div class='col-lg-2 text-lg-right'><label for='direccion'>Dirección</label></div>
                <div class='col-lg-10'><input type='text' class='form-control' value='$datos[direccion]' disabled='true'></div>
            </div><br>
            <div class='row'>
                <div class='col-lg-2 text-lg-right'><label for='numext'>Número exterior</label></div>
                <div class='col-lg-2'><input type='text' class='form-control' value='$datos[exterior]' disabled='true'></div>
                <div class='col-lg-2 text-lg-right'><label for='numint'>Número interior</label></div>
                <div class='col-lg-2'><input type='text' class='form-control' value='$datos[interior]' disabled='true'></div>
                <div class='col-lg-1 text-lg-right'><label for='cp'>C.P.:</label></div>
                <div class='col-lg-3'><input type='text' class='form-control' value='$datos[cp]' disabled='true'></div>
            </div><br>
            <div class='row'>
                <div class='col-lg-2 text-lg-right'><label for='colonia'>Colonia</label></div>
                <div class='col-lg-4'><input type='text' class='form-control' value='$datos[colonia]' disabled='true'></div>
                <div class='col-lg-2 text-lg-right'><label for='municipio'>Municipio:</label></div>
                <div class='col-lg-4'><input type='text' class='form-control' value='$datos[municipio]' disabled='true'></div>
            </div><br>
            <div class='row'>
                <div class='col-lg-2 text-lg-right'><label for='ref'>Referencias</label></div>
                <div class='col-lg-10'><textarea rows='5' class='form-control' disabled='true'>$datos[referencias]</textarea></div>
            </div><br>
        ";
        echo $vista;
    }
?>

