<?php
require_once 'conexion.php';

$id = $_GET["id_concepto"];
$nombre = $_GET["nombre"];
$costo = $_GET["costo"];

$sql ="UPDATE conceptos SET nombre ='$nombre',
    costo='$costo', fecha_modificacion = NOW()
    WHERE id_concepto = '$id'";
$resultado = $db->query($sql);


if ($resultado) {
    
    header("Location:consulta.php");
}

else {
    echo "OCURRIO UN ERROR: " . $db->error;
}
?>

