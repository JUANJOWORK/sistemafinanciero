<?php
require_once 'conexion.php';
$idpago = $_GET["id_pago"];
// "AS" es usado para renombrar el nombre del campo y no haya errores con la tabla alumnos.
$sql = "SELECT conceptos.nombre AS nombreconcepto,alumnos.matricula,
        alumnos.nombre, alumnos.apellidos, pagos.cantidad_pagar, pagos.cantidad_abonado FROM pagos
        JOIN conceptos ON pagos.id_concepto= conceptos.id_concepto
        JOIN alumnos ON pagos.id_alumno=alumnos.id_alumno WHERE id_pago='$idpago'";

$resultado2 = $db->query($sql);
while ($registro2 = $resultado2->fetch_array()) {
    $Concepto = $registro2["nombreconcepto"];
    $Precio = $registro2["cantidad_pagar"];
    $Abono = $registro2["cantidad_abonado"];
    $Matricula = $registro2["matricula"];
    $Nombre = $registro2["nombre"];
    $Apellido = $registro2["apellidos"];
}
$RESTA = ($Precio - $Abono);
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="JUAN JOSE GONZALEZ CARDENAS">
        <title>Formulario Agregar Abono</title>
        <link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="CSS/estilos.css">
        <link href="CSS/columnas.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/efa9459789.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="header"><?php require_once 'header2.html' ?></div>
        <div class="row">
        <div class="col-3 menu">
            <?php require_once 'Menu2.html' ?>
        </div>
        <div class="col-9 contenedor1">
            <h3 class="titulosecond">Recibir un Abono</h3>

            <form action="agregarAbono_BD.php" class="col-12">

                <input type="hidden" name="idpago" required="required" readonly="redonly"  value="<?php echo $idpago; ?>"/>
                <label class="labelagregar">Nombre de concepto:</label><br/>
                <input type="text" name="nombreconcepto"  required="required" class="col-3 form-control"
                       pattern="[a-zA-Z Á É Í Ó Ú á é í ó ú ]*" minlength="3" maxlength="30" readonly="redonly"  value="<?php echo $Concepto; ?>"/>
                <br/><br/>

                <label class="labelagregar">Matricula:</label><br>
                <input type="text" name="matricula" readonly="" class="col-3 form-control"
                       required="required" pattern="[0-9]{8}" minlength="8" maxlength="8" 
                       placeholder="Ingresa la matricula" title="Deben ser 8 n&uacute;meros." readonly="redonly" value="<?php echo $Matricula; ?>" />
                <br/><br/>

                <label class="labelagregar">Apellido(s):</label> <br/>
                <input type="text" name="apellido"   required="required" class="col-3 form-control"
                       pattern="[a-zA-Z Á É Í Ó Ú á é í ó ú ]*" minlength="4" maxlength="30" readonly="redonly"  value="<?php echo $Apellido; ?>"/>
                <br/><br/>


                <label class="labelagregar">Nombre(s):</label><br/>
                <input type="text" name="nombre"  required="required" class="col-3 form-control" 
                       pattern="[a-zA-Z Á É Í Ó Ú á é í ó ú ]*" minlength="3" maxlength="30" readonly="redonly"  value="<?php echo $Nombre; ?>"/>
                <br/><br/>

                <label class="labelagregar">Precio:</label> <br/>
                <input type="number" step="any" name="costo" required="required" readonly="redonly" class="col-3 form-control" value="<?php echo $Precio; ?>"/>
                <br/><br/>

                <label class="labelagregar">Cantidad a pagar:</label> <br/>
                <input type="number" step="any" name="Abono" required="required" class="col-3 form-control" autofocus="autofocus"  Min="1" Max="<?php echo $RESTA; ?>" value="<?php echo $RESTA; ?>"/>
                <br/><br/><br/>
                
               
                <input type="submit" class="col-1 btn btn-primary" name="pagar" value="Pagar" style="margin-bottom: 2%;">

            </form>

        </div>
        </div>
        <div class="col-12 footerend">
            <?php require_once 'footer.html'; ?>
        </div>

    </body>
</html>


