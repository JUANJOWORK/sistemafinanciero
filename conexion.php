<?php

/* Nombre del alumno: JUAN JOSÉ GONZALEZ CARDENAS
  Nombre de la asignatura: DESARROLLO DE APLICACIONES WEB
  Fecha de elaboración: 26/MARZO/2020 */

$db = new mysqli("localhost", "root", "rootsito8494", "financieros"); /* las comillas representa la contraseña en este caso no tiene, financieros es la bd */

if (!$db->set_charset("utf8")) {/* PERMITE INGRESAR CARACTERES CON ACENTO ENTRE OTROS */
    printf("Error loading character set utf8: %s\n", $db->error);
}

else {    
}
?>


