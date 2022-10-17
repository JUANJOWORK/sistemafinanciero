<?php
require_once 'conexion.php';

$idAbono = $_GET["idabono"];

$sql = "DELETE FROM abonos WHERE id_abono = '$idAbono'";
$resultado = $db->query($sql);

if ($resultado) {
    
    header("Location:reporteDeIngresos.php");
}

else {
    echo "OCURRIO UN ERROR: " . $db->error;
}
?>

