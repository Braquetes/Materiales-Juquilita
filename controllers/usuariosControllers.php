<?php

//Login para entrar al sistema
$user = $_POST["user"];
$pass = $_POST["pass"];
$email = $_POST["email"];

//Si recibe la variable $user y $pass para entrar a este if, en caso de no recibirlos envia a el último else
if(isset($user) AND isset($pass)){
    require("../BaseDatos/Conexion.php"); //Necesitamos el archivo en donde viene la conexión de la base de datos
    //Consulta en la base de datos si hay algún registro que coincida con con los parametros recibidos
    $log = mysqli_query($conexion, "INSERT INTO `empleados` (`id`, `nombres`, `apellido_p`, `apellido_m`, `usuario`, `contraseña`, `cargo`, `turno_entrada`, `turno_salida`, `correo`) VALUES (NULL, '', '', '', '".$user."', '".$pass."', 4 , '', '', '".$email."');");
    if($log){ //Encontro un registro igual
        //Envia a la ventana home ya que si pudo ingresar
        echo "<script type=\"text/javascript\"> alert (\"Registrado con éxito\"); </script>";
        echo"<script type='text/javascript'>
            window.location='../login.html';
            </script>";
    }else{ //No econtro ningun registro con esos datos
        //Envia a la ventana login de nuevo para entrar de nuevo
        echo "<script type=\"text/javascript\"> alert (\"No se pudo registrar\"); </script>";
        echo"<script type='text/javascript'>
            window.location='../registrar.php';
            </script>";
    }
}else{ //Datos vacios, este else esta unido al primer if
    //Envia a la ventana login para ingresar datos
    echo "<script type=\"text/javascript\"> alert (\"Rellena los campos\"); </script>";
    echo "<script type='text/javascript'>
            window.location='../registrar.php';
            </script>";
}
