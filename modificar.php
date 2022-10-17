<?php
require_once 'conexion.php';
$id = $_GET["id_concepto"];

$sql = "SELECT * FROM conceptos WHERE id_concepto = '$id' ";
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
        <title>Modificar Concepto</title>
        <link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="CSS/estilos.css">
        <link rel="stylesheet" type="text/css" href="CSS/columnas.css" >
    </head>
    <body>
        <div class="row">
            <div class=" col-12 header">
                <?php require_once 'header2.html'; ?>

            </div>
        </div>
        <diV class="row">
            <div class="col-12">
                <div class="col-3 menu"> <!--etiqueta que especifica la navegación del sitio web-->
                    <?php require_once 'Menu2.html'; ?>
                </div><!--etiqueta que especifica la navegación del sitio web-->

                <div class="col-9">
                    <h3 class="titulosecond">Modificar un Concepto</h3>

                    <form action="modificar_BD.php" style="margin-left: 2%;"> 

                        <input type="hidden" name="id_concepto" required="required" readonly="" class="col-3" value="<?php echo $id; ?>" />


                        <label class="col-12 labelagregar">Nombre de concepto:</label>
                        <input type="text" name="nombre"   required="required" autofocus="autofocus" class="col-8 form-control"
                               pattern="[a-zA-Z Á É Í Ó Ú á é í ó ú ]*" minlength="1" maxlength="30"  value="<?php echo $nombre; ?>"/>
                        <br/><br/><br/>

                        <label class="col-12 labelagregar">Costo:</label>
                        <input type="number" step="any" name="costo" required="required" Min="1" Max="1000000"  
                               class="col-8 form-control" value="<?php echo $costo; ?>"/>
                        <div class="col-12" style="margin-top: 2%;">
                            <input  type="button" onclick="location.href = 'consulta.php'" class=" btn btn-warning" name="cancelar"  value="Cancelar" style="margin-right: 2%;"/>

                            <input type="submit" name="guardar" class="btn btn-secondary"  value="Guardar"/>
                        </div>
                    </form>
                </div>
            </div>
        </diV>
        <div class="row">
            <footer class="col-12 footerend">
                <?php require_once 'footer.html'; ?>
            </footer>
        </div>

    </body>
</html>

