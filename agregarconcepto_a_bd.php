<?php
/* Nombre del alumno: JUAN JOSÉ GONZALEZ CARDENAS
  Nombre de la asignatura: DESARROLLO DE APLICACIONES WEB
  Fecha de elaboración: 26/MARZO/2020 */
require_once 'conexion.php';
$nombreconcepto = $_GET["nombre"];
$costo2 = $_GET["costo"];

$sql = "INSERT INTO conceptos values(DEFAULT, '$nombreconcepto', '$costo2', "
        . "NOW())";
$resultado2 = $db->query($sql);
if ($resultado2)
    header("Location:consulta.php");
/* echo "SE INSERTÓ EL REGISTRO CORRECTAMENTE CON ID=" . $db->insert_id; */
else
    echo "OCURRIO UN ERROR: " . $db->error;
?>



