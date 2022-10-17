<?php
require_once 'conexion.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="JUAN JOSE GONZALEZ CARDENAS">
        <title>Formulario Recibir Cargo</title>
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
            <div class="col-3 menu"> <!--etiqueta que especifica la navegación del sitio web-->
                <?php require_once 'Menu2.html' ?>
            </div><!--etiqueta que especifica la navegación del sitio web-->

            <div class="col-9 contenedor1">
                <h3 class="titulosecond">Recibir un Cargo</h3>
                <form action="agregarPago_BD.php" class=" col-12 was-validated" >
                    <label class="labelagregar">Concepto:</label><br/>
                    <div class="mb-3">
                        <select name="id_concepto" required="" autofocus="autofocus" class="col-3 form-select">
                            <option value="">Selecciona una Opción</option>

                            <?php
                            $sql = "SELECT * FROM conceptos";
                            $resultado = $db->query($sql);

                            while ($registro = $resultado->fetch_array()) {

                                $id_concepto = $registro["id_concepto"];
                                $nombre_concepto = $registro["nombre"];

                                echo "<option value='$id_concepto'>$nombre_concepto</option>";
                            }
                            ?>
                        </select>
                        <br/><br/>
                        <div class="invalid-feedback">Seleciona una de las opciones disponibles</div>
                    </div>
                    <br/>

                    <label class="labelagregar">Alumno:</label> <br/>
                    <div class="mb-3">
                        <select name="id_alumno" required="" class="col-3 form-select">

                            <option value="">Selecciona una Opción</option><br/>

                            <?php
                            $sql = "SELECT * FROM alumnos";
                            $resultado = $db->query($sql);

                            while ($registro = $resultado->fetch_array()) {

                                $id = $registro["id_alumno"];
                                $matricula = $registro["matricula"];

                                echo "<option value='$id'>$matricula</option>";
                            }
                            ?>
                        </select>
                        <br/><br/>
                        <div class="invalid-feedback">Seleciona una de las opciones disponibles</div>
                    </div>

                    <input type="submit" name="guardar" class="btn btn-success" value="Siguiente" style="margin-bottom: 2%;">

                    </div>
                    </section>
                    </div>
                    <footer class="col-12 footerend"><!--pie de pagina-->
                        <?php require_once 'footer.html' ?>
                    </footer>
                    </body>
                    </html>

