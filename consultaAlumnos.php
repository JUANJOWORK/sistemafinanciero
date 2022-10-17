<?php
if (isset($_GET["texto_buscar"])) {

    $texto_buscar = $_GET["texto_buscar"];
} else {

    $texto_buscar = "";
}
?>
<!doctype html>
<html lang="es">

<head>
    <title>Consulta de Alumnos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="JUAN JOSE GONZALEZ CARDENAS">
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
        <!--ENCABEZADO-->
    </div>

    <div class="row">

        <div class="col-3 menu">
            <!-- navegación del sitio web-->
            <?php require_once 'Menu2.html'; ?>
        </div><!-- navegación del sitio web-->

        <div class="col-9">
            <h3 class="titulosecond">Lista de Alumnos</h3>

            <form>
                <label class="col-12">Buscar Alumno:</label>
                <input type="text" name="texto_buscar" autofocus="autofocus" class=" form-control" placeholder="Ingresa Matricula, Nombre o Apellido" value="<?php echo $texto_buscar; ?>" style="margin-bottom: 10px;" />

                <input type="submit" class="col-12  btn btn-dark btn-sm" name="buscar" value="Buscar Alumno" style="margin-bottom: 10px;">

            </form>
            <button class="col-3 btn btn-success" onclick="location.href = 'formularioAgregarAlumno.php'" title="Agregar un Alumno">Agregar</button>

            <table class="table table-striped table-hover col-12">
                <tr>
                    <th class="table-dark">Matricula</th>
                    <th class="table-dark">Nombre(s)</th>
                    <th class="table-dark">Apellido(s)</th>
                    <th class="table-dark">Fecha de Modificación</th>
                    <th class="table-dark" colspan="2" style="text-align: center;">Operaciones</th>
                </tr>

                <?php
                require_once 'conexion.php';

                $sql = "SELECT * FROM alumnos WHERE matricula like'%$texto_buscar%'
                             OR nombre like '%$texto_buscar%' OR apellidos like '%$texto_buscar%'";

                $resultado = $db->query($sql);

                while ($registro = $resultado->fetch_array()) {
                    echo '<tr>';
                    echo '<td>' . $registro['matricula'] . '</td>';
                    echo '<td>' . $registro['nombre'] . '</td>';
                    echo '<td>' . $registro['apellidos'] . '</td>';
                    echo '<td>' . $registro['fecha_modificacion'] . '</td>';

                    echo '<td><a href="modificarAlumno.php?matricula=' . $registro["matricula"] . '"><button class="btn btn-info">Modificar</button></a></td>';

                    echo '<td><a href="eliminarAlumno.php?matricula=' . $registro["matricula"] . '"><button class="btn btn-danger">eliminar</button></a></td>';
                    echo '</tr>';
                }
                ?>
            </table>

        </div>

    </div>

    <footer class="col-12 footerend">
        <!--pie de pagina-->
        <?php require_once 'footer.html'; ?>
    </footer>

</body>

</html>