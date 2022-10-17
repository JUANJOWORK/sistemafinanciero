<?php
/* Nombre del alumno: JUAN JOSÉ GONZALEZ CARDENAS
  Nombre de la asignatura: DESARROLLO DE APLICACIONES WEB
  Fecha de elaboración: 26/MARZO/2020 */

if (isset($_GET["texto_buscar"])) {

    $texto_buscar = $_GET["texto_buscar"];
} else {

    $texto_buscar = "";
}
?>
<!doctype html>
<html lang="es">
    <head>
        <title>Consulta de conceptos</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="JUAN JOSE GONZALEZ CARDENAS">
        <link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="CSS/estilos.css">
        <link rel="stylesheet" type="text/css" href="CSS/columnas.css" >
    </head>
    <body>
        <!--ENCABEZADO-->
        <div class="row">
            <div class="col-12 header"><?php require_once 'header2.html'; ?></div>
        </div>
        <div class="row">
           
                <div class="col-3 menu"> <!--etiqueta que especifica la navegación del sitio web-->
                    <?php require_once 'Menu2.html'; ?>
                </div><!--etiqueta que especifica la navegación del sitio web-->
                <div class="col-9">
                    <h3 class="titulosecond">Lista de Conceptos</h3>
                    <form>
                        <label class="col-12">Buscar Concepto:</label>
                        <input type="text" name="texto_buscar" autofocus="autofocus" class="col-12 form-control" 
                               placeholder="Introduce costo o nombre" value="<?php echo $texto_buscar; ?>" style="margin-bottom: 10px;"/>

                        <input type="submit" name="buscar" class="col-12 btn btn-dark" value="Buscar" style="margin-bottom: 10px;">
                    </form>
                    <button class="col-3 btn btn-success" onclick="location.href = 'formularioconceptos.php'" title="Agregar un concepto">Agregar</button>
                    <table class="table table-striped table-hover col-12">
                        <tr>
                             <!--<th>Clave</th>-->
                            <th class="table-dark">Nombre</th>
                            <th class="table-dark">Costo</th>
                            <th class="table-dark">Fecha de Modificación</th>
                            <th class="table-dark" colspan="2" style="text-align: center;">Operaciones</th>
                        </tr>

                        <?php
                        require_once 'conexion.php';

                        $sql = "SELECT * FROM conceptos WHERE nombre like'%$texto_buscar%'
                             OR costo like '%$texto_buscar%'";

                        $resultado2 = $db->query($sql);

                        while ($registro = $resultado2->fetch_array()) {
                            echo '<tr>';
                            /* echo '<td>' . $registro['id_concepto'] . '</td>'; */
                            echo '<td class="text-dark">' . $registro['nombre'] . '</td>';
                            echo '<td class="text-dark">' . $registro['costo'] . '</td>';
                            echo '<td class="text-dark">' . $registro['fecha_modificacion'] . '</td>';

                            echo '<td><a href="modificar.php?id_concepto=' . $registro["id_concepto"] . '"><button class="btn btn-info">Modificar</button></a></td>';

                            echo '<td><a href="eliminar.php?id_concepto=' . $registro["id_concepto"] . '"><button class="btn btn-danger">eliminar</button></a></td>';
                            echo '</tr>';
                        }
                        ?>
                    </table>
                </div>
            
        </div>
        
            <footer class="col-12 footerend"><!--pie de pagina-->
                <?php require_once 'footer.html'; ?>
            </footer>
  

    </body>
</html>

