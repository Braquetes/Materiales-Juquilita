<?php
@session_start();
if (!isset($_SESSION["user"])) {
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rossan|Agregar</title>
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

<body class="body">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="home.php"><strong>Materiales Juquilita</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="home.php">Inicio </a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <button class="salir" type="submit"> <a class="textsalir" href="home.php">Volver</a> </button>
      </form>
    </div>
  </nav>
  <div class="container my-2 px-0 ">
    <section class="pt-3 pb-3 text-center">
      <h1 class=""><strong>AGREGAR PRODUCTO</strong></h1>
      <form class="" action="./controllers/model.php" method="POST">
        <div class="row">
          <div class="col-md-4 mx-auto">
            <div class="card">
              <div class="card-body">
                <form class="text-center" style="color: #757575;">
                  <div class="md-form">
                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                    <label for="form1">Nombre</label>
                  </div>
                  <div class="md-form">
                    <input type="text" id="precio" name="precio" class="form-control" required>
                    <label for="form1">Precio</label>
                  </div>
                  <div class="md-form">
                    <input type="text" id="tamaño" name="tamaño" class="form-control" required>
                    <label for="form1">Tamaño</label>
                  </div>
                  <div class="md-form">
                    <select id="tipo" name="tipo" class="form-control" required>
                      <option value="1">Herramientas</option>
                      <option value="2">Electrónicos</option>
                      <option value="3">Limpieza</option>
                      <option value="4">Equipos</option>
                      <option value="5">Redes</option>
                      <option value="6">Software</option>
                    </select>
                  </div>
                  <div class="md-form">
                    <input type="number" id="cantidad" name="cantidad" class="form-control" required>
                    <label for="form1">Agregar unidades</label>
                  </div>
                  <div class="md-form">
                    <input type="text" id="codigo" name="codigo" class="form-control" required>
                    <label for="form1">Código para verificar</label>
                  </div>
                  <div class="text-center">
                    <a href="home.php"><button class="btn boton btn-danger " type="button"><i class="fas fa-ban"></i> Cancelar</button></a>
                    <button class="btn boton btn-success " type="submit" value="Agregar" name="Valor"><i class="fas fa-plus"></i> Agregar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
  </div>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

</html>