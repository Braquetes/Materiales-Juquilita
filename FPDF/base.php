<?php

//Conexión para la base de datos en un servidor

$usr = "root"; //Usuario de la base de datos
$pw = ""; // Contraseña de la base de datos
$db = "materialesjuquilita"; //Nombre de la base de datos
$host = "localhost"; //Ip del servidor

$mysqli =new mysqli($host, $usr, $pw, $db); //Las variables conexión sera la utilizada para llamar a la base de datos
$mysqli->set_charset("utf8"); //Debemos poner los caracteres UTF-8 para que reconozca los acentos y otros caracteres

?>
