<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Ver Alumnos</title>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/simple-sidebar.css" rel="stylesheet">
    </head>
    <body onload="mostrar_alumnos()">
        <?php include ("shared/navbarini.html"); ?>
            <div class="container-fluid">
                <h1 class="text-center">Alumnos registrados</h1>
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
                    <div class="col-lg-2"><input type="button" value="Regresar" class="btn btn-secondary form-control" id="btnregresar"></div>
                </div><br>
                <div id="vista" style="display:none;">
                </div>
            </div>
        <?php include ("shared/navbarend.html"); ?>
    </body>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="JS/ver_alumnos.js"></script>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
  </script>
</html>