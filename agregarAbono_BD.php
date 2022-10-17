<?php

require_once 'conexion.php';

$idPago = $_GET["idpago"];
$concepto = $_GET["nombreconcepto"];
$matricula = $_GET["matricula"];
$Abono = $_GET["Abono"];

$sql3 = "INSERT INTO abonos VALUES(DEFAULT, '$idPago','$Abono', NOW())";
$resultado3 = $db->query($sql3);

/*$sql2="SELECT cantidad_abonado from pagos WHERE id_pago='$idPago'";
$resultado2 = $db->query($sql2);
while ($registro2 = $resultado2->fetch_array()) {
    $Abono2= $registro2["cantidad_abonado"];
}
$SUMA=$Abono+$Abono2;

$sql = "UPDATE pagos SET cantidad_abonado='$SUMA' WHERE id_pago='$idPago'";
$resultado = $db->query($sql);*/

if ($resultado3) {

    header("Location:Tabla_cargos.php");
} else {
    echo "OCURRIO UN ERROR: " . $db->error;
}
?>

