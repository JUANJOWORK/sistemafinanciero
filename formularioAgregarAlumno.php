<?php
require_once 'conexion.php';
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="JUAN JOSE GONZALEZ CARDENAS">
    <title>Formulario Agregar Alumnos</title>
    <link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/estilos.css">
    <link rel="stylesheet" type="text/css" href="CSS/columnas.css">
</head>

<body>
    <div class="row">
        <div class="col-12 header">
            <?php require_once 'header2.html'; ?>
        </div>
    </div>
    <div class="row">

        <div class="col-3 menu">
            <!--etiqueta que especifica la navegación del sitio web-->
            <?php require_once 'Menu2.html'; ?>
        </div>
        <!--etiqueta que especifica la navegación del sitio web-->

        <div class="col-9">
            <h3 class="titulosecond">Agregar un Alumno</h3>

            <form action="agregarAlumno_bd.php">
                <label class="col-12 labelagregar">Matricula:</label>
                <input type="text" name="matricula" autofocus="autofocus" class="col-8 form-control" required="" pattern="[0-9]{8}" minlength="8" maxlength="8 " placeholder="Ingresa la matricula" title="Deben ser 8 n&uacute;meros." value="" />


                <label class="col-12 labelagregar">Nombre(s):</label>
                <input type="text" name="nombre" required="required" class="col-8 form-control" pattern="[a-zA-Z Á É Í Ó Ú á é í ó ú ]*" minlength="3" maxlength="20" placeholder="Ingresa el nombre(s)" />


                <label class="col-12 labelagregar">Apellidos:</label>
                <input type="text" name="apellido" required="required" class="col-8 form-control" pattern="[a-zA-Z Á É Í Ó Ú á é í ó ú ]*" minlength="3" maxlength="20" placeholder="Ingresa el apellido(s)" style="margin-bottom: 2%;" />

                <div class="col-12" style="margin: 2% 0% 2% 0% ;">
                    <input type="button" onclick="location.href = 'consultaAlumnos.php'" class="btn btn-danger" name="cancelar" value="Cancelar" style="margin-right: 2%;" />

                    <input type="submit" name="guardar" value="Aceptar" class="btn btn-success" style="margin-right: 2%;" />
                </div>
            </form>
        </div>

    </div>

    <footer class="col-12 footerend">
        <!--pie de pagina-->
        <?php require_once 'footer.html'; ?>
    </footer>

</body>

</html>