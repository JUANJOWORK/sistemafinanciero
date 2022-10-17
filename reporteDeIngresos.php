<?php
//AUTOR JUAN JOSÉ GONZALEZ CARDENAS
if (isset($_GET["fechaInicial"])) {

    $fechaInicial = $_GET["fechaInicial"];
    $fechaFinal = $_GET["fechaFinal"];
} else {

    $fechaInicial = Date('Y-m-d');
    $fechaFinal = Date('Y-m-d');
}
?>

<html>

<head>
    <title>Reporte De Ingresos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="JUAN JOSE GONZALEZ CARDENAS">
    <link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/estilos.css">
    <link href="CSS/columnas.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/efa9459789.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="header">
        <!--ENCABEZADO-->
        <?php require_once 'header2.html'; ?>
    </div>
    <div class="row">

        <div class="col-3 menu">
            <!--etiqueta que especifica la navegación del sitio web-->
            <?php require_once 'Menu2.html'; ?>
        </div>
        <!--etiqueta que especifica la navegación del sitio web-->
        <div class="col-9 contenedor1">
            <h3 class="titulosecond">Reporte De Ingresos</h3>
            <form class="col-12 d-flex justify-content-center">

                <label class="labelbuscar">Rango de Fechas</label>
                <input type="date" name="fechaInicial" class="col-2 inputbus form-control" autofocus="autofocus" value="<?php echo $fechaInicial; ?>" />

                <input type="date" name="fechaFinal" class=" col-2 inputbus form-control" value="<?php echo $fechaFinal; ?>" />

                <button type="submit" name="buscar" title="Puedes elegir Ver por Años" class="col-1 btnbuscon btn btn-dark btn-sm d-flex justify-content-center d-flex align-items-center">VER</button>

            </form>

            <h2 class="total">TOTAL=
                <?php
                require_once 'conexion.php';

                $sql2 = "SELECT SUM(cantidad) AS TOTAL FROM abonos";
                $resultado = $db->query($sql2);
                $res = $resultado->fetch_array();
                echo $res['TOTAL'];
                ?>
            </h2>

            <table class="table table-striped table-hover d-flex justify-content-center col-12">
                <tr>
                    <th class="table-dark">Alumno</th>
                    <th class="table-dark">Concepto</th>
                    <th class="table-dark">Abono</th>
                    <th class="table-dark">Fecha</th>
                    <th class="table-dark">Eliminar</th>
                </tr>

                <?php
                require_once 'conexion.php';

                $sql = "SELECT alumnos.matricula, conceptos.nombre, abonos.id_abono, abonos.cantidad, abonos.fecha_modificacion  FROM abonos
                       JOIN pagos ON abonos.id_pago = pagos.id_pago 
                       JOIN alumnos ON pagos.id_alumno=alumnos.id_alumno
                       JOIN conceptos ON pagos.id_concepto = conceptos.id_concepto
                       WHERE abonos.fecha_modificacion>='$fechaInicial 00:00:00'
                       AND abonos.fecha_modificacion<='$fechaFinal 23:59:59' ORDER BY fecha_modificacion DESC";


                $resultado2 = $db->query($sql);

                while ($registro = $resultado2->fetch_array()) {
                    echo '<tr>';
                    echo '<td>' . $registro['matricula'] . '</td>';
                    echo '<td>' . $registro['nombre'] . '</td>';
                    echo '<td>' . $registro['cantidad'] . '</td>';
                    echo '<td>' . $registro['fecha_modificacion'] . '</td>';
                    echo '<td><a href="eliminarIngreso.php?id_abono=' . $registro["id_abono"] . '"><i class="iconeliminar far fa-trash-alt" title="Eliminar"></i></a></td>';
                    echo '</tr>';
                }
                ?>
            </table>

        </div>
    </div>

        <footer class="col-12 footerend">
            <!--pie de pagina-->
            <?php require_once 'footer.html'; ?>
       
    </div>
</body>

</html>