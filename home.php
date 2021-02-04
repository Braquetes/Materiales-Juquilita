<?php
@session_start();
if (!isset($_SESSION["user"])) {
  header("Location: index.php");
}
?>

<?php
if ($_SESSION["Puesto"] == 1) { ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rossana|Home</title>
    <!-- HOJA DE ESTILOS PERSONAL -->
    <link rel="stylesheet" href="estilos/estilos.css" />
    <!-- HOJA DE ESTILOS DE BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/e530d88f76.js" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/9a3779baf9.js"></script>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/e530d88f76.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/9a3779baf9.js"></script>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
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


    .col-sm {
      padding: 1rem;
      text-align: center;
    }

    .cartas {
      text-align: center;
    }

    .card-img-top {
      margin: auto;
      width: 150px;
      text-align: center;
    }

    .card {
      text-align: center;
      border-radius: 20px;
      border: none;
    }

    .card-footer {
      background-color: white;
      border-radius: 20px;

    }

    /*Boton flotante*/
    .btn-flotante {
      font-size: 15px;
      /* Cambiar el tamaño de la tipografia */
      text-transform: uppercase;
      /* Texto en mayusculas */
      font-weight: bold;
      /* Fuente en negrita o bold */
      color: #ffffff;
      /* Color del texto */
      border-radius: 5px;
      /* Borde del boton */
      letter-spacing: 2px;
      /* Espacio entre letras */
      background-color: #ff2e63;
      /* Color de fondo */
      padding: 18px 30px;
      border: none;
      /* Relleno del boton */
      position: fixed;
      bottom: 40px;
      right: 40px;
      transition: all 300ms ease 0ms;
      box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
      z-index: 99;
      text-decoration: none !important;
      border-color: white !important;
      border-style: none !important;
    }

    .btn-flotante:hover {
      background-color: red;
      /* Color de fondo al pasar el cursor */
      box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
      transform: translateY(-7px);
      text-decoration: none !important;
      color: white;
    }

    @media only screen and (max-width: 600px) {
      .btn-flotante {
        font-size: 14px;
        padding: 12px 20px;
        bottom: 20px;
        right: 20px;
        text-decoration: none !important;
      }
    }
  </style>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="home.php"><strong>Materiales Juquilita</strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="Geventa.php"><strong>Prestamos</strong></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="codigo.php"><strong>Código</strong></a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <button class="salir"><i class="fas fa-sign-out-alt"></i> <a class="textsalir" href="./controllers/logout.php">Salir</a></button>
        </form>
      </div>
    </nav>
    <!--Navbar-->
    <!-- <nav class="mb-1 navbar navbar-expand-lg navbar-dark primary-color">
      <strong> <a class="navbar-brand" href="home.php">Materiales Juquilita</a></strong>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
        <ul class="navbar-nav ml-auto nav-flex-icons">
          <li class="nav-item dropdown">
            <a class="nav-link " id="navbarDropdownMenuLink-333" href="controllers/logout.php">
              <i class="fas fa-sign-out-alt"> Salir</i>
            </a>
          </li>
        </ul>
      </div>
    </nav> -->
    <!--Navbar-->
    <!--Bienvenida-->
    <div class="container p-5">
      <h1>Bienvenido Administrador: <?php echo $_SESSION["nombre"]; ?></h1>
    </div>
    <div class="container cartas">

      <div class="row cartas">
        <div class="col-sm">
          <div class="card" style="width: 15rem;">
            <img src="img/empleados.png" class="card-img-top " alt="...">
            <div class="card-body">
              <h5 class="card-title"><strong>Empleados</strong></h5>
              <p class="card-text">Consulta información sobre los empleados</p>
            </div>
            <div class="card-footer">
              <a href="Trabajadores.php" class="btn btn-primary"><i class="fas fa-user"></i> Empleados</a>
            </div>
          </div>

        </div> <br>

        <div class="col-sm">
          <div class="card" style="width: 15rem;">
            <img src="img/inven.png" class="card-img-top " alt="...">
            <div class="card-body">
              <h5 class="card-title"><strong>Inventario</strong></h5>
              <p class="card-text">Mantén un control total sobre tu bodega</p>
            </div>
            <div class="card-footer">
              <a href="inventario.php" class="btn btn-primary"><i class="fas fa-user"></i> Inventario</a>
            </div>
          </div>
        </div> <br>
        <div class="col-sm">
          <div class="card" style="width: 15rem;">
            <img src="img/estadisticas.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Estadisticas</h5>
              <p class="card-text">Consulta información de las estadisticas</p>

            </div>
            <div class="card-footer">
              <a href="Reventa.php" class="btn btn-primary"><i class="fas fa-clock"></i> Estadisticas</a>
            </div>
          </div>
        </div> <br>

        <div class="col-sm">
          <div class="card" style="width: 15rem;">
            <img src="img/agregar.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Agregar Producto</h5>
              <p class="card-text">Agregar información de un producto</p>
            </div>
            <div class="card-footer">
              <a href="Pagregar.php" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar Producto</a>
            </div>
          </div>
        </div> <br>
      </div>
    </div>
    <!-- ***********COGIGO QUE HIZO CHICO -->
    <!-- <div class="container p-5">
      <div class="row">
        <div class="col-lg-12">
          <h5 class="Title2">Bienvenido Administrador</h5>
        </div>
      </div>
    </div> -->
    <!--Bienvenida-->
    <!--Inicio-->
    <!--  <div class="container my-5 p-5">
      <section class="text-center dark-grey-text">
        <div class="row">
          <div class="col-md-3 mb-3">

            <i class="fas fa-users blue-text fa-3x"></i><br>
            <a href="Trabajadores.php">
              <button type="button" class="btn btn-indigo my-4">Empleados</button>
            </a>
          </div>
          <div class="col-md-3 mb-3">
            <i class="fas fa-user-tag red-text fa-3x"></i><br>
            <a href="Clientes.php">
              <button type="button" class="btn btn-default my-4">Clientes</button>
            </a>
          </div>
          <div class="col-md-3 mb-3">
            <i class="far fa-chart-bar indigo-text fa-3x"></i><br>
            <a href="estadisticas.php">
              <button type="button" class="btn btn-info my-4">Estadíticas</button>
            </a>
          </div>
          <div class="col-md-3 mb-3">
            <i class="fas fa-paper-plane purple-text fa-3x"></i><br>
            <a href="Pagregar.php">
              <button type="button" class="btn btn-primary my-4">Agregar Producto</button>
            </a>
          </div>
        </div>
      </section>
    </div> -->
    <!--Inicio-->
    <div class="card-footer">
      <a href="clientes.php" class="btn-flotante">Entregar producto</a>
    </div>
  </body>
  <!--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </html>

<?php } ?>


<?php if ($_SESSION["Puesto"] == 2) { ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rossana|Home</title>
    <!-- HOJA DE ESTILOS PERSONAL -->
    <link rel="stylesheet" href="estilos/estilos.css" />
    <!-- HOJA DE ESTILOS DE BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/e530d88f76.js" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/9a3779baf9.js"></script>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />

    <!--  <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/e530d88f76.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/9a3779baf9.js"></script>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet"> -->
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
    }

    .textsalir:hover {
      color: white;
      text-decoration: none;
    }

    .col-sm {
      padding: 1rem;
      text-align: center;
    }

    .cartas {
      text-align: center;
    }

    .card-img-top {
      margin: auto;
      width: 150px;
      text-align: center;
    }

    .card {
      text-align: center;
      border-radius: 20px;
      border: none;
    }

    .card-footer {
      background-color: white;
      border-radius: 20px;

    }

    /*Boton flotante*/
    .btn-flotante {
      font-size: 15px;
      /* Cambiar el tamaño de la tipografia */
      text-transform: uppercase;
      /* Texto en mayusculas */
      font-weight: bold;
      /* Fuente en negrita o bold */
      color: #ffffff;
      /* Color del texto */
      border-radius: 5px;
      /* Borde del boton */
      letter-spacing: 2px;
      /* Espacio entre letras */
      background-color: #ff2e63;
      /* Color de fondo */
      padding: 18px 30px;
      border: none;
      /* Relleno del boton */
      position: fixed;
      bottom: 40px;
      right: 40px;
      transition: all 300ms ease 0ms;
      box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
      z-index: 99;
      text-decoration: none !important;
      border-color: white !important;
      border-style: none !important;
    }

    .btn-flotante:hover {
      background-color: red;
      /* Color de fondo al pasar el cursor */
      box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
      transform: translateY(-7px);
      text-decoration: none !important;
      color: white;
    }

    @media only screen and (max-width: 600px) {
      .btn-flotante {
        font-size: 14px;
        padding: 12px 20px;
        bottom: 20px;
        right: 20px;
        text-decoration: none !important;
      }
    }
  </style>

  <body class="body2">
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark ">
      <a class="navbar-brand" href="home.php"><strong>Materiales Juquilita</strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

        </ul>
        <form class="form-inline my-2 my-lg-0">
          <button class="salir" type="submit"><i class="fas fa-sign-out-alt"></i> <a class="textsalir" href="controllers/logout.php">Salir</a> </button>
        </form>
      </div>
    </nav>
    <!--Navbar-->
    <!--  <nav class="mb-1 navbar navbar-expand-lg navbar-dark primary-color">
      <strong> <a class="navbar-brand" href="home.php">Materiales Juquilita</a></strong>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
        <ul class="navbar-nav ml-auto nav-flex-icons">
          <li class="nav-item dropdown">
            <a class="nav-link " id="navbarDropdownMenuLink-333" href="controllers/logout.php">
              <i class="fas fa-sign-out-alt"> Salir</i>
            </a>
          </li>
        </ul>
      </div>
    </nav> -->
    <!--Bienvenida-->
    <div class="container p-5">
      <h1>Bienvenido Director general: <?php echo $_SESSION["nombre"]; ?></h1>
    </div>
    <!--Bienvenida-->
    <div class="container cartas">
      <div class="row cartas" align="center">
        <div class="col-sm">
          <div class="card" style="width: 20rem;">
            <img src="img/inven.png" class="card-img-top " alt="...">
            <div class="card-body">
              <h5 class="card-title"><strong>Inventario</strong></h5>
            </div>
            <div class="card-footer">
              <a href="inventario.php" class="btn btn-primary"><i class="fas fa-user"></i> Inventario</a>
            </div>
          </div>
        </div> <br>
        <div class="col-sm">
          <div class="card" style="width: 20rem;">
            <img src="img/sale.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><strong>Prestamo</strong></h5>
            </div>
            <div class="card-footer">
              <a href="Geventa.php" class="btn btn-primary"><i class="fas fa-money-bill"></i> Prestamo</a>
            </div>
          </div>
        </div>
        <br>
        <div class="col-sm">
          <div class="card" style="width: 20rem;">
            <img src="img/estadisticas.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><strong>Estadisticas</strong></h5>
            </div>
            <div class="card-footer">
              <a href="Reventa.php" class="btn btn-primary"><i class="fas fa-clock"></i> Estadisticas</a>
            </div>
          </div>
        </div> <br>
      </div>
    </div>
    <!--Inicio-->
    <!-- <div class="container my-5 p-5">
      <section class="text-center dark-grey-text">
        <div class="row">
          <div class="col-md-3 mb-3">
            <i class="fas fa-book-open blue-text fa-3x"></i><br>
            <a href="inventario.php">
              <button type="button" class="btn btn-indigo my-4">Inventario</button>
            </a>
          </div>
          <div class="col-md-3 mb-3">
            <i class="fa fa-map-marker-alt fa-3x indigo-text"></i><br>
            <a href="Geventa.php">
              <button type="button" class="btn btn-default my-4">Venta</button>
            </a>
          </div>
          <div class="col-md-3 mb-3">
            <i class="far fa-chart-bar indigo-text fa-3x"></i><br>
            <a href="estadisticas.php">
              <button type="button" class="btn btn-info my-4">Estadíticas</button>
            </a>
          </div>
          <div class="col-md-3 mb-3">
            <i class="fas fa-paper-plane purple-text fa-3x"></i><br>
            <a href="Pagregar.php">
              <button type="button" class="btn btn-primary my-4">Agregar Producto</button>
            </a>
          </div>
        </div> -->
    </section>
    </div>
    <!--Inicio-->
    <div class="card-footer">
      <a href="clientes.php" class="btn-flotante">Entregar producto</a>
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script> -->

  </html>

<?php } ?>

<?php if ($_SESSION["Puesto"] == 3) { ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rossana|Home</title>
    <!-- HOJA DE ESTILOS PERSONAL -->
    <link rel="stylesheet" href="estilos/estilos.css" />
    <!-- HOJA DE ESTILOS DE BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/e530d88f76.js" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/9a3779baf9.js"></script>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />

    <!--  <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/e530d88f76.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/9a3779baf9.js"></script>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet"> -->
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
    }

    .textsalir:hover {
      color: white;
      text-decoration: none;
    }

    .col-sm {
      padding: 1rem;
      text-align: center;
    }

    .cartas {
      text-align: center;
    }

    .card-img-top {
      margin: auto;
      width: 150px;
      text-align: center;
    }

    .card {
      text-align: center;
      border-radius: 20px;
      border: none;
    }

    .card-footer {
      background-color: white;
      border-radius: 20px;

    }

    /*Boton flotante*/
    .btn-flotante {
      font-size: 15px;
      /* Cambiar el tamaño de la tipografia */
      text-transform: uppercase;
      /* Texto en mayusculas */
      font-weight: bold;
      /* Fuente en negrita o bold */
      color: #ffffff;
      /* Color del texto */
      border-radius: 5px;
      /* Borde del boton */
      letter-spacing: 2px;
      /* Espacio entre letras */
      background-color: #ff2e63;
      /* Color de fondo */
      padding: 18px 30px;
      border: none;
      /* Relleno del boton */
      position: fixed;
      bottom: 40px;
      right: 40px;
      transition: all 300ms ease 0ms;
      box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
      z-index: 99;
      text-decoration: none !important;
      border-color: white !important;
      border-style: none !important;
    }

    .btn-flotante:hover {
      background-color: red;
      /* Color de fondo al pasar el cursor */
      box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
      transform: translateY(-7px);
      text-decoration: none !important;
      color: white;
    }

    @media only screen and (max-width: 600px) {
      .btn-flotante {
        font-size: 14px;
        padding: 12px 20px;
        bottom: 20px;
        right: 20px;
        text-decoration: none !important;
      }
    }
  </style>

  <body class="body2">
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark ">
      <a class="navbar-brand" href="home.php"><strong>Materiales Juquilita</strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

        </ul>
        <form class="form-inline my-2 my-lg-0">
          <button class="salir" type="submit"><i class="fas fa-sign-out-alt"></i> <a class="textsalir" href="controllers/logout.php">Salir</a> </button>
        </form>
      </div>
    </nav>
    <!--Navbar-->
    <!--  <nav class="mb-1 navbar navbar-expand-lg navbar-dark primary-color">
      <strong> <a class="navbar-brand" href="home.php">Materiales Juquilita</a></strong>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
        <ul class="navbar-nav ml-auto nav-flex-icons">
          <li class="nav-item dropdown">
            <a class="nav-link " id="navbarDropdownMenuLink-333" href="controllers/logout.php">
              <i class="fas fa-sign-out-alt"> Salir</i>
            </a>
          </li>
        </ul>
      </div>
    </nav> -->
    <!--Bienvenida-->
    <div class="container p-5">
      <h1>Bienvenido Director de departamento: <?php echo $_SESSION["nombre"]; ?></h1>
    </div>
    <!--Bienvenida-->
    <div class="container cartas">
      <div class="row cartas" align="center">
        <div class="col-sm">
          <div class="card" style="width: 20rem;">
            <img src="img/inven.png" class="card-img-top " alt="...">
            <div class="card-body">
              <h5 class="card-title"><strong>Inventario</strong></h5>
            </div>
            <div class="card-footer">
              <a href="inventario.php" class="btn btn-primary"><i class="fas fa-user"></i> Inventario</a>
            </div>
          </div>
        </div> <br>
        <div class="col-sm">
          <div class="card" style="width: 20rem;">
            <img src="img/sale.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><strong>Prestamos</strong></h5>
            </div>
            <div class="card-footer">
              <a href="Geventa.php" class="btn btn-primary"><i class="fas fa-money-bill"></i> Prestamos</a>
            </div>
          </div>
        </div>
        <br>
        <div class="col-sm">
          <div class="card" style="width: 20rem;">
            <img src="img/estadisticas.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><strong>Estadisticas</strong></h5>
            </div>
            <div class="card-footer">
              <a href="Reventa.php" class="btn btn-primary"><i class="fas fa-clock"></i> Estadisticas</a>
            </div>
          </div>
        </div> <br>
      </div>
    </div>
    <!--Inicio-->
    <!-- <div class="container my-5 p-5">
      <section class="text-center dark-grey-text">
        <div class="row">
          <div class="col-md-3 mb-3">
            <i class="fas fa-book-open blue-text fa-3x"></i><br>
            <a href="inventario.php">
              <button type="button" class="btn btn-indigo my-4">Inventario</button>
            </a>
          </div>
          <div class="col-md-3 mb-3">
            <i class="fa fa-map-marker-alt fa-3x indigo-text"></i><br>
            <a href="Geventa.php">
              <button type="button" class="btn btn-default my-4">Venta</button>
            </a>
          </div>
          <div class="col-md-3 mb-3">
            <i class="far fa-chart-bar indigo-text fa-3x"></i><br>
            <a href="estadisticas.php">
              <button type="button" class="btn btn-info my-4">Estadíticas</button>
            </a>
          </div>
          <div class="col-md-3 mb-3">
            <i class="fas fa-paper-plane purple-text fa-3x"></i><br>
            <a href="Pagregar.php">
              <button type="button" class="btn btn-primary my-4">Agregar Producto</button>
            </a>
          </div>
        </div> -->
    </section>
    </div>
    <!--Inicio-->
    <div class="card-footer">
      <a href="clientes.php" class="btn-flotante">Entregar producto</a>
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script> -->

  </html>

<?php } ?>

<?php if ($_SESSION["Puesto"] == 4) { ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materiales Juquilita | Home</title>
    <!-- HOJA DE ESTILOS PERSONAL -->
    <link rel="stylesheet" href="estilos/estilos.css" />
    <!-- HOJA DE ESTILOS DE BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/e530d88f76.js" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/9a3779baf9.js"></script>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />

    <!--  <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/e530d88f76.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/9a3779baf9.js"></script>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet"> -->
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
    }

    .textsalir:hover {
      color: white;
      text-decoration: none;
    }

    .col-sm {
      padding: 1rem;
      text-align: center;
    }

    .cartas {
      text-align: center;
    }

    .card-img-top {
      margin: auto;
      width: 150px;
      text-align: center;
    }

    .card {
      text-align: center;
      border-radius: 20px;
      border: none;
      margin-left: 38%;
    }

    .card-footer {
      background-color: white;
      border-radius: 20px;

    }

    /*Boton flotante*/
    .btn-flotante {
      font-size: 15px;
      /* Cambiar el tamaño de la tipografia */
      text-transform: uppercase;
      /* Texto en mayusculas */
      font-weight: bold;
      /* Fuente en negrita o bold */
      color: #ffffff;
      /* Color del texto */
      border-radius: 5px;
      /* Borde del boton */
      letter-spacing: 2px;
      /* Espacio entre letras */
      background-color: #ff2e63;
      /* Color de fondo */
      padding: 18px 30px;
      border: none;
      /* Relleno del boton */
      position: fixed;
      bottom: 40px;
      right: 40px;
      transition: all 300ms ease 0ms;
      box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
      z-index: 99;
      text-decoration: none !important;
      border-color: white !important;
      border-style: none !important;
    }

    .btn-flotante:hover {
      background-color: red;
      /* Color de fondo al pasar el cursor */
      box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
      transform: translateY(-7px);
      text-decoration: none !important;
      color: white;
    }

    @media only screen and (max-width: 600px) {
      .btn-flotante {
        font-size: 14px;
        padding: 12px 20px;
        bottom: 20px;
        right: 20px;
        text-decoration: none !important;
      }
    }
  </style>

  <body class="body2">
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark ">
      <a class="navbar-brand" href="home.php"><strong>Materiales Juquilita</strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

        </ul>
        <form class="form-inline my-2 my-lg-0">
          <button class="salir" type="submit"><i class="fas fa-sign-out-alt"></i> <a class="textsalir" href="controllers/logout.php">Salir</a> </button>
        </form>
      </div>
    </nav>
    <!--Navbar-->
    <!--  <nav class="mb-1 navbar navbar-expand-lg navbar-dark primary-color">
      <strong> <a class="navbar-brand" href="home.php">Materiales Juquilita</a></strong>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
        <ul class="navbar-nav ml-auto nav-flex-icons">
          <li class="nav-item dropdown">
            <a class="nav-link " id="navbarDropdownMenuLink-333" href="controllers/logout.php">
              <i class="fas fa-sign-out-alt"> Salir</i>
            </a>
          </li>
        </ul>
      </div>
    </nav> -->
    <!--Bienvenida-->
    <div class="container p-5">
      <h1>Bienvenido Personal: <?php echo $_SESSION["nombre"]; ?></h1>
    </div>
    <!--Bienvenida-->
    <div class="container cartas">
      <div class="row cartas">
        <div class="col-sm">
          <div class="card" style="width: 15rem;">
            <img src="img/inven.png" class="card-img-top " alt="...">
            <div class="card-body">
              <h5 class="card-title"><strong>Inventario</strong></h5>
            </div>
            <div class="card-footer">
              <a href="inventario.php" class="btn btn-primary"><i class="fas fa-user"></i> Inventario</a>
            </div>
          </div>
        </div> <br>
        <!-- <div class="col-sm">
          <div class="card" style="width: 15rem;">
            <img src="img/sale.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><strong>Venta</strong></h5>
            </div>
            <div class="card-footer">
              <a href="Geventa.php" class="btn btn-primary"><i class="fas fa-money-bill"></i> Venta</a>
            </div>
          </div>
        </div>
        <br>
        <div class="col-sm">
          <div class="card" style="width: 15rem;">
            <img src="img/estadisticas.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><strong>Estadisticas</strong></h5>
            </div>
            <div class="card-footer">
              <a href="estadisticas.php" class="btn btn-primary"><i class="fas fa-clock"></i> Estadisticas</a>
            </div>
          </div>
        </div> <br>
        <div class="col-sm">
          <div class="card" style="width: 15rem;">
            <img src="img/agregar.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><strong>Agregar Producto</strong></h5>
            </div>
            <div class="card-footer">
              <a href="Pagregar.php" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar Producto</a>
            </div>
          </div>
        </div> <br>
      </div>
    </div> -->
        <!--Inicio-->
        <!-- <div class="container my-5 p-5">
      <section class="text-center dark-grey-text">
        <div class="row">
          <div class="col-md-3 mb-3">
            <i class="fas fa-book-open blue-text fa-3x"></i><br>
            <a href="inventario.php">
              <button type="button" class="btn btn-indigo my-4">Inventario</button>
            </a>
          </div>
          <div class="col-md-3 mb-3">
            <i class="fa fa-map-marker-alt fa-3x indigo-text"></i><br>
            <a href="Geventa.php">
              <button type="button" class="btn btn-default my-4">Venta</button>
            </a>
          </div>
          <div class="col-md-3 mb-3">
            <i class="far fa-chart-bar indigo-text fa-3x"></i><br>
            <a href="estadisticas.php">
              <button type="button" class="btn btn-info my-4">Estadíticas</button>
            </a>
          </div>
          <div class="col-md-3 mb-3">
            <i class="fas fa-paper-plane purple-text fa-3x"></i><br>
            <a href="Pagregar.php">
              <button type="button" class="btn btn-primary my-4">Agregar Producto</button>
            </a>
          </div>
        </div> 
        </section>-->
      </div>
    </div>

    <!--Inicio-->
    <div class="card-footer">
      <a href="clientes.php" class="btn-flotante">Entregar producto</a>
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script> -->

  </html>

<?php } ?>