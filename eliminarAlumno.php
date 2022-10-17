<?php
require_once 'conexion.php';
$Matricula = $_GET["matricula"];

$sql = "SELECT * FROM alumnos WHERE matricula='$Matricula'";
$resultado = $db->query($sql);

while ($registro = $resultado->fetch_array()) { //$registro=$resultado->fetch_array();
    $Nombre = $registro["nombre"];
    $Apellido = $registro["apellidos"];
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Alumno</title>
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
            <h3 class="titulosecond">Eliminar Alumno</h3>
            <div class="d-flex justify-content-start alert alert-danger" role="alert">
                <div class="align-self-center">
                    <h5>❌Esta seguro que desea eliminar al siguiente Alumno. </h5>
                </div>
            </div>

            <form action="eliminarAlumno_BD.php">
                <label class="col-12 labelagregar">Matricula</label><br />
                <input type="text" name="matricula" required="required" readonly="redonly" class="col-8 form-control" value="<?php echo $Matricula; ?>" />
                <br /><br /><br />

                <label class="col-12 labelagregar">Nombre(s):</label><br />
                <input type="text" name="nombre" required="required" class="col-8 form-control" pattern="[a-zA-Z Á É Í Ó Ú á é í ó ú ]*" minlength="1" maxlength="30" readonly="redonly" value="<?php echo $Nombre; ?>" />
                <br /><br /><br />

                <label class="col-12 labelagregar">Apellido(s):</label> <br />
                <input type="text" name="apellido" required="required" class="col-8 form-control" pattern="[a-zA-Z Á É Í Ó Ú á é í ó ú ]*" minlength="1" maxlength="30" readonly="redonly" value="<?php echo $Apellido; ?>" />

                <div class="col-12" style="margin: 2% 0% 2% 0%;">
                    <input type="button" autofocus="autofocus" onclick="location.href = 'consultaAlumnos.php'" name="cancelar" class="btn btn-primary" value="Cancelar" style="margin-right: 2%;" />

                    <input type="submit" name="guardar" class="btn btn-danger" value="Eliminar" />
                </div>
            </form>

        </div>

    </div>

    <footer class="col-12 footerend">
        <?php require_once 'footer.html'; ?>
    </footer>

</body>

</html>