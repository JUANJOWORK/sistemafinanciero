<?php
require_once 'conexion.php';
$Matricula = $_GET["matricula"];

$sql = "SELECT * FROM alumnos WHERE matricula='$Matricula'";
$resultado = $db->query($sql);

$registro = $resultado->fetch_array();
$nombre = $registro["nombre"];
$apellido = $registro["apellidos"];
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Alumnos</title>
    <link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/estilos.css">
    <link rel="stylesheet" type="text/css" href="CSS/columnas.css">
</head>

<body>
    <div class="row">
        <div class="col-12 header">
            <!--ENCABEZADO-->
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
            <h3 class="titulosecond">Modificar un Alumno</h3>

            <form action="modificarAlumno_BD.php">
                <label class="col-12 labelagregar">Matricula:</label>
                <input type="text" name="matricula" readonly="" required="required" pattern="[0-9]{8}" minlength="8" maxlength="8" placeholder="Ingresa la matricula" title="Deben ser 8 n&uacute;meros." class="col-8 form-control" value="<?php echo $Matricula; ?>" />



                <label class="col-12 labelagregar">Nombre(s):</label>
                <input type="text" name="nombre" autofocus="autofocus" required="required" pattern="[a-zA-Z Á É Í Ó Ú á é í ó ú ]*" minlength="1" maxlength="30" class="col-8 form-control" value="<?php echo $nombre; ?>" />


                <label class="col-12 labelagregar">Apellido(s):</label>
                <input type="text" name="apellido" required="required" pattern="[a-zA-Z Á É Í Ó Ú á é í ó ú ]*" minlength="1" maxlength="30" class="col-8 form-control" value="<?php echo $apellido; ?>" />


                <div class="col-12" style="margin: 2% 0% 2% 0;">
                    <input type="button" onclick="location.href = 'consultaAlumnos.php'" class="btn btn-warning" name="cancelar" value="Cancelar" style="margin-right: 2%;" />

                    <input type="submit" name="guardar" class="btn btn-secondary" value="Guardar" />

                </div>



            </form>
        </div>

    </div>

    <footer class="col-12 footerend">
        <?php require_once 'footer.html'; ?>
    </footer>

</body>

</html>