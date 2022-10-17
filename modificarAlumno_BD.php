<?php
require_once 'conexion.php';
$Matricula = $_GET["matricula"];
$Nombre = $_GET["nombre"];
$Apellido = $_GET["apellido"];

$sql ="UPDATE alumnos SET nombre ='$Nombre',
    apellidos='$Apellido', fecha_modificacion = NOW()
    WHERE matricula = '$Matricula'";

$resultado = $db->query($sql);


if ($resultado) {
    
    header("Location:consultaAlumnos.php");
}

else {
    echo "OCURRIO UN ERROR: " . $db->error;
}
?>

