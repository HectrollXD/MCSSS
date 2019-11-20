<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Modificar Alumnos</title>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/simple-sidebar.css" rel="stylesheet">
    </head>
    <body onload="mostrar_alumnos()">
        <?php include ("shared/navbarini.html"); ?>
            <div class="container-fluid">
                <h1 class="text-center">Modificar alumnos.</h1>
                <hr><br>
                <div class="row">
                    <div class="col-lg-2"></div>
                    <input type="text" id="Buscar" class="col-lg-5 form-control" placeholder="Buscar">
                    <div class="col-lg-1"></div>
                    <input type="button" value="Buscar" class="col-lg-2 btn btn-secondary" id="btn-buscar">
                    <div class="col-lg-2"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10 table-responsive" id="Tabla"></div>
                    <div class="col-lg-1"></div>
                </div>
                <div class="row" id="regresar" style="display:none;">
                    <div class="col-lg-10"></div>
                    <div class="col-lg-2"><input type="button" value="Regresar" class="btn btn-primary form-control" id="btnregresar"></div>
                </div><br>
                <div id="vista" style="display:none;">
                    <div class="row">
                        <div class="col-lg-2 text-lg-right"><label for="apellidop">* Apellido paterno:</label></div>
                        <div class="col-lg-4"><input type="text" id="apellidop" placeholder="Apellido paterno" class="form-control"></div>
                        <div class="col-lg-2 text-lg-right"><label for="apellidom">* Apellido materno:</label></div>
                        <div class="col-lg-4"><input type="text" id="apellidom" placeholder="Apellido materno" class="form-control"></div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-2 text-lg-right"><label for="nombres">* Nombres:</label></div>
                        <div class="col-lg-6"><input type="text" id="nombres" class="form-control" placeholder="Nombre(s)"></div>
                        <div class="col-lg-1 text-lg-right"><label for="codigo">*Código:</label></div>
                        <div class="col-lg-3"><input type="text" id="codigo" class="form-control" placeholder="Ej. 1234"></div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-3 text-lg-right"><label for="fn">* Fecha de nacimiento:</label></div>
                        <div class="col-lg-3"><input type="text" id="fn" class="form-control" placeholder="Ej. 1/enero/2000"></div>
                        <div class="col-lg-1 text-lg-right"><label for="curp">* CURP:</label></div>
                        <div class="col-lg-5"><input type="text" id="curp" class="form-control" placeholder="CURP"></div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-3 text-lg-right"><label for="correo1">* Correo electróncio 1:</label></div>
                        <div class="col-lg-9"><input type="text" id="correo1" class="form-control" placeholder="alguien@ejemplo.com"></div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-3 text-lg-right"><label for="correo2">Correo electróncio 2:</label></div>
                        <div class="col-lg-9"><input type="text" id="correo2" class="form-control" placeholder="alguien@ejemplo.com"></div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-2 text-lg-right"><label for="cel1">* No. De celular 1:</label></div>
                        <div class="col-lg-4"><input type="text" id="cel1" class="form-control" placeholder="Número de teléfono celular"></div>
                        <div class="col-lg-2 text-lg-right"><label for="cel2">No. De celular 2:</label></div>
                        <div class="col-lg-4"><input type="text" id="cel2" class="form-control" placeholder="Número de teléfono celular"></div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-4 text-lg-right"><label for="tel">Número de teléfono de casa:</label></div>
                        <div class="col-lg-8"><input type="text" id="tel" class="form-control" placeholder="Telefono de casa"></div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-2 text-lg-right"><label for="direccion">* Dirección</label></div>
                        <div class="col-lg-10"><input type="text" id="direccion" class="form-control" placeholder="Dirección de casa"></div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-2 text-lg-right"><label for="numext">* Número exterior</label></div>
                        <div class="col-lg-2"><input type="text" id="numext" class="form-control" placeholder="Número exterior"></div>
                        <div class="col-lg-2 text-lg-right"><label for="numint">Número interior</label></div>
                        <div class="col-lg-2"><input type="text" id="numint" class="form-control" placeholder="Número interior"></div>
                        <div class="col-lg-1 text-lg-right"><label for="cp">* C.P.:</label></div>
                        <div class="col-lg-3"><input type="text" id="cp" class="form-control" placeholder="Código Postal"></div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-2 text-lg-right"><label for="colonia">* Colonia</label></div>
                        <div class="col-lg-4"><input type="text" id="colonia" class="form-control" placeholder="Colonia"></div>
                        <div class="col-lg-2 text-lg-right"><label for="municipio">* Municipio:</label></div>
                        <div class="col-lg-4"><input type="text" id="municipio" class="form-control" placeholder="Municipio"></div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-2 text-lg-right"><label for="ref">* Referencias</label></div>
                        <div class="col-lg-10"><textarea id="ref" rows="5" placeholder="Ej. entre calle ... y calle ..." class="form-control"></textarea></div>
                    </div><br>
                    <div id="error" style="display: none;" class="alert alert-danger" role="alert">
                        Asegurate de llenar los datos correctamente.
                    </div>
                    <div class="row">
                        <div class="col-lg-10"></div>
                        <div class="col-lg-2"><input type="button" id="guardar" value="Guardar" class="btn btn-primary form-control"></div>
                    </div><br><br><br>
                </div>
            </div>
        <?php include ("shared/navbarend.html"); ?>
    </body>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="JS/modificar_alumnos.js"></script>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
  </script>
</html>