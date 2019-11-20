<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tomar Asistencia</title>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/simple-sidebar.css" rel="stylesheet">
    </head>
    <body>
        <?php include ("shared/navbarini.html"); ?>
            <div class="container-fluid">
                <h1 class="text-center">Tomar Asistencia</h1>
                <hr><br>
                <div class="row">
                    <div class="col-lg-6 text-lg-right text-sm-center"><label for="codigo">Ingresa tú código de alumno aquí para registrar tu asistencia:</label></div>
                    <div class="col-lg-3"><input type="text" id="codigo" class="form-control" placeholder="Código"></div>
                    <div class="col-lg-2"><input type="button" value="Tomar Asistencia" class="btn btn-secondary form-contol" id="guardar"></div>
                    <div class="col-lg-1"></div>
                </div>
            </div>
        <?php include ("shared/navbarend.html"); ?>
    </body>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="JS/Asistencia.js"></script>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
  </script>
</html>