<?php
    include ("conexion.php");
    $Tabla = "";
    $Tabla .="
        <table class='table text-center'>
            <thead>
                <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Código de alumno</th>
                    <th scope='col'>Nombre de alumno</th>
                    <th scope='col'>Fecha</th>
                    <th scope='col'>Hora de entrada</th>
                </tr>
            </thead>
            <tbody>
    ";
    if(empty($_POST)){
        $consulta = $conexion -> query("SELECT * FROM ASISTENCIAS");
        while($filas = $consulta -> fetch_array() ){
            $nombres = ucwords(strtolower($filas[2]));
            $fecha = strtolower($filas[3]);
            $Tabla.="
                        <tr>
                            <th>$filas[0]</th>
                            <th>$filas[1]</th>
                            <th>$nombres</th>
                            <th>$fecha</th>
                            <th>$filas[4]</th>
                        </tr>
            ";
        }
        $Tabla.="
                </tbody>
            </table>
        ";
        if(mysqli_num_rows($consulta)<= 0){
            $Tabla = "No hay asistencias registradas.";
        }
        echo $Tabla;
    }   
    else{
        $B = $_POST['codigo'];
        $Buscar = "SELECT * FROM ASISTENCIAS WHERE CODIGO LIKE '%$B%' OR NOMBRE_DE_ALUMNO LIKE '%$B%' OR FECHA_DE_ENTRADA LIKE '%$B%' OR HORA_DE_ENTRADA LIKE '%$B%'";
        $consulta = $conexion -> query($Buscar);
        while($filas = $consulta -> fetch_array() ){
            $nombres = ucwords(strtolower($filas[2]));
            $fecha = strtolower($filas[3]);
            $Tabla.="
                        <tr>
                            <th>$filas[0]</th>
                            <th>$filas[1]</th>
                            <th>$nombres</th>
                            <th>$fecha</th>
                            <th>$filas[4]</th>
                        </tr>
            ";
        }
        $Tabla.="
                </tbody>
            </table>
        ";
        if(mysqli_num_rows($consulta)<= 0){
            $Tabla = "No hay asistencias registradas.";
        }
        echo $Tabla;
    }
?>
