<?php
require_once 'conexion.php';
$alumno = $_GET["id_alumno"];
$concepto = $_GET["id_concepto"];
 
$sql3= "INSERT INTO pagos VALUES(DEFAULT, '$alumno','$concepto',(SELECT costo FROM conceptos WHERE id_concepto = '$concepto'),DEFAULT, NOW())";
$resultado3=$db->query($sql3);


if($resultado3){
   header("Location:formularioAgregarAbono.php?id_pago=".$db->insert_id);    
}
else{
    echo 'Ocurrio un Error'. $db->error;
}
?>

