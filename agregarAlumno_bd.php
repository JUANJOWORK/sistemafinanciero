<?php
require_once 'conexion.php';
$Matricula = $_GET["matricula"];
$Nombre = $_GET["nombre"];
$Apellido = $_GET["apellido"];

$sql = "INSERT INTO alumnos values (DEFAULT, '$Matricula','$Nombre',"
    . "'$Apellido', NOW())";
$resultado = $db->query($sql);
?>
<!doctype html>
<html>

<head>
    <title>Mostrar resultado</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="JUAN JOSE GONZALEZ CARDENAS" />
    <link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/estilos.css">
    <link href="CSS/columnas.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/efa9459789.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="row">
        <div class="col-12 header">
            <!--ENCABEZADO-->
            <?php require_once 'header2.html'; ?>
        </div>
        <!--ENCABEZADO-->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="col-3 menu">
                <!--etiqueta que especifica la navegación del sitio web-->
                <?php require_once 'Menu2.html'; ?>
            </div>
            <!--etiqueta que especifica la navegación del sitio web-->
            <div class="col-9">
                <h3 class="titulosecond">Resultado</h3>
                <p>
                    <?php
                    if ($resultado)
                        echo "SE INSERTÓ EL REGISTRO CORRECTAMENTE ✅✅✅" ; //.$db->insert_id;

                    else
                        echo "OCURRIO UN ERROR ESA MATRICULA YA EXISTE ❌❌❌🚩🚩🚩" ; //.$db->error;
                    ?>


                </p>
                <input type="button" onclick="location.href = 'formularioAgregarAlumno.php'" class="btn btn-dark" name="cancelar" value="Regresar">
                <input type="button" onclick="location.href = 'consultaAlumnos.php'" class="btn btn-primary" name="consulta" value="Consulta Alumnos">
            </div>
        </div>
    </div>
    <div class="row" style="height:100%;">
  
    <footer class="col-12 footerend">
        <!--pie de pagina-->
        <?php require_once 'footer.html'; ?>
</footer>
</div>
</body>

</html>