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
  <title>Rossana|Reventa</title>
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
</style>

<body class="body2">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="home.php"><strong>Materiales Juquilita</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="inventario.php">Inventario</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <button class="salir" type="submit"><i class="fas fa-sign-out-alt"></i> <a class="textsalir" href="controllers/logout.php">Salir</a> </button>
      </form>
    </div>
  </nav>
  <!--Navbar-->
  <!-- <nav class="mb-1 navbar navbar-expand-lg navbar-dark primary-color">
    <a class="navbar-brand" href="home.php">Bodega Rossana</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="inventario.php">Inventario</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Geventa.php">Generar venta</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto nav-flex-icons">
        <li class="nav-item dropdown">
          <a class="nav-link " id="navbarDropdownMenuLink-333" href="controllers/logout.php">
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </li>
      </ul>
    </div>
  </nav> -->
  <!--Navbar-->
  <!--Inicio-->
  <div class="container my-2 px-0 ">
    <section class=" my-md-5 text-center">
      <h1 class=" text-center "><strong>GENERAR REPORTE</strong></h1>
      <div class="row">
        <div class="col-6">
          <form class="my-5 mx-md-5" action="VistaRventa.php" method="POST">
            <div class="row">
              <div class="col-md-12 mx-auto">
                <div class="card">
                  <div class="card-body">
                    <form class="text-center" style="color: #757575;">
                      <div class="md-form md-outline input-with-post-icon datepicker">
                        <select name="departamento" class="form-control" required>
                          <option selected disabled>Selecciona un departamento</option>
                          <?php
                          require("./BaseDatos/Conexion.php"); //Muestra el historial de los productos en venta por cada uno
                          $most = mysqli_query($conexion, "SELECT * FROM empleado_departamento inner join tipo on Id_departamento=id WHERE Id_empleado =" . $_SESSION["id"]);
                          if ($most->num_rows > 0) {
                            while ($rows  = mysqli_fetch_array($most)) {
                          ?>
                              <?php if ($rows["Id_departamento"] == "1") { ?>
                                <option value="1">Herramientas</option>
                              <?php } ?>
                              <?php if ($rows["Id_departamento"] == "2") { ?>
                                <option value="2">Electrónicos</option>
                              <?php } ?>
                              <?php if ($rows["Id_departamento"] == "3") { ?>
                                <option value="3">Limpieza</option>
                              <?php } ?>
                              <?php if ($rows["Id_departamento"] == "4") { ?>
                                <option value="4">Equipos</option>
                              <?php } ?>
                              <?php if ($rows["Id_departamento"] == "5") { ?>
                                <option value="5">Redes</option>
                              <?php } ?>
                              <?php if ($rows["Id_departamento"] == "6") { ?>
                                <option value="6">Software</option>
                          <?php }
                            }
                          } ?>
                        </select>
                      </div>
                      <!-- <div class="md-form md-outline input-with-post-icon datepicker">
                        <select name="Fin" class="form-control" required>
                          <option selected disabled>Selecciona el tiempo</option>
                          <option value="1">Reporte mensual</option>
                          <option value="2">Reporte trimestral</option>
                          <option value="3">Reporte anual</option>
                        </select>
                      </div> -->
                      <div class="md-form md-outline input-with-post-icon datepicker">
                        <input placeholder="Select date" type="date" name="Inicio" class="form-control" required>
                        <label for="example">De...</label>
                      </div>
                      <div class="md-form md-outline input-with-post-icon datepicker">
                        <input placeholder="Select date" type="date" name="Fin" class="form-control" required>
                        <label for="example">Hasta...</label>
                      </div>
                      <div class="text-center">
                        <input type="hidden" name="Valor" value="SoloTotal">
                        <button class="btn btn-success " type="submit"><strong>Reporte específico</strong></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-6">
          <form class="my-5 mx-md-5" action="VistaRventaE.php" method="POST">
            <div class="row">
              <div class="col-md-12 mx-auto">
                <div class="card">
                  <div class="card-body">
                    <form class="text-center" style="color: #757575;">
                      <div class="md-form md-outline input-with-post-icon datepicker">
                        <h4>Reporte global de los departamentos</h4>
                      </div>
                      <!-- <div class="md-form md-outline input-with-post-icon datepicker">
                        <select name="Inicio" class="form-control">
                          <option selected disabled>Selecciona el tiempo</option>
                          <option value="1">Reporte mensual</option>
                          <option value="2">Reporte trimestral</option>
                          <option value="3">Reporte anual</option>
                        </select>
                      </div> -->
                      <div class="md-form md-outline input-with-post-icon datepicker">
                        <input placeholder="Select date" type="date" name="Inicio" class="form-control" required>
                        <label for="example">De...</label>
                      </div>
                      <div class="md-form md-outline input-with-post-icon datepicker">
                        <input placeholder="Select date" type="date" name="Fin" class="form-control" required>
                        <label for="example">Hasta...</label>
                      </div>
                      <div class="text-center">
                        <input type="hidden" name="Valor" value="SoloTotal">
                        <button class="btn btn-success " type="submit"><strong>Reporte específico</strong></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </form>

        </div>

      </div>

    </section>
  </div>
</body>
<script>
  // Data Picker Initialization
  $('.datepicker').datepicker({
    inline: true
  });
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

</html>