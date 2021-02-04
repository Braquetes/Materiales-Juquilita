<?php

//Index
include("controllers/config.php");

//Verificamos si existe una sesion
if(isset($_SESSION["user"])){
    header("Location: home.php");
}else{
    //Llamamos al login
    login();
}

?>