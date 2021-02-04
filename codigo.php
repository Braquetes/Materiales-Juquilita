<?php
@session_start();
if (!isset($_SESSION["user"])) {
    header("Location: index.php");
}
require("./BaseDatos/Conexion.php"); //Necesitamos el archivo en donde viene la conexión de la base de datos
$most = mysqli_query($conexion, "SELECT * FROM empleado_codigo WHERE empleado =" . $_SESSION["id"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rossan|Palta</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/e530d88f76.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/9a3779baf9.js"></script>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
</head>
<style>
    body {
        background-color: #f6f5f5;
    }

    .navbar {
        background-color: #007aff;
    }

    .salir {
        text-align: center;
        background-color: #dc3546;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 5px;
        width: 8vw;
    }


    .salir:hover {
        text-decoration: none;
        background-color: red;
        color: white;
    }

    .textsalir {
        color: white;
        font-weight: bold;
    }

    .textsalir:hover {
        color: white;
        text-decoration: none;
    }

    .boton {
        width: 180px;
        border-radius: 15px;
    }

    .span {
        font-size: xx-large;
    }

    h5 {
        font-size: 125px;
    }
</style>

<body class="body">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="home.php"><strong>Materiales Juquilita</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="inventario.php">Departamentos </a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <button class="salir" type="submit"><i class="fas fa-sign-out-alt"></i> <a class="textsalir" href="controllers/logout.php">Salir</a> </button>
            </form>
        </div>
    </nav>


    <div class="container my-2 px-0 ">
        <section class=" my-md-5 text-center">
            <h3 class="  text-center "><strong>Código para verificar</strong></h3>
            <?php if ($most->num_rows > 0) {
                while ($rows  = mysqli_fetch_array($most)) {
                    $rows["codigo"]; ?>
                    <h5 class="  text-center "><br><span required class="badge badge-secondary"><?php echo $rows["codigo"] ?></span></h5>
            <?php
                }
            }
            ?>
        </section>
    </div>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

</html>