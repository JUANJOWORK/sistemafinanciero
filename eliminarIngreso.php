<?php
require_once 'conexion.php';
$idAbono = $_GET["id_abono"];
$sql = "SELECT alumnos.matricula, conceptos.nombre, pagos.id_pago, abonos.cantidad FROM abonos
        JOIN pagos ON abonos.id_pago = pagos.id_pago 
        JOIN alumnos ON pagos.id_alumno=alumnos.id_alumno
        JOIN conceptos ON pagos.id_concepto = conceptos.id_concepto
        WHERE abonos.id_abono='$idAbono'";

$resultado = $db->query($sql);
while ($registro = $resultado->fetch_array()) {

    $Matricula = $registro["matricula"];
    $Concepto = $registro["nombre"];
    $Pago = $registro["id_pago"];
    $Abono = $registro["cantidad"];
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="JUAN JOSE GONZALEZ CARDENAS">
    <title>Eliminar Ingreso</title>
    <link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/estilos.css">
    <link href="CSS/columnas.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/efa9459789.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="header">
        <?php require_once 'header2.html'; ?>

    </div>
    <div class="row">

        <div class="col-3 menu">
            <!--etiqueta que especifica la navegación del sitio web-->
            <?php require_once 'Menu2.html'; ?>
        </div>
        <!--etiqueta que especifica la navegación del sitio web-->

        <div class="col-9">
            <h3 class="titulosecond">Eliminar Ingreso</h3>

            <div class="d-flex justify-content-start alert alert-danger" role="alert">
                <div class="align-self-center alerticon"><i class="fas fa-exclamation-circle"></i></div>
                <div class="align-self-center">
                    <h5>Esta seguro que desea eliminar al siguiente Ingreso.</h5>
                </div>
            </div>

            <form action="eliminarIngreso_BD.php" style="margin-bottom: 2%;">

                <input type="hidden" name="idabono" required="required" readonly="redonly" value="<?php echo $idAbono; ?>" />
                <input type="hidden" name="idpago" required="required" readonly="redonly" value="<?php echo $Pago; ?>" />

                <label class="labelagregar">Alumno:</label><br>
                <input type="text" name="matricula" required="required" readonly="redonly" class="col-4 form-control" value="<?php echo $Matricula; ?>" />
                <br /><br /><br />

                <label class="labelagregar">Concepto:</label><br>
                <input type="text" name="nombre" required="required" class="col-4 form-control" pattern="[a-zA-Z Á É Í Ó Ú á é í ó ú ]*" minlength="1" maxlength="30" readonly="redonly" value="<?php echo $Concepto; ?>" />
                <br /><br /><br />

                <label class="labelagregar">Abono:</label><br>
                <input type="number" step="any" name="abono" required="required" readonly="redonly" class="col-4 form-control" value="<?php echo $Abono; ?>" />
                <br /><br /><br />


                <input type="button" autofocus="autofocus" onclick="location.href = 'reporteDeIngresos.php'" class="btn btn-success" name="cancelar" value="Cancelar" style="margin-right: 2%;" />

                <input type="submit" name="guardar" class=" btnaceptar btn btn-danger" value="Eliminar" />

            </form>
        </div>
    </div>
    <footer class="footerend"><?php require_once 'footer.html'; ?></footer>
</body>

</html>