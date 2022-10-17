<?php
/* Nombre del alumno: JUAN JOSÉ GONZALEZ CARDENAS
  Nombre de la asignatura: DESARROLLO DE APLICACIONES WEB
 */
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="JUAN JOSE GONZALEZ CARDENAS">
    <title>Formulario conceptos</title>
    <!--ETIQUETA LINK DE BOOTSTRAP-->
    <link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/estilos.css">
    <link href="CSS/columnas.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/efa9459789.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="row"></div>
    <div class="header">
        <?php require_once 'header2.html'; ?>
    </div>
    <div class="row">
        <div class="col-3 menu">
            <div>
                <?php require_once 'Menu2.html'; ?>
            </div>
        </div>

        <div class="col-9">
            <h3 class="titulosecond">Agregar un Concepto</h3>

            <form action="agregarconcepto_a_bd.php" class="col-12" style="margin-bottom: 2%;">

                <label class="labelagregar">Nombre de concepto:</label><br />
                <input type="text" name="nombre" autofocus="autofocus" required="required" class="col-8 form-control" pattern="[a-zA-Z Á É Í Ó Ú á é í ó ú ]*" minlength="1" maxlength="30" />

                <br /><br />

                <label class="labelagregar">Costo:</label> <br />
                <input type="number" step="any" name="costo" required="required" Min="1" Max="1000000" class="col-8 form-control" />
                <br /><br /><br />

                <input type="button" onclick="location.href = 'consulta.php'" class=" btn btn-danger" name="cancelar" value="Cancelar" style="margin-right: 2%;">

                <input type="submit" name="guardar" value="Aceptar" class=" btnaceptar btn btn-success"></input>

            </form>
        </div>
    </div>
    <footer class="col-12 footerend">
        <!--pie de pagina-->
        <?php require_once 'footer.html' ?>
    </footer>


</body>

</html>