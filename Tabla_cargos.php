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
    <title>Cargos</title>

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
            <h3 class="titulosecond">Tabla Cargos</h3>

            <form class="col-12 d-flex justify-content-center">
                <!--class="fechas"-->

                <label class="labelbuscar">Rango de Fechas</label>

                <input type="date" name="fechaInicial" class="col-2 inputbus form-control" autofocus="autofocus" value="<?php echo $fechaInicial; ?>" />


                <input type="date" name="fechaFinal" class="col-2 inputbus form-control" value="<?php echo $fechaFinal; ?>" />

                <button type="submit" class="col-1 btnbuscon btn btn-dark btn-sm d-flex justify-content-center d-flex align-items-center" name="buscar">VER</button>
            </form>

            <button type="button" class="btn btn-secondary" onclick="location.href = 'formularioAgregarPago.php'">Recibir un Cargo</button>
            <table class="table table-striped table-hover d-flex justify-content-center col-12">
                <tr>
                    <th class="table-dark">Alumno</th>
                    <th class="table-dark">Concepto</th>
                    <th class="table-dark">Importe</th>
                    <th class="table-dark">Abonado</th>
                    <th class="table-dark">Fecha de Modificación</th>
                    <th class="table-dark">Pagado O No</th>
                </tr>

                <?php
                require_once 'conexion.php';

                $sql = "SELECT alumnos.matricula, conceptos.nombre, pagos.id_pago, pagos.cantidad_pagar, pagos.cantidad_abonado, pagos.fecha_modificacion  FROM pagos
                       JOIN alumnos ON pagos.id_alumno = alumnos.id_alumno 
                       JOIN conceptos ON pagos.id_concepto = conceptos.id_concepto
                       WHERE pagos.fecha_modificacion>='$fechaInicial 00:00:00'
                       AND pagos.fecha_modificacion<='$fechaFinal 23:59:59' ORDER BY fecha_modificacion DESC";

                $resultado2 = $db->query($sql);

                while ($registro = $resultado2->fetch_array()) {
                    echo '<tr>';
                    echo '<td>' . $registro['matricula'] . '</td>';
                    echo '<td>' . $registro['nombre'] . '</td>';
                    echo '<td>' . $registro['cantidad_pagar'] . '</td>';
                    echo '<td>' . $registro['cantidad_abonado'] . '</td>';
                    echo '<td>' . $registro['fecha_modificacion'] . '</td>';

                    $pagado = $registro["cantidad_pagar"];
                    $abonado = $registro["cantidad_abonado"];
                    $Total = $pagado - $abonado;
                    if ($Total == 0) {
                        echo '<td>Pagado</td>';
                    } else {
                        echo '<td><a href="formularioAgregarAbono.php?id_pago=' . $registro["id_pago"] . '"><i class="icondi fas fa-money-bill" title="Abonar"></i></a></td>';
                    }
                    echo '</tr>';
                }
                ?>
            </table>


        </div>
    </div>
    <div class="row">
        <footer class="col-12 footerend">
            <!--pie de pagina-->
            <?php require_once 'footer.html'; ?>
        </footer>
    </div>
</body>

</html>