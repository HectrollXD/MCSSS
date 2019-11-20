<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Eliminar Alumnos</title>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/simple-sidebar.css" rel="stylesheet">
    </head>
    <body onload="mostrar_registros()">
        <?php include ("shared/navbarini.html"); ?>
            <div class="container-fluid">
                <h1 class="text-center">Eliminar alumnos.</h1>
                <hr><br>
                <div class="row">
                    <div class="col-lg-2"></div>
                    <input type="text" id="Buscar" class="col-lg-6 form-control" placeholder="Buscar">
                    <input type="button" value="Buscar" class="col-lg-2 btn-primary form-control" id="btn-buscar">
                    <div class="col-lg-2"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10 table-responsive" id="Tabla"></div>
                    <div class="col-lg-1"></div>
                </div>
            </div>
        <?php include ("shared/navbarend.html"); ?>
    </body>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="JS/eliminar alumnos.js"></script>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
  </script>
</html>