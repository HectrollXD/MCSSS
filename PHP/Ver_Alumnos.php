<?php
    include ("conexion.php");
    $Tabla = "";
    $Tabla .='
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Nombre completo</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
    ';

    if(empty($_POST)){
        $Consulta = "SELECT * FROM ALUMNO ORDER BY NOMBRE ASC";
        $Query = $conexion -> query($Consulta);
        while($rows = $Query -> fetch_array()){
            $Nombre = ucwords(strtolower($rows[1]));
            $Tabla .="
                    <tr>
                        <td>$rows[0]</td>
                        <td>$Nombre</td>
                        <td><input type='button' value='Datos' id='$rows[0]' class='btn btn-secondary form-control'></td>
                    </tr>
            ";
        }
        $Tabla .= "
            </tbody>
        </table>
        ";
        if(mysqli_num_rows($Query) <= 0){
            $Tabla = "No hay alumnos registrados en la base de datos.";
        }
    }
    else{
        $B = $_POST['Busqueda'];
        $Consulta = "SELECT * FROM ALUMNO WHERE CODIGO LIKE '%$B%' OR NOMBRE LIKE '%$B%' ORDER BY NOMBRE ASC";
        $Query = $conexion -> query($Consulta);
        while($rows = $Query -> fetch_array()){
            $Nombre = ucwords(strtolower($rows[1]));
            $Tabla .="
                    <tr>
                        <td>$rows[0]</td>
                        <td>$Nombre</td>
                        <td><input type='button' value='Datos' id='$rows[0]' class='btn btn-secondary form-control'></td>
                    </tr>
            ";
        }
        $Tabla .= "
            </tbody>
        </table>
        ";
        if(mysqli_num_rows($Query) <= 0){
            $Tabla = "No hay resultados similares a la busqueda realizada.";
        }
    }
    echo $Tabla;
?>