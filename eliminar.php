<?php
require_once 'conexion.php';
$id = $_GET["id_concepto"];

$sql = "SELECT * FROM conceptos WHERE id_concepto='$id'";
$resultado = $db->query($sql);

while ($registro = $resultado->fetch_array()) { //$registro=$resultado->fetch_array();
    $nombre = $registro["nombre"];
    $costo = $registro["costo"];
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Concepto</title>
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
    <diV class="row">

        <div class="col-3 menu">
            <!--etiqueta que especifica la navegación del sitio web-->
            <?php require_once 'Menu2.html'; ?>
        </div>
        <!--etiqueta que especifica la navegación del sitio web-->

        <section class="col-9">
            <h3 class="titulosecond">Eliminar Concepto</h3>
            <!--ALERTA-->
            <div class="d-flex justify-content-start alert alert-danger" role="alert">
                <div class="align-self-center">
                    <h5>❌Esta seguro que desea eliminar al siguiente Concepto. </h5>
                </div>
            </div>
            <!--ALERTA-->

            <form action="eliminar_BD.php" style="margin-left:2%;">
                <!--<label>id</label><br/>-->
                <input type="hidden" readonly="redonly" name="id_concepto" required="required" value="<?php echo $id; ?>" />

                <label class="col-12 labelagregar">Nombre de concepto:</label><br />
                <input type="text" name="nombre" required="required" class="col-8 form-control" pattern="[a-zA-Z Á É Í Ó Ú á é í ó ú ]*" minlength="1" maxlength="30" readonly="redonly" value="<?php echo $nombre; ?>" />


                <label class="col-12 labelagregar">Costo:</label> <br />
                <input type="number" step="any" name="costo" min="1" Max="1000000" required="required" readonly="redonly" class="col-8 form-control" value="<?php echo $costo; ?>" />

                <div class="col-12" style="margin: 2% 0% 2% 0%;">
                    <input type="button" autofocus="autofocus" class="btn btn-primary" onclick="location.href = 'consulta.php'" name="cancelar" value="Cancelar" style="margin-right: 2%;" />

                    <input type="submit" class="btnaceptar btn btn-danger" name="guardar" value="Eliminar" />
                </div>
            </form>
        </section>

    </div>
    <footer class="col-12 footerend">
        <?php require_once 'footer.html'; ?>
    </footer>

</body>

</html>